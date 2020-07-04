<?php
session_start();
if(isset($_POST['submit']))
{
    $username = $_POST["uname"];
    $password = $_POST["psw"];

    if($username&&$password)
    {
        $connect = mysql_connet('localhost','root','');
        mysql_select_db('espace_membre');

        $query = mysql_query("SELECT * FROM member WHERE pseudo ='$username' && motdepasse = '$password'");
        $rows =mysql_num_rows($query);
        if($rows==1)
        {
            $SESSION['psuedo'] = $username;
            header('Location:membre.php');

        }else echo "psuedo ou passeword incorrect";

    }else echo"veuillez saisir tous les champs";
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Login Form</h2>

<form action="connexion.php" method="post">
  <!-- <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div> -->

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

    
</body>
</html>

 



