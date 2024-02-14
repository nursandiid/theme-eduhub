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
 * Parent theme: boost
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Moodle IntelliSense for global variables.
 * 
 * Configuration settings for Moodle.
 * @var \stdClass $CFG
 *
 * The renderer responsible for generating HTML output in the Eduhub theme.
 * @var \theme_eduhub\output\core_renderer $OUTPUT
 *
 * Represents the current page being displayed in Moodle.
 * @var \moodle_page $PAGE
 *
 * Information about the site, including its name and other relevant details.
 * @var \stdClass $SITE
 */

require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once(__DIR__ . '/../lib/frontpage_settings.php');
require_once(__DIR__ . '/../lib/static_page_settings.php');
require_once(__DIR__ . '/../lib/accent_colors_settings.php');

$bodyattributes = $OUTPUT->body_attributes([]);
$primary = new \theme_eduhub\output\navigation\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'primarymoremenu' => $primarymenu['moremenu'],
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
];

$theme = theme_config::load('eduhub');

$templatecontext = array_merge($templatecontext, theme_eduhub_container_type($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_navbar_container_type($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_static_page_footer_select($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_navbar_variant($theme));

echo $OUTPUT->render_from_template('theme_eduhub/staticpage', $templatecontext);