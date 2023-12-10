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
 * Theme eduhub theme settings lib.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the dashboard container type setting on the theme admin page.
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_dashboard_container_type($theme)
{
    if ($theme->settings?->dashboard_container_type == 1) {
        $templatecontext['container_type'] = 'container-fluid';
    } else {
        $templatecontext['container_type'] = 'container';
    }

    return $templatecontext;
}

/**
 * Retrieves the dashboard navbar container type setting on the theme admin page.
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_dashboard_navbar_container_type($theme)
{
    if ($theme->settings?->dashboard_navbar_container_type == 1) {
        $templatecontext['navbar_container_type'] = 'container-fluid';
    } else {
        $templatecontext['navbar_container_type'] = 'container';
    }

    return $templatecontext;
}

/**
 * Retrieves the login position configuration for the login page.
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_login_position($theme)
{
    if ($theme->settings?->login_position == 1) {
        $templatecontext['login_position'] = 'login-position-left';
    } else if ($theme->settings?->login_position == 2) {
        $templatecontext['login_position'] = 'login-position-right';
    } else {
        $templatecontext['login_position'] = 'login-position-center';
    }

    return $templatecontext;
}

/**
 * Retrieves the selected footer configuration for a specific theme.
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_dashboard_footer_select($theme)
{
    if ($theme->settings?->dashboard_footer_select == 1) {
        $templatecontext['footer_select'] = true;
    } else {
        $templatecontext['footer_select'] = false;
    }

    $templatecontext['footer_address'] = $theme->settings?->dashboard_footer_address;
    $templatecontext['footer_phone'] = $theme->settings?->dashboard_footer_phone;
    $templatecontext['footer_email'] = $theme->settings?->dashboard_footer_email;
    $templatecontext['current_year'] = date('Y');

    return $templatecontext;
}
