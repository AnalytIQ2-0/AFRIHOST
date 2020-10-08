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


if($conn){
    if(isset($eventName, $eventDate,$eventStart,$eventEnd,$eventDesc,$eventVenue,$eventStr,$eventSuburb,$eventProvince,$eventCountry)){
        $checkResult = $conn->query("SELECT * FROM EVENT WHERE event_name = '$eventName' AND event_date = '$eventDate'");
        if($checkResult->num_rows > 0){
            echo ("Event already exists!");
        }else{
            $query ="INSERT INTO EVENT (staff_id,event_name,event_date,event_startTime,event_endTime,event_description,event_venueName,event_strAddress,event_suburb,event_city,event_province,event_country) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $s_id=1;
            $eventName=mysqli_real_escape_string($conn, $eventName);
            $eventDate = mysqli_real_escape_string($conn, $eventDate );
            $eventStart = mysqli_real_escape_string($conn, $eventStart);
            $eventEnd = mysqli_real_escape_string($conn, $eventEnd);
            $eventDesc = mysqli_real_escape_string($conn, $eventDesc);
            $eventVenue = mysqli_real_escape_string($conn, $eventVenue);
            $eventStr = mysqli_real_escape_string($conn, $eventStr);
            $eventSuburb = mysqli_real_escape_string($conn, $eventSuburb);
            $eventCity = mysqli_real_escape_string($conn, $eventCity);
            $eventProvince = mysqli_real_escape_string($conn, $eventProvince);
            $eventCountry = mysqli_real_escape_string($conn, $eventCountry);

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $query)){
               die(mysqli_error($conn));
            }else{
                mysqli_stmt_bind_param($stmt,"isssssssssss",$s_id,$eventName,$eventDate,$eventStart,$eventEnd,$eventDesc,$eventVenue,$eventStr,$eventSuburb,$eventCity,$eventProvince,$eventCountry);

                if($stmt->execute()){
                echo  "Event successfully created!";
                }
                else {
                    $output="Could not create event. Please Try again.";
                    echo json_encode($output);
                    die(mysqli_error($conn));
                }
            }
          }
    }else{

        echo json_encode("Please fill in all the fields.");
    }
}else{
    die("Connection not established");
}
mysqli_close($conn);
die();
?>
