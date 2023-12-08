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
 * @return mixed
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
 * @return mixed
 */
function theme_eduhub_course($theme)
{
    $templatecontext['course_enabled'] = $theme->settings->course_enabled;
    $templatecontext['course_title'] = $theme->settings->course_title;
    $templatecontext['course_caption'] = $theme->settings->course_caption;

    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_category($theme)
{
    $templatecontext['category_enabled'] = $theme->settings->category_enabled;
    $templatecontext['category_title'] = $theme->settings->category_title;
    $templatecontext['category_caption'] = $theme->settings->category_caption;

    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_feature($theme)
{
    /**
     * @var core_renderer $OUTPUT
     */
    global $OUTPUT;

    $templatecontext['feature_enabled'] = $theme->settings->feature_enabled;
    $templatecontext['feature_title'] = $theme->settings->feature_title;
    $templatecontext['feature_caption'] = $theme->settings->feature_caption;

    for ($i = 1; $i <= 4; $i++) {
        $feature_block_image = "feature_block_image_{$i}";
        $feature_block_title = "feature_block_title_{$i}";
        $feature_block_caption = "feature_block_caption_{$i}";

        $image = $theme->setting_file_url($feature_block_image, $feature_block_image);
        if (empty($image)) {
            $image = $OUTPUT->image_url("features/$i", 'theme');
        }

        $templatecontext['feature_block'][] = [
            'image' => $image,
            'title' => format_string($theme->settings->$feature_block_title),
            'caption' => format_string($theme->settings->$feature_block_caption),
            'mt' => $i == 2 ? 'mt-sm-0 mt-3' : ($i > 2 ? 'mt-lg-5 mt-3' : '')
        ];
    }

    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_achievement($theme)
{
    $templatecontext['achievement_enabled'] = $theme->settings->achievement_enabled;
    $templatecontext['achievement_title'] = $theme->settings->achievement_title;
    $templatecontext['achievement_caption'] = $theme->settings->achievement_caption;
    $templatecontext['achievement_total_students'] = number_format($theme->settings->achievement_total_students);
    $templatecontext['achievement_total_graduates'] = number_format($theme->settings->achievement_total_graduates);
    $templatecontext['achievement_total_free_courses'] = number_format($theme->settings->achievement_total_free_courses);
    $templatecontext['achievement_total_active_courses'] = number_format($theme->settings->achievement_total_active_courses);

    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_testimonial($theme)
{
    /**
     * @var core_renderer $OUTPUT
     */
    global $OUTPUT;

    $templatecontext['testimonial_enabled'] = $theme->settings->testimonial_enabled;
    $templatecontext['testimonial_title'] = $theme->settings->testimonial_title ?? '';
    $templatecontext['testimonial_caption'] = $theme->settings->testimonial_caption ?? '';

    $total_users = $theme->settings->testimonial_total_users;
    foreach (array_chunk(range(1, $total_users), 2) as $key => $users) {
        $testimonial_slides = [];

        for ($i = 1, $j = 0; $i <= count($users); $i++, $j++) {
            $testimonial_slider_image = "testimonial_slider_image_{$i}";
            $testimonial_slider_name = "testimonial_slider_name_{$i}";
            $testimonial_slider_title = "testimonial_slider_title_{$i}";
            $testimonial_slider_caption = "testimonial_slider_caption_{$i}";

            $image = $theme->setting_file_url($testimonial_slider_image, $testimonial_slider_image);
            if (empty($image)) {
                $image = $OUTPUT->image_url("testimonials/{($key + 1)}", 'theme');
            }
            $testimonial_slides['user'][$j]['image'] = $image;
            $testimonial_slides['user'][$j]['name'] = format_string($theme->settings->$testimonial_slider_name ?? '');
            $testimonial_slides['user'][$j]['title'] = format_string($theme->settings->$testimonial_slider_title ?? '');
            $testimonial_slides['user'][$j]['caption'] = format_string($theme->settings->$testimonial_slider_caption ?? '');
        }

        $templatecontext['testimonial_slides'][$key] = $testimonial_slides;
        $templatecontext['testimonial_slides'][$key]['key'] = $key;
        $templatecontext['testimonial_slides'][$key]['active'] = false;
        if ($key === 0) {
            $templatecontext['testimonial_slides'][$key]['active'] = true;
        }
    }

    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_partner($theme)
{
    $templatecontext['partner_enabled'] = $theme->settings->partner_enabled;
    $templatecontext['partner_title'] = $theme->settings->partner_title ?? '';
    $templatecontext['partner_caption'] = $theme->settings->partner_caption ?? '';

    return $templatecontext;
}

/**
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_footer($theme)
{
    $templatecontext['footer_enabled'] = $theme->settings->footer_enabled;

    return $templatecontext;
}
