<?php
    $username = "root";
    $database = "afrihost";
    $password = "";
    $conn = mysqli_connect("127.0.0.1", $username, $password, $database);
        $member_id=$_REQUEST['member_ID'];
        $query = "SELECT * FROM corres where member_id = $member_id";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result)){
          if(empty($result)){
            $arr = array(array("corres_image" =>"false"));
            echo json_encode($arr);
          }
          else{
          $arr = array(array("corres_image" =>base64_encode($row['corres_image'])));
          echo json_encode($arr);
          }
        }
    mysqli_close($conn);
    die();
?>
