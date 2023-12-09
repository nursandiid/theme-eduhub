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
 * Theme eduhub achievement block.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the heading or title for the achievement block on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_heading($page)
{
    $name = 'theme_eduhub/achievement';
    $heading = get_string('achievement', 'theme_eduhub');
    $information = get_string('achievement_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Checks if the achievement block is enabled on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_enabled($page)
{
    $name = 'theme_eduhub/achievement_enabled';
    $title = get_string('achievement_enabled', 'theme_eduhub');
    $description = get_string('achievement_enabled_desc', 'theme_eduhub');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}


/**
 * Retrieves the title or name of the achievement block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_title($page)
{
    $name = 'theme_eduhub/achievement_title';
    $title = get_string('achievement_title', 'theme_eduhub');
    $description = get_string('achievement_title_desc', 'theme_eduhub');
    $default = 'Scholl Achievements';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the caption or description of the achievement block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_caption($page)
{
    $name = 'theme_eduhub/achievement_caption';
    $title = get_string('achievement_caption', 'theme_eduhub');
    $description = get_string('achievement_caption_desc', 'theme_eduhub');
    $default = 'Here you can review some statistics about our Education Center';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the total number of students associated with the achievement block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_total_students($page)
{
    $name = 'theme_eduhub/achievement_total_students';
    $title = get_string('achievement_total_students', 'theme_eduhub');
    $description = get_string('achievement_total_students_desc', 'theme_eduhub');
    $default = 0;
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the total number of graduates associated with the achievement block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_total_graduates($page)
{
    $name = 'theme_eduhub/achievement_total_graduates';
    $title = get_string('achievement_total_graduates', 'theme_eduhub');
    $description = get_string('achievement_total_graduates_desc', 'theme_eduhub');
    $default = 0;
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the total number of free courses associated with the achievement block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_total_free_courses($page)
{
    $name = 'theme_eduhub/achievement_total_free_courses';
    $title = get_string('achievement_total_free_courses', 'theme_eduhub');
    $description = get_string('achievement_total_free_courses_desc', 'theme_eduhub');
    $default = 0;
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the total number of active courses associated with the achievement block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_total_active_courses($page)
{
    $name = 'theme_eduhub/achievement_total_active_courses';
    $title = get_string('achievement_total_active_courses', 'theme_eduhub');
    $description = get_string('achievement_total_active_courses_desc', 'theme_eduhub');
    $default = 0;
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the background image URL for the achievement block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_achievement_background_image($page)
{
    $name = 'theme_eduhub/achievement_background_image';
    $title = get_string('achievement_background_image', 'theme_eduhub');
    $description = get_string('achievement_background_image_desc', 'theme_eduhub');
    $filearea = 'achievement_background_image';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $filearea);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
