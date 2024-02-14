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
 * Course utility class
 * 
 * @package    theme_eduhub
 * @copyright  2023 Nursandi
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_eduhub\util;

use core_completion\progress;
use core_course_category;
use stdClass;
use core_course_list_element;
use coursecat_helper;
use moodle_url;

class course {
    /**
     * @var core_course_list_element|stdClass $course
     */
    protected $course;

    /**
     * Class contructor
     *
     * @param stdClass $course
     */
    public function __construct($course) {
        $this->course = $course;
    }

    public function get_summary_image() {
        /**
         * @var stdClass $CFG
         * @var \core_renderer $OUTPUT
         */
        global $CFG, $OUTPUT;
        
        /**
         * @var \stored_file $file
         */
        foreach ($this->course->get_course_overviewfiles() as $file) {
            if ($file->is_valid_image()) {
                $url = moodle_url::make_file_url(
                    "$CFG->wwwroot/pluginfile.php",
                    DIRECTORY_SEPARATOR . $file->get_contextid() .
                        DIRECTORY_SEPARATOR . $file->get_component() .
                        DIRECTORY_SEPARATOR . $file->get_filearea() .
                        DIRECTORY_SEPARATOR . $file->get_filename()
                );

                return $url->out();
            }
        }

        return $OUTPUT->get_generated_image_for_id($this->course->id);
    }

    public function get_course_contacts() {
        $course = new core_course_list_element($this->course);
        $contacts = [];
        if ($course->has_course_contacts()) {
            $instructors = $course->get_course_contacts();
            foreach ($instructors as $instructor) {
                $user = $instructor['user'];
                $userutil = new user($user->id);

                $contacts[] = [
                    'id' => $user->id,
                    'fullname' => fullname($user),
                    'userpicter' => $userutil->get_user_picture(),
                    'role' => $instructor['role']->displayname
                ];
            }
        }

        return $contacts;
    }

    public function get_category() {
        $category = core_course_category::get($this->course->category, IGNORE_MISSING);

        if (!$category) {
            return '';
        }

        return $category->get_formatted_name();
    }

    /**
     * Returns course summary.
     *
     * @param coursecat_helper $chelper
     */
    public function get_summary(coursecat_helper $chelper): string {
        if ($this->course->has_summary()) {
            return $chelper->get_course_formatted_summary($this->course,
                ['overflowdiv' => true, 'noclean' => true, 'para' => false]
            );
        }

        return false;
    }

    /**
     * Returns course custom fields.
     *
     * @return string
     */
    public function get_custom_fields(): string {
        if ($this->course->has_custom_fields()) {
            $handler = \core_course\customfield\course_handler::create();

            return $handler->display_custom_fields_data($this->course->get_custom_fields());
        }

        return '';
    }

    /**
     * Returns HTML to display course enrolment icons.
     *
     * @return array
     */
    public function get_enrolment_icons(): array {
        if ($icons = enrol_get_course_info_icons($this->course)) {
            return $icons;
        }

        return [];
    }

    public function get_progress($userid = null) {
        return progress::get_course_progress_percentage($this->course, $userid);
    }
}