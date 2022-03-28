



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
$b=$_POST['type'];
$c=$_POST['employees'];
$d= $_POST['street'];
$e= $_POST['postcode'];
$f= $_POST['city'];
$g= $_POST['website'];
$h= $_POST['firstname'];
$i= $_POST['lastname'];
$j= $_POST['email'];
$k= $_POST['phone'];
$l= $_POST['textarea'];
 $secretKey = '6LdN8qMZAAAAAKoDV3Xgn7qujUa9cMWfTwxeDeVB';
        $captcha = $_POST['response1'];
         
        
/* validate whether user has entered all values. */
if(!$a || !$b || !$c || !$d || !$e || !$f || !$g || !$h || !$i || !$j || !$k || !$l){
  $result = 2;
}elseif (!strpos($j, "@") || !strpos($j, ".")) {
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
   $sql    = "insert into signup (name, type, employees, street, postcode, city, website, firstname,lastname, email,phone,textarea) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
   $stmt   = $conn->prepare($sql);
   $stmt->bind_param('ssssssssssss', $a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l);
   if($stmt->execute()){
     $result = 1;
   }
}
echo $result;
$conn->close();

?>

