<?php
$username = "afriHost";
$database = "afrihost";
$password = "MmkVsOqwyNMy1Kf2";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

if(isset($_POST['insert'])){
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO CORRES(file) VALUES ('$file')";
    if($conn){
      if(mysqli_query($conn,$query)){
        echo '<script>alert("Image inserted into database")</script>';
      }else{
        echo '<script>alert("SQL ERROR")</script>';
      }
    }else{
      echo '<script>alert("connection failed!")</script>';
    }
}else{
  echo '<script>alert("Please attach an image!")</script>';
}
mysqli_close($conn);
die();
?>
