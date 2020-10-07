<?php
$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);
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

    $query="SELECT member_email from member";
    if($result = mysqli_query($conn,$query)){
        while($row=$result->fetch_assoc()){
            $row;
            $to="Boitumelomasesi202@gmail.com";
            $sub= "AUHF INVITATION";
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
            echo $row;
            die();
            if(mail($to,$sub,$msg,$head)){
              continue;
            }else {
              echo "failed to send invitations, please try again!";
              die();
            }
        }
        mysqli_close($conn);
        die();
    }
?>
