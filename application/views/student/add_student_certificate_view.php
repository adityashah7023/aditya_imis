<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php $this->load->view('student/header.php');
        $this->load->view('student/top_nav.php'); ?>
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
			<div class="modal fade" id="new_cert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title"><b>New Certificate</b></h4>
						</div>
                                                <?php echo form_open(base_url('student/Certificate/insert_certification')); ?>
						<div class="modal-body">
                                                    <div class="form-horizontal form-row-seperated">
                                                    <!-- BEGIN FORM-->
                                                    
                                                            <div class="form-body">
                                                                    <div class="form-group">
                                                                            <label class="control-label col-md-3">Name</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" name="name" class="form-control" required="true" />
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label class="control-label col-md-3">Authority</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" name="auth" placeholder="Issuing Authority" class="form-control" required="true"/>
                                                                            </div>
                                                                    </div>

                                                            </div>
                                                            
                                                     
                                                    <!--</form>-->
                                                    <!-- END FORM-->
                                                    </div>
						</div>
						<div class="modal-footer">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
                                            <?php echo form_close(); ?>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			New Certification 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url(); ?>student/Dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?= base_url(); ?>student/Certificate/add">My Certification</a>
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
			<div class="portlet">
                            <div class="portlet-title">
                                    <div class="caption">
                                            <i class="fa fa-pencil"></i>Add Certificate Details
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
                                    <?php echo form_open(base_url('student/Certificate/insert')); ?>
                                            <div class="form-body">
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Certification</label>
                                                            <div class="col-md-7">
                                                                <select class="form-control" name="cert" required="true">
                                                                    <option value>Select Certificate</option>
                                                                    <?php for($i=0;$i<$data['certificate']['count'];$i++) { 
                                                                            if($data['certificate'][$i]['cert_status']=="enable"){
                                                                            $flag=0;
                                                                            for($j=0;$j<$data['student_certificate']['count'];$j++){
                                                                                if(($data['student_certificate'][$j]['stce_status']=="enable")&&($data['certificate'][$i]['cert_id']==$data['student_certificate'][$j]['cert_id'])){
                                                                                    $flag=1;
                                                                                }
                                                                            }
                                                                            if($flag==0){
                                                                        ?>
                                                                    <option value="<?php echo $data['certificate'][$i]['cert_id']; ?>" <?php echo set_select('cert',$data['certificate'][$i]['cert_id']); ?>><?php echo $data['certificate'][$i]['cert_name'].", ".$data['certificate'][$i]['cert_body']; ?></option>
                                                                    <?php } }}
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class='col-md-2'>
                                                                <a href='#new_cert' data-toggle="modal" class="btn btn-info col-md-12">Add <i class='fa fa-plus'></i></a>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Received On</label>
                                                            <div class="col-md-9">
                                                                <input type="date" name="rec_date" class="form-control" required="true" value="<?php echo set_value('rec_date'); ?>"/>
                                                            </div>
                                                    </div>
                                                    
                                            </div>
                                            <div class="form-actions">
                                                    <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                                                                    <a href="<?= base_url('student/Certificate'); ?>" class="btn btn-default">Cancel</a>
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
