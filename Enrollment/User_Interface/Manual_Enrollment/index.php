<!DOCTYPE html>
<html>
<head>
<title>Manual Enrollment</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Accordion Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="css/header-basic.css">
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Philosopher:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>

<script type="text/javascript">

  var matrix = [];
    for(var i=0; i<15; i++) {
        matrix[i] = new Array(7);
    }

    for (var i = 0; i < matrix.length; i++) {
      for (var j = 0; j < matrix[i].length; j++) {
        matrix[i][j] = null;
      }
    }


  function SetSel(elem,name){
  var elems = document.getElementsByTagName("input");
  
  var currentState = elem.checked;
  var elemsLength = elems.length;

  for(i=0; i<elemsLength; i++)
  {
    if(elems[i].type === "checkbox" && elems[i].name === name)
    {
       elems[i].checked = false;   
    }
  }

  elem.checked = currentState;
}

  function changeTable(elem,course_Name,dias,horaInicio,horaFin){

    if (elem.checked == true){
      deleteAnyFromMatrix(course_Name);
    }    
    for (var i = 0; i < dias.length ; i++) {
      var indexDay = getDayNumber(dias[i]);
      var indexHourBeg = getIndexHour(horaInicio[i]);
      var indexHourEnd = getIndexHour(horaFin[i]);
      if (elem.checked == false) {
        deleteFromMatrix(indexDay,indexHourBeg,indexHourEnd);
      }
      if (elem.checked == true) {
        if(matrixIsEmpty(indexDay,indexHourBeg,indexHourEnd) == true){
            addToMatrix(course_Name,indexDay,indexHourBeg,indexHourEnd);
        }
        else{
          console.log("este espacio esta ocupado. hay choques de  horario");  
          alert("Este espacio esta ocupado. Hay choque de  horario");
          elem.checked =false;
          break;
        }
      }
    }
  }
  function deleteAnyFromMatrix(course_Name){

    for (var i = 0; i < matrix.length; i++) {
      for (var j = 0; j < matrix[i].length; j++) {
          if (matrix[i][j] == course_Name) {
            
            deleteAnyFromOnlineTable(i,j);
            matrix[i][j] = null;
          }
      }
    }
  }
  function addToMatrix(course_Name,indexDay,indexHourBeg,indexHourEnd){
    addToOnlineTable(course_Name,indexDay,indexHourBeg,indexHourEnd);
    for (var i = indexHourBeg; i < indexHourEnd; i++) {
      matrix[indexDay][i] = course_Name;
    } 
  }
  function deleteFromOnlineTable(indexDay,indexHourBeg,indexHourEnd){
    console.log("Borre desde el otro");
    for (var i = indexHourBeg; i < indexHourEnd; i++) {
      idElement = i+":"+indexDay;
      document.getElementById(idElement).innerHTML ="";
    }
  }
  function deleteAnyFromOnlineTable(i,j){
    console.log("Borre desde any");
      idElement = j+":"+i;
      
      document.getElementById(idElement).innerHTML ="";
   
  }
  function addToOnlineTable(course_Name,indexDay,indexHourBeg,indexHourEnd){
    /*document.getElementById("sum2").innerHTML = sums[0];*/
    for (var i = indexHourBeg; i < indexHourEnd; i++) {
      idElement = i+":"+indexDay;
      document.getElementById(idElement).innerHTML =course_Name;
    }

  }

    function deleteFromMatrix(indexDay,indexHourBeg,indexHourEnd){
    deleteFromOnlineTable(indexDay,indexHourBeg,indexHourEnd);
    for (var i = indexHourBeg; i < indexHourEnd; i++) {
      matrix[indexDay][i] = null;
    }    
  }


  function matrixIsEmpty(indexDay,indexHourBeg,indexHourEnd){
    var isEmpty = true;
    for (var i = indexHourBeg; i < indexHourEnd; i++) {
      if (matrix[indexDay][i] != null) {
        isEmpty = false;
      }
    }
    return isEmpty
  }

  function getIndexHour(hour){
    return hour-7;
  }

  function getDayNumber(day){
    var numDay = -1;
    if (day =='Monday') {
      numDay = 0;
    }
    else if (day =='Tuesday') {
      numDay = 1;
    }
    else if (day =='Wednesday') {
      numDay = 2;
    }
    else if (day =='Thursday') {
      numDay = 3;
    }
    else if (day =='Friday') {
      numDay = 4;
    }
    else if (day =='Saturday') {
      numDay = 5;
    }
    else{
      numDay = 6;
    }
    return numDay;
  }
</script>
<body>

  <header class="header-basic">

      <div class="header-limiter">

        <nav>
          
          <a href="#">Generate report</a>
          <a href="../Login/index.html">Log Out</a>
        </nav>
      </div>

    </header>

  

	<!-- main -->
		<div class="main">
			
						
			<section class="ac-container">
      <?php
      error_reporting(E_ERROR | E_PARSE);
        include('UI_Login_Controller.php');
        $imprimir = new UI_Show_Schedule_Controller();
        $texto = $imprimir->printing();
        echo $texto;

      ?>				
			</section>
			<div class="footer">
				
			</div>
		</div>
	<!-- main -->

	<!-- table -->

	<div class="tg-wrap"><table class="tg">
  <tr>
    <th class="tg-wzg3">Hour\Day</th>
    <th class="tg-wzg3">Monday</th>
    <th class="tg-wzg3">Tuesday</th>
    <th class="tg-wzg3">Wednesday</th>
    <th class="tg-wzg3">Thursday</th>
    <th class="tg-wzg3">Friday</th>
    <th class="tg-wzg3">Saturday</th>
    <th class="tg-wzg3">Sunday</th>
  </tr>
  <tr>
    <td class="tg-yw4l">7:00</td>
    <td class="tg-yw4l" id="0:0"></td>
    <td class="tg-yw4l" id="0:1"></td>
    <td class="tg-yw4l" id="0:2"> </td>
    <td class="tg-yw4l" id="0:3"></td>
    <td class="tg-yw4l" id="0:4" ></td>
    <td class="tg-yw4l" id="0:5"></td>
    <td class="tg-yw4l" id="0:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">8:00</td>
    <td class="tg-yw4l" id="1:0"></td>
    <td class="tg-yw4l" id="1:1"></td>
    <td class="tg-yw4l" id="1:2"></td>
    <td class="tg-yw4l" id="1:3"></td>
    <td class="tg-yw4l" id="1:4"></td>
    <td class="tg-yw4l" id="1:5"></td>
    <td class="tg-yw4l" id="1:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">9:00</td>
    <td class="tg-yw4l" id="2:0"></td>
    <td class="tg-yw4l" id="2:1"></td>
    <td class="tg-yw4l" id="2:2"></td>
    <td class="tg-yw4l" id="2:3"></td>
    <td class="tg-yw4l" id="2:4"></td>
    <td class="tg-yw4l" id="2:5"></td>
    <td class="tg-yw4l" id="2:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">10:00<br></td>
    <td class="tg-yw4l" id="3:0"></td>
    <td class="tg-yw4l" id="3:1"></td>
    <td class="tg-yw4l" id="3:2"></td>
    <td class="tg-yw4l" id="3:3"></td>
    <td class="tg-yw4l" id="3:4"></td>
    <td class="tg-yw4l" id="3:5"></td>
    <td class="tg-yw4l" id="3:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">11:00</td>
    <td class="tg-yw4l" id="4:0"></td>
    <td class="tg-yw4l" id="4:1"></td>
    <td class="tg-yw4l" id="4:2"></td>
    <td class="tg-yw4l" id="4:3"></td>
    <td class="tg-yw4l" id="4:4"></td>
    <td class="tg-yw4l" id="4:5"></td>
    <td class="tg-yw4l" id="4:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">12:00</td>
    <td class="tg-yw4l" id="5:0"></td>
    <td class="tg-yw4l" id="5:1"></td>
    <td class="tg-yw4l" id="5:2"></td>
    <td class="tg-yw4l" id="5:3"></td>
    <td class="tg-yw4l" id="5:4"></td>
    <td class="tg-yw4l" id="5:5"></td>
    <td class="tg-yw4l" id="5:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">13:00</td>
    <td class="tg-yw4l" id="6:0"></td>
    <td class="tg-yw4l" id="6:1"></td>
    <td class="tg-yw4l" id="6:2"></td>
    <td class="tg-yw4l" id="6:3"></td>
    <td class="tg-yw4l" id="6:4"></td>
    <td class="tg-yw4l" id="6:5"></td>
    <td class="tg-yw4l" id="6:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">14:00</td>
    <td class="tg-yw4l" id="7:0"></td>
    <td class="tg-yw4l" id="7:1"></td>
    <td class="tg-yw4l" id="7:2"></td>
    <td class="tg-yw4l" id="7:3"></td>
    <td class="tg-yw4l" id="7:4"></td>
    <td class="tg-yw4l" id="7:5"></td>
    <td class="tg-yw4l" id="7:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">15:00</td>
    <td class="tg-yw4l" id="8:0"></td>
    <td class="tg-yw4l" id="8:1"></td>
    <td class="tg-yw4l" id="8:2"></td>
    <td class="tg-yw4l" id="8:3"></td>
    <td class="tg-yw4l" id="8:4"></td>
    <td class="tg-yw4l" id="8:5"></td>
    <td class="tg-yw4l" id="8:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">16:00</td>
    <td class="tg-yw4l" id="9:0"></td>
    <td class="tg-yw4l" id="9:1"></td>
    <td class="tg-yw4l" id="9:2"></td>
    <td class="tg-yw4l" id="9:3"></td>
    <td class="tg-yw4l" id="9:4"></td>
    <td class="tg-yw4l" id="9:5"></td>
    <td class="tg-yw4l" id="9:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">17:00</td>
    <td class="tg-yw4l" id="10:0"></td>
    <td class="tg-yw4l" id="10:1"></td>
    <td class="tg-yw4l" id="10:2"></td>
    <td class="tg-yw4l" id="10:3"></td>
    <td class="tg-yw4l" id="10:4"></td>
    <td class="tg-yw4l" id="10:5"></td>
    <td class="tg-yw4l" id="10:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">18:00</td>
    <td class="tg-yw4l" id="11:0"></td>
    <td class="tg-yw4l" id="11:1"></td>
    <td class="tg-yw4l" id="11:2"></td>
    <td class="tg-yw4l" id="11:3"></td>
    <td class="tg-yw4l" id="11:4"></td>
    <td class="tg-yw4l" id="11:5"></td>
    <td class="tg-yw4l" id="11:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">19:00</td>
    <td class="tg-yw4l" id="12:0"></td>
    <td class="tg-yw4l" id="12:1"></td>
    <td class="tg-yw4l" id="12:2"></td>
    <td class="tg-yw4l" id="12:3"></td>
    <td class="tg-yw4l" id="12:4"></td>
    <td class="tg-yw4l" id="12:5"></td>
    <td class="tg-yw4l" id="12:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">20:00</td>
    <td class="tg-yw4l" id="13:0"></td>
    <td class="tg-yw4l" id="13:1"></td>
    <td class="tg-yw4l" id="13:2"></td>
    <td class="tg-yw4l" id="13:3"></td>
    <td class="tg-yw4l" id="13:4"></td>
    <td class="tg-yw4l" id="13:5"></td>
    <td class="tg-yw4l" id="13:6"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">21:00</td>
    <td class="tg-yw4l" id="14:0"></td>
    <td class="tg-yw4l" id="14:1"></td>
    <td class="tg-yw4l" id="14:2"></td>
    <td class="tg-yw4l" id="14:3"></td>
    <td class="tg-yw4l" id="14:4"></td>
    <td class="tg-yw4l" id="14:5"></td>
    <td class="tg-yw4l" id="14:6"></td>
  </tr>
</table></div>
</body>

</html>