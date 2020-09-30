<?php 
session_start();
$q=1;
$total_question=10;
if(isset ($_GET['q'])){
	$q=$_GET['q']; 
}
if(!is_numeric($q)){$q=1;}
else if(($q<1)||($q>$total_question)){ $q=1;}

 
if (!isset($_SESSION['startTime'])) {
	$_SESSION['startTime']=date("Y/m/d H:i:s", strtotime("now"));
	$deadline= date("Y/m/d H:i:s", strtotime("+7 minutes"));
} else {
	$startTime=strtotime($_SESSION['startTime']);
	$deadline= date("Y/m/d H:i:s", strtotime("+7 minutes",$startTime));
}

?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body onload="loadPage()">
		<div class="main-container">
				<div class="header row">
					<div class="logo col-4" ><img src="img/Abelkonkurransen.png" style="width: 65%; " alt="Abelkonkurransen-pnge"/></div>
					<div class="col-4"></div>
					<div class="time col-4"><span id="clock"></span></div>
				</div>
				<div class="content">
					<div class="main-nav"><?php include_once('main-nav.php');?><?php include_once('question.php'); ?></div>
					<div class="answer"><?php //include_once('answer.php'); ?></div>
					<div class="bottom-nav"><?php include_once('bottom-nav.php'); ?></div>	
				</div>
				<div class="footer"></div>
		</div>
	</body>
	<script>
		function openQuestion(evt, questionNo) {
		  // Declare all variables
		  var i, tabcontent, tablinks;

		  // Get all elements with class="tabcontent" and hide them
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }

		  // Get all elements with class="tablinks" and remove the class "active"
		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }

		  // Show the current tab, and add an "active" class to the button that opened the tab
		  document.getElementById(questionNo).style.display = "block";
		  //evt.currentTarget.className += " active";
		  document.getElementById('btn'+questionNo).className += " active";
		  nexttab=(questionNo%total_question)+1;
		  prewtab=(questionNo-1)%total_question;
		  if (prewtab==0) prewtab=total_question;
		  activetab=questionNo;
		  
		  document.getElementById('prew').style.display = "block";
		  document.getElementById('next').style.display = "block";
		  if (questionNo==1)		  document.getElementById('prew').style.display = "none";
		  if (questionNo==total_question)		  document.getElementById('next').style.display = "none";
		}
		function saveAnswer(answer,no){
			document.getElementById('test').value=answer.value;
			if (answer.value!='') document.getElementById('btn'+no).className += " answered";
			else document.getElementById('btn'+no).className=document.getElementById('btn'+no).className.replace(" answered", "");

			var xmlHttp = new XMLHttpRequest();
			xmlHttp.open( "GET", "save-answer.php?q="+no+"&a="+answer, false ); // false for synchronous request
			xmlHttp.send();		
		}
		function loadPage(){
			openQuestion(event, 1);
			for (i = 1; i < total_question; i++) {
				if (document.getElementById('answer'+i).value!='') document.getElementById('btn'+i).className += " answered";
			}
		}
		
		//https://www.sitepoint.com/build-javascript-countdown-timer-no-dependencies/
		function getTimeRemaining(endtime){
		  var t = Date.parse(endtime) - Date.parse(new Date());
		  var seconds = Math.floor( (t/1000) % 60 );
		  var minutes = Math.floor( (t/1000/60) % 60 );
		  return {
			'total': t,
			'minutes': minutes,
			'seconds': seconds
		  };
		}
		
		function initializeClock(id, endtime){
		  var clock = document.getElementById(id);
		  var timeinterval = setInterval(function(){
			var t = getTimeRemaining(endtime);
			var min= t.minutes;
			var sec=t.seconds;
			if (min<10) min='0'+min;
			if (sec<10) sec='0'+sec;
			clock.innerHTML = min+ ':' + sec;
			if(t.total<=0){
				//window.location.href = "ferdig.php";
				clearInterval(timeinterval);
				for (i = 1; i <= total_question; i++) {
					document.getElementById('answer'+i).disabled = true;
				}
				document.getElementById('warnings').innerHTML = 'TIDEN ER UTE!<br/> DIN BESVARELSE ER NÅ LEVERT INN.';
				clock.innerHTML="TIDEN ER UTE!";
			}
		  },1000);
		}

		initializeClock('clock', <?php echo "'$deadline'";?>);

		
		
		var activetab=1;
		var prewtab=1;
		var nexttab=2;
		var total_question=<?php echo $total_question;?>;
	
	</script>
</html>