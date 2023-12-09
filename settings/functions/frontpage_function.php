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
 * Theme eduhub frontpage functions.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves and sets the frontpage container type setting on the theme admin page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_container_type($page)
{
    $name = 'theme_eduhub/container_type';
    $title = get_string('container_type', 'theme_eduhub');
    $description = get_string('container_type_desc', 'theme_eduhub');
    $choices = [
        'Default',
        'Fluid'
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 0, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves and sets the frontpage navbar container type setting on the theme admin page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_navbar_container_type($page)
{
    $name = 'theme_eduhub/navbar_container_type';
    $title = get_string('navbar_container_type', 'theme_eduhub');
    $description = get_string('navbar_container_type_desc', 'theme_eduhub');
    $choices = [
        'Default',
        'Fluid'
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 0, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
