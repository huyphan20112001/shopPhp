<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type'] != ''){
	$type=get_safe_value($con, $_GET['type']);
	
	if($type == 'delete'){
		$id = get_safe_value($con,$_GET['id']);
		$delete_sql = "delete from danhmuc where maDanhMuc='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "select * from danhmuc order by maDanhMuc asc";
$res=mysqli_query($con, $sql);

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Danh mục </h4>
				   <h4 class="box-link"><a href="manage_categories.php">Thêm</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">STT</th>
							   <th>Mã danh mục</th>
							   <th>Tên danh mục</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i; $i++;?></td>
							   <td><?php echo $row['maDanhMuc']?></td>
							   <td><?php echo $row['tenDanhMuc']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['maDanhMuc']."'>Chỉnh sửa</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['maDanhMuc']."'>Xóa</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>