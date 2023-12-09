<!DOCTYPE html>
<html>
<head>
	<title>Quản lý sinh viên</title>
	<style type="text/css">
		body { font-family: Arial, Helvetica, sans-serif; }
		table { border-collapse: collapse; width: 100%; }
		td, th { border: 1px solid #ddd; padding: 8px; }
		tr:nth-child(even) { background-color: #f2f2f2; }
		tr:hover { background-color: #ddd; }
		.header { background-color: #333; color: #fff; text-align: center; }
		.dulieu {  text-align: center; }
		.btn { background-color: #008CBA; color: #fff; border: none; padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px; cursor: pointer; }
	</style>
</head>
<body>
	<div>
		<h2>Quản lý sinh viên</h2>
        <!-- <div class="btn">{/source}Thêm sinh viên{source}</div> -->
		<a href="http://localhost:8080/joomla3/index.php/vi/allcategories-vi-vn/uncategorised/addsv" class="btn">Thêm sinh viên</a>
		<table>
			<tr class="header">
				<th>ID</th>
				<th>Mã số sinh viên</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>Lớp</th>
				<th>Thao tác</th>
			</tr>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "joomla3";
                
                    // Tạo kết nối đến cơ sở dữ liệu
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Lấy danh sách sinh viên từ cơ sở dữ liệu
                    $sql = "SELECT * FROM students";
                    $result = mysqli_query($conn, $sql);
                    
                    // Kiểm tra kết quả trả về
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr class="dulieu">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['mssv']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td>
                        <a class="btn" href="http://localhost:8080/joomla3/index.php/vi/allcategories-vi-vn/uncategorised/update?id=<?php echo $row['id']; ?>">Update</a>
                        <a class="btn" href="http://localhost:8080/joomla3/index.php/vi/allcategories-vi-vn/uncategorised/?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</a>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="5">Không có sinh viên nào.</td>
                </tr>
                <?php } 
                    mysqli_close($conn);
                ?>
            </tbody>
		</table>
	</div>
</body>
</html>