<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>PHT Chương 5 - MVC</title>
<style>
table { width: 100%; border-collapse: collapse; }
th, td { border: 1px solid #ddd; padding: 8px; }
th { background-color: #f2f2f2; }
</style>
</head>
<body>
<h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>
<form action="index.php" method="post">
<div>
<label for="">Tên sinh viên</label>
<br>
<input type="text" name="ten_sinh_vien">
</div>
<div><label for="">Email</label>
<br>
<input type="email" name ="email"></div>
<br>
<button type="submit" name="submit">Thêm sinh viên</button>
</form>
<h2>Danh Sách Sinh Viên (Kiến trúc MVC)</h2>
<table>
<tr>
<th>ID</th>
<th>Tên Sinh Viên</th>
<th>Email</th>
<th>Ngày Tạo</th>
</tr><?php
foreach ($danh_sach_sv as $sinhvien ):
    echo "<tr>";
    echo "<td>".htmlspecialchars($sinhvien["id"])."</td>";
    echo "<td>".htmlspecialchars($sinhvien["ten_sinh_vien"])."</td>";
    echo "<td>".htmlspecialchars($sinhvien["email"])."</td>";
    echo "<td>".htmlspecialchars($sinhvien["ngay_tao"])."</td>";
    echo "</tr>";
endforeach;
?>
</table>
</body>
</html>