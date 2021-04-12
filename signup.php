<!DOCTYPE html>
<html lang="en">
<head>
    <title>signup</title>
</head>
<body>


    <?php
        include "nav.php";  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_repeat = $_POST['password_repeat'];


            include "database.php";
            $db = new database;

            $sql = "INSERT INTO medewerker VALUES(null, :username, :password)";
            $placeholder = [
                'username'=>$username,
                'password'=>password_hash($password, PASSWORD_DEFAULT)
            ];

            $db->insert($sql,$placeholder,"index.php");
        }
    ?>

    <form action="signup.php" method="post">
        <label for="username">username</label><br>
        <input type="text" name="username" required><br>
        <label for="password">password</label><br>
        <input type="password" name="password"required><br>
        <label for="password repeat">password repeat</label><br>
        <input type="password" name="password_repeat" required><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>