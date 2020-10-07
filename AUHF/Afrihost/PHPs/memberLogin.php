<?php
    $username = "root";
    $database = "afrihost";
    $password = "";
    $conn = mysqli_connect("127.0.0.1", $username, $password, $database);

    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    $query = "SELECT member_id,member_fname,member_lname,member_email,member_password FROM member WHERE member_email='$email' and member_password='$password'";
    $output=array();
    if($conn){
        if($result = mysqli_query($conn,$query)){
            while($row=$result->fetch_assoc()){
                $output[]=$row;
            }
            if(sizeof($output)<1){
              //echo json_encode("Wrong email or password!");
                $arr= array(array("member_id"=>"false"));
                echo json_encode($arr);
            }else{

              echo json_encode($output);
              //echo json_encode($output);
            }
        }
        else{
          //echo json_encode("Something went wrong, please try again!");
          $arr = array(array("member_id" =>"false"));
          echo json_encode($arr);
          //die(mysqli_error($conn));
        }
    }else{
      echo json_encode("No internet connection!");
        $arr= array(array("member_id"=>"false"));
        echo json_encode($arr);
    }
    mysqli_close($conn);

    die();
?>
