<?php
include "nav.php";
include "database.php";
//bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
$db = new database;
$sql = $db->select("SELECT  id, product, prijs FROM product ORDER BY fabriek_id, prijs DESC",[]);
$columns = array_keys($sql[0]);
$row_data = array_values($sql);
?>
<head>
    <title>Homepage</title>
</head>
<table border 1px solid>
<tr>
<?php 

if(isset($_SESSION["id"])){
  
}?>

    <?php
        foreach ($columns as $column) {
          echo "<th><strong> $column </strong></th>";
        }
        ?><th><strong> Option </strong></th><?php
    foreach($row_data as $rows){
              echo "<tr>";
    foreach($rows as $data){
       echo "<td>$data</td>";
    }?>
        <td>
          <button onclick="return confirm('are you sure you want to edit this?');" class = "edit"><a  href="edit.php?product_id=<?php echo $rows['id']?>">edit</a></button>
          <button onclick="return confirm('are you sure you want to delete this?');"  class = "delete"><a href="delete.php?id=<?php echo $rows['id']?>" >delete</a></button>
        </td>
  </tr>
<?php } ?>
</tr>
</table>