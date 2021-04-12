<?php
include "nav.php";
include "database.php";

//bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
$db = new database;
$sql = $db->select("SELECT  product.product, product.prijs, fabriek.fabriek, fabriek.locatie FROM product INNER JOIN fabriek ON product.fabriek_id=fabriek.id ORDER BY fabriek_id",[]);

$columns = array_keys($sql[0]);
$row_data = array_values($sql);
?>
<head>
    <title>JOIN</title>
</head>
<table class = "join" border 1px solid>
<tr>
    <?php
        foreach ($columns as $column) {
          echo "<th><strong> $column </strong></th>";
        }
    foreach($row_data as $rows){
              echo "<tr>";
    foreach($rows as $data){
       echo "<td>$data</td>";
    }?>
  </tr>
<?php } ?>
</tr>
</table>