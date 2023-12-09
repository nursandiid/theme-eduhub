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
 * Theme eduhub frontpage settings.
 *
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once __DIR__ . '/functions/frontpage_function.php';
require_once __DIR__ . '/blocks/slider_block.php';
require_once __DIR__ . '/blocks/course_block.php';
require_once __DIR__ . '/blocks/category_block.php';
require_once __DIR__ . '/blocks/feature_block.php';
require_once __DIR__ . '/blocks/achievement_block.php';
require_once __DIR__ . '/blocks/testimonial_block.php';
require_once __DIR__ . '/blocks/partner_block.php';
require_once __DIR__ . '/blocks/footer_block.php';

$page = new admin_settingpage('theme_eduhub_frontpage', get_string('frontpagesettings', 'theme_eduhub'));

// Container type settings
eduhub_container_type($page);
eduhub_navbar_container_type($page);

// Enable sliders to front page
eduhub_slider_heading($page);
eduhub_slider_enabled($page);
eduhub_slider_count($page);
eduhub_slider_setting($page);

// Enable courses to front page
eduhub_course_heading($page);
eduhub_course_enabled($page);
eduhub_course_title($page);
eduhub_course_caption($page);

// Enable categories to front page
eduhub_category_heading($page);
eduhub_category_enabled($page);
eduhub_category_title($page);
eduhub_category_caption($page);

// Enable features to front page
eduhub_feature_heading($page);
eduhub_feature_enabled($page);
eduhub_feature_title($page);
eduhub_feature_caption($page);
eduhub_feature_block($page);

// Enable achievements to front page
eduhub_achievement_heading($page);
eduhub_achievement_enabled($page);
eduhub_achievement_title($page);
eduhub_achievement_caption($page);
eduhub_achievement_total_students($page);
eduhub_achievement_total_graduates($page);
eduhub_achievement_total_free_courses($page);
eduhub_achievement_total_active_courses($page);
eduhub_achievement_background_image($page);

// Enable testimonials to front page
eduhub_testimonial_heading($page);
eduhub_testimonial_enabled($page);
eduhub_testimonial_title($page);
eduhub_testimonial_caption($page);
eduhub_testimonial_total_users($page);
eduhub_testimonial_slider_setting($page);

// Enable partners to front page
eduhub_partner_heading($page);
eduhub_partner_enabled($page);
eduhub_partner_title($page);
eduhub_partner_caption($page);

// Enable footer to front page
eduhub_footer_heading($page);
eduhub_footer_enabled($page);

$settings->add($page);
