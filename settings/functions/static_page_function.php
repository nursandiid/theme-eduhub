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
 * Theme eduhub static page functions.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves the selection or type for the static page footer.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function static_page_footer_select($page)
{
    $name = 'theme_eduhub/static_page_footer_select';
    $title = get_string('static_page_footer_select', 'theme_eduhub');
    $description = get_string('static_page_footer_select_desc', 'theme_eduhub');
    $choices = [
        'Moodle footer',
        'Frontpage footer'
    ];
    $setting = new admin_setting_configselect($name, $title, $description, 0, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the total count of static pages.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function static_page_count($page)
{
    $name = 'theme_eduhub/static_page_count';
    $title = get_string('static_page_count', 'theme_eduhub');
    $description = get_string('static_page_count_desc', 'theme_eduhub');
    $default = 0;
    $choices = range(0, 6);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
}

/**
 * Retrieves the settings or configuration for static pages.
 * 
 * @param admin_settingpage $page
 * @return void
 */
function static_page_setting($page)
{
    // If we don't have an static page yet, default to the preset.
    $static_page_count = get_config('theme_eduhub', 'static_page_count');
    for ($count = 1; $count <= $static_page_count; $count++) {
        $name = 'theme_eduhub/static_page_' . $count;

        $suffix = (get_config('theme_eduhub', 'static_page_title_' . $count) ?? $count);
        $heading = get_string('static_page', 'theme_eduhub') . ' - ' . $suffix;
        $information = get_string('static_page_desc', 'theme_eduhub') . ' - ' . $suffix;
        if ($url = get_config('theme_eduhub', 'static_page_url_' . $count)) {
            $url = trim($url, '/');
            $information .= "<br>- The url will show in /theme/eduhub/staticpage/view.php?page=$url";
            $information .= "<br>- If you have already configure <b>.htaccess</b> file you can access the url with /page/$url";
        }

        $setting = new admin_setting_heading($name, $heading, $information);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Static page url.
        $name = 'theme_eduhub/static_page_url_' . $count;
        $title = get_string('static_page_url', 'theme_eduhub');
        $description = get_string('static_page_url_desc', 'theme_eduhub');
        $setting = new admin_setting_configtext($name, $title, $description, '');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Static page title.
        $name = 'theme_eduhub/static_page_title_' . $count;
        $title = get_string('static_page_title', 'theme_eduhub');
        $description = get_string('static_page_title_desc', 'theme_eduhub');
        $default = 'Page title';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Static page body.
        $name = 'theme_eduhub/static_page_body_' . $count;
        $title = get_string('static_page_body', 'theme_eduhub');
        $description = get_string('static_page_body_desc', 'theme_eduhub');
        $default = 'Some representative placeholder content for the body.';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Static page custom css.
        $name = 'theme_eduhub/static_page_custom_css_' . $count;
        $title = get_string('static_page_custom_css', 'theme_eduhub');
        $description = get_string('static_page_custom_css_desc', 'theme_eduhub');
        $setting = new admin_setting_configtextarea($name, $title, $description, '');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Static page custom js.
        $name = 'theme_eduhub/static_page_custom_js_' . $count;
        $title = get_string('static_page_custom_js', 'theme_eduhub');
        $description = get_string('static_page_custom_js_desc', 'theme_eduhub');
        $setting = new admin_setting_configtextarea($name, $title, $description, '');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        // Static page override container.
        $name = 'theme_eduhub/static_page_override_container_' . $count;
        $title = get_string('static_page_override_container', 'theme_eduhub');
        $description = get_string('static_page_override_container_desc', 'theme_eduhub');
        $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);
    }
}
