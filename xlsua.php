<?php
        function thaythe($chuoi){
                $chuoi = str_replace('"', '&quot;', $chuoi);
                $chuoi = str_replace('\'', '&apos;', $chuoi);
                $chuoi = str_replace('∼', '\∼', $chuoi);
                $chuoi = str_replace('$', '\$', $chuoi);
                $chuoi = str_replace('{', '\{', $chuoi);
                $chuoi = str_replace('}', '\}', $chuoi);
                $chuoi = str_replace('!', '\!', $chuoi);
                $chuoi = str_replace(';', '\;', $chuoi);
                $chuoi = str_replace('|', '\|', $chuoi);
                $chuoi = str_replace('scontent-b-pao.xx.fbcdn.net', '&nbsp;', $chuoi);
                $chuoi = str_replace('000webhostapp', '&nbsp;', $chuoi);
                return $chuoi;
        }
        include('connect.php');
        $benhnhan=$conn->prepare('update BenhNhan set tenBN=:hoten,gioiTinh=:gioitinh,tuoi=:tuoi,diadiem=:diadiem,tinhtrang=:tinhtrang,quoctich=:quoctich,avatar=:hinhanh,thongTinDichTe=:dichte,ngaySinh=:ngaysinh where id=:id');
        $benhnhan->bindParam(':hoten', $hoten);
        $benhnhan->bindParam(':gioitinh', $gioitinh);
        $benhnhan->bindParam(':tuoi', $tuoi);
        $benhnhan->bindParam(':diadiem', $diadiem);
        $benhnhan->bindParam(':tinhtrang', $tinhtrang);
        $benhnhan->bindParam(':quoctich', $quoctich);
        $benhnhan->bindParam(':hinhanh', $hinhanh);
        $benhnhan->bindParam(':dichte', $dichte);
        $benhnhan->bindParam(':ngaysinh', $ngaysinh);
        $benhnhan->bindParam(':id', $id);
        
        // upload hinh anh	
        $icon=$_FILES['avatar']['name'];//lấy tên file ảnh, để lấy được $_FILES thì form phải có  enctype="multipart/form-data"
        if ($icon!="") {
        if($_FILES["avatar"]["name"]!=NULL)
        {
        
        if($_FILES["avatar"]["type"]=="image/jpeg"
        ||$_FILES["avatar"]["type"]=="image/png"
        ||$_FILES["avatar"]["type"]=="image/gif"
        )
        {
        
        
        // kiem tra su ton tai cua file
        if (file_exists("img/" . $_FILES["avatar"]["name"])) 
        {
        echo $_FILES["avatar"]["name"]." file da ton tai. ";
        }
        
        else{
        
        $path = "img/"; // file luu vào thu muc chua file upload
        $tmp_name = $_FILES["avatar"]["tmp_name"];
        $name = date('dmYHis').str_replace(" ", "", basename($_FILES["avatar"]["name"]));
        $type = $_FILES['avatar']['type']; 
        $size = $_FILES['avatar']['size']; 
        // Upload file
        move_uploaded_file($tmp_name,$path.$name);
        $hinhanh='img/'.$name;
        }
        }
        else {
        echo "file duoc chon khong hop le";
        }
        }
        else 
        {
        echo "vui long chon file";
        }
            
        }
        else{
                $hinhanh='';
            }

        $id=$_POST['id'];
		$hoten=thaythe($_POST['hoten']);
        $ngaysinh=explode('/',$_POST['ngaysinh'])[2].'-'.explode('/',$_POST['ngaysinh'])[0].'-'.explode('/',$_POST['ngaysinh'])[1];
        $gioitinh=$_POST['gioitinh'];
        $tuoi=$_POST['tuoi'];
        $diadiem=thaythe($_POST['diadiem']);
        $tinhtrang=$_POST['tinhtrang'];
        $quoctich='';
        for($i=0;$i<count($_POST['quoctich']);$i++)
            $quoctich.=$_POST['quoctich'][$i].',';
        $dichte=thaythe($_POST['dichte']);
        
		$benhnhan->execute();

        echo '<script>
                alert("Đã thay đổi");
				window.history.back();
			</script>';
	
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>Sửa bệnh nhân</title>
</head>
<body>
	
</body>
</html>