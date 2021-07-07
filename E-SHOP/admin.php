<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="admindDb">
        <form action="#" class="creatDB" method="POST">
            <hr>
            <h3 class="creatDB__h3">Создание базы данных</h3>
            <hr>

            <?php
            include "dbinit.php";
            error_reporting(0);
            $nameDB = $_POST['nameDB'];
            $nameServer = $_POST['serverName'];
            $nameUser = $_POST['userName'];
            $password = $_POST['password'];

            include "./idmin/creatdb.php";
            include "./idmin/createTable.php";
            include "./idmin/chengeTable.php";

            ?>
           


    </div>

</body>

</html>