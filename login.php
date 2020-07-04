
<?php
echo'<link rel="stylesheet" href="css/style.css" type="text/css">';
session_start();

$Servername = "localhost";
$Username = "root";
$Password = "";
$dbName= "espace_membre";



if (isset($_POST['forminscription']))
{
     if(!empty($_POST['nom']) AND  !empty($_POST['prénom']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['repeatpassword']))
     {
         $name = htmlspecialchars (trim ($_POST['nom']));
         $prénom = htmlspecialchars ($_POST['prénom']);
         $mail = htmlspecialchars ($_POST['email']);
         $mdp = sha1 ($_POST['password']);
         $mdp2 = sha1 ($_POST['repeatpassword']);

         if ($mdp == $mdp2)
         {
            $conn = mysqli_connect($Servername,$Username,$Password,$dbName) or die('error');
            mysql_select_db('espace_membre');
            $query = mysql_query("INSERT INTO membre VALUES('','$name','$mail','$mdp')");
            die ("inscription terminée");
            
         }
         else  
         {
            echo "code";
             $erreur = "vos mot de passe ne correspondent pas !";
         }
     }
     else
     {
         $erreur = "tout les champs doivent étre  completés !";
     }
}




?>

<h2 class="inscr">inscription</h2>
<br /> 
<form action="login.php" method= "post">
    <table>
        <div class= "form-group">
            <label for="nom">Nom</label>
            <input type="text" name= "nom" placeholder="Entrer votre nom" id="nom">
        </div>
        <div class= "form-group">
            <label for="prénom">prébom</label>
            <input type="text" name= "prénom" placeholder="Entrer votre prénom" id="prénom">
        </div>
        <div class= "form-group">
            <label for="email">Email</label>
            <input type="email" name= "email" placeholder="Entrer votre email" id="email">
        </div>
        <div class= "form-group">
            <label for="passe">mot de passe</label>
            <input type="password" name= "password" placeholder="Entrer votre mot de passe" id="password">
        </div>
        <div class= "form-group">
            <label for="confpasse">repetez votre motpasse</label>
            <input type="password" name= "repeatpassword" placeholder="Entrer votre mot de passe" id="repeatpassword">
        </div>
        <br />
        <div class= "form-group">
            <button type= "submit" name= "forminscription" value="s'insrire" class="btn btn">valider</button>

        </div>
        
    </table>
    </form>
    <?php
    if (isset($erreur))
    {
        echo '<font color = "red"> '.$erreur. "<font/>";
    }

    ?>



 



