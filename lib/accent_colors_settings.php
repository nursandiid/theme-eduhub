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
 * Theme eduhub general settings lib.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the navbar variant setting from the theme.
 * This function is used to customize the appearance of the navbar.
 * 
 * @param theme_config $theme
 * @return mixed
 */
function theme_eduhub_navbar_variant($theme)
{
    $navbar_variant = $theme->settings->navbar_variant;
    $navbar_bg = explode(':', $navbar_variant)[0];

    $dark_variants = [
        'secondary',
        'dark',
        'black',
        'success',
        'info',
        'danger',
        'blue',
        'indigo',
        'purple',
        'pink',
        'red',
        'green',
        'teal',
        'cyan',
    ];
    $light_variants = [
        'white',
        'light',
        'warning',
        'orange',
        'yellow',
    ];
    $primary_color_variant = 'primary';

    if (in_array($navbar_bg, $dark_variants)) {
        $templatecontext['navbar_variant'] = "navbar-dark bg-{$navbar_bg} text-white";
    } else if (in_array($navbar_bg, $light_variants)) {
        $templatecontext['navbar_variant'] = "navbar-light bg-{$navbar_bg}";
    } else if ($navbar_bg == $primary_color_variant) {
        $templatecontext['navbar_variant'] = "navbar-dark bg-{$navbar_bg} text-white";
    } else {
        $templatecontext['navbar_variant'] = "navbar-light bg-{$navbar_bg} bg-white";
    }

    return $templatecontext;
}