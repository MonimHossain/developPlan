<?php $__env->startSection('content'); ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">

                <li class="bg_lb"> <a href="<?php echo e(route('adp_allocation.index')); ?>"> <i class="icon-dashboard"></i> <span class="label label-important"><?php echo e($draftplistCount); ?></span> ADP / RADP Preparation </a> </li>
                <li class="bg_ly"> <a href="<?php echo e(route('newproject.index')); ?>"> <i class="icon-inbox"></i><span class="label label-success"><?php echo e($newprojectCount); ?></span> UnApprove Project List </a> </li>
                <li class="bg_lo"> <a href="<?php echo e(route('approaved_project.index')); ?>"> <i class="icon-inbox"></i><span class="label label-success"><?php echo e($approveprojectCount); ?></span> Approve Project List </a> </li>
                <li class="bg_ly"> <a href="<?php echo e(route('newprojectlist.create')); ?>"> <i class="icon-th"></i><span class="label label-success"><?php echo e($totalProjectCount); ?></span> Total Project List</a> </li>
                <li class="bg_ls"> <a href="<?php echo e(route('allocated_project.index')); ?>"> <i class="icon-fullscreen"></i><span class="label label-success"><?php echo e($demandslistCount); ?></span> Allocated Project List </a> </li>

                <li class="bg_lg"> <a href="form-common.html"> <i class="icon-th-list"></i> Pending Project List </a> </li>
                <li class="bg_lb"> <a href="buttons.html"> <i class="icon-tint"></i> Rejected Project List </a> </li>
                <li class="bg_lr"> <a href="interface.html"> <i class="icon-pencil"></i>Project Approval Information</a> </li>

            </ul>
        </div>
        <!--End-Action boxes-->    

        <!--Chart-box-->    
        <!--        <div class="row-fluid">
                    <div class="widget-box">
                        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                            <h5>Site Analytics</h5>
                        </div>
                        <div class="widget-content" >
                            <div class="row-fluid">
                                <div class="span9">
                                    <div class="chart"></div>
                                </div>
                                <div class="span3">
                                    <ul class="site-stats">
                                        <li class="bg_lh"><i class="icon-user"></i> <strong>2540</strong> <small>No. of Project</small></li>
                                        <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>ADP Amount </small></li>
                                        <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>  Amount</small></li>
                                        <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small> Reveneu Amount</small></li>
                                        <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
                                        <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
        <!--End-Chart-box--> 
        <hr/>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Latest Submission</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG2">
                        <ul class="recent-posts">
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo e(asset('images/backend_images/demo/av1.jpg')); ?>"> </div>
                                <div class="article-post"> 
                                    <span class="user-info"> &nbsp;
                                        <!--By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM--> 
                                    </span>
                                    <p><a href="<?php echo e(route('adp_allocation.index')); ?>">Submitted project list for allocation.</a><span class="label label-success"><?php echo e($approveprojectCount); ?></span> </p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo e(asset('images/backend_images/demo/av2.jpg')); ?>"> </div>
                                <div class="article-post"> 
                                    <span class="user-info"> &nbsp;
                                        <!--By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM--> 
                                    </span>
                                    <p><a href="<?php echo e(route('newproject.index')); ?>">Submitted project list for selection.</a><span class="label label-success"><?php echo e($demandslistCount); ?></span> </p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="<?php echo e(asset('images/backend_images/demo/av4.jpg')); ?>"> </div>
                                <div class="article-post"> <span class="user-info"> &nbsp;
                                        <!--By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM--> 
                                    </span>
                                    <p><a href="#">Submitted project list for re appropriation.</a> </p>
                                </div>
                            </li>
                            <li>
                                <!--<button class="btn btn-warning btn-mini">View All</button>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG4"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Guidline Time Schedule</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG4">
                        <table class="table table-bordered data-table dtable" id="dataList">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('Guideline For'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Call Notice Type'); ?></th>
                                    <th><?php echo app('translator')->getFromJson("Fiscal Year"); ?></th>
                                    <th><?php echo app('translator')->getFromJson("Agency Date"); ?></th>
                                    <th><?php echo app('translator')->getFromJson("Ministry Date"); ?></th>
                                    <th><?php echo app('translator')->getFromJson("Sector Division Date"); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Send Date'); ?></th>
                                    <!--<th><?php echo app('translator')->getFromJson('Guideline Status'); ?></th>-->
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $__currentLoopData = $guidelinelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guideline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($guideline->guideline_for==0?"ADP":"RADP"); ?> </td>
                                    <td><?php echo e($guideline->call_notice_type==0?"Call notice 1":"Call notice 2"); ?> </td>
                                    <td><?php echo $commonclass->datetoyear($commonclass->getvalue($guideline->fiscal_year,'FiscalYear','start_date'))."-".$commonclass->datetoyear($commonclass->getvalue($guideline->fiscal_year,'FiscalYear','end_date')); ?></td>
                                    <td>
                                        <?php echo e($commonclass->dateToview($guideline->agency_date)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($commonclass->dateToview($guideline->ministry_date)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($commonclass->dateToview($guideline->sector_division_date)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($commonclass->dateToview($guideline->created_at)); ?>

                                    </td>
                                    <!--<td><?php echo e($guideline->guideline_status==0?"Completed":"In progress"); ?> </td>-->
                                </tr>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">


                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG23"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Latest Updates</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG23">


                        <table class="table table-bordered table-striped with-check dtable" id="dataList">
                            <thead>
                                <tr>
                                    <th style="width: 70%;"><?php echo app('translator')->getFromJson('Project Name And Implementaion Preiod'); ?></th>
                                    <th><?php echo app('translator')->getFromJson("Project Cost"); ?></th>
                                    <th><?php echo app('translator')->getFromJson("Updates"); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $newprojectlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $un_p_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align: center"><?php echo e($un_p_list->project_tiltle_bn); ?><br/>(<?php echo e($un_p_list->date_of_commencement); ?> To <?php echo e($un_p_list->date_of_completion); ?>)</td>
                                    <td> <?php echo e($un_p_list->project_code); ?> </td>
                                    <td style=" text-align: center"> <?php if($un_p_list->project_status==0 || $un_p_list->project_status==null): ?> <?php echo e("Pending"); ?> <?php else: ?> <?php echo e("Approved"); ?> <?php endif; ?> </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <ul class="recent-posts">
                            <li>
                                <!--<button class="btn btn-warning btn-mini">View All</button>-->
                                <a class="btn btn-warning btn-mini" href="<?php echo e(route('newproject.index')); ?>">  Load More  </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG25"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Project implementation period is about to end</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG25">

                        <table class="table table-bordered table-striped with-check dtable" id="dataList">
                            <thead>
                                <tr>
                                    <th style="width: 70%;"><?php echo app('translator')->getFromJson('Project Name'); ?></th>
                                    <th><?php echo app('translator')->getFromJson("Implementation Deadline"); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $newprojectlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $un_p_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align: center"><?php echo e($un_p_list->project_tiltle_bn); ?></td>
                                    <td style=" text-align: center"> <?php echo e(date('Y',strtotime($un_p_list->date_of_commencement))); ?> To <?php echo e(date('Y',strtotime($un_p_list->date_of_completion))); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <ul class="recent-posts">
                            <li>
                                <!--<button class="btn btn-warning btn-mini">View All</button>-->
                                <a class="btn btn-warning btn-mini" href="<?php echo e(route('newproject.index')); ?>">  Load More  </a>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<!--end-main-container-part-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>