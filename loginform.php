<?php 
include "nav.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>loginform</title>
</head>
<body>

<?php
    include "database.php";
    $sql = "SELECT id, gebruikersnaam, wachtwoord FROM medewerker WHERE gebruikersnaam = :gebruikersnaam";
    if (isset($_POST['submit'])){
        $fields = ['gebruikersnaam', 'wachtwoord'];
        
        $error = false;

        foreach($fields as $field){
            if (!isset($_POST[$field]) || empty($_POST[$field])){
                $error = true;
            }
        }

        if(!$error){
            $username= $_POST['gebruikersnaam'];
            $wachtwoord= $_POST['wachtwoord'];

            $db = new database ();

            $db -> login($sql, $username, $wachtwoord, "index.php");
        }
    }
 ?> 
    <!-- Alles wat op de website wordt getoont, komt hiervandaan -->
    <!-- LET OP TYPE van de input fields!-->
    <form id='login' action='' method='post'>
		<p>Login</p><br>
		<input type="text" name="gebruikersnaam" placeholder="Username" required/><br>
		<input type="password" name="wachtwoord" placeholder="Password" required/><br>
		<input type='submit' name='submit' value='submit' />
    </form>
</body>
</html>
</html>