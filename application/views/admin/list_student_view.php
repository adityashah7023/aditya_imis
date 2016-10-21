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
						<a href="<?= base_url("admin/Dashboard"); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Manage Students</a>
                                                <i class="fa fa-angle-right"></i>
					</li>
                                        <li>
                                            <a href="#">List</a>
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
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bars"></i>List of Students
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a href="<?= base_url('admin/Manage_Student/add'); ?>" class="btn btn-success">
											Add New <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="#">
													Print </a>
												</li>
												<li>
													<a href="#">
													Save as PDF </a>
												</li>
												<li>
													<a href="#">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_4">
							<thead>
							<tr>
                                                            <th>
                                                                Student Num
                                                            </th>
								<th>
									 Name
								</th>
								<th>
									 Email
								</th>
								<th>
									 Gender
								</th>
								<th>
									 Contact No
								</th>
                                                                <th>
									 Nationality
								</th>
                                                                <th>
									 Intern Status
								</th>
                                                                <th>
									 Intake
								</th>
                                                                <th colspan="2">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
                                                        <?php if($data['student']['count']!=0){
                                                            for($i=0;$i<$data['student']['count'];$i++){
                                                                if($data['student'][$i]['stu_status']=="enable"){
                                                        ?>
							<tr class="odd gradeX">
								<td>
                                                                    <a href="<?= base_url("admin/Student_Profile/".$data['student'][$i]['stu_num']); ?>"><?php echo $data['student'][$i]['stu_num']; ?></a>
								</td>
								<td>
									 <?php echo $data['student'][$i]['stu_fname']." ".$data['student'][$i]['stu_mname']." ".$data['student'][$i]['stu_lname']; ?>
								</td>
                                                                <td>
									<a href="<?php echo $data['student'][$i]['stu_email']; ?>">
									<?php echo $data['student'][$i]['stu_email']; ?> </a>
								</td>
								<td>
                                                                        <?php if($data['student'][$i]['stu_gender']=="male"){ ?>
                                                                        <span class="badge badge-primary">
									M </span>
                                                                        <?php } else { ?>
                                                                        <span class="badge badge-danger">
									F </span>    
                                                                        <?php } ?>
								</td>
								<td class="center">
									 <?php echo $data['student'][$i]['stu_contact_no']; ?>
								</td>
								<td class="center">
									 <?php echo $data['student'][$i]['stu_nationality']; ?>
								</td>
                                                                <td class="center">
                                                                         <?php if($data['student'][$i]['stu_internship_status']=="Available"){ ?>
                                                                         <span class="badge badge-warning">
                                                                         Available </span>
                                                                         <?php } else { ?>
                                                                         <span class="badge badge-success">
									 Hired </span>
                                                                         <?php } ?>
								</td>
                                                                <td class="center">
									 <?php echo $data['student'][$i]['stu_intake_term']." ".$data['student'][$i]['stu_intake_year']; ?>
								</td>
                                                                <td>
									<a href="<?= base_url('admin/Manage_Student/edit'); ?>/<?php echo $data['student'][$i]['stu_num']; ?>" class="btn btn-sm btn-success">
									Edit </a>
								</td>
                                                                <td>
									<a onclick="deleteMe('<?php echo $data['student'][$i]['stu_num']; ?>');" class="btn btn-sm btn-danger">
									Delete </a>
								</td>
							</tr>
                                                        <?php }}}  else { ?>
                                                                
                                                        <?php } ?>
							</tbody>
							</table>
                                                    <script>
                     function deleteMe(id){
                        var c=confirm("Do you really want to remove this student?");
                        if(c==true)
                        {
                            var xmlhttp;
                                    if(window.XMLHttpRequest)
                                    {//code for IE7+,Firefox,Chrome,Opera,Safari 
                                        xmlhttp=new XMLHttpRequest();
                                    }
                                    else
                                    {//code for IE5,IE6
                                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange=function()
                                    {
                                        if(xmlhttp.readyState==4 && xmlhttp.status==200)
                                            {
                                                document.getElementById("delete_msg").innerHTML=xmlhttp.responseText;
                                            }
                                    }

                                    xmlhttp.open("POST","<?= base_url(); ?>admin/Manage_Student/delete/"+id,true);
                                    xmlhttp.send();
                        }
                        else{

                        }
                    }
                    </script>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url(); ?>assets/scripts/app.js"></script>
<script src="<?= base_url(); ?>assets/scripts/table-managed.js"></script>
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
