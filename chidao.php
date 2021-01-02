<?php
$ncov='https://ncov.moh.gov.vn/vi/web/guest/rss/-/journal/rss/20182/7199287';
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$lines_string = file_get_contents($ncov, false, stream_context_create($arrContextOptions));
$xml = new SimpleXMLElement($lines_string);

echo '<div class="videoyt">';
foreach ($xml->channel->item as $items)
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
	</a>
	';
}
echo '</div>';
?>


<style>  
  .videoyt .video-title{
	overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
	white-space: unset !important;
	text-align:justify;
	line-height: 21px;
	margin:3px 0 !important;
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
	}
	.video-item:hover p,.video-item:hover h5,.video-item:hover em{
		text-decoration:underline;
	}
</style>