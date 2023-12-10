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
 * Theme eduhub testimonial block.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the heading or title for the testimonial block on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_testimonial_heading($page)
{
    $name = 'theme_eduhub/testimonial';
    $heading = get_string('testimonial', 'theme_eduhub');
    $information = get_string('testimonial_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Checks if the testimonial block is enabled on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_testimonial_enabled($page)
{
    $name = 'theme_eduhub/testimonial_enabled';
    $title = get_string('testimonial_enabled', 'theme_eduhub');
    $description = get_string('testimonial_enabled_desc', 'theme_eduhub');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}


/**
 * Retrieves the title or name of the testimonial block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_testimonial_title($page)
{
    $name = 'theme_eduhub/testimonial_title';
    $title = get_string('testimonial_title', 'theme_eduhub');
    $description = get_string('testimonial_title_desc', 'theme_eduhub');
    $default = 'What People Say';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the caption or description of the testimonial block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_testimonial_caption($page)
{
    $name = 'theme_eduhub/testimonial_caption';
    $title = get_string('testimonial_caption', 'theme_eduhub');
    $description = get_string('testimonial_caption_desc', 'theme_eduhub');
    $default = 'Cum doctus civibus efficiantur in imperdiet deterruisset';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the total number of users associated with the testimonial block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_testimonial_total_users($page)
{
    $name = 'theme_eduhub/testimonial_total_users';
    $title = get_string('testimonial_total_users', 'theme_eduhub');
    $description = get_string('testimonial_total_users_desc', 'theme_eduhub');
    $default = 3;
    $choices = range(0, 12);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the settings or configuration for the testimonial slider block on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_testimonial_slider_setting($page)
{
    // If we don't have an slide yet, default to the preset.
    $total_users = get_config('theme_eduhub', 'testimonial_total_users');

    for ($count = 1; $count <= $total_users; $count++) {
        // User picture.
        $filearea = 'testimonial_slider_image_' . $count;
        $name = 'theme_eduhub/testimonial_slider_image_' . $count;
        $title = get_string('testimonial_slider_image', 'theme_eduhub');
        $description = get_string('testimonial_slider_image_desc', 'theme_eduhub');
        $opts = array('accepted_types' => array('.png', '.jpg', '.jpeg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, $filearea, 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // User name.
        $name = 'theme_eduhub/testimonial_slider_name_' . $count;
        $title = get_string('testimonial_slider_name', 'theme_eduhub');
        $description = get_string('testimonial_slider_name_desc', 'theme_eduhub');
        $default = 'John Doe';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
        
        // User title.
        $name = 'theme_eduhub/testimonial_slider_title_' . $count;
        $title = get_string('testimonial_slider_title', 'theme_eduhub');
        $description = get_string('testimonial_slider_title_desc', 'theme_eduhub');
        $default = 'User title';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // User caption.
        $name = 'theme_eduhub/testimonial_slider_caption_' . $count;
        $title = get_string('testimonial_slider_caption', 'theme_eduhub');
        $description = get_string('testimonial_slider_caption_desc', 'theme_eduhub');
        $default = 'Write your caption.';
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
}