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

// Login settings.
login_heading($page);
login_background_image($page);
login_position($page);

// Dashboard footer settings.
dashboard_footer_heading($page);
dashboard_footer_select($page);
dashboard_footer_address($page);
dashboard_footer_phone($page);
dashboard_footer_email($page);

$settings->add($page);
