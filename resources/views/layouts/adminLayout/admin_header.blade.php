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
        <i class="icon icon-user"></i>  <span class="text" style="font-family: cursive">@lang('Welcome') {{{ Auth::user()->name }}}</span><b class="caret">

        </b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i>@lang('My Profile') </a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i>@lang('My Tasks')</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('/logout') }}"><i class="icon-key"></i>@lang('Log Out') </a></li>
      </ul>
    </li>

    <li class="dropdown" id="menu-messages">
      <a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
        <i class="icon icon-envelope"></i>
        <span class="text">@lang('Messages')</span>
        <!--<span class="label label-important">5</span>-->
        <b class="caret"></b>
      </a>
        <?php 
        use App\Guideline;
        $item=Guideline::all();
        ?>
      <ul class="dropdown-menu">
          <li><a class="sInbox" title="" href="{{ route('guideline.showguideline')}}" ><i class="icon-envelope"></i> @lang('Guideline') <span class="label label-important pull-right"><?php echo count($item); ?></span> </a>  </li>
        <li class="divider"></li>
<!--        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i>@lang('new message')</a></li>
        <li class="divider"></li>-->
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> @lang('inbox')</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> @lang('outbox')</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> @lang('trash')</a></li>
      </ul>
    </li>


    {{--<li class="dropdown" id="menu-messages">--}}
      {{--<a href="#" data-toggle="dropdown" data-target="" class="dropdown-toggle">--}}
        {{--<i class="icon icon-envelope"></i>--}}
        {{--<span class="text">@lang('Switch Language')</span>--}}
        {{--<span class="label label-important">2</span>--}}
        {{--<b class="caret"></b>--}}
      {{--</a>--}}

      {{--<ul class="dropdown-menu">--}}


        {{--<label><input style="font-family: cursive; background: #78b34b;color: #1d2124"><input class="sAdd" type="radio" value="en" name="locale" onchange="changeLocale(this);"> @lang('English') </label>--}}
        {{--<label><input style="font-family: cursive; background: #ffd78b;color: #1d2124"> <input class="sInbox" type="radio" value="bn" name="locale" onchange="changeLocale(this);">@lang('Bangla')</label>--}}



      {{--</ul>--}}
    {{--</li>--}}


    <li class="dropdown" id="switch-language">
        <a href="#" data-toggle="dropdown" data-target="#switch-language" class="dropdown-toggle">
        <i class="icon icon-envelope"></i> <span class="text">@lang('Switch Language')</span>
        <!--<span class="label label-important">2</span>-->
        <b class="caret"></b>
      </a>
        <ul class="dropdown-menu">
<!--            <li>
                <a>
                    <div style=" background: #b3afaa" id="change-language" class="controls">
                        <label class="icon-check"><input style="visibility:hidden" type="radio" value="en"  name="locale" onchange="changeLocale(this);">@lang('English')</label>
                    </div>
                </a>
            </li>-->
            <li style=" cursor: pointer;"><a class="sInbox" title="" onclick="changeLocale('en');" ><img src="{{ asset('public/images/backend_images/usa-flag.png') }}" alt="alt text"> &nbsp; @lang('English')</a></li>
            <li class="divider"></li>
            <li style=" cursor: pointer;"><a class="sInbox" title="" onclick="changeLocale('bn');" ><img src="{{ asset('public/images/backend_images/bd-flag.png') }}" alt="alt text"> &nbsp;  @lang('Bangla')</a></li>
<!--            <li>
                <a>
                    {{--box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); display: block;--}}
                    <div style=" background: #b3afaa" >
                        <label   class="icon-check"><input style="visibility:hidden" type="radio" value="bn" name="locale"  onchange="changeLocale(this);">@lang('Bangla')</label>
                    </div>
                </a>
            </li>-->
        </ul>
    </li>



    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">@lang('Settings')</span></a></li>
    <li class=""><a title="" href="{{ url('/logout') }}"><i class="icon icon-share-alt"></i> <span class="text">@lang('Log Out')</span></a></li>
  </ul>
      
      
      
</div>


<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="@lang('Search here...')"/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->


   
