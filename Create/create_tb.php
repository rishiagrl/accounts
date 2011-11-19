<?php 
function crt_tb($tname, $db){
	$con = mysql_connect("localhost","root","");
	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}

// Create table
	mysql_select_db($db, $con);
	$sql = "CREATE TABLE $tname	
	(
		serial int NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(serial),
		Name varchar(100),
		Sex varchar(100),
		set1_question_1 varchar(100),
		set1_question_2 varchar(100),
		set1_question_3 varchar(100),
		set1_question_4 varchar(100),
		set1_question_5 varchar(100),
		set1_question_6 varchar(100),
		set1_question_7 varchar(100),
		set1_question_8 varchar(100),
										set1_question_9 varchar(100),
										set1_question_10 varchar(100),
										set1_question_11 varchar(100),
										set1_question_12 varchar(100),
										set1_question_13 varchar(100),
										set1_question_14 varchar(100),
										set1_question_15 varchar(100),
										set1_question_16 varchar(100),
										set1_question_17 varchar(100),
										set1_question_18 varchar(100),
										set1_question_19 varchar(100),
										set1_question_20 varchar(100),
										set2_question_1 varchar(100),
										set2_question_2 varchar(100),
										set2_question_3 varchar(100),
										set2_question_4 varchar(100),
										set2_question_5 varchar(100),
										set2_question_6 varchar(100),
										set2_question_7 varchar(100),
										set2_question_8 varchar(100),
										set2_question_9 varchar(100),
										set2_question_10 varchar(100),
										set2_question_11 varchar(100),
										set2_question_12 varchar(100), 
										set2_question_13 varchar(100),
										set2_question_14 varchar(100),
										set2_question_15 varchar(100),
										set2_question_16 varchar(100),
										set2_question_17 varchar(100),
										set2_question_18 varchar(100),
										set2_question_19 varchar(100),
										set2_question_20 varchar(100),
										set2_question_21 varchar(100),
										set2_question_22 varchar(100),
										set2_question_23 varchar(100),
										set2_question_24 varchar(100),
										set2_question_25 varchar(100),
										set2_question_26 varchar(100),
										set2_question_27 varchar(100),
										set2_question_28 varchar(100),
										set2_question_29 varchar(100)	
	)";

// Execute query
	mysql_query($sql,$con);
	echo "table  is created" ;
	
	mysql_close($con);
}

crt_tb("data", "psycho_data") ;

?>
