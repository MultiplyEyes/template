<head><title>edit profile</title></head>
<?php
    include "nav.php";
    include "database.php";
    if(isset($_SESSION["id"])){

    $db=new database();

    if(isset($_GET['medewerker_id'])){
        $gebruiker = $db->select("SELECT * FROM medewerker WHERE id = :medewerker_id", ['medewerker_id'=>$_GET['medewerker_id']]); 
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $sql = "UPDATE medewerker SET gebruikersnaam=:gebruiker, wachtwoord=:wachtwoord WHERE id=:medewerker_id";


        $placeholder = [
            'medewerker_id'=>$_POST['medewerker_id'],
            'gebruiker'=>$_POST['gebruiker'],
            'wachtwoord'=>password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT)
        ];


        $db->edit_or_delete($sql, $placeholder, "profile.php");
    }
        ?>

        <form action="edit_profile.php" method="post">
            <input type="hidden" name="medewerker_id" value="<?php echo isset($_GET['medewerker_id']) ? $_GET['medewerker_id'] : '' ?>"><br>
            <input type="text" name="gebruiker" placeholder="gebruiker" value="<?php echo isset($gebruiker) ? $gebruiker[0]['gebruikersnaam'] : ''?>"><br>
            <input type="password" required name="wachtwoord" min="0" step=".01"name="wachtwoord" placeholder="wachtwoord" value="<?php echo isset($gebruiker) ? $gebruiker[0]['wachtwoord'] : ''?>"><br>
            <input type="submit" value="Edit">
        </form>
</form>
</body>
</html>
<?php }else{
    header("index.php");
}?>