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

require_once($CFG->dirroot . '/config.php');
require_once($CFG->libdir . '/blocklib.php');
require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once(__DIR__ . '/../global_vars.php');
require_once(__DIR__ . '/../lib/staticpage_settings.php');

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
$PAGE->set_pagelayout('standard');

// Add page name as body class.
$PAGE->add_body_class('eduhub-staticpage-' . $page);

$theme = theme_config::load('eduhub');
$static_page = theme_eduhub_static_page_select($theme, $page);
$static_page_footer = theme_eduhub_static_page_footer_select($theme);

extract($static_page_footer);

// Set page title.
$PAGE->set_title($static_page['static_page_title']);

// Set page heading
$PAGE->set_heading($static_page['static_page_title']);

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

// Select footer
if ($footer_select) {
    $footer = $dom->getElementById('page-footer');
    $footer?->setAttribute('class', 'd-none');

    // Find the target div with specific class
    $targetDiv = $dom->getElementById('page');

    if ($targetDiv) {
        $footer_content = <<<FOOTER
        <footer id="footer">
            <div class="footer-1 text-white">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 text-white-80">
                            <div class="footer-logo mb-4">
                                <img src="{$OUTPUT->get_compact_logo_url()}" style="height: 60px;">
                            </div>
                            <p>$footer_address</p>
                            <p class="mb-1">
                                <i class="fas fa-phone mr-2"></i>
                                <a href="https://wa.me/$footer_phone" target="_blank"
                                    class="text-light text-decoration-none">$footer_phone</a>
                            </p>
                            <p class="mb-lg-1 mb-4">
                                <i class="fas fa-envelope mr-2"></i>
                                <a href="mailto:$footer_email" target="_blank"
                                    class="text-light text-decoration-none">$footer_email</a>
                            </p>
                        </div>
                        <div class="col-lg-3 col-sm-6 text-white-80">
                            <h5 class="mb-lg-4 mb-2">Company</h5>
                            <p class="mb-1">
                                <a href="#" class="text-light text-decoration-none">About Us </a>
                            </p>
                            <p class="mb-1">
                                <a href="#" class="text-light text-decoration-none">Blog </a>
                            </p>
                            <p class="mb-lg-1 mb-4">
                                <a href="#" class="text-light text-decoration-none">Contact </a>
                            </p>
                        </div>
                        <div class="col-lg-3 col-sm-6 text-white-80">
                            <h5 class="mb-lg-4 mb-2">Support</h5>
                            <p class="mb-1">
                                <a href="#" class="text-light text-decoration-none">Documentation</a>
                            </p>
                            <p class="mb-lg-1 mb-4">
                                <a href="#" class="text-light text-decoration-none">Forums</a>
                            </p>
                        </div>
                        <div class="col-lg-3 col-sm-6 text-white-80">
                            <h5 class="mb-lg-4 mb-2">Newslatter</h5>
                            <form action="#" method="post" class="input-group mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Enter your email" value="">
                                <input type="hidden" name="_token">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-3"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="footer-2 text-white">
                <div class="container pt-3">
                    <div class="text-center">
                        <p>Copyright &copy; $current_year Eduhub Moodle Theme by Nursandi. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        FOOTER;

        $footerDom = new DOMDocument();
        @$footerDom->loadHTML($footer_content);

        $newBody = $footerDom->getElementsByTagName('body')->item(0);

        // Iterate through the children of the body and append them to the target div's parent
        foreach ($newBody->childNodes as $node) {
            $importedNode = $dom->importNode($node, true);
            $targetDiv->parentNode->insertBefore($importedNode, $targetDiv->nextSibling);
        }
    }
}

// If container is overrided
if ($static_page['static_page_override_container']) {
    $default_output = $dom->getElementById('topofscroll')?->setAttribute('class', 'd-none');
    $page_content = $dom->getElementById('page-content')?->remove();

    // Override header
    // Find the target div with specific class and insert the page header
    $targetDiv = $dom->getElementById('page');
    if ($targetDiv) {
        $page_header = '
            <div class="static-page-banner" id="static-page-banner">
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

        // Iterate through the children of the body and append them to the target div's parent
        foreach ($newBody->childNodes as $node) {
            $importedNode = $dom->importNode($node, true);
            $targetDiv->parentNode->insertBefore($importedNode, $targetDiv->nextSibling);
        }
    }

    // Override default content
    // Find the target div with specific class and insert the content
    $targetDiv = $dom->getElementById('static-page-banner');
    if ($targetDiv) {
        $page_body = $static_page['static_page_body'];

        $contentDom = new DOMDocument();
        @$contentDom->loadHTML($page_body);

        $newBody = $contentDom->getElementsByTagName('body')->item(0);

        // Iterate through the children of the body and append them to the target div's parent
        foreach ($newBody->childNodes as $node) {
            $importedNode = $dom->importNode($node, true);
            $targetDiv->parentNode->insertBefore($importedNode, $targetDiv->nextSibling);
        }
    }
} else {
    // Find the target div with specific class and insert the content
    $targetDiv = $dom->getElementById('maincontent');
    if ($targetDiv) {
        $page_body = $static_page['static_page_body'];

        $contentDom = new DOMDocument();
        @$contentDom->loadHTML($page_body);

        $newBody = $contentDom->getElementsByTagName('body')->item(0);

        // Iterate through the children of the body and append them to the target div's parent
        foreach ($newBody->childNodes as $node) {
            $importedNode = $dom->importNode($node, true);
            $targetDiv->parentNode->insertBefore($importedNode, $targetDiv->nextSibling);
        }
    }
}

// Load a custom css
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

// Get all elements icon with the specified class fas, fab, far
$xpath = new DOMXPath($dom);

// Find all elements with the specified class using XPath
$icons = $xpath->query('//span[contains(@class, "fas") or contains(@class, "fab") or contains(@class, "far")]');

// Iterate through each element and remove whitespace
foreach ($icons as $element) {
    // Check if the node is a DOMText (text node)
    if ($element->firstChild instanceof DOMText) {
        // Trim and replace whitespace
        $element->firstChild->nodeValue = '';
    }
}

// Save the modified HTML
echo $dom->saveHTML();
