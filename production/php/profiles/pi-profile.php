<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-pis.php";?>
<?php include "../bancos/banco-macroprocesso.php";?>
<?php include "../bancos/banco-subprocesso.php";?>
<?php
  $cod_pi = $_GET['cod_pi'];
  $pi = buscaPi($conexao , $cod_pi);
  $macroprocessos = listaPiMacroprocessos($conexao, $cod_pi);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJEK | Pi</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
    <!-- Bootstrap -->
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Sidebar-->      
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../index/index2.php" class="site_title"><img src="../../images/botao.png" width="40" right="40" ><span>PROJEK</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_pic">
               
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
              </div>
            </div>
            <br />
            <!-- Sidebar-->      
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
                      <li><a href="clientes.php">Clientes</a></li>
                      <li><a href="departamentos.php">Departamentos</a></li>
                      <li><a href="pis.php">Pis</a></li>
                      <li><a href="gestores.php">Gestores</a></li>                          
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
        <!-- Col-->
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
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false"></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation --> 

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left"><h3>Pis</h3></div>
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
            <!--Page Title-->             
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                  </div>
                  <div class="clearfix"></div>                
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel-group" id="accordion">

                          <?php
                          
                            foreach ($macroprocessos as  $macroprocesso) { 
  
                          ?>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">                               
                                <a data-toggle="collapse" data-parent="#accordion" href="#panel">
                                <?=$macroprocesso['n_processo']?> <?=$macroprocesso['t_processo']?></a>
                                <a href="../forms/form-subprocesso.php?id_macroprocesso=<?=$macroprocesso['id_macroprocesso']?>"><button class="btn btn-default pull-right"><i class="fa fa-plus"></i></button></a>                                
                                <a href="../profiles/pi-profile.php?cod_pi=<?=$pi['cod_pi']?>"><button class="btn btn-default pull-right"><i class="fa fa-pencil"></i></button></a> 
                                <div class="clearfix"></div>
                              </h4>
                            </div>
                            <div id="panel" class="panel-collapse collapse">
                              <div class="panel-body">
                                <div class="panel-group" id="accordion2">

                                  <?php
                                    $subprocessos = listaMacroSubprocessos($conexao, $macroprocesso['id_macroprocesso']);
                                    $i = 1;
                                    foreach ($subprocessos as  $sub) {
                                     $num = (string)$i;
                                     $id = '#'.$num;
                                     $i = $i + 1;
                                  ?>
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion2" href="<?=$id?>"><?=$sub['n_subprocesso']?> <?=$sub['t_subprocesso']?>
                                      </a>
                                       </h4>
                                    </div>
                                    <div id="<?=$num?>" class="panel-collapse collapse">
                                      <div class="panel-body"><?=$sub['descricao']?></div>
                                    </div>
                                  </div>

                                  <?php
                                     }
                                  ?>

                                </div> 
                              </div>
                            </div>
                          </div>

                          <?php
                            }
                          ?>

                        </div>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog" ">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content" >
                              <form  role="form" action="../adiciona/adiciona-subprocesso.php" method="get" >
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Novo Subprocesso</h4>
                                </div>
                                <div class="modal-body" >
                                  <div class="form-group" >
                                    <label for="macroprocesso" class="control-label">Macroprocesso</label>   
                                    <input type="text" name="macroprocesso" class="form-control">
                                  </div>
                                  <div class="form-group" >
                                    <label for="t_subprocesso" class="control-label">Nº Subprocesso</label>   
                                    <input type="" name="n_subprocesso" class="form-control">
                                  </div>
                                  <div class="form-group" >
                                    <label for="t_subprocesso" class="control-label">Título</label>   
                                    <input type="" name="t_subprocesso" class="form-control">
                                  </div>
                                  <div class="form-group" >
                                    <label for="recipient-name" class="control-label">Descrição</label>   
                                    <textarea rows="6" class="form-control" name="descricao" ></textarea>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                  <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
                                </div>
                              </form>  
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <a class="btn btn-success btn-round" style="" href="../forms/form-macroprocesso.php?cod_pi=<?=$pi['cod_pi']?>"><i class="fa fa-plus"></i></a>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>        
        <div class="clearfix"></div>
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
    <!-- jQuery -->
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
    <script src="../../js/datatable.js"></script>
    <script>
      $('#myModal').on('show.bs.modal', function(e) {

          var macroprocesso = $(e.relatedTarget).data('macroprocesso');
          $(e.currentTarget).find('input[name="macroprocesso"]').val(macroprocesso);
      });

    </script>
  </body>
</html>
