<?php
    include "nav.php";         
    include "database.php";
    $db=new database();

    $sql = $db->select("SELECT product.product, product.prijs, reserveren.aantaal, tafel.tafel FROM reserveren INNER JOIN tafel ON reserveren.tafel_id = tafel.id  INNER JOIN product ON product.id = reserveren.product_id WHERE tafel.id = '1'",[]);
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