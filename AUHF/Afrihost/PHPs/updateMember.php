<?php 
$username = "afriHost";
$database = "afrihost";
$password = "MmkVsOqwyNMy1Kf2";  
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$member_id = $_REQUEST["member_id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$title = $_POST["title"];
$company = $_POST["companyName"];
$size = $_POST["companySize"];
$phone = $_POST["contactNo"];
$email = $_POST["email"];
$country = $_POST["country"];
$city = $_POST["city"];

if($conn){
    if(isset($member_id, $title, $fname, $lname, $city, $country,$phone,$email)){
        $query = "UPDATE MEMBER SET member_fname = '$fname', member_lname = '$lname',member_title = '$title',member_companyName='$company',member_companySize='$size',member_city='$city',member_country='$country',member_email='$email',member_contactNo='$phone' WHERE member_id = '$member_id'";
        $queryResult = $conn->query($query);
        if($queryResult){
            $msg = "Update Successfull!";
            echo $msg;
        }else{
            $msg = "Error Occured. Upadate Unsuccessfull!";
            echo $msg;
        }
    }else{
        $msg = "Please ensure to fill-in all the required fields.";
        echo $msg;
    }
}else{
    $msg = "Oops! Connection Error.";
    echo $msg;
}
mysqli_close($conn);
die();
?>