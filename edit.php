<?php
    include "nav.php";         
    include "database.php";
    $db=new database();

    if(isset($_GET['product_id'])){
        $product = $db->select("SELECT * FROM product WHERE id = :product_id", ['product_id'=>$_GET['product_id']]); 
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $sql = "UPDATE product SET product=:product, prijs=:prijs, fabriek_id=:fabriek WHERE id=:product_id";
            
            
        $placeholder = [  
            'product'=>$_POST['product'],
            'prijs'=>$_POST['prijs'],
            'fabriek'=>$_POST['fabriek'],
            'product_id'=>$_POST['product_id']
        ];

                
        $db->edit_or_delete($sql, $placeholder, 'index.php');
    }
        ?>
    
        <form action="edit.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo isset($_GET['product_id']) ? $_GET['product_id'] : '' ?>"><br>
            <input type="text" name="product" placeholder="product" value="<?php echo isset($product) ? $product[0]['product'] : ''?>"><br>
            <input type="number" required name="prijs" min="0" step=".01"name="prijs" placeholder="prijs" value="<?php echo isset($product) ? $product[0]['prijs'] : ''?>"><br>
            <select required name="fabriek">
                <option value="1">general shop</option>
                <option value="2">snacks bars</option>
                <option value="3">resteuranters</option>
            </select><br>            
            <input type="submit" value="Edit">
        </form>

</form>
    
</body>
</html>