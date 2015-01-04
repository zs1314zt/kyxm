<?php
    include("includes\connectDB.php");
    include_once("includes/session.php");
    echo '00000';
    echo $_POST["fromdate"]; 
    echo $_POST["applystatus"]
?>
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
     <table class="easyui-datagrid" 
            >
        <thead>
            <tr>
                <th data-options="field:'itemid',width:120">项目名称</th>
                <th data-options="field:'productid',width:100">项目审批状态</th>
                <th data-options="field:'listprice',width:100">申请时间</th>
                <th data-options="field:'attr2',width:120">项目进度</th>
                <th data-options="field:'unitcost',width:352">项目描述</th>
                <th data-options="field:'attr1',width:120">项目成果</th>
            </tr>
        
        </thead>
    </table>

   
            </div><!--endcenter-->
</body>
</html>