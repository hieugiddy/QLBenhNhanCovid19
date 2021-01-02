<?php
    include('connect.php');
    $benhnhan=$conn->prepare('select * from BenhNhan where id=:id');
    $benhnhan->bindParam(':id', $id);
    $id=$_GET['id'];
    $benhnhan->execute();
    if($benhnhan->rowCount()>0){
        while($row=$benhnhan->fetch(PDO::FETCH_ASSOC)){
                $hoten=$row['tenBN'];
                $ngaysinh=explode('-',$row['ngaySinh'])[1].'-'.explode('-',$row['ngaySinh'])[2].'-'.explode('-',$row['ngaySinh'])[0];
                $gioitinh=$row['gioiTinh'];
                $anhchup=$row['avatar'];
                $tuoi=$row['tuoi'];
                $diadiem=$row['diaDiem'];
                $tinhtrang=$row['tinhTrang'];
                $quoctich=$row['quocTich'];
                $dichte=$row['thongTinDichTe'];
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Quản Lí Bệnh Nhân Covid-19</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- end: Favicon -->
	<script>
        function thaydoi(){
            var input=document.getElementsByTagName('input');
            var select=document.getElementsByTagName('select');
            for(var i=0;i<input.length;++i){
                input[i].disabled=false;
            }
            for(var i=0;i<select.length;++i){
                select[i].disabled=false;
            }
            document.getElementById('luu').style.display="block";
            document.getElementById('thaydoi').style.display="none";
        }
    </script>
</head>

<body>
		<div class="container-fluid-full">

        <div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Thông tin bệnh nhân</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="xlsua.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Họ và tên:</label>
                    <div class="controls">
                    <input type="text" value="<?php echo $hoten; ?>" class="span6 typeahead" name="hoten" id="typeahead" disabled="true" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Ngày sinh:</label>
                    <div class="controls">
                    <input type="text" value="<?php echo $ngaysinh; ?>" class="input-xlarge datepicker" name="ngaysinh" disabled="true" id="date01" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError3">Giới tính:</label>
                <div class="controls">
                    <select id="selectError3" name="gioitinh" disabled="true">
                    <option value="1" <?php if($gioitinh==1) echo 'selected'; ?>>Nam</option>
                    <option value="2" <?php if($gioitinh==2) echo 'selected'; ?>>Nữ</option>
                    </select>
                </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="fileInput">Ảnh chụp</label>
                    <div class="controls">
                    <img src="<?php echo $anhchup; ?>" alt="" width="100px" height="100px"/>
                    <p></p>
                    <input class="input-file uniform_on" disabled="true" id="fileInput" accept="image/jpeg,image/png" name="avatar" type="file">
                    </div>
                </div>      
                <div class="control-group">
                    <label class="control-label" for="typeahead">Tuổi:</label>
                    <div class="controls">
                    <input type="number" disabled="true" class="span6 typeahead" name="tuoi" id="typeahead" min="1" value="<?php echo $tuoi; ?>" required>
                    </div>
                </div>  
                <div class="control-group">
                    <label class="control-label" for="typeahead">Địa điểm phát hiện:</label>
                    <div class="controls">
                    <input type="text" value="<?php echo $diadiem; ?>" disabled="true" class="span6 typeahead" name="diadiem" id="typeahead" required>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label" for="selectError3">Tình trạng:</label>
                <div class="controls">
                    <select id="selectError3" name="tinhtrang" disabled="true">
                    <option value="1" <?php if($tinhtrang==1) echo 'selected'; ?>>Nghi ngờ</option>
                    <option value="2" <?php if($tinhtrang==2) echo 'selected'; ?>>Đang điều trị</option>
                    <option value="3" <?php if($tinhtrang==3) echo 'selected'; ?>>Đã khỏi bệnh</option>
                    </select>
                </div>
                </div>
                <?php
                    $quoct=explode(',',$quoctich);  
                    $my=0;
                    $vietnam=0;
                    $hanquoc=0;
                    $nhatban=0;
                    $trungquoc=0;
                    for($i=0;$i<count($quoct);$i++){
                        if($quoct[$i]=='my')
                            $my=1;
                        if($quoct[$i]=='vietnam')
                            $vietnam=1;
                        if($quoct[$i]=='hanquoc')
                            $hanquoc=1;
                        if($quoct[$i]=='nhatban')
                            $hanquoc=1;
                        if($quoct[$i]=='trungquoc')
                            $trungquoc=1;
                    }
                ?>
                <div class="control-group">
                <label class="control-label" for="selectError1">Quốc tịch</label>
                <div class="controls">
                    <select id="selectError1" multiple data-rel="chosen" name="quoctich[]">
                    <option value="my" <?php if($my) echo 'selected'; ?>>Mỹ</option>
                    <option value="vietnam" <?php if($vietnam) echo 'selected'; ?>>Việt Nam</option>
                    <option value="hanquoc" <?php if($hanquoc) echo 'selected'; ?>>Hàn Quốc</option>
                    <option value="nhatban" <?php if($nhatban) echo 'selected'; ?>>Nhật Bản</option>
                    <option value="trungquoc" <?php if($trungquoc) echo 'selected'; ?>>Trung Quốc</option>
                    </select>
                </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Thông tin dịch tễ:</label>
                    <div class="controls">
                    <textarea class="cleditor" id="dichte" name="dichte" rows="3">
                    <?php echo $dichte; ?>
                    </textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <a class="btn btn-primary" id="thaydoi" onclick="thaydoi()">Sửa thông tin</a>
                    <button type="submit" class="btn btn-primary" id="luu" style="display:none">Lưu</button>
                </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
    	</div><!--/.fluid-container-->
	
		
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>