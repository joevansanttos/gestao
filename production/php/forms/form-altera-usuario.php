<?php include "../bancos/conecta.php";?>
<?php include "../bancos/banco-usuario.php";?>

<?php
  $id = $_GET['id'];
  $usuario = buscaUsuario($conexao, $id);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projek | Alterar Usuário</title>

    <link rel="shortcut icon" type="image/x-icon" href="../../ico/favicon.ico"/>
    <link href="../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="../../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../../../build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/teste.css">
    <link href="../../../vendors/lou-multi-select/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- Col -->
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../../index2.php" class="site_title"><img src="../../images/botão copiar.png" width="40" right="40" ><span>PROJEK</span></a>
              <div class="clearfix"></div>
              <div class="profile clearfix">
                <div class="profile_pic"><img src="../../images/img2.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info"><span>Bem Vindo,</span><h2>Fabio</h2></div>
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
                    <li><a><i class="fa fa-file-text"></i> Manual de Processos<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="../processos/processos.php">Pis</a></li>
                      </ul>
                    </li>           
                  </ul>
                </div>
              </div>
            </div>
          </div> 
        </div>
        <!-- Col -->

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle"><a id="menu_toggle"><i class="fa fa-bars"></i></a></div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="../../images/img2.jpg" alt="">Fabio<span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li><a href="javascript:;"><span>Configurações</span></a></li>
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
              <div class="title_left">
                <h3>Alterar Usuário</h3>
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
                <div class="x_content">
                  <br />
                  <form id="form" action="../altera/altera-usuario.php" method="get"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  value="<?=$usuario['nome']?>" id="nome" name="nome" data-parsley-maxlength="10" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Sobrenome <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?=$usuario['sobrenome']?>" id="sobrenome" name="sobrenome" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" value="<?=$usuario['email']?>" id="email" name="email" required="required" class="form-control col-md-8 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Senha<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" value="<?$usuario['senha']?>" id="senha" name="senha" required="required" class="form-control col-md-8 col-xs-12">
                      </div>
                    </div>           
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="telefone">Telefone<span class="required">*</span></label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <input class="form-control col-md-8" value="<?=$usuario['telefone']?>" type="text" id="telefone" data-inputmask="'mask' : '(99) 99999-9999'" name="telefone" required="required"> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sexo">Sexo<span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <select value="<?=$usuario['sexo']?>" class="form-control col-md-3"  id="sexo" name="sexo" required="required" >
                          <option value="feminino">Feminino</option>
                          <option value="masculino">Masculino</option>
                          <option value="nada">Não Opinar</option>
                        </select>  
                      </div>
                    </div>                  
                    <div class="ln_solid"></div>
                    <div class=" form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="cancelar" class="btn btn-primary">Cancelar</button>
                        <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
                        <input type="hidden" name="id_usuario" value="<?=$usuario['id_usuario']?>">
                      </div>
                    </div>
                  </form>
                </div> 
              </div>
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
    <script src="../../../vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../../vendors/moment/min/moment.min.js"></script>
    <script src="../../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../../vendors/google-code-prettify/src/prettify.js"></script>

    <script src="../../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- jQuery Tags Input -->
    <script src="../../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../../../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../../build/js/custom.min.js"></script>
    <!-- Cidades e Estados -->
    <script src="../../js/cidades-estados-utf8.js"></script>
    <script language="JavaScript" type="text/javascript" charset="utf-8">
      new dgCidadesEstados({
        cidade: document.getElementById('cidade1'),
        estado: document.getElementById('estado1')
      })
    </script>
    <script src="js/teste.js"></script>
    <script src="../../../vendors/lou-multi-select/js/jquery.multi-select.js" type="text/javascript">

    </script>
    <script type="text/javascript">
        $('#my-select').multiSelect();
    </script>
    <script type="text/javascript">
      $(function () {

              var addFormGroup = function (event) {
                  event.preventDefault();

                  var $formGroup = $(this).closest('.form-group');
                  var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                  var $formGroupClone = $formGroup.clone();

                  $(this)
                      .toggleClass('btn-default btn-add btn-danger btn-remove')
                      .html('–');

                  $formGroupClone.find('input').val('');
                  $formGroupClone.insertAfter($formGroup);

                  var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                  if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                      $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                  }
              };

              var removeFormGroup = function (event) {
                  event.preventDefault();

                  var $formGroup = $(this).closest('.form-group');
                  var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

                  var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                  if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                      $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                  }

                  $formGroup.remove();
              };

              var countFormGroup = function ($form) {
                  return $form.find('.form-group').length;
              };

              $(document).on('click', '.btn-add', addFormGroup);
              $(document).on('click', '.btn-remove', removeFormGroup);

          });
    </script>
    <script type="text/javascript">
      document.getElementById('profissao').value = '<?=$usuario['id_profissao']?>';
    </script>
  </body>
</html>
