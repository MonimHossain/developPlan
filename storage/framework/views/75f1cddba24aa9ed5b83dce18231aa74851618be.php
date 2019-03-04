<!DOCTYPE html>
<html>
<head>
	<title>ADP Budget Management System</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/pmis/favicon.ico" type="image/x-icon" rel="icon" /><link href="/pmis/favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="/pmis/css/admin/style.css" />
	<link rel="stylesheet" type="text/css" href="/pmis/css/dashboard-common.css" />


	<script type="text/javascript" src="/pmis/js/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/pmis/js/bootstrap3/bootstrap.min.js"></script>
	<script type="text/javascript" src="/pmis/js/dashboard-common.js"></script> -->
</head>
<body>



	<div class="container">

	</div>


	<style type="text/css">

	body {
		/*background: url("/pmis/img/shade.png") repeat-y ;
		background-size: contain;*/
		background:#fff;
	}
	.container {
		max-width: 888px;
	}
	.login-topbar {
		/*border-bottom: #c5c5c5 2px solid;*/
		background:#0a8822;
		color: #fff;
	}
	.login-ftr {
		border-top: #c5c5c5 2px solid;
		background: #fff;
	}
	.login-topbar h1 {
		display: block;
		text-align: center;
		font-size: 30px;
		margin: 23px 6px;
	}
	.login-ftr h3 {
		display: block;
		text-align: center;
		font-size: 30px;
		margin: 5px 6px;
	}
	.login-bdy {
		padding: 40px 0px;
	}
	.login-bdy .form-control {
		background: none;
		border-radius: 4px;
	}
	.bgdivider {
		margin: 0 auto;
		min-height:380px;
		background: #ccc;
		width: 1px;
	}
	.login-bdy img {
		display: block;
		width: 100%;
		margin: 0px;
	}
	.login-topbar h1 {
		font-family: "HelveticaNeue",Arial,sans-serif;
	}
	.login-bdy h3 {
		font-family: "HelveticaNeue",Arial,sans-serif;
		margin-bottom: 10px;
		margin-top: 20px;
		font-size: 24px;
	}
	.login-bdy label {
		font-family: "HelveticaNeue",Arial,sans-serif;
		font-size: 14px;
		font-weight: bold;
		margin-bottom: 5px;
	}	
	.login-bdy .animate5 {
		padding-top: 12px;
		padding-bottom: 7px;
	}
	.login-bdy .animate7 img {
		border-radius: 4px;
	}	 
	.login-bdy .form-group {
		margin-bottom: 10px;
	}
	.login-bdy .row {
		margin-left: -15px;
	}
	.frm-bottom-top .row {
		margin-left: -16px;
	}
	.frm-bottom-top a {
		text-decoration: none;
	}
	.frm-bottom-top .btn-primary {
		background-image:none;
		border-radius: 4px;
		background: #337ab7;
		border: none;
		padding: 7px;
		font-family: "HelveticaNeue",Arial,sans-serif;
		font-weight: normal;
		font-size: 14px;
	}
	.rp-gov {
		font-size: 23px;
	}

	.login-ftr {
		width: 100%;
	}

	.pmisscroll{ 
		margin: 0 auto;
		overflow: hidden;
		width: 60%;
	}
	.pmisscroll p{
		position:relative;
		float: left;
		font-weight: bold;
		color: red;
		animation: floatText 10s infinite alternate ease-in-out;
	}

	.login-ftr {
		background:#0a8822 ;
		border: none;
		padding: 10px;
		color: #fff;
	}
	.login-ftr a {
		color: #fff;
		text-decoration: none;
	}

	@-webkit-keyframes floatText{
		from {
			left: 00%;
		}

		to {
			/* left: auto; */
			left: 30%;
		}
	}

	@media  only screen and (max-width:768px) {
		.bgdivi {
			display: none;
		}
		.login-ftr .col-md-6 {
			text-align: center;
		}
	}

</style>
<section class="login-topbar">
	<div class="container">
		<div style="text-align:center; padding:15px 0px;">

			<div class="project_title">
				<span class="rp-gov">Government of the People's Republic of Bangladesh</span><br><span style="font-weight:normal;font-size:16px">Programming Division, Planning Commission<br>Web Based ADP Budget Management System
					<!--<div class="pmisscroll"> <p>Annual Development Programme(ADP)</p></div>-->
                                </span>		
				</div>

			</div>
			
		</div>
	</section>

	<section class="login-bdy">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-5">
					<!--<img src="<?php echo e(asset('images/backend_images/login-flow.png')); ?>">-->
				</div>

				<div class="col-md-2 col-sm-2 bgdivi">
					<div class="bgdivider"></div>
				</div>				
				<div class="col-md-5 col-sm-5">
					<h3>Sign In</h3>


					<form action="<?php echo e(url('admin')); ?>" id="loginform" class="form-signin" role="form" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/>
						<?php echo csrf_field(); ?>

					</div>					<div>
						<div class="form-group">
							<label> Email *</label>

							<span class="field"><input name="email" class="form-control" id="username" data-validation-type="present" tabindex="1" placeholder="Email" type="email" required="required"/>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group">
								<label>Password *</label>
								<span class="field"><input name="password" class="form-control" autocomplete="off" id="password" data-validation-type="present" placeholder="Password" tabindex="2" type="password" required="required"/>                            <p class="help-block text-danger"></p>
								</div>
							</div>


							<div class="frm-bottom-top">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<a href="#"> বাংলা </a>							
										</div>
									</div>
									<div class="col-md-6 text-right">
										<a href="#">Forgot Password?</a>						</div>
									</div>
								</div>

								<div class="frm-bottom-top">
									<div class="row">
										<div class="col-md-12">
											<button class="btn btn-block btn-primary">Log In</button>
										</div>
									</div>
								</div>
								<div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="723e82f8b8bcac862d6ad3ad4c8966caac50aa76%3A" id="TokenFields241936323"/><input type="hidden" name="data[_Token][unlocked]" value="" id="TokenUnlocked1358542338"/></div></form>                    </div>
							</div>
						</div>
					</section>

					<section class="login-ftr navbar-fixed-bottom">
						<div class="container-fluid">
							<div class="col-md-6  col-sm-6 col-sm-12 text-left">
								<p> 
								<!--Planning Commission-->
                                                                Design & Developed by <a href="">IBCS-PRIMAX Software(Bangladesh) Limited</a>
                                                                </p>

							</div>
							<div class="col-md-6 col-sm-6 col-sm-12 text-right">
								<p>Copyright © 2019 <a href='#'>Programming Division,Planning Commission
</a></p>
							</div>
						</div>
					</section>


					<!-- <div class="loginshadow animate3 fadeInUp"></div> -->

					<script type="text/javascript">


					</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


	<script type="text/javascript">
     <?php if(session()->get('flash_message_error')): ?>
    var message= "<?php echo e(session()->get('flash_message_error')); ?>";
    swal({
        //title: "Error",
        text: message,
        html: true,
        icon:'info'
    });
    <?php endif; ?>
</script>				

				</body>
				</html>
