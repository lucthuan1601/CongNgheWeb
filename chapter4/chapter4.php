<?php
    $host = '127.0.0.1';
    $dbname = 'cse485_web';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    try{
        $pdo = new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Kết nối thành công";
    } catch(PDOException $e){
        echo "Lỗi kết nối".$e->getMessage();    
    }
    if(isset($_POST['submit'])){
        $ten = $_POST['ten_sinh_vien'];
        $email = $_POST['email'];
        $sql = "insert into SinhVien (ten_sinh_vien,email) Values (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$ten,$email]);
        header('location:chapter4.php');
        exit;
    }
    $sql_select = "select * from SinhVien order by ngay_tao DESC";
    $stmt_select = $pdo->query($sql_select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHT Chương 4 - Website hướng dữ liệu</title>
   <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7f9; 
        color: #333;
        margin: 20px;
        padding: 0;
    }
    h2 {
        color: #007bff; 
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
        margin-top: 30px;
    }
    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex; 
        gap: 15px; 
        align-items: center;
        flex-wrap: wrap; 
    }
    label {
        font-weight: bold;
        color: #555;
    }

    input[type="text"], input[type="email"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        flex-grow: 1; 
        max-width: 250px;
    }
    button[type="submit"] {
        background-color: #28a745; 
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease; 
        font-weight: bold;
    }

    button[type="submit"]:hover {
        background-color: #218838;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden; 
    }
    th, td {
        border: 1px solid #e0e0e0; 
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color: #007bff; 
        color: white;
        font-weight: 600;
        text-transform: uppercase;
    }
    tr:nth-child(even) {
        background-color: #f8f8f8;
    }
    tr:hover {
        background-color: #e9ecef;
    }
    td:nth-child(1) {
        text-align: center;
        font-weight: bold;
    }
    td:nth-child(4) {
        font-style: italic;
        color: #6c757d;
        font-size: 0.9em;
    }

</style>
</head>
<body>
<h2>Thêm Sinh Viên Mới (Chủ đề 4.3)</h2>

<form action="chapter4.php" method="POST">
<label for="">Tên sinh viên:</label> <input type="text" name="ten_sinh_vien" required>
<label for="">Email:</label> <input type="email" name="email" required>
<button type="submit" name="submit">Thêm</button>
</form>

<h2>Danh Sách Sinh Viên (Chủ đề 4.2)</h2>
<table>
<tr>
<th>ID</th>
<th>Tên Sinh Viên</th>
<th>Email</th>
<th>Ngày Tạo</th>
</tr>
<?php
// TODO 9: Dùng vòng lặp (ví dụ: while) để duyệt qua kết quả
while($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) :
    echo "<tr>"; 
        echo "<td>".htmlspecialchars($row['id'])."</td>";
        echo "<td>".htmlspecialchars($row['ten_sinh_vien'])."</td>";
        echo "<td>".htmlspecialchars($row['email'])."</td>";
        echo "<td>".htmlspecialchars($row['ngay_tao'])."</td>";
    echo "</tr>";
endwhile;
?>
</table>
</body>
</html>