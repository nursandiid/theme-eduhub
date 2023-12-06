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
$string['pluginname'] = 'EduHub';
// Name of the settings pages.                                                                                                      
$string['configtitle'] = 'EduHub settings';
// A description shown in the admin theme selector.                                                                                 
$string['choosereadme'] = 'Theme EduHub is a child theme of Boost. It adds several styles to improve UI.';
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
$string['frontpageeduhub'] = 'Front page settings';

$string['slider'] = 'Slider settings';
$string['slider_desc'] = 'Slider - Enter the settings';
$string['slider_enabled'] = 'Enable slider';
$string['slider_enabled_desc'] = 'Enable or disabled slider to front page';
$string['slider_count'] = 'Slider count';
$string['slider_count_desc'] = 'Select how many slides you want to add then click <b>SAVE</b> to load the input fields.';
$string['slider_image'] = 'Slider picture';
$string['slider_image_desc'] = 'Add an image for your slide.';
$string['slider_title'] = 'Slider title';
$string['slider_title_desc'] = "Add the slide's title.";
$string['slider_caption'] = 'Slider caption';
$string['slider_caption_desc'] = 'Add a caption for your slide';

$string['course'] = 'Course settings';
$string['course_desc'] = 'Course - Enter the settings';
$string['course_enabled'] = 'Enable course';
$string['course_enabled_desc'] = 'Enable or disabled course to front page';

$string['category'] = 'Category settings';
$string['category_desc'] = 'Category - Enter the settings';
$string['category_enabled'] = 'Enable category';
$string['category_enabled_desc'] = 'Enable or disabled category to front page';

$string['feature'] = 'Feature settings';
$string['feature_desc'] = 'Feature - Enter the settings';
$string['feature_enabled'] = 'Enable feature';
$string['feature_enabled_desc'] = 'Enable or disabled feature to front page';

$string['achievement'] = 'Achievement settings';
$string['achievement_desc'] = 'Achievement - Enter the settings';
$string['achievement_enabled'] = 'Enable achievement';
$string['achievement_enabled_desc'] = 'Enable or disabled achievement to front page';

$string['testimonial'] = 'Testimonial settings';
$string['testimonial_desc'] = 'Testimonial - Enter the settings';
$string['testimonial_enabled'] = 'Enable testimonial';
$string['testimonial_enabled_desc'] = 'Enable or disabled testimonial to front page';

$string['partner'] = 'Partner settings';
$string['partner_desc'] = 'Partner - Enter the settings';
$string['partner_enabled'] = 'Enable partner';
$string['partner_enabled_desc'] = 'Enable or disabled partner to front page';

$string['footer'] = 'Footer settings';
$string['footer_desc'] = 'Footer - Enter the settings';
$string['footer_enabled'] = 'Enable footer';
$string['footer_enabled_desc'] = 'Enable or disabled footer to front page';
