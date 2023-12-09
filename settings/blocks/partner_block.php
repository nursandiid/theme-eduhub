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
 * Theme eduhub partner block.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the heading or title for the partner block on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_partner_heading($page)
{
    $name = 'theme_eduhub/partner';
    $heading = get_string('partner', 'theme_eduhub');
    $information = get_string('partner_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Checks if the partner block is enabled on the front page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_partner_enabled($page)
{
    $name = 'theme_eduhub/partner_enabled';
    $title = get_string('partner_enabled', 'theme_eduhub');
    $description = get_string('partner_enabled_desc', 'theme_eduhub');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}


/**
 * Retrieves the title or name of the partner block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_partner_title($page)
{
    $name = 'theme_eduhub/partner_title';
    $title = get_string('partner_title', 'theme_eduhub');
    $description = get_string('partner_title_desc', 'theme_eduhub');
    $default = 'Our Partners';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the caption or description of the partner block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function eduhub_partner_caption($page)
{
    $name = 'theme_eduhub/partner_caption';
    $title = get_string('partner_caption', 'theme_eduhub');
    $description = get_string('partner_caption_desc', 'theme_eduhub');
    $default = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
