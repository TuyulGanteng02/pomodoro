<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>body, html {
        margin: 0;
        height: 100%;
      }
      
      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-color: #8B4513;
      }
      
      .circle {
         position:absolute; 
         top:-50px; 
         left:-50px; 
         width:500px; 
         height:500px; 
         border-radius:250px;  
         background-color:#D2691E;
      }
      
      .form-container {
          z-index :2 ;
      }
      
      h1{
       color:white ;
       text-align:center ;
       padding-bottom :20px ;
      }
      input[type=text], input[type=password]{
       width :100% ;
       padding :12px ;
       margin :8px auto ;  
       display:inline-block ;   
       border:none ;   
       box-sizing:border-box ;   
      }
      button{
       width :100% ;    
       padding :14px ;    
       margin-top :10 px ;    
       color:white ;    
       cursor:pointer ;     
       background-color:#DAA520 ;
      }
      p {
        margin-top: 10px;
        text-align: center;
      }
      </style>
</head>
<body>
    <div class="container">
        <div class="circle"></div>
        <div class="form-container">
            <h1>REGISTER</h1>
            <form action="proses-register.php" method="post">
                <input type="text" id="name" name="name" placeholder="Username">
                <input type="password" id="password" name="password" placeholder ="Password">
                <button type ="submit" onClick="return alert('Berhasil registrasi')">Register</button>

                <p>Sudah Punya Akun? Klik <a href="login.php">Login</a></p>
            </form> 
        </div> 
    </div> 
</body>
</html>
