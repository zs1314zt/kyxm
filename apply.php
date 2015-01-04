<?php
    include("includes\connectDB.php");
    include_once("includes/session.php");

     date_default_timezone_set('Etc/GMT-8');     //这里设置了时区
            $date=date("Ymd");
  
      $num=$_SESSION['user_id'];
            $errorMessage="申请失败";
            if(isset($_POST['name'])){
                $project_name=$_POST['name'];
                $project_funds=$_POST['fund'];
                $project_desc=$_POST['desc'];
                $resultapply=$con->query("INSERT INTO  apply(apply_date,apply_status,user_id) 
            VALUES ('$date','00','$num')");
                $id=$con-> insert_id; 
                $result=$con->query("INSERT INTO project (apply_id,project_name,project_funds, project_desc,user_id) 
            VALUES ('$id','$project_name','$project_funds', '$project_desc','$num')");
            header("Location:index.php");
            }     
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <title>科研所</title>

    
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="css/main.css" type="text/css" />
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
        <div data-options="region:'south',split:true" style="height:50px;"><p id="tail">copyright@杭州电子科技大学 2014</p></div>
        <div data-options="region:'east',split:true" title="通知公告" style="width:200px;">
        <ul class="notice">
        <li >通知公告啊啊啊啊啊啊</li>
        <li >通知公告啊啊啊啊啊啊</li>
        <li >通知公告啊啊啊啊啊啊</li>
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
							<a href="index.php"><li >项目查询</li></a>
							<li class="selected">项目申报</li>
							<li>项目进度</li>
							<li>项目经费</li>
							<a href="achieve.php"><li>项目成果</li></a>
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
        <div data-options="region:'center',title:'我的项目->项目申报'">
            
    
            <div class="easyui-panel" style="width:100%">
            <div style="padding:10px 60px 20px 60px" >
            <form id="ff" action="apply.php" method="post">
                <table cellpadding="5" style="width:100%">
                    <tr>
                        <td >项目名称:</td>
                        <td style="padding: 7px 0"><input class="easyui-textbox" style="width:566px" type="text" name="name" data-options="required:true"></input></td>
                    </tr>
                    <tr>
                        <td>项目经费:</td>
                        <td style="padding: 7px 0"><input class="easyui-textbox" style="width:566px"  type="text" name="fund" data-options="required:true"></input></td>
                    </tr>
                   
                    <tr>
                        <td>项目描述:</td>
                        <td style="padding: 7px 0"><input class="easyui-textbox"  name="desc" data-options="multiline:true" style="width:566px;height:160px"></input></td>
                    </tr>
                     
                </table>
            
            <div style="text-align:left;padding:16px">
                <button type="submit" name="submit" value="submit"  style="padding: 0 0;border: 0;">
                    <a class="easyui-linkbutton">提交</a>
                </button>
                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">清空</a>
            </div></form>
            </div>
        </div>  
            
  
		
		</div><!--endcenter-->
    </div>
    <script>
        function submitForm(){
            $('#ff').form('submit，{url:action/apply_save.php}');
        }
        function clearForm(){
            $('#ff').form('clear');
        }
    </script>
   
    <?php
        include("includes\closeDB.php");
    ?>


</body>
</html>