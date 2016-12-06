<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<title>运动</title>
</head>
<?php include('function.php')?>
<body>
<div class="container">
<div class="row"><div class="col-md-2"></div>
<div class="col-md-8">
<div class="page-header">
  <h1>Running<small> for money</small></h1>
</div>
<div class="jumbotron">
<center><h2><?php 
echo date('Y-m-d',time());
?></h2></center>
<form  method="post" action="?action=addrun">
<div class="input-group"><span class="input-group-addon" >本日合计奔跑</span>
  <input type="text" class="form-control" name="run_km" >
  <span class="input-group-addon">km</span>
</div><br /><center>
        <input type="submit" value="GO!" class="btn btn-default btn-lg" /></center>
</form><br />
<p class="text-primary">合计跑步公里数为 <strong>
<?php 
echo run_sum('select km from run');?></strong> km</p>
<p class="text-danger">可用金额为 <strong>
<?php echo run_sum('select km from run')*3-run_sum('select cost_money from cost');?></strong> 元</p>
</div>
</div><div class="col-md-2"></div></div>

<div class="row"><div class="col-md-2"></div>
<div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-heading">购买物品</div>
  <div class="panel-body">
<form method="post" action="?action=addcost">
<div class="form-group">
  <input type="text" class="form-control" name="cost_name" placeholder="物品名称">
</div>
<div class="input-group">
  <span class="input-group-addon">￥</span>
  <input type="text" class="form-control" name="cost_money"  placeholder="物品金额">
  <span class="input-group-addon">元</span>
</div><br />
<input type="submit" value="添加" class="btn btn-default ">
</form>
</div></div>
</div><div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-heading">添加愿望物品</div>
  <div class="panel-body">
<form method="post" action="?action=addwish">
<div class="form-group">
  <input type="text" class="form-control" name="wish_name" placeholder="物品名称">
</div>
<div class="input-group">
  <span class="input-group-addon">￥</span>
  <input type="text" class="form-control" name="wish_money"  placeholder="预计金额">
  <span class="input-group-addon">元</span>
</div><br />
<input type="submit" value="添加" class="btn btn-default ">
</form>
</div></div>
</div><div class="col-md-2"></div>
</div>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">愿望清单</div>
<table  class="table">
<thead>
  <tr>
    <th scope="col">物品名称</th>
    <th scope="col">预算金额</th>
	<th scope="col">删除</th>
  </tr>
</thead>
<tbody>
<?php 
$sql="SELECT wish_title,wish_money,wish_id FROM wish";
$wishes=mysql_query($sql,$con);
while($wish=mysql_fetch_assoc($wishes)){?>
  <tr>
    <td><?php echo $wish['wish_title'];?></td>
    <td><?php echo $wish['wish_money'];?></td>
	<td><a href="?wishid=<?php echo $wish['wish_id'];?>&action=deletewish">删除</a></td>
  </tr>
<?php }
?>
</tbody>
</table>
<div class="panel-body">
  <p class="text-danger">累计金额： <?php echo run_sum('SELECT wish_money FROM wish');?> 元</p>
  </div>
</div>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">已购物品</div>
<table class="table table-striped table-hover">
<thead>
  <tr>
    <th scope="col">日期</th>
    <th scope="col">物品名称</th>
    <th scope="col">金额</th>
  </tr>
  </thead>
  <tbody>
<?php 
$sql="SELECT cost_date,cost_title,cost_money FROM cost";
$costs=mysql_query($sql,$con);
while($cost=mysql_fetch_assoc($costs)){?>
  <tr>
    <td><?php echo date('Y-m-d',$cost['cost_date']);?></td>
    <td><?php echo $cost['cost_title'];?></td>
    <td><?php echo $cost['cost_money'];?></td>
  </tr>
<?php }
?>
</tbody></table></div>
</div><div class="col-md-2"></div>
</div>
</div><br /><br />
</body>
</html>
