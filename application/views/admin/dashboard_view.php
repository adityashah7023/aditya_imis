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
                        
                        <li class="start active ">
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
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Dashboard 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom">
                                            <i class="icon-calendar"></i>&nbsp; <?php date_default_timezone_set("America/Toronto"); echo date('D , d M Y'); ?>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN OVERVIEW STATISTIC BARS-->
			<div class="row stats-overview-cont">
				<div class="col-md-3 col-sm-4">
					<div class="stats-overview stat-block">
						<div class="display stat ok huge">
							<div class="percent">
								 <?php echo $data['job']['count']; ?>
							</div>
						</div>
						<div class="details">
							<div class="title">
								 Jobs
							</div>
						</div>
						<div class="progress">
							<span style="width: 100%;" class="progress-bar progress-bar-info" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
						</div>
					</div>
				</div>
                                <div class="col-md-3 col-sm-4">
					<div class="stats-overview stat-block">
						<div class="display stat good huge">
							<div class="percent">
								 <?php echo $data['company']['count']; ?>
							</div>
						</div>
						<div class="details">
							<div class="title">
								 Companies
							</div>
						</div>
						<div class="progress">
							<span style="width: 100%;" class="progress-bar progress-bar-success" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
						</div>
					</div>
				</div>
                                <div class="col-md-3 col-sm-4">
					<div class="stats-overview stat-block">
						<div class="display stat bad huge">
							<div class="percent">
								 <?php echo $data['available']; ?>
							</div>
						</div>
						<div class="details">
							<div class="title">
								Students To Be Placed
							</div>
						</div>
						<div class="progress">
							<span style="width: 100%;" class="progress-bar progress-bar-danger" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
						</div>
					</div>
				</div>
                                <div class="col-md-3 col-sm-4">
					<div class="stats-overview stat-block">
						<div class="display stat good huge">
							<div class="percent">
								 <?php echo $data['hired']; ?>
							</div>
						</div>
						<div class="details">
							<div class="title">
								 Students Placed
							</div>
						</div>
						<div class="progress">
							<span style="width: 100%;" class="progress-bar progress-bar-success" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
						</div>
					</div>
				</div>
			</div>
			<!-- END OVERVIEW STATISTIC BARS-->
			<div class="clearfix">
			</div>
                        <div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bars"></i>List of Jobs
							</div>
							
						</div>
						<div class="portlet-body">
							
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
                                                                     Company
                                                            </th>
                                                            <th>
                                                                     Location
                                                            </th>
                                                            <th>
                                                                     Application Deadline
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
                                                                    <a href="<?= base_url("admin/Company_Profile/".$data['job'][$i]['comp_id']); ?>">
									<?php echo $data['job'][$i]['company']['comp_name']; ?> </a>
								</td>
								<td>
                                                                        <?php echo $data['job'][$i]['company']['comp_city']; ?>, <?php echo $data['job'][$i]['company']['comp_country']; ?>
								</td>
								<td class="center">
                                                                    <div class="col-sm-12 label label-danger"><?php echo $data['job'][$i]['job_application_deadline']; ?></div>
								</td>
								
							</tr>
                                                        <?php }}}  else { ?>
                                                                
                                                        <?php } ?>
							</tbody>
                                                        </table>
                                                </div>
                                                   
						
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
		</div>
	</div>
	<!-- END CONTENT -->
        
</div>
<!-- END CONTAINER -->
<?php
$this->load->view('admin/jscript.php');
$this->load->view('admin/footer.php');
?>


