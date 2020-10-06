<?php
  $to="kgaugeloevidence990604@gmail.com";
  $sub= "Testing php mail send";
  $msg = "something short, dont worry you got this!";
  $head = "From: auhfmembers@gmail.com";

  if(mail($to,$sub,$msg,$head)){
    echo "email was successfully sent";
  }
  else{
    echo "failed to send an email";
  }
?>
