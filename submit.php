<?php
if (!session_start()) {
	session_start();
}


$post_data = $_POST;
//var_dump($post_data);exit;

if(!isset($post_data['emailid']) || $post_data['emailid']==""){
  
    $_SESSION['error_msg']='Unable to varify the data: emailid required';
   
    header('Location:http://'.$_SERVER['HTTP_HOST'].'/task/index.php');
exit;
}



require_once 'vendor/autoload.php';
require_once 'constant.php';
//$post_data['emailid']='vabhagwan@gmail.com';
$client   = new QuickEmailVerification\Client(VERIFICATION_KEY);
$quickemailverification  = $client->quickemailverification();
$_SESSION['emailid']=$post_data['emailid'];
try {

  $response = $quickemailverification->verify($post_data['emailid']);
$_SESSION['code']=201;
if($response->code==200){
	if($response->body['result']=='invalid'){
		$_SESSION['error_msg']="Given Emailid ".$post_data['emailid']." are Invalid due to ".$response->body['reason']." reason";
	}else{
		$_SESSION['code']=200;
		$_SESSION['emaildata']=$response->body;

	}
		

}else if($response->code=='400'){
	$_SESSION['error_msg']="Server can not understand the request sent to it. This is kind of response can occur if parameters are passed wrongly.";
}else if($response->code=='401'){
	$_SESSION['error_msg']="Server can not verify your authentication to use API. Please check whether API key is proper or not.";

}else if($response->code=='402'){
	$_SESSION['error_msg']="You are running out of your credit limit.";

}else if($response->code=='403'){
	$_SESSION['error_msg']="Your account has been disabled.";

}else if($response->code=='404'){
	$_SESSION['error_msg']="Requested API can not be found on server.";


}else if($response->code=='429'){
	$_SESSION['error_msg']="Too many requests. Rate limit exceeded.";
}else if($response->code=='500'){
	$_SESSION['error_msg']=" Internal Server Error.";
}	
header('Location:http://'.$_SERVER['HTTP_HOST'].'/task/result.php');
exit;
}
catch (Exception $e) {
	$_SESSION['error_msg']="Code: " . $e->getCode() . " Message: " . $e->getMessage();
header('Location:http://'.$_SERVER['HTTP_HOST'].'/task/result.php');
exit;

die();
}
?>