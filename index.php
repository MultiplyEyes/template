<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        // database class instance maken
        include 'database.php';
        $db = new database();

        $vestigingen = $db->select("SELECT id, eten FROM eten", []);

    ?>
    <form action="testie.php" method="post">
    <h3>Select city</h3>
        <select name="locatie" id="locatie">
            <?php foreach($vestigingen as $data){ ?>
                <option value="<?php echo $data['id']?>">
                    <?php echo $data['eten'] ?>
                </option>
            <?php } ?>
        </select><br>
    </form>

</body>
</html>