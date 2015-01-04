<?php
    include("includes/connectDB.php");
    include("includes/session.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>科研所项目成果</title>

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
							<a href="index.php"><li>项目查询</li></a>
							<a href="apply.php"><li>项目申报</li></a>
							<li>项目进度</li>
							<li>项目经费</li>
							<li class="selected">项目成果</li>
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
        <div data-options="region:'center',title:'我的项目->项目成果'">
		
            
    <table id="dg"  class="easyui-datagrid" style="width:100%;height:100%"
        url="action/get_achieves.php"
        toolbar="#toolbar" pagination="true"
        rownumbers="true" fitColumns="true" singleSelect="true">
        
        <thead>
            <tr>
                <th field="project_name" width="50">项目名称</th>
                <th field="achieve_name" width="50">项目成果</th>
                <th field="achieve_date" width="20">获取时间</th>
                <th field="achieve_desc" width="50">成果描述</th>
                <th field="achieve_url" width="50">成果展示</th>
            </tr>
        </thead>       
           
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">添加项目成果</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">修改项目成果</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">删除项目成果</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
            closed="true" buttons="#dlg-buttons">
        <div class="ftitle">项目成果信息</div>
        <form id="fm" method="post" novalidate>
            <div class="fitem">
                <label>项目名称：</label>
                <input name="projectname" class="easyui-textbox" required="true">
            </div>
            <div class="fitem">
                <label>项目成果：</label>
                <input name="achievename" class="easyui-textbox" required="true">
            </div>
            <div class="fitem">
                <label>成果描述：</label>
                <input name="achievedesc" class="easyui-textbox">
            </div>
            <div class="fitem">
                <label>成果展示:</label>
                <input name="achieveurl" class="easyui-textbox" >
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">确认</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">取消</a>
    </div>
		</div><!--endcenter-->
    </div>


        <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('setTitle','添加项目成果');
            $('#fm').form('clear');
            url = 'action/save_achieve.php';
        }
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('setTitle','修改项目成果');
                $('#fm').form('load',row);
                url = 'update_user.php?id='+row.id;
            }
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('确认','确定要删除这条项目成果吗？',function(r){
                    if (r){
                        $.post('destroy_user.php',{id:row.id},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.msg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>

    <?php
        include("includes\closeDB.php");
    ?>
        
    </body>
</html>
