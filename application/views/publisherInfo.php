<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>大鱼---大有可为</title>
    
    <!--<link href="/Content/css/style.css" rel="stylesheet">-->
    

<link type="text/css" href="/css/common.css" rel="stylesheet"/>
<link type="text/css" href="/css/jquery.ui.all.css" rel="stylesheet"/>
    <script src="/js/jquery-1.9.1.js"></script>
    <script src="/js/jquery.SuperSlide.2.1.1.js"></script>
    
    
</head>
<body>
    <div class="wrapper">
    <html>
    <head>
    <meta charset="utf-8">
    <title>发布者信息</title>
    
    <style type="text/css">
        .uploadify
        {
            display:inline-block;
	        width:120px;
	        height:28px;
	        line-height:28px;
	        text-align:center;
	        vertical-align:middle;
	        color:#5F7392;
	        box-shadow:1px 1px 2px #DBDBDB
        }
        .uploadify-button ,.uploadify-button-text
        {
            text-indent:0 !important;
        }
    </style>
    </head>

    <body>
        <input class="ipt_txt" id="hid_id" name="Id" type="hidden" value="5527973d-a3b0-4ac4-b00a-3abf86e7024a" />
        <input class="ipt_txt" id="hid_name" name="Name" type="hidden" value="abc" />
        <input class="ipt_txt" id="hid_url" name="LogoUrl" type="hidden" value="29e54e46-3e17-4ca4-8f03-db71fb8f9650/TempDirectory/f45ebc5e-e639-41db-9946-47466ddfd441_2014040311185155794604.png" />
        <input class="ipt_txt" id="hid_description" name="Description" type="hidden" value="aadfasdf" />
        <input class="ipt_txt" id="hid_companyphone" name="CompanyPhone" type="hidden" value="010-87654321" />
        
        <input class="ipt_txt" id="hid_homepage" name="HomePage" type="hidden" value="http://www.sohu.com" />
        <input class="ipt_txt" id="hid_address" name="Address" type="hidden" value="AAAA" />
        <div class="tabs-box">
	        <div class="tabs-top">
		        <a href="#nogo" class="current">发布者信息</a>
		        
	        </div>
        </div>
        <div class="wrapper padding10">
            <div class="titA">发布者信息</div>
            <div class="formList">
				<div class="item">
					<?php
						echo form_open_multipart('personalmanage/create_member');
					?>
				</div>
                <div class="item">
			        <span class="label">发布者：</span>
			        <?php
						echo form_input('name','','class="inp-txt w300 mr10 mt10"');
					?>
			        <span class="tips-txt">长度不超过30字符</span>
		        </div>
                <div class="item">
			        <span class="label">LOGO：</span>
			        <div class="up-logo">
						<div class="logo-pic"><img id="img" src="/image/default_logo.jpg" width="84" height="84"></div>
						<input type="file" name="userfile" id="file_upload" />
				        <p>请上传大小2M以内，JPG、PNG格式的公司LOGO</p>
			        </div>
		        </div>
                <div class="item">
			        <span class="label">发布者简介：</span>
			        <!--<textarea id="txt_Content" class="areaBig"></textarea>&nbsp;&nbsp;<span style=" color:Red;">*</span>-->
					 <?php
						echo form_textarea('description','','class="areaBig w320 mr10 mt10"');
					?>
					<span class="tips-txt">长度不超过1000字符</span>
		        </div>
                <div class="titA tit-btop mt10">联系方式</div>
                <div class="item">
			        <span class="label">联系电话：</span>
			        <!--<input id="ipt_area" type="text" onfocus="focusevl(this);" onblur="blurevl(this);" onpaste="return false" class="inp-txt defaultVal w40 mr10" maxlength="10" value="010" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                    <input id="ipt_tel" type="text" onfocus="focusevl(this);" onblur="blurevl(this);" onpaste="return false" class="inp-txt defaultVal w150 mr10" maxlength="20" value="88888888" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                    <input id="ipt_num" type="text" onpaste="return false" class="inp-txt w80" maxlength="10" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">&nbsp;&nbsp;<span style=" color:Red;">*</span>-->
					<?php
						echo form_input('companyPhone','','class="inp-txt w320 mr10 mt10"');
					?>
                    <span class="tips-txt">格式 010-123456789-1234 分机号可不填</span>
		        </div>
                <div class="item">
			        <span class="label">联系地址：</span>
			        <!--<input id="ipt_address" type="text" class="inp-txt w320 mr10" maxlength="300"><span style=" color:Red;">*</span>-->
					<?php
						echo form_input('address','','class="inp-txt w320 mr10 mt10"');
					?>
					<span class="tips-txt">长度不超过300字符</span>
		        </div>
                <div class="item">
			        <span class="label">网站地址：</span>
			        <!--<input id="ipt_homepage" onfocus="focusevl(this);" onblur="blurevl(this);" type="text" class="inp-txt defaultVal w320" maxlength="256" value="http://">&nbsp;&nbsp;<span style=" color:Red;">*</span>-->
					<?php
						echo form_input('homePage','','class="inp-txt w320 mr10 mt10"');
					?>
					<span class="tips-txt">您需要在“网站地址”中提供点击后要去的网页地址。请按以下格式填写:http://www.dayubiz.com</span>
		        </div>
				<div class="item">
					<?php
						echo form_submit('submit','保存');
					?>
		        </div>
				<!--
                <div class="btn-center">
					<a id="btn_Preview" href="#nogo" class="btn120 mr10 mt10">预览</a>
					<a id="btn_OK" href="#nogo" class="btn120 mt10">保存</a>
				</div>
				-->
            </div>
            
        </div>

        <div class="dialog" id="subpreviewWindow" style="width:275px; margin-left:-187px;display:none; top:50%; margin-top:-203px;">
	        <a href="#nogo" class="close" title="关闭" id="closeWin">关闭</a>
	        <div class="sender-prev">
    	        <div class="sender-prev-bd">
			        <div class="top">
            	        <table>
                	        <tr>
                    	        <td class="pic"><img  id="img_preview" width="67" height="67"></td>
                                <td class="txt"><span id="lab_name"></span></td>
                            </tr>
                        </table>
                    </div>
                    <h3>发布者简介</h3>
                    <p id="lab_description"></p>
			        <dl class="contact-info">
            	        <dt>联系我们</dt>
                        <dd>地址：<span id="lab_address"></span></dd>
                        <dd>联系电话：<span id="lab_companyphone"></span></dd>
                        <dd>网站地址：<span id="lab_homepage"></span></dd>
                    </dl>
                </div>
            </div>
        </div>
    </body>
</html>


    



<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.ui.base.js"></script>
<script type="text/javascript" src="/Scripts/i18n/jquery.ui-zh.js"></script>
<script type="text/javascript" src="/js/jquery.ui.jhtablebox.js"></script>
<script type="text/javascript" src="/js/jquery.grid.base.js"></script>
<script type="text/javascript" src="/js/jquery.ui.jhdropdownlist.js"></script>
<script type="text/javascript" src="/js/jquery.ui.jhtooltip.js"></script>
<script type="text/javascript" src="/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="/js/jquery.ui.jhpager.js"></script>
    <script type="text/javascript">
        document.domain = "iuoooo.com";     
    </script>
     
    </div>
      
</body>
<script src="/js/wInput.js"></script>

    <script type="text/javascript">
            $(function () {
                $("#file_upload").uploadify({
                'swf': '/uploadify/uploadify.swf',
                'auto': true,
                'multi': false,
                'width': 120,
                'height':28,
                'buttonText': '上传图标',
                'buttonImage': '/Content/images/btn120.png',
                'fileTypeDesc': 'Image',
                'fileTypeExts': '*.jpg;*.png',
                'preventCaching': true,
                'uploader': '/UploadImage.ashx',
                'onUploadSuccess': function (file, data, response) {
                    if(data != "false")
                    {
                        if(data != "size")
                        {
                            $("#hid_url").val(data);
                            $("#img").css("display","block"); 
                            var httpurl = "http://fileserver.iuoooo.com/Jinher.JAP.BaseApp.FileServer.UI/FileManage/GetFile?fileURL=" + data;
                            $("#img").attr("src", httpurl);
                        }
                        else
                        {
                            alert("请上传2M以内的图片！");
                        }
                    }
                    else
                    {
                        alert("上传失败！");
                    }
                },
                'onUploadError': function (file, errorCode, errorMes) {
                    alert("上传失败，请稍后再试");
                },
                'onFallback': function () {

                    alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试");
                }
            });

            reload();

            $("#btn_Preview").click(function () {
				echo '#####################################';
               subpreview();
				
               //$('#subpreviewWindow').css('display','block') ;
            });

            $('#closeWin').click(function(){
                $('#subpreviewWindow').css('display','none') ;
           }) 

            $("#btn_OK").click(function () {
                subok();
            });

//            $("#btn_upload").click(function () {
//                upload();
//            });

            
        });

        function focusevl(obj) {
            if ($(obj).attr("id") == "ipt_area" && $(obj).val() == "010") {
                var id = $("#hid_id").val();
                if(id == "00000000-0000-0000-0000-000000000000")
                {
                    $(obj).val("");
                    $(obj).css({ "color": "black " });
                    obj.focus();
                }
            }
            if ($(obj).attr("id") == "ipt_tel" && $(obj).val() == "88888888") {
                $(obj).val("");
                $(obj).css({ "color": "black " });
                obj.focus();
            }

            if ($(obj).attr("id") == "ipt_homepage" && $(obj).val() == "http://") {
                $(obj).val("");
                $(obj).css({ "color": "black " });
                obj.focus();
            }
        }
        function blurevl(obj) {
            if ($(obj).attr("id") == "ipt_area" && $(obj).val() == "") {
                $(obj).val("010");
                $(obj).css({ "color": "#cccccc" });
            }
            if ($(obj).attr("id") == "ipt_tel" && $(obj).val() == "") {
                $(obj).val("88888888");
                $(obj).css({ "color": "#cccccc" });
            }

            if ($(obj).attr("id") == "ipt_homepage" && $(obj).val() == "") {
                $(obj).val("http://");
                $(obj).css({ "color": "#cccccc" });
            }

        }

//        function change() {
//            var provinceId = $("#sel_province").jhdropdownlist("getValue");

//            $.ajax({
//                async: false,
//                type: "POST",
//                data: { "ProvinceId": provinceId },
//                url: '/Organization/GetCityByProvinceId',
//                dataType: "json",
//                success: function (res) {
//                    if (res.CityList != "[]") {
//                            $("#sel_city").jhdropdownlist("reload", res);
//                        }
//                        else {
//                            var jsondata = jQuery.parseJSON("[{\"Text\":\"无下级\",\"Value\":\"1\"}]");
//                            $("#sel_city").jhdropdownlist("reload", jsondata);
//                        }
//                },
//                error: function (err) {
//                    alert("下拉框加载失败1！");
//                }
//            });
//        }

        function subpreview() {
            
            var name = $.trim($("#ipt_customername").val());
            var descripton = $.trim($("#txt_Content").val());
            var tel = "";
            if($.trim($("#ipt_num").val()) == "")
            {
                tel = $.trim($("#ipt_area").val()) + "-" + $.trim($("#ipt_tel").val())
            }
            else
            {
                tel = $.trim($("#ipt_area").val()) + "-" + $.trim($("#ipt_tel").val()) + "-" + $.trim($("#ipt_num").val())
            }
            //var province = $("#sel_province").jhdropdownlist("getValue");
            //var city = $("#sel_city").jhdropdownlist("getValue");
            var address = $.trim($("#ipt_address").val());
            var url = $("#hid_url").val();

            var homepage = $.trim($("#ipt_homepage").val());
            
            if(name == "")
            {
                alert("请输入发布者名称！");
                return false;
            }

            if(name.length > 30)
            {
                alert("长度不超过30字符！");
                return false;
            }

            if(url == "")
            {
                alert("请上传LOGO！");
                return false;
            }
            
            if(descripton == "")
            {
                alert("请输入发布者简介！");
                return false;
            }

            if(descripton.length > 1000)
            {
                alert("发布者简介长度不超过1000字符！");
                return false;
            }

//            if(province == "" || city == "")
//            {
//                alert("公司地点不能为空！");
//                return false;
//            }

            if(homepage == "" || homepage == "http://")
            {
                alert("请输入网站地址！");
                return false;
            }

            var regExp = /(http):\/\/[^\/\.]+?\..+\w$/i;   
            if (!homepage.match(regExp)) {
                alert("提供的网站地址无法访问");
                return false;
            }
            
            var area = $.trim($("#ipt_area").val());
            var telnum = $.trim($("#ipt_tel").val());
            if(area == "" || telnum == "")
            {
                alert("请输入联系电话！");
                return false;
            }
            
            if(address == "")
            {
                alert("请输入联系地址！");
                return false;
            }

            if(address.length > 300)
            {
                alert("联系地址长度不超过300字符！");
                return false;
            }
            //var province = $('#sel_province').jhdropdownlist("getText");
            //var city = $('#sel_city').jhdropdownlist("getText");   
            
//            $("#subpreviewWindow").jhtablebox({
//                    title: "预览",
//                    width: 350,
//                    modal: true,
//                    resizable: false
//                }); 
            $("#subpreviewWindow").css("display","block")
            ; 
            $("#lab_name").html(name);
            $("#img_preview").css("display","block"); 
            var url = $("#hid_url").val();
            var httpurl = "http://fileserver.iuoooo.com/Jinher.JAP.BaseApp.FileServer.UI/FileManage/GetFile?fileURL=" + url;
            $("#img_preview").attr("src", httpurl);
            $("#lab_description").html(descripton);
            $("#lab_companyphone").html(tel);
            //$("#lab_companyaddress").html(province + "     " + city);
            $("#lab_address").html(address);
            $("#lab_homepage").html(homepage);
        }

        function reload()
        {

//            $("input[name='ipt_area']").keyup(function(){     
//            var tmptxt=$(this).val();     
//            $(this).val(tmptxt.replace(/\D|^/g,''));     
//            }).bind("paste",function(){     
//            var tmptxt=$(this).val();     
//            $(this).val(tmptxt.replace(/\D|^/g,''));     
//            }).css("ime-mode", "disabled"); 

//            $("input[name='ipt_tel']").keyup(function(){     
//            var tmptxt=$(this).val();     
//            $(this).val(tmptxt.replace(/\D|^/g,''));     
//            }).bind("paste",function(){     
//            var tmptxt=$(this).val();     
//            $(this).val(tmptxt.replace(/\D|^/g,''));     
//            }).css("ime-mode", "disabled"); 

//            $("input[name='ipt_num']").keyup(function(){     
//            var tmptxt=$(this).val();     
//            $(this).val(tmptxt.replace(/\D|^/g,''));     
//            }).bind("paste",function(){     
//            var tmptxt=$(this).val();     
//            $(this).val(tmptxt.replace(/\D|^/g,''));     
//            }).css("ime-mode", "disabled"); 

            var id = $("#hid_id").val();
            var name = $("#hid_name").val();
            var url = $("#hid_url").val();
            var description = $("#hid_description").val();
            var companyphone = $("#hid_companyphone").val();
            //var province = $("#hid_province").val();
            //var city = $("#hid_city").val();
            var address = $("#hid_address").val();

            var homepage = $("#hid_homepage").val();

            if(id != "00000000-0000-0000-0000-000000000000")
            {
                $("#ipt_area").css({ "color": "black " });
                $("#ipt_tel").css({ "color": "black " });
                $("#ipt_homepage").css({ "color": "black " });
            }

            if(homepage == "")
            {
                homepage = "http://"
            }

            var area = "";
            var tel = "";
            var num = "";
            var phone = companyphone.split("-");
            if(phone.length > 0 && phone.length == "2")
            {
                //$("#ipt_address").val("2222");
                $("#ipt_area").val(phone[0]);
                $("#ipt_tel").val(phone[1]);
            }

            if(phone.length > 0 && phone.length == "3")
            {
                $("#ipt_area").val(phone[0]);
                $("#ipt_tel").val(phone[1]);
                $("#ipt_num").val(phone[2])
            }

            $("#ipt_customername").val(name);
            $("#txt_Content").val(description);
//            if(id != "00000000-0000-0000-0000-000000000000")
//            {
//                //$("#sel_province").jhdropdownlist("setSelectedValue",province);
//                //$("#sel_city").jhdropdownlist("setSelectedValue",city);
//            }
            $("#ipt_address").val(address);
            $("#ipt_homepage").val(homepage);
            if(url != "")
            {
                $("#img").css("display","block"); 
                var httpurl = "http://fileserver.iuoooo.com/Jinher.JAP.BaseApp.FileServer.UI/FileManage/GetFile?fileURL=" + url;
                $("#img").attr("src", httpurl);
            }
        }

        function subok() {
            var id = $("#hid_id").val();
            var name = $.trim($("#ipt_customername").val());
            var descripton = $.trim($("#txt_Content").val());
            var tel = "";
            if($.trim($("#ipt_num").val()) == "")
            {
                tel = $.trim($("#ipt_area").val()) + "-" + $.trim($("#ipt_tel").val())
            }
            else
            {
                tel = $.trim($("#ipt_area").val()) + "-" + $.trim($("#ipt_tel").val()) + "-" + $.trim($("#ipt_num").val())
            }
            //var province = $("#sel_province").jhdropdownlist("getValue");
            //var city = $("#sel_city").jhdropdownlist("getValue");
            var address = $.trim($("#ipt_address").val());
            var url = $("#hid_url").val();

            var homepage = $.trim($("#ipt_homepage").val());

            if(name == "")
            {
                alert("请输入发布者名称！");
                return false;
            }

            if(name.length > 30)
            {
                alert("长度不超过30字符！");
                return false;
            }

            if(url == "")
            {
                alert("请上传LOGO！");
                return false;
            }

            if(descripton == "")
            {
                alert("请输入发布者简介！");
                return false;
            }

            if(descripton.length > 1000)
            {
                alert("发布者简介长度不超过1000字符！");
                return false;
            }

//            if(province == "" || city == "")
//            {
//                alert("公司地点不能为空！");
//                return false;
//            }

            if(homepage == "" || homepage == "http://")
            {
                alert("请输入网站地址！");
                return false;
            }

            var regExp = /(http):\/\/[^\/\.]+?\..+\w$/i;   
            if (!homepage.match(regExp)) {
                alert("提供的网站地址无法访问");
                return false;
            }

            var area = $.trim($("#ipt_area").val());
            var telnum = $.trim($("#ipt_tel").val());
            if(area == "" || telnum == "")
            {
                alert("请输入联系电话！");
                return false;
            }

            if(address == "")
            {
                alert("请输入联系地址！");
                return false;
            }

            if(address.length > 300)
            {
                alert("联系地址长度不超过300字符！");
                return false;
            }

            //var data = { "Id": id, "Name": name, "LogoUrl": url, "Description": descripton, "CompanyPhone": tel, "ProvinceId": province, "CityId": city, "Address": address, "SubId": "" }; 
            var data = { "Id": id, "Name": name, "LogoUrl": url, "Description": descripton, "CompanyPhone": tel,"HomePage":homepage, "Address": address, "SubId": "" }; 
            
            $.ajax({
                async: true,
                type: "POST",
                url: "/Organization/btnOK",
                data: data,
                dataType: "text",
                success: function (res) {
                    getId();
                    alert(res.toString());
                    $("#ipt_customername").val(name);
                    $("#txt_Content").val(descripton);
                    $("#ipt_address").val(address);
                    $("#ipt_homepage").val(homepage);
                },
                error: function (err) {
                    $("<div></div>").jhtablebox({ type: "Alert", content: "服务调用失败!", resizable: "false", modal: true,title:"消息提示"});  
                }
            });
        }

        function getId()
        {
            var data = "fileaddress=" + $("#fl_upload").val();
            $.ajax({
                async: false,
                type: "POST",
                data: data,
                url: '/Organization/GetId',
                dataType: "text",
                success: function (res) {
                    if (res.toString() != "") {
                        $("#hid_id").val(res.toString())
                    }
                    else {
                    }
                },
                error: function (err) {
                }
            });
        }

//        function upload() {
//            var fileAddress = $("#fl_upload").val();
//            if (fileAddress == "") {
//                alert("请上传LOGO！");
//                return false;
//            }
//            var filetype = fileAddress.substring(fileAddress.lastIndexOf(".")).toLowerCase();
//            if (filetype != ".jpg" && filetype != ".png" && filetype != ".JPG" && filetype != ".PNG") {
//                alert("请上传JPG、PNG格式的公司LOGO！");
//                return false;
//            }

//            var data = "fileaddress=" + $("#fl_upload").val();
//            $.ajax({
//                async: false,
//                type: "POST",
//                data: data,
//                url: '/Organization/UploadImg',
//                dataType: "text",
//                success: function (res) {
//                    if (res.toString() != "false") {
//                        $("#hid_url").val(res.toString());
//                        $("#img").css("display","block"); 
//                        var httpurl = "http://fileserver.iuoooo.com/Jinher.JAP.BaseApp.FileServer.UI/FileManage/GetFile?fileURL=" + res.toString();
//                        $("#img").attr("src", httpurl);
//                    }
//                    else {
//                        alert("上传失败！");
//                    }
//                },
//                error: function (err) {
//                    alert("操作失败");
//                }
//            });
//        }
    </script>

    
<script type="text/javascript">
    //    $(document).ready(function () {
    //        var options = {
    //            //target: '#outputdiv',
    //            beforeSubmit: showRequest,
    //            success: showResponse
    //        };
    //        $('#filePost').submit(function () {
    //            $(this).ajaxSubmit(options);
    //            return false;
    //        });
    //    });
    //    function showRequest(formData, jqForm, options) {//fileupload
    //        var fileAddress = $("#fileupload").val();
    //        if (fileAddress == "") {
    //            alert("请上传LOGO！");
    //            return false;
    //        }
    //        var filetype = fileAddress.substring(fileAddress.lastIndexOf(".")).toLowerCase();
    //        if (filetype != ".jpg" && filetype != ".png" && filetype != ".JPG" && filetype != ".PNG") {
    //            alert("请上传JPG、PNG格式的公司LOGO！");
    //            return false;
    //        }
    //    }
    //    function showResponse(responseText, statusText) {
    //        $("#hid_url").val(responseText);
    //        $("#img").css("display", "block");
    //        var httpurl = "http://fileserver.iuoooo.com/Jinher.JAP.BaseApp.FileServer.UI/FileManage/GetFile?fileURL=" + responseText;
    //        $("#img").attr("src", httpurl);
    //    }
</script>
<script type="text/javascript" src='/uploadify/jquery.uploadify.min.js'></script>

</html>
