<?php
    require_once("./includes/session.php");
    require_once("./includes/connectDB.php");

    echo "ok";

    if(isset($_POST['username'])){
        $usercode = $_POST['usercode'];
        $password = $_POST['password'];

        $query = "select user_id, username from user where usercode= ? and password = ? limit 1";

        $statement = $con->prepare($query);
        $statement->bind_param('ss', $username, $password);

        $statement->execute();
        $statement->store_result();

        if($statement->num_rows == 1){
            $statement->bind_result($_SESSION['userid'], $_SESSION['username']);
            $statement->fetch();
            header("Location:index.php");
        }else{
            echo "�û��������벻��ȷ";
        }
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>���ݵ��ӿƼ���ѧ�о���������Ŀ����ϵͳ��¼</title>
    <link href="css/alogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form" action="login.php">
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
                    <li><span class="left">�û�����</span> 
                        <span class="left">
                            <input id="usercode" name="usercode" type="text" class="txt" />
                        </span>
                    </li>
                    <li><span class="left">�� �룺</span> 
                        <span class="left">
                            <input id="password" name="password" type="text" class="txt" />  
                        </span>
                    </li>
                    <!--
                    <li>
                        <span class="left">��ס�ң�</span>
                        <input id="Checkbox1" type="checkbox" />
                    </li>
                    -->
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C">
                <span class="btn">
                    <input type="submit" value="" style="background-image:url(images/login/btnlogin.gif); width: 34%; height: 40%; background-repeat: no-repeat;"/>
                    <!--<img alt="" src="images/login/btnlogin.gif" />-->
                </span>
                
            </li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">
            copyright@2014 ���ݵ��ӿƼ���ѧ
            </li>
        </ul>
    </div>
    </form>
    <?php
       include ("./includes/closeDB");
    ?>
</body>
</html>
