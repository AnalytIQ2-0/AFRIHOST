<?php
$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$event_id = $_REQUEST["event_id"];
$json = array();

if ($conn){
    if (isset($event_id)) {
        $sqlQry = "SELECT * FROM rsvp WHERE event_id = '$event_id'";
        $qryRes = $conn->query($sqlQry);
        if($qryRes){
            while($row = $qryRes->fetch_assoc()){
                $json[] = $row;
            }
        }
    }else{
      $arr= array(array("rsvp_id"=>"false"));
        echo $arr;
    }
    mysqli_close($conn);
    if(!empty($json)){
         echo json_encode($json);
    }else{
      $arr= array(array("rsvp_id"=>"false"));
        echo $arr;
    }

} else {
  $arr= array(array("rsvp_id"=>"false"));
    echo $arr;
}
die();
?>
