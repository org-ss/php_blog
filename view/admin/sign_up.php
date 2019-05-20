<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>

    

</head>

<body data-type="login">
    <script src="assets/js/theme.js"></script>
    <div class="am-g tpl-g">
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <div class="tpl-login">
            <div class="tpl-login-content">
                <div class="tpl-login-title">注册用户</div>
                <span class="tpl-login-content-info">
                  创建一个新的用户
              </span>


                <form class="am-form tpl-form-line-form" action="index.php?r=adminLogin/do_sign_up" method="POST" name="myform" onsubmit="return check();">
                    <div class="am-form-group">
                        <input type="email" class="tpl-form-input" id="email" name="u_email" placeholder="邮箱">

                    </div>

                    <div class="am-form-group">
                        <input type="text" class="tpl-form-input" id="username" name="u_name" placeholder="用户名">
                    </div>

                    <div class="am-form-group">
                        <input type="password" class="tpl-form-input" id="password" name="u_password" placeholder="请输入密码">
                    </div>

                    <div class="am-form-group">
                        <input type="password" class="tpl-form-input" id="repassword" name="u_again_password" placeholder="再次输入密码">
                    </div>

                    <!-- <div class="am-form-group tpl-login-remember-me">
                        <input id="remember-me" type="checkbox">
                        <label for="remember-me">
       
                        我已阅读并同意 <a href="javascript:;">《用户注册协议》</a> 
                         </label>

                    </div> -->

                    <div class="am-form-group">

                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="http://cdn.bootcss.com/amazeui/2.7.2/js/amazeui.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script type="text/javascript">
         function check(){

             if(myform.email.value==""){
                 alert("请输入邮箱");
                 myform.email.focus();
                 return false;
             }
             if(myform.username.value==""){
                 alert("请输入用户名");
                 myform.username.focus();
                 return false;
             }
             if (myform.password.value==""){
                 alert("请输入密码");
                 myform.password.focus();
                 return false;
             }
             if (myform.repassword.value==""){
                 alert("请再次输入密码");
                 myform.repassword.focus();
                 return false;
             }
             if (myform.password.value!=myform.repassword.value) {
                alert("两次输入密码不同，请重新输入！");
                myform.password.value="";
                myform.repassword.value="";
                myform.password.focus();
                return false;
             }
         }
    </script>

</body>

</html>