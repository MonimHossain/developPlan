<?php $__env->startSection('content'); ?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="<?php echo e(route('dashboard')); ?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>  <?php echo app('translator')->getFromJson('BackTohome'); ?> </a></div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                   
                    <div class="clearfix">
                        <span class="pull-right"> <a href="<?php echo e(route('menucreation.create')); ?>" class="btn btn-success "><i class="icon-plus"></i> <?php echo app('translator')->getFromJson('Add'); ?></a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5><?php echo app('translator')->getFromJson('Data table'); ?></h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('ID'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Name'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Parent Menu'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Sequence'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Status'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('Action'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    $status_array=$commonClass->common_Array('status');
                                ?>
                                <?php $__currentLoopData = $all_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($amenu->id); ?></td>
                                        <td><?php echo e($amenu->name); ?></td>
                                        <td><?php echo e($commonClass->getValue($amenu->parent_menu,'menu','name')); ?></td>
                                        <td><?php echo e($amenu->sequence); ?></td>
                                        <td><?php echo e($status_array[$amenu->status]); ?> </td>
                                        <td>
                                            <a href="<?php echo e(route('menucreation.edit',$amenu->id)); ?>" class="btn btn-success pull-left"> <i class="icon-edit"></i> <?php echo app('translator')->getFromJson('Edit'); ?></a>
                                            <form action="<?php echo e(route('menucreation.destroy', $amenu->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i> <?php echo app('translator')->getFromJson('Delete'); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>