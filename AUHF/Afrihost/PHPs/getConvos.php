<?php
    $username = "root";
    $database = "afrihost";
    $password = "";
    $conn = mysqli_connect("127.0.0.1", $username, $password, $database);

    $member = $_REQUEST['member_id'];
    $query = "SELECT corres_id,corres_subject,corres_date FROM correspondence WHERE member_id = '$member'";
    $output=array();

    if($conn){
        if($result = mysqli_query($conn,$query)){
            while($row=$result->fetch_assoc()){
                $output[]=$row;
            }
        }
        else{
          $arr = array(array("corres_id"=>"false"));
          echo json_encode($arr);
          //die(mysqli_error($conn));
        }
    }else{
        $arr= array(array("corres_id"=>"false"));
    }
    mysqli_close($conn);
    if(empty($output)){
        $arr= array(array("corres_id"=>"false"));
        echo json_encode($arr);
    }else{
      echo json_encode($output);
    }
    //mysqli_close($conn);
    die();
?>
