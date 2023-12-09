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
 * Theme eduhub feature block.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the heading or title for the feature block on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_feature_heading($page)
{
    $name = 'theme_eduhub/feature';
    $heading = get_string('feature', 'theme_eduhub');
    $information = get_string('feature_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Checks if the feature block is enabled on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_feature_enabled($page)
{
    $name = 'theme_eduhub/feature_enabled';
    $title = get_string('feature_enabled', 'theme_eduhub');
    $description = get_string('feature_enabled_desc', 'theme_eduhub');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}


/**
 * Retrieves the title or name of the feature block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_feature_title($page)
{
    $name = 'theme_eduhub/feature_title';
    $title = get_string('feature_title', 'theme_eduhub');
    $description = get_string('feature_title_desc', 'theme_eduhub');
    $default = 'Awesome App Features';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the caption or description of the feature block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_feature_caption($page)
{
    $name = 'theme_eduhub/feature_caption';
    $title = get_string('feature_caption', 'theme_eduhub');
    $description = get_string('feature_caption_desc', 'theme_eduhub');
    $default = 'Eduhub is a Moodle template based on Boost with modern and creative design';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the content or data associated with the feature block on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_feature_block($page)
{
    for ($count = 1; $count <= 4; $count++) {
        // Feature block image.
        $filearea = 'feature_block_image_' . $count;
        $name = 'theme_eduhub/feature_block_image_' . $count;
        $title = get_string('feature_block_image', 'theme_eduhub');
        $description = get_string('feature_block_image_desc', 'theme_eduhub');
        $opts = array('accepted_types' => array('.png', '.jpg', '.jpeg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, $filearea, 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Feature block title.
        $name = 'theme_eduhub/feature_block_title_' . $count;
        $title = get_string('feature_block_title', 'theme_eduhub');
        $description = get_string('feature_block_title_desc', 'theme_eduhub');
        $default = 'Challenges';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Feature block caption.
        $name = 'theme_eduhub/feature_block_caption_' . $count;
        $title = get_string('feature_block_caption', 'theme_eduhub');
        $description = get_string('feature_block_caption_desc', 'theme_eduhub');
        $default = 'A challenging environment';
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
}