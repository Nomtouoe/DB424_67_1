<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search product by category</title>
</head>
<body>
  <div class="CategoryName"></div>
  <div class="CategoryID"></div>
  <form>
  <label for="category">
  <select name="category" id="category"></select>

      
<?php 
// ทำข้อสอบหลังจาก comment ของแต่ละข้อ
// 1. (2 คะแนน) เขียนคำสั่ง php เพื่อติดต่อฐานข้อมูล northwind
$servername = "db403-mysql";
$database = "northwind";
$username = "root";
$password = "P@ssw0rd";

$conn = new mysqli(
  'db403-mysql',
  'root',
  'P@ssw0rd',
  'northwind');
  if ($conn->connect_errno) {
    die($conn->connect_errno);
}

// 2. (3 คะแนน) เขียนคำสั่ง php เพื่อดึงข้อมูล CategoryName และ CategoryID จากตาราง categories
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 8;
$start = ($page - 1) * $limit;

$countQuery = "SELECT COUNT(*) AS total FROM categories";
$countResult = $conn->query($countQuery);
$row = $countResult->fetch_assoc();
$totalRecords = $row['total'];

//(ดึงข้อมูล)
$totalPages = ceil($totalRecords / $limit);

$query = "SELECT CategoryName, CategoryID
          FROM categories LIMIT $start, $limit";
$result = $conn->query($query);

//(แสดงผล)
if ($result->num_rows > 0) {
  echo '<table class="table table-sm table-bordered table-striped">
          <tr>
              <th>CategoryName</th>
              <th>CategoryID</th>
          </tr>';
  while($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{$row['CategoryName']}</td>";
    echo "<td>{$row['CategoryID']}</td>";
    echo '</tr>';
  }
  echo '</table>';
} else {
  echo "No records found.";
}
// 3. (5 คะแนน) เพิ่ม element option ใน element select เพื่อแสดงตัวเลือกเป็น CategoryName และค่าที่ได้เป็น CategoryID

// ตัวอย่างการเพิ่ม element options
// <option value="CategoryID">CategoryName</option>
?>
      </select>
    </label>
    </option>
    <input type="submit" value="Search" name="submit">
  </form>
</body>
</html>