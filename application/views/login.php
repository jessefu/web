<!doctype html>
<base href="<?php echo base_url(); ?>" />
<html>
    <head>
        <meta charset="utf-8">
        <title>大鱼---大有可为</title>
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link href="css/foreground.css" rel="stylesheet">
        <script src="/scripts/jquery.js"></script>
        <script src="/scripts/common.js"></script>
        
    <script src="/scripts/login.js"></script>
    <script src="/scripts/wInput.js"></script>

    </head>
    <script>
        var rootPath = "/";
        document.domain = "iuoooo.com";     
    </script>
    <body>
        <!--头部 开始-->
        <div class="header">
	        <div class="top-line"></div>
	        <div class="wrapper">
		        <div class="top"><a href="index.php/login">登录</a>&nbsp;|&nbsp;
                <a href="index.php/login/signup">注册</a></div>
                <div class="nav clearfix">
                    <h1><a href="#nogo">大鱼</a></h1>
                    <ul class="main-nav">
                        <li><a href="">首页</a></li>
                        <li><a href="">IU市场</a></li>
                        <li><a href="">媒体中心</a></li>
                        <li><a href="">帮助中心</a></li>
                        <li><a href="">关于我们</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--头部 结束-->

        
<!--中部内容区 开始-->
<div class="login-wrap">
	<div class="wrapper">
    	<div class="login-txt">
        	<h2>创造只属于自己的专属APP</h2>
            <p>更多功能,更多乐趣等你体验</p>
            <a id="createApp" href="#nogo">立即创建</a>
        </div>
    	<div class="login">
        	<h2 class="form-title">欢迎您 , 请登录</h2>
        	<div id="login_form">
            	
            	<div class="form-item">
            		<?php
							echo form_open('login/validate_credentials');
						?>
							</div>
							<div class="form-item">
								<label class="label" >帐号:</label>
								<?php
							echo form_input('username','Username','class="inp-txt pass"');
							?>
							</div>
							<div class="form-item">
								<label class="label" >密码:</label>
							<?php
							echo form_password('password','Password','class="inp-txt pass"');
							?>
							</div>
							<div class="form-item">
									<?php
							echo form_submit('submit','Login');
							?>
							</div>
							<div class="form-item">
									<?php
							echo anchor('login/signup','Create Account');
							
							?>
							</div>
					</div>
				<div class="form-item form-txt">
                	<span class="fl"><input type="checkbox" id="chkPwd" name="chkPwd" />记住密码</span>
                    <a href="http://cbc.iuoooo.com/RetrievePwd/Index" class="fr" target="_blank">忘记密码？</a>
                </div>
                <div class="form-item">
                    <a href="#nogo" class="btn-big" id="btnSubmit">登&nbsp;录</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--中部内容区 结束 -->


        <!--底部 开始-->       
        <div class="footer" id="footer">
	            <p><a href="" target="_blank">关于大鱼</a><a href="/Service/Contract" target="_blank">服务协议</a>
	            &copy;2014 大鱼 京ICP证090887031111号-12</p>
        </div>
        <!--footer 开始-->

        <!--footer 结束-->
        <div style="display:none;">
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff420eb48c2d0a8c4d20f795bcbe388cf' type='text/javascript'%3E%3C/script%3E"));
</script>
        </div>
    </body>
    
</html>
