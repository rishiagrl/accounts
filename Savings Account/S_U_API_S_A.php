<?php

/********************************************************************  Database Connection   **************************************************/	

	$s_a_con = mysql_connect("localhost","root","",true);
	
	if (!$s_a_con)
		die('Could not connect: ' . mysql_error());
		
	mysql_select_db("accounts_s_a",$s_a_con);	
	
/**************************************************************************************************************************************************/			
	
/********************************************************************   Code Reduction Helpers   **************************************************/	
	
	function final_result_S_U_S_A($result)
	{
		if(!$result)
			return false;
		else		
		{
			$result = mysql_fetch_array($result);
			return $result;
		}
	}	
	
	function check_return_S_U_S_A ($result)
	{
		if(!$result)
			return false;
		return true;
	}

/**************************************************************************************************************************************************/		
	
/********************************************************************   S_A_Cl_D   ***************************************************************/
	
	//SEARCH//
	
	function S_A_Cl_D_get($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT remaining_balance, account_close_time, account_close_date FROM s_a_cl_d WHERE account_id='$account_id'",$s_a_con);
		return final_result_S_U_S_A($result);
	}
	
	//UPDATE//
	
	function S_A_Cl_D_set_remaining_balance($account_id, $remaining_balance)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_cl_d SET remaining_balance = '$remaining_balance' WHERE account_id = '$account_id' ",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_Cl_D_set_account_close_time($account_id, $account_close_time)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_cl_d SET account_close_time = '$account_close_time' WHERE account_id = '$account_id' ",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_Cl_D_set_account_close_date($account_id, $account_close_date)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_cl_d SET account_close_date = '$account_close_date' WHERE account_id = '$account_id' ",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
/**************************************************************************************************************************************************/	
		
/********************************************************************   S_A_Co_D   ***************************************************************/	

	//SEARCH//

	function S_A_Co_D_get()	
	{	
		global $s_a_con;
		$result = mysql_query("SELECT rate_of_interest_per_day, minimum_balance, maximum_amount_withdrawn_per_day, maximum_number_withdrawals_per_day FROM s_a_co_d WHERE serial=1",$s_a_con);
		return final_result_S_U_S_A($result);
	}
	
	//UPDATE//
	
	function S_A_Co_D_set_interest_per_day($rate_of_interest_per_day)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_co_d SET rate_of_interest_per_day = '$rate_of_interest_per_day' WHERE serial = 1",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_Co_D_set_minimum_balance($minimum_balance)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_co_d SET minimum_balance = '$minimum_balance' WHERE serial = 1",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_Co_D_set_maximum_amount_can_withdraw_daily($maximum_amount_can_withdraw_daily)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_co_d SET maximum_amount_withdrawn_per_day = '$maximum_amount_can_withdraw_daily' WHERE serial = 1",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_Co_D_set_maximum_number_withdrawals_daily($maximum_number_withdrawals_daily)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_co_d SET maximum_number_withdrawals_per_day = '$maximum_number_withdrawals_daily' WHERE serial = 1",$s_a_con);
		return check_return_S_U_S_A($result);
	}

/****************************************************************************************************************************************************/	
		
/********************************************************************   S_A_C_A_D   *****************************************************************/			
				
				
	//SEARCH//
				
	function S_A_C_A_D_get($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT current_amount FROM s_a_c_a_d WHERE account_id='$account_id'",$s_a_con);			
		return final_result_S_U_S_A($result);	
	}
	
	//UPDATE//
	
	function S_A_C_A_D_set_current_amount($account_id , $current_amount)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_c_a_d SET current_amount = '$current_amount' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	//S_A_C_A_D_set_current_amount("S1","19");
	
/****************************************************************************************************************************************************/

/********************************************************************   S_A_D_D   *****************************************************************/				
	
	
	//SEARCH//
	
	function S_A_D_D_get($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT deposit_method, amount_deposited, deposit_time, deposit_date FROM s_a_d_d WHERE account_id='$account_id'",$s_a_con); 
		return final_result_S_U_S_A($result);
	}	
	
	//UPDATE//
	
	function S_A_D_D_set_deposit_method($account_id, $deposit_method)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_d_d SET deposit_method = '$deposit_method' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_D_D_set_amount_deposited($account_id, $deposit_id, $amount_deposited)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_d_d SET amount_deposited = '$amount_deposited' WHERE account_id = '$account_id' AND deposit_id = '$deposit_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_D_D_set_deposit_time($account_id, $deposit_id, $deposit_time)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_d_d SET deposit_time = '$deposit_time' WHERE account_id = '$account_id' AND deposit_id = '$deposit_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_D_D_set_deposit_date($account_id, $deposit_id, $deposit_date)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_d_d SET deposit_date = '$deposit_date' WHERE account_id = '$account_id' AND deposit_id = '$deposit_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}	
		
/***************************************************************************************************************************************************/	

/********************************************************************   S_A_D_W_T_D   *****************************************************************/						

	//SEARCH//
	
	function S_A_D_W_T_D_get($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT total_withdrawal_today, number_withdrawal_today FROM s_a_d_w_t_d WHERE account_id = '$account_id'",$s_a_con);
		return final_result_S_U_S_A($result);
	}
	
	//UPDATE//
	
	function S_A_D_W_T_D_set_total_withdrawal_today($account_id, $total_withdrawal_today)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_d_w_t_d SET total_withdrawal_today = '$total_withdrawal_today' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_D_W_T_D_set_number_withdrawals_today($account_id, $number_withdrawal_today)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_d_w_t_d SET number_withdrawal_today = '$number_withdrawal_today' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
/***************************************************************************************************************************************************/		
	
/********************************************************************   S_A_I_A_D   *****************************************************************/				
	
	//SEARCH//
	
	function S_A_I_A_D_get ($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT account_start_date, account_start_time, initial_amount_deposited FROM s_a_i_a_d WHERE account_id='$account_id'",$s_a_con);
		return final_result_S_U_S_A($result);
	}
	
	//UPDATE//
		
	function S_A_I_A_D_set_initial_amount_deposited($account_id,$initial_amount_deposited)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_i_a_d SET initial_amount_deposited = '$initial_amount_deposited' WHERE account_id = '$account_id'",$s_a_con);
		return check_result($result);
	}
	
	function S_A_I_A_D_set_account_start_date($account_id, $start_date)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_i_a_d SET account_start_date = '$start_date' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_I_A_D_set_account_start_time($account_id, $start_time)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_i_a_d SET account_start_time = '$start_time' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
/***************************************************************************************************************************************************/	
	
/********************************************************************   S_A_N_T_D   *****************************************************************/					
	
	
	//SEARCH//
	
	function S_A_N_T_D_get($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT number_withdrawals, number_deposits FROM s_a_n_t_d WHERE account_id = '$account_id'",$s_a_con);
		return final_result_S_U_S_A($result);
	}	 
	
	//UPDATE//
	
	function S_A_N_T_D_set_number_withdrawals( $account_id, $number_withdrawals)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_n_t_d SET number_withdrawals = '$number_withdrawals' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_N_T_D_set_number_deposits( $account_id, $number_deposits)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_n_t_d SET number_deposits = '$number_deposits' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
/***************************************************************************************************************************************************/		
	
/********************************************************************   S_A_W_D   *****************************************************************/						
	
	
	//SEARCH//
	
	function S_A_W_D_get($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT withdrawal_time, withdrawal_date, amount_withdrawn, withdrawal_method, transfer_to_account_id FROM s_a_w_d WHERE account_id = '$account_id'",$s_a_con);
		return final_result_S_U_S_A($result);
	}
	
	//UPDATE//
	
	function S_A_W_D_set_withdrawal_id($account_id, $withdrawal_id, $new_withdrawal_id)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_w_d SET withdrawal_id = '$new_withdrawal_id' WHERE withdrawal_id = '$withdrawal_id' AND account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_W_D_set_amount_withdrawn($account_id, $withdrawal_id, $amount_withdrawn)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_w_d SET amount_withdrawn = '$amount_withdrawn' WHERE withdrawal_id = '$withdrawal_id' AND account_id= '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_W_D_set_withdrawal_time($account_id, $withdrawal_id, $withdrawal_time)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_w_d SET withdrawal_time = '$withdrawal_time' WHERE withdrawal_id = '$withdrawal_id' AND account_id= '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}

	function S_A_W_D_set_withdrawal_date($account_id, $withdrawal_id, $withdrawal_date)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_w_d SET withdrawal_date = '$withdrawal_date' WHERE withdrawal_id = '$withdrawal_id' AND account_id= '$account_id' ",$s_a_con);
		return check_return_S_U_S_A($result);
	}
		
	function S_A_W_D_set_withdrawal_method($account_id, $withdrawal_id, $withdrawal_method)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_w_d SET withdrawal_method = '$withdrawal_method' WHERE withdrawal_id = '$withdrawal_id' AND account_id= '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
	
	function S_A_W_D_set_transfer_to_account_id($account_id, $withdrawal_id, $transfer_to_account_id)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_w_d SET transfer_to_account_id = '$transfer_to_account_id' WHERE withdrawal_id = '$withdrawal_id' AND account_id= '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}
		
/***************************************************************************************************************************************************/			

/********************************************************************   S_A_A_I_D   *****************************************************************/						

	//SEARCH//
	
	function S_A_A_I_D_get_last_account_id()
	{
		global $s_a_con;
		$query = "SELECT 
		account_id
		FROM s_a_a_i_d 
		ORDER BY account_id DESC LIMIT 1";
	
		$result = mysql_query($query,$s_a_con);	
		return final_result_S_U_S_A($result);
	}

	//UPDATE//
	
	function S_A_A_I_D_get_status($account_id)
	{
		global $s_a_con;
		$query = "SELECT 
		status
		FROM s_a_a_i_d 
		WHERE account_id='$account_id'";
	
		$result = mysql_query($query,$s_a_con);	
		return final_result_S_U_S_A($result);
	}

	function S_A_A_I_D_set_status($account_id, $status)
	{
		global $s_a_con;
		$result = mysql_query("UPDATE s_a_a_i_d SET status = '$status' WHERE account_id = '$account_id'",$s_a_con);
		return check_return_S_U_S_A($result);
	}

/***************************************************************************************************************************************************/			
?>
		
		
	
 
