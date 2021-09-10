<?php

require_once('../../config.php');
require_once('block_form.php');

global $DB;



// Check for all required variables.
$courseid = required_param('courseid', PARAM_INT);

$blockid = required_param('blockid', PARAM_INT);

// Next look for optional variables.
$id = optional_param('id', 0, PARAM_INT);
$searchid = optional_param('searchid', 0, PARAM_INT);



if (!$course = $DB->get_record('course', array('id' => $courseid))) {
    print_error('invalidcourse', 'block_idfinder', $courseid);
}

require_login($course);

$PAGE->set_url('/blocks/idfinder/view.php', array('id' => $courseid));
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('edithtml', 'block_idfinder'));


// Rename "settings", since is nothing about settings

// $navigationnode = $PAGE->navigation->add(get_string('simplehtmlsettings', 'block_idfinder'));
// $editurl = new moodle_url('/blocks/idfinder/view.php', array('id' => $id, 'courseid' => $courseid, 'blockid' => $blockid));
// $editnode = $navigationnode->add(get_string('editpage', 'block_idfinder'), $editurl);
// $editnode->make_active();
$blocknode = $PAGE->navbar->add(get_string('simplehtmlsettings', 'block_idfinder'));
$editurl = new moodle_url('/blocks/idfinder/view.php', array('id' => $id, 'courseid' => $courseid, 'blockid' => $blockid));
$editnode = $blocknode->add(get_string('editpage', 'block_idfinder'), $editurl);
$editnode->make_active();


  $txt1 = optional_param('txt1', '', PARAM_INT);
            $pageparams = array();
            $pageparams['txt1'] = $txt1;
            
            
$simplehtml = new block_form();

$toform['blockid'] = $blockid;
$toform['courseid'] = $courseid;
$simplehtml->set_data($toform);
// echo $OUTPUT->header();
// $simplehtml->display();
// echo $OUTPUT->footer();
if($simplehtml->is_cancelled()) {
    // Cancelled forms redirect to the course main page.
    $courseurl = new moodle_url('/course/view.php', array('id' => $id));
    redirect($courseurl);
} else if ($fromform = $simplehtml->get_data()) {
    // We need to add code to appropriately act on and store the submitted data
    // but for now we will just redirect back to the course main page.
    
 
$editurl2 = new moodle_url('/blocks/idfinder/view.php', array('id' => $id, 'courseid' => $courseid, 'blockid' => $blockid, 'searchid' => $txt1));
//       $path = '/course/view.php?id=' . $txt1;
            redirect(new \moodle_url($editurl2));
} else {
    // form didn't validate or this is the first display

    $site = get_site();
    echo $OUTPUT->header();
    $simplehtml->display();
        if($searchid>0)
    {

$test = $DB->get_record('course', array('id' => $searchid));
if(!empty($test))
{


 $course = get_course($searchid);
echo "folgender Kurs gefunden: ";
echo html_writer::link( new moodle_url('/course/view.php', array('id' => $searchid)),$course->fullname);
//     echo ($course->fullname);
//      echo ($course->shortname);
}
else{
echo "Die eingegebene ID ist unbekannt. Bitte prüfen Sie ob die ID korrekt ist.";
}
    }
    
    else {
   echo "Bitte geben Sie eine Kurs-ID ein." ;
    }
    echo $OUTPUT->footer();
    
}

?>
