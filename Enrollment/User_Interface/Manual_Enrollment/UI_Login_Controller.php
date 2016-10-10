<?php
include("../../Business_Logic_Layer/CoursesClass.php");
class UI_Show_Schedule_Controller{


	function printing(){

	$courseObject = new coursesClass();

	$listOfCourses = $courseObject->getCourseInstance();
	$listOfSchedules = $courseObject->getCourseSchedule();
	$listOfCourseNames = $courseObject->getCoursesName();

	$textToPrint = "";
	$ind = 0;
		foreach ($listOfCourseNames as $name) {
			
			$ind++;
			
			$idInstance = $name[1]; 
			$idCourse = $name[2];
			$course_Name = $name[0];
			$textToPrint= $textToPrint."<div>
				<input id='ac-".$ind."' name='accordion-".$ind."' type='checkbox' />
				<label for='ac-".$ind."' class='grid1'>".$course_Name."</label>
				<article class='ac-small'>
					<ul>";
			foreach ($listOfCourses as $cursoInfo) {
				$Schedule = "";
				$idInstance_info = $cursoInfo[0];
				$idCourse_info =$cursoInfo[2];
				$arrayDay = "[";
				$arrayHourBeg = "[";
				$arrayHourEnd = "["; 
				if($idCourse_info ==$idCourse){
					foreach ($listOfSchedules as $horario) {
						if ($horario[3]==$cursoInfo[0]) {
							$Schedule= $Schedule.$horario[0].": " .$horario[1]." hrs. - ".$horario[2]."hrs. &nbsp;";
							$arrayDay = $arrayDay."'".$horario[0]."',";
							$arrayHourBeg = $arrayHourBeg.$horario[1]. ",";
							$arrayHourEnd = $arrayHourEnd.$horario[2].",";
						}
					}
					$arrayDay =substr($arrayDay,0, strlen($arrayDay)-1);
					$arrayDay = $arrayDay."]";
					$arrayHourBeg =substr($arrayHourBeg,0, strlen($arrayHourBeg)-1);
					$arrayHourBeg = $arrayHourBeg . "]";
					$arrayHourEnd =substr($arrayHourEnd,0, strlen($arrayHourEnd)-1);
					$arrayHourEnd = $arrayHourEnd."]";
					$textToPrint=
							$textToPrint."	<li><input type=\"checkbox\" id = \"showme\" name=\"".$name[0]."\" value=\"bla\" onclick=\"SetSel(this,'".$name[0]."');changeTable(this,'".$course_Name."'," .$arrayDay.",".$arrayHourBeg.",".$arrayHourEnd.")\" /> Professor: ".$cursoInfo[4]." ".$cursoInfo[5]."&nbsp; &nbsp; &nbsp; Schedule:".$Schedule;
					$textToPrint= $textToPrint. "  </li>";
					$Schedule = "";
				}
			}
			$textToPrint = $textToPrint."	</ul>
					</article>
				</div>";
		}
		
		return $textToPrint;
	}
}

?>