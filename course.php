<?php
    require_once('connect.php');
    
    $sql            = "select * from course order by dateline asc";
    $mysqli_result  = $mysqli -> query($sql);
    
    if ($mysqli_result && $mysqli_result -> num_rows > 0) {
        while ($row = $mysqli_result -> fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data = array();
    }  

    $sql2           = "select id, title, dateline from exercise order by dateline asc"; 
    $mysqli_result2 = $mysqli -> query($sql2);

    if ($mysqli_result2 && $mysqli_result2 -> num_rows > 0) {
        while($row2 = $mysqli_result2 -> fetch_assoc()) {
            $data2[]= $row2;
        } 
    } else {
        $data2 = array();
    } 

    // print_r($data2);
   $chapter = array("C语言介绍", "基本数据类型", "输入与输出", "运算符与表达式", "选择结构--条件判断", "循环结构", "数组", "函数", "初识指针");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>C程序设计</title>
<link rel="stylesheet" href="admin/style/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="admin/style/iconfont.css" type="text/css" media="screen" />
<link rel="stylesheet" href="admin/style/main.css" type="text/css" media="screen" />
<!--  
    引用富文本编辑器
    <link rel="stylesheet" type="text/css" href="resource/styles/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="resource/styles/simditor.css" />
    <script type="text/javascript" src="resource/scripts/js/jquery.min.js"></script>
    <script type="text/javascript" src="resource/scripts/js/module.js"></script>
    <script type="text/javascript" src="resource/scripts/js/uploader.js"></script>
    <script type="text/javascript" src="resource/scripts/js/simditor.js"></script> 
-->
</head>
<body>
<div id="header">
    <div class="container">
        <div class="logo"><a href="">C程序设计(入门)</a></div>
        <!-- <ul class="user">
            <li class="user_name">
                <a href="">
                    <img src="images/head_pic.jpg" alt="head_pic" id="head_pic" />
                    <span>丁先生</span>
                </a>                
            </li>
            <li id="sign_out">|<a href="" class="sign_out">退出</a></li>
        </ul> -->
    </div>
</div>
<div id="content" class="container">
    <div class="list">
        <div class="topic">
            <h2 class="topic_title"><i class="icon iconfont">&#xe605;</i>我的课程</h2>
            <ul>
            	<li class="active">公告</li>
            	<li>课程目录</li>
            	<li>测试与作业</li>
                <li>讨论区</li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="section" style="display: block;">
            <div class="main_title">
                <h2>C程序设计(入门)</h2>
            </div>
            <div class="main_content" >
                <p class="first_p">
                    C语言是古老而长青的编程语言，它具备了现代程序设计的基础要求，它的语法是很多其他编程语言的基础，在系统程序、嵌入式系统等领域依然是无可替代的编程语言，在各类编程语言排行榜上常年占据前两名的位置，<strong>本课程是零基础的编程入门课</strong>，是你进一步学习其他编程语言知识的第一步阶梯。
                </p>
                <p>
                    完成本课程之后，就能<strong>具有初步的运用C语言编写程序的能力。</strong>
                </p>
                <p>
                    对于<strong>非计算机专业</strong>的学生，学习本课程的主要目的是掌握程序设计的基本方法，C语言是教学媒介。<br />
                    对于<strong>计算机专业</strong>的学生，本课程是向后续的计算机组成、操作系统、编译原理、体系结构等课程前进的基石，对于C语言本身甚至程序设计语言基础原理的深入理解都是应该掌握的。
                </p>
                <p>
                    现在，你需要<strong>有一台计算机</strong>，安装必要的编程软件（<strong>DEV C++、VC6.0、C-Free</strong>）。无论是MS Windows、Mac OS X还是Linux，都有适合C语言编程的软件。
                </p>
                <p>
                    <strong>参考书</strong>：《C程序设计》第四版 谭浩强著。
                </p>
            </div>
        </div>
        <div class="section">
            <div class="main_title">
                <h2>课程目录</h2>
            </div>
            <div class="main_content">
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第一章：C语言介绍<span>+</span></h3>
                    </div>
                   <ol class="course_title" style="display: none;">
                    <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "C语言介绍") {
                    ?>    
                       <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?>
                   </ol>
                </div>  
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第二章：基本数据类型<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                    <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "基本数据类型") {
                    ?>    
                       <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?> 
                   </ol>
                </div>  
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第三章：输入与输出<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                       <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "输入与输出") {
                    ?>    
                       <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?> 
                   </ol>
                </div>  
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第四章：运算符与表达式<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                       <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "运算符与表达式") {
                        ?>    
                        <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?> 
                   </ol>
                </div>  
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第五章：选择结构--条件判断<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                       <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "选择结构--条件判断") {
                        ?>    
                        <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?> 
                   </ol>
                </div> 
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第六章：循环结构<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                       <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "循环结构") {
                        ?>    
                        <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?> 
                   </ol>
                </div> 
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第七章：数组<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                       <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "数组") {
                        ?>    
                        <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?> 
                   </ol>
                </div>   
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第八章：函数<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                       <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "函数") {
                        ?>    
                        <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                        <?php 
                                    } 
                                }
                            }
                        ?> 
                   </ol>
                </div> 
                <div class="course_list">
                    <div class="list_title">    
                        <h3>第九章：初始指针<span>+</span></h3>
                    </div>
                   <ol class="course_title"  style="display: none;">
                       <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                                if ($value["chapter"] == "初始指针") {
                        ?>    
                        <li><a href="course-video.php?id=<?php echo $value["id"]; ?>"><?php echo $value["coursename"]; ?></a></li>
                    <?php 
                                } 
                            }
                        }
                    ?> 
                   </ol>
                </div>   
            </div>
        </div>
        <div class="section">
            <div class="main_title">
                <h2>测试与作业</h2>
            </div>
            <div class="main_content">
                <!-- <h3>分章节测试题：</h3> -->
                <div class="exercise">
                    <?php 
                        for ($i = 0; $i < 9; $i++) { 
                    ?>
                    <div class="exercise-topic clearfix">
                        <h4><?php echo $chapter[$i]; ?><span>截止时间：2016年 11月21日 11：00 </span> <a href="course-exercise.php?chapter=<?php echo $i + 1; ?>">前往测验</a></h4>
                        <div class="description">
                            <h5>截止日期：<span>2016年11月6日 10:00</span></h5>
                            <p>请务必在截止时间之前提交，截止时间后该区将关闭！</p>
                            <br>
                            <h5><strong>注意：</strong></h5>
                            <p class="explain">该测验只提供题目，不用提交实现源码，请在截止时间内前往测验，并在讨论区参与题目讨论。</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="main_title">
                <h2>讨论区</h2>
                <p>请在相关主题下参与讨论！</p>
            </div>
            <div class="main_content">
               <h3 class="comment_title">全部主题</h3>
               <div class="comment">
                    <?php 
                        if (empty($data2)) {
                            echo "<p>暂无讨论！</p>";
                        } else {
                            foreach ($data2 as $value) {
                    ?>
                   <div class="comment-list">
                       <a href="course-comment.php?id=<?php echo $value['id']; ?>&title=<?php echo $value['title']; ?>" ><?php echo $value['title']; ?></a>
                       <span>发布于：<?php echo date('Y-m-d H:i:s', $value['dateline']); ?></span>
                   </div>
                    <?php        
                            }
                        }
                    ?>
               </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="admin/scripts/jquery-1.11.3.min.js"></script> -->
<script src="admin/scripts/utils.js"></script>
<script src="admin/scripts/script.js"></script>
</body>
</html>














