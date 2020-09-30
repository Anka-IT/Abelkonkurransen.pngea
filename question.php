<?php 

$klasse=rand(4,7);

for ($i=1;$i<=$total_question; $i++){
$style=rand(1,2);
$style=3;
$tabid="$i";
$value='';
if (isset($_SESSION['answer'][$i])) $value=$_SESSION['answer'][$i];
if($style==1){
echo '<div id="'.$tabid.'" class="tabcontent">
  <div class="qstyle1">
	<div class="qtop row"><div class="col-8"><h2>Oppgave '.$i.'</h2></div><div class="poeng col-4"><h3>3 poeng</h3></div></div>
	<div class="question-text">
		<p>Ole hjelper musikklæreren sin med å skifte strengene til klassens fioliner.<br/>
		Det er tilsammen 12 fioliner. Hvor mange strenger skal de skifte til
		sammen hvis hver fiolin har fire strenger?</p>
	</div>
	<div class="answer row"><input id="answer'.$i.'" onmouseout="saveAnswer(this,'.$i.')" type="text" value="'.$value.'" placeholder="Skriv svaret her"/></div>
</div>
</div>';
} 

if ($style==2) {
echo '<div id="'.$tabid.'" class="tabcontent">
  <div class="qstyle2">
	<div class="qtop row"><div class="col-8"><h2>Oppgave '.$i.'</h2></div><div class="poeng col-4"><h3>3 poeng</h3></div></div>
	<div class="row">
		<div class="question-text col-6"><p>Ole hjelper musikklæreren sin med å skifte strengene til klassens fioliner.<br/>
	Det er tilsammen 12 fioliner. Hvor mange strenger skal de skifte til sammen hvis hver fiolin har fire strenger?</p></div>
		<div class="question-img col-6"><img src="img/Abelkonkurransen.png" style="width: 40%; " alt="question"/></div>
	</div>
	<div class="answer row"><input id="answer'.$i.'" onmouseout="saveAnswer(this,'.$i.')" type="text" value="'.$value.'" placeholder="Skriv svaret her"/></div>
</div>
</div>';	
		
}
if ($style==3) {
echo '<div id="'.$tabid.'" class="tabcontent">
  <div class="qstyle3">
	<div class="qtop row"><div class="col-4"><h2>Oppgave '.$i.'</h2></div><div class="col-4"></div><div class="poeng col-4"><h3>3 poeng</h3></div></div>
	<div class="row">
		<img src="img/questions/2-'.$klasse.'-'.$i.'.JPG" style="width: 60%; " alt="question"/>
	</div>
	<div class="answer row"><input id="answer'.$i.'" onmouseout="saveAnswer(this,'.$i.')" type="text" value="'.$value.'" placeholder="Skriv svaret her"/></div>
</div>
</div>';	
		
}

}

/* GAMMEL KODE
$style=rand(1,2);


if($style==1){ ?>
<div class="qstyle1">
	<div class="qtop"><h2>Oppgave <?php echo $q; ?></h2><span>3 poeng</span></div>
	<div class="question-text">
		<p>Ole hjelper musikklæreren sin med å skifte strengene til klassens fioliner.<br/>
		Det er tilsammen 12 fioliner. Hvor mange strenger skal de skifte til sammen hvis hver fiolin har fire strenger?</p>
	</div>
</div>
<?php
}
?>
<?php if($style==2){ ?>
<div class="qstyle2">
	<div class="qtop"><h2>Oppgave <?php echo $q; ?></h2><span>3 poeng</span></div>
	<div>
		<div class="question-text"><p>Ole hjelper musikklæreren sin med å skifte strengene til klassens fioliner.<br/>
	Det er tilsammen 12 fioliner. Hvor mange strenger skal de skifte til sammen hvis hver fiolin har fire strenger?</p></div>
		<div class="question-img"><img src="img/Abelkonkurransen.png" style="width: 40%; " alt="question"/></div>
	</div>
</div>
<?php
}
?>
*/