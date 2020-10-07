<?php
    $username = "root";
    $database = "afrihost";
    $password = "";
    $conn = mysqli_connect("127.0.0.1", $username, $password, $database);

        $member_id=$_REQUEST['member_ID'];
        $corres =$_REQUEST['corres_ID'];

        $query = "SELECT corres_subject,corres_date FROM correspondence where member_id = $member_id AND corres_id = $corres";

        $output=array();
        if($conn){
            if($result = mysqli_query($conn,$query)){
                while($row=$result->fetch_assoc()){
                    $output[]=$row;
                }
                if(empty($output)){
                  $output=array(array('corres_subject'=>'false'));
                  echo json_encode($output);
                }
                else{
                    echo json_encode($output);
                }
            }
            else{
              $output=array(array('corres_subject'=>'false'));
              echo json_encode($output);
            }
        }else{
            $arr= array(array("corres_subject"=>"false"));
            echo json_encode($arr);
        }
        mysqli_close($conn);
        die();
?>
