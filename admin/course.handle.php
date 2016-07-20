<?php 
	// header('Content-Type:application/json;charset=utf-8');
    require_once "../connect.php";
   
    /* 不转义中文字符和\/的 json 编码方法
     * @param array $arr 待编码数组
     * @return string
     */
    function json_encode_no_zh($arr) {
        $str = str_replace( "\\/", "/", json_encode($arr));
        $search = "#\\\u([0-9a-f]+)#ie";
     
        if (strpos(strtoupper(PHP_OS), 'WIN') === false) {
            $replace = "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))";//LINUX
        } else {
            $replace = "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))";//WINDOWS
        }
     
        return preg_replace($search, $replace, $str);
    }

    $act = $_GET["act"];

    if ($act == "addCourse" || $act == "updateCourse") {
	    $chapter       = $_POST["chapter"];
		$courseName    = $_POST["courseName"];
	    $courseAddress = $_POST["courseAddress"];
	    $author        = $_POST["author"]; 
	    $dateline 	   = time();
    } 
	
    switch ($act) {
        // 登录
        case 'login':
            $username = $_POST["username"];
            $password = $_POST["password"];
            $sql = "select * from user where username = '$username'";

            if($username == "" || $password == "") {  
                echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
            } else {
                $mysqli_result = $mysqli -> query($sql);

                if ($mysqli_result && $mysqli_result -> num_rows > 0) {
                    $row = $mysqli_result -> fetch_assoc();
                } else {
                    echo "<script>alert('登录失败');window.location.href='login.html';</script>";
                }

                if ($row["password"] == $password) {
                    echo "<script>alert('登录成功');window.location.href='admin.php';</script>";
                } else {
                    echo "<script>alert('登录失败');window.location.href='login.html';</script>";
                }
            }

            break;

    	// 添加课程
    	case 'addCourse':
    		$sql = "insert into course(chapter, courseName, author, courseAddress, dateline) values('$chapter', '$courseName', '$author', '$courseAddress', '$dateline')";

    		// echo $sql;
		    if ($mysqli -> query($sql)) {
		    	echo "<script>alert('发布课程成功');window.location.href='admin.php';</script>";
		    } else {
		    	echo "<script>alert('发布课程失败');window.location.href='admin.php';</script>";
		    }

    		break;

    	// 删除课程
    	case 'delCourse':
    		$id  = $_GET["id"];
    		$sql = "delete from course where id=".$id;

    		if ($mysqli -> query($sql)) {
		    	echo "<script>alert('删除课程成功');window.location.href='admin.php';</script>";
		    } else {
		    	echo "<script>alert('删除课程失败');window.location.href='admin.php';</script>";
		    }
    		break;
       
        // 更新课程
    	case 'updateCourse':
    		$id  = $_GET["id"];
    		$sql = "update course set chapter='{$chapter}', coursename='{$courseName}', author='{$author}', courseaddress='{$courseAddress}', dateline = '{$dateline}' where id=".$id;

    		if ($mysqli -> query($sql)) {
		    	echo "<script>alert('更新课程成功');window.location.href='admin.php';</script>";
		    } else {
		    	echo "<script>alert('更新课程失败');window.location.href='admin.php';</script>";
		    }
    		break;	
       
        // 评论
        case 'active':
            $categories = $_POST["categories"];
            $username   = $_POST["username"];
            $face       = $_POST["face"];
            $email      = $_POST["email"];
            $url        = $_POST["url"];
            $content    = $_POST["content"];
            $pubTime    = time();
            // echo $face;
           /*
                if(!($email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL))){
                    $errors['email'] = '请输入合法邮箱';
                }
                if(!($url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL))){
                    $url = '';
                }
                if(!($content = filter_input(INPUT_POST,'content',FILTER_CALLBACK))){
                    $errors['content'] = '请输入合法内容';
                }
                if(!($username = filter_input(INPUT_POST,'username',FILTER_CALLBACK))){
                    $errors['username'] = '请输入合法用户名';
                }

                if(!empty($errors)){
                    $arr = $errors;
                    echo $arr;
                }
            */

            $sql = "insert into comments(categories, username, email, url, content, pubTime, face) values('$categories', '$username', '$email', '$url', '$content', '$pubTime', '$face')";
            
            if ($mysqli -> query($sql)) {
                $sql = "select * from comments where pubTime = $pubTime";

                if ($mysqli_result = $mysqli -> query($sql)) {
                    if ($mysqli_result && $mysqli_result -> num_rows > 0) {
                        $row = $mysqli_result -> fetch_assoc();
                        echo json_encode($row, JSON_UNESCAPED_SLASHES);
                    }
                } 
            } else {
                echo "error!";
            }

            break;	
        
        // 添加习题
        case 'addExercises':

            $chapter     = $_POST["chapter"];
            $author      = $_POST["author"];
            $closeDate   = $_POST["closeDate"];
            $title       = $_POST["title"];
            $description = $_POST["description"];
            $requires    = $_POST["require"];
            $answer      = $_POST["answer"];
            $dateline    = time();

            $sql = "insert into exercise(chapter, author, closedate, title, description, requires, answer, dateline) values('$chapter', '$author', '$closeDate', '$title', '$description', '$requires', '$answer', '$dateline')";

            // echo $sql;
            if ($mysqli -> query($sql)) {
                echo "<script>alert('发布习题成功');window.location.href='admin.php';</script>";
            } else {
                echo "<script>alert('发布习题失败');window.location.href='admin.php';</script>";
                // echo $mysqli->error;
            }

            break;

        // 更新习题
        case 'updateExercises':
            $id          = $_GET["id"];
            $chapter     = $_POST["chapter"];
            $author      = $_POST["author"];
            $closeDate   = $_POST["closeDate"];
            $title       = $_POST["title"];
            $description = $_POST["description"];
            $requires    = $_POST["require"];
            $answer      = $_POST["answer"];
            $dateline    = time();
            // $sql = "update course set chapter='{$chapter}', coursename='{$courseName}', author='{$author}', courseaddress='{$courseAddress}', dateline = '{$dateline}' where id=".$id;

            $sql = "update exercise set chapter='{$chapter}', author='{$author}', closedate='{$closeDate}', title='{$title}', description='{$description}', requires='{$requires}', answer='{$answer}', dateline='{$dateline}' where id=".$id;

            // echo "$sql";
            if ($mysqli -> query($sql)) {
                echo "<script>alert('更新习题成功');window.location.href='admin.php';</script>";
            } else {
                echo "<script>alert('更新习题失败');window.location.href='admin.php';</script>";
            }  
            break;
            
        // 删除习题
        case 'delExercise':
            $id  = $_GET["id"];
            $sql = "delete from exercise where id=".$id;

            if ($mysqli -> query($sql)) {
                echo "<script>alert('删除习题成功');window.location.href='admin.php';</script>";
            } else {
                echo "<script>alert('删除习题失败');window.location.href='admin.php';</script>";
            }

            break;
    }

?>