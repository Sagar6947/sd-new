<?php
$user = "ekaumotp794454";
$password = "6337";
$senderid = "EKAUMB";
$smsurl = "https://kit19.com/ComposeSMS.aspx?";

$otp= rand(1000,99999); 


echo $otp;

$phonenum = $_POST['mobile'];
$message = "Your OTP is ".$otp." to verify your phone number with sahardirectory.com Pl doesn't share this with anyone else. Thanks Team Sahar Directory (Ekaum Enterprises)";
$debug = true; 
SMSSend($phonenum,$message,$debug);
// $arr = array($otp,$phonenum);


function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen($args[1],80, $errno, $errstr, 30);
    if (!$fp) {
    return("$errstr ($errno)");
    } else {
        $args[3] = "C".$args[3];
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
        $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}

function SMSSend($phone, $msg, $debug=false){
    global $user,$password,$senderid,$smsurl;

    $url = 'username='.$user;
    $url.= '&password='.$password;
    $url.= '&sender='.$senderid;
    $url.= '&to='.urlencode($phone);
    $url.= '&message='.urlencode($msg);
    $url.= '&priority=1';
    $url.= '&dnd=1';
    $url.= '&unicode=0';
    $url.= '&dlttemplateid=1707165470454229593';

    $urltouse =  $smsurl.$url;
    
    // echo $urltouse;
   
    if ($debug) { $rc1 = "Request: <br>$urltouse<br><br>"; }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urltouse);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Open the URL to send the message
    //$response = httpRequest($urltouse);
    $response = curl_exec($ch);
    curl_close($ch);
    // echo $urltouse;
    if ($debug) {
        $rc = "Response: <br><pre>".
        str_replace(array("<",">"),array("&lt;","&gt;"),$response).
        "</pre><br>"; }

    return($response);
}
// exit();
?>