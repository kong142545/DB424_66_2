<?php
error_reporting(1);
$servername = "keeplearning";
$database = "northwind";
$username = "root";
$password = "keep1234";

try { 
$conn = new mysqli($servername, $username, $password, $database);
}
catch (Exception $e) {
    die ("Connection Failed");
}
echo "Connected successfully";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    echo "<table>";
    try {
        $result = $conn ->query ($sql);
        echo "<table>"; 
    
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['CategoryID']}</td>";
    echo "<td>{$row['CategoryName']}</td>";
    echo "</tr>";
}
echo "</table>";
}
catch (Exception $e) {
    echo 'Something went wrong.';
}
    ?>
<ol> 
    <li>
        <p>แสดงจำนวนวันเฉลี่ยที่ใช้ในการขนส่งสินค้านับขากวันที่มีการสั่งสินค้าถึงวันที่ส่งสินค้า (เศษของวันนับเป็น 1 วัน) เรียงลำดับจากมากไปหาน้อย </p> 
        <table>
<?php
$sql = 'SELECT ShipCountry, AVG(DATEDIFF(ShippedDate, OrderDate))avgtotel, CEILING(AVG(DATEDIFF(ShippedDate, OrderDate)))avgdate
FROM orders
GROUP BY ShipCountry
ORDER BY CEILING(AVG(DATEDIFF(ShippedDate, OrderDate))) DESC';

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['ShipCountry']}</td>";
    echo "<td>{$row['avgtotel']}</td>";
    echo "<td>{$row['avgdate']}</td>";
    echo "</tr>";
}


?>
</table>
</li>

<li>
        <p>แสดงจำนวนรายการสั่งซื้อของแต่ละเดือน ในปี 1995 </p> 
        <table>
<?php
$sql = 'SELECT month(OrderDate)moth, COUNT(*) AS `COUNT Order`
FROM `orders`
WHERE YEAR(OrderDate) = 1995
group by month(OrderDate)';

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['moth']}</td>";
    echo "<td>{$row['COUNT Order']}</td>";
    echo "</tr>";
}

?>
</table>
</li>

<li>
        <p>ค้นหาว่าประเทศใดมีลูกค้ามากที่สุด </p> 
        <table>
<?php
$sql = 'SELECT Country , COUNT(Country) AS `COUNT Country`
FROM `customers`
GROUP BY Country
ORDER BY `COUNT Country` DESC';

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['Country']}</td>";
    echo "<td>{$row['COUNT Country']}</td>";
    echo "</tr>";
}

?>
</table>
</li>




<li>
        <p>ยอดสั่งซื้อสินค้าแต่ละหมวด แยกตามประเทศของลูกค้า </p> 
        <table>
            <th> CategoryName</th>
            <th> Country</th>
            <th> Orders</th>

<?php
$sql = 'SELECT CategoryName , Country, COUNT(*)`#Orders`
FROM categories G
	JOIN products P ON G.CategoryID = P.CategoryID
    JOIN `order details` D ON P.ProductID = D.ProductID
    JOIN orders O ON D.OrderID = O.OrderID
    JOIN customers C ON O.CustomerID = C.CustomerID
GROUP BY CategoryName , Country';

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['CategoryName']}</td>";
    echo "<td>{$row['Country']}</td>";
    echo "<td>{$row['#Orders']}</td>";
    echo "</tr>";
}

?>
</table>
</li>

</body>
</html>