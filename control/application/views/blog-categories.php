<?php
// echo "<pre>";
// print_r($aaa);
// die;
?>
<style>
	.nav-tabs-primary.nav-tabs{
		border-bottom: 0px;
	}

	.nav-tabs-primary .nav-link.active,
	.nav-tabs-primary .nav-item.show>.nav-link {
		border: 0px;
	}

	.table td, .table th {
		padding: 0px;
	}
	.card .table td, .card .table th {
		padding: 5px;
	}

	table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
		position: absolute;
		bottom: 1px;
		display: block;
		opacity: 0.3;
	}

	table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
		width: 120px;
		padding-right: 0px;
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
	    
	    <div class="row">
			<form method="post" action="">
			<?php //include("searchfrm.php"); ?>
			</form>
		</div>
		<!--End Row-->
	    
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><i class="fa fa-table"></i>&nbsp;All Blog Categories</div>
					<div class="card-body">
					<?php
					if(!empty($msg))
						{
						?>
						<h6 style="color: #9e1a1a;  text-align: center;"><?php echo $msg; ?></h6>
						<?php
						}
						?>
						<div class="table-responsive">
							<table id="example" class="table table-bordered">
								<thead>
								<tr>
									<th style="display:none;">Sl No</th>
									<th>Date</th>
									<th>Name</th>
									<th>Slug</th>									
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								    <?php
									if(count((array)$blogcategories) > 0)
									{
								    foreach($blogcategories as $category){
								        $id = $category->id;
								    ?>
								<tr>
									<td style="display:none;">dfrg dfg</td>
									<td style="vertical-align: middle;"><?php echo $category->created_at; ?></td>
									<td style="vertical-align: middle;"><?php echo $category->name; ?></td>
									<td style="vertical-align: middle;"><?php echo $category->slug; ?></td>
									<td style="vertical-align: middle;"><a href="<?php echo base_url('blog-category-details/'.$id); ?>">
									    <button type="button" class="btn btn-info btn-sm waves-effect waves-light m-1">Edit</button>
									    </a>
									    <a class="del-blog-category" href="javascript:void(0);" rel="<?php echo $category->id ?>"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light m-1">Delete</button></a>
									</td>
								</tr>
								<?php }
									}
									else
									{
									?>
									<tr>
										<td colspan="5" style="text-align: center;">No category found</td>
									</tr>
									<?php
									}
								 ?>
                               </tbody>
								<tfoot>
								
							
                                <tr>
									<th style="display:none;">Sl No</th>
									<th>Date</th>
									<th>Name</th>
									<th>URL</th>									
									<th>Action</th>
								</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- End Row-->
		<!--End Row-->
		<!--start overlay-->
		<div class="overlay toggle-menu"></div>
		<!--end overlay-->
	</div>
</div>