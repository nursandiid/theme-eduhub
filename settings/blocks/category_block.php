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
function eduhub_category_heading($page)
{
    $name = 'theme_eduhub/category';
    $heading = get_string('category', 'theme_eduhub');
    $information = get_string('category_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_category_enabled($page)
{
    $name = 'theme_eduhub/category_enabled';
    $title = get_string('category_enabled', 'theme_eduhub');
    $description = get_string('category_enabled_desc', 'theme_eduhub');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}


/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_category_title($page)
{
    $name = 'theme_eduhub/category_title';
    $title = get_string('category_title', 'theme_eduhub');
    $description = get_string('category_title_desc', 'theme_eduhub');
    $default = 'Available Categories';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_category_caption($page)
{
    $name = 'theme_eduhub/category_caption';
    $title = get_string('category_caption', 'theme_eduhub');
    $description = get_string('category_caption_desc', 'theme_eduhub');
    $default = 'List of registered categories';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
