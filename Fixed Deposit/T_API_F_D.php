<?php

include("A_D_API_F_D.php") ;
include("S_U_API_F_D.php") ;

/******************************************************  COMPUTATION FUNCTIONS  *********************************************************/

	function time_interval_half_yearly($initial_date, $end_date)
	{
		$interval = strtotime($end_date) - strtotime($initial_date) ;
		$interval = $interval / 15552000 ;
		return floor($interval) ;
	}
	
	function F_D_interest_rate($account_start_date, $account_end_date)
	{
		$time_interval = time_interval_half_yearly($account_start_date, $account_end_date) ;
		$interest_rate = 2+(0.5*($time_interval-1)) ;		//(2+.5(x-1))%
		return $interest_rate ;
	}
	
	function F_D_interest_rate_on_loan($loan_start_date, $loan_end_date)
	{
		$time_interval = time_interval_half_yearly($loan_start_date, $loan_end_date) ;
		$interest_rate_on_loan = 3+(0.5*($time_interval-1)) ;		//(3+.5(x-1))%
		return $interest_rate_on_loan ;
	}

/*****************************************************************************************************************************************/


/****************************************************** CHECKS ACCOUNT EXISTS/NOT EXISTS  ************************************************/

			/* If account exists this function returns an array with array['status'] = "OPEN" or "CLOSE" 
						 If account does not exists the function returns false */
	
	function CHECK_ACCOUNT_EXISTS_F_D($account_id)
	{
		return F_D_A_I_D_get_status($account_id) ;
	}
	
/*********************************************************************************************************************************************/		
	
	
/****************************************************** CREATES NEW ACCOUNT  ****************************************************************/

			/* If account is successfully created, this function returns the new account_id, else it returns false */	

	function F_D_add_account($account_start_date, $account_start_time, $initial_amount_deposited, $account_end_date, 		   							  						$interest_computation_interval, $eligible_for_tax_annual_income)
	{
		$account_id = F_D_generate_account_id() ;
		if($account_id)
		{
			$current_amount = $initial_amount_deposited ;
			$interest_rate = F_D_interest_rate($account_start_date, $account_end_date) ;			
			$opp1 = F_D_A_I_D_add($account_id, "OPEN") ;
			$opp2 = F_D_I_A_D_add($account_id, $account_start_time, $account_start_date,$account_end_date, $initial_amount_deposited) ;
			$opp3 = F_D_C_A_D_add($account_id, $current_amount) ;
			$opp4 = F_D_I_D_add($account_id, $interest_computation_interval,$interest_rate, 0) ;
			$opp5 = F_D_T_D_add($account_id, $eligible_for_tax_annual_income, "N", 0) ;
			
			if( $opp1 && $opp2 && $opp3 && $opp4 && $opp5 )
				return $account_id ;
			else
			{
				F_D_A_I_D_delete($account_id) ;
				F_D_I_A_D_delete($account_id) ;
				F_D_C_A_D_delete($account_id) ;
				F_D_I_D_delete($account_id) ;
				F_D_T_D_delete($account_id) ;
			}
		}
		return false ;
	}

/*********************************************************************************************************************************************/	
		
/**********************************************************  LOAN TAKEN  ****************************************************************/

			/* If Loan entry is successfull, this function returns true else it returns false */
	
	function F_D_loan($account_id, $initial_loan_amount, $loan_start_date, $loan_end_date)
	{
		$interest_rate_on_loan =  F_D_interest_rate_on_loan($loan_start_date, $loan_end_date) ;	
		$opp1 = F_D_L_D_add($account_id, $initial_loan_amount, $initial_loan_amount, $loan_start_date, $loan_end_date, $interest_rate_on_loan) ;
		if($opp1)
			return true ;
		return false ;
	}
	
/*********************************************************************************************************************************************/	


/****************************************************** DOES THE WITHDRAWAL  ****************************************************************/

			/* If account is successfully updated for withdrawal, this function returns true else it returns false */		
	
	function F_D_withdrawal($account_id, $premature_withdrawal, $withdrawal_time, $withdrawal_date, $amount_withdrawn, $withdrawal_medium, 							 						$transfer_to_account_id)
	{
		if($premature_withdrawal == "Y")
		{
			$initial_details = F_D_I_A_D_get($account_id) ;
			$end_date = $initial_details['account_end_date'] ;
			$premature_withdrawal_time = time_interval_half_yearly($withdrawal_date, $end_date) ;
			$penalty_on_premature_withdrawal = pow(2, $premature_withdrawal_time) ;
			$onTime_withdrawal_time = "00:00" ;
			$onTime_withdrawal_date = "0000-00-00" ;
		}
		else
		{
			$premature_withdrawal_time = "NA" ;
			$penalty_on_premature_withdrawal = "NA" ;
			$onTime_withdrawal_time = $withdrawal_time ;
			$onTime_withdrawal_date = $withdrawal_date ;
		}
			
		$current_account_details = F_D_C_A_D_get($account_id) ;
		if(!$current_account_details)
			return false ;
		$current_amount = $current_account_details['current_amount'] ;
		$remaining_balance = $current_amount - $amount_withdrawn ;
		
		$opp1 = F_D_W_D_add($account_id, $onTime_withdrawal_time, $onTime_withdrawal_date, $premature_withdrawal, $premature_withdrawal_time,									 				        $penalty_on_premature_withdrawal, $amount_withdrawn, $withdrawal_medium, $transfer_to_account_id) ;
		$opp2 = F_D_Cl_D_add($account_id, $remaining_balance, $withdrawal_time, $withdrawal_date) ;
		if( $opp1 && $opp2 )
		{
			$opp3 = F_D_I_A_D_delete($account_id) ;
			$opp4 = F_D_C_A_D_delete($account_id) ;
			$opp5 = F_D_I_D_delete($account_id) ;
			$opp6 = F_D_L_D_delete($account_id) ;
			$opp7 = F_D_T_D_delete($account_id) ;
			$opp8 = F_D_A_I_D_set_status($account_id, "CLOSE") ;
			if( $opp3 && $opp4 && $opp5 && $opp6 && $opp7 && $opp8 )
				return true ;
		}
		else
		{
			F_D_W_D_delete($account_id) ;
			F_D_Cl_D_delete($account_id) ;
		}
		return false ;
	}
	
/********************************************************************************************************************************************/	
	
	
/****************************************************** CLOSES THE ACCOUNT  ****************************************************************/

			/* If account is successfully closed, this function returns true else it returns false */
	
	function F_D_close_account($account_id, $account_close_date, $account_close_time)
	{
		$current_account_details = F_D_C_A_D_get($account_id) ;
		if(!$current_account_details)
			return false ;
		$remaining_balance = $current_account_details['current_amount'] ;
		
		$opp1 = F_D_Cl_D_add($account_id, $remaining_balance, $account_close_time, $account_close_date) ;
		if($opp1)
		{
			$opp2 = F_D_I_A_D_delete($account_id) ;
			$opp3 = F_D_C_A_D_delete($account_id) ;
			$opp4 = F_D_I_D_delete($account_id) ;
			$opp5 = F_D_L_D_delete($account_id) ;
			$opp6 = F_D_T_D_delete($account_id) ;
			$opp7 = F_D_A_I_D_set_status($account_id, "CLOSE") ;
			if( $opp2 && $opp3 && $opp4 && $opp5 && $opp6 && $opp7 )
				return true ;
		}
		return false ;
	}

/********************************************************************************************************************************************/

?>
