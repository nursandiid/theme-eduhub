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
 * @package   theme_eduhub
 * @copyright 2023 Nursandi
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_eduhub\output;

require_once __DIR__ . '/../../lib/course_settings.php';

/**
 * Core render
 */
class core_renderer extends \theme_boost\output\core_renderer
{
    /**
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function eduhub_course_header_img()
    {
        $templatecontext['course_header_img'] = eduhub_get_course_image($this->page->course->id);
        return $templatecontext;
    }

    /**
     * Get base url base on config.
     * 
     * @param string $url 
     * @param array $params
     * @return string HTML to display the main header.
     */
    public function eduhub_base_url($url = '/', array $params = null)
    {
        $templatecontext['base_url'] = rtrim(new \moodle_url($url, $params), '/');
        return $templatecontext;
    }
}
