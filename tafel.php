<?php
include "nav.php";
include "database.php";
//bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
$db = new database;
$sql = $db->select("SELECT  id, tafel FROM tafel",[]);
$columns = array_keys($sql[0]);
$row_data = array_values($sql);
?>
<head>
    <title>tafel</title>
</head>
<table border 1px solid>
<tr>

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
          <button class = "tafel"><a  href="tafel_factuur.php?tafel_id=<?php echo $rows['id']?>">factuur</a></button>
        </td>
  </tr>
<?php } ?>
</tr>
</table>