<?php
    require_once('../connect.php');
    
    $sql            = "select * from course order by dateline desc";
    $mysqli_result  = $mysqli -> query($sql);
    
    if ($mysqli_result && $mysqli_result -> num_rows > 0) {
        while ($row = $mysqli_result -> fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data = array();
    }   

    $sql2           = "select * from exercise order by dateline desc";
    $mysqli_result2 = $mysqli -> query($sql2);
    
    if ($mysqli_result2 && $mysqli_result2 -> num_rows > 0) {
        while ($row2 = $mysqli_result2 -> fetch_assoc()) {
            $data2[] = $row2;
        }
    } else {
        $data2 = array();
    }   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>后台管理</title>
<link rel="stylesheet" href="style/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/iconfont.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/main.css" type="text/css" media="screen" />
</head>
<body>
<div id="header">
    <div class="container">
        <div class="logo"><a href="">C程序设计</a></div>
        <ul class="user">
            <li class="user_name">
          <!--       <a href="">
                    <img src="images/head_pic.jpg" alt="head_pic" id="head_pic" />
                    <span>丁先生</span>
                </a>      -->           
            </li>
            <li id="sign_out"><!-- | --><a href="login.html" class="sign_out">退出</a></li>
        </ul>
    </div>
</div>
<div id="content" class="container">
    <div class="list">
        <div class="topic">
            <h2 class="topic_title"><i class="icon iconfont">&#xe605;</i>课程管理</h2>
            <ul>
            	<li class="active">课程目录</li>
            	<li>添加课程</li>
            	<li>习题管理</li>
                <li>习题发布</li>
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
                    <li>当前位置：<span>课程目录</span></li>
                </ul>
                
                <table cellspacing="5" cellpadding="5">
                    <thead>
                        <tr>
                            <th>章节</th>
                            <th>课程名</th>
                            <th>发布者</th>
                            <th>发布时间</th>
                            <th>管理</th>
                        </tr> 
                    </thead>
                    <tbody> 
                    <?php 
                        if (!empty($data)) {
                            foreach ($data as $value) {
                    ?>                          
                        <tr>
                            <td><?php echo $value['chapter']; ?></td>
                            <td><?php echo $value['coursename']; ?></td>
                            <td><?php echo $value['author']; ?></td>
                            <td><?php echo date('Y-m-d', $value['dateline']); ?></td>
                            <td>
                                <a href="course.update.php?id=<?php echo $value['id']; ?>" class="update">更新</a> | 
                                 <a href="course.handle.php?act=delCourse&id=<?php echo $value['id']; ?>" class="delete">删除</a> 
                            </td>
                        </tr>
                    <?php 
                            }
                        }
                    ?>
                    </tbody>
                </table>
                <br />
            </div>
        </div>
        <div class="section">
            <div class="main_title">
                <h2>课程管理</h2>
            </div>
            <div class="main_content">
                <ul>
                    <li>当前位置 ：<span>添加课程</span></li>
                </ul>
                <form action="course.handle.php?act=addCourse" method="post" class="form1">
                    <div>
                        <label for="chapter">章节:</label>
                        <select name="chapter" id="cheapter">
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
                        <input type="text" name="courseName" id="courseName" />
                    </div>
                    <div>
                        <label for="author">发布人:</label>
                        <input type="text" name="author" id="author" />
                    </div>
                    <div>
                        <label for="courseAddress">课程地址:</label>
                        <input type="text" name="courseAddress" id="courseAddress" />
                    </div>
                    <div>
                        <label for="submit"></label>
                        <input type="submit" value="提交" id="submit" />
                    </div>
                </form>
            </div>
        </div>
        <div class="section">
            <div class="main_title">
                <h2>习题管理</h2>
            </div>
            <div class="main_content">
                <ul>
                    <li>当前位置：<span>习题目录</span></li>
                </ul>
                
                <table cellspacing="5" cellpadding="5">
                    <thead>
                        <tr>
                            <th>章节</th>
                            <th>习题名</th>
                            <th>发布者</th>
                            <th>发布时间</th>
                            <th>管理</th>
                        </tr> 
                    </thead>
                    <tbody> 
                    <?php 
                        if (!empty($data2)) {
                            foreach ($data2 as $value) {
                    ?>                          
                        <tr>
                            <td><?php echo $value['chapter']; ?></td>
                            <td><?php echo $value['title']; ?></td>
                            <td><?php echo $value['author']; ?></td>
                            <td><?php echo date('Y-m-d', $value['dateline']); ?></td>
                            <td>
                                <a href="exercise.update.php?id=<?php echo $value['id']; ?>" class="update">更新</a> | 
                                 <a href="course.handle.php?act=delExercise&id=<?php echo $value['id']; ?>" class="delete">删除</a> 
                            </td>
                        </tr>
                    <?php 
                            }
                        }
                    ?>
                    </tbody>
                </table>
                <br />
            </div>
        </div>
        <div class="section">
            <div class="main_title">
                <h2>习题发布</h2>
            </div>
            <div class="main_content">
                <ul>
                    <li>当前位置 ：<span>发布习题</span></li>
                </ul>
                <form action="course.handle.php?act=addExercises" method="post" class="form1">
                    <div>
                        <label for="chapter">章节:</label>
                        <select name="chapter" id="chapter">
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
                        <label for="author">发布人:</label>
                        <input type="text" name="author" id="author" />
                    </div>
                    <div>
                        <label for="closeDate">截止日期:</label>
                        <input type="text" name="closeDate" id="closeDate" value="2016年 11月21日 11：00" />
                    </div>
                    <div>
                        <label for="title">题目标题:</label>
                        <input type="text" name="title" id="title" />
                    </div>
                    <div class="clearfix">
                        <label for="description">习题描述:</label>
                        <textarea name="description" id="description" rows="10" cols="80"></textarea>
                    </div>
                    <div class="clearfix">
                        <label for="require">习题要求:</label>
                        <textarea name="require" id="require" rows="10" cols="80"></textarea>
                    </div>
                    <div class="clearfix">
                        <label for="answer">习题答案:</label>
                        <textarea name="answer" id="answer" rows="10" cols="80"></textarea>
                    </div>
                    <div>
                        <label for="submit"></label>
                        <input type="submit" value="提交" id="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="scripts/nicEdit.js"></script>
<script src="scripts/utils.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>














