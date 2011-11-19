<?php

/********************************************************************  Database Connection   **********************************************************************/
	$s_a_con = mysql_connect("localhost","root","",true);
	
	if (!$s_a_con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("accounts_s_a",$s_a_con);	
	
/********************************************************************************************************************************************************************/

/********************************************************************   Code Reduction Helpers   ********************************************************************/	

	function check_return_A_D_S_A($result)
	{
		if(!$result)
			return false;
		return true;
	}

/********************************************************************************************************************************************************************/

/************************************************************************  Generate Operations *********************************************************************/
	
	
	function S_A_generate_account_id()
	{
		global $s_a_con;
		$query = "SELECT account_id FROM s_a_a_i_d ORDER BY account_id DESC LIMIT 1";
		$result = mysql_query($query,$s_a_con);	
		$result = mysql_fetch_array($result) ;
		$last_id = substr($result['account_id'], 1) ;
		$last_id = $last_id + 1 ;
		$generated_id = "S" . $last_id ;
		return $generated_id ;
	}
	
	function S_A_generate_withdrawal_id($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT number_withdrawals FROM s_a_n_t_d WHERE account_id = '$account_id'",$s_a_con);
		if(!$result)
			return false;
		else
		{
			$result = mysql_fetch_array($result);
			$generated_id = $result['number_withdrawals'] + 1 ;
			return $generated_id ;
		}
	}
		
	function S_A_generate_deposit_id($account_id)
	{
		global $s_a_con;
		$result = mysql_query("SELECT number_deposits FROM s_a_n_t_d WHERE account_id = '$account_id'",$s_a_con);
		if($result == false)
				return false;
		else
		{
			$result = mysql_fetch_array($result);
			$generated_id = $result['number_deposits'] + 1 ;
			return $generated_id ;
		}	
	}
	
/********************************************************************************************************************************************************************/
	
/************************************************************************  Add Operations ***************************************************************************/

	function S_A_I_A_D_add($account_id, $account_start_time, $account_start_date, $initial_amount_deposited)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_i_a_d (account_id, account_start_time, account_start_date, initial_amount_deposited)
								VALUES('$account_id' ,'$account_start_time', '$account_start_date', '$initial_amount_deposited')",$s_a_con);
		return check_return_A_D_S_A($result);							
	}
	
	function S_A_N_T_D_add($account_id, $number_withdrawals, $number_deposits)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_n_t_d (account_id, number_withdrawals, number_deposits)
								VALUES('$account_id', '$number_withdrawals', '$number_deposits')",$s_a_con);
		return check_return_A_D_S_A($result);
	}
	
	function S_A_W_D_add($account_id, $withdrawal_id, $withdrawal_time, $withdrawal_date, $amount_withdrawn, $withdrawal_method, $transfer_to_account_id)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_w_d (account_id, withdrawal_id, withdrawal_time, withdrawal_date, amount_withdrawn, withdrawal_method, transfer_to_account_id)
								VALUES ('$account_id' , '$withdrawal_id', '$withdrawal_time', '$withdrawal_date', '$amount_withdrawn' , '$withdrawal_method', '$transfer_to_account_id')",$s_a_con);
		
		return check_return_A_D_S_A($result);
	}
		
	function S_A_D_W_T_D_add($account_id, $total_withdrawal_today, $number_withdrawal_today)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_d_w_t_d (account_id, total_withdrawal_today, number_withdrawal_today)
								VALUES('$account_id', '$total_withdrawal_today', '$number_withdrawal_today')",$s_a_con);
		return check_return_A_D_S_A($result);
	}
	
	function S_A_D_D_add($account_id, $deposit_id, $deposit_method, $amount_deposited, $deposit_time, $deposit_date)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_d_d (account_id, deposit_id, deposit_method, amount_deposited, deposit_time, deposit_date)
								VALUES('$account_id', '$deposit_id', '$deposit_method', '$amount_deposited', '$deposit_time', '$deposit_date')",$s_a_con);
		return check_return_A_D_S_A($result);							
	}
	
	function S_A_C_A_D_add($account_id, $current_amount)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_c_a_d (account_id, current_amount)
								VALUES('$account_id', '$current_amount')",$s_a_con);
		return check_return_A_D_S_A($result);
	}
	
	function S_A_Co_D_add($rate_of_interest_per_day, $minimum_balance, $maximum_amount_withdrawn_per_day, $maximum_number_withdrawals_per_day)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_co_d (rate_of_interest_per_day, minimum_balance, maximum_amount_withdrawn_per_day, maximum_number_withdrawals_per_day)
								VALUES('$rate_of_interest_per_day', '$minimum_balance', '$maximum_amount_withdrawn_per_day','$maximum_number_withdrawals_per_day')",$s_a_con);
		return check_return_A_D_S_A($result);							
	}
	
	function S_A_Cl_D_add($account_id, $remaining_balance, $account_close_time, $account_close_date)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_cl_d (account_id, remaining_balance, account_close_time, account_close_date)
								VALUES ('$account_id', '$remaining_balance', '$account_close_time', '$account_close_date')",$s_a_con);
		return check_return_A_D_S_A($result);
	}

	function S_A_A_I_D_add($account_id, $status)
	{
		global $s_a_con;
		$result = mysql_query("INSERT INTO s_a_a_i_d (account_id, status)
								VALUES ('$account_id', '$status')",$s_a_con);
		return check_return_A_D_S_A($result);
	}

/***********************************************************************************************************************************************************************/

/************************************************************************  Delete Operations ***************************************************************************/


	function S_A_I_A_D_delete($account_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_i_a_d WHERE account_id = '$account_id'",$s_a_con);
		return check_return_A_D_S_A($result);
	}
	
	function S_A_N_T_D_delete($account_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_n_t_d WHERE account_id = '$account_id'",$s_a_con);
		return check_return_A_D_S_A($result);	
	}
	
	function S_A_W_D_delete_single($account_id, $withdrawal_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_w_d WHERE account_id = '$account_id' AND withdrawal_id = '$withdrawal_id'",$s_a_con);
		return check_return_A_D_S_A($result);	
	}
	
	function S_A_W_D_delete_all($account_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_w_d WHERE account_id = '$account_id'",$s_a_con);
		return check_return_A_D_S_A($result);		
	}
	
	function S_A_D_W_T_D_delete ($account_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_d_w_t_d WHERE account_id = '$account_id'",$s_a_con);
		return check_return_A_D_S_A($result);		
	}
	
	function S_A_D_D_delete_single($account_id, $deposit_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_d_d WHERE account_id = '$account_id' AND deposit_id = '$deposit_id'",$s_a_con);
		return check_return_A_D_S_A($result);	
	}
	
	function S_A_D_D_delete_all($account_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_d_d WHERE account_id = '$account_id'",$s_a_con);
		return check_return_A_D_S_A($result);	
	}

	function S_A_C_A_D_delete($account_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_c_a_d WHERE account_id = '$account_id'",$s_a_con);
		return check_return_A_D_S_A($result);	
	}
	
	function S_A_Cl_D_delete($account_id)
	{
		global $s_a_con;
		$result = mysql_query("DELETE FROM s_a_cl_d WHERE account_id = '$account_id'",$s_a_con);
		return check_return_A_D_S_A($result);	
	}
	
/***********************************************************************************************************************************************************************/	
?>
