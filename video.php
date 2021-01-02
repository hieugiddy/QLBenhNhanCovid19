<?php
$url='https://www.youtube.com/feeds/videos.xml?playlist_id=PLWOWPtHR1gWnK0nopIa8hQXY2QlmKBeKx';
$lines_array=file($url);
$lines_string=implode('',$lines_array);

$xml = new SimpleXMLElement($lines_string);
if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
} 
else
{
	echo '
	<div class="videoyt">
	';
	$i=0;
    foreach ($xml->entry as $items)
    {   
		// đăng ký Namespace
		$items->registerXPathNamespace('media','http://search.yahoo.com/mrss/');
		$items->registerXPathNamespace('yt','http://www.youtube.com/xml/schemas/2015');

		$tieude=$items->xpath('//media:title')[$i];
		$hinhanh=$items->xpath('//media:thumbnail')[$i]['url'];
		$mota=$items->xpath('//media:description')[$i];
		$thoigian=explode('+',explode('T',$items->updated)[1])[0].' ('.explode('T',$items->updated)[0].')';
		$id=$items->xpath('//yt:videoId')[$i];
		
		echo '
		<div class="video-item" onclick="openModel(\''.$id.'\')">
		<img class="video-img" src="'.$hinhanh.'" alt="">
		<div class="video-body">
			<h5 class="video-title">'.$tieude.'</h5>
			<p class="video-text">
				'.$mota.'
			</p>
			<em class="video-text">
				<small class="text-muted">'.$thoigian.'</small>
			</em>
		</div>
		</div>
		';
		$i++;
	}
	echo '
	</div>
	';
}
?>


<!-- The Modal -->
<div id="myModal" class="modal-video" onclick="closeModel()">

  <!-- Modal content -->
  <div class="modal-video-content">
	<iframe src="" id="video-player" width="100%" height="450px" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

</div>

<style>
	
.modal-video {
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 1; /* Sit on top */
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
	border:1px solid #eee;
	width: 60%; /* Could be more or less, depending on screen size */
  }
  
  
  .videoyt .video-text, .videoyt .video-title{
	overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
	white-space: unset !important;
	text-align:justify;
	line-height: 21px;
	margin:3px 0 !important
	}
	.videoyt .video-text{
	-webkit-line-clamp: 3;
	}
	.videoyt .video-title{
	font-size:15px;
	-webkit-line-clamp: 2;
	}
	.videoyt{
		width:100%;
	}
	.videoyt .video-item{
		width: 24%;
		float: left;
		margin:0 5px 30px 5px !important;
		cursor:pointer
	}

</style>
<script>
	var modal = document.getElementById("myModal");
	var videoplay=document.getElementById("video-player");
	function openModel(id){
		modal.style.display = "block";
		videoplay.src="https://www.youtube.com/embed/"+id;
	}

	function closeModel(){
		modal.style.display = "none";
		videoplay.src="";
	}
</script>