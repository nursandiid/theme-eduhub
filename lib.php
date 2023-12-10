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
 * Theme eduhub lib.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();

// We will add callbacks here as we add features to our theme.

/**
 * Get SCSS files.
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_get_main_scss_content($theme)
{
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.                      
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_eduhub', 'preset', 0, '/', $filename))) {
        // This preset file was fetched from the file area for theme_eduhub and not theme_boost (see the line above).                
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.                                                                                
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.                                        
    $pre = file_get_contents($CFG->dirroot . '/theme/eduhub/scss/pre.scss');
    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.                                    
    $post = file_get_contents($CFG->dirroot . '/theme/eduhub/scss/post.scss');

    // Combine them together.                                                                                                       
    return $pre . "\n" . $scss . "\n" . $post;
}

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_get_extra_scss($theme)
{
    $content = '';

    // Sets the login background image.
    $login_background_image_url = $theme->setting_file_url('login_background_image', 'login_background_image');
    if (!empty($login_background_image_url)) {
        $content .= 'body.pagelayout-login #page { ';
        $content .= "background-image: url('$login_background_image_url');";
        $content .= ' }';
    }

    // Sets the achievement background image.
    $achievement_background_image_url = $theme->setting_file_url('achievement_background_image', 'achievement_background_image');
    if (!empty($achievement_background_image_url)) {
        $content .= '#scholl-achievements { ';
        $content .= "background-image: url('$achievement_background_image_url');";
        $content .= ' }';
    }

    // Always return the background image with the scss when we have it.
    return !empty($theme->settings->scss) ? $theme->settings->scss . ' ' . $content : $content;
}

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return array
 */
function theme_eduhub_get_pre_scss($theme)
{
    $scss = '';

    // Navbar variant
    $navbar_variant = $theme->settings->navbar_variant ?? [];
    $navbar_bg = explode(':', $navbar_variant)[0];
    $navbar_accent = explode(':', $navbar_variant)[1];
    $primary_accent = $theme->settings->brandcolor;

    $scss .= '$navbar-bg: ' . $navbar_bg . ";\n";
    if ($navbar_bg == 'primary') {
        $scss .= '$navbar-accent: ' . $primary_accent . ";\n";
    } else {
        $scss .= '$navbar-accent: ' . $navbar_accent . ";\n";
    }

    $scss .= '$navbar-login-bg-accent: ' . $theme->settings->navbar_login_button_bg_color . ";\n";
    $scss .= '$navbar-login-text-accent: ' . $theme->settings->navbar_login_button_text_color . ";\n";

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    return $scss;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_eduhub_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array())
{
    $theme = theme_config::load('eduhub');
    $files = [
        'login_background_image',
        'achievement_background_image'
    ];

    $slidercount = $theme->settings->slider_count;
    for ($i = 1; $i <= $slidercount; $i++) {
        $files[] = "slider_image_{$i}";
    }

    for ($i = 1; $i <= 4; $i++) {
        $files[] = "feature_block_image_{$i}";
    }

    $total_users = get_config('theme_eduhub', 'testimonial_total_users');
    for ($i = 1; $i <= $total_users; $i++) {
        $files[] = "testimonial_slider_image_{$i}";
    }

    if (
        $context->contextlevel == CONTEXT_SYSTEM && in_array($filearea, $files)
    ) {
        $theme = theme_config::load('eduhub');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }

        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}
