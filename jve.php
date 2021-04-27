<?php

include_once("conexao3.php");

$sql = "SELECT ia.DataAtendimento, ia.CodUsuario, i.CodImovel, i.InscImobiliaria, lo.NomeLogradouro, i.NrImovel, i.CompEndereco, i.NrApto, ba.NomeBairro, i.CEP, ia.DescAtendimento, i.NrDIC, ia.NrAtendimento
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
ORDER BY ia.DataAtendimento;";

$consulta3 = mysqli_query($conexao3, $sql);

$registros3 = mysqli_num_rows($consulta3);

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
            <h1 class="h3 mb-0 text-gray-800">Joinville</h1>
          </div>

          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total</div>
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
          </div>



          <!-- Solicitações -->





          <?php

          while ($exibirRegistros = mysqli_fetch_array($consulta3)) {

            $dataAtendimento = $exibirRegistros[0];
            $codUsuario = $exibirRegistros[1];
            $codImovel = $exibirRegistros[2];
            $inscImobiliaria = $exibirRegistros[3];
            $nomeLogradouro = $exibirRegistros[4];
            $nrImovel = $exibirRegistros[5];
            $compEndereco = $exibirRegistros[6];
            $nrApto = $exibirRegistros[7];
            $nomeBairro = $exibirRegistros[8];
            $cep = $exibirRegistros[9];
            $descAtencimento = $exibirRegistros[10];
            $nrDic = $exibirRegistros[11];
            $nrAtendimento = $exibirRegistros[12];
            $str = "Rua $nomeLogradouro, Nº $nrImovel - $compEndereco $nrApto - $nomeBairro";
            $str2 = mb_strtoupper($str);
            $endCompleto = mb_convert_case($str2, MB_CASE_TITLE, 'UTF-8');
            $dataConvertida = date('d/m/Y', strtotime($dataAtendimento));

            print '<div class="card shadow mb-4">';
            print '<div class="card-header py-3">';
            print '<h6 class="m-0 font-weight-bold text-primary">Data: ';
            print "$dataConvertida";
            print '</h6>';
            print '<h6 class="m-0 font-weight-bold text-primary">Aberta por: ';
            print "$codUsuario";
            print '</h6>';
            print '</div>';
            print '<div class="card-body" style="color:black;">';
            print '<div class="row">';
            print '</div>';
            print '<div class="row">'; //abre div grandona
            print '<div class="col" style="color:black; text-align:justify;">'; //abre div para o formulário

            //corpo da div e do form
            print
            '<form action="baixar3.php" method="get">

            <div class="form-group">
            <label for="nrAtendimento" class="control-label"><strong>Nr Atendimento:</strong></label>
            <div class="form-control-static">
              <input style="width:15%; border:none" type="text" id="nrAtendimento" name="nrAtendimento" value="';
            print "$nrAtendimento";
            print '" />
            </div>
            </div>

            <div class="form-group">
            <label for="codImovel" class="control-label"><strong>Código do Imóvel:</strong></label>
            <div class="form-control-static">
              <input style="width:15%; border:none" type="text" id="codImovel" name="codImovel" value="';
            print "$codImovel";
            print '" />
            </div>
            </div>

            <div class="form-group">
            <label for="inscImobiliaria" class="control-label"><strong>Inscrição Imobiliária:</strong></label>
            <div class="form-control-static">
              <input style="width:20%; border:none" type="text" id="inscImobiliaria" name="inscImobiliaria" value="';
            print "$inscImobiliaria";
            print '" />
            </div>
            </div>

            <div class="form-group">
            <label for="endCompleto" class="control-label"><strong>Endereço:</strong></label>
            <div class="form-control-static">
              <input style="width:70%; border:none" type="text" id="endCompleto" name="endCompleto" value="';
            print "$endCompleto";
            print '" />
            </div>
            </div>

            <div class="form-group">
            <label for="periodo" class="control-label"><strong>Período:</strong></label>
            <div class="form-control-static">
              <input class="form-control" style="width:40%" type="text" id="periodo" name="periodo" value="" />
              <small id="periodo" class="form-text text-muted">Digite aqui o período</small>
            </div>
            </div>

            <div class="form-group">
            <label for="codImovel" class="control-label"><strong>Observação:</strong></label>
            <div class="form-control-static">
               <label style="color:black; text-align:justify;">';
            echo utf8_encode($descAtencimento);
            print '</label>
            </div>
            </div>
            
            <!-- botão do form --> 
            <input type="submit" value="Baixar .doc" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
              name="Submit" id="frm1_submit"/>

          
            </form>';


            print '</div>'; //fecha div
            print '</div>';
            print '</div>';
            print '</div>';
          }



          mysqli_close($conexao3);
          ?>

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