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
            if(sizeof($json)<1){
              $arr= array(array("member_id"=>"false"));
                 echo json_encode($arr);
            }else{
                echo json_encode($json);
            }
        }
    }else{
      $arr= array(array("member_id"=>"false"));
        echo json_encode($arr);
    }

} else {
  $arr= array(array("member_id"=>"false"));
  echo json_encode($arr);
}
mysqli_close($conn);
die();

?>
