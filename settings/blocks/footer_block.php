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
 *
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_footer_heading($page)
{
    $name = 'theme_eduhub/footer';
    $heading = get_string('footer', 'theme_eduhub');
    $information = get_string('footer_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_footer_enabled($page)
{
    $name = 'theme_eduhub/footer_enabled';
    $title = get_string('footer_enabled', 'theme_eduhub');
    $description = get_string('footer_enabled_desc', 'theme_eduhub');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}