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
 * Theme eduhub static page settings lib.
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retrieves and returns the selected static page for the Eduhub theme.
 * 
 * @param theme_config $theme
 * @return array
 */
function theme_eduhub_static_page_selected($theme, $url)
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
 * Retrieves the selected footer configuration for static pages in a specific theme.
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

/**
 * Loads and configures the container settings for the Eduhub theme on static pages.
 *
 * @param array $static_page An array containing static page settings.
 * @param DOMDocument $dom
 * @return void
 */
function eduhub_load_container($static_page, $dom)
{
    if ($static_page['static_page_override_container']) {
        $dom->getElementById('page')?->setAttribute('class', 'mt-0');
        $dom->getElementById('topofscroll')?->setAttribute('class', 'mt-0');
        $dom->getElementById('page-header')?->remove();
        $dom->getElementById('page-footer')?->setAttribute('class', 'mt-0');
        $dom->getElementById('page-content')?->remove();

        // Override header
        // Find the target div with specific class and insert the page header
        $page = $dom->getElementById('page');
        if ($page) {
            $page_header = '
                <div class="static-page-banner" id="static-page-banner" style="margin-top: 60px">
                    <div class="container">
                        <div class="overlay">
                            <h2 class="fa-2x text-white">' . $static_page['static_page_title'] . '</h2>
                        </div>
                    </div>
                </div>
            ';

            $contentDom = new DOMDocument();
            @$contentDom->loadHTML($page_header);

            $newBody = $contentDom->getElementsByTagName('body')->item(0);

            // Iterate through the children of the body and prepend them to the target div's parent
            foreach ($newBody->childNodes as $node) {
                $importedNode = $dom->importNode($node, true);
                $page->parentNode->insertBefore($importedNode, $page->previousSibling);
            }
        }

        // Override default content
        // Find the target div with specific class and insert the content
        $page_banner = $dom->getElementById('static-page-banner');
        if ($page_banner) {
            $page_body = $static_page['static_page_body'];

            $contentDom = new DOMDocument();
            @$contentDom->loadHTML($page_body);

            $newBody = $contentDom->getElementsByTagName('body')->item(0);

            // Iterate through the children of the body and append them to the target div's parent
            foreach ($newBody->childNodes as $node) {
                $importedNode = $dom->importNode($node, true);
                $page_banner->parentNode->insertBefore($importedNode, $page_banner->nextSibling);
            }
        }
    } else {
        // Find the target div with specific class and insert the content
        $main_content = $dom->getElementById('maincontent');
        if ($main_content) {
            $page_body = $static_page['static_page_body'];

            $contentDom = new DOMDocument();
            @$contentDom->loadHTML($page_body);

            $newBody = $contentDom->getElementsByTagName('body')->item(0);

            // Iterate through the children of the body and append them to the target div's parent
            foreach ($newBody->childNodes as $node) {
                $importedNode = $dom->importNode($node, true);
                $main_content->parentNode->insertBefore($importedNode, $main_content->nextSibling);
            }
        }
    }
}

/**
 * Loads and applies custom CSS styles for the Eduhub theme on static pages.
 *
 * @param array $static_page An array containing static page settings.
 * @param DOMDocument $dom
 * @return void
 */
function eduhub_load_custom_css($static_page, $dom)
{
    if ($static_page['static_page_custom_css']) {
        $head = $dom->getElementsByTagName('head')->item(0);
        if ($head) {
            $css = $static_page['static_page_custom_css'];

            // Create a new style element
            $styleElement = $dom->createElement('style');
            $styleElement->setAttribute('type', 'text/css');
            $styleElement->nodeValue = $css;

            // Append the style element to the head
            $head->appendChild($styleElement);
        }
    }
}

/**
 * Overrides and configures icon settings using DOMDocument.
 *
 * @param DOMDocument $dom
 * @return void
 */
function eduhub_load_icons($dom)
{
    $xpath = new DOMXPath($dom);

    // Find all elements with the specified class using XPath
    $icons = $xpath->query('//span[contains(@class, "fas") or contains(@class, "fab") or contains(@class, "far")]');

    // Iterate through each element and remove whitespace
    foreach ($icons as $icon) {
        // Check if the node is a DOMText (text node)
        if ($icon->firstChild instanceof DOMText) {
            // Trim and replace whitespace
            $icon->firstChild->nodeValue = '';
        }
    }
}
