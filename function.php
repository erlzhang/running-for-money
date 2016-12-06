<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
//链接数据库
$con=mysql_connect('localhost','yexiqing_wp','icily920719');
if(!$con){
echo '数据连接失败';
}else{
	mysql_select_db('yexiqing_other',$con);
}
if(isset($_GET['action'])){
	switch($_GET['action']){
		case 'addrun':
		$sql="INSERT INTO run(time,km) VALUES ('".time()."','".$_POST['run_km']."')";
		break;
		case 'addwish':
		$sql="INSERT INTO wish ( wish_title , wish_money ) VALUES ('".$_POST['wish_name']."','".$_POST['wish_money']."')";
		break;
		case 'deletewish':
		$sql="DELETE FROM wish WHERE wish_id = ".$_GET['wishid'];
		break;
		case 'addcost':
		$sql="INSERT INTO cost (cost_date,cost_title,cost_money) 
		VALUES ('".time()."','".$_POST['cost_name']."','".$_POST['cost_money']."')";
		break;
		default:
		echo '无效操作';
	}
	if(mysql_query($sql,$con)){?>
	<script>
	window.location.href="index.php";
	</script>
	<?
	}else{?>
	<script>
	alert('操作失败，请重新操作');
	window.location.href="index.php";
	</script>
	
	<?php 
	}
}



//数据累计
function run_sum($sql){
global $con;
$showall=mysql_query($sql,$con);
if(mysql_num_rows($showall)==0){
return 0;
}else{
  while($single=mysql_fetch_assoc($showall)){
  	foreach($single as $k => $v){
		$posts[]=$v;
	}
  }
  return array_sum($posts);
  }
}
?>
</body>
</html>
