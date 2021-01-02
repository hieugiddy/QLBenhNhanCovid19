<?php
	include('connect.php');
	//xóa ở trang chi tiết sản phẩm
    $xoa=$conn->prepare('delete from BenhNhan where id=:id');
    $xoa->bindParam(':id', $id);
    $id=$_GET['id'];
	$xoa->execute();
	
	echo '<script>
				location.href=\'index.php?trang=benhnhan\';
			</script>';
?>