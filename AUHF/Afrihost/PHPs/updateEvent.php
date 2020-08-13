<?php 
$username = "afriHost";
$database = "afrihost";
$password = "MmkVsOqwyNMy1Kf2";  
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$eventId = $_REQUEST['event_id'];
$name = $_POST['eventName'];
$date = $_POST['eventDate'];
$start = $_POST['eventStart'];
$end = $_POST['eventEnd'];
$desc = $_POST['eventDesc'];
$venue = $_POST['eventVenue'];
$street = $_POST['eventStr'];
$city = $_POST['eventCity'];
$province = $_POST['eventProvince'];
$sub = $_POST['eventSuburb'];
$country = $_POST['eventCountry'];

if($conn){
    if(isset($eventId,$name,$date,$venue,$city,$country,$province,$start,$end)){
        $query = "UPDATE EVENT SET event_name = '$name',event_date='$date',event_startTime='$start',event_endTime='$end',event_description = '$desc',event_venueName='$venue',event_strAddress='$street',event_suburb='$sub',event_city='$city',event_province='$province',event_country='$country' WHERE event_id = '$eventId'";
        $qryResult = $conn->query($query);
        if($qryResult){
            echo "Update Successfull!";
        }else{
            echo "Something went wrong! Please try again.";
            //echo mysqli_error($conn);
        }
    }else{
        echo "Please fill-in all required fields.";
    }
}else{
    echo "Oops! Connection Error.";
}
mysqli_close($conn);
die();
?>