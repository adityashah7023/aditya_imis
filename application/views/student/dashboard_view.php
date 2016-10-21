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
			Dashboard <small>statistics and more</small>
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
			
		</div>
	</div>
	<!-- END CONTENT -->
        
</div>
<!-- END CONTAINER -->
<?php
$this->load->view('admin/jscript.php');
$this->load->view('admin/footer.php');
?>


