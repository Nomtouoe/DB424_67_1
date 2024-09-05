<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dices Roller</title>
</head>
<body>
<?php
function shake($score = true) {
    $dice1 = rand(1, 6);
    $dice2 = rand(1, 6);
    return "2 Dices roll "
    . ($score ? "=> $dice1 + $dice2 " : '')
    . "=> ผลรวมคือ ". ($dice1 + $dice2);
}
?>
<h3>without score</h3>
<?php echo shake(false); ?>
<h3>with score</h3>
<?php echo shake(true); ?>
</body>
</html>