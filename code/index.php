<?php  include('server.php'); ?>

<?php 
        if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $update = "";
                $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
				$error = array();

                if (count($error) == 0 ) {
                        $n = mysqli_fetch_array($record);
                        $name = $n['name'];
                        $address = $n['address'];
                }
        }
		
?>

<!DOCTYPE html>
<html>
<head>
        <title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background-color: #ffe0d9;">

<?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
                <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']);
                ?>
        </div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<h4 style="font-size: 40px;"><center> Simple Information Form </center></h4>

<table>
        <thead>
                <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th colspan="2">Action</th>
                </tr>
        </thead>
        
        <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                        </td>
                        <td>
                                <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                        </td>
                </tr>
        <?php } ?>
</table>

        <form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="input-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                </div>
                <div class="input-group">
				
				<?php if (isset($_GET['edit'])): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
				<?php else: ?>
				<button class="btn" type="submit" name="add" >Add</button>
				<?php endif ?>
				
                </div>
        </form>
</body>
</html>