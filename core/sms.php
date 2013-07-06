<?php

class SMS {
var $AccountSid="ACcc2a096a4a2b442d99b102f3154ca044";
var $AuthToken="0b97c1f21b8c93f6fb672ab63d491112";

public function __construct($message=false){
		require_once DIR."/libs/twilio/Services/Twilio.php";
    $this->CON=new Services_Twilio($this->AccountSid, $this->AuthToken);
    if($message){
		$numbers["6197339957"]="Nick";
		$this->SMS($numbers,$message);
    }
}
public function SMS($number,$message){
    $from='6193464457';
    foreach($number as $to=>$name){
    	$msg=str_replace('NAME',$name,$message);
        $this->CON->account->sms_messages->create($from, $to, $msg);
        sleep(1);
    }
    return "SMS Sent\r\n";
}
}
?>