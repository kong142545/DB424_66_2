<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Fundamental 1</title>
</head>
<body>
<?php
$a = 10;
$b = 2.5;
$c = 'Hello';
$d = 'World';
$words = 'apple banana orange';
$space1 = strpos($words,' ');
$space2 = strpos($words,' ' , $space1 + 1);
?>
<h3>ผลการทำงานใน PHP </h3>
<pre>
$a = '<?php echo $a;?>';
$b = '<?=$b;?>';
$c = '<?PHP echo $c;?>';
$c = '<?PHP echo $c;?>'';
##########
$a + $b จะมีค่าเป็น <?PHP echo $a + $b;?>;
$c.' '.$d จะมีค่าเป็น <?PHP echo $c;?>;
##########
$words คำที่ 1 คือ <?php echo substr($words, 0, $space1 - 0);?> 
$words คำที่ 2 คือ <?php echo substr($words, $space1 +1, $space2 -($space1));?> 
$words คำที่ 3 คือ <?php echo substr($words,  ++$space2 );?> 
ตัวอักษรที่สุ่มได้จาก $words คือ "<?php echo substr ($words ,rand(0,strlen ($words)-1),1);?>"
</pre>
</body>
</html>