<?php
    $file_name = "Quiz.txt";
    $file_handle = null;
    $error = null;
    try{
        $file_handle = fopen($file_name,"r");
        $file_size = filesize("$file_name");
        $file_content = fgetc( $file_handle );
        if($file_handle===false){
            throw new Exception("error:not open file ");
        }
    } catch(Exception $e){
        $error = $e->getMessage();
    }
?>

<?php
class Database {
    private $host = '127.0.0.1';
    private $db = 'CauHoiTracNghiem';
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
?>
<?php

class QuizManager {
    private $pdo;

    public function __construct(Database $db) {
        $this->pdo = $db->pdo;
    }
    public function addQuestion($questionText, $correctAnswers, $questionType = 'SINGLE') {
        $stmt = $this->pdo->prepare("INSERT INTO tbQuestion (QuestionText, CorrectAnswerLetters, QuestionType) VALUES (:text, :answers, :type)");
        $stmt->execute([
            'text' => $questionText,
            'answers' => $correctAnswers,
            'type' => $questionType
        ]);
        // Trả về ID vừa được chèn
        return $this->pdo->lastInsertId();
    }
    public function addOption($questionId, $optionLetter, $optionText) {
        $stmt = $this->pdo->prepare("INSERT INTO tbOption (QuestionID, OptionLetter, OptionText) VALUES (:qid, :letter, :text)");
        $stmt->execute([
            'qid' => $questionId,
            'letter' => $optionLetter,
            'text' => $optionText
        ]);
    }
}
?>
<?php
    $file_name = "Quiz.txt";
    $error = null;
    $file_content = '';
    try{
        $file_content = file_get_contents($file_name);
        if($file_content === false){
            throw new \Exception('Lỗi:Không thể đọc được tệp');
        } 
        $pattern = '/(.+?)\s*(A\..+?)\s*(B\..+?)\s*(C\..+?)\s*(D\..+?)\s*ANSWER:\s*([A-D,]+)/s';
        $matches = []; 
        $num_matches = preg_match_all($pattern, $file_content, $matches, PREG_SET_ORDER);  
        if ($num_matches === 0) {
            throw new \Exception('Lỗi: Không tìm thấy định dạng câu hỏi hợp lệ trong tệp.');
        } elseif ($num_matches === false) {
            throw new \Exception('Lỗi: Lỗi khi thực thi biểu thức chính quy.');
        }
        $db = new Database();
        $quiz = new QuizManager($db);
        foreach ($matches as $matche){
            $questionText = trim($matche['1']);
            $questionTexts = [
                'A' => trim(substr($matche['2'],2)),
                'B'=> trim(substr($matche['3'],2)),
                'C'=> trim(substr($matche['4'],2)),
                'D'=> trim(substr($matche['5'],2))
            ];
            $questionAnwer = strtoupper(trim($matche[6]));
            $questionType = (strpos($questionAnwer, ',') !== false) ? 'MULTI' : 'SINGLE';
            $questionID = $quiz->addQuestion($questionText, $questionAnwer, $questionType);
            foreach($questionTexts as $letter => $text) {
                if($text){
                    $quiz->addOption($questionID,$letter,$text);
                }
            }
        }
        echo 'Thêm dữ liệu thành công';
    } catch(PDOException $e){
        throw new \Exception($e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Làm việc với file</title>
</head>
<body>
    <div class="title"><h2>Câu hỏi trắc nghiệm</h2></div>
    <?php if ($error): ?>
        <div>
            <strong>thông báo lỗi:<?php echo htmlspecialchars($error) ?></strong>
        </div>
    <?php elseif($file_handle): ?>
        <div>
            <h3>Nội dung tệp</h3>
            <?php
            while(!feof($file_handle)){
                $line = fgets($file_handle);
                echo $line.'<br>';
            }
            fclose($file_handle);
            ?>
        </div>
    <?php else: ?>
        <div>Không thể tải tệp</div>
    <?php endif?>
</body>
</html>