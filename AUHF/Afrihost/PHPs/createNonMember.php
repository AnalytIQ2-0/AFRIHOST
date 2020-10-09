<?php

$username = "root";
$database = "afrihost";
$password = "";
$conn = mysqli_connect("127.0.0.1", $username, $password, $database);

if($conn){
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$country=$_POST["country"];
	$city=$_POST["city"];
	$contactNo=$_POST["contactNo"];
	$email=$_POST["email"];
	$joinDate=$_POST["joinDate"];
	$title=$_POST["title"];
	$companyName=$_POST["companyName"];
	$companySize=$_POST["companySize"];
	if(isset($fname,$lname,$country,$city,$contactNo)){
		$checkResult = $conn->query("SELECT * FROM non_member WHERE member_email = '$email' AND member_fname = '$fname' AND member_lname='$lname'");
        if($checkResult->num_rows > 0){
            echo ("This member already exists.");
        }
		else{
            $query ="INSERT INTO non_member (member_companyName,member_fname,member_lname,member_country,member_city,member_contactNo,member_email,member_joinDate,member_title,member_companySize) VALUES(?,?,?,?,?,?,?,?,?,?)";

            $fname=mysqli_real_escape_string($conn, $fname);
            $lname = mysqli_real_escape_string($conn, $lname );
						$country= mysqli_real_escape_string($conn,$country);
						$city= mysqli_real_escape_string($conn,$city);
						$contactNo= mysqli_real_escape_string($conn,$contactNo);
						$email= mysqli_real_escape_string($conn,$email);
						$joinDate= mysqli_real_escape_string($conn,$joinDate);
						$title= mysqli_real_escape_string($conn,$title);
						$companyName = mysqli_real_escape_string($conn,$companyName);
						$companySize = mysqli_real_escape_string($conn,$companySize);

            $stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $query)){
               die(mysqli_error($conn));
            }else{
                mysqli_stmt_bind_param($stmt,"ssssssssss",$companyName,$fname,$lname,$country,$city,$contactNo,$email,$joinDate,$title,$companySize);

                if($stmt->execute()){
                echo  "Your application has been submitted!";
                }
                else {
                    $output="Could not create Member. Please Try again.";
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
