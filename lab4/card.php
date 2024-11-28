<?php
    $dok = explode(',','spades,hearts,clubs,diams');
    $tam = explode(',','A,1,2,3,4,5,6,7,8,9,10,J,Q,K');
    $deck = [];
    foreach($tam as $t) {
        foreach($dok as $d) {
            $deck[] = ['tam'=>$t, 'dok'=>$d];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poker</title>
    <style>
        .spades,.clubs {
            color :black;
        }
        .hearts,.diams {
            color :red;
        }
    </style>
</head>
<body>
    <h1>ไพ่ที่ได้</h1>
<?php
    $index1 = rand(1, count($deck)) - 1;
    $card1 = $deck[$index1];
    unset($deck[$index1]); //unset ใช้ลบ Array ออกจากกลุ่ม
    sort($deck); //sort ใช้จัด???
    $index2 = rand(0, count($deck) -1);
    $card2 = $deck[$index2];
    // print_r($card1); ทดลอง
    // print_r($card2); ทดลอง
?>
<h1>
    <span class="<?php echo $card1['dok']; ?>">
        <?php echo $card1['tam'].'&'.$card1['dok'].';'; ?>
    </span>
    +
    <span class="<?php echo $card2['dok']; ?>">
        <?php echo "{$card2['tam']}&{$card2['dok']};"; ?>
    </span>
</h1>
</body>
</html>