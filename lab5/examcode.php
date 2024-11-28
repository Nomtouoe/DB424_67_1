<?php
$server = 'db403-mysql';
$username = 'root';
$password = 'P@ssw0rd';
$db = 'northwind';
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_errno) {
    die($conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL First Connect</title>
<!--พื้นที่เรียกใช้ css เพื่อตบแต่ง-->
<link rel="ตบแต่งเว็บ" href="ตบแต่งเว็บ.css">

<!--ใช้ style ตบแต่งให้สวยงามเฉยๆ-->
<style>
    h3 {color: white;}
    td {color: yellow;}
    tr {color:aqua}
   body {
    background-color: black;
   }
   
</style>
<!---->

</head>
<body> 
<div id="page-transition"></div>
<a href="lobbyscreen.html">
    <button>back to lobby</button>
</a>
<!--ข้อ 1-->
<h3>1) เรียกดูชื่อสินค้าที่เลิกผลิตแล้ว แต่ยังมีจำนวนสินค้าคงเหลือค้างอยู่ใน Stock</h3>
    <table>
<tr><th>ProductName</th><th>UnitsInStock</th></tr>
<?php
$sql = 'select ProductName, UnitsInStock
        from products
        WHERE Discontinued=1 AND UnitsInStock>0;';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ProductName']}</td>";
    echo "<td>{$row['UnitsInStock']}</td>";
    echo '</tr>';
}
echo '</table>';

?>
<!--ข้อ 2-->
<h3>2) นับจำนวนสินค้าที่มีในแต่ละหมวดหมู่โดยไม่รวมสินค้าที่มีสถานะการเลิกผลิตและจัดเรียงผลลัพธ์ตาม</h3>
    <table>
<tr><th>CategoryID</th><th>ProductID</th></tr>
<?php
$sql = 'select ProductName, UnitPrice
        from products
        where UnitPrice > 50
        order by UnitPrice desc';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ProductName']}</td>";
    echo "<td>{$row['UnitPrice']}</td>";
    echo '</tr>';
}
echo '</table>';

?>
<!--ข้อ 3-->
<h3>3) ลูกค้าจากประเทศ France มาจากเมือง (city) อะไรบ้าง</h3>
    <table>
<tr><th>city</th><th>country</th></tr>
<?php
$sql = 'select distinct city, country
        from customers
        where country = "France";';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['city']}</td>";
    echo "<td>{$row['country']}</td>";
    echo '</tr>';
}
echo '</table>';

?>

<!--ข้อ 4-->
<h3>4) เรียกดูรายชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีชื่อขึ้นต้นด้วย a</h3>
    <table>
<tr><th>ContactName</th><th>CompanyName</th></tr>
<?php
$sql = 'select ContactName, CompanyName
        from customers
        where CompanyName LIKE "a%";';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ContactName']}</td>";
    echo "<td>{$row['CompanyName']}</td>";
    echo '</tr>';
}
echo '</table>';
?>

<!--ข้อ 5-->
<h3>5) เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่ชื่อลงท้ายว่า markets</h3>
    <table>
<tr><th>ContactName</th><th>CompanyName</th></tr>
<?php
$sql = 'select ContactName, CompanyName
        from customers
        where CompanyName LIKE "%markets";';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ContactName']}</td>";
    echo "<td>{$row['CompanyName']}</td>";
    echo '</tr>';
}
echo '</table>';
?>

<!--ข้อ 6-->
<h3>6) เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีตัวอักษร et อยู่ในชื่อบริษัท</h3>
    <table>
<tr><th>ContactName</th><th>CompanyName</th></tr>
<?php
$sql = 'select ContactName, CompanyName
        from customers
        where CompanyName LIKE "%et%";';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ContactName']}</td>";
    echo "<td>{$row['CompanyName']}</td>";
    echo '</tr>';
}
echo '</table>';
?>

<!--ข้อ 7-->
<h3>7) เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะชื่อบริษัทที่มีตัวอักษร e และ t
โดยมีตัวอักษร 1 ตัว คั่นกลางระหว่าง e และ t เช่น ect, ent, est</h3>
    <table>
<tr><th>ContactName</th><th>CompanyName</th></tr>
<?php
$sql = 'select ContactName, CompanyName
        from customers
        where CompanyName LIKE "%e_t%";';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ContactName']}</td>";
    echo "<td>{$row['CompanyName']}</td>";
    echo '</tr>';
}
echo '</table>';
?>

<!--ข้อ 8-->
<h3>8) เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีชื่อขึ้นต้นด้วยตัวอักษร b
และลงท้ายด้วย s</h3>
    <table>
<tr><th>ContactName</th><th>CompanyName</th></tr>
<?php
$sql = 'select ContactName, CompanyName
        from customers
        where CompanyName LIKE "b%s";';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ContactName']}</td>";
    echo "<td>{$row['CompanyName']}</td>";
    echo '</tr>';
}
echo '</table>';
?>

<!--ข้อ 9-->
<h3>9) รายชื่อสินค้าและราคาต่อหน่วย เฉพาะสินค้าที่มีราคาต่อหน่วยตั้งแต่ 20 ถึง 50</h3>
    <table>
<tr><th>ProductName</th><th>UnitPrice</th></tr>
<?php
$sql = 'select ProductName, UnitPrice
        from products
        where UnitPrice BETWEEN 20 AND 50;';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ProductName']}</td>";
    echo "<td>{$row['UnitPrice']}</td>";
    echo '</tr>';
}
echo '</table>';
?>

<!--ข้อ 10-->
<h3>10) จากตารางข้อมูลลูกค้า เรียกดูชื่อผู้ติดต่อ (ContactName), ตำแหน่งผู้ติดต่อ (ContactTitle), ประเทศ (Country)
โดยเรียกดูเฉพาะลูกค้าที่มีตำแหน่งเป็น Owner และอยู่ในประเทศ Mexico, Spain, France</h3>
    <table>
<tr><th>ProductName</th><th>UnitPrice</th></tr>
<?php
$sql = 'select ContactName, ContactTitle, Country
        from customers
        where ContactTitle="Owner"
        and (country="Mexico" OR country="Spain" OR country="France");';
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['ContactName']}</td>";
    echo "<td>{$row['ContactTitle']}</td>";
    echo "<td>{$row['Country']}</td>";
    echo '</tr>';
}
echo '</table>';
?>

<?php
$conn->close();
?>
</body>
</html>