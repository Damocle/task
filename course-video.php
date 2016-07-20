<?php
    require_once('connect.php');
    
    $id             = $_GET["id"];
    $sql            = "select * from course where id=".$id;
    
    $mysqli_result  = $mysqli -> query($sql);
    
    if ($mysqli_result && $mysqli_result -> num_rows > 0) {
        $row = $mysqli_result -> fetch_assoc();
    } 

    $sql2           = "select * from comments where categories = $id order by pubTime desc"; 
    // print_r($sql2);
    $mysqli_result2 = $mysqli -> query($sql2);

    if ($mysqli_result2 && $mysqli_result2 -> num_rows > 0) {
        while($row2 = $mysqli_result2 -> fetch_assoc()) {
            $data2[]= $row2;
        } 
    } else {
        $data2 = array();
    } 
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
<!--             <li class="user_name">
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
    <div class="video">
        <div class="subnav">
            <p>
                <a href="course.php">课程&nbsp;&nbsp;</a>>&nbsp;&nbsp;<span><?php echo $row['coursename']; ?></span>
                <a class="next_course" href="course-video?id=<?php echo $row['id']+1;?>">下一节&nbsp;&nbsp;></a>
            </p>
        </div>
        <div class="course_video">
            <video controls poster="" src="<?php echo $row['courseaddress']; ?>"></video>
           <!--  <embed src="" allowFullScreen="true" quality="high" width="1207" height="600" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed> -->
        </div>
    </div>
    <div class="course-comment">
    <h3 class="comment_title">评论区</h3>
    <?php 
        if (empty($data2)) {
            echo "<p class='notice'>暂无评论！</p>";
        } else {
            foreach ($data2 as $value) {
    ?>   
    <div class="comment">
        <div class="face">
            <a href="<?php echo $value['url']; ?>"><img src="<?php echo $value['face']; ?>"></a>
        </div>
        <div class="username">
            <a href="<?php echo $value['url']; ?>"><?php echo $value['username'];?></a>
        </div>
        <div class="date" title="发布时间：<?php echo date('Y-m-d H:i:s', $value['pubTime']); ?>">
        <?php echo date('Y-m-d H:i:s', $value['pubTime']); ?>
        </div>
        <p><?php echo $value['content'];?></p>
    </div>
    <?php 
            }
        }
    ?> 
    <div class="comment-form">
        <h3>发表评论</h3>
        <input type="hidden" name="categories" value="<?php echo $id; ?>" />
        <div>
            <label for="username">昵称：</label>
            <input type="text" id="username" name="username" placeholder="请输入您的昵称" />
        </div>
        <div>
            <label for="email">邮箱：</label>
            <input type="text" id="email" name="email"  placeholder="请输入合法邮箱" />
        </div>
        <div>
            <label for="url">博客：</label>
            <input type="text" id="url" name="url" placeholder="请输入合法域名" />
        </div>
        <div>
            <label for="content">评论：</label>
            <textarea name="content" id="content_text" cols="80" rows="10" required='required' placeholder='请输入您的评论...' ></textarea>
        <!--  <textarea id="editor" placeholder="这里输入内容" autofocus></textarea> -->
        </div>
        <div>
            <label for="submit"></label>
            <input type="submit" value="发布评论" id="submit" />
        </div>
    </div>   
    </div>
</div>
<!-- <script type="text/javascript" src="admin/scripts/jquery-1.11.3.min.js"></script> -->
<script src="admin/scripts/utils.js"></script>
<script src="admin/scripts/script.js"></script>
</body>
</html>














