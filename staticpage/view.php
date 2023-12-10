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
 * Theme eduhub staticpage.
 *
 * @package   theme_eduhub
 * @copyright 2022 Nursandi
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/blocklib.php');
require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once(__DIR__ . '/../global_vars.php');
require_once(__DIR__ . '/../lib/static_page_settings.php');

// Require login if the plugin or Moodle is configured to force login.
if ($CFG->forcelogin) {
    require_login();
}

// Get requested page's name.
$page = required_param('page', PARAM_ALPHANUMEXT);

// Set page url.
$PAGE->set_url('/theme/eduhub/staticpage/view.php?page=' . $page);

// Set page context.
$PAGE->set_context(context_system::instance());

// Set page layout.
$PAGE->set_pagelayout('staticpage');

// Add page name as body class.
$PAGE->add_body_class('eduhub-staticpage-' . $page);

$theme = theme_config::load('eduhub');
$static_page = theme_eduhub_static_page_selected($theme, $page);

// Set page title.
$PAGE->set_title($static_page['static_page_title']);

// Set page heading
$PAGE->set_heading($static_page['static_page_title'] ?? 'Test');

// Load custom script
if ($static_page['static_page_custom_js']) {
    $PAGE->requires->js_init_code($static_page['static_page_custom_js']);
}

$header = $OUTPUT->header();
$footer = $OUTPUT->footer();
$html   = $header . $footer;

// Define new DOM
$dom = new DOMDocument;
@$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

// If container is overrided
eduhub_load_container($static_page, $dom);

// Load a custom css
eduhub_load_custom_css($static_page, $dom);

// Get all elements icon with the specified class fas, fab, far
eduhub_load_icons($dom);

// Save the modified HTML
echo $dom->saveHTML();
