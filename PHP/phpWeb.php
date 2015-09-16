<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Sourcelairpro by 3zhangsen</title>
    <script>
    function displayDate()
    {
        document.getElementById("demo").innerHTML=Date();
    }
    </script>
    </head>
<body>

<h2>My first PHP page</h2>

<?php
echo "Hello World!<br>";
echo "phpTest";
?>  
<p id="demo">这是一个段落</p>
<button type="button" onclick ="displayDate()">显示日期</button>
<?php
$con = mysql_connect("127.0.0.1","a3zhangsen");
if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }
else
    {
    echo "Connected successfully";
    }
?>
</body>
</html>
