<?php
    $username = "root";
    $database = "afrihost";
    $password = "";
    $conn = mysqli_connect("127.0.0.1", $username, $password, $database);

        //$member_id=$_REQUEST['member_ID'];
        $corres =$_REQUEST['corres_ID'];

        $query = "SELECT corres_image FROM correspondence where corres_id = $corres";

        $output=array();
        if($conn){
            if($result = mysqli_query($conn,$query)){
                while($row=$result->fetch_assoc()){
                    echo '<td><img height="300" length="300" src="data:image;base64,'.base64_encode($row['corres_image']).'" alt="image"></td>';
                }
            }
            else{
              echo "<p>Couldnt connect to database</p>";
            }
        }else{
            $arr= array(array("corres_image"=>"false"));
        }
        mysqli_close($conn);
        die();
?>
