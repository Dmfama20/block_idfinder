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
 * Moodle form
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @copyright
 * @package
 * @subpackage
 * @author
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class block_form extends moodleform {

    // Define the form
    function definition() {
        global $USER, $CFG, $COURSE;
        

        $mform = $this->_form;
        $userid = $USER->id;
        $strrequired = get_string('required');
        global $PAGE;
        foreach ($PAGE->url->params() as $name => $value) {
            $mform->addElement('hidden', $name, $value);
            $mform->setType($name, PARAM_RAW);
        }

        // Uncomment to disable "Are you sure?" alert when user tries to leave the page.
        // $mform->disable_form_change_checker();

/** MOOSH AUTO-GENERATED */
    
     $mform->addElement('text', 'txt1', get_string('txt1', 'block_idfinder'), array('rows' => 1, 'cols' => 4));
        $mform->setType('txt1', PARAM_INT);
        
        // hidden elements
$mform->addElement('hidden', 'blockid');
 $mform->setType('blockid', PARAM_INT);
$mform->addElement('hidden', 'courseid');   
 $mform->setType('courseid', PARAM_INT);
    

         $this->add_action_buttons($cancel = true, $submitlabel="Prüfen!");
    
        
        
    }
}
