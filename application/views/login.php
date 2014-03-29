<!doctype html>
<base href="<?php echo base_url(); ?>" />
<html>
    <head>
        <meta charset="utf-8">
        <title>金和IU</title>
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
                    <h1><a href="http://www.appmfl.com">金和IU</a></h1>
                    <ul class="main-nav">
                        <li><a href="http://www.appmfl.com">首页</a></li>
                        <li><a href="http://app.iuoooo.com/AppAssembly">IU市场</a></li>
                        <li><a href="http://www.appmfl.com/?news.html">媒体中心</a></li>
                        <li><a href="http://www.appmfl.com/?down.html">帮助中心</a></li>
                        <li><a href="http://www.appmfl.com/?about.html">关于我们</a></li>
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

 <div class="footDiv black">
        <div class="wal">
            <ul>
                <li>
                    <h5><a href="http://app.iuoooo.com/AppAssembly" target="_blank">IU市场</a></h5>
                    <dl>
                        <dd><a href="http://app.iuoooo.com/AppAssembly/CategoryApps?Category=企业门户" target="_blank">企业门户</a></dd>
                        <dd><a href="http://app.iuoooo.com/AppAssembly/CategoryApps?Category=都市报" target="_blank">都市报</a></dd>
                        <dd><a href="http://app.iuoooo.com/AppAssembly/CategoryApps?Category=期刊" target="_blank">期刊</a></dd>
                        <dd><a href="http://app.iuoooo.com/AppAssembly/CategoryApps?Category=自媒体" target="_blank">自媒体</a></dd>
                        <dd><a href="http://app.iuoooo.com/AppAssembly/CategoryApps?Category=报纸" target="_blank">报纸</a></dd>
                    </dl>
                </li>
                <li>
                    <h5><a href="http://www.appmfl.com/?news.html" target="_blank">媒体中心</a></h5>
                    <dl>
                        <dd><a href="http://www.appmfl.com/?news/tp/207.html" target="_blank">媒体报道</a></dd>
                        <dd><a href="http://www.appmfl.com/?video/tp/208.html" target="_blank">产品视频</a></dd>
                        <dd><a href="http://www.appmfl.com/?partner/tp/209.html" target="_blank">合作伙伴</a></dd>
                        <dd><a href="http://www.appmfl.com/?case/tp/210.html" target="_blank">案例方案</a></dd>
                        <dd><a href="http://www.appmfl.com/?information/tp/211.html" target="_blank">资讯洞察</a></dd>
                    </dl>
                </li>
                <li>
                    <h5><a href="http://www.appmfl.com/?down.html" target="_blank">帮助中心</a></h5>
                    <dl>
                        <dd><a href="http://www.appmfl.com/?down/tp/212.html" target="_blank">相关下载</a></dd>
                        <dd><a href="http://www.appmfl.com/?faq/tp/213.html" target="_blank">FAQ</a></dd>
                        <dd><a href="http://www.appmfl.com/?popularize/tp/214.html" target="_blank">推广秘笈</a></dd>
                        <dd><a href="http://www.appmfl.com/?lyb/tp/215.html" target="_blank">产品反馈</a></dd>
                        
                    </dl>
                </li>
                <li>
                    <h5><a href="http://www.appmfl.com/?about.html" target="_blank">关于我们</a></h5>
                    <dl>
                        <dd><a href="http://www.appmfl.com/?contact/tp/217.html" target="_blank">联系我们</a></dd>
                        <dd><a href="http://www.appmfl.com/?contact/tp/217.html" target="_blank">新浪微博</a></dd>
                    </dl>
                </li>
            </ul>
    </div>            
</div>

        <!--底部 开始-->       
        <div class="footer" id="footer">
	            <p><a href="http://www.jinher.com" target="_blank">关于金和</a><a href="/Service/Contract" target="_blank">服务协议</a>
	            &copy;2014 Jinher 京ICP证09088703号-12</p>
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
