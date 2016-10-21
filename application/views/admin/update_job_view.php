<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php $this->load->view('admin/header.php');
        $this->load->view('admin/top_nav.php'); ?>
<!--<script type="text/javascript">
<?php //if(form_error('num', '<p style="color:red">* ', '</p>') != ''): ?>
document.getElementById('num').focus();
<?php //endif; ?>
</script>-->

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
			Manage Jobs 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url(); ?>admin/Dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?= base_url(); ?>admin/Manage_Job">Manage Job</a>
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
                                <div class="form-horizontal form-row-seperated">
                                    <!-- BEGIN FORM-->
                                    <?php echo form_open(base_url('admin/Manage_Job/update/'.$data['job']['job_id'])); ?>
                                            <div class="form-body">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Company</label>
                                                            <div class="col-md-7">
                                                                <select class="form-control" name="company" required="true">
                                                                    <option value>Select Company</option>
                                                                    <?php for($i=0;$i<$data['company']['count'];$i++) { ?>
                                                                    <option value="<?php echo $data['company'][$i]['comp_id']; ?>" <?php if(set_select('company',$data['company'][$i]['comp_id'])!=""){ echo set_select('company',$data['company'][$i]['comp_id']);}else{ if($data['company'][$i]['comp_id']==$data['job']['comp_id']) echo "selected"; } ?>><?php echo $data['company'][$i]['comp_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class='col-md-2'>
                                                                <a href='<?= base_url('admin/Manage_Job/add_company'); ?>' class="btn btn-info col-md-12">Add <i class='fa fa-plus'></i></a>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Position</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="position" class="form-control" required="true" value="<?php echo $data['job']['job_position']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Group</label>
                                                            <div class="col-md-7">
                                                                <select class="form-control" name="job_group" required="true">
                                                                    <option value>Select Group</option>
                                                                    <?php for($i=0;$i<$data['job_group']['count'];$i++) { ?>
                                                                    <option value="<?php echo $data['job_group'][$i]['jbgrp_id']; ?>" <?php if(set_select('job_group',$data['job_group'][$i]['jbgrp_id'])!=""){ echo set_select('job_group',$data['job_group'][$i]['jbgrp_id']);}else{ if($data['job_group'][$i]['jbgrp_id']==$data['job']['jbgrp_id']) echo "selected"; } ?>><?php echo $data['job_group'][$i]['jbgrp_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <!--<div class='col-md-2'>
                                                                <a href='<?= base_url('admin/Manage_Job/add_group'); ?>' class="btn btn-info col-md-12">Add <i class='fa fa-plus'></i></a>
                                                            </div>-->
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="description" class="form-control" required="true" style="resize: vertical"><?php echo $data['job']['job_description']; ?></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Internship Type</label>
                                                            <div class="col-md-7">
                                                                <select class="form-control" name="internship_type" required="true">
                                                                    <option value>Select Internship Type</option>
                                                                    <?php for($i=0;$i<$data['internship_type']['count'];$i++) { ?>
                                                                    <option value="<?php echo $data['internship_type'][$i]['intp_id']; ?>" <?php if(set_select('internship_type',$data['internship_type'][$i]['intp_id'])!=""){ echo set_select('internship_type',$data['internship_type'][$i]['intp_id']);}else{ if($data['internship_type'][$i]['intp_id']==$data['job']['intp_id']) echo "selected"; } ?>><?php echo $data['internship_type'][$i]['intp_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <!--<div class='col-md-2'>
                                                                <a href='<?= base_url('admin/Manage_Job/add_internship_type'); ?>' class="btn btn-info col-md-12">Add <i class='fa fa-plus'></i></a>
                                                            </div>-->
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Responsibilities</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="responsibilities" class="form-control" required="true" style="resize: vertical"><?php echo $data['job']['job_responsibilities']; ?></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Requirements</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="requirements" class="form-control" required="true" style="resize: vertical"><?php echo $data['job']['job_requirements']; ?></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Openings</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name="openings" required="true">
                                                                    <option value>0</option>
                                                                    <?php for($i=0;$i<21;$i++) { ?>
                                                                    <option value="<?php echo $i; ?>" <?php if($i==$data['job']['job_openings']){ echo "selected"; } ?>><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <label class="control-label col-md-1">Deadline</label>
                                                            <div class="col-md-4">
                                                                <input type="date" name="application_deadline" class="form-control" required="true" value="<?php echo $data['job']['job_application_deadline']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Pay Status</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name="pay_status" required="true">
                                                                    <option value>Select Pay Status</option>
                                                                    <option value="paid" <?php if($data['job']['job_pay_status']=="paid") echo "selected"; ?>>Paid</option>
                                                                    <option value="unpaid" <?php if($data['job']['job_pay_status']=="unpaid") echo "selected"; ?>>Unpaid</option>
                                                                </select>
                                                            </div>
                                                            <label class="control-label col-md-1">Salary</label>
                                                            <div class="col-md-4">
                                                                <input type="text" name="salary" class="form-control" required="true" value="<?php echo $data['job']['job_salary']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <h4 class="form-section col-md-12 col-md-offset-3">Contact Person's Details</h4>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">First Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="c_fname" class="form-control" required="true" value="<?php echo $data['job']['job_contact_fname']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Last Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="c_lname" class="form-control" required="true" value="<?php echo $data['job']['job_contact_lname']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Position</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="c_position" class="form-control" required="true" value="<?php echo $data['job']['job_contact_position']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Phone</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="c_phone" class="form-control" required="true" value="<?php echo $data['job']['job_contact_phone']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" name="c_email" class="form-control" required="true" value="<?php echo $data['job']['job_contact_email']; ?>"/>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="form-actions">
                                                    <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                                                                    <a href="<?= base_url('admin/Manage_Job'); ?>" class="btn btn-default">Cancel</a>
                                                            </div>
                                                    </div>
                                            </div>
                                     <?php echo form_close(); ?>
                                    <!--</form>-->
                                    <!-- END FORM-->
                                </div>
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


<script>
$(document).ready(function() {
  <?php if(form_error('num', '<p style="color:red">* ', '</p>') != ''): ?>
     $('#num').focus();
  <?php endif; ?>
});
</script>
