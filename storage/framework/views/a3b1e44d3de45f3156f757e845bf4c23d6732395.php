<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html"> ADP Budget & Management System </a></h1>

</div>

<!--close-Header-part--> 

<!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">

  <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
      <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
        <i class="icon icon-user"></i>  <span class="text" style="font-family: cursive"><?php echo app('translator')->getFromJson('Welcome'); ?> <?php echo e(Auth::user()->name); ?></span><b class="caret">

        </b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i><?php echo app('translator')->getFromJson('My Profile'); ?> </a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i><?php echo app('translator')->getFromJson('My Tasks'); ?></a></li>
        <li class="divider"></li>
        <li><a href="<?php echo e(url('/logout')); ?>"><i class="icon-key"></i><?php echo app('translator')->getFromJson('Log Out'); ?> </a></li>
      </ul>
    </li>

    <li class="dropdown" id="menu-messages">
      <a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
        <i class="icon icon-envelope"></i>
        <span class="text"><?php echo app('translator')->getFromJson('Messages'); ?></span>
        <!--<span class="label label-important">5</span>-->
        <b class="caret"></b>
      </a>
        <?php 
        use App\Guideline;
        $item=Guideline::all();
        ?>
      <ul class="dropdown-menu">
          <li><a class="sInbox" title="" href="<?php echo e(route('guideline.showguideline')); ?>" ><i class="icon-envelope"></i> <?php echo app('translator')->getFromJson('Guideline'); ?> <span class="label label-important pull-right"><?php echo count($item); ?></span> </a>  </li>
        <li class="divider"></li>
<!--        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i><?php echo app('translator')->getFromJson('new message'); ?></a></li>
        <li class="divider"></li>-->
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> <?php echo app('translator')->getFromJson('inbox'); ?></a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> <?php echo app('translator')->getFromJson('outbox'); ?></a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> <?php echo app('translator')->getFromJson('trash'); ?></a></li>
      </ul>
    </li>


    
      
        
        
        
        
      

      


        
        



      
    


    <li class="dropdown" id="switch-language">
        <a href="#" data-toggle="dropdown" data-target="#switch-language" class="dropdown-toggle">
        <i class="icon icon-envelope"></i> <span class="text"><?php echo app('translator')->getFromJson('Switch Language'); ?></span>
        <!--<span class="label label-important">2</span>-->
        <b class="caret"></b>
      </a>
        <ul class="dropdown-menu">
<!--            <li>
                <a>
                    <div style=" background: #b3afaa" id="change-language" class="controls">
                        <label class="icon-check"><input style="visibility:hidden" type="radio" value="en"  name="locale" onchange="changeLocale(this);"><?php echo app('translator')->getFromJson('English'); ?></label>
                    </div>
                </a>
            </li>-->
            <li style=" cursor: pointer;"><a class="sInbox" title="" onclick="changeLocale('en');" ><img src="<?php echo e(asset('public/images/backend_images/usa-flag.png')); ?>" alt="alt text"> &nbsp; <?php echo app('translator')->getFromJson('English'); ?></a></li>
            <li class="divider"></li>
            <li style=" cursor: pointer;"><a class="sInbox" title="" onclick="changeLocale('bn');" ><img src="<?php echo e(asset('public/images/backend_images/bd-flag.png')); ?>" alt="alt text"> &nbsp;  <?php echo app('translator')->getFromJson('Bangla'); ?></a></li>
<!--            <li>
                <a>
                    
                    <div style=" background: #b3afaa" >
                        <label   class="icon-check"><input style="visibility:hidden" type="radio" value="bn" name="locale"  onchange="changeLocale(this);"><?php echo app('translator')->getFromJson('Bangla'); ?></label>
                    </div>
                </a>
            </li>-->
        </ul>
    </li>



    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text"><?php echo app('translator')->getFromJson('Settings'); ?></span></a></li>
    <li class=""><a title="" href="<?php echo e(url('/logout')); ?>"><i class="icon icon-share-alt"></i> <span class="text"><?php echo app('translator')->getFromJson('Log Out'); ?></span></a></li>
  </ul>
      
      
      
</div>


<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="<?php echo app('translator')->getFromJson('Search here...'); ?>"/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->


   
