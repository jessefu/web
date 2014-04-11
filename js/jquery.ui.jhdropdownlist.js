/**
* @fileOverview 这个文件是标签控件的源文件. 
* @author 张弘 2011/9/3  
* @version 1.0.0 
*
* Depends:
*	jquery.ui.core.js 
*	jquery.ui.widget.js
*/
(function ($, undefined) {
    /** @class search控件类
    * @name jhdropdownlist
    * @description jhdropdownlist
    * @property {boolean} disabled 是否禁用控件   
    * @property {int} width  宽度
    * @property {int} number  列表显示多少项
    * @property {int} selected  初始时文本框内显示的值在数据源中的索引；若在数据源中也设置被选项，则优先根据数据源设定
    * @property {string} dataType  数据源类型，值为'json'或'url'   
    * @property {json} data  Json类型的数据源，Value表示值，Text表示文本，Selected表示是否选中。例如：data:[{Value:1,text:"a",selected:false}, {Value:2,text:"b",selected:true}]
    * @property {string} url  数据源url
    * @property {string} name  控件的name
    * @property {string} containerId  控件的父容器Id，指定该属性之后会根据控件在父容器的位置自适应将菜单往上或往下弹出
    */
    var requestIndex = 0;
    $.widget("ui.jhdropdownlist", {
        /** @lends jhdropdownlist.prototype */
        options: {
            width: 50,
            number: 8,
            disabled: false,
            selecteIndex: 0,
            dataType: 'json',
            data: null,
            url: null,
            name: "",
            containerId: "",
            /**  
            * @name jhdropdownlist#click  
            * @event  
            * @param {event} e  
            * @param {jhdropdownlist} jhdropdownlist jhdropdownlist 
            * @description 控件点击事件
            */
            click: null,
            /**  
            * @name jhdropdownlist#change  
            * @event  
            * @param {event} e  
            * @param {jhdropdownlist} jhdropdownlist jhdropdownlist 
            * @description 值改变事件
            */
            change: null,
            /**  
            * @name jhdropdownlist#select  
            * @event  
            * @param {event} e  
            * @param {jhdropdownlist} jhdropdownlist jhdropdownlist 
            * @description 菜单选项选择事件
            */
            select: null
        },
        ///初始化控件
        _create: function () {
            var self = this;
            var opt = self.options;
            var currentobject = self.element ? self.element : parent; //承载容器
            var id = self.element[0].id;
            var isOpened = false;
            var items = null;

            var template = $('<div id="ui-jhdropdownlist-' + id + '" class="ui-jhdropdownlist"><input name="' + opt.name + '" class="ui-jhdropdownlist-input" type="hidden" value=""  /><div class="ui-jhdropdownlist-text"></div><a href="javascript:void(0)" class="ui-jhdropdownlist-btn"></a></div>');
            $(currentobject).css("display", "none").after(template);
            this.element = template.css("cursor", "default");
            $(self.element[0]).css("width", opt.width);
            $(self.element.children("div")[0]).css("width", function () {
                return parseInt(opt.width) - 27 + "px";
            });

            this.element
            .bind("keydown.jhdropdownlist", function (event) {
                if (self.options.disabled) {
                    return;
                }

                suppressKeyPress = false;
                var keyCode = $.ui.keyCode;
                switch (event.keyCode) {
                    case keyCode.UP:
                        self._move("previous", event);
                        // prevent moving cursor to beginning of text field in some browsers
                        event.preventDefault();
                        break;
                    case keyCode.DOWN:
                        self._move("next", event);
                        // prevent moving cursor to end of text field in some browsers
                        event.preventDefault();
                        break;
                    case keyCode.ENTER:
                    case keyCode.NUMPAD_ENTER:
                        // when menu is open and has focus
                        if (self.menu.active) {
                            // #6055 - Opera still allows the keypress to occur
                            // which causes forms to submit
                            suppressKeyPress = true;
                            event.preventDefault();
                        }
                        else {
                            return;
                        }
                        self.menu.select(event);
                        break;
                    default:
                        break;
                }
            });

            this.menu = $("<ul></ul>")
			.addClass("ui-jhdropdownlist-menu")
            .appendTo("body")
			.menu({
			    selected: function (event, ui) {
			        var item = ui.item.data("item.jhdropdownlist");
			        var prevtext = self.element.children("div").text();
			        var prevvalue = self.element.children("input").val();
			        if (self.element[0] !== self.element[0].ownerDocument.activeElement) {
			            self.element.focus();
			        }

			        if (false !== self._trigger("select", event, { item: item })) {
			            self.element.children("div").text(item.Text);
			            self.element.children("input").val(item.Value);
			            self._close(event);
			        }

			        if (item.Text !== prevtext) {
			            var prev = { Text: prevtext, Value: prevvalue };
			            var data = { prev: prev, item: item };
			            self._trigger("change", event, data);
			        }
			    }
			})
            .zIndex(this.element.zIndex() + 5000)
			.css({ top: 0, left: 0 })
			.hide()
			.data("menu");
            if ($.fn.bgiframe) {
                this.menu.element.bgiframe();
            }

            this._inputbind();
            this._btnbind();
            this._initSource(); //获取数据源


            if (self.options.disabled) {
                self.element.addClass("ui-jhdropdownlist-disabled");
                self.element.children("a").addClass("ui-jhdropdownlist-btn-disabled");
                self.element.children("a").attr("disabled", "true");
                self.element.attr("disabled", "true");
            }
        },
        _initSource: function () {
            var self = this;
            if (self.options.dataType == "json") {
                var data = self.options.data
                if (typeof data == "string") {
                    self.items = eval("(" + data + ")");
                } else {
                    self.items = data;
                }
                self._initvalue(self, self.items, self.options.selecteIndex); //初始化值
                self._setMenu(self.items); //重置menu内容
            } else if (self.options.dataType == "url") {
                url = self.options.url ? self.options.url : "";
                $.ajax({
                    url: url,
                    dataType: "json",
                    success: function (data, status) {
                        self.items = data;
                        self._initvalue(self, self.items, self.options.selecteIndex); //初始化值
                        self._setMenu(self.items); //重置menu内容
                    },
                    error: function () {
                        self.items = [];
                    }
                });
            } else {
                self.items = [];
            }
        },
        _initvalue: function (obj, items, selecteIndex) {
            if (items.length == 0) {
                return;
            }
            var self = obj;
            var selno = selecteIndex;
            $.each(items, function (i, n) {
                if (n.Selected) {
                    selno = i;
                    return false;
                }
            });
            selno = selno <= items.length ? selno : 0;
            self.element.children("div").text(items[selno].Text);
            self.element.children("input").val(items[selno].Value);
        },
        _setMenu: function (data) {
            if (data.length == 0) {
                return;
            }
            var self = this.menu.element;
            self.empty();
            this._renderMenu(self, data);
            this.menu.deactivate();
            this.menu.refresh();
            this._resizeMenu();
            self.zIndex(this.element.zIndex() + 5000);
        },
        //按钮初始化
        _btnbind: function () {
            var self = this;
            self.element.find("a")
                .click(function (event) {
                    self._trigger("click", event);
                    if (self.isOpened) {
                        self._close(event);
                    }
                    else {
                        self._open(event);
                    }
                })
                .mouseover(function () {
                    $(this).addClass("ui-jhdropdownlist-btn-mouseover");
                })
                .mousedown(function () {
                    $(this).removeClass("ui-jhdropdownlist-btn-mouseover");
                    $(this).addClass("ui-jhdropdownlist-btn-mousedown");
                })
                .mouseup(function () {
                    $(this).removeClass("ui-jhdropdownlist-btn-mousedown");
                    $(this).addClass("ui-jhdropdownlist-btn-mouseover");
                })
                .mouseout(function () {
                    $(this).removeClass("ui-jhdropdownlist-btn-mouseover");
                })
        },
        //文本框初始化
        _inputbind: function () {
            var self = this;
            self.element.find("div")
                .click(function (event) {
                    self._trigger("click", event);
                    if (self.isOpened) {
                        self._close(event);
                    }
                    else {
                        self._open(event);
                    }
                })
        },
        //菜单定位
        _resizeMenu: function () {
            var ul = this.menu.element;
            var num = Math.min(this.options.number, ul.children('li').length);
            var container = this.options.containerId != "" ? $('#' + this.options.containerId) : this.element.parent();
            var eleoffset = this.element.offset();
            var t1 = eleoffset.top - 21 * num - 6;
            var t2 = eleoffset.top + this.element.height() + 1;
            var top = t1 - container.offset().top > container.offset().top + container.height() - t2 ? eleoffset.top - 21 * num - 6 : eleoffset.top + this.element.height() + 1;
            ul.outerWidth(this.element.outerWidth());
            ul.css({ left: eleoffset.left, top: top, height: 21 * num });
        },
        _renderMenu: function (ul, items) {
            var self = this;
            $.each(items, function (index, item) {
                self._renderItem(ul, item);
            });
        },
        _renderItem: function (ul, item) {
            return $("<li></li>")
            .data("item.jhdropdownlist", item)
			.append($("<a></a>").text(item.Text))
			.appendTo(ul)
            .css("cursor", "default");
        },
        //菜单选项移动
        _move: function (direction, event) {
            if (!this.menu.element.is(":visible")) {
                return;
            }
            if (this.menu.first() && /^previous/.test(direction) ||
				this.menu.last() && /^next/.test(direction)) {
                this.menu.deactivate();
                return;
            }
            this.menu[direction](event);
        },
        //菜单关闭
        _close: function (event) {
            if (this.menu.element.is(":visible")) {
                this.menu.element.hide();
                this.isOpened = false;
            }
        },
        //菜单打开
        _open: function (event) {
            var self = this;
            this._resizeMenu();
            this.menu.element.show();
            this.isOpened = true;
            var menuElement = self.menu.element[0];
            $(document).one('mousedown', function (event) {
                if (event.target != menuElement && !$.ui.contains(self.element[0], event.target) &&
					!$.ui.contains(menuElement, event.target)) {
                    self._close();
                }
            });
        },
        /**
        * @description 清空下拉列表数据
        */
        clear: function (event) {
            var self = this;
            self.menu.element.empty().hide();
            self.element.children("input").val("");
            self.element.children("div").text("");
        },
        /**
        * @description 根据传入的索引值参数改变文本内容，若索引值错误，文本为空
        */
        setSelectedIndex: function (index) {
            var self = this;
            if (this.items != null && this.items.length > 0) {
                if (index > -1 && index < this.items.length) {
                    self.element.children("div").text(this.items[index].Text);
                    self.element.children("input").val(this.items[index].Value);
                    self._trigger("select", event, { item: this.items[index] });
                }
                else {
                    self.element.children("div").text("");
                    self.element.children("input").val("");
                }
            }
        },
        /**
        * @description 根据传入的字符串改变文本内容，若字符串在选项中不存在，文本为空
        */
        setSelectedValue: function (value) {
            var self = this;
            if (this.items != null && this.items.length > 0) {
                for (var i = 0; i < this.items.length; i++) {
                    if (value == this.items[i].Value) {
                        self.element.children("div").text(this.items[i].Text);
                        self.element.children("input").val(this.items[i].Value);
                        self._trigger("select", event, { item: this.items[i] });
                        return;
                    }
                }
                self.element.children("div").text("");
                self.element.children("input").val("");
            }
        },
        /**
        * @description 绑定json格式的数据源并设置选中项
        */
        reload: function (data, selecteIndex) {
            if (data.length == 0) {
                this.clear();
            }
            var url = data;
            var self = this;
            if (typeof data === "string") {
                $.ajax({
                    url: url,
                    dataType: "json",
                    success: function (data, status) {
                        self.items = data;
                        self._initvalue(self, self.items, selecteIndex);
                        self._setMenu(self.items);
                    },
                    error: function () {
                        self.items = [];
                    }
                });
            }
            else if (typeof data === "object") {
                self.items = data;
                self._initvalue(self, self.items, selecteIndex);
                self._setMenu(self.items);
            }
            else {
                this.items = [];
            }
        },
        /**
        * @description 获取值
        */
        getValue: function () {
            return this.element.children("input").val();
        },
        /**
        * @description 获取文本
        */
        getText: function () {
            return this.element.children("div").text();
        },
        /**
        * @description 选项个数
        */
        length: function () {
            return this.items.length;
        }
    });

})(jQuery);

