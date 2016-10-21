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
			<?php echo $data['job']['job_position']." at ".$data['job']['company']['comp_name'];?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url("student/Dashboard"); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?= base_url("student/Job"); ?>">List Jobs</a>
                                                <i class="fa fa-angle-right"></i>
					</li>
                                        <li>
                                            <a href="#">Details </a>
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
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <?php
                                date_default_timezone_set("America/Toronto"); $now=date('Y-m-d'); 
                                if(strtotime($data['job']['job_application_deadline'])<strtotime($now)){ ?>
                                <button type="button" disabled=""  class="btn btn-sm btn-success col-md-12">
                                Apply Now</button>
                                <?php } else { $flag=0;
                                    if($data['student_job']['count']!=0){
                                        
                                        for($j=0;$j<$data['student_job']['count'];$j++){
                                            if($data['job']['job_id']==$data['student_job'][$j]['job_id']) { 
                                                $flag=1; 
                                            } 
                                        } 
                                    } 
                                    if($flag==0) {?>
                                    <a href="<?= base_url('student/Job/apply'); ?>/<?php echo $data['job']['job_id']; ?>/<?php echo $this->uri->segment(2); ?>/<?php echo $this->uri->segment(3); ?>" class="btn btn-sm btn-success col-md-12">
                                        Apply Now</a>
                                <?php } else { ?>
                                <button type="button" disabled=""  class="btn btn-sm btn-danger col-md-12">
                                        Already Applied </button>
                                <?php } } ?>
                            </div>
                        </div>
			<div class="row">
				<div class="col-md-12">
                            		<!-- BEGIN TABS-->
					<div class="tabbable tabbable-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">Overview</a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">Skills</a>
							</li>
							
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									
									<div class="col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-md-12 profile-info">
                                                                                            <center><h1><?php echo $data['job']['job_position'];?></h1>
												<p>
													 <?php echo "at ".$data['job']['company']['comp_name'];?>
                                                                                                </p></center>
                                                                                                <br/>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12 alert alert-block alert-info"><center><h4>Description</h4><?php echo $data['job']['job_description']; ?></center></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-warning"><center><h4>Internship Type</h4><?php echo $data['job']['internship_type']['intp_name']; ?></center></div>
                                                                                                    <div class="col-md-2"></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-warning"><center><h4>Job Group</h4><?php echo $data['job']['job_group']['jbgrp_name']; ?></center></div>
                                                                                                    <div class="col-md-12 alert alert-block alert-danger"><center><h4>Responsibilities</h4><?php echo $data['job']['job_responsibilities']; ?></center></div>
                                                                                                    <div class="col-md-12 alert alert-block alert-success"><center><h4>Requirements</h4><?php echo $data['job']['job_requirements']; ?></center></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-danger"><center><h4>No. of Openings</h4><?php echo $data['job']['job_openings']; ?></center></div>
                                                                                                    <div class="col-md-2"></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-danger"><center><h4>Application Deadline</h4><?php echo $data['job']['job_application_deadline']; ?></center></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-info"><center><h4>Pay Status</h4><?php echo $data['job']['job_pay_status']; ?></center></div>
                                                                                                    <div class="col-md-2"></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-info"><center><h4>Salary</h4><?php echo $data['job']['job_salary']; ?></center></div>
                                                                                                    <div class="col-md-12 alert alert-block alert-warning"><center><h3>Contact Details</h3></center>
                                                                                                        <div class="col-md-5 alert alert-block "><center><h4>Name</h4><?php echo $data['job']['job_contact_fname']; ?> <?php echo $data['job']['job_contact_lname']; ?></center></div>
                                                                                                        <div class="col-md-2"></div>
                                                                                                        <div class="col-md-5 alert alert-block"><center><h4>Position</h4><?php echo $data['job']['job_contact_position']; ?></center></div>
                                                                                                        <div class="col-md-5 alert alert-block"><center><h4>Email</h4><?php echo $data['job']['job_contact_email']; ?></center></div>
                                                                                                        <div class="col-md-2"></div>
                                                                                                        <div class="col-md-5 alert alert-block"><center><h4>Phone</h4><?php echo $data['job']['job_contact_phone']; ?></center></div>
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
																<div class="row">
									
									<div class="col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-md-12 profile-info">
                                                                                            <center><h1><?php echo $data['job']['job_position'];?></h1>
												<p>
													 <?php echo "at ".$data['job']['company']['comp_name'];?>
                                                                                                </p></center>
                                                                                                <br/>
                                                                                                <div class="row">
                                                                                                    <?php if($data['skill_type']['count']>0){
                                                                                                        for($i=0;$i<$data['skill_type']['count'];$i++){
                                                                                                            if($data['skill_type'][$i]['sktyp_status']=="enable"){ $flag=0; ?>
                                                                                                            <div class="col-md-5 alert alert-block alert-info"><center><h4><?php echo $data['skill_type'][$i]['sktyp_name']; ?></h4>
                                                                                                    <?php       for($j=0;$j<$data['skill']['count'];$j++){
                                                                                                                    if($data['skill'][$j]['skill_status']=="enable"&&$data['skill'][$j]['skill_type']['sktyp_id']==$data['skill_type'][$i]['sktyp_id']){ ?>
                                                                                                                        <?php $flag=1; echo $data['skill'][$j]['skill_name'];  ?>
                                                                                                    <?php           } 
                                                                                                                } 
                                                                                                                if($flag==0) { echo "Not Required"; } if(($i%2)==0){ ?>
                                                                                                                    </center></div><div class="col-md-2"></div>
                                                                                                                <?php  } else { ?>
                                                                                                                    </center></div>
                                                                                                                <?php }}
                                                                                                        }
                                                                                                    } ?>
                                                                                                    
                                                                                                    
                                                                                                </div>
                                                                                                
                                                                                                
                                                                                                        

											</div>
											<!--end col-md-8-->
											
											
										</div>
										<!--end row-->
										
									</div>
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
