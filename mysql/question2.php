<?php 

include('class/index.php'); 
$index = new index();
$data = $index->getQuestion2();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table, td, th {
  border: 1px solid;
}

table {
  width: 50%;
  border-collapse: collapse;
}
</style>
<body>
    <button style="margin:10px;"><a href="index.php">Back</a></button>
    <h2 style="margin:10px;">2. Display combined album sales per artist</h2>
    
    <table style="margin:10px;">
        <tr>
            <th>Artist</th>
            <th>Album</th>
            <th>Total Sale</th>
        </tr>
        <?php foreach($data as $val): ?>
          <tr>
            <td><?= $val['artist'] ?></td>
            <td><?= $val['album'] ?></td>
            <td style="text-align:center"><?= $val['total_sale'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>