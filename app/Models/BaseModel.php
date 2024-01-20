<?php 
namespace App\Models;

use PDO;
class BaseModel {
    protected $conn;
    protected $sqlBuilder ="";
    protected $tableName;
    public function __construct()
    {
        $host = HOSTNAME;
        $dbname = DBNAME;
        $username = USERNAME;
        $password = PASSWORD;
        try {
            $this->conn = new PDO("mysql:host=$host; dbname=$dbname; chaset=utf8",$username,$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
            echo "Lỗi kết nối dữ liệu" . $e->getMessage();
        }
    }
    //Phương thức lấy ra toàn bộ dữ liệu của bảng
    public static function all(){
        $model = new static;
        $model->sqlBuilder = "SELECT*FROM $model->tableName";
        //Chuẩn bị 
        $stmt = $model->conn->prepare($model->sqlBuilder);
        //Thực thi
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}