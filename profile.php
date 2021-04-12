<?php
include "nav.php";
include "database.php";
if(isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    //bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
    $db = new database;
    $sql = $db->select("SELECT id, gebruikersnaam FROM medewerker WHERE id = $id",[]);
    $columns = array_keys($sql[0]);
    $row_data = array_values($sql);
    ?>
    <head>
        <title>Profile</title>
    </head>
    <table border 1px solid>
    <tr>

        <?php
            foreach ($columns as $column) {
              echo "<th><strong> $column </strong></th>";
            }
            ?>
            <th><strong> Password </strong></th>
            <th><strong> EDIT </strong></th><?php
        foreach($row_data as $rows){
                  echo "<tr>";
        foreach($rows as $data){
           echo "<td>$data</td>";
        }?>
            <td>
              **********
            </td>
            <td>
              <button onclick="return confirm('are you sure you want to delete this?');" class = "edit"><a  href="edit_profile.php?medewerker_id=<?php echo $rows['id']?>">edit</a></button>
            </td>
      </tr>
    <?php } ?>
    </tr>
    </table>
<?php } 
else{
  header("location: index.php");
} ?>