<!doctype html>
<base href="<?php echo base_url(); ?>" />
<html>
<head>
    <meta charset="utf-8">
    <title>金和IU APP自助工厂</title>
    <link href="css/style.css" rel="stylesheet">

	
<link href="css/jquery.ui.all.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery-1.6.2.min.js"></script>
    <script src="js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="js/wInput.js"></script>
</head>
<body>
    <!--头部 开始-->
    <div class="header">
        <div class="top-line">
        </div>
        <div class="wrapper">
            <div class="top">
                <a href="index.php/login">登录</a>&nbsp;|&nbsp;<a href="index.php/login/signup">注册</a></div>
            <div class="nav clearfix">
                <h1>
                    <a href="#nogo">金和IU APP自助工厂</a></h1>
                <ul class="main-nav">
                    <li><a href="http://www.appmfl.com/" class="current">首页</a></li>
                    <li><a href="http://app.iuoooo.com/AppAssembly/Index">IU市场</a></li>
                    <li><a href="#nogo">媒体中心</a></li>
                    <li><a href="#nogo">帮助中心</a></li>
                    <li><a href="#nogo">关于我们</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper">
        



<!--中部内容区 开始-->
<div class="wrapper content">
	<div class="formList post">
        <div class="tips-error w230" style="width:255px;">两次输入的密码不一致</div>
    	<div class="item">
    		<?php
    		echo form_open('login/create_member');
        	?>
        	<span class="label">帐号：</span>
        	<?php
        	echo form_input('first_name',set_value('first_name','First_name'),'class="inp-txt"');
            ?>
            <span style="color:red;">*</span>
        </div>
    	<div class="item">
        	<span class="label">密码：</span>
            <?php
        	echo form_input('password',set_value('password','Password'),'class="inp-txt"');
            ?>
            <span style="color:red;">*</span>
        </div>
        <div class="item">
        	<span class="label">确认密码：</span>
            <?php
        	echo form_input('password2',set_value('password2','Password Confirmtion'),'class="inp-txt"');
            ?>
            <span style="color:red;">*</span>
        </div>
        <div class="item">
        	<span class="label">验证码：</span>
            <input type="text" style="width:90px" class="inp-txt w60 fl mr10" id="authCode" name="authCode" value="" placeholder="请输入验证码" onkeyup="checkAuthCode()"/>
            <span style="color:red;float:left;">*</span>
            
            <input class="btn120" style="border:none;display:none;" id="btnGetAuthCode" value="获取短信验证码" type="button" />
            <span id="validCodeContainer" style="visibility:hidden;display:none;">
                        <img id="validCodeImg" style="cursor: pointer;width:80px; height:30px; float:left; margin-right:10px; " src="" alt="验证码" title="看不清,换一张"/> 
                        <a style="display:block; width:14px; height:15px; background:url(/Content/default/images/refresh.png) no-repeat; float:left; text-indent:-9999px; 
margin-top:7px;" id="refreshCode" href="#" title="看不清,换一张">刷新</a>
                        </span>
        </div>
        <div class="item" id="GetAuthCodeTip" style="display:none;">
            <span class="label"></span>
            <span style="color:red;">如果没有收到短信验证码,可能是手机运营商服务不稳定造成的，请使用邮箱登录！</span>
        </div>
        <div class="item item-txt">
        	<input type="checkbox" id="chkAgree" name="chkAgree" checked/>
            <span>我同意并遵守<a href="http://portal.iuoooo.com/Service/Contract" target="_blank">《金和IU APP自助工厂平台服务协议》</a></span>
        </div>
        <div class="item">
        	<a href="###" style="cursor:default;background:#687685" class="btn-big" id="btnRegister" onclick="return false">立即注册</a>
        </div>
        <div class="post-zj">
            <span >已有帐号，<a href="http://portal.iuoooo.com">直接登录</a></span>
            <a id="createApp" class="post-yy" href="http://bac.iuoooo.com/IndustryTemplate/index">直接创建App</a>
        </div>
    </div>
	
</div>


<!--中部内容区 结束 -->





		<script type="text/javascript">
		document.domain = "iuoooo.com";
	</script>
    </div>
    <div class="footer">
        <p>
            <a href="#nogo">关于金和</a><a href="#nogo">服务协议</a>
        
            2011京ICP证09088703/京公网安备11010802010531</p>
    </div>
    
<script src="/scripts/userInfo.js"></script>
<script src="/scripts/jquery.ui.base.js"></script>
<script src="/scripts/TableBox/jquery.ui.jhtablebox.js"></script>
<script type="text/javascript">
    var isValLoginCode, isValPwd, isValCfmPwd, isValAuthCode, isEmailReg = false;
    var isValAgree = true;
    var CodeCont = 0;
    var timeout = 60;
    var countDown = function () {
        --timeout;
        if (timeout > 0) {
            $("#btnGetAuthCode").attr("value", timeout + "秒后重新获取").attr("disabled", true);
            setTimeout("countDown();", 1000);
        } else {
            $("#btnGetAuthCode").attr("value", "获取短信验证码").attr("disabled", false);
            disabled = false; timeout = 60;
        }
    }

    var calCanReg = function () {
        if (isValLoginCode && isValPwd && isValCfmPwd && isValAuthCode && isValAgree) {
            $('#btnRegister').removeAttr("style");
        }
        else {

            $('#btnRegister').attr('style', "cursor:default;background:#687685");
        }
        if (isValLoginCode) {
            $("#btnGetAuthCode").attr("disabled", false);
        }
        else {
            $("#btnGetAuthCode").attr("disabled", true);
        }
    }

    function showError(err) {
        $(".tips-error").html(err);
        $(".tips-error").show();
    }
    function hideError() {
        $(".tips-error").hide();
    }

    function checkMail(value) {

        var ckmailBt = mail_preg_all(value);
        if (ckmailBt != 1 && ckmailBt != 2) {
            showError(ckmailBt);
            return false;
        }
        if (ckmailBt == 2 && !mail_preg(value)) {
            showError("请输入正确的邮箱地址");
            return false;
        }

        hideError();
        return true;
    }

    function checkAccount(value) {
        var num_preg = /^[0-9]{1,}$/;
        if (num_preg.test(value)) {
            if (!checkMobile(value)) {
                showError("您输入的手机号有误");
                calCanReg();
                return false;
            }
            else {
                $("#btnGetAuthCode").show();
                $("#validCodeContainer").hide();
                $("#validCodeContainer").css("visibility", "hidden");
                isEmailReg = false;
            }
        }
        else {
            if (!checkMail(value)) {
                return false;
            }
            else {
                isEmailReg = true;
                $("#btnGetAuthCode").hide();
            }
        }
        return true;
    }

    //验证手机号是否符合要求
    function checkLoginCode(sign) {
        isValLoginCode = false;
        var value = $.trim($("#" + sign).val());
        //$("#" + sign).removeClass('input-error');
        if (value == "" || value == "请输入手机号或邮箱") {
            showError("手机号或邮箱不能为空！");
            calCanReg();
            return false;
        }
        CodeCont = 0;
        if (!checkAccount(value)) {
            return false;
        }

        data = "LoginCode=" + $("#LoginCode").val();
        $.ajax({
            async: true,
            type: "POST",
            url: '/Register/CheckLoginCode',
            data: data,
            dataType: "json",
            success: function (res) {
                //debugger;
                if (!res.IsSuccess) {
                    showError("该帐号已经注册过，可以直接登录");
                    calCanReg();
                    return false;
                }
                else {
                    isValLoginCode = true;
                    hideError();
                    calCanReg();
                    return true;
                }
            },
            error: function (err) {
                showError(err.responseText);
                calCanReg();
                return false;
            }
        });
    }

    function checkMobile(value) {
        var mob_preg = /^1[3|4|5|8][0-9]{9}$/;

        if (!mob_preg.test(value)) {
            return false;
        }
        else {
            return true;
        }
    }

    function checkPwd() {
        isValPwd = false;
        var val = $("#LoginPassword").val();
        var pwd_p1 = /\s/;
        //var pwd_p2 = /^(.)\1+$/;
        //var pwd_p3 = /^[a-zA-Z]+$/;
        //var pwd_p4 = /^[0-9]+$/;
        var pwd_p5 = /^[a-zA-Z0-9]{6,16}$/;
        if (val == "") {
            showError("请输入密码");
            calCanReg();
            return false;
        } else if (pwd_p1.test(val) || val.length < 6 || val.length > 20 || !pwd_p5.test(val)) {
            showError("密码为6-16位英文字母或数字，区分大小写");
            calCanReg();
            return false;
        }

        isValPwd = true;
        hideError();
        calCanReg();
        return true;
    }
    function checkCfmPwd() {
        isValCfmPwd = false;
        var val = $("#ConfirmPassword").val();
        var loginPwd = $("#LoginPassword").val();
        if (val == "") {
            showError("请输入确认密码");
            calCanReg();
            return false;
        }
        else if (val != loginPwd) {
            showError("两次密码不一致,请检查");
            calCanReg();
            return false;
        }
        isValCfmPwd = true;
        hideError();
        calCanReg();
        return true;
    }

    function checkAuthCode() {
        isValAuthCode = false;
        var authCode = $("#authCode").val();
        if (authCode == "") {
            showError("请输入验证码！");

            calCanReg();
            return false;
        }
        isValAuthCode = true;
        hideError();
        calCanReg();
        return true;
    }

    //获取校验码
    function GetValidCode() {
        $("#validCodeImg").attr("src", "/Register/GetValidateCode?" + Math.random());
    }

    function initialCreateAppLink() {
        var is_iPd = navigator.userAgent.match(/(iPad|iPod|iPhone)/i) != null;
        var is_mobi = navigator.userAgent.toLowerCase().match(/(ipod|iphone|android|coolpad|mmp|smartphone|midp|wap|xoom|symbian|j2me|blackberry|win ce)/i) != null;
        if (is_mobi && window.location.search.indexOf("mv=fp") < 0) {
            $("#createApp").attr("href", "http://bac.iuoooo.com"+"/phone/app-business.html");
        }
        else {
            $("#createApp").attr("href", "http://bac.iuoooo.com" + "/IndustryTemplate/Index");
        }
    }

    initialCreateAppLink();

    $(document).ready(function () {
        $("#btnGetAuthCode").attr("disabled", true);
        $("#chkAgree").change(function () {
            isValAgree = false;

            if ($('#chkAgree').prop("checked")) {
                isValAgree = true;
                calCanReg();
                hideError();
                return true;
            }
            calCanReg();
            showError("请勾选注册协议");
            return false;
        });

        //点击校验码，重新获取校验码
        $("#validCodeImg").click(function () {
            GetValidCode();
        });

        //校验码输入框获取焦点时，显示校验码
        $("#authCode").focus(function () {
            if (isEmailReg) {
                if ($("#validCodeContainer").css("visibility") == "hidden") {
                    $("#validCodeContainer").show();
                    $("#validCodeContainer").css("visibility", "visible");
                    GetValidCode();
                }
            }
        });

        $("#validCode").keydown(function (event) {
            if (event.keyCode == 13) {
                $("#btnSubmit").trigger("click");
            }
        });

        //刷新重新获取校验码
        $("#refreshCode").click(function () {
            GetValidCode();
        });

        $("#btnRegister").bind("click", function () {
            var loginCode, loginPwd, confirmPwd, data, authCode;
            loginCode = $.trim($("#LoginCode").val());
            loginPwd = $("#LoginPassword").val();
            confirmPwd = $("#ConfirmPassword").val();
            authCode = $("#authCode").val();

            if (loginCode == "") {
                showError("手机号或邮箱不能为空！");
                $("#LoginCode").focus();
                return false;
            }
            if (!checkAccount(loginCode)) {
                return false;
            }

            if (!checkPwd()) {
                $("#LoginPassword").focus();
                return;
            }
            if (!checkCfmPwd()) {
                $('#ConfirmPassword').focus();
                return false;
            }
            if (!checkAuthCode()) {
                $("#authCode").focus();
                return false;
            }
            if (!$('#chkAgree').prop("checked")) {
                showError("请勾选注册协议");
                $('#chkAgree').focus();
                return false;
            }


            data = "LoginCode=" + loginCode + "&LoginPassword=" + loginPwd + "&ConfirmPassword=" + confirmPwd + "&AuthCode=" + authCode;

            $.ajax({
                async: true,
                type: "POST",
                data: data,
                url: '/Register',
                success: function (res) {
                    //debugger;
                    if (!res.IsSuccess) {
                        showError(res.Message);

                        $("#authCode").focus();
                        GetValidCode();
                        $('#valCode').val("");
                    }
                    else {
                        if (res.ContextDTO != null) {
                            //hideError();
                            window.location = "http://portal.iuoooo.com" + "/Home/Index?userId=" + res.ContextDTO.LoginUserID + "&sessionId=" + res.ContextDTO.SessionID +
"&changeOrg=" + res.ContextDTO.LoginUserID;
                        }
                        else {
                            //showError(res.Message);

                            $("<div></div>").jhtablebox({ type: 'Alert', title: '消息提示', content: "请到您的邮箱进行注册验证，30分钟内有效！", resizable: false, confirm: function () {
                                window.location =
"http://portal.iuoooo.com";
                            }
                            });
                        }
                    }
                },
                error: function (err) {
                    showError(err.responseText);
                }
            });
        });



        $("#btnGetAuthCode").bind("click", function () {
            var loginCode, loginPwd, confirmPwd, data, authCode;
            loginCode = $.trim($("#LoginCode").val());
            if (loginCode == "") {
                showError("手机号不能为空！");
                return false;
            }
            if (!checkMobile(loginCode)) {
                showError("您输入的手机号有误");
                return false;
            }

            //            CodeCont += 1;
            //            if (CodeCont == 1) {
            //                showError("如果收不到验证码，可以试试输入邮箱注册！");
            //                return false;
            //            }

            $("#GetAuthCodeTip").show();

            data = "LoginCode=" + loginCode;

            $.ajax({
                async: true,
                type: "POST",
                data: data,
                url: '/Register/GetAuthCode',
                success: function (res) {
                    //debugger;
                    if (!res.IsSuccess) {
                        if (res.Message != "") {
                            showError(res.Message);
                        }
                        else {
                            showError("获取验证码失败");
                        }
                    }
                    else {
                        countDown();
                        showError("验证码已经发到您的手机上");
                    }
                },
                error: function (err) {
                    showError(err.responseText);
                }
            });
        });

        $('input:text, input:password, textarea').wInput();



    });
</script>

       
</body>
</html>
