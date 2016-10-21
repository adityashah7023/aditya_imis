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
                        
                        
                    
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			My Skills 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url(); ?>student/Dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?= base_url(); ?>student/Skill">My Skills</a>
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
                                            <i class="fa fa-pencil"></i>Add Skills
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
                                <?php echo form_open(base_url('student/Skill/insert')); ?>
                                    <div class="form-body">
                                        <?php if($data['skill']['count']!=0) {
                                            $count=0;
                                                for($i=0;$i<$data['skill']['count'];$i++){
                                                    $flag=0;
                                                    for($j=0;$j<$data['student_skill']['count'];$j++){
                                                        if($data['skill'][$i]['skill_id']==$data['student_skill'][$j]['skill_id']){
                                                            $flag=1;
                                                        }
                                                    }
                                                    if($flag==0){ $count++; ?>
                                                        
                                                <div class="form-group" title="<?php echo $data['skill'][$i]['skill_type']['sktyp_name']; ?>">
                                                        <label class="control-label col-md-1"><?php echo $data['skill'][$i]['skill_name']; ?></label>
                                                        <input type="hidden" name='id<?php echo $count; ?>' value="<?php echo $data['skill'][$i]['skill_id']; ?>" />
                                                        <div class="col-md-11">
                                                            <div class="radio-list">
                                                                <div class="col-md-3 bg-danger" >
                                                                    <label class="radio-inline">
                                                                        <div class="radio"><input type="radio" name="skill<?php echo $data['skill'][$i]['skill_id']; ?>" value="1" required="true" checked=""></div> Not at all competent </label>
                                                                </div>
                                                                <div class="col-md-3 bg-warning">
                                                                    <label class="radio-inline bg-warning">
                                                                    <div class="radio"><input type="radio" name="skill<?php echo $data['skill'][$i]['skill_id']; ?>" value="2" required="true" ></div> Little competent </label>
                                                                </div>
                                                                <div class="col-md-3 bg-info">
                                                                    <label class="radio-inline bg-info">
                                                                    <div class="radio"><input type="radio" name="skill<?php echo $data['skill'][$i]['skill_id']; ?>" value="3" required="true" ></div> Moderately competent </label>
                                                                </div>
                                                                <div class="col-md-3 bg-primary">
                                                                    <label class="radio-inline bg-primary">
                                                                    <div class="radio"><input type="radio" name="skill<?php echo $data['skill'][$i]['skill_id']; ?>" value="4" required="true" ></div> Extremely competent </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>            
                                                



                                                <?php }} if($count==0) { ?> 
                                            
                                                <div class="form-group">
                                                    <label class="control-label col-md-7">No Skills Found.</label>
                                                </div>
                                        
                                        <?php } else { ?>
                                        <input type="hidden" name="count" value="<?php echo $count; ?>" />
                                            <div class="form-actions">
                                                    <div class="row">
                                                            <div class="col-md-offset-4 col-md-8">
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                                                                    <a href="<?= base_url('student/Skill'); ?>" class="btn btn-default">Cancel</a>
                                                            </div>
                                                    </div>
                                            </div>

                                        <?php }} else { ?>

                                                <div class="form-group">
                                                    <label class="control-label col-md-7">No Skills Found.</label>
                                                </div>

                                        <?php }  ?>
                                    </div>
                                <?php echo form_close(); ?>
                                <!--</form>-->
                                <!-- END FORM-->
                                </div>
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
