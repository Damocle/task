<?php
    require_once('../connect.php');
    
    $id             = $_GET["id"];
    $sql            = "select * from course where id=".$id;
    
    $mysqli_result  = $mysqli -> query($sql);
    
    if ($mysqli_result && $mysqli_result -> num_rows > 0) {
        $row = $mysqli_result -> fetch_assoc();
    }

    // print_r($row);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>test</title>
<link rel="stylesheet" href="style/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/iconfont.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/main.css" type="text/css" media="screen" />
</head>
<body>
<div id="header">
    <div class="container">
        <div class="logo"><a href="admin.php">C程序设计</a></div>
        <ul class="user">
           <!--  <li class="user_name">
                <a href="">
                    <img src="images/head_pic.jpg" alt="head_pic" id="head_pic" />
                    <span>丁先生</span>
                </a>                
            </li> -->
            <li id="sign_out"><!--| --><a href="" class="sign_out">退出</a></li>
        </ul>
    </div>
</div>
<div id="content" class="container">
    <div class="list">
        <div class="topic">
            <h2 class="topic_title"><i class="icon iconfont">&#xe605;</i>课程管理</h2>
            <ul>
            	<li class="active">修改课程</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="section" style="display: block;">
            <div class="main_title">
                <h2>课程管理</h2>
            </div>
            <div class="main_content">
                <ul>
                    <li>当前位置 ：<span>修改课程</span></li>
                </ul>
                <form action="course.handle.php?act=updateCourse&id=<?php echo $row["id"]; ?>" method="post" class="form1">
                    <div>
                        <label for="chapter">章节:</label>
                        <select name="chapter" id="chapter2">
                            <option value="C语言介绍">C语言介绍</option>
                            <option value="基本数据类型">基本数据类型</option>
                            <option value="输入与输出">输入与输出</option>
                            <option value="运算符与表达式">运算符与表达式</option>
                            <option value="选择结构--条件判断">选择结构--条件判断</option>
                            <option value="循环结构">循环结构</option>
                            <option value="数组">数组</option>
                            <option value="函数">函数</option>
                            <option value="初始指针">初始指针</option>
                        </select>
                    </div>
                    <div>
                        <label for="courseName">课程名:</label>
                        <input type="text" name="courseName" value="<?php echo $row["coursename"];?>"  id="courseName" />
                    </div>
                    <div>
                        <label for="author">发布人:</label>
                        <input type="text" name="author" value="<?php echo $row["author"];?>" id="author" />
                    </div>
                    <div>
                        <label for="courseAddress">课程地址:</label>
                        <input type="text" name="courseAddress" value="<?php echo $row["courseaddress"];?>" id="courseAddress" />
                    </div>
                    <div>
                        <label for="submit"></label>
                        <input type="submit" value="更新课程" id="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="scripts/utils.js"></script>
<script src="scripts/script.js"></script>
<script type="text/javascript">
    var select  = document.getElementById("chapter2");
    var aOption = select.getElementsByTagName("option");
    var value   = "<?php echo $row['chapter']; ?>";

    for (var i = 0; i <= aOption.length; i++) {
        if (aOption[i].value == value) {
            aOption[i].setAttribute("selected", "selected");
            break;
        }
    }
</script>
</body>
</html>














