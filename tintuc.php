<?php
$ncov='https://ncov.moh.gov.vn/vi/web/guest/rss/-/journal/rss/20182/7199277';
$vnexpress="https://vnexpress.net/rss/suc-khoe.rss";
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$lines_string_ncov = file_get_contents($ncov, false, stream_context_create($arrContextOptions));
$lines_string_vnexpress = file_get_contents($vnexpress, false, stream_context_create($arrContextOptions));
$xml_ncov = new SimpleXMLElement($lines_string_ncov);
$xml_vnexpress = new SimpleXMLElement($lines_string_vnexpress);
echo '<div class="">';

foreach ($xml_ncov->channel->item as $items)
{   
	$tieude=$items->title;
	$mota=$items->description;
	$thoigian=$items->pubDate;
	$link=$items->link;
	
	echo '
	<a href="'.$link.'" target="_blank" style="">
		<div class="video-item">
		<div class="video-body">
			<h5 class="video-title">'.$tieude.'</h5>
			'.$mota.'
			<em class="video-text">
				<small class="text-muted">'.$thoigian.'</small>
			</em>
		</div>
		</div>
	</a><br/>
	';
}

echo '</div>
<div style="clear:both"><br/></div>
<div class="videoyt">';
foreach ($xml_vnexpress->channel->item as $items)
{   
	$tieude=$items->title;
	$hinhanh=explode('>',$items->description)[1].'/>';
	$mota=explode('>',$items->description)[4];
	$thoigian=$items->pubDate;
	$link=$items->link;
	
	echo '
	<a href="'.$link.'" target="_blank" title="'.$tieude.'">
		<div class="video-item">
		'.$hinhanh.'
		<div class="video-body">
			<h5 class="video-title">'.$tieude.'</h5>
			<p class="video-text">'.$mota.'</p>
			<em class="video-text">
				<small class="text-muted">'.$thoigian.'</small>
			</em>
		</div>
		</div>
	</a>
	';
}
echo '</div>';
?>


<style>  
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
	-webkit-line-clamp: 1;
	}
	.videoyt{
		width:100%;
	}
	.videoyt .video-item{
		width: 24%;
		float: left;
		margin:0 5px 30px 5px !important;
	}
	.video-item:hover p,.video-item:hover h5,.video-item:hover em{
		text-decoration:underline;
	}
	.video-item img{
		height:160px;
		width:100%;
		object-fit:cover
	}
</style>