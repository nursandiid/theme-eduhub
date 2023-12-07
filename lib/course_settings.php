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
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Get course image.
 *
 * @param int $id course id.
 * @return url
 */
function eduhub_get_course_image($id)
{
    global $CFG;
    require_once($CFG->libdir . '/filelib.php');

    $url = '';
    $context = context_course::instance($id);
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', 0);

    foreach ($files as $f) {
        if ($f->is_valid_image()) {
            $url = moodle_url::make_pluginfile_url(
                $f->get_contextid(),
                $f->get_component(),
                $f->get_filearea(),
                null,
                $f->get_filepath(),
                $f->get_filename(),
                false
            );
        }
    }
    
    return $url;
}
