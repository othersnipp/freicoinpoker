<?php
class paypal{
	public $class_name='paypal'; 
	public $class_protocol='paypal'; 
	public $pay_template='payments/paypal.tpl';
	public $paid_tempalte='payments/paypal__test_paid.tpl';
	public $icon='icons/paypal.png';
	
	public $identify_post_field_1='verify_sign';		// post field name recieved to IPN to identify paypal test
	public $identify_post_field_2='txn_id';		// post field name recieved to IPN to identify paypal test
	
	public $identify_get_field_1='';
	public $identify_get_field_2='';
	
	public $identify_REMOTE_HOST='ipn.paypal.com';
	public $identify_REMOTE_ADDR='173.0.82.126';
	
	function __construct(){
		global $db;
		$payment=$db->getRow("select * from payment_engines where _plugin='".$this->class_name."' limit 1");
		
		if (!isset($payment->id)){
			$db->query("insert into payment_engines set 
							_plugin='".$this->class_name."' ,
							identify_pf_1='".$this->identify_post_field_1."' ,
							identify_pf_2='".$this->identify_post_field_2."' ,
							identify_gf_1='".$this->identify_get_field_1."' ,
							identify_gf_2='".$this->identify_get_field_2."' ,
							identify_sf_1='".$this->identify_REMOTE_HOST."' ,
							identify_sf_2='".$this->identify_REMOTE_ADDR."' ,
							enabled='0'");
		}
		
		$this->id=$payment->id;		
		$this->title=$payment->title;
		$this->enabled=$payment->enabled;
		
		$this->email=$payment->email;
		$this->extra_1=$payment->extra_1;
		$this->extra_2=$payment->extra_2;
		$this->extra_3=$payment->extra_3;
		$this->extra_4=$payment->extra_4;
		
	}
	
	public function validatePayment(){
		// read the post from PayPal system and add 'cmd'
		if ($this->email==''){return false;}
		global $db;
		$result='';
		$req = 'cmd=_notify-validate';

		foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$req .= "&$key=$value";
		}//end for

		// post back to PayPal system to validate
		$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
		$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

		// assign posted variables to local variables
		$item_name = $_POST['item_name'];
		$item_number = $_POST['item_number'];
		$payment_status = $_POST['payment_status'];
		$payment_amount = $_POST['mc_gross'];
		$payment_currency = $_POST['mc_currency'];
		$txn_id = cp('txn_id');
		$receiver_email = $_POST['receiver_email'];
		$payer_email = $_POST['payer_email'];

		if (!$fp) {
			return false;
		} else {
			fputs ($fp, $header . $req);
			while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0) {
			// check the payment_status is Completed
			if (strtoupper($payment_status)=='COMPLETED'){ //payment is completed 
				// check that txn_id has not been previously processed
				$txnNum=$db->getFunction("select count(*) from transactions where uniqueId='".$txn_id."' and protocol='".$this->class_protocol."'");
				if ($txnNum>'0'){fclose ($fp);return false;}
				// check that receiver_email is your Primary PayPal email
				if (strtolower($receiver_email)==$this->email){
				
					// get and check player id
						$result->player_id=cp('option_selection1');
						$result->amount=cp('mc_gross');
						$result->fee=cp('mc_fee');
						
						return $result;
						
				
				}//end if my email
			}//end if payment completed
						
			}//end if verified

			}//end while
		fclose ($fp);
		}//end if fp
		return false;
	}//
}//end class
?>