<html>
<head>
    <title>insert data in database using PDO(php data object)</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="main">
    <h1>Insert data into database using PDO</h1>
    <div id="login">
        <h2>Student's Form</h2>
        <hr/>
        <form action="" method="post">
            <label>Student Name :</label>
            <input type="text" name="stu_name" id="name" required="required" placeholder="Please Enter Name"/><br /><br />
            <label>Student Email :</label>
            <input type="email" name="stu_email" id="email" required="required" placeholder="john123@gmail.com"/><br/><br />
            <label>Student City :</label>
            <input type="text" name="stu_city" id="city" required="required" placeholder="Please Enter Your City"/><br/><br />
            <input type="text" name="stu_city1" id="city" required="required" placeholder="Please Enter Your City"/><br/><br />
            <span id='message'></span>
            <script type= 'text/javascript'>
            $('#city').on('keyup', function () {
            if ($(this).val() == $('#city').val()) {
            $('#message').html('matching').css('color', 'green');
            } else $('#message').html('not matching').css('color', 'red');
            });
            </script>
            <input type="submit" value=" Submit " name="submit"/><br />

        </form>
    </div>
    <!-- Right side div -->
    <div id="formget">
        <a href=https://www.formget.com/app active="purple"><img src="formget.jpg" alt="Online Form Builder"/></a>
    </div>

</div>
<?php

if(isset($_POST["submit"])){
    $hostname='localhost';
    $username='root';
    $password='';

    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=test",$username,$password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
        $query= mysql_query("SELECT * FROM test.test WHERE name='$_POST[stu_email]'");
        if (mysql_num_rows($query)>0)
        {
            echo "<script type= 'text/javascript'>alert('duplicate');</script>";
        }
        else{
            $sql = "INSERT INTO test (name, city)
VALUES ('" . $_POST["stu_email"] . "','" . $_POST["stu_city"] . "')";
            if ($dbh->query($sql)) {
                echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
            } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
            }
        }
        $dbh = null;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

}
?>
</body>
</html>
