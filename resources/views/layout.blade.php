<!DOCTYPE html>
<!-- Tchat -->

<!-- 
/***********************************/
Réalisation du site : Edouard Boissel [Creasitenet] 
URL : http://www.creasitenet.com
Contact: creasitenet.com@gmail.com
/***********************************/
-->

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tchat</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon" type="image/ico" />
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon" type="image/ico" />
    <meta name="_token" content="{!! csrf_token() !!}" />
    <base href="{{ URL::to('/') }}/" />

  <!-- CSS -->
    <!-- Bootstrap  -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
             
    <!-- Customs -->
    <link href="{{ asset('assets/css/site.css') }}" rel="stylesheet" />
     
    <!-- JS -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}" type="text/javascript" ></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body> 

    <!-- Wrapper -->
    <div class="wrapper"> 
    <a href="https://github.com/creasitenet/tchat_laravel5_fr" target="_blank">
        <img style="position: absolute; top: 0; right: 0; border: 0; z-index: 1000;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png">
    </a>
    	
	        <!-- loader -->
	        <div id="loader">
	          <i class="fa fa-refresh fa-spin"></i>
	        </div>     
	        
	    <!-- Menu a gauche -->
    	<div id="gauche" class="gauche">
    		@include('_gauche') 
        </div>
        
        <!-- Contenu à droite -->
		<div id="droite" class="droite">				     		
								       		        
			@include('_notifications')	
			
	        <!-- content -->
			<div class="container-fluid content">  
	        	<div class="row">
	        		@yield('content')
	       		</div>
	        </div>
	
	        <!-- footer -->
	        @include('_footer') 
	    </div>

    </div>
    <!-- //Wrapper -->
    
  <!-- JS -->
  <!-- Bootstrap -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  
  <!-- Customs-->
  <script type="text/javascript" src="{{ asset('assets/js/site.js') }}"></script>
  
</body>
</html>

