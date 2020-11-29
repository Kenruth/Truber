<?php 
	include 'includes/session.php';

$conn = $pdo->open();
	if(isset($_POST['id'])){
		$id = $_POST['id'];


		$stmt = $conn->prepare("SELECT * FROM vehicle,driver WHERE driver_id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		echo json_encode($row);
	}

//    if(isset($_POST['vehicle'])){
//        $id = $_POST['vehicle'];
//
//        $stmt = $conn->prepare("SELECT * FROM vehicle WHERE id=:id");
//        $stmt->execute(['id'=>$id]);
//        $row = $stmt->fetch();
//
//        echo json_encode($row);
//    }

    if(isset($_POST['v_id'])){
        $id = $_POST['v_id'];

        $stmt = $conn->prepare("SELECT * FROM vehicle WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch();
        echo json_encode($row);
    }

    if(isset($_POST['delete-id'])){
        $id = $_POST['delete-id'];

        try{

            $stmt = $conn->prepare("DELETE FROM vehicle WHERE id=:id");
            $stmt->execute(['id'=>$id]);

            $_SESSION['requested'] = 'Vehicle Successfully Deleted...';
            header('location: '.$_SERVER['HTTP_REFERER']);

        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
            header('location: '.$_SERVER['HTTP_REFERER']);
        }
    }

    if(isset($_POST['edit-id'])){
        $id = $_POST['edit-id'];
        $reg_number = $_POST['reg_number'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $model = $_POST['model'];

        try{

            $stmt = $conn->prepare("UPDATE vehicle SET reg_number=:reg_number,type=:type,name=:name,model=:model WHERE id=:id");
            $stmt->execute(['id'=>$id,'reg_number'=>$reg_number,'type'=>$type,'name'=>$name,'model'=>$model]);

            $_SESSION['requested'] = 'Vehicle Successfully Updated...';
            header('location: '.$_SERVER['HTTP_REFERER']);

        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
            header('location: '.$_SERVER['HTTP_REFERER']);
        }
    }

if(isset($_POST['driver_id'])){

    $reg_number = $_POST['reg_number'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $model = $_POST['model'];
    $driver_id = $_POST['driver_id'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM vehicle WHERE reg_number=:reg_number AND driver_id=:id");
    $stmt->execute(['id'=>$driver_id,'reg_number'=>$reg_number]);
    $row = $stmt->fetch();

    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Vehicle Already Exists';
    }
    else{
        $now = date('Y-m-d');
        try{
            $stmt = $conn->prepare("INSERT INTO vehicle (reg_number, type, name,model, driver_id) VALUES (  :reg_number, :type, :name, :model :driver_id)");
            $stmt->execute(['reg_number'=>$reg_number, 'type'=>$type, 'name'=>$name, 'model'=>$model,'driver_id'=>$driver_id]);
            $_SESSION['success'] = 'Vehicle added successfully';

        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();

        }
    }

    header('location: '.$_SERVER['HTTP_REFERER']);

}
$pdo->close();
?>