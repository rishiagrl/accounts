<?php

include("S_U_API_S_A.php");
include("A_D_API_S_A.php");

	
/****************************************************** CHECKS ACCOUNT EXISTS/NOT EXISTS  ****************************************************************/

			/* If account is exists this function returns an array with array['status'] = "OPEN" or "CLOSE" 
						 If account does not exists the function returns false */
	
	function CHECK_ACCOUNT_EXISTS_S_A($account_id)
	{
		return S_A_A_I_D_get_status($account_id);
	}
	
/*********************************************************************************************************************************************/		
	
/****************************************************** CREATES NEW ACCOUNT  ****************************************************************/

			/* If account is successfully created, this function returns the new account_id, else it returns false */
			

	function S_A_add_account($account_start_date, $account_start_time, $initial_amount_deposited)
	{
		$account_id = S_A_generate_account_id();
		$operation1 = S_A_A_I_D_add($account_id,"OPEN");
		
		$deposit_id = S_A_generate_deposit_id($account_id);
		$operation2 = S_A_I_A_D_add($account_id, $account_start_time, $account_start_date, $initial_amount_deposited);
			
		$operation3 =  S_A_N_T_D_add($account_id, "0", "1");
			
		$operation4 = S_A_D_W_T_D_add($account_id, "0", "0");
		
		$operation5 = S_A_D_D_add($account_id, $deposit_id, "CASH" , $initial_amount_deposited, $account_start_time, $account_start_date);
			
		$operation6 = S_A_C_A_D_add($account_id, $initial_amount_deposited);
		
		if($operation1 && $operation2 && $operation3 && $operation4 && $operation5 && $operation6)
			return $account_id;
		else 
			return false;
		
	}
	
/*********************************************************************************************************************************************/	
		
/****************************************************** CLOSES THE ACCOUNT  ****************************************************************/

			/* If account is successfully closed, this function returns true else it returns false */


	function S_A_close_account($account_id, $account_close_date, $account_close_time)
	{
		$get_status = S_A_A_I_D_get_status($account_id);
		
		if($get_status['status'] == "OPEN")
		{
			$operation0 = S_A_A_I_D_set_status($account_id,"CLOSE");
			
			$get = S_A_C_A_D_get($account_id);
			$remaining_balance = $get['current_amount'];
			$operation1 = S_A_Cl_D_add($account_id, $remaining_balance, $account_close_time, $account_close_date);
			
			$operation2 = S_A_I_A_D_delete($account_id);
			
			$operation3 = S_A_C_A_D_delete($account_id);
			
			$operation4 = S_A_W_D_delete_all($account_id);
			
			$operation5 = S_A_D_D_delete_all($account_id);
			
			$operation6 = S_A_N_T_D_delete($account_id);
			
			$operation7 = S_A_D_W_T_D_delete($account_id); 
			
			if($operation0 && $operation1 && $operation2 && $operation3 && $operation4 && $operation5 && $operation6 && $operation7)
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
	
	function S_A_withdrawal($account_id, $amount_withdrawn, $withdrawal_time, $withdrawal_date, $withdrawal_method, $transfer_to_account_id)
	{
		$get_status = S_A_A_I_D_get_status($account_id);
		
		if($get_status['status'] == "OPEN")
		{
			$withdrawal_id = S_A_generate_withdrawal_id($account_id);
			
			$elegible_withdrawal_1 = false;
			$elegible_withdrawal_2 = false;
			
			$constraints = S_A_Co_D_get();
			
			
			$get = S_A_C_A_D_get($account_id);
			$current_amount = $get['current_amount'];
			$current_amount = $current_amount - $amount_withdrawn;
			
			if($current_amount >= $constraints['minimum_balance'])
				$elegible_withdrawal_1 = true;
			
			$get = S_A_D_W_T_D_get($account_id);
			$total_withdrawal_today = $get['total_withdrawal_today'];
			$number_withdrawal_today = $get['number_withdrawal_today'];
			$total_withdrawal_today = $total_withdrawal_today + $amount_withdrawn;
			$number_withdrawal_today = $number_withdrawal_today+1;
			
			if($number_withdrawal_today <= $constraints['maximum_number_withdrawals_per_day'] && $total_withdrawal_today <= $constraints['maximum_amount_withdrawn_per_day'])
					$elegible_withdrawal_2 = true;
			
			
			$get = S_A_N_T_D_get($account_id);
			$number_withdrawals = $get['number_withdrawals'];
			$number_withdrawals = $number_withdrawals + "1";
			
			if($elegible_withdrawal_1 && $elegible_withdrawal_2)
			{	
				$operation1	= S_A_W_D_add($account_id, $withdrawal_id, $withdrawal_time, $withdrawal_date, $amount_withdrawn, $withdrawal_method, $transfer_to_account_id);
				$operation2	= S_A_C_A_D_set_current_amount($account_id,$current_amount);
				$operation3 = S_A_N_T_D_set_number_withdrawals($account_id, $number_withdrawals);
				$operation4 = S_A_D_W_T_D_set_number_withdrawals_today($account_id,$number_withdrawal_today);	
				$operation5 = S_A_D_W_T_D_set_total_withdrawal_today($account_id, $total_withdrawal_today);
			
				if($operation1 && $operation2 && $operation3 && $operation4 && $operation5)
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
	
	function S_A_deposit($account_id, $amount_deposited, $deposit_time, $deposit_date, $deposit_method)
	{
		$get_status = S_A_A_I_D_get_status($account_id);
		if( $get_status['status'] == "OPEN")
		{
				$deposit_id = S_A_generate_deposit_id($account_id);
				
			$operation1 = S_A_D_D_add($account_id, $deposit_id, $deposit_method, $amount_deposited, $deposit_time, $deposit_date);
			
				$get = S_A_C_A_D_get($account_id);
				$current_amount = $get['current_amount'];
				$current_amount = $current_amount + $amount_deposited;
				
			$operation2	= S_A_C_A_D_set_current_amount($account_id,$current_amount);
			
				$get = S_A_N_T_D_get($account_id);
				$number_deposits = $get['number_deposits'];
				$number_deposits = $number_deposits + "1";
				
			$operation3 = S_A_N_T_D_set_number_deposits($account_id, $number_deposits);
		
				$get = S_A_D_W_T_D_get($account_id);
				$total_withdrawal_today = $get['total_withdrawal_today'];
				
			$operation4 = S_A_D_W_T_D_set_total_withdrawal_today($account_id, $total_withdrawal_today);

			if($operation1 && $operation2 && $operation3 && $operation4)
				return true;
			else 
				return false;
		}
		else 
			return false;
	}

/*********************************************************************************************************************************************/	


	//CHECKS//
	
	//if(S_A_Co_D_add("10","1000","5000","10"))
	//	echo "Constraints Added Successfully";

	//if(S_A_close_account("S7","2011-11-14","11:34"))
	//	echo "Account Closed Successfully";

	//if(S_A_add_account("2011-11-14","11:34","10000"))
	//	echo "Account Added Successfully";

	//if(S_A_withdrawal("S8","2000","11:09","2010-10-09","ATM",""))
	//	echo "Withdrawal Done";

	//if(S_A_deposit("S1","6000","11:09", "2010-2-1", "ATM"))
	//	echo "Deposit Successful";

?>
