<?php 
	$host = $_POST['host'];
	$user = $_POST['user'];
	$pwd  = $_POST['pwd'];
	$db   = $_POST['db'];

	/*创建conn.php*/
	$fileName  = "../connect.php";
	$header    = 'header("Content-type: text/html; charset=utf-8");'."\n";
	$localhost = '$host = '."'"."$host"."'".";\n";
	$username  = '$username = '."'"."$user"."'".";\n";
	$password  = '$password = '."'"."$pwd"."'".";\n";
	$database  = '$database = '."'"."$db"."'".";\n";

	$data  = "<?php\n";
	$data .= $header;
	$data .= $localhost;
	$data .= $username;
	$data .= $password;
	$data .= $database;
	$data .= '$mysqli = new mysqli($host, $username, $password, $database);'."\n";
	$data .= 'if ($mysqli -> connect_errno) {
   		die($mysqli -> connect_error);
    }'."\n";
    $data .= '$sql = "set names utf8";
    if(!$mysqli -> query($sql)) {
        echo mysql_error();
    }'."\n";

	$data .= "?>";

	$handle = fopen($fileName, "w") or die('打开文件失败');
	file_put_contents($fileName, $data);
	fclose($handle);
	
	// 连接mysql
	$mysqli = new mysqli($host, $user, $pwd);
    
    // 检测连接是否成功
    if ($mysqli -> connect_errno) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // 设置字符集
    $sql = "set names utf8";
    if(!$mysqli -> query($sql)) {
        echo mysql_error();
    }

    // 创建数据库
    $sql = "create database $db";
    if(!$mysqli -> query($sql)) {
        echo "Database created successfully";
	} else {
    	echo "Error creating database: " . $mysqli -> error;
	}	

	// 连接数据库
	$mysqli = new mysqli($host, $user, $pwd, $db);

	$sql = "CREATE TABLE user (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			username VARCHAR(100) NOT NULL,
			password VARCHAR(100) NOT NULL
			)engine=myisam charset=utf8";

	if ($mysqli -> query($sql)) {
    	echo "Table user created successfully";
	} else {
    	echo "Error creating table: " . $mysqli -> error;
	}	

	$sql = "create table course (
			id int(11) unsigned not null primary key auto_increment,
			chapter varchar(100) not null,
			coursename char(100),
			author char(50),
			courseaddress char(255),
			dateline int(11)
			)engine=myisam charset=utf8";

	if ($mysqli -> query($sql)) {
    	echo "Table course created successfully";
	} else {
    	echo "Error creating table: " . $mysqli -> error;
	}	

	$sql = "CREATE TABLE IF NOT EXISTS comments(
			id INT(11) UNSIGNED AUTO_INCREMENT KEY,
			categories INT(11),
			username VARCHAR(50) NOT NULL,
			email VARCHAR(50) NOT NULL,
			url VARCHAR(255),
			content TEXT NOT NULL,
			pubTime INT UNSIGNED NOT NULL,
			face VARCHAR(100)
			)engine=myisam charset=utf8";

	if ($mysqli -> query($sql)) {
		echo "Table comments created successfully";
	} else {
    	echo "Error creating table: " . $mysqli -> error;	
	}

	$sql = "CREATE TABLE IF NOT EXISTS exercise( 
			id INT(11) UNSIGNED AUTO_INCREMENT KEY, 
			chapter VARCHAR(50) NOT NULL, 
			author VARCHAR(50) NOT NULL,
			closedate VARCHAR(50), 
			title VARCHAR(255), 
			description TEXT NOT NULL, 
			requires TEXT NOT NULL, 
			answer TEXT NOT NULL, 
			dateline INT(11) UNSIGNED NOT NULL 
			)engine=myisam charset=utf8";

	if ($mysqli -> query($sql)) {
		echo "Table exercise created successfully";
	} else {
    	echo "Error creating table: " . $mysqli -> error;	
	}
	// 关闭数据库连接
	$mysqli -> close();

	header("location: registered.php");

?>

