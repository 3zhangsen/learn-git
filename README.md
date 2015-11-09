# learn-git
学习使用Clound9 - mysql

### 1.Clound9网站MySQL配置
      hostname: 127.0.0.1
      port：3306
      user： (注册名)
      password:   
      database: c9 (cloud9数据库自带的)

### 2.在Terminal面板中启动和使用mysql的一般过程。
      $ mysql-ctl install;   //安装mysql数据库，已经安装则不需要执行本语句
      
      $ mysql-ctl start;  //启动mysql. 第一次启动时会创建一个空数据库
      
      $ mysql-ctl cli;    // run the MySQL interactive shell 运行进入交互式shell脚本
      mysql>  show databases; //显示mysql中拥有的数据库 执行 cli 后会进入 mysql> 
      mysql>  create database phptest;  //新建名字为phptest的数据库
      mysql>  use phptest;   //使用phptest数据库
      mysql>  show tables;   //显示数据库中的表
      SHOW VARIABLES WHERE Variable_name = 'hostname';  //得到hostname


### 3.测试连接数据库

      <?php
     $con = mysqli_connect("127.0.0.1","用户名","密码","w3cPhpdb");//""代表密码为空，"w3cPhpdb"是数据库名
      if (!$con)
       {
            die('Could not connect: ' . mysql_error());
       }
         echo "Connected successfully";
      $query = "SELECT * FROM users";
      $result = mysqli_query($con, $query);
       while ($row = mysqli_fetch_assoc($result)) {
              echo "The ID is: " . $row['id'] . " and the Username is: " . $row['username'];
      }
      ?>
      
      ------------------------------------------------------------
      
      <?php
      $conn = new mysqli("127.0.0.1","a3zhangsen","","w3cPhpdb");//""代表密码为空，"w3cPhpdb"是数据库名
      if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "SELECT id,username FROM users";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // 输出每行数据
             while($row = $result->fetch_assoc()) {
            echo "<br> id: ". $row["id"]. " - Name: ". $row["username"]."<br>";
        }
     } else {
        echo "0 results";
      }
      $conn->close();

### 4.使用Cloud9数据库mysql的教程

  链接地址如下:  
  (1) [Set Up a Database](https://docs.c9.io/v1.0/docs/setup-a-database)<br />
  (2) [Setting Up MySQL](https://docs.c9.io/v1.0/docs/setting-up-mysql)<br />
  (3) [Connecting PHP to MySQL](https://docs.c9.io/docs/connecting-php-to-mysql#section--step-1-setup-mysql-on-cloud-9-in-terminal-)<br />
            
      (3)包括Step 1: Setup MySQL on Cloud 9 (配置MySQL)
             Step 2: Create a test database (创建一个测试用数据库)
             Step 3：Get the credentials you'll need to connect to the database from PHP.
             得到连接php数据库需要的凭证：如 user ,password ,hostname.
             last Step:在php文件中连接mysql数据库。(该链接的这个方法不知名原因失败，可使用上面3 的方法)

--------------------------------------------------------------

1.Set Up a Database
MySQL
From the Terminal, run the following command:

    $ mysql-ctl install
The output will be:

    MySQL 5.5 database added.  Please make note of these credentials:
    Root User: username
    Database Name: c9
*Now you can connect to the database using the ip 127.0.0.1 and the default port 3306. You can also test it using our tool from the Terminal:*

    $ mysql-ctl cli
    
            Welcome to the MySQL monitor.  Commands end with ; or \g.
            Your MySQL connection id is 24
            Server version: 5.5.37-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

    mysql>  show databases;
      +--------------------+
      | Database           |
      +--------------------+
      | information_schema |
      | c9                 |
      | mysql              |
      | performance_schema |
      +--------------------+
      4 rows in set (0.15 sec)



### MySQL常用查看数据库 数据表的  【命令】
            标签： 数据库 的 数据表 杂谈	
            MySQL数据库查看数据库 数据表的命令。
            进入MySQL Command line client下查看当前使用的数据库:
             mysql>select database();
            
             mysql>status;
            
             mysql>show tables;
            
             mysql>show databases;  //可以查看有哪些数据库,返回数据库名(databaseName)
             
            mysql>use databaseName;  //更换当前使用的数据库
            
             mysql>show tables;  //返回当前数据库下的所有表的名称
            
             或者也可以直接用以下命令
             mysql>show tables from databaseName; //databaseName可以用show databases得来
            
             mysql查看表结构命令，如下:
             desc 表名;
             show columns from 表名;
            
             或者 
             describe 表名;
             show create table 表名;
           
             或者  
             use information_schemaselect * from columns where table_name='表名';
            
             查看警告:
             mysql> show warnings;
             Rows matched: 1 Changed: 0 Warnings: 1

               +---------+------+-------------------------------------------+
               | Level | Code | Message |
               +---------+------+-------------------------------------------+
               | Warning | 1265 | Data truncated for column 'name' at row 3 |
               +---------+------+-------------------------------------------+
               1 row in set
