<?php
   include_once("includes/connectDB.php");
   include_once("includes/session.php");

    //根据用户名查询数据库
    function getUserById($con, $usercode){ 
        $query = "select * from user where user_code = ?";
        $statement = $con->prepare($query);
        $statement->bind_param('s', $usercode);

        $statement->execute();
        $statement->store_result();

        echo "进入方法了";

        if($statement->num_rows != 0){
            return FALSE;
        }else{
            return TRUE;
        }   
        $statement->close();
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <title>科研项目管理系统注册</title>
    <link href="css/alogin.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php
        
        $sen = isset($_POST['submit']);
        echo "有没有发过请求：".$sen;

        if(isset($_POST['submit'])){
            $usercode=$_POST['usercode'];
            $password=$_POST['password'];
            $repassword=$_POST['repassword'];
        
            $tip = "";

            if($usercode == NULL || $usercode == ""){
                $tip = "请输入学号或工号";
            }elseif(!getUserById($con, $usercode)){
                $tip = "该用户已经被注册过";   
            }elseif($password == NULL || $password == ""){
                $tip = "请输入密码";
            }elseif($password != $repassword){
                $tip = "两次密码不一致";
            }else{
                echo "sql语句前";
                $sql = "insert into user values(NULL, $usercode, NULL, '01', NULL, $password)";
                $res = $con->query($sql);
                if($res === false){
                    ee($con->error);
                }

                header("Location:login.php");
            }    
        }
        


        
        /*$u=strlen($usercode);
        $p=strlen($password);
        $rep=strlen($repassword);
        if($u==0){echo "请输入学号或工号";
        }elseif($p==0){echo "请输入密码";
        }elseif($rep==0){echo "请再次输入密码";
        }elseif($p!=$rep){echo "两次输入密码不相同，请重新输入！";
        }else{$sql="insert into user(user_code,user_pass) values()"
            
        }*/
    ?>
    
    <form id="form1" action="regist.php" method="post">
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
                    <li><span class="left">学号/工号：</span> <span style="left">
                        <input id="usercode" name="usercode" type="text" class="txt" />  
                     
                    </span></li>
                    <li><span class="left">密 码：</span> <span style="left">
                       <input id="password" name="password" type="password" class="txt" />  
                    </span></li>
                     <li><span class="left">重复密码：</span> <span style="left">
                       <input id="repassword" name="repassword" type="password" class="txt" />  
                    </span></li>
                      
                    
                    <li>
                    <span class="left">实验室：</span>
            <select  class="txt">
             <option value="网站建设与维护实验室">网站建设与维护实验室</option>
             <option value="其他">其他</option>
             </select>
                 
                    
                    </li>
                    
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C">
                
            <span class="btn">
               <button type="submit" name="submit" value="submit"  style="padding: 0 0;border: 0;"><img  alt="注册" src="images/login/registbtn.png" /></button>
                <!---->
    
           
            </span>
                <a href="login.php">已注册？去登录！</a>
            
                
                <p><?php
                    echo $tip;
                ?></p>
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
        include("includes/closeDB.php");
    ?>
</body>
</html>

