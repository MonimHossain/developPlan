<?php 
    use App\Classes\CommonClass;
    $commonClass = new CommonClass();
?>
<!--sidebar-menu-->
<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard </a>
  <ul>
      <li class="active"><a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      

    <?php echo $commonClass->get_left_menu_tree(1); ?>


  </ul>
</div>
<!--sidebar-menu-->