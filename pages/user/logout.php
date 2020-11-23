<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/components/Head.php"; ?>
</head>

<body id="page-top">
  
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <div class="row">
          <div class="col-lg-4 offset-lg-4">
            <div class="container-fluid">



              <!-- DataTales Example -->
              <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Oturumu Kapat</h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <h5>Oturumunuz kapatılmıştır</h5>
                      <a href="/">Siteye geri dön</a>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Begin Page Content -->

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/components/Footer.php"; ?>

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
  <?php require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/components/Script.php"; ?>
  <script src="/cms-admin/js/classes/user.js" charset="utf-8"></script>

</body>

</html>
