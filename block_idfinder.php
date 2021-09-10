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
 * Newblock block caps.
 *
 * @package    block_idfinder
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_idfinder extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_idfinder');
    }

    function get_content() {
        global $CFG, $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

       $this->content = new stdClass();
//         $this->content->items = array();
//         $this->content->icons = array();
//         $this->content->footer = '';
global $COURSE;

// The other code.

$url = new moodle_url('/blocks/idfinder/view.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
$this->content->footer = html_writer::link($url, get_string('addpage', 'block_idfinder'));
        
// global $COURSE;
// 
// // The other code.
// 
// $url = new moodle_url('/blocks/idfinder/view.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
// $this->content->footer = html_writer::link($url, get_string('addpage', 'block_idfinder'));


        // user/index.php expect course context, so get one if page has module context.
        $currentcontext = $this->page->context->get_course_context(false);

        if (! empty($this->config->text)) {
            $this->content->text = $this->config->text;
        }

       
        if (empty($currentcontext)) {
            return $this->content;
        }
        if ($this->page->course->id == SITEID) {
//             $this->context->text = "site context";
        }
        
        require_once($CFG->dirroot . '/blocks/idfinder/block_form.php');
        
       
//            $txt1 = optional_param('txt1', '', PARAM_INT);
//             $pageparams = array();
//             $pageparams['txt1'] = $txt1;
//          
// 
//         
//      $mform = new block_form();
// 
//      
//      //Set default data (if any)
// // 	$mform->set_data((object)$pageparams);
// 
// 		//Form processing and displaying is done here
// 		if ($mform->is_cancelled()) {
// 		
// 
// 			//Handle form cancel operation, if cancel button is present on form
// 		} else if ($data =  $mform->get_data()) {
// 
// //         $courseurl = new moodle_url('/course/view.php', array('txt1' => $txt1));
//       $path = '/course/view.php?id=' . $txt1;
//             redirect(new \moodle_url($path));
// 			//In this case you process validated data. $mform->get_data() returns data posted in form.
// 			 // This branch is where you process validated data.
//             // Do stuff ...
//         // Typically you finish up by redirecting to somewhere where the user
//             // can see what they did.
//       
// 		}
// 		else {
// 	
// 			// this branch is executed if the form is submitted but the data doesn't validate and the form should be redisplayed
// 			// or on the first display of the form.
// 
// 
// 			//displays the form
// 			$this->content->text = $mform->render();
// 		}
// 
//        
// 
//         return $this->content;
    }

    // my moodle can only have SITEID and it's redundant here, so take it away
    public function applicable_formats() {
        return array('all' => false,
                     'site' => true,
                     'site-index' => true,
                     'course-view' => true, 
                     'course-view-social' => false,
                     'mod' => true, 
                     'mod-quiz' => false);
    }

    public function instance_allow_multiple() {
          return true;
    }

    function has_config() {return true;}

    public function cron() {
            mtrace( "Hey, my cron script is running" );
             
                 // do something
                  
                      return true;
    }
    

}
?> 
