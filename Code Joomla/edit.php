<!DOCTYPE html>
<html>
<head>
	<title>Sửa sinh viên</title>
	<style type="text/css">
		body { font-family: Arial, Helvetica, sans-serif; }
		form { border: 3px solid #f1f1f1; }
		input[type=text], input[type=email], input[type=tel] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
		button { background-color: #008CBA; color: #fff; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
		button:hover { opacity: 0.8; }
		.cancelbtn { width: auto; padding: 10px 18px; background-color: #f44336; }
		.imgcontainer { text-align: center; margin: 24px 0 12px 0; }
		img.avatar { width: 40%; border-radius: 50%; }
		.container { padding: 16px; }
		span.psw { float: right; padding-top: 16px; }
	</style>
</head>
<body>
	<div class="imgcontainer">
		<img src="avatar.png" alt="Avatar" class="avatar">
	</div>
	<h2>Sửa sinh viên</h2>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "joomla3";
        // Tạo kết nối đến cơ sở dữ liệu
		$conn = mysqli_connect($servername, $username, $password, $dbname);
	
		// Kiểm tra kết nối
		if (!$conn) {
			die("Kết nối thất bại: " . mysqli_connect_error());
		}

		$id = $_GET['id'];
		// Lấy thông tin sinh viên theo ID
		$sql = "SELECT * FROM students WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		// Kiểm tra kết quả trả về
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
	?>
	<form method="POST">
		<div class="container">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<label><b>Mã số sinh viên</b></label>
			<input type="text" placeholder="Nhập mã số sinh viên" name="mssv" value="<?php echo $row['mssv']; ?>" required>
			<label><b>Họ tên</b></label>
			<input type="text" placeholder="Nhập họ tên" name="name" value="<?php echo $row['name']; ?>" required>
			<label><b>Email</b></label>
			<input type="email" placeholder="Nhập email" name="email" value="<?php echo $row['email']; ?>" required>
			<label><b>Lớp</b></label>
			<input type="text" placeholder="Nhập lớp" name="class" value="<?php echo $row['class']; ?>" required>
			<button type="submit" name="update">Cập nhật thông tin</button>
			<a href="index.php" class="cancelbtn">Hủy bỏ</a>
		</div>
	</form>
	<?php } else { ?>
	<div class="container">
		<p>Không tìm thấy sinh viên có ID là <?php echo $id; ?>.</p>
		<a href="index.php">Quay lại</a>
	</div>
	<?php } ?>

    <?php
		if(isset($_POST["update"])){
			// Lấy thông tin sinh viên từ form
			$id = $_POST['id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$class = $_POST['class'];
			// Cập nhật thông tin sinh viên vào cơ sở dữ liệu
			$sql = "UPDATE students SET name='$name', email='$email', class='$class' WHERE id='$id'";
			if (mysqli_query($conn, $sql)) {
				header("Location: http://localhost:8080/joomla3/index.php/vi/sinh-via-n");
				exit;
			} else {
				echo "Lỗi: " . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
    ?>
</body>
</html>