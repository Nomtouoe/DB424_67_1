<?php
session_start();
require 'db.php';

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST ['password'];
    $sql = 'SELECT * 
            FROM users U JOIN student S 
            ON U.username=S.studentID
            WHERE username=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()){
    if (password_verify($password, $row['password'])){
        $_SESSION['user'] = [
            'studentID'=>$row['studentID'],
            'firstName'=>$row['firstName'],
            'lastName'=>$row['lastName'],
        ];
    //    $_SESSION['studentID'] = $row['studentID'];
    //    $_SESSION['firstname'] = $row['firstname'];
    //    $_SESSION['lastname'] = $row['lastname'];
        header('Location: index.php');
        echo 'ถูกต้องครับ';
    }
    else{
        echo 'password ไม่ถูกต้อง';
    }
}
    else
        echo 'username ไม่ถูกต้อง';
}
?>