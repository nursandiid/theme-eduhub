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
 * Theme eduhub theme functions.
 *
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the heading or title for the login block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function login_heading($page)
{
    $name = 'theme_eduhub/login';
    $heading = get_string('login', 'theme_eduhub');
    $information = get_string('login_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the background image URL for the login page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function login_background_image($page)
{
    $name = 'theme_eduhub/login_background_image';
    $title = get_string('login_background_image', 'theme_eduhub');
    $description = get_string('login_background_image_desc', 'theme_eduhub');
    $filearea = 'login_background_image';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $filearea);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the login position for the login page.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function login_position($page)
{
    $name = 'theme_eduhub/login_position';
    $title = get_string('login_position', 'theme_eduhub');
    $description = get_string('login_position_desc', 'theme_eduhub');
    $choices = [
        'Center',
        'Left',
        'Right',
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 0, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the heading or title for the dashboard footer block.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function dashboard_footer_heading($page)
{
    $name = 'theme_eduhub/dashboard_footer';
    $heading = get_string('dashboard_footer', 'theme_eduhub');
    $information = get_string('dashboard_footer_desc', 'theme_eduhub');
    $setting = new admin_setting_heading($name, $heading, $information);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the selection or type for the dashboard footer.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function dashboard_footer_select($page)
{
    $name = 'theme_eduhub/dashboard_footer_select';
    $title = get_string('dashboard_footer_select', 'theme_eduhub');
    $description = get_string('dashboard_footer_select_desc', 'theme_eduhub');
    $choices = [
        'Moodle footer',
        'Frontpage footer'
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 0, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the address information for the dashboard footer.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function dashboard_footer_address($page)
{
    $name = 'theme_eduhub/dashboard_footer_address';
    $title = get_string('dashboard_footer_address', 'theme_eduhub');
    $description = get_string('dashboard_footer_address_desc', 'theme_eduhub');
    $default = '329 Queensberry Street, North Melbourne';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the phone number for the dashboard footer.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function dashboard_footer_phone($page)
{
    $name = 'theme_eduhub/dashboard_footer_phone';
    $title = get_string('dashboard_footer_phone', 'theme_eduhub');
    $description = get_string('dashboard_footer_phone_desc', 'theme_eduhub');
    $default = '+1123456';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the email address for the dashboard footer.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function dashboard_footer_email($page)
{
    $name = 'theme_eduhub/dashboard_footer_email';
    $title = get_string('dashboard_footer_email', 'theme_eduhub');
    $description = get_string('dashboard_footer_email_desc', 'theme_eduhub');
    $default = 'support@eduhub.com';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}
