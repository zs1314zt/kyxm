<?php
    include("../includes/connectDB.php");
    include_once("../includes/session.php");
    date_default_timezone_set('Etc/GMT-8');     //这里设置了时区
            $date=date("Ymd");

    $errorMessage="添加项目成果失败";
   // if(isset($_POST['projectname'])){
        $projectname=$_POST['projectname'];
        $achievename=$_POST['achievename'];
        $achievedesc=$_POST['achievedesc'];
        $achieveurl=$_POST['achieveurl'];
         $num=$_SESSION['user_id'];

       $proid=$con->prepare("SELECT project_id FROM project WHERE project_name=? and user_id=?");

        $proid->bind_param("ss",$projectname,$num); 
        $proid->execute();
        $proid->store_result();
        $proid -> bind_result ( $rs );
        $proid->fetch();

       if($rs){
            $result=$con->query("INSERT INTO achieve (project_id,achieve_name, achieve_desc,achieve_url,achieve_date) 
            VALUES ('$rs','$achievename', '$achievedesc', '$achieveurl','$date')");
        }else{
           $errorMessage = "当前用户下不存在该项目";
        }
       
   // }

  
      
      if ($result){
	    echo json_encode(array('success'=>true));
    } else {
	    echo json_encode(array('errorMsg'=>$errorMessage));
    }
    include("../includes/closeDB.php");
?>


