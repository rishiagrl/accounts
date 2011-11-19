<?php

/********************************************************************  Database Connection   **************************************************/	

	$f_d_con = mysql_connect("localhost","root","",true);
	
	if (!f_d_$con)
		die('Could not connect: ' . mysql_error());
		
	mysql_select_db("accounts_f_d", $f_d_con);	
	
/***********************************************************************************************************************************************/


/************************************************************************  Generate Operations *************************************************/

	function F_D_generate_account_id()
	{
		global $f_d_con ;
		$query = "SELECT 
		account_id
		FROM f_d_a_i_d 
		ORDER BY account_id DESC LIMIT 1";
	
		$result = mysql_query($query, $f_d_con);	
		if(!$result)
			return false ;
		$row = mysql_fetch_array($result);
		$last_id = substr($row['account_id'], 1) ;
		$last_id = $last_id + 1 ;
		$generated_id = "F" . $last_id ;
		return $generated_id ;
	}
	
/***********************************************************************************************************************************************/
	
	function check_return($result)
	{
		if(!$result)
			return false;
		return true;
	}
	
/***********************************************************************************************************************************************/
	
	
/************************************************************************  Add Operations ******************************************************/

	function F_D_I_A_D_add($account_id, $account_start_time, $account_start_date,$account_end_date, $initial_amount_deposited)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_i_a_d (account_id, account_start_time, account_start_date, account_end_date, initial_amount_deposited)
								VALUES('$account_id' ,'$account_start_time', '$account_start_date', '$account_end_date', '$initial_amount_deposited')", $f_d_con);
		return check_return($result);							
	}
	
	function F_D_C_A_D_add($account_id, $current_amount)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_c_a_d (account_id, current_amount)
								VALUES('$account_id', '$current_amount')", $f_d_con);
		return check_return($result);
	}

	function F_D_I_D_add($account_id, $interest_computation_interval,$interest_rate, $interest_accumulated)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_i_d (account_id, interest_computation_interval, interest_rate, interest_accumulated)
								VALUES('$account_id', '$interest_computation_interval', '$interest_rate', '$interest_accumulated')", $f_d_con);
		return check_return($result);
	}
	
	function F_D_L_D_add($account_id, $initial_loan_amount, $current_loan_amount, $loan_start_date, $loan_end_date, $interest_rate_on_loan)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_l_d (account_id, initial_loan_amount, current_loan_amount, loan_start_date, loan_end_date, interest_rate_on_loan)
								VALUES( '$account_id', '$initial_loan_amount', '$current_loan_amount', '$loan_start_date', '$loan_end_date', '$interest_rate_on_loan')", $f_d_con);
		return check_return($result);
	}
	
	function F_D_T_D_add($account_id, $e_f_t_A_INC, $e_f_t_A_INT, $tax_amount_for_current_year)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_t_d ( account_id, eligible_for_taxation_A_INCOME, eligibility_for_taxation_A_INTEREST, tax_amount_for_current_year)
								VALUES ( '$account_id' , '$e_f_t_A_INC' , '$e_f_t_A_INT', '$tax_amount_for_current_year')", $f_d_con);
		return check_return($result);
	}
	
	function F_D_W_D_add($account_id, $onTime_withdrawal_time, $onTime_withdrawal_date, $premature_withdrawal, 
						 $premature_withdrawal_time, $penalty_on_premature_withdrawal, $amount_withdrawn,
						 $withdrawal_medium, $transfer_to_account_id)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_w_d ( account_id, onTime_withdrawal_time, onTime_withdrawal_date, 
								premature_withdrawal, premature_withdrawal_time, penalty_on_premature_withdrawal, 
								amount_withdrawn, withdrawal_medium, transfer_to_account_id)
								VALUES ('$account_id', '$onTime_withdrawal_time', '$onTime_withdrawal_date', '$premature_withdrawal', 
						 '$premature_withdrawal_time', '$penalty_on_premature_withdrawal', '$amount_withdrawn',
						 '$withdrawal_medium', '$transfer_to_account_id')", $f_d_con);
						 
		return check_return($result);
	}				 
						 
	function F_D_Cl_D_add($account_id, $remaining_balance, $account_close_time, $account_close_date)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_cl_d (account_id, remaining_balance, account_close_time, account_close_date)
								VALUES ('$account_id', '$remaining_balance', '$account_close_time', '$account_close_date')", $f_d_con);
		return check_return($result);
	}

	function F_D_A_I_D_add($account_id, $status)
	{
		global $f_d_con ;
		$result = mysql_query("INSERT INTO f_d_a_i_d (account_id, status)
								VALUES ('$account_id', '$status')", $f_d_con);
		return check_return($result);
	}

/************************************************************************************************************************************************/
	
	
/************************************************************************  Delete Operations ****************************************************/	
	
	function F_D_I_A_D_delete($account_id)
	{	
		global $f_d_con ;
		$result = mysql_query("DELETE FROM f_d_i_a_d WHERE account_id = '$account_id'", $f_d_con);
		return check_return($result);
	}
	
	function F_D_C_A_D_delete($account_id)
	{
		global $f_d_con ;
		$result = mysql_query("DELETE FROM f_d_c_a_d WHERE account_id = '$account_id'", $f_d_con);
		return check_return($result);
	}
	
	function F_D_I_D_delete($account_id)
	{
		global $f_d_con ;
		$result = mysql_query("DELETE FROM f_d_i_d WHERE account_id = '$account_id'", $f_d_con);
		return check_return($result);
	}
	
	function F_D_L_D_delete($account_id)
	{
		global $f_d_con ;
		$result = mysql_query("DELETE FROM f_d_l_d WHERE account_id = '$account_id'", $f_d_con);
		return check_return($result);
	}
	
	function F_D_T_D_delete($account_id)
	{
		global $f_d_con ;
		$result = mysql_query("DELETE FROM f_d_t_d WHERE account_id = '$account_id'", $f_d_con);
		return check_return($result);
	}
	
	function F_D_W_D_delete($account_id)
	{
		global $f_d_con ;
		$result = mysql_query("DELETE FROM f_d_w_d WHERE account_id = '$account_id'", $f_d_con);
		return check_return($result);
	}
	
	function F_D_Cl_D_delete($account_id)
	{
		global $f_d_con ;
		$result = mysql_query("DELETE FROM f_d_cl_d WHERE account_id = '$account_id'", $f_d_con);
		return check_return($result);	
	}
	
/***********************************************************************************************************************************************/

?>	
	
	
