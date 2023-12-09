<?php
	// Kết nối đến cơ sở dữ liệu
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
	// Lấy ID của sinh viên cần xóa
	$id = $_GET['id'];
	// Xóa sinh viên khỏi cơ sở dữ liệu
	$sql = "DELETE FROM students WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		header("Location: http://localhost:8080/joomla3/index.php/vi/sinh-via-n");
		exit;
	} else {
		echo "Lỗi: " . mysqli_error($conn);
	}
	mysqli_close($conn);
?>