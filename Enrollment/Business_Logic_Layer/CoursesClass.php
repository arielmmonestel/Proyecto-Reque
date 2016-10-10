<?php
include("../../Data_Access_Layer/ConnectionClass.php");
 header('Content-Type: text/html; charset=utf8_spanish_ci');  
class coursesClass{

	//Atributes from the class:

	public $user_id = 1;
	
	
	//methods from the class:	

	public function sql($sql){
		$connection = new connection();
		return $connection-> consult($sql);
	}

	public function getApprovedCourses(){

		$cql = "select course_id from user_X_Approved_Course where user_id = ".$this->user_id."; " ;

		$approvedCourses = $this-> sql($cql);
		$list_of_approved = array();

		while ($a=mysql_fetch_assoc($approvedCourses)){
			
			array_push($list_of_approved,$a['course_id']);
		}
		return $list_of_approved;
	}
	public function getInitialCourses(){
		$cql = "select course_id from require_per_Course where course_required_id = 28 ; " ;
		$initialCourses = $this->sql($cql);
		$array= array(); 
		while ($a=mysql_fetch_assoc($initialCourses)){
			array_push($array,$a['course_id']);
		}
		return $array;	
	}

	public function getCourseInstance(){
			
			$cql = " select course.name as name_course,course.course_id as course_id,course_instance.capacity as capacity,course_instance.course_instance_id as instance_id ,A.name as teach_name ,B.lastname as teach_lastname from course_instance inner join course on course_instance.course_id = course.course_id  inner join user A on course_instance.teacher_id = A.user_id  inner join user B on course_instance.teacher_id = B.user_id where course_instance.course_id in (select course_id from require_per_course where course_required_id= 28);" ;
			$courses_info = $this->sql($cql);
			$array = array();
		while ($a=mysql_fetch_assoc($courses_info)){
			
			array_push($array,array($a['instance_id'],$a['name_course'],$a['course_id'],$a['capacity'],urldecode($a['teach_name']),urldecode($a['teach_lastname'])));
			

		}
		return $array;
	}

	public function getCoursesName(){

		$cql = 'select course.name as name_course,course.course_id as course_id,course_instance.course_instance_id as instance_id  from course_instance inner join course on course_instance.course_id = course.course_id  inner join user A on course_instance.teacher_id = A.user_id  inner join user B on course_instance.teacher_id = B.user_id where course_instance.course_id in (select course_id from require_per_course where course_required_id= 28)group by name_course order by instance_id;';
			$courses_info = $this->sql($cql);
			$array = array();
		while ($a=mysql_fetch_assoc($courses_info)){
			
			array_push($array,array(urldecode($a['name_course']),$a['instance_id'],$a['course_id']));
			

		}
		return $array;
	}
	
	public function getCourseSchedule(){

		$cql = " select instance_id,day,start_time,end_time from schedule where instance_id in (select course_instance.course_instance_id from course_instance where course_instance.course_id in (select course_id from require_per_course where course_required_id= 28));";

		$schedule = $this->sql($cql);
		$array = array();
		while($a = mysql_fetch_assoc($schedule)){
			array_push($array, array( $a['day'], $a['start_time'], $a['end_time'],$a['instance_id'] ) );
		}
		return $array;
	}

	/*
	public function getRequiredCourses(){

		$approvedCourses = $this->getApprovedCourses();
		$beginingCourses= $this->getInitialCourses();
		$Quantity_of_Approved = sizeof($approvedCourses);
		if ( $Quantity_of_Approved == 0) {
		 	echo "no tengo nada cafroooooooon";
		 }
		 else{
		 	array
		 }


	}
	*/

}
/*
$coursesClass = new coursesClass();
$hola = $coursesClass->getCourseSchedule();
foreach ($hola as $value) {

	foreach ($value as $element) {
			echo $element;
	}
}

*/


?>