<html>
<head>
	<meta charset="utf-8">
  <meta httpequiv="XUACompatible" content="IE=edge">
  <meta name="viewport" content="width=devicewidth, initialscale=1">
	<title>Ade Bayu Martin</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

	<script src="/js/jquery-3.1.0.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	
</head>

<body style="padding-top: 60px;">

<!-- Navigation -->
@include('shared.head_nav')
<!-- Content -->

	<div class="container clearfix">
		<div class="row row-offcanvas row-offcanvas-left">
		@include('shared.left_nav')

		<div id="main-content" class="col-xs-12 col-sm-9 main pull-right">
			<div class="panel-body">
				@if (Session::has('error'))
					<div class="session-flash alert-danger">
						{{ Session::get('error') }}
					</div>
				@endif
				@yield("content")
			</div>			
		</div>			
		</div>	
	</div>


	
</body>
</html>