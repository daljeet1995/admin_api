<?php
header("content-type:application/json");
$rawPostData = file_get_contents('php://input');
    $jsonData = json_decode($rawPostData);

$conn=mysqli_connect("localhost","root","","app");

header('content-type:application/json');

   if($_SERVER['REQUEST_METHOD']=='POST'){  
 
    $email = $jsonData->email;
    $username = $jsonData->username;
    $lastname = $jsonData->lastname;
    $city = $jsonData->city;
    $gender = $jsonData->gender;
    $mobile = $jsonData->mobile;

    $query = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	
	mysqli_close($conn);
	
	if($count==1){
        $postData = array();
        while($row1 = mysqli_fetch_assoc($result)){
            $postData[] = $row1;
	  //	$seconds = 5 + time();
	  //	setcookie(loggedin, date("F jS - g:i a"), $seconds);
      //  header("location:login_success.php");
       // echo 'Login Username or Password';
    }
        $resultData = array('status' => 'True', 'Message' => "Login", 'Result' => $postData);
	}else{
        //echo 'Incorrect Username or Password';
        $resultData = array('status' => 'False', 'Message' => "Email Id Not Exist");
    }
}
   echo json_encode($resultData);



//     $sql = "SELECT * FROM users where email= $email";
   
//    $result = mysqli_query($conn,$sql);
//    // echo $sql;die();

//    if ( $email) {
//     //header('Location: http://example.com/new_page.html' );
//     echo "Login";
//     } else {
//         // continue with code
//         echo "NOT LOGIN";
//     }

// //    $numOfRows=mysqli_num_rows($result);
// //    if($numOfRows==1)
// //     {
// //     echo "An account with that email is already created..<a href ='createAccount.php'>Please enter a new account email.</a>";
// //     echo "<a href ='createAccount.php'></a>";

// //     }

//    }