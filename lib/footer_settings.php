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
 * Footer select
 * 
 * @param theme_config $theme
 * @return string
 */
function theme_eduhub_footer_select($theme)
{
    if ($theme->settings?->dashboard_footer_select == 1) {
        $templatecontext['footer_select'] = true;
    } else {
        $templatecontext['footer_select'] = false;
    }

    $templatecontext['footer_address'] = $theme->settings?->dashboard_footer_address;
    $templatecontext['footer_phone'] = $theme->settings?->dashboard_footer_phone;
    $templatecontext['footer_email'] = $theme->settings?->dashboard_footer_email;
    $templatecontext['current_year'] = date('Y');

    return $templatecontext;
}
