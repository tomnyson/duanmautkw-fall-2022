<?php
class reportController {
    public $conn;
    function __construct() {
        try {
            $connectString = "mysql:host=localhost;dbname=teachPhp1";
            $conn = new PDO($connectString, "root", "");
            $this->conn = $conn;
        } catch (Exception $e) {
            die('connect mysql failed');
        }
    }
    public function getReportByCategory() {
        $query = "select category.name, count(*) from cars inner join category where cars.categoryId = category.id group by categoryId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([]);
        $rows = $stmt->fetchAll();
        $array = array(
            array('danh mục', 'số lượng'), 
        );
        foreach ($rows as $row) {
            array_push(
                $array,
                array($row[0], intval($row[1]))
            );
        }
        return json_encode($array);
    }
}

$report = new reportController(); 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] || '';
    switch ($action) {
        case 'report':
            $array = array(
                array('Task', 'Hours per Day'),
                array('work', 7),
                array('Commute',2),
                array('Watch', 3),
                array('Sleep', 6),
               );
            echo $report->getReportByCategory();
            break;
            default:
            echo json_encode(array('error'=>'invalid action'));
    }
    // The request is using the POST method
}