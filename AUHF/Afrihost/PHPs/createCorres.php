<?php
$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

$member_id=$_POST['member_ID'];
$member_subject=$_POST['subject'];
$date = $_POST['date'];

if(!isset($_POST["insert"])){
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO correspondence(corres_image,member_id,corres_subject,corres_date) VALUES ('$file','$member_id','$member_subject', '$date')";
    if($conn){
      if(mysqli_query($conn,$query)){
        echo "insert ok";
      }else{
        echo 'Unsuccessful, please try again!';
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
