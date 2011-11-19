<?php 

/********************************************************************  Database Connection   **************************************************/	
	$f_d_con = mysql_connect("localhost","root","",true);
	
	if (!$f_d_con)
		die('Could not connect: ' . mysql_error());
		
	mysql_select_db("accounts_f_d", $f_d_con);
/**********************************************************************************************************************************************/	
	
/*******************************************************************  Code Reduction Helpers   ************************************************/		
	function final_result_S_U_F_D($result)
	{
		if(!$result)
			return false;
		else		
		{
			$result = mysql_fetch_array($result);
			return $result;
		}
	}	
/**********************************************************************************************************************************************/


/********************************************************************   F_D_I_A_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_I_A_D_get($account_id)
	{
		global $f_d_con ;
		$query = "SELECT 
		account_start_date, 
		account_start_time, 
		account_end_date,
		initial_amount_deposited 
		FROM f_d_i_a_d 
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//----------------------------------------//

//--------------UPDATE--------------------//
	function F_D_I_A_D_set_account_start_date($account_id, $new_start_date)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_i_a_d SET account_start_date='$new_start_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_I_A_D_set_account_start_time($account_id, $new_start_time)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_i_a_d SET account_start_time='$new_start_time' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_I_A_D_set_initial_amount_deposited($account_id, $initial_amount)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_i_a_d SET initial_amount_deposited='$initial_amount' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_I_A_D_set_account_end_date($account_id, $new_end_date)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_i_a_d SET account_end_date='$new_end_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
//--------------------------------------//
/**********************************************************************************************************************************************/


/********************************************************************   F_D_C_A_D   ***********************************************************/
//--------------SEARCH---------------------//	
	function F_D_C_A_D_get($account_id)
	{
		global $f_d_con ;
		$query = "SELECT
		current_amount
		FROM f_d_c_a_d
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//---------------------------------------//	
	
//-------------UPDATE--------------------//	
	function F_D_C_A_D_set_current_amount($account_id, $current_amount)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_c_a_d SET current_amount='$current_amount' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);		
		return $result ;
	}
//-------------------------------------//
/**********************************************************************************************************************************************/


/********************************************************************   F_D_I_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_I_D_get($account_id)
	{
		global $f_d_con ;
		$query = "SELECT
		interest_computation_interval,
		interest_rate,
		interest_accumulated
		FROM f_d_i_d
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//---------------------------------------//

//-------------UPDATE--------------------//
	function F_D_I_D_set_computation_interval($account_id, $months)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_i_d SET interest_computation_interval='$months' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_I_D_set_interest_rate($account_id, $rate)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_i_d SET interest_rate='$rate' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_I_D_set_interest_accumulated($account_id, $accumulated_interest)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_i_d SET interest_accumulated='$accumulated_interest' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
//-------------------------------------//	
/**********************************************************************************************************************************************/	


/********************************************************************   F_D_L_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_L_D_get($account_id)
	{
		global $f_d_con ;
		$query = "SELECT 
		initial_loan_amount, 
		current_loan_amount, 
		loan_start_date, 
		loan_end_date, 
		interest_rate_on_loan 
		FROM f_d_l_d 
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//---------------------------------------//

//------------UPDATE---------------------//
	function F_D_L_D_set_initial_loan_amount($account_id, $loan_taken)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_l_d SET initial_loan_amount='$loan_taken' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);		
		return $result ;
	}
	
	function F_D_L_D_set_current_loan_amount($account_id, $loan_taken)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_l_d SET current_loan_amount='$loan_taken' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_L_D_set_loan_start_date($account_id, $start_date)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_l_d SET loan_start_date='$start_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_L_D_set_loan_end_date($account_id, $end_date)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_l_d SET loan_end_date='$end_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_L_D_set_interest_rate_on_loan($account_id, $interest_rate)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_l_d SET interest_rate_on_loan='$interest_rate' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		
		return $result ;
	}
//-----------------------------------------//	
/**********************************************************************************************************************************************/


/********************************************************************   F_D_T_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_T_D_get($account_id)
	{
		global $f_d_con ;
		$query = "SELECT 
		eligible_for_taxation_A_INCOME,
		eligibility_for_taxation_A_INTEREST,
		tax_amount_for_current_year 
		FROM f_d_t_d 
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//---------------------------------------//

//------------UPDATE---------------------//
	function F_D_T_D_set_e_f_t_A_INT($account_id, $Boolean)
	{
		global $f_d_con ;
		$t = "Y" ;
		if(!$Boolean)
			$t = "N" ;
		
		$query = "UPDATE f_d_t_d SET eligible_for_taxation_A_INCOME='$t' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_T_D_set_e_f_t_A_INC($account_id, $Boolean)
	{
		global $f_d_con ;
		$t = "Y" ;
		if(!$Boolean)
			$t = "N" ;
		
		$query = "UPDATE f_d_t_d SET eligibility_for_taxation_A_INTEREST='$t' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_T_D_set_tax_amount_current_year($account_id, $amount)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_t_d SET tax_amount_for_current_year='$amount' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
//-----------------------------------------//
/**********************************************************************************************************************************************/


/********************************************************************   F_D_W_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_W_D_get($account_id)
	{
		global $f_d_con ;
		$query = "SELECT 
		premature_withdrawal,
		premature_withdrawal_time, 	
		penalty_on_premature_withdrawal,
		amount_withdrawn,
		withdrawal_medium,
		transfer_to_account_id,
		onTime_withdrawal_time,
		onTime_withdrawal_date 
		FROM f_d_w_d 
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//----------------------------------------//

//-------------UPDATE---------------------//
	function F_D_W_D_set_premature_withdrawal($account_id, $Boolean)
	{
		global $f_d_con ;
		$t = "Y" ;
		if(!$Boolean)
			$t = "N" ;
		
		$query = "UPDATE f_d_w_d SET premature_withdrawal='$t' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_W_D_set_premature_withdrawal_time($account_id, $months)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_w_d SET premature_withdrawal_time='$months' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_W_D_set_penalty_on_premature_withdrawal($account_id, $penalty)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_w_d SET penalty_on_premature_withdrawal='$penalty' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_W_D_set_onTime_withdrawal_time($account_id, $onTime_withdrawal_time)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_w_d SET onTime_withdrawal_time='$onTime_withdrawal_time' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_W_D_set_onTime_withdrawal_date($account_id, $onTime_withdrawal_date)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_w_d SET onTime_withdrawal_date='$onTime_withdrawal_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_W_D_set_amount_withdrawn($account_id, $amount_withdrawn)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_w_d SET amount_withdrawn='$amount_withdrawn' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_W_D_set_withdrawal_medium($account_id, $withdrawal_medium)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_w_d SET withdrawal_medium='$withdrawal_medium' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_W_D_set_transfer_to_account_id($account_id, $transfer_to_account_id)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_w_d SET transfer_to_account_id='$transfer_to_account_id' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
//------------------------------------------//
/**********************************************************************************************************************************************/


/********************************************************************   F_D_Co_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_Co_D_get()
	{
		global $f_d_con ;
		$query = "SELECT 
		maximum_loan_amount,
		date_for_check_annual_interest,
		tax_percentage,
		no_taxation_annual_interest_limit
		FROM f_d_co_d " ;
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//----------------------------------------//

//--------------UPDATE--------------------//	
	function F_D_Co_D_set_maximum_loan_amount($maximum_loan_amount)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_co_d SET maximum_loan_amount='$maximum_loan_amount' " ;
		$result = mysql_query($query, $f_d_con);		
		return $result ;
	}
	
	function F_D_Co_D_set_date_for_check_annual_interest($date)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_co_d SET date_for_check_annual_interest='$date' " ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_Co_D_set_tax_percentage($tax_percentage)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_co_d SET tax_percentage='$tax_percentage' " ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_Co_D_set_taxation_income_limit($taxation_income_limit)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_co_d SET no_taxation_annual_interest_limit='$taxation_income_limit' " ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
//-----------------------------------------//	
/**********************************************************************************************************************************************/


/********************************************************************   F_D_Cl_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_Cl_D_get($account_id)
	{
		global $f_d_con ;
		$query = "SELECT 
		remaining_balance,
		account_close_time,
		account_close_date
		FROM f_d_cl_d 
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//----------------------------------------//	

//-------------UPDATE---------------------//
	function F_D_Cl_D_set_remaining_balance($account_id, $remaining_balance)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_cl_d SET remaining_balance='$remaining_balance' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_Cl_D_set_account_close_time($account_id, $close_time)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_cl_d SET account_close_time='$close_time' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
	
	function F_D_Cl_D_set_account_close_date($account_id, $close_date)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_cl_d SET account_close_date='$close_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
//-----------------------------------------//
/**********************************************************************************************************************************************/


/********************************************************************   F_D_A_I_D   ***********************************************************/
//--------------SEARCH---------------------//
	function F_D_A_I_D_get_last_account_id()
	{
		global $f_d_con ;
		$query = "SELECT 
		account_id
		FROM f_d_a_i_d 
		ORDER BY account_id DESC LIMIT 1";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
	
	function F_D_A_I_D_get_status($account_id)
	{
		global $f_d_con ;
		$query = "SELECT 
		status
		FROM f_d_a_i_d 
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query, $f_d_con);	
		return final_result_S_U_F_D($result) ;
	}
//----------------------------------------//

//------------UPDATE----------------------//
	function F_D_A_I_D_set_status($account_id, $status)
	{
		global $f_d_con ;
		$query = "UPDATE f_d_a_i_d SET status ='$status' WHERE account_id='$account_id'" ;
		$result = mysql_query($query, $f_d_con);	
		return $result ;
	}
//---------------------------------------//	
/**********************************************************************************************************************************************/	
?>
