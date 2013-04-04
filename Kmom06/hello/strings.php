<?php
	$s1 = "Hej";
	$s2 = "mitt"; 
	$s3 = "namn"; 
	$s4 = "är";
	$s5 = "Kevin";
	$s6 = $s1 . " " . $s2 . " " . $s3 ." " . $s4 ." " . $s5;
	echo "Variabel 's6' innehåller " . $s6;
	echo "</br>"; //Html tecken för ny rad, ger ny rad ^^
	$t6  = strlen($s6)-4;
	echo "strängen har " . $t6. " tecken";
	$t1 = strlen($s1);
	$t2 = strlen($s2);
	$t3 = strlen($s3);
	$t4 = strlen($s4);
	$t5 = strlen($s5);
	echo "<br /> t1 har " . $t1 . " tecken<br />";
	echo "t2 har " . $t2 . " tecken <br />";	
	echo "t3 har " . $t3 . " tecken <br />";	
	echo "t4 har " . $t4 . " tecken <br />";	
	echo "t5 har " . $t5 . " tecken <br />";
	$t15 = $t1 + $t2 + $t3 + $t4 + $t5;
	echo $t15;
	echo "<br />";
	if($t6 == $t15){
		echo "Yes <br />";
	}
	else{
		echo "Nope <br />";
	}
?>
