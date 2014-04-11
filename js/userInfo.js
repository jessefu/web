    

    var mail_preg = function (mail) {
        if (mail.length > 50) {
            return false;
        }
        var ma_preg = /^[a-zA-Z1-9_\.-][a-zA-Z0-9_.-]{3,}@([a-zA-Z0-9_-]+\.){1,5}[A-Za-z]{2,4}$/;
        var string = $.trim(mail);
        if (ma_preg.test(string)) {
            return true;
        }
        return false;
    }

    var mail_preg_all = function (mail) {
        var preg_str = /^[a-z]$/;
        var preg_int = /^[1-9]$/;
        var preg_yah = /^[a-zA-Z][A-Za-z0-9_\.]{3,31}@yahoo.com$/;
        var preg_163 = /^[a-zA-Z][A-Za-z0-9_\.]{4,17}@163.com$/;
        var preg_126 = /^[a-zA-Z][A-Za-z0-9_\.]{5,17}@126.com$/;
        var preg_yea = /^[a-zA-Z][A-Za-z0-9_\.]{5,17}@yeah.net$/;
        var preg_n163 = /^1[3|4|5|8][0-9]{9}@163.com$/;
        var preg_n126 = /^1[3|4|5|8][0-9]{9}@126.com$/;
        var preg_nyea = /^1[3|4|5|8][0-9]{9}@yeah.net$/;
        var preg_qq = /^[a-zA-Z0-9_\.-]{3,18}@([a-zA-Z]+\.){1,5}[A-Za-z]{2,3}$/;
        var errDef = "请您输入正确的常用邮箱地址";
        var mailArr = mail.split('@');
        if (mailArr.length == 2) {
            mail = mailArr[0] + "@" + mailArr[1].toLowerCase();
        }        
        var lowermail = mail.toLowerCase();
        //        if (lowermail.indexOf("@yahoo.cn") >= 0 || lowermail.indexOf("@yahoo.com.cn") >= 0) {
        //            return "请您换用其它常用邮箱进行注册";
        //            //return "不允许雅虎中国邮箱进行注册";
        //        }
        if (lowermail.indexOf("@yahoo.com") >= 0) {
            if (preg_yah.test(mail)) {
                return 1;
            }
            return errDef;
            //return "4-32个字符，以字母开头可使用字母、数字、下划线和点“.“组成";
        }
        if (lowermail.indexOf("163.") >= 0 || lowermail.indexOf("126.") >= 0 || lowermail.indexOf("yeah.net") >= 0) {
            var firststring = lowermail.substr(0, 1);
            if (preg_str.test(firststring)) {
                if (preg_163.test(mail) || preg_126.test(mail) || preg_yea.test(mail)) {
                    return 1;
                }
                return errDef;
                //return "6~18个字符，可使用字母、数字、下划线，需以字母开头";
            }
            if (firststring == 1) {
                if (preg_n163.test(mail) || preg_n126.test(mail) || preg_nyea.test(mail)) {
                    return 1;
                }
                return errDef;
                //return "以数字“1”作为首数字，并且为11位纯数字开头";
            }
            return errDef;
            //return "以数字“1”作为首数字，并且为11位纯数字开头";
        }
        if (lowermail.indexOf("qq.") >= 0) {
            //3~18个字母、数字、下划线、点、减号
            if (preg_qq.test(mail)) {
                return 1;
            }
            return errDef;
            //return "3~18个字母、数字、下划线、点、减号";
        }
        if (lowermail.indexOf("gmail.") >= 0) {
            //6~30个英文、数字、英文句点，不能使用下划线
            var preg_gmail = /^[a-zA-Z0-9\.]{6,30}@([a-zA-Z]+\.){1,5}[A-Za-z]{2,3}$/;
            if (preg_gmail.test(mail)) {
                return 1;
            }
            return errDef;
            //return "6~30个英文、数字、英文句点，不能使用下划线";
        }
        if (lowermail.indexOf("139.") >= 0) {
            var preg_139 = /^1[3|4|5|8][0-9]{9}@139.com$/;
            if (preg_139.test(mail)) {
                return 1;
            }
            return errDef;
            //return "11位纯数字，只能以数字“1”开头";
        }
        if (lowermail.indexOf("sina.") >= 0) {
            var preg_sina = /^[a-z0-9_][a-zA-Z0-9-_\.]{3,15}@([a-zA-Z]+\.){1,5}[A-Za-z]{2,3}$/;
            if (preg_sina.test(mail)) {
                return 1;
            }
            return errDef;
            //return "4~16个字符，小写英文字母、数字、下划线开头，不支持全部为数字和下划线";
        }

        if (lowermail.indexOf("sohu.") >= 0) {
            var preg_sohu1 = /^[a-z0-9][a-zA-Z0-9-_\.]{3,15}@([a-zA-Z]+\.){1,5}[A-Za-z]{2,3}$/;
            //var preg_sohu2 = /^[a-z0-9][a-zA-Z0-9-\.]{3,15}@([a-zA-Z]+\.){1,5}[A-Za-z]{2,3}$/;
            if (preg_sohu1.test(mail)) {
                return 1;
            }
            return errDef;
            //return "4~16个字符，支持小写英文字母、数字、点、减号或下划线，小写字母开头"; edit 2013-10-31
        }

        if (lowermail.indexOf("example.") >= 0 || lowermail.indexOf("hotmail.") >= 0) {
            //字母、数字、句点(.)、连字符(-)和下划线(_)开头
            var preg_hot = /^[a-zA-Z0-9_\.-][a-zA-Z0-9-_\.]{0,30}@([a-zA-Z]+\.){1,2}[A-Za-z]{2,3}$/;
            if (preg_hot.test(mail)) {
                return 1;
            }
            return errDef;
            //return "字母、数字、句点(.)、连字符(-)和下划线(_)开头";
        }
        return 2;
    }