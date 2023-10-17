<?php 

include('class/index.php'); 
$index = new Index();
$data = [];
if(@$_POST['artist']){
  $data = $index->getQuestion5($_POST['artist']);
}
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
    <div style="margin:10px;">
    <form action="question5.php" method="post">
      <label>Select Artist:</label>
      <input type="text" name="artist" value="<?= @$_POST['artist'] ?>">
      <input type="submit">
    </form>
    </div>
    <table  style="margin:10px;">
        <tr>
            <th>Album Name</th>
        </tr>
        <?php if(empty($data)): ?>
        <tr>
            <td style="text-align:center">Empty field</td>
        </tr>
        <?php else: ?>
        <?php foreach($data as $val): ?>
        <tr>
            <td><?= $val['album'] ?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>