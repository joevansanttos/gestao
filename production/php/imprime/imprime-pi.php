<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-pis.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php include "../bancos/banco-subprocesso.php";?>
<?php
  $cod_pi = $_GET['cod_pi'];
  $pi = buscaPi($conexao , $cod_pi);
  $macroprocessos = listaPiMacroprocessos($conexao, $cod_pi);
  $objetivo = buscaObjetivo($conexao, $cod_pi);
  $aplicacao = buscaAplicacao($conexao, $cod_pi);
  $informacao = buscaInformacao($conexao, $cod_pi);
  $definicoes = listaDefinicaoPI($conexao, $cod_pi);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Imprime PI</title>
		<!-- Bootstrap -->
		<link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- iCheck -->
		<link href="../../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		<!-- Datatables -->
		<link href="../../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="../../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="../../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		<link href="../../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		<link href="../../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
		<!-- Datatables -->

		<!-- Custom Theme Style -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

		<script src='.../../../vendors/jsPDF-1.3.2/dist/jspdf.min.js'></script>
		<script src="../../../vendors/jquery/dist/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../css/imprime.css">
	</head>
	<body>
		<div class="x_content">
		  <div class="row">
		    <div class="col-md-12 col-sm-12 col-xs-12">
		    	<div id="conteudo">
		    		<div class="container">
		    			<div class="row">
		    				<p><strong>1. Objetivo:</strong></p><br>
		    				<p><?=$objetivo['descricao']?></p><br><br>
		    				<p><strong>2. Aplicação:</strong></p><br>
		    				<p><?=$aplicacao['descricao']?></p><br><br>
		    				<p><strong>3. Definições:</strong></p><br>
		    			<?php
		    			foreach ($definicoes as $definicao) {		    			
		    		
		    			?>
		    				<p><?=$definicao['descricao']?></p><br>
		    			<?php
		    			}
		    			?>
		    				<br>
		    				<p><strong>4. Informações Gerais:</strong></p><br>
		    				<p><?=$informacao['descricao']?></p><br><br>
		    			</div>
		    		</div>
		    	 	<div class="clearfix"></div>
		    	</div>
		    </div>
		  </div>
		</div>  
		<script src="../../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="../../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="../../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		<script src="../../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
		<script src="../../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
		<script src="../../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="../../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="../../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
		<script src="../../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
		<script src="../../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="../../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
		<script src="../../../vendors/bootstrap-notify-3.1.3/dist/bootstrap-notify.js"></script>
	</body>

</html>