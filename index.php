<html>
<head>
    <title>Easy Popup</title>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        
        (function($){  
            $.fn.easyPopup = function(params) {  
                return this.each(function() {
                    var me = $(this);
                    
                    var options = loadData($(this));
                    var optionsSet = false;
                    
                    if (typeof params == "string") {
                        if (params == "show") {
                            me.fadeTo("fast", 1);
                            me.next().fadeTo("fast", 0.5);
                            me.next().next().fadeTo("fast", 1);
                        } else if (params == "hide") {
                            me.fadeTo("fast", 0);
                            me.next().fadeTo("fast", 0);
                            me.next().next().fadeTo("fast", 0);
                        }
                    } else if (typeof params == "object") {
                        setData($(this), params);
                        optionsSet = true;
                    }
                    
                    if (optionsSet) {
                        options = loadData($(this));
                    }
                    
                    if (!me.data("options").ismade) {
                        me.data("options").ismade = true;
                        
                        var html = me.html();
                        me.html("");
                        
                        me.addClass("easyPopup");
                        
                        var closebutton = (options.closeable) ? '<a href="#">X</a>' : '';
                        me.append('<div  class="epTitle"><div class="epTitleLeft">' + options.title + '</div><div class="epTitleRight">' + closebutton + '</div><br clear="both"></div>');
                        me.append('<div style="padding: 8px">' + html + '</div>');
                        
                        me.find(".epTitleRight a").click(function() {
                            me.easyPopup("hide");
                            return false;
                        });
                        
                        $("head").append('<style type="text/css">\
                        .easyPopup {\
                        background: ' + options.background + ';\
                        color: ' + options.color + ';\
                        border: 1px solid ' + options.borderColor + ';\
                        width: ' + options.width + ';\
                        height: ' + options.height + ';\
                        position: absolute;\
                        top: 50%;\
                        left: 50%;\
                        z-index: 10;\
                        display: none;\
                        }\
                        .epTitle {\
                        background: ' + options.titleBackground + ';\
                        color: ' + options.titleColor + ';\
                        padding: 5px;\
                        margin: 3px;\
                        }\
                        .epTitleLeft {\
                        width: auto;\
                        float: left;\
                        font-weight: bold;\
                        }\
                        .epTitleRight {\
                        text-align: right;\
                        width: auto;\
                        float: right;\
                        }\
                        .epTitleRight a {\
                        color: ' + options.titleColor + ';\
                        text-decoration: none;\
                        font-family: sans-serif;\
                        }\
                        .epTitleRight a:hover {\
                        font-weight: bold;\
                        }\
                        </style>');
                        
                        me.css({"margin-left": "-" + me.width()/2 + "px",
                        "margin-top": "-" + me.height()/2 + "px"});
                        
                        var shadowMarginLeft = -me.width()/2 + 5;
                        var shadowMarginTop = -me.height()/2 + 5;
                        
                        me.after('<div style="background: black; width: ' + me.width() + '; height: ' + me.height() + '; position: fixed; top: 50%; left: 50%; margin-left: ' + shadowMarginLeft + 'px; margin-top: ' + shadowMarginTop + 'px; z-index: 9; display: none;"></div>');
                        me.after('<div style="background: gray; width: 100%; height: 1500px; position: fixed; top: 0; left: 0; z-index: 8; display: none;"></div>');
                        
                    }
                    
                });  
            };
            
            function loadData(me) {
                
                var defaults = {
                    ismade: false,
                    height: "auto",
                    width: "300px",
                    title: "Title",
                    titleColor: "#003366",
                    titleBackground: "lightgray",
                    borderColor: "black",
                    background: "white",
                    color: "black",
                    closeable: true
                }
                    
                if (me.data("options") == undefined) {
                    me.data("options", defaults);
                }
                
                return me.data("options");
            }
            
            function setData(me, params) {
                me.data("options", $.extend(me.data("options"), params));
            }
        })(jQuery);

        $(document).ready(function() {
            $("#pop").easyPopup().easyPopup("show");
        });
    </script>
</head>
<body>
<div id="pop">
<form action="http://www.google.com" target="_blank">
Search: <input type="text" name="q"><br><input type="submit" value="Search">
</form>
</div>
</body>
</html>