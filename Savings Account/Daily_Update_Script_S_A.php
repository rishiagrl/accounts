<?php

include("S_U_API_S_A.php");
include("A_D_API_S_A.php");

	function check_operation($operation)
	{
		if($operation)
			echo "DONE </br>";
		else 
			echo "NOT DONE </br>";
	}

	function S_A_add_daily_interest($account_id)
	{
		$constraints = S_A_Co_D_get();
		$interest_rate = $constraints['rate_of_interest_per_day'];
		
		$get = S_A_C_A_D_get($account_id);
		$current_amount = $get['current_amount'];
		
		$interest_amount = $current_amount*$interest_rate/100;
		
		$current_amount = $current_amount+$interest_amount;
		
		$operation1 = S_A_C_A_D_set_current_amount($account_id, $current_amount);
		check_operation($operation1);
		
		if($operation1)
			return true;
		else 
			return false;
	}

?>
