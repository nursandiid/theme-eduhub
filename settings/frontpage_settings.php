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

require_once __DIR__ . '/blocks/slider_block.php';

defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_eduhub_frontpage', get_string('frontpageeduhub', 'theme_eduhub'));

// Enable sliders to front page
eduhub_slider_heading($page);
eduhub_slider_enabled($page);
eduhub_slider_count($page);
eduhub_slider_setting($page);

// Enable courses to front page
$name = 'theme_eduhub/course';
$heading = get_string('course', 'theme_eduhub');
$information = get_string('course_desc', 'theme_eduhub');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_eduhub/course_enabled';
$title = get_string('course_enabled', 'theme_eduhub');
$description = get_string('course_enabled_desc', 'theme_eduhub');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Enable categories to front page
$name = 'theme_eduhub/category';
$heading = get_string('category', 'theme_eduhub');
$information = get_string('category_desc', 'theme_eduhub');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_eduhub/category_enabled';
$title = get_string('category_enabled', 'theme_eduhub');
$description = get_string('category_enabled_desc', 'theme_eduhub');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Enable features to front page
$name = 'theme_eduhub/feature';
$heading = get_string('feature', 'theme_eduhub');
$information = get_string('feature_desc', 'theme_eduhub');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_eduhub/feature_enabled';
$title = get_string('feature_enabled', 'theme_eduhub');
$description = get_string('feature_enabled_desc', 'theme_eduhub');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Enable achievements to front page
$name = 'theme_eduhub/achievement';
$heading = get_string('achievement', 'theme_eduhub');
$information = get_string('achievement_desc', 'theme_eduhub');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_eduhub/achievement_enabled';
$title = get_string('achievement_enabled', 'theme_eduhub');
$description = get_string('achievement_enabled_desc', 'theme_eduhub');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Enable testimonials to front page
$name = 'theme_eduhub/testimonial';
$heading = get_string('testimonial', 'theme_eduhub');
$information = get_string('testimonial_desc', 'theme_eduhub');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_eduhub/testimonial_enabled';
$title = get_string('testimonial_enabled', 'theme_eduhub');
$description = get_string('testimonial_enabled_desc', 'theme_eduhub');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Enable partners to front page
$name = 'theme_eduhub/partner';
$heading = get_string('partner', 'theme_eduhub');
$information = get_string('partner_desc', 'theme_eduhub');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_eduhub/partner_enabled';
$title = get_string('partner_enabled', 'theme_eduhub');
$description = get_string('partner_enabled_desc', 'theme_eduhub');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Enable footer to front page
$name = 'theme_eduhub/footer';
$heading = get_string('footer', 'theme_eduhub');
$information = get_string('footer_desc', 'theme_eduhub');
$setting = new admin_setting_heading($name, $heading, $information);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$name = 'theme_eduhub/footer_enabled';
$title = get_string('footer_enabled', 'theme_eduhub');
$description = get_string('footer_enabled_desc', 'theme_eduhub');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

$settings->add($page);
