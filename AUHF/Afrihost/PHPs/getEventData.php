<?php
$username = "afriHost";
$database = "afrihost";
$password = "MmkVsOqwyNMy1Kf2";  
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$event_id = $_REQUEST["event_id"];
$json = array();

if ($conn){
    if (isset($event_id)) {
        $sqlQry = "SELECT * FROM EVENT WHERE event_id = '$event_id'";
        $qryRes = $conn->query($sqlQry);
        if($qryRes){
            while($row = $qryRes->fetch_assoc()){
                $json[] = $row;
            }
        }
    }else{
        $r ="Oops! Please try again.";
        echo $r;
    }
    mysqli_close($conn);
    if(!empty($json)){
         echo json_encode($json);
    }else{
        $res ="Event Non-existent";
        echo $res;
    }
        
} else {
    echo "Connection Error!";
}

?>