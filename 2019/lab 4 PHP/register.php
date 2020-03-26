<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Register</title>
</head>
<form action="setCookies.php" method="post">
    <div class="container">
      <h1>Регистрация</h1>
      <p>Пожалуйста, заполните эту форму, чтобы создать учетную запись.</p>
 
      <label for="name"><b>Имя</b></label>
      <input type="text" placeholder="Введите имя" name="name" required>
      
      <label for="surname"><b>Фамилия</b></label>
      <input type="text" placeholder="Введите фамилию" name="surname" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Введите Email" name="email" required>
  
      <label for="password"><b>Пароль</b></label>
      <input type="password" placeholder="Введите пароль" name="password" required>
  
      <label for="psw-repeat"><b>Повторите пароль</b></label>
      <input type="password" placeholder="Повторите пароль" name="password-repeat" required>
  
      <input type="submit" class="registerbtn"></input>
    </div>
  </form>
</body>
</html>