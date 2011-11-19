<?php 


/********************************************************************  Database Connection   **********************************************************************/
	
	$c_a_con = mysql_connect("localhost","root","",true);
	
	if (!$c_a_con)
		die('Could not connect: ' . mysql_error());
		
	mysql_select_db("accounts_c_a", $c_a_con);
	
/********************************************************************************************************************************************************************/	
/********************************************************************   Code Reduction Helpers   **************************************************/	
	
	function final_result_S_U_C_A($result)
	{
		if(!$result)
			return false;
		else		
		{
			$result = mysql_fetch_array($result);
			return $result;
		}
	}	
	
	function check_return_S_U_C_A ($result)
	{
		if(!$result)
			return false;
		return true;
	}

/**************************************************************************************************************************************************/		
	
/********************************************************************   C_A_I_A_D   ***************************************************************/
	
	//SEARCH//

	function C_A_I_A_D_get($account_id)
	{
		global $c_a_con;
		$query = "SELECT 
		initial_amount_deposited, 
		account_start_date, 
		account_start_time 
		FROM c_a_i_a_d 
		WHERE account_id='$account_id'";
	
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}

	//UPDATE//
	
	function C_A_I_A_D_set_account_start_date($account_id, $new_start_date)
	{
		global $c_a_con;
		$query = "UPDATE c_a_i_a_d SET account_start_date='$new_start_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	
	function C_A_I_A_D_set_account_start_time($account_id, $new_start_time)
	{
		global $c_a_con;
		$query = "UPDATE c_a_i_a_d SET account_start_time='$new_start_time' WHERE account_id='$account_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}


	function C_A_I_A_D_set_initial_amount_deposited($account_id, $initial_amount)
	{
		global $c_a_con;
		$query = "UPDATE c_a_i_a_d SET initial_amount_deposited='$initial_amount' WHERE account_id='$account_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}
	
/**************************************************************************************************************************************************/			

/********************************************************************   C_A_C_A_D   ***************************************************************/

	//SEARCH//
	
	function C_A_C_A_D_get($account_id)
	{
		global $c_a_con;
		$query = "SELECT
		current_amount
		FROM c_a_c_a_d
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}	

	//UPDATE//
	
	function C_A_C_A_D_set_current_amount($account_id, $current_amount)
	{
		global $c_a_con;
		$query = "UPDATE c_a_c_a_d SET current_amount='$current_amount' WHERE account_id='$account_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

/**************************************************************************************************************************************************/			

/********************************************************************   C_A_W_D   ***************************************************************/

	//SEARCH//
	
	function C_A_W_D_get($account_id, $withdrawal_id)
	{
		global $c_a_con;
		$query = "SELECT 
		amount_withdrawn,
		withdrawal_time,
		withdrawal_date,
		withdrawal_method,
		transfer_to_account_id 
		FROM c_a_w_d 
		WHERE account_id='$account_id' AND withdrawal_id='$withdrawal_id'";
		
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}	

	//UPDATE//
	
	function C_A_W_D_set_withdrawal_id($account_id, $withdrawal_id, $new_withdrawal_id)
	{
		global $c_a_con;
		$query = "UPDATE c_a_w_d SET withdrawal_id='$new_withdrawal_id' WHERE account_id='$account_id' AND withdrawal_id='$withdrawal_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_W_D_set_amount_withdrawn($account_id, $withdrawal_id, $amount_withdrawn)
	{
		global $c_a_con;
		$query = "UPDATE c_a_w_d SET amount_withdrawn='$amount_withdrawn' WHERE account_id='$account_id' AND withdrawal_id='$withdrawal_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_W_D_set_withdrawal_time($account_id, $withdrawal_id, $withdrawal_time)
	{
		global $c_a_con;
		$query = "UPDATE c_a_w_d SET withdrawal_time='$withdrawal_time' WHERE account_id='$account_id' AND withdrawal_id='$withdrawal_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_W_D_set_withdrawal_date($account_id, $withdrawal_id, $withdrawal_date)
	{
		global $c_a_con;
		$query = "UPDATE c_a_w_d SET withdrawal_date='$withdrawal_date' WHERE account_id='$account_id' AND withdrawal_id='$withdrawal_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_W_D_set_withdrawal_method($account_id, $withdrawal_id, $withdrawal_method)
	{
		global $c_a_con;
		$query = "UPDATE c_a_w_d SET withdrawal_method='$withdrawal_method' WHERE account_id='$account_id' AND withdrawal_id='$withdrawal_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_W_D_set_transfer_to_account_id($account_id, $withdrawal_id, $transfer_to_account_id)
	{
		global $c_a_con;
		$query = "UPDATE c_a_w_d SET transfer_to_account_id='$transfer_to_account_id' WHERE account_id='$account_id' AND withdrawal_id='$withdrawal_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}
	
/**************************************************************************************************************************************************/			

/********************************************************************   C_A_N_T_D   ***************************************************************/	
	
	//SEARCH//
	
	function C_A_N_T_D_get($account_id)
	{
		global $c_a_con;
		$query = "SELECT 
		number_withdrawals,
		number_deposits
		FROM c_a_n_t_d WHERE account_id='$account_id'";
	
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}
	
	//UPDATE//
	
	function C_A_N_T_D_set_number_withdrawals($account_id, $number_of_withdrawals)
	{
		global $c_a_con;
		$query = "UPDATE c_a_n_t_d SET number_withdrawals='$number_of_withdrawals'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_N_T_D_set_number_deposits($account_id, $number_of_deposits)
	{
		global $c_a_con;
		$query = "UPDATE c_a_n_t_d SET number_deposits='$number_of_deposits'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}
	
/**************************************************************************************************************************************************/			

/********************************************************************   C_A_D_D   ***************************************************************/	
	
	//SEARCH//
	
	function C_A_D_D_get($account_id, $deposit_id)
	{
		global $c_a_con;
		$query = "SELECT 
		deposit_method,
		amount_deposited,
		deposit_time,
		deposit_date
		FROM c_a_d_d 
		WHERE account_id='$account_id' AND deposit_id='$deposit_id'";
	
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}	

	//UPDATE//
	
	function C_A_D_D_set_deposit_id($account_id, $deposit_id, $new_deposit_id)
	{
		global $c_a_con;
		$query = "UPDATE c_a_d_d SET deposit_id='$new_deposit_id' WHERE account_id='$account_id' AND deposit_id='$deposit_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}
	
	function C_A_D_D_set_amount_deposited($account_id, $deposit_id, $amount_deposited)
	{
		global $c_a_con;
		$query = "UPDATE c_a_d_d SET amount_deposited='$amount_deposited' WHERE account_id='$account_id' AND deposit_id='$deposit_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_D_D_set_deposit_time($account_id, $deposit_id, $deposit_time)
	{
		global $c_a_con;
		$query = "UPDATE c_a_d_d SET deposit_time='$deposit_time' WHERE account_id='$account_id' AND deposit_id='$deposit_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_D_D_set_deposit_date($account_id, $deposit_id, $deposit_date)
	{
		global $c_a_con;
		$query = "UPDATE c_a_d_d SET deposit_date='$deposit_date' WHERE account_id='$account_id' AND deposit_id='$deposit_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}
	
	function C_A_D_D_set_deposit_method($account_id, $deposit_id, $deposit_method)
	{
		global $c_a_con;
		$query = "UPDATE c_a_d_d SET deposit_method='$deposit_method' WHERE account_id='$account_id' AND deposit_id='$deposit_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}
	
/**************************************************************************************************************************************************/			

/********************************************************************   C_A_C_D   ***************************************************************/

	//SEARCH//
	
	function C_A_C_D_get($account_id)
	{
		global $c_a_con;
		$query = "SELECT 
		remaining_balance,
		account_close_time,
		account_close_date
		FROM c_a_c_d 
		WHERE account_id='$account_id'";
	
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}
	
	//UPDATE//
	
	function C_A_C_D_set_remaining_balance($account_id, $remaining_balance)
	{
		global $c_a_con;
		$query = "UPDATE c_a_c_d SET remaining_balance='$remaining_balance' WHERE account_id='$account_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_C_D_set_account_close_time($account_id, $close_time)
	{
		global $c_a_con;
		$query = "UPDATE c_a_c_d SET account_close_time='$close_time' WHERE account_id='$account_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}

	function C_A_C_D_set_account_close_date($account_id, $close_date)
	{
		global $c_a_con;
		$query = "UPDATE c_a_c_d SET account_close_date='$close_date' WHERE account_id='$account_id'" ;
		$result = mysql_query($query,$c_a_con);	
		return $result ;
	}
	
/**************************************************************************************************************************************************/			

/********************************************************************   C_A_A_I_D   ***************************************************************/

	//SEARCH//
	
	function C_A_A_I_D_get_last_account_id()
	{
		global $c_a_con;
		$query = "SELECT 
		account_id
		FROM c_a_a_i_d 
		ORDER BY account_id DESC LIMIT 1";
		
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}
	
	//UPDATE//
	
	function C_A_A_I_D_get_status($account_id)
	{
		global $c_a_con;
		$query = "SELECT 
		status
		FROM c_a_a_i_d 
		WHERE account_id='$account_id'";
		
		$result = mysql_query($query,$c_a_con);	
		return final_result_S_U_C_A($result);
	}
	
	function C_A_A_I_D_set_status($account_id, $status)
	{
		global $c_a_con;
		$result = mysql_query("UPDATE c_a_a_i_d SET status = '$status' WHERE account_id = '$account_id'",$c_a_con);
		return $result;
}

/**************************************************************************************************************************************************/			
?>
