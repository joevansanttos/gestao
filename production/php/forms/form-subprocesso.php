<?php 
	require_once "../bancos/conecta.php";
	require_once "../bancos/banco-departamento.php";
	require_once "../bancos/banco-cliente.php";
	require_once "../bancos/banco-pis.php";
	require_once "../bancos/banco-macroprocesso.php";
	require_once "../bancos/banco-periodicidade.php";
	$id_macroprocesso = $_GET['id_macroprocesso'];
	$macroprocesso = buscaMacroprocessoId($conexao, $id_macroprocesso);
	$pi = buscaPi($conexao, $macroprocesso['cod_pi']);
  $departamento = buscaDepartamento($conexao, $pi['id_departamento']);
  $cliente = buscaCliente($conexao, $departamento['id_cliente']);
  $periodicidades = listaPeriodicidades($conexao);
  $classificacoes = listaClassificacoes($conexao);
  $maturidades = listaMaturidades($conexao);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	 	<title>Projek | Novo Subprocesso</title>

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
	                  <li><a><i class="fa fa-briefcase"></i> Clientes<span class="fa fa-chevron-down"></span></a>
	                    <ul class="nav child_menu">
	                      <li><a href="../clientes/clientes.php">Clientes</a></li>
	                      <li><a href="../clientes/departamentos.php">Departamentos</a></li>
	                      <li><a href="../clientes/gestores.php">Gestores</a></li>                          
	                    </ul>
	                  </li>
	                  <li><a><i class="fa fa-file-text"></i> Mapeamentos<span class="fa fa-chevron-down"></span></a>
	                    <ul class="nav child_menu">
	                      <li><a href="../processos/processos.php">Processos em Andamento</a></li>
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
	                <h3>Subprocesso</h3>
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
	            <div class="row">
	              <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
	                	<div class="x_content">
	                	<form action="../adiciona/adiciona-subprocesso.php" method="get" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">		            	  	
		            	  	<div class="form-group">
		            	  	   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Título do Processo<span class="required">*</span>
		            	  	   </label>
		            	  	   <div class="col-md-6 col-sm-6 col-xs-12">
		            	  	     <input type="text"  id="t_processo" name="t_processo" placeholder="<?=$macroprocesso['t_processo']?>" readonly="readonly"  required="required" class="form-control col-md-7 col-xs-12">
		            	  	   </div>
		            	  	</div>
		            	  	<div class="form-group">
		            	  	   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="t_subprocesso">Título do Subprocesso<span class="required">*</span>
		            	  	   </label>
		            	  	   <div class="col-md-6 col-sm-6 col-xs-12">
		            	  	     <input type="text"  id="t_subprocesso" name="t_subprocesso" required="required" class="form-control col-md-7 col-xs-12">
		            	  	   </div>
		            	  	</div>
		            	  	<div class="form-group">
		            	  	   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="t_subprocesso">Nº do Subprocesso<span class="required">*</span>
		            	  	   </label>
		            	  	   <div class="col-md-6 col-sm-6 col-xs-12">
		            	  	     <input type="text" data-inputmask="'mask' : '9{1,2}'" id="n_subprocesso" name="n_subprocesso" required="required" class="form-control col-md-7 col-xs-12">
		            	  	   </div>
		            	  	</div>
		            	  	<div class="item form-group">
		            	  	  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qPessoas">Nº de Pessoas<span class="required">*</span>
		            	  	  </label>
		            	  	  <div class="col-md-3 col-sm-6 col-xs-12">
		            	  	    <input type="text" data-inputmask="'mask' : '9{1,5}'" id="qPessoas" name="qPessoas" required="required" class="form-control">
		            	  	  </div>         
		            	  	  <label for="horas" class="control-label col-md-1">Horas <span class="required">*</span>
		            	  	  </label>
		            	  	  <div class="col-md-2 col-sm-6 col-xs-12">
		            	  	    <input type="text" data-inputmask="'mask' : '9{1,5}'" id="horas" name="horas" required="required" class="form-control">
		            	  	  </div>		            	  	  
		            	  	</div>
		            	  	<div class="form-group">
		            	  	  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_periodicidade">Periodicidade<span class="required">*</span>
		            	  	  </label>
		            	  	  <div class="col-md-6 col-sm-6 col-xs-12">
		            	  	    <select class="form-control col-md-3"  id="id_periodicidade" name="id_periodicidade" required="required" >
		            	  	    	<?php
		            	  	    		foreach ($periodicidades as $p) {
		            	  	    	?>
		            	  	    		<option value="<?=$p['id_periodicidade']?>"><?=$p['descricao']?></option>

		            	  	    	<?php		            	  	    			
		            	  	    		}
		            	  	    	?>
		            	  	    </select>  
		            	  	  </div>
		            	  	</div>
		            	  	<div class="form-group">
		            	  	  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_classificacao">Classificação<span class="required">*</span>
		            	  	  </label>
		            	  	  <div class="col-md-6 col-sm-6 col-xs-12">
		            	  	    <select class="form-control col-md-3"  id="id_classificacao" name="id_classificacao" required="required" >
		            	  	    	<?php
		            	  	    		foreach ($classificacoes as $c) {
		            	  	    	?>
		            	  	    		<option value="<?=$c['id_classificacao']?>"><?=$c['descricao']?></option>

		            	  	    	<?php		            	  	    			
		            	  	    		}
		            	  	    	?>
		            	  	    </select>  
		            	  	  </div>
		            	  	</div>        
		            	  	<div class="item form-group ">
		            	  	  <div class="form-group">
		            	  	    <label for="socio" class="control-label col-md-3 col-sm-3 col-xs-12">Responsável pelo Processo <span class="required">*</span></label>                      
		            	  	    <div class=" col-sm-6 col-xs-12 col-md-6">
		            	  	      <div class="form-group">
		            	  	        <input type="text" placeholder="Nome" name="nome" required="required" class="form-control">
		            	  	      </div>            	  	     
		            	  	      <div class="form-group">
		            	  	        <input type="text" placeholder="Cargo" id="profissao" name="cargo" required="required" class="form-control col-md-7 col-xs-12">
		            	  	      </div>
		            	  	      <div class="form-group">
		            	  	        <input type="email" placeholder="Email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
		            	  	      </div>
		            	  	      <div class="form-group">
		            	  	        <input data-inputmask="'mask' : '(99) 9999[9]-9999'" type="text" placeholder="Telefone" id="tel" name="tel" required="required" class="form-control col-md-7 col-xs-12">
		            	  	      </div>                      
		            	  	    </div>
		            	  	  </div>
		            	  	</div>
		            	  	<div class="form-group">
		            	  	  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_periodicidade">Maturidade<span class="required">*</span>
		            	  	  	</label>
		            	  	  	<div class="col-md-6 col-sm-6 col-xs-12">
		            	  	    	<select class="form-control col-md-3"  id="id_periodicidade" name="id_maturidade" required="required" >
		            	  	    	<?php
		            	  	    		foreach ($maturidades as $m) {
		            	  	    	?>
		            	  	    		<option value="<?=$m['id_maturidade']?>"><?=$m['descricao']?></option>

		            	  	    	<?php		            	  	    			
		            	  	    		}
		            	  	    	?>
		            	  	    </select>  
		            	  	  	</div>
		            	  		</div>  	  
		            	  	<div class="form-group">
		            	  	  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Descrição
		            	  	  </label>
		            	  	  <div class="col-md-6 col-sm-6 col-xs-12">
		            	  	    <textarea  name="descricao" class="form-control" rows="6"></textarea> 
		            	  	  </div>
		            	  	</div>  	             
		            	  	<div class="ln_solid"></div>
		            	  	<div class=" form-group">
	            	  	  	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	            	  	    <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
	            	  	    <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
	            	  	    <input type="hidden" name="id_macroprocesso" value="<?=$macroprocesso['id_macroprocesso']?>">
	            	  	 		</div>
	            	  	 	</div>
	            	  	</form>
	                	</div>
	                </div>
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
		<script src="../../js/multiple.js"></script>
	</body>
</html>