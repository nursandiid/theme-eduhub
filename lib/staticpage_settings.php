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
 * @return array
 */
function theme_eduhub_static_page_select($theme, $url)
{
    $static_page_count = $theme->settings->static_page_count;
    $static_pages = [];
    for ($i = 1; $i <= $static_page_count; $i++) {
        $static_page_url = "static_page_url_{$i}";
        $static_page_title = "static_page_title_{$i}";
        $static_page_body = "static_page_body_{$i}";
        $static_page_custom_css = "static_page_custom_css_{$i}";
        $static_page_custom_js = "static_page_custom_js_{$i}";
        $static_page_override_container = "static_page_override_container_{$i}";
        
        if ($theme->settings->$static_page_override_container == 1) {
            $static_page_override_container = true;
        } else {
            $static_page_override_container = false;
        }

        $static_pages[] = [
            'static_page_url' => format_string($theme->settings->$static_page_url),
            'static_page_title' => format_string($theme->settings->$static_page_title),
            'static_page_body' => $theme->settings->$static_page_body,
            'static_page_custom_css' => $theme->settings->$static_page_custom_css,
            'static_page_custom_js' => $theme->settings->$static_page_custom_js,
            'static_page_override_container' => $static_page_override_container
        ];
    }

    $selected_page = array_filter($static_pages, function ($item) use ($url) {
        return $item['static_page_url'] == strtolower("/$url");
    });

    if (count($selected_page) === 0) {
        throw new \moodle_exception('pagenotfound', 'eduhub_staticpage');
    }

    return $selected_page[array_key_first($selected_page)];
}

/**
 * Footer select
 * 
 * @param theme_config $theme
 * @return array
 */
function theme_eduhub_static_page_footer_select($theme)
{
    if ($theme->settings?->static_page_footer_select == 1) {
        $footer['footer_select'] = true;
    } else {
        $footer['footer_select'] = false;
    }

    $footer['footer_address'] = $theme->settings?->dashboard_footer_address;
    $footer['footer_phone'] = $theme->settings?->dashboard_footer_phone;
    $footer['footer_email'] = $theme->settings?->dashboard_footer_email;
    $footer['current_year'] = date('Y');

    return $footer;
}
