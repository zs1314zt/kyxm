<?php
include("../includes/connectDB.php");
include_once("../includes/session.php");
            $num=$_SESSION['user_id'];
            $errorMessage="申请失败"；
                $project_name=$_POST['name'];
                $project_funds=$_POST['fund'];
                $project_desc=$_POST['desc'];
                $result=$con->query("INSERT INTO project (project_name,project_funds, project_desc,user_id) 
            VALUES ('$project_name','$project_funds', '$project_desc','$num')");
    if ($result){
	    echo json_encode(array('success'=>true));
    } else {
	    echo json_encode(array('errorMsg'=>$errorMessage));
    }
           

include("../includes/closeDB.php");
?>

