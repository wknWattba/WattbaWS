



<?php

$host         = "localhost";
$username     = "u269742845_root";
$password     = "Password123!";
$dbname       = "u269742845_wattba";
$result = 0;

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);
/* Check connection */

/* Get data from Client side using $_POST array */
$a=$_POST['name'];
$b=$_POST['phone'];
$c=$_POST['email'];
$d= $_POST['business'];
$e= $_POST['message'];

 $secretKey = '6LdN8qMZAAAAAKoDV3Xgn7qujUa9cMWfTwxeDeVB';
        $captcha = $_POST['response1'];
         
        
/* validate whether user has entered all values. */
if(!$a || !$b || !$c || !$d || !$e ){
  $result = 2;
}elseif (!strpos($c, "@") || !strpos($c, ".")) {
  $result = 3;
}
elseif(!$captcha) {
    // access
       $result = 4;

       
}
else {
   //SQL query to get results from database
   $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
   $sql    = "insert into contact (name,phone,email,business,message) values (?, ?, ?, ?, ?)";
   $stmt   = $conn->prepare($sql);
   $stmt->bind_param('sssss', $a,$b,$c,$d,$e);
   if($stmt->execute()){
     $result = 1;
   }
}
echo $result;
$conn->close();

?>

