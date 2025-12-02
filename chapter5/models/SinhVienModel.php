<?php
    function getAllSinhVien ($pdo){
        $sql ="select * from SinhVien";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }  
    function addSinhVien ($pdo,$name,$email){
        $sql = "insert into SinhVien (ten_sinh_vien,email) values(?,?);";
        $stmt = $pdo->prepare(($sql));
        $stmt->execute([$name,$email]);
    }
?>