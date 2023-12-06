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

// Replicate the preset setting from boost.                                                                                     
$name = 'theme_eduhub/preset';
$title = get_string('preset', 'theme_eduhub');
$description = get_string('preset_desc', 'theme_eduhub');
$default = 'default.scss';

// We list files in our own file area to add to the drop down. We will provide our own function to                              
// load all the presets from the correct paths.                                                                                 
$context = context_system::instance();
$fs = get_file_storage();
$files = $fs->get_area_files($context->id, 'theme_eduhub', 'preset', 0, 'itemid, filepath, filename', false);

$choices = [];
foreach ($files as $file) {
    $choices[$file->get_filename()] = $file->get_filename();
}
// These are the built in presets from Boost.                                                                                   
$choices['default.scss'] = 'default.scss';
$choices['plain.scss'] = 'plain.scss';

$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Preset files setting.                                                                                                        
$name = 'theme_eduhub/presetfiles';
$title = get_string('presetfiles', 'theme_eduhub');
$description = get_string('presetfiles_desc', 'theme_eduhub');

$setting = new admin_setting_configstoredfile(
    $name,
    $title,
    $description,
    'preset',
    0,
    array('maxfiles' => 20, 'accepted_types' => array('.scss'))
);
$page->add($setting);

// Variable $brand-color.                                                                                                       
// We use an empty default value because the default colour should come from the preset.                                        
$name = 'theme_eduhub/brandcolor';
$title = get_string('brandcolor', 'theme_eduhub');
$description = get_string('brandcolor_desc', 'theme_eduhub');
$default = '#357a32';
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);

// Must add the page after definiting all the settings!                                                                         
$settings->add($page);
