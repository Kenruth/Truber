<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){

        $reg_number = $_POST['reg_number'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $model = $_POST['model'];
        $password = $_POST['password'];
        //$driverID = $_POST['id'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM vehicle WHERE id=:id");
		$stmt->execute(['id'=>$admin['id']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Vehicle Already Exists';
		}
		else{
			$now = date('Y-m-d');
			try{
				$stmt = $conn->prepare("INSERT INTO vehicle (reg_number, type, name, driver_id, model) VALUES (  :reg_number, :type, :name, :driver_id, :model)");
				$stmt->execute(['reg_number'=>$reg_number, 'type'=>$type, 'name'=>$name, 'driver_id'=>$admin['id'], 'model'=>$model]);
				$_SESSION['success'] = 'Vehicle added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up vehicle form first';
	}

	header('location:vehicles.php');

?>