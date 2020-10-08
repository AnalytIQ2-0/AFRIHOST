<?php
$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);
$output = array();
$eventName = $_POST['eventName'];
$eventDate =  $_POST['eventDate'];
$eventStart =  $_POST['eventStart'];
$eventEnd =  $_POST['eventEnd'];
$eventDesc =  $_POST['eventDesc'];
$eventVenue =  $_POST['eventVenue'];
$eventStr =  $_POST['eventStr'];
$eventSuburb =  $_POST['eventSuburb'];
$eventCity =  $_POST['eventCity'];
$eventProvince =  $_POST['eventProvince'];
$eventCountry =  $_POST['eventCountry'];
    $queryS="SELECT count(*) as size from member";
    $count=0;
    if($result = mysqli_query($conn,$queryS)){
      $row=$result->fetch_assoc();
      $count=$row['size'];
    }
    $query="SELECT member_email from member";
    if($result = mysqli_query($conn,$query)){
      $to="";
      $num=0;
        while($row=$result->fetch_assoc()){
            $to.=$row['member_email'];
            if($num<$count-1){
              $to.=",";
            }
            $num++;
        }
        $sub= "AUHF INVITATION";
        //$msg="Something Something";
        $msg = "
                Name: ".$eventName."
                Date: ".$eventDate."
                Start time: ".$eventStart."
                End time: ".$eventEnd."
                Description: ".$eventDesc."

                Street address: ".$eventStr."
                Suburb: ".$eventSuburb."
                City: ".$eventCity."
                Province :".$eventProvince."
                Country: ".$eventCountry."

                Warm regards
                AUHF";
        $head = "From: auhfmembers@gmail.com";
        if(mail($to,$sub,$msg,$head)){
          echo "successfully send email!";
        }else {
          echo "failed to send invitations, please try again!";
        }

    }else{
      echo "Could connect to database!";
    }
    mysqli_close($conn);
    die();
?>
