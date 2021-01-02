<?php
	if(isset($_GET['trang'])) $layout=$_GET['trang']; else $layout="";
	switch ($layout) {
		case 'benhnhan':
			include('benhnhan.php');
			break;
		case 'chidao':
			include('chidao.php');
			break;
		case 'dieucanbiet':
			include('dieucanbiet.php');
			break;
		case 'help':
			include('help.php');
            break;
        case 'khuyencao':
            include('khuyencao.php');
            break;
        case 'tinnhan':
            include('tinnhan.php');
            break;
        case 'tintuc':
            include('tintuc.php');
            break;
        case 'video':
            include('video.php');
            break;
		default:
			include('thongke.php');
			break;
	}
?>