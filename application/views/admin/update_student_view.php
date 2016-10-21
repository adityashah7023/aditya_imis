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
			Manage Students 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url(); ?>admin/Dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?= base_url(); ?>admin/Manage_Student">Manage Students</a>
                                                <i class="fa fa-angle-right"></i>
					</li>
                                        <li>
                                            <a href="#">Edit</a>
                                        </li>
				</ul>
				<div class="page-toolbar">
					<div class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom">
                                            <i class="icon-calendar"></i>&nbsp; <?php date_default_timezone_set("America/Toronto"); echo date('D , d M Y'); ?>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="portlet">
                            <div class="portlet-title">
                                    <div class="caption">
                                            <i class="fa fa-pencil"></i>Edit Details
                                    </div>
                                    <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"></a>
                                    </div>
                            </div>
                            <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <div class="form-horizontal form-row-seperated">
                                    <?php echo form_open(base_url('admin/Manage_Student/update/'.$data['student']['stu_num'])); ?>
                                    
                                            <div class="form-body">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Student No</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="num" disabled="true" placeholder="e.g XXXXXXXXX" class="form-control" required="true" value="<?php echo $data['student']['stu_num']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Name</label>
                                                            <div class="col-md-3">
                                                                <input type="text" name="fname" placeholder="First" class="form-control" required="true" value="<?php echo $data['student']['stu_fname']; ?>"/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" name="mname" placeholder="Middle" class="form-control" required="true" value="<?php echo $data['student']['stu_mname']; ?>"/>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" name="lname" placeholder="Last" class="form-control" required="true" value="<?php echo $data['student']['stu_lname']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Email</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="email" placeholder="e.g example@mail.com" class="form-control" required="true" value="<?php echo $data['student']['stu_email']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Gender</label>
                                                            <div class="col-md-9">
                                                                <div class="radio-list">
                                                                        <label class="radio-inline">
                                                                        <div class="radio"><input type="radio" name="gender" value="male" required="true" <?php if($data['student']['stu_gender']=="male"){ echo "checked='true'"; } ?>></div> Male </label>
                                                                        <label class="radio-inline">
                                                                        <div class="radio"><input type="radio" name="gender" value="female" required="true" <?php if($data['student']['stu_gender']=="female"){ echo "checked='true'"; } ?>></div> Female </label>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Nationality</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="nationality" placeholder="e.g canadian" class="form-control" required="true" value="<?php echo $data['student']['stu_nationality']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Internship Status</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="intern_status" required="true">
                                                                    <option value>Select Internship Status</option>
                                                                    <option value="available" <?php if($data['student']['stu_internship_status']=="available"){ echo "selected"; } ?>>Available</option>
                                                                    <option value="hired" <?php if($data['student']['stu_internship_status']=="hired"){ echo "selected"; } ?>>Hired</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Contact</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="contact" placeholder="e.g xxxxxxxxxx" class="form-control" required="true" value="<?php echo $data['student']['stu_contact_no'] ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Semester</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="semester" required="true">
                                                                    <option value>Select Semester</option>
                                                                    <option value="1" <?php if($data['student']['stu_semester']=="1"){ echo "selected"; } ?>>1</option>
                                                                    <option value="2" <?php if($data['student']['stu_semester']=="2"){ echo "selected"; } ?>>2</option>
                                                                    <option value="3" <?php if($data['student']['stu_semester']=="3"){ echo "selected"; } ?>>3</option>
                                                                    <option value="4" <?php if($data['student']['stu_semester']=="4"){ echo "selected"; } ?>>4</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Intake Term</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="term" required="true">
                                                                    <option value>Select Intake Term</option>
                                                                    <option value="fall" <?php if($data['student']['stu_intake_term']=="fall"){ echo "selected"; } ?>>Fall</option>
                                                                    <option value="winter" <?php if($data['student']['stu_intake_term']=="winter"){ echo "selected"; } ?>>Winter</option>
                                                                    <option value="summer" <?php if($data['student']['stu_intake_term']=="summer"){ echo "selected"; } ?>>Summer</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Intake Year</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="year" required="true">
                                                                    <option value>Select Intake Year</option>
                                                                    <?php for($i=2014;$i<=2020;$i++) { ?>
                                                                    <option value="<?php echo $i; ?>"  <?php if($data['student']['stu_intake_year']==$i){ echo "selected"; } ?>><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="form-actions">
                                                    <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                                                                    <a href="<?= base_url('admin/Manage_Student'); ?>" class="btn btn-default">Cancel</a>
                                                            </div>
                                                    </div>
                                            </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <!-- END FORM-->
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


