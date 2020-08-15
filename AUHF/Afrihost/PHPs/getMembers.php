<?php
$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$json = array();

if($conn){
    $memQry = "SELECT * FROM MEMBER";
    $memberRes = $conn->query($memQry);
    if($memberRes){
        while($row=$memberRes->fetch_assoc()){
            $json[] = $row;
        }
    }

mysqli_close($conn);
if(!empty($json)){
     echo json_encode($json);
}else{
    $res ="There are no members";
    echo json_encode($res);
}

} else {
echo "Connection Error!";
}
?>
