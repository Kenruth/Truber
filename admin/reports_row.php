<?php 
	include 'includes/session.php';

	    $type = $_POST['type'];
		$startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

		$conn = $pdo->open();

        if ($type =='trips'){
                $stmt = $conn->prepare("SELECT * FROM booking WHERE book_date BETWEEN :startDate AND :endDate");
                $stmt->execute(['startDate'=>$startDate, 'endDate'=>$endDate]);
                $row = $stmt->fetch();
                $row['type']= 'type';

                $pdo->close();

        }
        if ($type =='trips'){
            $stmt = $conn->prepare("SELECT * FROM booking WHERE book_date BETWEEN :startDate AND :endDate");
            $stmt->execute(['startDate'=>$startDate, 'endDate'=>$endDate]);
            $row = $stmt->fetch();

            $pdo->close();

        }

        echo json_encode($row);
?>