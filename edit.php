
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

if(isset($_POST['update'])){

$db = mysqli_connect('localhost', 'root', '','php');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = 'UPDATE register set name ="'.$name.'",
email ="'.$email.'", password="'.$password.'" WHERE
id ="'.$id.'"';

mysqli_query($db,$query);

}

?>

<?php
$db = mysqli_connect('localhost', 'root', '','php');
$query = 'SELECT * FROM register
              WHERE
              id ='.$_GET['id'];

            $result = mysqli_query($db, $query);
              while($row = mysqli_fetch_array($result))
              {   
                $name= $row['name'];
                $email= $row['email'];
                $password=$row['password'];
              }
              
              $id = $_GET['id'];
?>

<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>" />
                
<label for="">Name</label>
    <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
    <label for="">Email</label>
    <input type="email" name="email" value="<?php echo $email; ?>"><br>
    <label for="">Password</label>
    <input type="password" name="password" value="<?php echo $password; ?>"><br>
    <input type="submit" value="Update" name="update" /><br>

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