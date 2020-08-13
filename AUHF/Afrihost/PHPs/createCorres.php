<?php
$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$member_id=$_POST['member_ID'];
$member_subject=$_POST['subject'];

if(!isset($_POST["insert"])){
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO corres(corres_image,member_id,corres_subject) VALUES ('$file','$member_id','$member_subject')";
    if($conn){
      if(mysqli_query($conn,$query)){
        echo "insert ok";
      }else{
        echo 'SQL ERROR';
      }
    }else{
      echo 'connection failed!';
    }
  }else{
    echo 'Please attach an image!';
}
mysqli_close($conn);
die();
?>
