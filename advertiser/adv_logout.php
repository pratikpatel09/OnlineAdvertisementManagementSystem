<!DOCTYPE html>
<?php 
session_start();
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_destroy();
            header("location: ../login.php");
        ?>
    </body>
</html>
