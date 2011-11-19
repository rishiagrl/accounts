<?php

/********************************************************************  Database Connection   **************************************************/	

	$c_a_con = mysql_connect("localhost","root","",true);
	
	if (!$c_a_con)
		die('Could not connect: ' . mysql_error());
		
	mysql_select_db("accounts_c_a",$c_a_con);	
	
/********************************************************************************************************************************************************************/	

/************************************************************************  Generate Operations ***************************************************************************/

	function C_A_generate_account_id()
	{
		global $c_a_con;
		$query = "SELECT 
		account_id
		FROM c_a_a_i_d 
		ORDER BY account_id DESC LIMIT 1";
	
		$result = mysql_query($query,$c_a_con);	
		$result = mysql_fetch_array($result) ;
		$last_id = substr($result['account_id'], 1) ;
		$last_id = $last_id + 1 ;
		$generated_id = "C" . $last_id ;
		return $generated_id ;
	}
	
	function C_A_generate_withdrawal_id($account_id)
	{
		global $c_a_con;
		$result = mysql_query("SELECT number_withdrawals FROM c_a_n_t_d WHERE account_id = '$account_id'",$c_a_con);
		if(!$result)
			return false;
		else
		{
			$result = mysql_fetch_array($result) ;
			$generated_id = $result['number_withdrawals'] + 1 ;
			return $generated_id ;
		}
	}
	
	function C_A_generate_deposit_id($account_id)
	{
		global $c_a_con;
		$result = mysql_query("SELECT number_deposits FROM c_a_n_t_d WHERE account_id = '$account_id'",$c_a_con);
		if($result == false)
		return false;
		else
		{
			$result = mysql_fetch_array($result) ;
			$generated_id = $result['number_deposits'] + 1 ;
			return $generated_id ;
		}
	}
	
/********************************************************************************************************************************************************************/

/********************************************************************   Code Reduction Helpers   ********************************************************************/	
	
	function check_return_A_D_C_A($result)
	{
		if(!$result)
			return false;
		return true;
	}
	
/********************************************************************************************************************************************************************/
	
/************************************************************************  Add Operations ***************************************************************************/
	
	function C_A_I_A_D_add($account_id, $initial_amount_deposited, $account_start_date, $account_start_time)
	{
		global $c_a_con;
		$result = mysql_query("INSERT INTO c_a_i_a_d (account_id, account_start_time, account_start_date, initial_amount_deposited)
								VALUES('$account_id' ,'$account_start_time', '$account_start_date', '$initial_amount_deposited')",$c_a_con);
		return check_return_A_D_C_A($result);							
	}
	
	function C_A_C_A_D_add($account_id, $current_amount)
	{
		global $c_a_con;
		$result = mysql_query("INSERT INTO c_a_c_a_d (account_id, current_amount)
								VALUES('$account_id', '$current_amount')",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_W_D_add($account_id, $withdrawal_id, $amount_withdrawn, $withdrawal_time, $withdrawal_date, $withdrawal_method, $transfer_to_account_id)
	{
		global $c_a_con;
		$result = mysql_query("INSERT INTO c_a_w_d (account_id, withdrawal_id, withdrawal_time, withdrawal_date, amount_withdrawn, withdrawal_method, transfer_to_account_id)
								VALUES ('$account_id', '$withdrawal_id', '$withdrawal_time', '$withdrawal_date', '$amount_withdrawn' , '$withdrawal_method', '$transfer_to_account_id')",$c_a_con);
		return check_return_A_D_C_A($result);
	}

	function C_A_N_T_D_add($account_id, $number_of_withdrawals, $number_of_deposits)
	{
		global $c_a_con;
		$result = mysql_query("INSERT INTO c_a_n_t_d (account_id, number_withdrawals, number_deposits)
								VALUES('$account_id', '$number_of_withdrawals', '$number_of_deposits')",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	
	function C_A_D_D_add($account_id, $deposit_id, $deposit_method, $amount_deposited, $deposit_time, $deposit_date)
	{
		global $c_a_con;
		$result = mysql_query("INSERT INTO c_a_d_d (account_id, deposit_id, deposit_method, amount_deposited, deposit_time, deposit_date)
								VALUES('$account_id', '$deposit_id', '$deposit_method', '$amount_deposited', '$deposit_time', '$deposit_date')",$c_a_con);
		return check_return_A_D_C_A($result);							
	}
	
	function C_A_C_D_add($account_id, $remaining_balance, $account_close_time, $account_close_date)
	{
		global $c_a_con;
		$result = mysql_query("INSERT INTO c_a_c_d (account_id, remaining_balance, account_close_time, account_close_date)
								VALUES ('$account_id', '$remaining_balance', '$account_close_time', '$account_close_date')",$c_a_con);
		return check_return_A_D_C_A($result);	
	}


	function C_A_A_I_D_add($account_id, $status)
	{
		global $c_a_con;
		$result = mysql_query("INSERT INTO c_a_a_i_d (account_id, status) VALUES ('$account_id', '$status')",$c_a_con);
		return check_return_A_D_C_A($result);
	}
/***********************************************************************************************************************************************************/
	
/*************************************************************  Delete Operations  *************************************************************************/	
	
	function C_A_I_A_D_delete($account_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_i_a_d WHERE account_id = '$account_id'",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_C_A_D_delete($account_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_c_a_d WHERE account_id = '$account_id'",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_W_D_delete_single($account_id, $withdrawal_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_w_d WHERE account_id = '$account_id' AND withdrawal_id='$withdrawal_id'",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_W_D_delete_All($account_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_w_d WHERE account_id = '$account_id'",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_N_T_D_delete($account_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_n_t_d WHERE account_id = '$account_id'",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_D_D_delete_single($account_id, $deposit_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_d_d WHERE account_id = '$account_id' AND deposit_id='$deposit_id'",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_D_D_delete_all($account_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_d_d WHERE account_id = '$account_id'",$c_a_con);
		return check_return_A_D_C_A($result);
	}
	
	function C_A_C_D_delete($account_id)
	{
		global $c_a_con;
		$result = mysql_query("DELETE FROM c_a_c_d WHERE account_id = '$account_id'",$c_a_con);
		return check_return_A_D_C_A($result);	
	}
	
/***********************************************************************************************************************************************************/	

?>
