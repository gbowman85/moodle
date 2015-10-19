<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version details
 * This is a modified version of calendar upcoming block.
 * 
 * @package    block_alerts
 * @copyright  Andreas Wagner, 2014 Synergy Learning
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_alerts extends block_base {

    public static $POSTALERTSORDER = array('timecreated' => 'timecreated', 'timemodified' => 'timemodified');

    /**
     * Initialise the block.
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_alerts');
    }

    public function applicable_formats() {
        return array('course-view-socialwall' => true);
    }

    public function has_config() {
        return true;
    }

    public function instance_allow_config() {
        return true;
    }

    public function specialization() {

        if (!empty($this->config->title)) {
            $this->title = $this->config->title;
        }
    }

    /**
     * Return the content of this block.
     *
     * @return stdClass the content
     */
    public function get_content() {
        global $CFG;

        $courseformat = course_get_format($this->page->course)->get_format();
        if ($courseformat != 'socialwall') {
            $this->content = new stdClass;
            $this->content->text = '';
            return $this->content;
        }

        require_once($CFG->dirroot . '/calendar/lib.php');
        require_once($CFG->dirroot . '/course/format/socialwall/locallib.php');

        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass;
        $this->content->text = '';

        $filtercourse = array();

        if (empty($this->instance)) { // Overrides: use no course at all.
            $courseshown = false;
            $this->content->footer = '';
            return $this->content;
        }

        $config = get_config('block_alerts');
        // ...get alerts.
        if (isset($this->config->maxalerts)) {

            $limitalerts = (int) $this->config->maxalerts;
        } else {

            $limitalerts = $config->maxalerts;
        }

        $orderby = array();

        if (isset($this->config->stickyontop)) {
            $stickyontop = $this->config->stickyontop;
        } else {
            $stickyontop = $config->stickyontop;
        }

        if (isset($this->config->postalertorder)) {

            $timeattribute = $this->config->postalertorder;
        } else {

            $timeattribute = $config->postalertorder;
        }

        if (!empty($stickyontop)) {
            $orderby[] = 'sticky desc';
        }
        $orderby[] = $timeattribute . ' desc';

        // ... get all the alert-posts of the course, which are visible to this user.
        $formatsocialwallposts = \format_socialwall\local\posts::instance($this->page->course->id);
        $alerts = $formatsocialwallposts->get_alert_posts($this->page->course, 0, $limitalerts, $orderby);

        // ... get upcoming events, like block calendar_upcoming does.
        $courseshown = $this->page->course->id;

        $url = new moodle_url('/calendar/view.php', array('view' => 'upcoming', 'course' => $courseshown));
        $link = html_writer::link($url, get_string('gotocalendar', 'calendar') . '...');
        $this->content->footer = html_writer::tag('div', $link, array('class' => 'gotocal'));

        $context = context_course::instance($courseshown);

        if (has_any_capability(array('moodle/calendar:manageentries', 'moodle/calendar:manageownentries'), $context)) {

            $url = new moodle_url('/calendar/event.php', array('action' => 'new', 'course' => $courseshown));
            $link = html_writer::link($url, get_string('newevent', 'calendar') . '...');
            $this->content->footer .= html_writer::tag('div', $link, array('class' => 'newevent'));
        }
        if ($courseshown == SITEID) {
            // Being displayed at site level. This will cause the filter to fall back to auto-detecting
            // the list of courses it will be grabbing events from.
            $filtercourse = calendar_get_default_courses();
        } else {
            // Forcibly filter events to include only those from the particular course we are in.
            $filtercourse = array($courseshown => $this->page->course);
        }

        list($courses, $group, $user) = calendar_set_filters($filtercourse);

        $defaultlookahead = CALENDAR_DEFAULT_UPCOMING_LOOKAHEAD;
        if (isset($CFG->calendar_lookahead)) {
            $defaultlookahead = intval($CFG->calendar_lookahead);
        }
        $lookahead = get_user_preferences('calendar_lookahead', $defaultlookahead);

        $defaultmaxevents = CALENDAR_DEFAULT_UPCOMING_MAXEVENTS;
        if (isset($CFG->calendar_maxevents)) {
            $defaultmaxevents = intval($CFG->calendar_maxevents);
        }
        $maxevents = get_user_preferences('calendar_maxevents', $defaultmaxevents);
        $events = calendar_get_upcoming($courses, $group, $user, $lookahead, $maxevents);

        // ... generate output.
        $this->content->text = $this->render_alerts($alerts->posts, $timeattribute);

        if ($events) {

            $link = 'view.php?view=day&amp;course=' . $courseshown . '&amp;';
            $showcourselink = ($this->page->course->id == SITEID);
            $this->content->text .= html_writer::tag('h5', get_string('duedates', 'block_alerts'));

            $this->content->text .= calendar_get_block_upcoming($events, $link, $showcourselink);
        }

        if (empty($this->content->text)) {
            $this->content->text = '<div class="post">' . get_string('noupcomingevents', 'calendar') . '</div>';
        }

        return $this->content;
    }

    protected function render_alert($alert, $timeattribute, $icon) {

        $content = html_writer::tag('span', $icon, array('class' => 'icon c0'));

        $url = new moodle_url('/course/view.php', array('id' => $alert->courseid, 'showalert' => $alert->id));

        $content .= html_writer::link($url, shorten_text(format_string($alert->posttext)));

        $alert->time = userdate($alert->$timeattribute);
        $content .= html_writer::tag('div', $alert->time, array('class' => 'date'));

        return html_writer::tag('div', $content, array('class' => 'event'));
    }

    protected function render_alerts($alerts, $timeattribute) {
        global $OUTPUT;

        if (empty($alerts)) {
            return '';
        }

        $content = html_writer::tag('h5', get_string('alertposts', 'block_alerts'));
        $icon = $OUTPUT->pix_icon('alert', get_string('alert', 'block_alerts'), 'block_alerts', array('class' => 'icon'));

        foreach ($alerts as $alert) {

            $content .= $this->render_alert($alert, $timeattribute, $icon);
            $content .= '<hr />';
        }

        return $content;
    }

}

