<?php
$col_data=[];
$row_total=[];
$col_total=[];
$all_total=[];

?>


<?php $__env->startSection('content'); ?>

<div id="content">
<!--breadcrumbs-->
<div id="content-header">
<div id="breadcrumb"> <a href="<?php echo e(route('dashboard')); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> <?php echo app('translator')->getFromJson("Home"); ?> </a></div>
</div>
<!--End-breadcrumbs-->
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
<h5><?php echo app('translator')->getFromJson('New Project Status Summary'); ?> </h5>
<div id="commentModal">
</div>
<div id="showun_P_Modal">
</div></div>
<form method="get" action="<?php echo e(route('new-project-status-summary.index')); ?>">

<div class="controls controls-row">
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label"><?php echo app('translator')->getFromJson('Select Ministry'); ?> </label>
        <div class="controls">
            <select name="min">
                <option></option>
               
                <?php $__currentLoopData = $ministry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aministry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(selected($aministry->id,$_GET['min']  ?? 0)); ?> value="<?php echo e($aministry->id); ?>"> <?php echo e($aministry->ministry_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>   
        </div>
    </div>
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label"><?php echo app('translator')->getFromJson('Select Agency'); ?> </label>
        <div class="controls">
            <select name="agen">
                <option></option>
                
                <?php $__currentLoopData = $agency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a_agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(selected($a_agency->id,$_GET['agen'] ?? 0)); ?> value="<?php echo e($a_agency->id); ?>"><?php echo e($a_agency->agency_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
               
               
            </select>
        </div>
    </div>
    <div class="span2 m-wrap">
        <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="control-label"><?php echo app('translator')->getFromJson('Select Sector'); ?> </label>
        <div class="controls">
            <select name="sec" onchange="sector_to_subsector(this)">
                <option></option>
                
                <?php $__currentLoopData = $sector; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(selected($asector->id,$_GET['sec'] ?? 0)); ?> value="<?php echo e($asector->id); ?>"> <?php echo e($asector->sector_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>              
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label"><?php echo app('translator')->getFromJson('Select SubSector'); ?></label>
        <div class="controls">
            <select id='sub_sector' name="sub_sec">
                <option></option>
             
                <?php $__currentLoopData = $subsector; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a_subsector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(selected($a_subsector->id,$_GET['sub_sec'] ?? 0)); ?> value="<?php echo e($a_subsector->id); ?>"> <?php echo e($a_subsector->sub_sector_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
	<div  class=" m-wrap">
        
    </div>
    <!--                 style="float:right"-->
    <div  class="span4 m-wrap">
        <label style=" padding-top: 20px" class="control-label"> </label>
        <div class="controls">
            <button name="search" value="search" class="btn btn-warning"  type="submit" ><i class="icon-search icon-white"></i></button>
        </div>
    </div>




</div>
</form>

<hr/>
<div id="1">
  <hr/>
 
<div class="widget-content nopadding">
    
   
    
     
    <table class="table table-bordered table-striped with-check" >
        <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('Serial No'); ?></th>
                <th><?php echo app('translator')->getFromJson('Agency Name'); ?></th>
                
                <?php $__currentLoopData = $new_project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th ><?php echo e(__($status)); ?></th>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <th><?php echo app('translator')->getFromJson('Total Project'); ?></th> 


            </tr>
            
        </thead>
      <tbody>
      
        <?php $__empty_1 = true; $__currentLoopData = $agency_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agencykey=>$m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr>
   
 
    <td><?php echo e($loop->iteration); ?></td>
    <td><?php echo e($commonclass->getValue($m->agency,'agency','agency_name')); ?></td>
    
        <?php $__currentLoopData = $new_project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td >
            <?php echo e($row_total[$key]=$commonclass->count_approval_project_via_agency($m->agency,$key)); ?>

            
        </td>
        <?php
       
        $col_data[$agencykey][$key]=$row_total[$key];

        
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
  
      
    <td >
       <?php echo e(array_sum($row_total)); ?>

    </td>
            
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
  
    <tr> 
    <td></td>
    <td><?php echo app('translator')->getFromJson('Total'); ?>:</td>

    
    
    <?php $__currentLoopData = $new_project_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skey=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <td >
          <?php $__currentLoopData = $col_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mycolkey=>$mycolvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                 $col_total[$mycolkey]=$col_data[$mycolkey][$skey];
            ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
            <?php echo e($all_total[]=array_sum($col_total)); ?>



       </td>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


       <td ><?php echo e(array_sum($all_total)); ?></td>
        </tr>
        </tbody>
    </table>
   
    <!--</form>-->
</div>
</div>
 <div class="form-actions pull-right span12"><hr/>
        <?php echo e(custome_print('1',false,__('Print Summary'))); ?>

</div>
</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additionalJS'); ?>
<script src="<?php echo e(asset('js/backend_js/matrix.tables.js')); ?>">
    

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>