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
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?php echo $data['student']['stu_num']." : ".$data['student']['stu_fname']."  ".$data['student']['stu_lname'];?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url("student/Dashboard"); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
                                            <a href="#">Profile </a>
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
								<a href="#tab_1_2" data-toggle="tab">Skills</a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">Internship</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									
									<div class="col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-md-12 profile-info">
                                                                                            <center><h1><?php echo $data['student']['stu_fname']." ".$data['student']['stu_mname']." ".$data['student']['stu_lname'];?></h1>
												<p>
													 <?php echo $data['student']['stu_num'];?>
                                                                                                </p></center>
                                                                                                <br/>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-5 alert alert-block alert-info">
                                                                                                        <center><h3>Basic Details</h3></center><br/>
                                                                                                        <h4>Email : <small><?php echo $data['student']['stu_email']; ?></small></h4>
                                                                                                        <h4>Phone : <small><?php echo $data['student']['stu_contact_no']; ?></small></h4>
                                                                                                        <h4>Internship Status : <small><?php echo $data['student']['stu_internship_status']; ?></small></h4>
                                                                                                        <h4>Semester : <small><?php echo $data['student']['stu_semester']; ?></small></h4>
                                                                                                        <h4>Intake : <small><?php echo $data['student']['stu_intake_term']." ".$data['student']['stu_intake_year']; ?></small></h4>
                                                                                                        <h4>Gender : <small><?php echo $data['student']['stu_gender']; ?></small></h4>
                                                                                                        <h4>Nationality : <small><?php echo $data['student']['stu_nationality']; ?></small></h4>
                                                                                                    </div>
                                                                                                    <div class="col-md-2"></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-info">
                                                                                                        <center><h3>Education</h3></center><br/>
                                                                                                        <?php for($i=0;$i<$data['student_education']['count'];$i++){ ?>
                                                                                                            <h4><b><?php echo $data['student_education'][$i]['sted_degree_name']; ?> in <?php echo $data['student_education'][$i]['sted_major']; ?></b> <br/><small>from <?php echo $data['student_education'][$i]['sted_uni_name']; ?>, <?php echo $data['student_education'][$i]['sted_uni_city']; ?> <br/>with GPA <?php echo $data['student_education'][$i]['sted_gpa']; ?></small></h4><br/>
                                                                                                        <?php } ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-5 alert alert-block alert-info">
                                                                                                        <center><h3>Certification</h3></center><br/>
                                                                                                        <?php for($i=0;$i<$data['student_certificate']['count'];$i++){ ?>
                                                                                                        <h4><b><?php echo $data['student_certificate'][$i]['certification']['cert_name']; ?></b> <br/><small>by <?php echo $data['student_certificate'][$i]['certification']['cert_body']; ?> <br/>on <?php echo $data['student_certificate'][$i]['stce_received_date']; ?></small></h4><br/>
                                                                                                        <?php } ?>
                                                                                                    </div>
                                                                                                    <div class="col-md-2"></div>
                                                                                                    <div class="col-md-5 alert alert-block alert-info">
                                                                                                        <center><h3>Education</h3></center><br/>
                                                                                                        <?php for($i=0;$i<$data['student_experience']['count'];$i++){ ?>
                                                                                                        <h4><b><?php echo $data['student_experience'][$i]['woex_position']; ?></b><br/>at <?php echo $data['student_experience'][$i]['woex_company_name']; ?>, <?php echo $data['student_experience'][$i]['woex_company_location']; ?> <br/><small>from <?php echo $data['student_experience'][$i]['woex_from_year']; ?> to <?php echo $data['student_experience'][$i]['woex_to_year']; ?> </small></h4><br/>
                                                                                                        <?php } ?>
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
							<div class="tab-pane" id="tab_1_2">
                                                                    <div class="row">
									
									<div class="col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-md-12 profile-info">
                                                                                            <center><h1><?php echo $data['student']['stu_fname']." ".$data['student']['stu_mname']." ".$data['student']['stu_lname'];?></h1>
												<p>
													 <?php echo $data['student']['stu_num'];?>
                                                                                                </p></center>
                                                                                                
                                                                                                <br/>
                                                                                                <div class="row">
                                                                                                    <?php if($data['skill_type']['count']>0){ ?>
                                                                                                    <div class="row">
                                                                                                        <?php    for($i=0;$i<$data['skill_type']['count'];$i++){
                                                                                                            if($data['skill_type'][$i]['sktyp_status']=="enable"){ $flag=0; ?>
                                                                                                            
                                                                                                            <div class="col-md-5 alert alert-block alert-info">
                                                                                                                <center>
                                                                                                                    <h3><?php echo $data['skill_type'][$i]['sktyp_name']; ?></h3><hr/>
                                                                                                    <?php   for($j=0;$j<$data['student_skill']['count'];$j++){
                                                                                                                if($data['student_skill'][$j]['stsk_status']=="enable"&&$data['student_skill'][$j]['skill']['skill_type']['sktyp_id']==$data['skill_type'][$i]['sktyp_id']){ 
                                                                                                                    $flag=1; ?>
                                                                                                                            <?php if($data['student_skill'][$j]['stsk_points']==1) { ?>
                                                                                                                        <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: lightgray"> </span> <span class="col-sm-1 fa fa-star" style="color: lightgray"> </span> <span class="col-sm-1 fa fa-star" style="color: lightgray"> </span>
                                                                                                                             <?php } else if($data['student_skill'][$j]['stsk_points']==2) { ?>
                                                                                                                        <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: lightgray"> </span> <span class="col-sm-1 fa fa-star" style="color: lightgray"> </span>
                                                                                                                             <?php } else if($data['student_skill'][$j]['stsk_points']==3) { ?>
                                                                                                                        <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: lightgray"> </span>
                                                                                                                             <?php } else { ?>
                                                                                                                            <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span> <span class="col-sm-1 fa fa-star" style="color: #0088ff"> </span>
                                                                                                                             <?php } ?><div class="col-sm-2"></div><b><?php echo $data['student_skill'][$j]['skill']['skill_name'];  ?></b><hr><br/>
                                                                                                             <?php   } 
                                                                                                            } 
                                                                                                            if($flag==0) { echo "Not Added"; } if($i%2==0) { ?>
                                                                                                                </center></div><div class="col-md-2"></div>
                                                                                                            
                                                                                                            
                                                                                                                <?php  } else { ?>
                                                                                                                </center></div></div>
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
                                                        <div class="tab-pane" id="tab_1_3">
								<div class="row">
									
									<div class="col-md-10 col-md-offset-1">
										
                                                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                                                
                                                                                        
                                                                                        <div class="portlet-body">
                                                                                                
                                                                                        <table class="table table-striped table-bordered table-hover" id="sample_6">
							<thead>
							<tr>
                                                           
                                                            <th>
                                                                     Job Title
                                                            </th>
                                                            <th>
                                                                     Company
                                                            </th>
                                                            <th>
                                                                     Assigned On
                                                            </th>
                                                             <th colspan="2">
                                                                     Duration
                                                            </th>
                                                            
							</tr>
							</thead>
							<tbody>
                                                        <?php if($data['student_intern']['count']!=0){
                                                            for($i=0;$i<$data['student_intern']['count'];$i++){
                                                                
                                                        ?>
							<tr class="odd gradeX">
								<td>
                                                                    <a href="<?= base_url("student/Job_Profile/".$data['student_intern'][$i]['job_id']); ?>">
                                                                        <?php echo $data['student_intern'][$i]['job']['job_position']; ?> - <?php echo $data['student_intern'][$i]['job']['job_pay_status']; ?> - <?php echo $data['student_intern'][$i]['job']['job_group']['jbgrp_name']; ?></a>
								</td>
                                                                <td>
                                                                    <a href="<?= base_url("student/Company_Profile/".$data['student_intern'][$i]['job']['comp_id']); ?>">
									<?php echo $data['student_intern'][$i]['job']['company']['comp_name']; ?>, <?php echo $data['student_intern'][$i]['job']['company']['comp_city']; ?>, <?php echo $data['student_intern'][$i]['job']['company']['comp_country']; ?> </a>
								</td>
								<td>
                                                                        <div class="col-sm-12"><?php echo $data['student_intern'][$i]['stin_assigned_date']; ?></div>
								</td>
								<td class="center">
                                                                    <div class="col-sm-12"><?php echo $data['student_intern'][$i]['stin_start_date']; ?></div>
                                                                </td>
                                                                <td><div class="col-sm-12"><?php echo $data['student_intern'][$i]['stin_end_date']; ?></div>
								</td>
                                                                
							</tr>
                                                        <?php }}  else { ?>
                                                        <tr>
                                                            <td> </td><td> </td><td>No Data Available. </td><td> </td><td> </td> 
                                                        </tr>
                                                        <?php } ?>
							</tbody>
                                                        </table>
                                                                                           
                                                                                        </div>
                                                                                
                                                                                <!-- END EXAMPLE TABLE PORTLET-->
										<!--end row-->
										
									</div>
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
