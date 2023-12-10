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
 * Theme eduhub theme settings.
 *
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once __DIR__ . '/functions/theme_function.php';

// Theme settings.                                                                              
$page = new admin_settingpage('theme_eduhub_theme', get_string('themesettings', 'theme_eduhub'));

// Accent color settings
eduhub_brand_color($page);
eduhub_navbar_variant($page);
eduhub_navbar_login_button_bg_color($page);
eduhub_navbar_login_button_text_color($page);

// Container type settings.
eduhub_dashboard_container_type($page);
eduhub_dashboard_navbar_container_type($page);

// Login settings.
eduhub_login_heading($page);
eduhub_login_background_image($page);
eduhub_login_position($page);

// Dashboard footer settings.
eduhub_dashboard_footer_heading($page);
eduhub_dashboard_footer_select($page);
eduhub_dashboard_footer_address($page);
eduhub_dashboard_footer_phone($page);
eduhub_dashboard_footer_email($page);

$settings->add($page);
