<?php
    require_once('connect.php');
    
    $id             = $_GET["chapter"] - 1;
    $chapter        = array("C语言介绍", "基本数据类型", "输入与输出", "                       运算符与表达式", "选择结构--条件判断", "循环结构"                      , "数组", "函数", "初始指针");
    $sql            = "select * from exercise where chapter="."'$chapter[$id]'";
    // echo $sql;
    $mysqli_result  = $mysqli -> query($sql);
    
    if ($mysqli_result && $mysqli_result -> num_rows > 0) {
        while($row = $mysqli_result -> fetch_assoc()) {
            $data[]= $row;
        } 
    } else {
        $data = array();
    } 
    // print_r($data);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>课件</title>
<link rel="stylesheet" href="admin/style/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="admin/style/iconfont.css" type="text/css" media="screen" />
<link rel="stylesheet" href="admin/style/main.css" type="text/css" media="screen" />
</head>
<body>
<div id="header">
    <div class="container">
        <div class="logo"><a href="">C程序设计(入门)</a></div>
        <ul class="user">
            <!-- <li><a href="course.php"><span>课程</span></a></li> -->
            <!-- <li class="user_name">
                <a href="">
                    <img src="images/head_pic.jpg" alt="head_pic" id="head_pic" />
                    <span>丁先生</span>
                </a>                
            </li>
            <li id="sign_out">|<a href="" class="sign_out">退出</a></li> -->
        </ul>
    </div>
</div>
<div id="content" class="container">
    <div class="exercises">
        <h2><a href="course.php">课程</a> > <?php echo $chapter[$id]; ?>章节测验：</h2>
        <strong>注意：请认真完成本次测验，并在讨论区参与讨论，与他人共同探讨最优解决方案，弥补自己的不足！</strong>
        <?php 
            if (!empty($data)) {
                foreach ($data as $key => $value) {
        ?>
        <div class="test">
            <h3 class="title"><?php echo $key+1;?>、<?php echo $value['title']; ?></h3>
            <h4>题目描述：</h4>
            <p class="description"><?php echo $value['description']; ?></p>
            <h4>题目要求：</h4>
            <p class="requires"><?php echo $value['requires']; ?></p>
            <div class="prompt">点击查看提示！</div>
            <p class="answer" style="display: none;"><?php echo $value['answer']; ?></p>
        </div>
        <?php 
                }
            }
        ?>
    </div>
</div>
<script src="admin/scripts/utils.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var aPrompt = GLOBAL.Dom.getElementsByClassName("prompt"),
            aAnswer = GLOBAL.Dom.getElementsByClassName("answer");

        for (var i = 0; i <= aPrompt.length - 1; i++) {
            aPrompt[i].index = i;
            aPrompt[i].onclick = function() {
                aAnswer[this.index].style.display = 'block';
            }   
        }
    }
</script>
</body>
</html>














