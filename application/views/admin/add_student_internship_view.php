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
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Manage Internship
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url(); ?>admin/Dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manage Internship</a>
                                                <i class="fa fa-angle-right"></i>
					</li>
                                        <li>
                                            <a href="#">Add</a>
                                        </li>
				</ul>
				<div class="page-toolbar">
					<div class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom">
                                            <i class="icon-calendar"></i>&nbsp; <?php date_default_timezone_set("America/Toronto"); echo date('D , d M Y'); ?>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet">
                                    <div class="portlet-title">
                                            <div class="caption">
                                                    <i class="fa fa-pencil"></i>Student Details
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
                                            

                                                    <div class="form-body">
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Student No</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="" class="form-control" required="true" value="<?php echo $data['stjin']['stu_num']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Name</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="" class="form-control" required="true" value="<?php echo $data['stjin']['student']['stu_fname']." ".$data['stjin']['student']['stu_lname']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Internship Status</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="" class="form-control" required="true" value="<?php echo $data['stjin']['student']['stu_internship_status']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Email</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="true"  class="form-control" required="true" value="<?php echo $data['stjin']['student']['stu_email']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Contact</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="true" class="form-control" required="true" value="<?php echo $data['stjin']['student']['stu_contact_no']; ?>"/>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="form-actions">
                                                            <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                            
                                                                    </div>
                                                            </div>
                                                    </div>
                                             
                                            <!--</form>-->
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portlet">
                                    <div class="portlet-title">
                                            <div class="caption">
                                                    <i class="fa fa-pencil"></i>Job Details
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
                                            

                                                    <div class="form-body">
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Title</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="" class="form-control" required="true" value="<?php echo $data['stjin']['job']['job_position']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Group</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="" class="form-control" required="true" value="<?php echo $data['stjin']['job']['job_group']['jbgrp_name']." ".$data['stjin']['student']['stu_lname']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Type</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="" class="form-control" required="true" value="<?php echo $data['stjin']['job']['internship_type']['intp_name']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Contact Person</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="true"  class="form-control" required="true" value="<?php echo $data['stjin']['job']['job_contact_fname']." ".$data['stjin']['job']['job_contact_lname']; ?>"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-md-4">Contact Details</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled="true" class="form-control" required="true" value="<?php echo $data['stjin']['job']['job_contact_phone']; ?>"/>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="form-actions">
                                                            <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                            
                                                                    </div>
                                                            </div>
                                                    </div>
                                             
                                            <!--</form>-->
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="portlet">
                            <div class="portlet-title">
                                    <div class="caption">
                                            <i class="fa fa-pencil"></i>Internship Details
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
                                    <?php echo form_open(base_url('admin/Student_Internship/insert/'.$data['stjin']['stjin_id'])); ?>

                                            <div class="form-body">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-4">Starts From </label>
                                                            <div class="col-md-6">
                                                                <input type="date" name="from" class="form-control" required="true" />
                                                                <input type="hidden" name="student" value="<?php echo $data['stjin']['stu_num']; ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-4">Till </label>
                                                            <div class="col-md-6">
                                                                <input type="date" name="end" class="form-control" required="true"/>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="form-actions">
                                                    <div class="row">
                                                            <div class="col-md-offset-5 col-md-7">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                                                                    <a href="<?= base_url('admin/Manage_Student'); ?>" class="btn btn-default">Cancel</a>
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
