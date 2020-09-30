<?php
$div_width=floor(1000/$total_question)/10;
echo '<div class="tab">';
for ($i=1;$i<=$total_question; $i++){
	echo '<button id="btn'.$i.'" style="width:'.$div_width.'%;" class="tablinks" onclick="openQuestion(event, \''.$i.'\')">'.$i.'</button>';
}
echo '</div>';








/*
GAMMEL KODE

$div_width=floor(1000/$total_question)/10;
for ($i=1;$i<=$total_question; $i++){
	$active="";
	if($i==$q)	$active="active";
	echo '<div style="width:'.$div_width.'%;"><a class="'.$active.'" href="?q='.$i.'">'.$i.'</a></div>';
}

*/
?>

<!-- Tab links -->
