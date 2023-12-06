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

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_slider($theme)
{
    /**
     * @var core_renderer $OUTPUT
     */
    global $OUTPUT;

    $templatecontext['slider_enabled'] = $theme->settings->slider_enabled;

    if (empty($templatecontext['slider_enabled'])) {
        return $templatecontext;
    }

    $slidercount = $theme->settings->slider_count;
    for ($i = 1, $j = 0; $i <= $slidercount; $i++, $j++) {
        $slider_image = "slider_image_{$i}";
        $slider_title = "slider_title_{$i}";
        $slider_caption = "slider_caption_{$i}";

        $templatecontext['slides'][$j]['key'] = $j;
        $templatecontext['slides'][$j]['active'] = false;
        $image = $theme->setting_file_url($slider_image, $slider_image);
        if (empty($image)) {
            $image = $OUTPUT->image_url("slides/$i", 'theme');
        }
        $templatecontext['slides'][$j]['image'] = $image;
        $templatecontext['slides'][$j]['title'] = format_string($theme->settings->$slider_title);
        $templatecontext['slides'][$j]['caption'] = format_string($theme->settings->$slider_caption);

        if ($i === 1) {
            $templatecontext['slides'][$j]['active'] = true;
        }
    }

    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_course($theme)
{
    $templatecontext['course_enabled'] = $theme->settings->course_enabled;
    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_category($theme)
{
    $templatecontext['category_enabled'] = $theme->settings->category_enabled;
    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_feature($theme)
{
    $templatecontext['feature_enabled'] = $theme->settings->feature_enabled;
    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_achievement($theme)
{
    $templatecontext['achievement_enabled'] = $theme->settings->achievement_enabled;
    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_testimonial($theme)
{
    $templatecontext['testimonial_enabled'] = $theme->settings->testimonial_enabled;
    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_partner($theme)
{
    $templatecontext['partner_enabled'] = $theme->settings->partner_enabled;
    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_footer($theme)
{
    $templatecontext['footer_enabled'] = $theme->settings->footer_enabled;
    return $templatecontext;
}
