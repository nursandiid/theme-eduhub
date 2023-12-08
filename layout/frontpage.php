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

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once(__DIR__ . '/../global_vars.php');
require_once(__DIR__ . '/../lib/frontpage_settings.php');
require_once(__DIR__ . '/../lib/footer_settings.php');

// Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();

if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
} else {
    $courseindexopen = false;
    $blockdraweropen = false;
}

if (defined('BEHAT_SITE_RUNNING') && get_user_preferences('behat_keep_drawer_closed') != 1) {
    $blockdraweropen = true;
}

$extraclasses = ['uses-drawers'];
if ($courseindexopen) {
    $extraclasses[] = 'drawer-open-index';
}

$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
if (!$hasblocks) {
    $blockdraweropen = false;
}
$courseindex = core_course_drawer();
if (!$courseindex) {
    $courseindexopen = false;
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions() && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);

// Create a fake context for the front page
$fullCourse = array_values(get_courses('all', 'timecreated DESC', 'c.*'));

// Process courses to get detailed information
$courselist = [];
foreach ($fullCourse as $key => $course) {
    // Get more details about each course
    $courseDetails = new stdClass();
    $courseDetails->id = $course->id;
    $courseDetails->fullname = $course->fullname;

    // Example: Get category information
    $category = core_course_category::get($course->category);
    $courseDetails->category = $category->name;

    if ($courseDetails->category === 'Pages') {
        continue;
    }

    // Example: Get course image URL
    // Note: Adjust the image property based on your Moodle version
    $image = course_get_courseimage($course);
    if ($image) {
        $imageUrl = "{$CFG->wwwroot}/pluginfile.php/{$image->get_contextid()}/{$image->get_component()}/{$image->get_filearea()}/{$image->get_filename()}";

        $courseDetails->image_url = $imageUrl;
    } else {
        $courseDetails->image_url = $OUTPUT->image_url('thumbnails/1', 'theme');
    }

    $courselist[] = $courseDetails;

    if (count($courselist) === 8) {
        break;
    }
}

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => \core\context\course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'forceblockdraweropen' => $forceblockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'overflow' => $overflow,
    'headercontent' => $headercontent,
    'addblockbutton' => $addblockbutton,
    'courselist' => $courselist
];

$theme = theme_config::load('eduhub');

$templatecontext = array_merge($templatecontext, theme_eduhub_slider($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_course($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_category($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_feature($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_achievement($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_testimonial($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_partner($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_footer($theme));
$templatecontext = array_merge($templatecontext, theme_eduhub_footer_select($theme));

echo $OUTPUT->render_from_template('theme_eduhub/frontpage', $templatecontext);
