<!DOCTYPE html>
<html lang="en">
<head>
    <title>Voeg artikel toe</title>
</head>
<body>


    <?php
        include "nav.php";  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product = $_POST['product'];
            $prijs = $_POST['prijs'];
            $fabriek = $_POST['fabriek'];
            $product = strtolower($product);

            include "database.php";
            $db = new database();

            $sql = "INSERT INTO product VALUES(NULL, :product, :prijs, :fabriek)";
            $placeholder = [
                'product'=>$product,
                'prijs'=>$prijs,
                'fabriek'=>$fabriek
            ];

            $db->insert($sql,$placeholder,"index.php");

            
        }
    ?>

    <form action="add_artikel.php" method="post">
        <label for="product">product</label><br>
        <input type="text" required name="product"><br>
        <label for="prijs">prijs</label><br>
        <input type="number" required name="prijs" min="0" step=".01"><br>
        <label for="fabriek">fabriek</label><br>
        <select required name="fabriek">
            <option value="1">general shop</option>
            <option value="2">snacks bars</option>
            <option value="3">resteuranters</option>
        </select><br>
        <input type="submit" value="Voeg artikel toe">
    </form>
</body>
</html>