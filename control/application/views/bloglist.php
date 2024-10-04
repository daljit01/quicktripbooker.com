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
					<div class="card-header"><i class="fa fa-table"></i>&nbsp;All Blogs</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-bordered">
								<thead>
								<tr>
									<th style="display:none;">Sl No</th>
									<th>Subject</th>
									<th>Thumb</th>
									<th>Date</th>
									<th>Action</th>
									
								</tr>
								</thead>
								<tbody>
								    <?php
									if(count((array)$blogs) > 0)
									{
								    foreach($blogs as $blogsrow){
								        $id = $blogsrow->id;
								    ?>
								<tr>
									<td style="display:none;">dfrg dfg</td>
									<td><?php echo $blogsrow->subject; ?></td>
									<td><img height="100" src="<?php echo base_url('assets/images/blog/'.$blogsrow->thumb); ?>"/></td>
									<td><?php echo $blogsrow->date; ?></td>
									<td>
										<a href="<?php echo base_url('blog-details/'.$blogsrow->id); ?>">
									    <button type="button" class="btn btn-info btn-sm waves-effect waves-light m-1">Edit</button>
									    </a>
									    <a href="<?php echo base_url('delete-blog/'.$id); ?>"><button type="button" class="btn btn-danger btn-sm waves-effect waves-light m-1">Delete</button></a>
									</td>
								</tr>
								<?php }
								}
								else
								{
								?>
								<tr>
									<td colspan="5" style="text-align:center;">No Blog Found</td>
								</tr>
								<?php
								} ?>
                               </tbody>
								<tfoot>
								
							
                                <tr>
									<th style="display:none;">Sl No</th>
									<th>Subject</th>
									<th>Thumb</th>
									<th>Date</th>
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