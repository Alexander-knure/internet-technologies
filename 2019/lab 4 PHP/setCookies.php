<?php
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}
header("Location: http://lab-4/main.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
    $password = $_POST['password'];
    
	$name = clean($name);
	$surname = clean($surname);
	$email = clean($email);
    $password = clean($password);
    
	if(!empty($name) && !empty($surname) && !empty($email) && !empty($password)) {
	    $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 
	    if(check_length($name, 2, 25) && check_length($surname, 2, 50) && check_length($password, 2, 25) && $email_validate) {

            SetCookie('Name',$name,time()+3600);
            SetCookie('Surname',$surname,time()+3600);
            SetCookie('Email',$email,time()+3600);
            SetCookie('Password',$password,time()+3600);

            echo "<script language='javascript'>
            alert('Спасибо за сообщение')
            </script>";
	    } else {
            echo"<script language='javascript'>
            alert('Введенные данные некорректные')
            </script>";
        }
	} else {
        echo"<script language='javascript'></script>
        alert('Заполните пустые поля')
        </script>";
	}
} 