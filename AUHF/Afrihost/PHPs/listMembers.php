<?php
    $username = "root";
    $database = "afrihost";
    $password = "";
    $conn = mysqli_connect("127.0.0.1", $username, $password, $database);
        $query = "SELECT * FROM member";

        $output=array();
    if($conn){
        if($result = mysqli_query($conn,$query)){
            while($row=$result->fetch_assoc()){
                $output[]=$row;
            }
        }
        else{
          $arr = array(array("member_id" =>"false"));
          echo json_encode($arr);
          die(mysqli_error($conn));
        }
    }else{
        $arr= array(array("member_id"=>"false"));
    }
    mysqli_close($conn);
    if(empty($output)){
        $arr= array(array("member_id"=>"false"));
        echo json_encode($arr);
    }else{
      echo json_encode($output);
    }
    die();
?>
