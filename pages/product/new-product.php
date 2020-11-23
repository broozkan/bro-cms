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
            Yeni Ürün Ekle
          </h1>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ürün Bilgileri</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <form class="" id="frm-new-product" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label for="product_name">Ürün Adı *</label>
                      <input type="text" required name="product_name" id="product_name" class="form-control form-control-sm" value="" placeholder="Ürün adı giriniz...">
                    </div>
                    <div class="form-group">
                      <label for="product_description">Ürün Açıklaması *</label>
                      <input type="text" required name="product_description" id="product_description" class="form-control form-control-sm" value="" placeholder="Ürün açıklaması giriniz...">
                    </div>
                    <div class="form-group">
                      <label for="product_unit_name">Ürün Birimi *</label>
                      <select class="form-control form-control-sm" name="product_unit_name" id="product_unit_name">
                        <option value="">-Ürün Birimi Seçiniz-</option>
                        <option value="Adet">Adet</option>
                        <option value="Kg">Kg</option>
                        <option value="G">Gram</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="product_price">Ürün Fiyatı *</label>
                      <input type="number" step=".01" required name="product_price" id="product_price" class="form-control form-control-sm" value="" placeholder="Ürün fiyatı giriniz...">
                    </div>
                    <div class="form-group">
                      <label for="product_images">Ürün Görselleri *</label>
                      <input type="file" multiple step=".01" required name="product_images" id="product_images" class="form-control form-control-sm" value="" placeholder="Ürün görselleri giriniz...">
                    </div>
                    <div class="form-group">
                      <label for="product_availability">Ürün Stokta Var Mı? *</label>
                      <select class="form-control form-control-sm" name="product_availability" id="product_availability">
                        <option value="1">Stokta var</option>
                        <option value="0">Stokta yok</option>
                      </select>
                    </div>
                    <div class="form-group float-right">
                      <a href="/cms-admin/pages/product/product-list.php">Geri Dön</a>
                      <button type="submit" class="btn btn-primary btn-sm" name="button">Kaydet</button>
                    </div>
                  </form>
                </div>
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
