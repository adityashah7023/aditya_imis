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
						<a href="<?= base_url(); ?>admin/Manage_Job/add">Add</a>
                                                <i class="fa fa-angle-right"></i>
					</li>
                                        <li>
                                            <a href="#">New Company</a>
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
                                            <i class="fa fa-pencil"></i>Add Details
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
                                    
                                    <?php echo form_open(base_url('admin/Manage_Job/insert_company')); ?>
                                            <div class="form-body">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="name" placeholder="e.g University of Windsor" class="form-control" required="true" value="<?php echo set_value('name'); ?>"/>
                                                            </div>
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-9">
                                                                <textarea name="description" placeholder="e.g Details of company" class="form-control" required="true" style="resize: vertical"><?php echo set_value('description'); ?></textarea>
                                                            </div>
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Website</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="website" id="website" placeholder="e.g http://www.domain.com" class="form-control" required="true" value="<?php echo set_value('website'); ?>"/>
                                                                <?php echo form_error('website', '<p style="color:red">* ', '</p>'); ?>
                                                            </div>
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Email</label>
                                                            <div class="col-md-9">
                                                                <input type="email" name="email" placeholder="e.g example@mail.com" class="form-control" required="true" value="<?php echo set_value('email'); ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Phone</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="phone" placeholder="e.g xxxxxxxxxx" class="form-control" required="true" value="<?php echo set_value('phone'); ?>"/>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Street1</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="street1" class="form-control" required="true" value="<?php echo set_value('street1'); ?>"/>
                                                            </div>
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Street2</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="street2" class="form-control" required="true" value="<?php echo set_value('street2'); ?>"/>
                                                            </div>
                                                            
                                                    </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">City</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="city" class="form-control" required="true" value="<?php echo set_value('city'); ?>"/>
                                                            </div>
                                                            
                                                    </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Province</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="province" class="form-control" required="true" value="<?php echo set_value('province'); ?>"/>
                                                            </div>
                                                            
                                                    </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Country</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="country" class="form-control" required="true" value="<?php echo set_value('country'); ?>"/>
                                                            </div>
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Postal Code</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="postal" placeholder="e.g XXX XXX" class="form-control" required="true" value="<?php echo set_value('postal'); ?>"/>
                                                                
                                                            </div>
                                                    </div>
                                                    
                                                    
                                            </div>
                                            <div class="form-actions">
                                                    <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                                                                    <a href="<?= base_url('admin/Manage_Job/add'); ?>" class="btn btn-default">Cancel</a>
                                                            </div>
                                                    </div>
                                            </div>
                                    <!--</form>-->
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
$this->load->view('admin/footer.php');
$this->load->view('admin/jscript.php');

?>

<script>
$(document).ready(function() {
  <?php if(form_error('website', '<p style="color:red">* ', '</p>') != ''): ?>
     $('#website').focus();
  <?php endif; ?>
});
</script>
