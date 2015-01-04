<?php
    include("includes\connectDB.php");

   /* function f_getprojectmessage($con){
        //$result=array([id]=>array("projectname"=>NULL,"applystatus"=>NULL,"projectfunts"=>NULL,"projectdesc"=>NULL,"achievename"=>NULL));
       /* $sql="SELECT p.project_name  
        ,ap.apply_status,p.project_funds,ps.progress_value,p.project_desc,ac.achieve_name
              FROM project p
              LEFT JOIN apply ap ON p.`apply_id`=ap.`apply_id` 
              LEFT JOIN progress ps ON p.project_id=ps.project_id
              LEFT JOIN achieve ac ON p.`project_id`=ac.`project_id`
              WHERE p.`user_id`=11053107";
       
        $result= $con->query($sql);
        $i=0;
        $p=0;
        while($r=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
        if($i%6==0)
        {
          $new[$p+1][]=$r;
          $p=$p+1;
        }
        else{ $new[$p][]=$r;}
        $i++;
        }
        return $new;*/


      /*  $sql="SELECT p.project_name,ap.apply_status,p.project_funds,ps.progress_value,p.project_desc,ac.achieve_name
              FROM project p
              LEFT JOIN apply ap ON p.`apply_id`=ap.`apply_id` 
              LEFT JOIN progress ps ON p.project_id=ps.project_id
              LEFT JOIN achieve ac ON p.`project_id`=ac.`project_id`
              WHERE p.`user_id`=11053107";
       
        $result= $con->query($sql);


        
    }*/
              
             
          /*    $result  =  $con-> query ( "SELECT * FROM project" ,  MYSQLI_USE_RESULT ) ;
              while($row = mysql_fetch_array($result))
          { echo "aaaaa";
          echo $row['project_id'] . " " . $row['project_name'];
          echo "<br />";
          } 
           echo "bbbbb";*/
            /* bind parameters for markers */
            echo '12345';
            echo $_POST["fromdate"]; 
            echo $_POST["applystatus"];
            function getProjectMessage($con){
             $num='2';
            $stmt  =  $con -> prepare ( "SELECT p.project_name,ap.apply_status,p.project_desc,ps.progress_value,ap.apply_date,ac.achieve_name
                      FROM project p
                      LEFT JOIN apply ap ON p.`apply_id`=ap.`apply_id` 
                      LEFT JOIN progress ps ON p.project_id=ps.project_id
                      LEFT JOIN achieve ac ON p.`project_id`=ac.`project_id`
                      WHERE p.`user_id`=?" );
            $stmt->bind_param("s", $num);

            /* execute query */
            $stmt->execute();

            /* instead of bind_result: */
            $result = $stmt->get_result();
            return $result;
            }

    
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>科研所</title>

    
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery-tool.css" type="text/css" />


    <link rel="stylesheet" type="text/css" href="jqueryeasyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jqueryeasyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jqueryeasyui/demo.css">
    <script type="text/javascript" src="jqueryeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="jqueryeasyui/jquery.easyui.min.js"></script>

    <script type="text/javascript" src="js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</head>
<body>
    <div id="cc" class="easyui-layout" style="width:100%;height:650px;">
        <div data-options="region:'north'" style="height:105px"><img src="images/index/logo.png"/></div>
        <div data-options="region:'south',split:true" style="height:50px;"><footer><p>copyright@杭州电子科技大学 2014</p></footer></div>
        <div data-options="region:'east',split:true" title="通知公告" style="width:200px;">
        <ul>
        <li>通知公告啊啊啊啊啊啊</li>
        <li>通知公告啊啊啊啊啊啊</li>
        <li>通知公告啊啊啊啊啊啊</li>
        </ul>
        </div><!--eneast-->
        
        <div data-options="region:'west',split:true" title="" style="width:207px;">
		<ul id="expmenu-freebie">
			<li>
				<!-- Start Freebie -->
				<ul class="expmenu">
					<li>
						<div class="header">
							<span class="label" style="background-image: url(images/messages.png);">我的项目</span>
							<span class="arrow up"></span>
						</div>
						<ul class="left_menu">
							<li class="selected">项目查询</li>
							<li>项目申报</li>
							<li>项目进度</li>
							<li>项目经费</li>
							<li>项目成果</li>
						</ul>
					</li>
					<li>
						<div class="header">
							<span class="label" style="background-image: url(images/messages.png);">所有项目</span>
							<span class="arrow up"></span>
						</div>
						<ul class="left_menu">
							<li>项目查询</li>
							<li>项目进度</li>
							<li>项目成果</li>
						</ul>
					</li>
					
					<li>
						<div class="header">
							<span class="label" style="background-image: url(images/search.png);">信息修改</span>
						</div>
					</li>
				</ul>
				<!-- End Freebie -->
			</li>
		</ul>
		</div><!--endwest-->
        <div data-options="region:'center',title:'我的项目->项目查询'">
		
	<table class="easyui-datagrid" title="" style="width:100%;height:100%"
            data-options="rownumbers:true,singleSelect:true,url:'datagrid_data1.json',method:'get',toolbar:'#tb',footer:'#ft'">
        <thead>
            <tr>
                <th data-options="field:'itemid',width:120">项目名称</th>
                <th data-options="field:'productid',width:100">项目审批状态</th>
                <th data-options="field:'listprice',width:100">申请时间</th>
                <th data-options="field:'attr1',width:120">项目进度</th>
                <th data-options="field:'unitcost',width:352">项目描述</th>
                <th data-options="field:'attr1',width:120">项目成果</th>
            </tr>
        </thead>
         <?php
           $result=getProjectMessage($con); 

            /* now you can fetch the results into an array - NICE */
            while ($myrow = $result->fetch_assoc()) {

            // use your $myrow array as you would with any other fetch
           // printf("%s is in district %s\n", $num, $myrow['project_funds']);?>
         <tr>
            <td><?php echo $myrow['project_name'];?></td>
            <td><?php if($myrow['apply_status']=='00') {echo '未审批';}
                      elseif($myrow['apply_status']=='01') {echo '已审批通过';}
                      elseif($myrow['apply_status']=='10') {echo '审批未通过';}
                      else {echo '状态错误';}
 
                ?></td>
            <td><?php echo $myrow['apply_date'];?></td>
            <td><?php echo $myrow['progress_value'];?></td>
            <td><?php echo $myrow['project_desc'];?></td>
            <td><?php echo $myrow['achieve_name'];?></td>
         </tr>   
         <?php }?>
        
           
       
    
       

                
        
           <!-- <tr>
                <td>项目名称1</td>
                <td>项目审批状态1</td>
                <td>项目经费1</td>
                <td>项目描述1</td>
                <td>项目成果1</td>
            </tr>-->
    </table>
     <form action="test.php" method="post">
    <div id="tb" style="padding:2px 5px;">
        申请时间 From: <input name="fromdate" class="easyui-datebox" style="width:110px">
        To: <input name="todate" class="easyui-datebox" style="width:110px">
        项目状态: 
        <select name="applystatus" class="easyui-combobox" panelHeight="auto" style="width:100px">
            <option value="all">所有状态</option>
            <option value="00">未审批</option>
            <option value="10">审批未通过</option>
            <option value="01">已审批通过</option>
        </select>
       <button name="Submit" type="submit"> <a  class="easyui-linkbutton" iconCls="icon-search">搜索</a></button>
    </div>
    </form>
            
    <div id="ft" style="padding:2px 5px;">
        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cut" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"></a>
    </div>
		
		</div><!--endcenter-->
    </div>
    <!--
    <script type="text/javascript">
        function addPanel(){
            var region = $('#region').val();
            var options = {
                region: region
            };
            if (region=='north' || region=='south'){
                options.height = 50;
            } else {
                options.width = 100;
                options.split = true;
                options.title = $('#region option:selected').text();
            }
            $('#cc').layout('add', options);
        }
        function removePanel(){
            $('#cc').layout('remove', $('#region').val());
        }



		$(window).load(function(){
			$("div[class='panel-title']").text(" ");
		})
    </script>-->
    <?php
        include("includes\closeDB.php");
    ?>
</body>
</html>