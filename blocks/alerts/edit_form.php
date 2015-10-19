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
 *
 * @package    block_alerts
 * @copyright  Andreas Wagner, 2014 Synergy Learning
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->dirroot . '/blocks/alerts/block_alerts.php');

class block_alerts_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        $config = get_config('block_alerts');

        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block_alerts'));

        $mform->addElement('text', 'config_title', get_string('title', 'block_alerts'));
        $mform->setType('config_title', PARAM_TEXT);

        $mform->addElement('text', 'config_maxalerts', get_string('maxalerts', 'block_alerts'));
        $mform->setType('config_maxalerts', PARAM_INT);
        $mform->setDefault('config_maxalerts', $config->maxalerts);

        $orderbyoptions = array();
        foreach (block_alerts::$POSTALERTSORDER as $key => $langkey) {
            $orderbyoptions[$key] = get_string($langkey, 'block_alerts');
        }
        $mform->addElement('select', 'config_postalertorder', get_string('postalertorder', 'block_alerts'), $orderbyoptions);
        $mform->setType('config_postalertorder', PARAM_TEXT);
        $mform->setDefault('config_postalertorder', $config->postalertorder);

        $mform->addElement('selectyesno', 'config_stickyontop', get_string('stickyontop', 'block_alerts'));
        $mform->setType('config_stickyontop', PARAM_INT);
        $mform->setDefault('config_stickyontop', $config->stickyontop);
        $mform->addHelpButton('config_stickyontop', 'stickyontop', 'block_alerts');
    }

}