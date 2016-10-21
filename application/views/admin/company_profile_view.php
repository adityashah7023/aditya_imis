<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php $this->load->view('admin/header.php');
        $this->load->view('admin/top_nav.php'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
                <ul class="page-sidebar-menu">
                        <li class="sidebar-toggler-wrapper">
                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                <div class="sidebar-toggler">
                                </div>
                                <div class="clearfix">
                                </div>
                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        </li>
                        
                        <li <!--class="start active "-->>
                                <a href="<?= base_url("admin/Dashboard"); ?>">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                </a>
                        </li>
                        <li>
                                <a href="<?= base_url("admin/Manage_Admin"); ?>">
                                <i class="icon-user"></i>
                                Admins</a>
                        </li>
                        <li>
                                <a href="<?= base_url("admin/Manage_Student"); ?>">
                                <i class="icon-users"></i>
                                Students</a>
                        </li>
                        <li>
                                <a href="<?= base_url("admin/Manage_Company"); ?>">
                                <i class="fa fa-building-o"></i>
                                Companies</a>
                        </li>
                        <li>
                                <a href="<?= base_url("admin/Manage_Job"); ?>">
                                <i class="icon-briefcase"></i>
                                Jobs</a>
                        </li>
                        <li>
                                <a href="<?= base_url("admin/Manage_Skill"); ?>">
                                <i class="fa fa-sliders"></i>
                                Skills</a>
                        </li>
                                        
                </ul>
                <!-- END SIDEBAR MENU -->
        </div>
</div>
<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success">Save changes</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
                        
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?php echo $data['company']['comp_name'];?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url("admin/Dashboard"); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?= base_url("admin/Manage_Company"); ?>">Manage Company</a>
                                                <i class="fa fa-angle-right"></i>
					</li>
                                        <li>
                                            <a href="#">Details of <?php echo $data['company']['comp_name'];?></a>
                                        </li>
				</ul>
				<div class="page-toolbar">
					<div class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom">
                                            <i class="icon-calendar"></i>&nbsp; <?php date_default_timezone_set("America/Toronto"); echo date('D , d M Y'); ?>
					</div>
				</div>
			</div>
                        <div id="delete_msg">
                            
                        </div>    
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN TABS-->
					<div class="tabbable tabbable-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">Overview</a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">Jobs</a>
							</li>
							
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									
									<div class="col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-md-12 profile-info">
												<h1><?php echo $data['company']['comp_name'];?></h1>
												<p>
													 <?php echo $data['company']['comp_description'];?>
												</p>
												<p>
                                                                                                    <a target="_blank" href="<?php echo $data['company']['comp_website'];?>"><?php echo $data['company']['comp_website'];?></a>
												</p>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="col-md-2"><i class="fa fa-map-marker"></i> </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <?php echo $data['company']['comp_street1'];?>, <?php echo $data['company']['comp_street2'];?>, <br/>
                                                                                                            <?php echo $data['company']['comp_city'];?>, <?php echo $data['company']['comp_postal_code'];?>,<br/>
                                                                                                            <?php echo $data['company']['comp_province'];?>, <?php echo $data['company']['comp_country'];?>,
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="col-md-2"><i class="fa fa-phone"></i> </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <?php echo $data['company']['comp_phone'];?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="col-md-2"><i class="fa fa-envelope"></i> </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <?php echo $data['company']['comp_email'];?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                                        

											</div>
											<!--end col-md-8-->
											
											
										</div>
										<!--end row-->
										
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<table class="table table-striped table-bordered table-hover" id="sample_5">
							<thead>
							<tr>
                                                            <th>
                                                                     ID
                                                            </th>
                                                            <th>
                                                                     Job Title
                                                            </th>
                                                            <th>
                                                                     Description
                                                            </th>
                                                            <th>
                                                                     Openings
                                                            </th>
                                                            <th>
                                                                     Application Deadline
                                                            </th>
                                                            <th colspan="2">
                                                                     Action
                                                            </th>
							</tr>
							</thead>
							<tbody>
                                                        <?php if($data['job']['count']!=0){
                                                            for($i=0;$i<$data['job']['count'];$i++){
                                                                if($data['job'][$i]['job_status']=="enable"){
                                                        ?>
							<tr class="odd gradeX">
								<td>
                                                                    <?php echo $data['job'][$i]['job_id']; ?>
								</td>
								<td>
                                                                    <a href="<?= base_url("admin/Job_Profile/".$data['job'][$i]['job_id']); ?>">
                                                                        <?php echo $data['job'][$i]['job_position']; ?> - <?php echo $data['job'][$i]['job_pay_status']; ?> - <?php echo $data['job'][$i]['job_group']['jbgrp_name']; ?></a>
								</td>
                                                                <td>
                                                                    <?php echo $data['job'][$i]['job_description']; ?>
								</td>
								<td>
                                                                    <?php echo $data['job'][$i]['job_openings']; ?>
								</td>
								<td class="center">
									 <?php echo $data['job'][$i]['job_application_deadline']; ?>
								</td>
								
                                                                <td>
									<a href="<?= base_url('admin/Manage_Job/edit'); ?>/<?php echo $data['job'][$i]['job_id']; ?>" class="btn btn-sm btn-success">
									Edit </a>
								</td>
                                                                <td>
									<a onclick="deleteMe('<?php echo $data['job'][$i]['job_id']; ?>');" class="btn btn-sm btn-danger">
									Delete </a>
								</td>
							</tr>
                                                        <?php }}}  else { ?>
                                                                
                                                        <?php } ?>
							</tbody>
                                                        </table>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!-- END TABS-->
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
        
</div>
<!-- END CONTAINER -->

<?php
$this->load->view('admin/footer.php');
$this->load->view('admin/jscript.php');
?>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url(); ?>assets/scripts/app.js"></script>
<script src="<?= base_url(); ?>assets/scripts/table-managed.js"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script>
jQuery(document).ready(function() {       
   App.init();
   TableManaged.init();
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script>
