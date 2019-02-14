<?php
   $conn = mysqli_connect('localhost','root','','admin')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");

   $rawPostData = file_get_contents('php://input');
    $jsonData = json_decode($rawPostData);

   $seachKey = isset($_POST["seachKey"]) ? $_POST["seachKey"] : ''; 
  // $homeid_ex = $_POST['home_id'];
   $homeid_ex =  $jsonData->home_id;
   $emailid_ex =  $jsonData->email_id;
   //echo $emailid_ex;die();
   if(!empty($seachKey))

      $query = "SELECT home_section.compain_name, home_section.company_name,home_section.task,home_section.amount, question.question, question.interview_question_id
            FROM home_section
            INNER JOIN question
            ON home_section.home_section_id=question.home_id";

            
    //   $query = "Select * From question where question like '%$seachKey%' ORDER BY interview_question_id DESC";
       else
       $query = "SELECT home_section.compain_name,home_section.compain_name,home_section.logo, home_section.company_name,home_section.task, 
       question.home_id, home_section.amount, question.question, question.interview_question_id, mission.mission_details, 
       mission.task_done,mission.requirements,mission.rewards
       FROM home_section 
       JOIN question ON home_section.home_section_id=question.home_id AND question.home_id = $homeid_ex     
       JOIN mission ON  home_section.home_section_id= mission.home_id AND question.home_id = $homeid_ex";

       
    
      $result = mysqli_query($conn, $query);

     // echo $result;die();
   
      $rowCount = mysqli_num_rows($result);
      

     // echo $rowCount;die();

     if($rowCount > 0){
        $postData = array();
        $row = mysqli_fetch_assoc($result);
        
        $logo = $row['logo'];
        $compaignData = $row['company_name'];
        $companyNameData = $row['compain_name'];
        $home_id = $row['home_id'];
        $interview_question_id = $row['interview_question_id'];
        
        //print_r($companyNameData);die();
        
          while($row = mysqli_fetch_assoc($result)){
            $postData[] = $row['mission_details'];
            $postData1[] = $row['task_done'];
            $postData2[] = $row['requirements'];
            $postData3[] = $row['rewards'];
            $postData4[] = $row['question'];
           // print_r($row['company_name']);die();
           //  $json = file_get_contents('data.json');
           // echo $json;die();
              
          }
           $query1 = "select featured from answer where email_id = '$emailid_ex' AND answer.home_id = '$homeid_ex'";
          $result1 = mysqli_query($conn, $query1);
      // //print_r($query1);die();
      // // echo $result;die();
   
           $rowCount1 = mysqli_num_rows($result1);
          $row1 = mysqli_fetch_assoc($result1);
          $FeaturedData = $row1['featured'];
          $resultData = array('status' => 'True', 'CompanyName' =>$companyNameData, 'ComapignData' =>$compaignData,
           'logo' =>$logo, 'home_id' =>$home_id, 'interview_question_id' =>$interview_question_id ,  'Featured' => $FeaturedData, 'Mission' => $postData, 'Task to be Done' => $postData1, 'Requirements' => $postData2, 
           'Rewards' => $postData3, 'Question' => $postData4 );
         // $arr        = array('result1'=>'jghj','result2'=>'ghhj'); 
        }
        else{
          $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
        }

       // $arr3=array($resultData,$arr); 
       //  print (json_encode($arr3));
     
        echo json_encode($resultData);
?>