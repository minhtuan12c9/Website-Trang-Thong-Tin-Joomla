<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên</title>
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
	<h2>Thêm sinh viên</h2>
	<form method="POST">
		<div class="container">
            <label><b>Mã số sinh viên</b></label>
			<input type="text" placeholder="Nhập mã số sinh viên" name="mssv" required>
			<label><b>Họ tên</b></label>
			<input type="text" placeholder="Nhập họ tên" name="name" required>
			<label><b>Email</b></label>
			<input type="email" placeholder="Nhập email" name="email" required>
			<label><b>Lớp</b></label>
			<input type="text" placeholder="Nhập lớp" name="class" required>
			<button type="submit">Thêm sinh viên</button>
			<a href="index.php" class="cancelbtn">Hủy bỏ</a>
		</div>
	</form>
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
	
		// Khai báo mảng students
		$students = array();
	
		// Lấy danh sách sinh viên từ cơ sở dữ liệu
		$sql = "SELECT * FROM students";
		$result = mysqli_query($conn, $sql);
	
		// Kiểm tra xem form đã được gửi chưa
		if (isset($_POST['mssv']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['class'])) {
			// Lấy các giá trị được gửi từ form
			$mssv = $_POST['mssv'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$class = $_POST['class'];
	
			// Thêm sinh viên mới vào cơ sở dữ liệu
			$sql = "INSERT INTO students (mssv, name, email, class) VALUES ('$mssv', '$name', '$email', '$class')";
			if (mysqli_query($conn, $sql)) {
				echo "Thêm sinh viên thành công";
			} else {
				echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
			}
	
			// Hiển thị cửa sổ thông báo
			?>
			<script>
				alert("Thêm sinh viên thành công!");
			</script>;

			<?php
			// Chuyển hướng người dùng về trang
			header('Location: http://localhost:8080/joomla3/index.php/vi/sinh-via-n');
			exit;
		}
		mysqli_close($conn);
	?>
</body>
</html>
