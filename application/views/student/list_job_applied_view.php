<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php $this->load->view('student/header.php');
        $this->load->view('student/top_nav.php'); ?>

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
                        
                        <li class="start ">
                                <a href="<?= base_url("student/Dashboard"); ?>">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                </a>
                        </li>
                        <li >
                                <a href="<?= base_url("student/Internship"); ?>">
                                <i class="icon-briefcase "></i>
                                <span class="title">Internship</span>
                                
                                </a>
                        </li>
                        <li>
                                <a href="<?= base_url("student/List_Company"); ?>">
                                <i class="fa fa-building-o "></i>
                                <span class="title">Companies</span>
                                
                                </a>
                        </li>
                        <li>
                                <a href="<?= base_url("student/Job"); ?>">
                                <i class="fa fa-bars "></i>
                                All Jobs</a>
                        </li>
                        <li>
                                <a href="<?= base_url("student/Job/applied"); ?>">
                                <i class="icon-plus"></i>
                                My Applications</a>
                        </li>
                        <li>
                                <a href="<?= base_url("student/Education"); ?>">
                                <i class="fa fa-graduation-cap "></i>
                                My Education</a>
                        </li>
                        
                        <li>
                                <a href="<?= base_url("student/Certificate"); ?>">
                                <i class="fa fa-certificate "></i>
                                My Certificates</a>
                        </li>
                        <li>
                                <a href="<?= base_url("student/Work_Experience"); ?>">
                                <i class="fa fa-building "></i>
                                My Work Experience</a>
                        </li>
                        <li>
                                <a href="<?= base_url("student/Skill"); ?>">
                                <i class="fa fa-sliders "></i>
                                My Skills</a>
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
			Jobs
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url("student/Dashboard"); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Jobs</a>

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
					<div class="portlet">
						<div class="portlet-title">
                                                        <div class="caption">
                                                                <i class="fa fa-bars"></i>List of Jobs
                                                        </div>  
                                                        <div class="tools">
                                                                <a href="javascript:;" class="collapse"></a>
                                                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                                                <a href="javascript:;" class="reload"></a>
                                                                <a href="javascript:;" class="remove"></a>
                                                        </div>
                                                </div>
						
							 <div class="portlet-body">
                                                            
                                                                    <table class="table table-striped table-bordered table-hover col-md-12" id="sample_6">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>
                                                                                     ID
                                                                            </th>
                                                                            <th>
                                                                                     Job Title
                                                                            </th>
                                                                            <th>
                                                                                     Internship Type
                                                                            </th>
                                                                            <th>
                                                                                     Status
                                                                            </th>
                                                                            <th>
                                                                                     Application Deadline
                                                                            </th>
                                                                            
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php if($data['student_job']['count']!=0){
                                                                            for($i=0;$i<$data['student_job']['count'];$i++){
                                                                                if($data['student_job'][$i]['stjin_status']=="enable"){
                                                                        ?>
                                                                        <tr class="odd gradeX">
                                                                                <td>
                                                                                    <?php echo $data['student_job'][$i]['job_id']; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <a href="<?= base_url("student/Job_Profile/".$data['student_job'][$i]['job_id']); ?>">
                                                                                        <?php echo $data['student_job'][$i]['job']['job_position']; ?> - <?php echo $data['student_job'][$i]['job']['job_pay_status']; ?> - <?php echo $data['student_job'][$i]['job']['job_group']['jbgrp_name']; ?></a>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $data['student_job'][$i]['job']['internship_type']['intp_name']; ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if($data['student_job'][$i]['stjin_verification_status']=="pending"){ ?>
                                                                                    <div class="label label-warning col-md-12">Pending</div>
                                                                                    <?php } else if($data['student_job'][$i]['stjin_verification_status']=="rejected"){ ?>
                                                                                    <div class="label label-danger col-md-12">Rejected</div>
                                                                                    <?php } else if($data['student_job'][$i]['stjin_verification_status']=="approved") { ?>
                                                                                    <div class="label label-success col-md-12">Approved</div>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <td class="center">
                                                                                         <?php echo $data['student_job'][$i]['job']['job_application_deadline']; ?>
                                                                                </td>

                                                                                
                                                                        </tr>
                                                                        <?php }}}  else { ?>

                                                                        <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                
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
$this->load->view('student/footer.php');
$this->load->view('student/jscript.php');
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
