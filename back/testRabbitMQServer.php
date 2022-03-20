#!/usr/bin/php
<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doRegister($username, $password, $fname, $lname, $email, $seca1, $seca2)
{
    $hostname = '192.168.194.232';
    $dbuser = 'root';
    $dbpass = 'admin';
    $dbname = 'project';
    $dbport = "3306";
    $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname, $dbport);
	
    if (!$conn)
	{
		echo "Error connecting to database: ".$conn->connect_errno.PHP_EOL;
		exit(1);
	}
	echo "Connection Established".PHP_EOL;
	return $conn;
	
    $sql = "INSERT INTO `PROJECT`.`Users` (`userid`, `username`, `password`, `first_name`, `last_name`, `email`, `sec_ans1`, `sec_ans2`) VALUES (NULL, '$username', '$password', '$fname', '$lname', '$email', '$secq1', '$secq2', '$seca1', '$seca2')";

}

function doLogin($username,$password)
{
    $hostname = '192.168.194.232';
    $dbuser = 'root';
    $dbpass = 'admin';
    $dbname = 'project';
    $dbport = "3306";
    $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname, $dbport);
	
    if (!$conn)
	{
		echo "Error connecting to database: ".$conn->connect_errno.PHP_EOL;
		exit(1);
	}
	echo "Connection Established".PHP_EOL;
	return $conn;
	
	//$username = $POST['username'];
	//$password = $POST['password'];
	//$username2 = $mysqli->escape_string($username);
	//$password2 = $mysqli->escape_string($password);
	
	// lookup username and password in database
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	// check username and password
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) === 1){
		$row = mysqli_fetch_assoc($result);
		if($row['username']=== $username && row['password'] == $password){
			echo "Authorized";
			return true;
			//ADD SESSION CODES
		}
		else 
			{return 2;}
	}
}

function requestProcessor($request)
{
  echo "received request";
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
    {
      return doLogin($request['username'],$request['password']);
    }
    case "validate_session":
      return doValidate($request['sessionId']);
    case "register":
      return doRegister($request['username'], $request['password'], $request['fname'], $request['lname'], $request['email'], $request['answer1'], $request['answer2']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN";
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END";
exit();
?>
