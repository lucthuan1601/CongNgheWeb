<?php
    $file_name = "65HTTT_Danh_sach_diem_danh.csv";
    $file_handle = null;
    $error = null;
    $hearders = [];
    $data = [];
    $is_hearder = true;
    try{
        if (!file_exists($file_name)) {
             throw new Exception("Lỗi: Không tìm thấy tệp '$file_name'");
        }
        $file_handle = fopen($file_name,"r");
        if($file_handle===false){
            throw new Exception("error:not open file ");
        }
        while(($row = fgetcsv($file_handle))!=false){
            if($is_hearder){
                $hearders = $row;
                $is_hearder = false;
            } else{
                $data[] = $row;
            }
        }   
    } catch(Exception $e){
        $error = $e->getMessage();
    } finally{
        if($file_handle){
            fclose($file_handle);
        }
    }
?>
<?php
class Database {
    private $host = '127.0.0.1';
    private $db = 'TaiKhoanSinhVien';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';

    public $pdo = null;
    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try{
            $this->pdo= new PDO ($dsn,$this->user,$this->pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch(PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

} 
class TaiKhoan {
    private $db = null;
    public function __construct($db) { 
        $this->db = $db->pdo;
    }
    public function addTaiKhoan ($username,$password,$lastname,$firstname,$city,$email,$course1){
        $sql = $this->db->prepare("insert into tbTaiKhoan (username,password,lastname,firstname,city,email,course1)
        Values(:username,:password,:lastname,:firstname,:city,:email,:course1) ");
        $sql->execute([
            'username'=>$username,
            'password'=>$password,
            'lastname'=>$lastname,
            'firstname'=>$firstname,
            'city'=>$city,
            'email'=>$email,
            'course1'=>$course1]);
    }
    public function getTaiKhoan (){
        $sql = $this->db->query("select*from tbTaiKhoan");
        return $sql->fetchAll();
    }
     
}
     if(!empty($data) && !$error){
        try {  
            $db = new Database();
            $taikhoan = new TaiKhoan($db);
            foreach ($data as $id => $row) {
                if(count($row)>=7){
                    $taikhoan->addTaiKhoan(
                        $row[0],
                        $row[1],
                        $row[2],    
                        $row[3],
                        $row[4],
                        $row[5],
                        $row[6],
                    );
                }
            }
            echo "Thêm dữ liệu thành công";
        }catch(Exception $e){
            echo $e->getMessage();
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Làm việc với file</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="title text-center">
            <h2 class="mb-4">Dữ liệu sinh viên</h2>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <strong>Thông báo lỗi:</strong> <?php echo htmlspecialchars($error) ?>
            </div>
        <?php elseif(!empty($data)): ?>
            <div>
                <h3 class="mb-3">Nội dung tệp (<?php echo htmlspecialchars($file_name); ?>)</h3>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <?php foreach($hearders as $header): ?>
                                    <th><?php echo htmlspecialchars($header)?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row ): ?>
                            <tr>
                                <?php foreach($row as $key => $cell): ?>
                                    <td><?php echo htmlspecialchars($cell) ?></td>       
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Không thể tải tệp hoặc tệp không có dữ liệu.
            </div>
        <?php endif?>
    </div>
</body>
</body>
</html>