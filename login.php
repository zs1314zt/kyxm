<?php
    include_once("includes/session.php");
    include_once("includes/connectDB.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>杭州电子科技大学研究所科研项目管理系统登录</title>
    <link href="css/alogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php

    $errorMessage = NULL;

    if(isset($_POST['usercode'])){
        $usercode = $_POST['usercode'];
        $password = $_POST['password'];

        $query = "select user_id, user_name from user where user_code= ? and user_pass = ? limit 1";

        $statement = $con->prepare($query);
        $statement->bind_param('ss', $usercode, $password);

        $statement->execute();
        $statement->store_result();

        if($statement->num_rows == 1){
            $statement->bind_result($_SESSION['user_id'], $_SESSION['user_name']);
            $statement->fetch();
            header("Location: index.php");
        }else{
            $errorMessage = "用户名或密码错误";
        }
    }

    ?>
    <form id="form" action="login.php" method="post">
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB"><span>
                <img src="images/login/logo.gif" alt="loginlogo" style="" />
            </span></li>
            <li class="topC"></li>
            <li class="topD">
                <ul class="login">
                    <li><span class="left">用户名：</span> 
                        <span class="left">
                            <input id="usercode" name="usercode" type="text" class="txt" />
                        </span>
                    </li>
                    <li><span class="left">密 码：</span> 
                        <span class="left">
                            <input id="password" name="password" type="password" class="txt" />  
                        </span>
                    </li>
                    
                    <li>
                        <span>
                            <?php
                                echo $errorMessage;  
                            ?>
                        </span>
                        
                    </li>
                   
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C">
                <span class="btn">
                    <input type="submit" value="" style="background-image:url(images/login/loginbtn.png); width: 30%; height: 36%; background-repeat: no-repeat;"/>
                    <!--<img alt="" src="images/login/btnlogin.gif" />-->
                </span>
                <a href="regist.php">没账号？去注册！</a>
            </li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">
            copyright@2014 杭州电子科技大学
            </li>
        </ul>
    </div>
    </form>

    <?php
        include ("includes/closeDB");
    ?>
</body>
</html>
