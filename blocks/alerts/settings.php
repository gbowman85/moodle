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
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    $block_alerts_maxalerts = array(
        '5' => 5,
        '10' => 10,
        '20' => 20
    );

    $settings->add(new admin_setting_configselect(
                    'block_alerts/maxalerts',
                    new lang_string('maxalerts', 'block_alerts'),
                    new lang_string('maxalertsdesc', 'block_alerts'), 10, $block_alerts_maxalerts)
    );

    $block_alerts_orderbyoptions = array();
    foreach (block_alerts::$POSTALERTSORDER as $key => $langkey) {
        $block_alerts_orderbyoptions[$key] = get_string($langkey, 'block_alerts');
    }

    $settings->add(new admin_setting_configselect(
                    'block_alerts/postalertorder',
                    new lang_string('postalertorder', 'block_alerts'),
                    new lang_string('postalertorderdesc', 'block_alerts'), 0, $block_alerts_orderbyoptions)
    );

    $settings->add(new admin_setting_configcheckbox(
                    'block_alerts/stickyontop',
                    new lang_string('stickyontop', 'block_alerts'),
                    new lang_string('stickyontopdesc', 'block_alerts'), 0)
    );
}


