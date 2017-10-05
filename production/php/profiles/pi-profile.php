<?php 
  require_once "../bancos/conecta.php";
  require_once "../bancos/banco-pis.php";
  require_once "../bancos/banco-macroprocesso.php";
  require_once "../bancos/banco-subprocesso.php";
  require_once "../bancos/banco-microprocesso.php";
  require_once "../bancos/banco-gestores.php";
  $cod_pi = $_GET['cod_pi'];
  $pi = buscaPi($conexao , $cod_pi);
  $macroprocessos = listaPiMacroprocessos($conexao, $cod_pi);
  $objetivo = buscaObjetivo($conexao, $cod_pi);
  $aplicacao = buscaAplicacao($conexao, $cod_pi);
  $informacao = buscaInformacao($conexao, $cod_pi);
  $definicao = buscaDefinicao($conexao, $cod_pi);
  $stakeholders = listaStakeholdersPi($conexao, $cod_pi);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJEK | Processos</title>

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
              <div class="title_left"><h3><?=$pi['cod_pi']?> </h3></div>
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
                  <div class="clearfix"></div>                
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">

                        <!-- Panel Objetivo -->
                        <div class="panel-group" id="panelobjetivo " >
                          <div class="panel panel-info " >
                              <div class="panel-heading primary ">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#objetivo">1 Objetivo</a>
                                  <?php
                                    if(count($objetivo) == 0){
                                  ?>
                                    <a href="../forms/form-objetivo.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Objetivo" class="btn btn-info btn-xs pull-right"><i class="fa fa-plus"></i></button></a> </a>
                                  <?php    
                                    }else{
                                  ?>                                 
                                  <a  href="../forms/form-altera-objetivo.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info btn-xs pull-right"><i class="fa fa-pencil"></i></button></a> 
                                  <?php
                                    }
                                  ?> 
                                  <div class="clearfix"></div>
                                </h4>
                              </div>
                              <div id="objetivo" class="panel-collapse collapse">
                                <div class="panel-body"><?=$objetivo['descricao']?></div>
                              </div>
                            </div>   
                        </div>
                        <!-- End Panel Objetivo -->

                        <!-- Panel Aplicacao -->
                        <div class="panel-group" id="panelaplicacao">
                          <div class="panel panel-info">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#aplicacao">2 Aplicação</a>
                                  <?php
                                    if(count($aplicacao) == 0){
                                  ?>
                                    <a href="../forms/form-aplicacao.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Aplicação" class="btn btn-info btn-xs pull-right"><i class="fa fa-plus"></i></button></a> </a>
                                  <?php    
                                    }else{
                                  ?>        
                                  <a href="../forms/form-altera-aplicacao.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info btn-xs pull-right"><i class="fa fa-pencil"></i></button></a>
                                  <?php
                                    }
                                  ?> 
                                  <div class="clearfix"></div>
                                </h4>
                              </div>
                              <div id="aplicacao" class="panel-collapse collapse">
                                <div class="panel-body"><?=$aplicacao['descricao']?></div>

                              </div>
                            </div>   
                        </div>
                        <!-- End Panel Aplicacao -->

                        <!-- Panel Definicao-->
                        <div class="panel-group" id="paneldefinicao">
                          <div class="panel panel-info">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#definicao">3 Definições</a>                              
                                  <?php
                                    if(count($definicao) == 0){
                                  ?>
                                  <a href="../forms/form-definicao.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Definições" class="btn btn-info btn-xs pull-right"><i class="fa fa-plus"></i></button></a> </a>
                                  <?php    
                                    }else{
                                  ?>
                                  <a href="../profiles/pi-profile.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info btn-xs pull-right"><i class="fa fa-pencil"></i></button></a>
                                  <?php
                                    }
                                  ?>

                                  <div class="clearfix"></div>
                                </h4>
                              </div>                          
                              <div id="definicao" class="panel-collapse collapse">                 
                                <div class="panel-body"><?=$definicao['descricao']?></div>                        
                              </div>                        
                            </div>   
                        </div>
                        <!-- End Panel Definicao -->

                        <!-- Panel Informacao -->
                        <div class="panel-group" id="panelinformacao">
                          <div class="panel panel-info">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#informacao">4 Informações Gerais</a>
                                  <?php
                                    if(count($informacao) == 0){
                                  ?>
                                    <a href="../forms/form-informacao.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Informações" class="btn btn-info btn-xs  pull-right"><i class="fa fa-plus"></i></button></a> </a>
                                  <?php    
                                    }else{
                                  ?>    
                                  
                                  <a href="../profiles/pi-profile.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-info btn-xs pull-right"><i class="fa fa-pencil"></i></button></a>
                                  <?php
                                    }
                                  ?> 
                                  <div class="clearfix"></div>
                                </h4>
                              </div>
                              <div id="informacao" class="panel-collapse collapse">
                                <div class="panel-body"><?=$informacao['descricao']?></div>
                              </div>
                            </div>   
                        </div>
                        <!-- End Panel Informacao --> 

                        <!-- Panel Processos -->
                        <div class="panel-group" id="panelprocesso">
                          <div class="panel panel-info">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#processo">5 Processos</a>
                                  <a href="../forms/form-macroprocesso.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Adiciona Processo" class="btn btn-info btn-xs pull-right"><i class="fa fa-plus"></i></button></a> </a>                       
                                  <div class="clearfix"></div>
                                </h4>
                              </div>
                              <div id="processo" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <?php
                                  $m = 1;                        
                                  foreach ($macroprocessos as  $macroprocesso) {
                                  $string = (string)$m;
                                  $panel = 'panel_' . $string;
                                  $idpanel = '#'.$panel;
                                  $m = $m + 1;
                                  $panel_s = 'panel_s_' . $string;
                                  $idpanel_s = '#'.$panel_s;
                                  $panel_d = 'panel_d_' . $string;
                                  $idpanel_d = '#'.$panel_d;
                                  $panel_c = 'panel_c_' . $string;
                                  $idpanel_c = '#'.$panel_c;
                                  $panel_g = 'panel_g_' . $string;
                                  $idpanel_g = '#'.$panel_g;
                                  $accordion = 'accordion_'. $panel;
                                  $idaccordion = '#'. $accordion;
                                  $stakeholders_macro = listaStakeholdersMacro($conexao, $macroprocesso['id_macroprocesso']);  
                                  ?>  

                                  <div class="panel-group" id="accordion">                                    
                                    <div class="panel panel-success">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">                               
                                          <a data-toggle="collapse" data-parent="#accordion" href="<?=$idpanel?>">
                                          <?=$macroprocesso['n_processo']?> <?=$macroprocesso['t_processo']?></a>
                                          <a href="../forms/form-subprocesso.php?id_macroprocesso=<?=$macroprocesso['id_macroprocesso']?>">
                                            <button data-toggle="tooltip" data-placement="top" title="Adicionar Subprocesso" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i>
                                            </button>
                                          </a>                                                                   
                                          <a href="../forms/form-altera-macroprocesso.php?id_macroprocesso=<?=$macroprocesso['id_macroprocesso']?>">
                                            <button data-toggle="tooltip" data-placement="top" title="Editar Processo" class="btn btn-success btn-xs pull-right"><i class="fa fa-pencil"></i></button>
                                          </a> 
                                          <div class="clearfix"></div>
                                        </h4>
                                      </div>

                                      <!-- Panel Subprocessos -->                                   
                                      <div id="<?=$panel?>" class="panel-collapse collapse">
                                        <div class="panel-body"> 
                                          <?php
                                          $subprocessos = listaMacroSubprocessos($conexao, $macroprocesso['id_macroprocesso']);
                                          $i = 1;
                                          foreach ($subprocessos as  $sub) {                                  
                                            $string2 = (string)$i;
                                            $panel2 = 'panel2_' . $string. '_' . $string2;
                                            $idpanel2 = '#'.$panel2;
                                            $panel2_d = 'panel2_d_' . $string. '_'. $string2;
                                            $idpanel2_d = '#'.$panel2_d;                                                 
                                            $panel2_c = 'panel2_c_' . $string. '_'. $string2;
                                            $idpanel2_c = '#'.$panel2_c;                                     
                                            $i = $i + 1;
                                            $accordion2 = 'accordion2_'. $panel2;
                                            $idaccordion2 = '#'. $accordion2;  
                                          ?>                              
                                          <div class="panel-group" id="<?=$accordion?>">                                            
                                            <div class="panel panel-warning">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a data-toggle="collapse" data-parent="<?=$idaccordion2?>" href="<?=$idpanel2?>">
                                                    <?=$sub['n_subprocesso']?> <?=$sub['t_subprocesso']?>
                                                    <a href="../forms/form-microprocesso.php?id_subprocesso=<?=$sub['id_subprocesso']?>">
                                                      <button data-toggle="tooltip" data-placement="top" title="Adicionar Subprocesso" class="btn btn-warning btn-xs pull-right"><i class="fa fa-plus"></i>
                                                      </button>
                                                    </a>                                
                                                    <a href="../forms/form-altera-subprocesso.php?id_subprocesso=<?=$sub['id_subprocesso']?>">
                                                      <button data-toggle="tooltip" data-placement="top" title="Editar Subprocesso" class="btn btn-warning btn-xs pull-right"><i class="fa fa-pencil"></i></button>
                                                    </a> 
                                                    <div class="clearfix"></div>
                                                  </a>
                                                </h4>
                                              </div>
                                              <div id="<?=$panel2?>" class="panel-collapse collapse">
                                                <div class="panel-body">                                         
                                                  <?php
                                                      $j = 1;
                                                      $microprocessos= listaMicroprocessos($conexao, $sub['id_subprocesso']);
                                                      foreach ($microprocessos as $micro) {
                                                       $string3 = (string)$j;
                                                        $panel3 = 'panel3_' . $string2. '_' . $string3;
                                                        $idpanel3 = '#'.$panel3;
                                                        $panel3_d = 'panel3_d_' . $string2. '_'. $string3;
                                                        $idpanel3_d = '#'.$panel3_d;                                            
                                                        $j = $j + 1;
                                                        $accordion3 = 'accordion3_'. $panel3;
                                                        $idaccordion3 = '#'. $accordion3;                                   
                                                  ?>
                                                  <!-- Microprocessos Panel -->
                                                  <div class="panel-group" id="<?=$accordion3?>">                                 
                                                    <div class="panel panel-danger">
                                                        <div class="panel-heading">
                                                          <h4 class="panel-title">
                                                            <a data-toggle="collapse" href="<?=$idpanel3?>">
                                                              <?=$micro['n_microprocesso']?> <?=$micro['t_microprocesso']?>
                                                            </a>
                                                            <a href="../forms/form-altera-microprocesso.php?id_microprocesso=<?=$micro['id_microprocesso']?>"><button class="btn btn-danger btn-xs pull-right"><i class="fa fa-pencil"></i></button></a>
                                                            <div class="clearfix"></div>
                                                          </h4>
                                                        </div>
                                                        <div id="<?=$panel3?>" class="panel-collapse collapse">        
                                                          <div class="panel-body">
                                                            
                                                              
                                                          </div>
                                                        </div>
                                                    </div>   
                                                  </div>
                                                   <!-- End Microprocessos Panel -->      
                                                  <?php
                                                   }
                                                  ?> 

                                                  <!-- Panel Subprocesso Descricao-->
                                                  <div class="panel-group" id="<?=$accordion?>">
                                                    <div class="panel panel-danger">
                                                      <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                          <a data-toggle="collapse" href="<?=$idpanel2_d?>">Descrição</a>
                                                          <a href="../forms/form-altera-d-sub.php?id_subprocesso=<?=$sub['id_subprocesso']?>"><button class="btn btn-danger btn-xs pull-right"><i class="fa fa-pencil"></i></button></a> </a>                   
                                                          <div class="clearfix"></div>
                                                        </h4>
                                                      </div>
                                                      <div id="<?=$panel2_d?>" class="panel-collapse collapse">                   
                                                        <div class="panel-body">                                                       
                                                          <?=$sub['descricao']?>
                                                        </div>
                                                      </div>
                                                    </div>   
                                                  </div>
                                                  <!-- End Panel Subprocesso Descricao--> 

                                                  <!-- Panel Características Subprocessos-->
                                                  <div class="panel-group" id="<?=$accordion?>">
                                                      <div class="panel panel-danger">
                                                          <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                              <a data-toggle="collapse" href="<?=$idpanel2_c?>">Características</a>
                                                              <a href="../forms/form-altera-c-sub.php?id_subprocesso=<?=$sub['id_subprocesso']?>"><button class="btn btn-danger btn-xs pull-right"><i class="fa fa-pencil"></i></button></a> </a>   
                                                              <div class="clearfix"></div>
                                                            </h4>
                                                          </div>
                                                          <div id="<?=$panel2_c?>" class="panel-collapse collapse">                               
                                                           <div class="panel-body">
                                                            <?php
                                                              $classificacao_sub = buscaClassificacaoId($conexao, $sub['id_classificacao']);
                                                              $periodicidade_sub = buscaPeriodicidadeId($conexao, $sub['id_periodicidade']);
                                                            ?>
                                                            <table class="table">
                                                              <tr>
                                                                <th>Nº de Pessoas</th>
                                                                <th>Horas</th>
                                                                <th>Classificação</th>
                                                                <th>Periodicidade</th>
                                                              </tr>                                                    
                                                              <tr>
                                                                <td><?=$sub['qPessoas']?></td>
                                                                <td><?=$sub['horas']?></td>                              
                                                                <td><?=$classificacao_sub['descricao']?></td>                     
                                                                <td><?=$periodicidade_sub['descricao']?></td>

                                                            </table>                                                  
                                                           </div>
                                                          </div>
                                                        </div>   
                                                  </div>
                                                  <!-- End Panel Características Subprocessos-->                                                                                                                                
                                                </div>
                                              </div>
                                            </div>                                            
                                          </div> 
                                          <?php
                                            }
                                          ?>

                                          <!-- Panel Descricao Macroprocessos-->
                                          <div class="panel-group" id="<?=$accordion?>">
                                            <div class="panel panel-warning">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a data-toggle="collapse" href="<?=$idpanel_d?>">Descrição</a>            
                                                  <a href="../forms/form-altera-d-macro.php?id_macroprocesso=<?=$macroprocesso['id_macroprocesso']?>">
                                                    <button data-toggle="tooltip" data-placement="top" title="Editar Descrição do Processo" class="btn btn-warning btn-xs pull-right"><i class="fa fa-pencil"></i></button>
                                                  </a>                       
                                                  <div class="clearfix"></div>
                                                </h4>
                                              </div>
                                              <div id="<?=$panel_d?>" class="panel-collapse collapse">                               
                                                <div class="panel-body">                                                 
                                                  <?=$macroprocesso['descricao']?>                                                     
                                                </div>                                                  
                                              </div>
                                            </div>   
                                          </div>
                                          <!-- End Panel Descricao Macroprocessos-->                                         

                                          <!-- Panel Características Macroprocessos-->
                                          <div class="panel-group" id="<?=$accordion?>">
                                              <div class="panel panel-warning">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                      <a data-toggle="collapse" href="<?=$idpanel_c?>">Características</a>
                                                      <a href="../forms/form-altera-c-macro.php?id_macroprocesso=<?=$macroprocesso['id_macroprocesso']?>">
                                                        <button data-toggle="tooltip" data-placement="top" title="Editar Características do Processo" class="btn btn-warning btn-xs pull-right"><i class="fa fa-pencil"></i></button>
                                                      </a>                                                         
                                                               
                                                      <div class="clearfix"></div>
                                                    </h4>
                                                  </div>
                                                  <div id="<?=$panel_c?>" class="panel-collapse collapse">                               
                                                   <div class="panel-body">
                                                    <?php
                                                      $classificacao = buscaClassificacaoId($conexao, $macroprocesso['id_classificacao']);
                                                      $periodicidade = buscaPeriodicidadeId($conexao, $macroprocesso['id_periodicidade']);
                                                    ?>
                                                    <table class="table">
                                                      <thead>
                                                        <tr>
                                                          <th>Nº de Pessoas</th>
                                                          <th>Horas</th>
                                                          <th>Classificação</th>
                                                          <th>Periodicidade</th>
                                                        </tr>     
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <td><?=$macroprocesso['qPessoas']?></td>
                                                          <td><?=$macroprocesso['horas']?></td>                              
                                                          <td><?=$classificacao['descricao']?></td>                     
                                                          <td><?=$periodicidade['descricao']?></td>
                                                        </tr>       
                                                      </tbody>                                               
                                                                                                                              
                                                    </table>                                                  
                                                   </div>
                                                  </div>
                                                </div>   
                                          </div>
                                          <!-- End Panel Características Macroprocessos-->

                                          <!-- Panel Responsavel Macroprocessos-->
                                          <div class="panel-group" id="<?=$accordion?>">
                                              <div class="panel panel-warning">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                      <a data-toggle="collapse" href="<?=$idpanel_g?>">Responsável</a>   
                                                      <a href="../forms/form-altera-r-macro.php?id_macroprocesso=<?=$macroprocesso['id_macroprocesso']?>">
                                                        <button data-toggle="tooltip" data-placement="top" title="Editar Responsável do Processo" class="btn btn-warning btn-xs pull-right"><i class="fa fa-pencil"></i></button>
                                                      </a>                
                                                      <div class="clearfix"></div>
                                                    </h4>
                                                  </div>
                                                  <div id="<?=$panel_g?>" class="panel-collapse collapse">                               
                                                   <div class="panel-body">
                                                    <?php
                                                      $gestor_macro = buscaGestorMacro($conexao, $macroprocesso['id_macroprocesso']);                                                 
                                                    ?>
                                                     <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th>Nome</th>
                                                            <th>Email</th>
                                                            <th>Telefone</th>
                                                            <th>Cargo</th>
                                                          </tr>
                                                        </thead>
                                                        
                                                        <tr>
                                                          <td><?=$gestor_macro['nome']?></td>
                                                          <td><?=$gestor_macro['email']?></td>
                                                          <td><?=$gestor_macro['tel']?></td>
                                                          <td><?=$gestor_macro['cargo']?></td>
                                                        </tr>
                                                       
                                                     </table>                          
                                                   </div>
                                                  </div>
                                                </div>   
                                          </div>
                                          <!-- End Panel Responsavel Macroprocessos-->

                                          <!-- Panel Stakeholders Macroprocessos-->
                                          <div class="panel-group" id="<?=$accordion?>">
                                              <div class="panel panel-warning">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                      <a data-toggle="collapse" href="<?=$idpanel_s?>">Partes interessadas</a>   
                                                      <a href="../forms/form-stakeholder_macro.php?id_macroprocesso=<?=$macroprocesso['id_macroprocesso']?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Parte Interessada" class="btn btn-warning btn-xs pull-right"><i class="fa fa-plus"></i></button></a> </a>                      
                                                      <div class="clearfix"></div>
                                                    </h4>
                                                  </div>
                                                  <div id="<?=$panel_s?>" class="panel-collapse collapse">                               
                                                   <div class="panel-body">
                                                    <table class="table">
                                                      <thead>
                                                        <tr>
                                                          <th>Nome</th>
                                                          <th>Email</th>
                                                          <th>Departamento</th>
                                                          <th>Cargo</th>
                                                          <th>Ações</th>
                                                        </tr>
                                                      </thead>
                                                      
                                                      <?php
                                                        foreach ($stakeholders_macro as $stakeholder_macro) {
                                                      ?>
                                                      <tr>
                                                        <td><?=$stakeholder_macro['nome']?></td>
                                                        <td><?=$stakeholder_macro['email']?></td>
                                                        <td><?=$stakeholder_macro['departamento']?></td>
                                                        <td><?=$stakeholder_macro['cargo']?></td>
                                                        <td align="center">
                                                          <a href="../forms/form-altera-stakeholder.php?id_stakeholder=<?=$stakeholder['id_stakeholder']?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                                                          <a href="../forms/form-altera-stakeholder.php?id_stakeholder=<?=$stakeholder['id_stakeholder']?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>                                                          
                                                        </td>
                                                      </tr>
                                                      <?php
                                                        }
                                                      ?>
                                                    </table>                                                  
                                                   </div>
                                                  </div>
                                                </div>   
                                          </div>
                                          <!-- End Panel Stakeholders Macroprocessos-->

                                        </div> 
                                      </div>
                                      <!-- End Panel Subprocessos -->
                                    </div>
                                  </div>

                                  <?php
                                  }
                                  ?>                                                             
                                  
                                </div>
                              </div>
                            </div>   
                        </div>
                        <!-- Panel Stakeholders -->
                        <div class="panel-group" id="panelstakeholder">
                          <div class="panel panel-info">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#stakeholder">Partes Interessadas</a>                               
                                  <a href="../forms/form-stakeholder.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Parte Interessada" class="btn btn-info btn-xs  pull-right"><i class="fa fa-plus"></i></button></a> </a>
                                  <a href="../forms/form-email.php?cod_pi=<?=$pi['cod_pi']?>"><button data-toggle="tooltip" data-placement="top" title="Enviar email" class="btn btn-info btn-xs  pull-right"><i class="fa fa-envelope"></i></button></a> </a>               
                                  <div class="clearfix"></div>
                                </h4>
                              </div>
                              <div id="stakeholder" class="panel-collapse collapse">                               
                               <div class="panel-body">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Nome</th>
                                      <th>Email</th>
                                      <th>Departamento</th>
                                      <th>Cargo</th>
                                      <th>Ações</th>
                                    </tr>
                                  </thead>
                                  
                                  <?php
                                    foreach ($stakeholders as $stakeholder) {
                                  ?>
                                  <tr>
                                    <td><?=$stakeholder['nome']?></td>
                                    <td><?=$stakeholder['email']?></td>
                                    <td><?=$stakeholder['departamento']?></td>
                                    <td><?=$stakeholder['cargo']?></td>
                                    <td align="center">
                                      <a href="../forms/form-altera-stakeholder.php?id_stakeholder=<?=$stakeholder['id_stakeholder']?>"><button data-toggle="tooltip" data-placement="top" title="Editar Parte Interessada" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a>
                                      <a href="../remove/remove-stakeholder.php?id_stakeholder=<?=$stakeholder['id_stakeholder']?>"><button data-toggle="tooltip" data-placement="top" title="Remover Parte Interessada" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                  </tr>
                                  <?php
                                    }
                                  ?>
                                </table>
                               </div>                              
                              </div>
                          </div>   
                        </div>
                        <!-- End Panel Stakeholders --> 

                       
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


