<?php
$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$mem_id = $_REQUEST["member_id"];
$json = array();

if ($conn) {
    if (isset($mem_id)) {
        $sqlQry = "SELECT * FROM MEMBER WHERE member_id = '$mem_id'";
        $qryRes = $conn->query($sqlQry);
        if($qryRes){
            while($row = $qryRes->fetch_assoc()){
                $json[] = $row;
            }
        }
    }else{
        $r ="not set";
        echo json_encode($r);
    }
    mysqli_close($conn);
    if(!empty($json)){
         echo json_encode($json);
    }else{
        $res ="Member Non-existent";
        echo json_encode($res);
    }

} else {
    echo "Connection Error!";
}

?>
