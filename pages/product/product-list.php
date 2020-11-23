<!DOCTYPE html>
<html lang="en">

<head>

  <?php require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/components/Head.php"; ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/components/Sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require $_SERVER["DOCUMENT_ROOT"]."/cms-admin/components/Navbar.php"; ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">
            Ürünler
            <a href="/cms-admin/pages/product/new-product.php" class="btn btn-primary btn-sm ml-2" name="button"> <span class="fa fa-plus"></span> Yeni Ürün Ekle</a>
          </h1>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ürün Listesi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" id="tbl-product-list" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ürün Adı</th>
                      <th>Ürün Birimi</th>
                      <th>Ürün Fiyatı</th>
                      <th>Stokta Var Mı</th>
                      <th>İşlem</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
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
  <script src="/cms-admin/js/classes/product.js" charset="utf-8"></script>

</body>

</html>
