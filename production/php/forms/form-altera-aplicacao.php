<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-departamento.php";?>
<?php include "../bancos/banco-cliente.php";?>
<?php include "../bancos/banco-pis.php";?>
<?php
	$cod_pi = $_GET['cod_pi'];
	$pi = buscaPi($conexao, $cod_pi);
  $departamento = buscaDepartamento($conexao, $pi['id_departamento']);
  $cliente = buscaCliente($conexao, $departamento['id_cliente']);
  $aplicacao = buscaAplicacao($conexao, $cod_pi);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	 	<title>Projek | Altera Aplicação</title>

	  <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
	  <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	  <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
	  <link href="../../../build/css/custom.min.css" rel="stylesheet">
	</head>
	<body class="nav-md">
	  <div class="container body">
	    <div class="main_container">
	      <div class="col-md-3 left_col">
	        <div class="left_col scroll-view">
	          <div class="navbar nav_title" style="border: 0;">
	            <a href="../index/index2.php" class="site_title"><img src="../../images/botao.png" width="40" right="40" ><span>PROJEK</span></a>
	            <div class="clearfix"></div>
	            <div class="profile clearfix">
	              <div class="profile_pic">
	                <img src="../../images/img2.jpg" alt="..." class="img-circle profile_img">
	              </div>
	              <div class="profile_info">
	                <span>Bem Vindo,</span>
	                <h2>Fabio</h2>
	              </div>
	            </div>
	            <br />
	            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	              <div class="menu_section">
	                <h3>Geral</h3>
	                <ul class="nav side-menu">
	                  <li><a><i class="fa fa-home"></i> Home<span class="fa fa-chevron-down"></span></a>
	                    <ul class="nav child_menu">
	                      <li><a href="../index/index2.php">Dashboard</a></li>
	                    </ul>
	                  </li>
	                  <li><a><i class="fa fa-user"></i> Usuários<span class="fa fa-chevron-down"></span></a>
	                    <ul class="nav child_menu">
	                      <li><a href="../usuarios/consultores.php">Consultores</a></li>
	                    </ul>
	                  </li>
	                  <li><a><i class="fa fa-building"></i> Clientes<span class="fa fa-chevron-down"></span></a>
	                    <ul class="nav child_menu">
	                      <li><a href="../clientes/clientes.php">Clientes</a></li>
	                      <li><a href="../clientes/departamentos.php">Departamentos</a></li>
	                      <li><a href="../clientes/pis.php">Pis</a></li>
	                      <li><a href="../clientes/gestores.php">Gestores</a></li>                          
	                    </ul>
	                  </li>
	                  <li><a><i class="fa fa-file"></i> Processos<span class="fa fa-chevron-down"></span></a>
	                    <ul class="nav child_menu">
	                      <li><a href="../processos/processos.php">Processos em Andamento</a></li>
	                      <li><a href="../processos/processos.php">Processos Finalizados</a></li>                    
	                    </ul>
	                  </li>           
	                </ul>
	              </div>
	            </div>
	            <!-- /menu footer buttons -->
	            <div class="sidebar-footer hidden-small">
	              <a data-toggle="tooltip" data-placement="top" title="Settings">
	                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	              </a>
	              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
	                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	              </a>
	              <a data-toggle="tooltip" data-placement="top" title="Lock">
	                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	              </a>
	              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
	                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	              </a>
	            </div>
	            <!-- Sidebar--> 
	          </div>
	        </div> 
	      </div>
	      <!-- top navigation -->
	      <div class="top_nav">
	        <div class="nav_menu">
	          <nav>
	            <div class="nav toggle">
	              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
	            </div>
	            <ul class="nav navbar-nav navbar-right">
	              <li class="">
	                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	                  <img src="../../images/img2.jpg" alt="">Fabio
	                  <span class=" fa fa-angle-down"></span>
	                </a>
	                <ul class="dropdown-menu dropdown-usermenu pull-right">
	                  <li><a href="javascript:;"> Perfil</a></li>
	                  <li>
	                    <a href="javascript:;">
	                      <span>Configurações</span>
	                    </a>
	                  </li>
	                  <li><a href="javascript:;">Ajuda</a></li>
	                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
	                </ul>
	              </li>

	              <li role="presentation" class="dropdown">
	                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"></a></li>
	              </ul>
	            </nav>
	          </div>
	        </div>
	      </div>
	      <!-- /top navigation -->
	      <!-- page content -->
	      <div class="right_col" role="main">
	          <div class="">
	            <div class="page-title">
	              <div class="title_left">
	                <h3>Altera Aplicação</h3>
	              </div>
	              <div class="title_right">
	                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
	                  <div class="input-group">
	                    <input type="text" class="form-control" placeholder="Pesquise...">
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" type="button">Go!</button>
	                    </span>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="clearfix"></div>
	            <div class="x_content">
	            	<div class="row">
	            	  <div class="col-md-12 col-sm-12 col-xs-12">
	            	  	<form action="../altera/altera-aplicacao.php" method="get" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
	            	  		<div class="form-group">
	            	  		   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Código PI<span class="required">*</span>
	            	  		   </label>
	            	  		   <div class="col-md-6 col-sm-6 col-xs-12">
	            	  		     <input type="text" placeholder="<?=$pi['cod_pi']?>" readonly="readonly" class="form-control col-md-7 col-xs-12">
	            	  		   </div>
	            	  		</div>		            	  	
		            	  	<div class="form-group">
		            	  	  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Aplicação<span class="required">*</span>
		            	  	  </label>
		            	  	  <div class="col-md-6 col-sm-6 col-xs-12">
		            	  	    <textarea  name="descricao" class="form-control col-md-12 col-xs-12" rows="6"><?=$aplicacao['descricao']?></textarea> 
		            	  	  </div>
		            	  	</div>  	             
		            	  	<div class="ln_solid"></div>
		            	  	<div class=" form-group">
	            	  	  	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	            	  	    <button type="submit" name="cancelar" class="btn btn-primary">Cancelar</button>
	            	  	    <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
	            	  	    <input type="hidden" name="id_aplicacao" value="<?=$aplicacao['id_aplicacao']?>" >
	            	  	    </div>
	            	  	 	</div>
	            	  	</form>
	            	  </div>
	            	</div>  	
	              <br />
	           </div>
	          </div>
	      </div>
	       <!-- /page content -->
	       <!-- footer content -->
	      <footer>
	        <div class="pull-right">
	          PROJEK
	        </div>
	        <div class="clearfix"></div>
	      </footer>
	      <!-- /footer content -->
	    </div>
	  </div>
	  <!-- JQuery -->
		<script src="../../../vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- NProgress -->
		<script src="../../../vendors/nprogress/nprogress.js"></script>
		<!-- Parsley -->
		<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
		<!-- InputMask -->
		<script src="../../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
		<!-- Custom Theme Scripts -->
		<script src="../../../build/js/custom.min.js"></script>
	</body>
</html>