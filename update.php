<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        $sql = "SELECT * FROM personal_info where id =$id";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()){
                
?>
         <form action="update.php?id=<?php echo $id; ?>" method="post">
   

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required><br><br>

    <label for="phonenumber">Phone Number:</label>
    <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $row['phone_no']; ?>" required><br><br>

    <label for="salary">Salary:</label>
    <input type="text" id="salary" name="salary" value="<?php echo $row['salary']; ?>"><br><br>

    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="male" <?php if ($row['gender'] == 'male') echo 'checked'; ?> required>Male
    <input type="radio" id="female" name="gender" value="female" <?php if ($row['gender'] == 'female') echo 'checked'; ?> required>Female<br><br>

    <input type="submit" value="Update" id="submit"> 
</form>

       
       <?php
            }
        } 
        else {
            echo "no data found";
        }
        if ($_SERVER["REQUEST_METHOD"] == 'POST'){

            $id= $_GET['id'];
            $name= $_POST['name'];
            $address= $_POST['address'];
            $phonenumber= $_POST['phonenumber'];
            $salary= $_POST['salary'];
            $gender= $_POST['gender'];
            
              $sql_1 = "UPDATE personal_info set name ='$name',address ='$address', phone_no ='$phonenumber', salary ='$salary', gender='$gender' WHERE id = '$id' ";
              $result_1 = $conn->query($sql_1);
              if ($result_1 === TRUE) {
                // Redirect to read.php after a successful update
                header("Location: read.php");
                exit(); // Ensure no further code is executed
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }  
        $conn->close();
        ?>
        
    
        
    </body>
   

    </html>
</body>
</html>