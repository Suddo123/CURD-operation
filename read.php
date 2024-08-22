<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone_no</th>
                <th>Salary</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
    <tbody>
    <?php 
    include "connection.php";
    $sql = "SELECT * FROM personal_info";
    $result= $conn->query($sql);
    if($result->num_rows>0){
     while($row = $result->fetch_assoc()){
       echo"<tr>";
       echo"<td>".$row['id'] ."</td>";
       echo"<td>".$row['name'] ."</td>";
       echo"<td>" .$row['address']."</td>";
       echo"<td>".$row['phone_no'] ."</td>";
       echo"<td>" .$row['salary']."</td>";
       echo"<td>" .$row['gender']."</td>";
       echo '<td><a href="update.php?id=' . $row['id'] . '" style="color: white; background-color: blue; text-decoration: none;">Update</a></td>';
       echo '<td><a href="delete.php?id=' . $row['id'] . '" style="color: white; background-color: red; text-decoration: none;">Delete</a></td>';
       echo "</tr>";
    

     }
    
    }
    else {
        echo "<tr><td colspan='8'>No records found</td></tr>";
    }
    $conn->close();
    ?>
    </tbody>
     </table>
</body>
</html>