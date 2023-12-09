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

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();

// The name of our plugin.                                                                                                          
$string['pluginname'] = 'Eduhub';
// Name of the settings pages.                                                                                                      
$string['configtitle'] = 'Eduhub settings';
// A description shown in the admin theme selector.                                                                                 
$string['choosereadme'] = 'Theme Eduhub is a child theme of Boost. It adds several styles to improve UI.';
// We need to include a lang string for each block region.                                                                          
$string['region-side-pre'] = 'Right';

// Name of the first settings tab.                                                                                                  
$string['generalsettings'] = 'General settings';
$string['preset'] = 'Theme preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';
$string['presetfiles'] = 'Additional theme preset files';
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href=https://docs.moodle.org/dev/Boost_Presets>Boost presets</a> for information on creating and sharing your own preset files, and see the <a href=http://moodle.net/boost>Presets repository</a> for presets that others have shared.';
$string['brandcolor'] = 'Brand colour';
$string['brandcolor_desc'] = 'The accent colour.';

// The name of the second tab in the theme settings.                                                                                
$string['advancedsettings'] = 'Advanced settings';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';

// The name of theme tab in the theme settings.                                                                                
$string['themesettings'] = 'Theme settings';

$string['login'] = 'Login settings';
$string['login_desc'] = 'Login - Enter the settings';
$string['login_background_image'] = 'Login page background image';
$string['login_background_image_desc'] = 'The image to display as a background for the login page.';

$string['dashboard_footer'] = 'Footer settings';
$string['dashboard_footer_desc'] = 'Dashboard footer - Enter the settings';
$string['dashboard_footer_select'] = 'Dashboard footer';
$string['dashboard_footer_select_desc'] = 'Select the dashboard footer style';
$string['dashboard_footer_address'] = 'Company address';
$string['dashboard_footer_address_desc'] = 'Input company address';
$string['dashboard_footer_phone'] = 'Company phone';
$string['dashboard_footer_phone_desc'] = 'Input company phone';
$string['dashboard_footer_email'] = 'Company email';
$string['dashboard_footer_email_desc'] = 'Input company email';

// The name of the front page tab in the theme settings.                                                                                
$string['frontpagesettings'] = 'Front page settings';

$string['slider'] = 'Slider settings';
$string['slider_desc'] = 'Slider - Enter the settings';
$string['slider_enabled'] = 'Enable slider';
$string['slider_enabled_desc'] = 'Enable or disabled slider to front page';
$string['slider_count'] = 'Slider count';
$string['slider_count_desc'] = 'Select how many slides you want to add then click <b>SAVE</b> to load the input fields.';
$string['slider_image'] = 'Slider picture';
$string['slider_image_desc'] = 'Add an image for your slide.';
$string['slider_title'] = 'Slider title';
$string['slider_title_desc'] = 'Add the slide title.';
$string['slider_caption'] = 'Slider caption';
$string['slider_caption_desc'] = 'Add a caption for your slide.';

$string['course'] = 'Course settings';
$string['course_desc'] = 'Course - Enter the settings';
$string['course_enabled'] = 'Enable course';
$string['course_enabled_desc'] = 'Enable or disabled course to front page.';
$string['course_title'] = 'Course title';
$string['course_title_desc'] = 'Add the course title.';
$string['course_caption'] = 'Course caption';
$string['course_caption_desc'] = 'Add a caption for your course.';

$string['category'] = 'Category settings';
$string['category_desc'] = 'Category - Enter the settings';
$string['category_enabled'] = 'Enable category';
$string['category_enabled_desc'] = 'Enable or disabled category to front page';
$string['category_title'] = 'Category title';
$string['category_title_desc'] = 'Add the category title.';
$string['category_caption'] = 'Category caption';
$string['category_caption_desc'] = 'Add a caption for your category.';

$string['feature'] = 'Feature settings';
$string['feature_desc'] = 'Feature - Enter the settings';
$string['feature_enabled'] = 'Enable feature';
$string['feature_enabled_desc'] = 'Enable or disabled feature to front page';
$string['feature_title'] = 'Feature title';
$string['feature_title_desc'] = 'Add the feature title.';
$string['feature_caption'] = 'Feature caption';
$string['feature_caption_desc'] = 'Add a caption for your feature.';
$string['feature_block_image'] = 'Feature block picture';
$string['feature_block_image_desc'] = 'Add an image for your feature block.';
$string['feature_block_title'] = 'Feature block title';
$string['feature_block_title_desc'] = 'Add the feature block title.';
$string['feature_block_caption'] = 'Feature block caption';
$string['feature_block_caption_desc'] = 'Add a caption for your feature block.';

$string['achievement'] = 'Achievement settings';
$string['achievement_desc'] = 'Achievement - Enter the settings';
$string['achievement_enabled'] = 'Enable achievement';
$string['achievement_enabled_desc'] = 'Enable or disabled achievement to front page';
$string['achievement_title'] = 'Achievement title';
$string['achievement_title_desc'] = 'Add the achievement title.';
$string['achievement_caption'] = 'Achievement caption';
$string['achievement_caption_desc'] = 'Add a caption for your achievement.';
$string['achievement_total_students'] = 'Total students';
$string['achievement_total_students_desc'] = 'Add the total students.';
$string['achievement_total_graduates'] = 'Total graduates';
$string['achievement_total_graduates_desc'] = 'Add the total graduates.';
$string['achievement_total_free_courses'] = 'Total free_courses';
$string['achievement_total_free_courses_desc'] = 'Add the total free courses.';
$string['achievement_total_active_courses'] = 'Total active_courses';
$string['achievement_total_active_courses_desc'] = 'Add the total active courses.';
$string['achievement_background_image'] = 'Achievement section background image';
$string['achievement_background_image_desc'] = 'The image to display as a background for the achievement section.';

$string['testimonial'] = 'Testimonial settings';
$string['testimonial_desc'] = 'Testimonial - Enter the settings';
$string['testimonial_enabled'] = 'Enable testimonial';
$string['testimonial_enabled_desc'] = 'Enable or disabled testimonial to front page';
$string['testimonial_title'] = 'Testimonial title';
$string['testimonial_title_desc'] = 'Add the testimonial title.';
$string['testimonial_caption'] = 'Testimonial caption';
$string['testimonial_caption_desc'] = 'Add a caption for your testimonial.';
$string['testimonial_total_users'] = 'Total users';
$string['testimonial_total_users_desc'] = 'Select how many users you want to add then click <b>SAVE</b> to load the input fields.';
$string['testimonial_slider_image'] = 'User picture';
$string['testimonial_slider_image_desc'] = 'Add an image for your slide.';
$string['testimonial_slider_name'] = 'User name';
$string['testimonial_slider_name_desc'] = 'Add the user name.';
$string['testimonial_slider_title'] = 'User title';
$string['testimonial_slider_title_desc'] = 'Add a title for the user.';
$string['testimonial_slider_caption'] = 'User caption';
$string['testimonial_slider_caption_desc'] = 'Add a caption for your slide.';

$string['partner'] = 'Partner settings';
$string['partner_desc'] = 'Partner - Enter the settings';
$string['partner_enabled'] = 'Enable partner';
$string['partner_enabled_desc'] = 'Enable or disabled partner to front page';
$string['partner_title'] = 'Partner title';
$string['partner_title_desc'] = 'Add the partner title.';
$string['partner_caption'] = 'Partner caption';
$string['partner_caption_desc'] = 'Add a caption for your partner.';

$string['footer'] = 'Footer settings';
$string['footer_desc'] = 'Footer - Enter the settings';
$string['footer_enabled'] = 'Enable footer';
$string['footer_enabled_desc'] = 'Enable or disabled footer to front page';

// The name of the static page tab in the theme settings.                                                                                
$string['staticpagesettings'] = 'Static page settings';

$string['static_page'] = 'Static page';
$string['static_page_desc'] = 'Static page - Enter the settings';
$string['static_page_footer_select'] = 'Static page footer';
$string['static_page_footer_select_desc'] = 'Select the static page footer style';
$string['static_page_count'] = 'Static page count';
$string['static_page_count_desc'] = 'Select how many static page you want to add then click <b>SAVE</b> to load the input fields.';
$string['static_page_url'] = 'Static page url';
$string['static_page_url_desc'] = 'Add the static page url without space, example: <b>/about</b>.';
$string['static_page_title'] = 'Static page title';
$string['static_page_title_desc'] = 'Add the static page title.';
$string['static_page_body'] = 'Static page body';
$string['static_page_body_desc'] = 'Add a body for your static page.';
$string['static_page_custom_css'] = 'Custom css';
$string['static_page_custom_css_desc'] = 'Add a custom css for styling your static page.';
$string['static_page_custom_js'] = 'Custom js';
$string['static_page_custom_js_desc'] = 'Add a custom js for scripting your static page.';
$string['static_page_override_container'] = 'Override default container ?';
$string['static_page_override_container_desc'] = 'This will remove the default content inside the <b>#page</b>';