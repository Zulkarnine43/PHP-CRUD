
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){

$db = mysqli_connect('localhost', 'root', '','php');
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

 $query = "INSERT INTO register
        (name, email, password)
        VALUES ('".$name."','".$email."','".$password."')";

mysqli_query($db,$query);

}

?>
<form action="" method="post">
<label for="">Name</label>
    <input type="text" name="name" ><br><br>
    <label for="">Email</label>
    <input type="email" name="email" ><br>
    <label for="">Password</label>
    <input type="password" name="password" ><br>
    <input type="submit" value="Submit" name="submit" /><br>

</form>


     
<table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php    
                        $db2 = mysqli_connect('localhost', 'root', '','php');              
                            $query2 = 'SELECT * FROM register';
                                $result = mysqli_query($db2, $query2);
                            
                                    while ($row = mysqli_fetch_assoc($result)) {                      
                                        echo '<tr>';
                                        echo '<td>'. $row['name'].'</td>';
                                        echo '<td>'. $row['email'].'</td>';
                                        echo '<td>'. $row['password'].'</td>';
                                        echo '<td> <a type="button" href="edit.php?id='.$row['id'] .'">EDIT</a> ';
                                        echo ' <a type="button" href="del.php?id='.$row['id'] .'">DELETE</a> </td>';
                                        echo '</tr> ';
                            }
                        ?> 
                        
                    </tbody>
</table>

</body>
</html>