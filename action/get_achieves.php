<?php
    include("../includes/connectDB.php");
    include_once("../includes/session.php");


    $num=$_SESSION['user_id'];
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;

    $achieve=$con->prepare("SELECT p.project_name,a.achieve_date,a.achieve_name,a.achieve_desc,a.achieve_url 
            FROM project p,achieve a
            WHERE a.project_id=p.project_id AND p.user_id=? limit ?, ?");

    $achieve->bind_param("sii",$num, $offset, $rows); 
    $achieve->execute();

    $rs=$achieve->get_result();

	$items = array();
	while ($myrow = $rs->fetch_assoc()){
		array_push($items, $myrow);
	} 

    $result = array();
    $result["total"] = $rs->num_rows;
	$result["rows"] = $items;

    //echo $result["total"];
	echo json_encode($items);
       
            
      
    include("../includes/closeDB.php");
?>


