<?php

include_once("conexao1.php");
include_once("conexao2.php");
include_once("conexao3.php");
include_once("conexao4.php");
include_once("conexao5.php");
include_once("conexao6.php");

$sql = "SELECT ia.DataAtendimento, ia.CodUsuario, i.CodImovel, i.InscImobiliaria, lo.NomeLogradouro, i.NrImovel, i.CompEndereco, i.NrApto, ba.NomeBairro, i.CEP, ia.DescAtendimento, i.NrDIC
FROM ImovelAtend ia 
INNER JOIN Imovel i
ON i.CodImovel = ia.CodImovel
INNER JOIN TipoAtend ta
ON ta.CodTipoAtend = ia.CodTipoAtend
INNER JOIN SituacaoAtend sa
ON sa.CodSitAtend = ia.CodSitAtend
LEFT JOIN Bairro ba
ON ba.CodBairro = i.CodBairro
LEFT JOIN Logradouro lo
ON lo.CodLogradouro = i.CodLogradouro
WHERE ta.DescTipoAtend LIKE '%NEGATIVA DE DEBITO%' 
AND sa.DescSitAtend = 'EM ANDAMENTO'
AND ia.DataAtendimento >= '2020-01-01'
GROUP BY i.CodImovel
ORDER BY ia.DataAtendimento DESC, ia.CodUsuario;";

$consulta1 = mysqli_query($conexao1, $sql);
$consulta2 = mysqli_query($conexao2, $sql);
$consulta3 = mysqli_query($conexao3, $sql);
$consulta4 = mysqli_query($conexao4, $sql);
$consulta5 = mysqli_query($conexao5, $sql);
$consulta6 = mysqli_query($conexao6, $sql);

$registros1 = mysqli_num_rows($consulta1);
$registros2 = mysqli_num_rows($consulta2);
$registros3 = mysqli_num_rows($consulta3);
$registros4 = mysqli_num_rows($consulta4);
$registros5 = mysqli_num_rows($consulta5);
$registros6 = mysqli_num_rows($consulta6);

$registros = mysqli_num_rows($consulta1) + mysqli_num_rows($consulta2) + mysqli_num_rows($consulta3) + mysqli_num_rows($consulta4) + mysqli_num_rows($consulta5) + mysqli_num_rows($consulta6);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Negativa de Débito</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Negativa de Débito <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Cidades
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href=bc.php>
          <i class="fas fa-fw fa-table"></i>
          <span>Balneário Camboriú</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href=ita.php>
          <i class="fas fa-fw fa-table"></i>
          <span>Itajaí</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href=jve.php>
          <i class="fas fa-fw fa-table"></i>
          <span>Joinville</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href=sj.php>
          <i class="fas fa-fw fa-table"></i>
          <span>São José</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href=ipm.php>
          <i class="fas fa-fw fa-table"></i>
          <span>Itapema</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href=sfs.php>
          <i class="fas fa-fw fa-table"></i>
          <span>São Francisco do Sul</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"></nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                                                print "$registros";
                                                                                ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Balneário Camboriú</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                          print "$registros1";
                                                                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Itajaí</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                          print "$registros2";
                                                                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Joinville</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                          print "$registros3";
                                                                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">São José</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                          print "$registros4";
                                                                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Itapema</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                          print "$registros5";
                                                                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">São Francisco do Sul</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                          print "$registros6";
                                                                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Miraceli Bonjardim 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>