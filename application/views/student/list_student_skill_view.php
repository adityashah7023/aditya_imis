<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$this->load->view('student/header.php');
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
			<div class="modal fade" id="new_edu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title"><b>New Skill</b></h4>
						</div>
                                                <?php echo form_open(base_url('student/Skill/insert')); ?>
						<div class="modal-body">
                                                    
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
			My Skills 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url("student/Dashboard"); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">My Skills</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom">
                                            <i class="icon-calendar"></i>&nbsp; <?php date_default_timezone_set("America/Toronto"); echo date('D , d M Y'); ?>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
                        <div id="delete_msg">
                            
                        </div>    
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bars"></i>List of Skills
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
											<a href="<?= base_url("student/Skill/add"); ?>" class="btn btn-success">
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
                                                                                                        <a href="javascript:htmltopdf();">Save as PDF</a>
													
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
							<table class="table table-striped table-bordered table-hover" id="sample_6">
							<thead>
							<tr>
                                                                <th>
                                                                    No.
                                                                </th>
								<th>
                                                                    Name
								</th>
								<th>
                                                                    Type
								</th>
                                                                <th>
                                                                    Rating
                                                                </th>
                                                                <th>
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
                                                        <?php
                                                        if($data['student_skill']['count']!=0){
                                                            for($i=0;$i<$data['student_skill']['count'];$i++){
                                                                if($data['student_skill'][$i]['stsk_status']=="enable"){
                                                        ?>
							<tr class="odd gradeX">
								<td>
									 <?php echo $i+1; ?>
								</td>
								<td>
									<?php echo $data['student_skill'][$i]['skill']['skill_name']; ?>
								</td>
								<td>
									 <?php echo $data['student_skill'][$i]['skill']['skill_type']['sktyp_name']; ?>
								</td>
                                                                <td>
									 
                                                                         <?php if($data['student_skill'][$i]['stsk_points']==1) { ?>
                                                                    <div class="col-md-5"><span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: lightgray"> </span> <span class="col-sm-2 fa fa-star" style="color: lightgray"> </span> <span class="col-sm-2 fa fa-star" style="color: lightgray"> </span> </div>
                                                                         <?php } else if($data['student_skill'][$i]['stsk_points']==2) { ?>
                                                                    <div class="col-md-5"><span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: lightgray"> </span> <span class="col-sm-2 fa fa-star" style="color: lightgray"> </span></div>
                                                                         <?php } else if($data['student_skill'][$i]['stsk_points']==3) { ?>
                                                                    <div class="col-md-5"><span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: lightgray"> </span></div>
                                                                         <?php } else { ?>
                                                                        <div class="col-md-6"><span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: #f89406"> </span> <span class="col-sm-2 fa fa-star" style="color: #f89406"> </span></div>
                                                                         <?php } ?>
								</td>
								<td style="border-right: 0px;">
									<a onclick="deleteMe('<?php echo $data['student_skill'][$i]['stsk_id']; ?>');" class="btn btn-sm btn-danger">
									Remove </a>
								</td>
							</tr>
                                                            <?php }}}  else { ?>
                                                        <tr>
                                                            <td style="border-right: 0px"></td><td style="border-left: 0px;border-right: 0px;"></td><td style="border-left: 0px;border-right: 0px;" class="center">No data available.</td><td style="border-left: 0px;border-right: 0px;"></td><td style="border-left: 0px;border-right: 0px;"></td><td style="border-right: 0px"></td>
                                                        </tr>
                                                        <?php } ?>
							</tbody>
							</table>
                                                        <script>
                                                    function deleteMe(id){
                                                        var c=confirm("Are you Sure want to remove this?");
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

                                                                    xmlhttp.open("POST","<?= base_url(); ?>student/Skill/delete/"+id,true);
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

$this->load->view('student/footer.php');
$this->load->view('student/jscript.php');
?>
