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
 * Parent core: navigation
 *
 * @package   theme_eduhub
 * @copyright 2023 Nursandi
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_eduhub\output\core\navigation\output;

use renderable;
use renderer_base;
use templatable;
use custom_menu;

class primary extends \core\navigation\output\primary
{
    /** @var \moodle_page $page the moodle page that the navigation belongs to */
    private $page = null;

    /**
     * primary constructor.
     * @param \moodle_page $page
     */
    public function __construct($page)
    {
        parent::__construct($page);

        $this->page = $page;
    }

    /**
     * Combine the various menus into a standardized output.
     *
     * @param renderer_base|null $output
     * @return array
     */
    public function export_for_template(?renderer_base $output = null): array
    {
        if (!$output) {
            $output = $this->page->get_renderer('core');
        }

        $menudata = (object) $this->merge_primary_and_custom($this->get_primary_nav(), $this->get_custom_menu($output));
        $moremenu = new \core\navigation\output\more_menu($menudata, 'navbar-nav', false);
        $mobileprimarynav = $this->merge_primary_and_custom($this->get_primary_nav(), $this->get_custom_menu($output), true);

        $languagemenu = new \core\output\language_menu($this->page);

        return [
            'mobileprimarynav' => $mobileprimarynav,
            'moremenu' => $moremenu->export_for_template($output),
            'lang' => !isloggedin() || isguestuser() ? $languagemenu->export_for_template($output) : [],
            'user' => $this->get_user_menu($output)
        ];
    }

    /**
     * Get the primary nav object and standardize the output
     *
     * @param \navigation_node|null $parent used for nested nodes, by default the primarynav node
     * @return array
     */
    public function get_primary_nav($parent = null): array
    {
        if ($parent === null) {
            $parent = $this->page->primarynav;
        }
        $nodes = [];
        foreach ($parent->children as $node) {
            $children = $this->get_primary_nav($node);
            $activechildren = array_filter($children, function ($child) {
                return !empty($child['isactive']);
            });
            if ($node->preceedwithhr && count($nodes) && empty($nodes[count($nodes) - 1]['divider'])) {
                $nodes[] = ['divider' => true];
            }
            $nodes[] = [
                'title' => $node->get_title(),
                'url' => $node->action(),
                'text' => $node->text,
                'icon' => $node->icon,
                'isactive' => $node->isactive || !empty($activechildren),
                'key' => $node->key,
                'children' => $children,
                'haschildren' => !empty($children) ? 1 : 0,
                'custom_class' => ''
            ];
        }

        return $nodes;
    }

    /**
     * Custom menu items reside on the same level as the original nodes.
     * Fetch and convert the nodes to a standardised array.
     *
     * @param renderer_base $output
     * @return array
     */
    public function get_custom_menu(renderer_base $output): array
    {
        global $CFG;

        // Early return if a custom menu does not exists.
        if (empty($CFG->custommenuitems)) {
            return [];
        }

        $custommenuitems = $CFG->custommenuitems;
        $currentlang = current_language();
        $custommenunodes = custom_menu::convert_text_to_menu_nodes($custommenuitems, $currentlang);
        $nodes = [];
        foreach ($custommenunodes as $node) {
            $temp = $node->export_for_template($output);
            $temp->custom_class = 'd-lg-block d-md-none';

            $nodes[] = $temp;
        }

        return $nodes;
    }
}
