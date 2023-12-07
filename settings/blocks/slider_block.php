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
function eduhub_slider_heading($page)
{
    $name = 'theme_eduhub/slider';
    $heading = get_string('slider', 'theme_eduhub');
    $information = get_string('slider_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_slider_enabled($page)
{
    $name = 'theme_eduhub/slider_enabled';
    $title = get_string('slider_enabled', 'theme_eduhub');
    $description = get_string('slider_enabled_desc', 'theme_eduhub');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_slider_count($page)
{
    $name = 'theme_eduhub/slider_count';
    $title = get_string('slider_count', 'theme_eduhub');
    $description = get_string('slider_count_desc', 'theme_eduhub');
    $default = 3;
    $choices = range(0, 6);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_slider_setting($page)
{
    // If we don't have an slide yet, default to the preset.
    $slider_count = get_config('theme_eduhub', 'slider_count');

    for ($count = 1; $count <= $slider_count; $count++) {
        // Slider image.
        $filearea = 'slider_image_' . $count;
        $name = 'theme_eduhub/slider_image_' . $count;
        $title = get_string('slider_image', 'theme_eduhub');
        $description = get_string('slider_image_desc', 'theme_eduhub');
        $opts = array('accepted_types' => array('.png', '.jpg', '.jpeg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, $filearea, 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Slider title.
        $name = 'theme_eduhub/slider_title_' . $count;
        $title = get_string('slider_title', 'theme_eduhub');
        $description = get_string('slider_title_desc', 'theme_eduhub');
        $default = 'Start Investing in You';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Slider caption.
        $name = 'theme_eduhub/slider_caption_' . $count;
        $title = get_string('slider_caption', 'theme_eduhub');
        $description = get_string('slider_caption_desc', 'theme_eduhub');
        $default = 'Some representative placeholder content for the second slide.';
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
}
