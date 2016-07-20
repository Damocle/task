function init() {
    (function () {
        var aLi = document.querySelectorAll(".list .topic li");
        var section = document.querySelectorAll(".main .section");
        
        for (var i = 0; i < aLi.length; i++) {
            aLi[i].index = i;
            aLi[i].onclick = function() {
                for (var i = 0; i < aLi.length; i++) {
                  aLi[i].className = '';
                  section[i].style.display = '';
                };
                
                this.className = "active";
                section[this.index].style.display ="block";
                
            }
            
            
        };
    })();

    (function() {
        var list_title   = GLOBAL.Dom.getElementsByClassName("list_title");
        var course_title = GLOBAL.Dom.getElementsByClassName("course_title");

        for (var i = 0; i < list_title.length; i++) {
            list_title[i].index = i;
            list_title[i].onclick = function() {
                var disp = GLOBAL.Dom.getStyle(course_title[this.index], "display"); 
                // console.log(this.index);
                var span = this.getElementsByTagName("h3")[0].getElementsByTagName("span")[0];
                if (disp == "none") {
                    course_title[this.index].style.display = 'block';
                    span.innerText = "—";
                } else {
                    course_title[this.index].style.display = 'none';
                    span.innerText = "+";
                }
            }
        }
    })();

    // comment 
    (function() {

        var oSub            = document.getElementById("submit"),
            checkSubmitFlg = false;

        oSub.onclick = function() {
            // 获取表单数据
            
            var arr      = [ "images/1.jpg", "images/2.jpg", 
                             "images/3.jpg", "images/4.jpg", 
                             "images/5.jpg"];
        
            var inputVal = document.getElementsByTagName("input"),
                data = null;
            for (var i = 0; i < inputVal.length; i++ ) {
                if (i == 0) {
                    data  = inputVal[i].name + "=" + inputVal[i].value + "&";
                } else if (inputVal[i].name != "") {
                    data += inputVal[i].name + "=" + inputVal[i].value + "&";
                }
            }


            var oFace    = arr[Math.floor(Math.random() * 5) + 1];
            var content  = document.getElementById("content_text").value;
            
            data += "face=" + oFace; 
            data += "&content=" + content;

            if (checkSubmitFlg == true) {
                alert("请不要重复提交！");
            } else {
                GLOBAL.Ajax.post("admin/course.handle.php?act=active", data, function(e) {
                    // console.log(e);
                    // 创建元素
                    var data     = JSON.parse(e),
                        oComment = GLOBAL.Dom.getElementsByClassName("comment")[0],
                        face     = document.createElement("div"),
                        username = document.createElement("div"),
                        date     = document.createElement("div"),
                        oImg     = document.createElement("img"),
                        oA1      = document.createElement("a"),
                        oP       = document.createElement("p"),
                        oA2      = document.createElement("a");

                    // 添加属性
                    face.className     = "face";
                    username.className = "username";
                    date.className     = "date";
                    date.title = "发布时间:" + unix_to_datetime(data["pubTime"]);

                    oA1.href       = data["url"];
                    oA1.target     = "_blank";
                    oA2.href       = data["url"];
                    oA2.target     = "_blank";
                    oImg.src       = data["face"];
                    oA2.innerText  = data["username"];
                    date.innerText = unix_to_datetime(data["pubTime"]);
                    oP.innerText   = data["content"];

                    oA1.appendChild(oImg);
                    face.appendChild(oA1);
                    username.appendChild(oA2);
                    oComment.appendChild(face);
                    oComment.appendChild(username);
                    oComment.appendChild(date);
                    oComment.appendChild(oP);
    
                 });
            }
            
            checkSubmitFlg = true;
        };

    })();
};


addLoadEvent(init);
