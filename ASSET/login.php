<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body, html {
    height: 100%;
    margin: 0;
    background-color: #8B4513;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .login-container {
    width: 300px;
    padding: 16px;
    background-color: white;
    border-radius: 8px;
  }
  
  h1 {
     color: #8B4513;
     text-align:center; 
  }
  
  form {
     color: #8B4513;
  }
  
  label {
     display:block; 
     margin-bottom: 8px;
  }
  
  input[type=text], input[type=password] {
     padding: 8px;
     width: 93%;
     margin-bottom: 16px;
     border: 2px solid #8B4513;
  }
  
  button{
       padding: 8px;
       width: 100%;
       margin-bottom: 16px;
       background-color: #8B4513;
       color: white;
       border: none;
       cursor:pointer ;
  }

  p {
   margin-top: 10px;
   text-align: center;
}
  
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        <form action="cek_login.php" method="post">
            <label for="name">Nama</label>
            <input type="text" id="name" name="user_name">

            <label for="password">Password</label>
            <input type="password" id="password" name="user_pass">

            <button type="submit">Masuk</button>
            <button type="button" onclick="window.location.href='index.php'">Skip (Guest Mode)</button>
            
            <p>Belum punya akun? Klik <a href="register.php">register</a></p>
        </form>
    </div>
</body>
</html>
