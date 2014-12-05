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
        <div data-options="region:'east',split:true" title="East" style="width:100px;"></div>
        <div data-options="region:'west',split:true" title="West" style="width:207px;">
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
        <div data-options="region:'center',title:'Center'">
		
	<table class="easyui-datagrid" title="DataGrid Complex Toolbar" style="width:100%;height:100%"
            data-options="rownumbers:true,singleSelect:true,url:'datagrid_data1.json',method:'get',toolbar:'#tb',footer:'#ft'">
        <thead>
            <tr>
                <th data-options="field:'itemid',width:80">Item ID</th>
                <th data-options="field:'productid',width:100">Product</th>
                <th data-options="field:'listprice',width:80,align:'right'">List Price</th>
                <th data-options="field:'unitcost',width:80,align:'right'">Unit Cost</th>
                <th data-options="field:'attr1',width:240">Attribute</th>
                <th data-options="field:'status',width:60,align:'center'">Status</th>
            </tr>
        </thead>
    </table>
    <div id="tb" style="padding:2px 5px;">
        Date From: <input class="easyui-datebox" style="width:110px">
        To: <input class="easyui-datebox" style="width:110px">
        Language: 
        <select class="easyui-combobox" panelHeight="auto" style="width:100px">
            <option value="java">Java</option>
            <option value="c">C</option>
            <option value="basic">Basic</option>
            <option value="perl">Perl</option>
            <option value="python">Python</option>
        </select>
        <a href="#" class="easyui-linkbutton" iconCls="icon-search">Search</a>
    </div>
    <div id="ft" style="padding:2px 5px;">
        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cut" plain="true"></a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"></a>
    </div>
		
		</div><!--endcenter-->
    </div>
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
    </script>
</body>
</html>