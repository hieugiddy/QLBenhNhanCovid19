<?php
	$benhnhan=$conn->prepare('select * from BenhNhan');
	$benhnhan->execute();
?>
<a href="?trang=benhnhan&them" class="btn-success btn">Thêm bệnh nhân</a>
<a href="rss.php" class="btn-danger btn" target="_blank">Xuất ra XML</a>
<p></p>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white user"></i><span class="break"></span>Danh sách bệnh nhân</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Mã số</th>
						<th>Bệnh nhân</th>
						<th>Tuổi</th>
						<th>Địa điểm</th>
						<th>Quốc tịch</th>
						<th>Tình trạng</th>
						<th></th>
					</tr>
				</thead>   
				<tbody>
				<?php
					if($benhnhan->rowCount()>0){
						while($row=$benhnhan->fetch(PDO::FETCH_ASSOC)){
							$quoctich='';
							$tmp=explode(',',$row['quocTich']);
							for($i=0;$i<count($tmp);$i++){
								if($tmp[$i]=='my')
									$quoctich.='Mỹ,';
								if($tmp[$i]=='vietnam')
									$quoctich.='Việt Nam,';
								if($tmp[$i]=='hanquoc')
									$quoctich.='Hàn Quốc,';
								if($tmp[$i]=='nhatban')
									$quoctich.='Nhật Bản,';
								if($tmp[$i]=='trungquoc')
									$quoctich.='Trung Quốc,';
							}
							echo '
							<tr>
								<td>BN0'.$row['id'].'</td>
								<td>'.$row['tenBN'].'</td>
								<td class="center">'.$row['tuoi'].'</td>
								<td class="center">'.$row['diaDiem'].'</td>
								<td class="center">'.$quoctich.'</td>
								<td class="center">
							';
							if($row['tinhTrang']==1)
								echo '<span class="label label-important">Nghi ngờ</span>';
							if($row['tinhTrang']==2)
								echo '<span class="label label-warning">Đang điều trị</span>';
							if($row['tinhTrang']==3)
								echo '<span class="label label-success">Đã khỏi bệnh</span>';
							echo '
								</td>
								<td class="center">
									<a class="btn btn-success" onclick="openModel('.$row['id'].')">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-info" href="#" onclick="openModel('.$row['id'].')">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="xoa.php?id='.$row['id'].'">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							';
						}
					}
				?>						
				</tbody>
			</table>            
		</div>
	</div><!--/span-->

</div><!--/row-->

<!-- The Modal -->
<div id="myModal" class="modal-video" onclick="closeModel()">

  <!-- Modal content -->
  <div class="modal-video-content">
	<iframe src="" id="video-player" width="100%" height="450px" ></iframe>
  </div>

</div>
<style>
	
.modal-video {
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 99; /* Sit on top */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: hidden; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
  }
  
  /* Modal Content/Box */
  .modal-video-content {
	background-color: transparent; /* Fallback color */
	margin:5% auto; 
	padding: 0;
	width: 70%; /* Could be more or less, depending on screen size */
  }
  </style>
  <script>
	var modal = document.getElementById("myModal");
	var videoplay=document.getElementById("video-player");
	function openModel(id){
		modal.style.display = "block";
		videoplay.src="xem.php?id="+id;
	}

	function closeModel(){
		modal.style.display = "none";
		videoplay.src="";
	}
</script>