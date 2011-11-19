<?php

include("S_U_API_C_A.php");
include("A_D_API_C_A.php");

	
/****************************************************** CHECKS ACCOUNT EXISTS/NOT EXISTS  ****************************************************************/

			/* If account is exists this function returns an array with array['status'] = "OPEN" or "CLOSE" 
						 If account does not exists the function returns false */
	
	function CHECK_ACCOUNT_EXISTS_C_A($account_id)
	{
		return C_A_A_I_D_get_status($account_id);
	}
	
/*********************************************************************************************************************************************/		
	
/****************************************************** CREATES NEW ACCOUNT  ****************************************************************/

			/* If account is successfully created, this function returns the new account_id, else it returns false */
			
			
	function C_A_add_account($account_start_date, $account_start_time, $initial_amount_deposited)
	{
		$account_id = C_A_generate_account_id();
		$operation1 = C_A_A_I_D_add($account_id,"OPEN");
		
		$deposit_id = C_A_generate_deposit_id($account_id);
		$operation2 = C_A_I_A_D_add($account_id, $account_start_time, $account_start_date, $initial_amount_deposited);
			
		$operation3 =  C_A_N_T_D_add($account_id, "0", "1");
		
		$operation4 = C_A_D_D_add($account_id, $deposit_id, "CASH" , $initial_amount_deposited, $account_start_time, $account_start_date);
			
		$operation5 = C_A_C_A_D_add($account_id, $initial_amount_deposited);
		
		if($operation1 && $operation2 && $operation3 && $operation4 && $operation5)
			return $account_id;
		else 
			return false;
		
	}
	
/*********************************************************************************************************************************************/	
		
/****************************************************** CLOSES THE ACCOUNT  ****************************************************************/

			/* If account is successfully closed, this function returns true else it returns false */


	function C_A_close_account($account_id, $account_close_date, $account_close_time)
	{
		$get_status = C_A_A_I_D_get_status($account_id);
		
		if($get_status['status'] == "OPEN")
		{
			$operation0 = C_A_A_I_D_set_status($account_id,"CLOSE");
			
			$get = C_A_C_A_D_get($account_id);
			$remaining_balance = $get['current_amount'];
			$operation1 = C_A_C_D_add($account_id, $remaining_balance, $account_close_time, $account_close_date);
			
			$operation2 = C_A_I_A_D_delete($account_id);
			
			$operation3 = C_A_C_A_D_delete($account_id);
			
			$operation4 = C_A_W_D_delete_all($account_id);
			
			$operation5 = C_A_D_D_delete_all($account_id);
			
			$operation6 = C_A_N_T_D_delete($account_id);
			
			if($operation0 && $operation1 && $operation2 && $operation3 && $operation4 && $operation5 && $operation6)
				return true;
			else 
				return false;
		}		
		else 
			return false;
	}
	
/*********************************************************************************************************************************************/	

/****************************************************** DOES THE WITHDRAWAL  ****************************************************************/

			/* If account is successfully updated for withdrawal, this function returns true else it returns false */	
	
	
	function C_A_withdrawal($account_id, $amount_withdrawn, $withdrawal_time, $withdrawal_date, $withdrawal_method, $transfer_to_account_id)
	{
		$get_status = C_A_A_I_D_get_status($account_id);
		
		if($get_status['status'] == "OPEN")
		{
			$withdrawal_id = C_A_generate_withdrawal_id($account_id);
			
			$elegible_withdrawal_1 = false;
			
			$get = C_A_C_A_D_get($account_id);
			$current_amount = $get['current_amount'];
			$current_amount = $current_amount - $amount_withdrawn;
			
			if($current_amount >= "0")
				$elegible_withdrawal_1 = true;
			
			$get = C_A_N_T_D_get($account_id);
			$number_withdrawals = $get['number_withdrawals'];
			
			
			$number_withdrawals = $number_withdrawals + "1";
			
			if($elegible_withdrawal_1)
			{	
				$operation1	= C_A_W_D_add($account_id, $withdrawal_id, $amount_withdrawn, $withdrawal_time, $withdrawal_date, $withdrawal_method, $transfer_to_account_id);
				$operation2	= C_A_C_A_D_set_current_amount($account_id,$current_amount);		
				$operation3 = C_A_N_T_D_set_number_withdrawals($account_id, $number_withdrawals);
			
				if($operation1 && $operation2 && $operation3)
					return true;
				else 
					return false;
			}
			else
				return false;
		}
		else 
			return false;
	}
	
/*********************************************************************************************************************************************/	

/******************************************************  DOES THE DEPOSIT  ****************************************************************/	
		
			/* If account is successfully updated for deposit, this function returns true else it returns false */	
			
	
	function C_A_deposit($account_id, $amount_deposited, $deposit_time, $deposit_date, $deposit_method)
	{
		$get_status = C_A_A_I_D_get_status($account_id);
		if( $get_status['status'] == "OPEN")
		{
				$deposit_id = C_A_generate_deposit_id($account_id);
				
			$operation1 = C_A_D_D_add($account_id, $deposit_id, $deposit_method, $amount_deposited, $deposit_time, $deposit_date);
			
				$get = C_A_C_A_D_get($account_id);
				$current_amount = $get['current_amount'];
				$current_amount = $current_amount + $amount_deposited;
				
			$operation2	= C_A_C_A_D_set_current_amount($account_id,$current_amount);
			
				$get = C_A_N_T_D_get($account_id);
				$number_deposits = $get['number_deposits'];
				$number_deposits = $number_deposits + "1";
				
			$operation3 = C_A_N_T_D_set_number_deposits($account_id, $number_deposits);

			if($operation1 && $operation2 && $operation3)
				return true;
			else 
				return false;
		}
		else 
			return false;
	}

/*********************************************************************************************************************************************/	

	//CHECKS// 

	//if(C_A_close_account("C1","2011-11-14","11:34"))
	//	echo "Account Closed Successfully";

	//if(C_A_add_account("2011-11-14","11:34","10000"))
	//	echo "Account Added Successfully";

	//if(C_A_withdrawal("C2","200","11:09","2010-10-09","ATM",""))
	//	echo "Withdrawal successful";
	
	//if(C_A_deposit("C2","2000","11:09","2010-09-2","ATM"))
	//	echo "Deposit Successful";
?>



