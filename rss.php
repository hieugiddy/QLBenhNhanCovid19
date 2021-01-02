<?php
// Thiết lập cấu trúc fiel là xml
header("Content-type: text/xml");
 
// Hàm chuyển đổi những ký tự đặc biệt để khỏi lỗi XML
function xml_entities($string) {
   return str_replace(
           array("&", "<", ">", '"', "'"), array("&amp;", "&lt;", "&gt;", "&quot;", "&apos;"), $string
   );
}
 
// Kết nối CSDL và lấy danh sách 10 tin mới nhất
include('connect.php');
$benhnhan=$conn->prepare('select * from BenhNhan');
$benhnhan->execute();

// Lặp dư liệu và đưa ra các items XML
$items = '';
while ($row=$benhnhan->fetch(PDO::FETCH_ASSOC)) {
    if($row['gioiTinh']==1)
        $gioitinh='Nam';
    else
        $gioitinh='Nữ';
    
    if($row['tinhTrang']==1)
        $tinhtrang='Nghi ngờ';
    else
        if($row['tinhTrang']==2)
            $tinhtrang='Đang điều trị';
        else
            $tinhtrang='Đã điều trị';
    $quoct=explode(',',$row['quocTich']);  
    $quoctich='';
    for($i=0;$i<count($quoct);$i++){
        if($quoct[$i]=='my')
            $quoctich.='Mỹ,';
        if($quoct[$i]=='vietnam')
            $quoctich.='Việt Nam,';
        if($quoct[$i]=='hanquoc')
            $quoctich.='Hàn Quốc,';
        if($quoct[$i]=='nhatban')
            $quoctich.='Nhật Bản,';
        if($quoct[$i]=='trungquoc')
            $quoctich.='Trung Quốc,';
    }
   $items .= '<BenhNhan>';
       $items .= "<MaSo>" . xml_entities('BN0'.$row['id']) . "</MaSo>";
       $items .= "<HoTen>" . xml_entities($row['tenBN']) . "</HoTen>";
       $items .= "<NgaySinh>" . xml_entities($row['ngaySinh']). "</NgaySinh>";
       $items .= "<GioiTinh>" . xml_entities($gioitinh) . "</GioiTinh>";
       $items .= "<AnhChup>" .xml_entities('https://whovians.xyz/'.$row['avatar']). "</AnhChup>";
       $items .= "<Tuoi>" . xml_entities($row['tuoi']). "</Tuoi>";
       $items .= "<DiaDiemPhatHien>" . xml_entities($row['diaDiem']). "</DiaDiemPhatHien>";
       $items .= "<TinhTrang>" .xml_entities($tinhtrang). "</TinhTrang>";
       $items .= "<QuocTich>" . xml_entities($quoctich). "</QuocTich>";
       $items .= "<ThongTinDichTe>" . xml_entities($row['thongTinDichTe']). "</ThongTinDichTe>";
   $items .= '</BenhNhan>';
}

// Xuất thông tin website và nối $items vào
echo '<?xml version="1.0"?>
<rss version="2.0">
   <QLBenhNhanCovid19>
       <title> ' . xml_entities('Quản lí bệnh nhân Covid-19') . ' </title>
       <link>' . xml_entities('https://whovians.xyz') . '</link>
       <description> ' . xml_entities('Whovians.xya là Quản lí bệnh nhân Covid-19') . ' </description>
       <language>vi_VN</language>
       '.$items.'
   </QLBenhNhanCovid19>
</rss>';
?>