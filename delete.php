<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM personal_info where id = '$id'";
    $result= $conn->query($sql);
    if($result === true){
        header("Location: read.php");
        exit();
    }
    else{
        echo "dificult deleting",$conn->error;
    }
    $conn->close();
    ?>
</body>
</html>