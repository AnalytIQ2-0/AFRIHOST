<?php

$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

if($conn){
	$event_id=$_POST["EventID"];
	$event_name=$_POST["EventName"];
	$name=$_POST["Name"];
	$rsvp_desc=$_POST["Description"];
	$contactNo=$_POST["ContactNo"];
	$email=$_POST["Email"];
	if(isset($name,$rsvp_desc,$event_id,$event_name,$contactNo,$email)){
		$checkResult = $conn->query("SELECT * FROM rsvp WHERE event_id = '$event_id' AND member_name = '$name' AND member_email='$email'");
        if(mysqli_num_rows($checkResult) > 0){
            echo ("This member already exists.");
        }
		else{
            $query ="INSERT INTO rsvp (event_id,event_name,member_name,rsvp_desc,member_email,member_contactNo) VALUES(?,?,?,?,?,?)";
            $event_id=mysqli_real_escape_string($conn, $event_id);
            $name = mysqli_real_escape_string($conn, $name );
						$event_name= mysqli_real_escape_string($conn,$event_name);
						$rsvp_desc= mysqli_real_escape_string($conn,$rsvp_desc);
						$contactNo= mysqli_real_escape_string($conn,$contactNo);
						$email= mysqli_real_escape_string($conn,$email);


            $stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $query)){
               die(mysqli_error($conn));
            }else{
                mysqli_stmt_bind_param($stmt,"ssssss",$event_id,$event_name,$name,$rsvp_desc,$email,$contactNo);

                if($stmt->execute()){
                echo  "RSVP has been submitted!";
                }
                else {
                    $output="Could not RSVP. Please Try again.";
                    echo json_encode($output);
                    die(mysqli_error($conn));
                }
            }
		}
	}
	else{
		echo "Please fill in the required details";
	}

}else{
	echo "No connection";
}
mysqli_close($conn);
die();
?>
