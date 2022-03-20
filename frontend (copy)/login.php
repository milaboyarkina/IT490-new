<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include("functions.php");
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$request = array();
$request['type'] = "login";
$request['username'] = $_POST["username"];
$request['password'] = $_POST["password"];
$response = $client->send_request($request);
//$errFlag = False;
//$nameErr = False;
//$passErr = False;

if($response == 0){
	$error = date("Y-m-d") . "  " . date("h:i:sa") . "  --- Frontend --- " . "Error: failed to login using Username = " . $_POST["uname"] . " and Password = " . $_POST["psw"] . "\n";
	//log_event($error);
} else {
	$event = date("Y-m-d") . "  " . date("h:i:sa") . "Login successful using Username = " . $_POST["username"] . " and Password = " . $_POST["password"] . "\n";
	//log_event($event);
	$_SESSION["username"] = $_POST["username"];
	$_SESSION["user_id"] = $response["user_id"];
}

header("Location: home.php");
exit();		
}

/*
if(empty($name)){
	$errFlag = True;
	$nameErr = True;
}
if(empty($pass)){
	$errFlag = True;
	$passErr = True;
}

if($errFlag){
	$obj->nameErr = $nameErr;
	$obj->passErr = $passErr;
}else{
	$response = sendRabbit(array('type' => 'login', 'data' => array('username' => $name, 'password' => sha1($pass))));
	$obj->response = $response;
	if($response == 0){
		session_start();
		$_SESSION['user'] = $name;
		header("Location: localhost/frontend/home.php");
	}
}

echo json_encode($obj);

header("Location: localhost/frontend/home.php");
*/


?>
