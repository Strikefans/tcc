<?php 
        session_start();
        $db = mysqli_connect('localhost', 'root', '', 'crud');

        // initialize variables
        $name = "";
        $address = "";
        $id = 0;
        $update = "";
		$error = array();

        if (isset($_POST['add'])) {
                $name = mysqli_real_escape_string($db, $_POST['name']);
                $address = mysqli_real_escape_string($db, $_POST['address']);

				if (count($errors) == 0) {
                $query = "INSERT INTO info (name, address) VALUES ('$name', '$address')";
				mysqli_query($db, $query);
				
                $_SESSION['message'] = "Address saved"; 
                header('location: index.php');
				}
        }

		
		
		if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];

        mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		
        $_SESSION['message'] = "Address updated!"; 
        header('location: index.php');
		}
		
		if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: index.php');
}

?>