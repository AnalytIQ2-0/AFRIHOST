<?php
$username = "afriHost";
$database = "afrihost";
$password = "MmkVsOqwyNMy1Kf2";  
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$json = array();

if($conn){
    
    $memberRes = $conn->query("SELECT * FROM EVENT");
    if($memberRes){
        while($row=$memberRes->fetch_assoc()){
            $json[] = $row;
        }
    }

mysqli_close($conn);
if(!empty($json)){
     echo json_encode($json);
}else{
    $res ="There are no events.";
    echo json_encode($res);
}
    
} else {
echo "Connection Error!";
}
?>