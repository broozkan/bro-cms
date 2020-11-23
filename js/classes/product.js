$(document).ready(function () {

  const table = $("#tbl-product-list");
  const productId = getUrlParameter('product');

  if (productId) {
    $.ajax({
      url: "/cms-admin/controllers/Product.php",
      type: "POST",
      data: {get:productId},
      success: function(result){
        const data = JSON.parse(result);

        $("#product_id").val(data.responseData["product_id"]);
        $("#product_name").val(data.responseData["product_name"]);
        $("#product_description").val(data.responseData["product_description"]);
        $("#product_unit_name").val(data.responseData["product_unit_name"]);
        $("#product_price").val(data.responseData["product_price"]);
        $("#product_availability").val(data.responseData["product_availability"]);

        for (var i = 0; i < data.responseData["product_files"].length; i++) {
          let html = '<div class="col-lg-3">';
          html += '<img class="img img-fluid w-100 h-50" src="/cms-admin/img/products/'+data.responseData["product_files"][i]["file_name"]+'"/>';
          html += '</div>';
          $("#product-files").append(html);
        }

      }}
    );
  }else {
    // get product list
    $.ajax({
      url: "/cms-admin/controllers/Product.php",
      type: "POST",
      data: {list:1},
      success: function(result){
        const data = JSON.parse(result);

        if (data.status == 401) {
          location.href = '/cms-admin/pages/user/login.php';
        }

        for (var i = 0; i < data["responseData"].length; i++) {
          let html = '<tr>';
          html += '<td>'+data["responseData"][i]["product_name"]+'</td>';
          html += '<td>'+data["responseData"][i]["product_unit_name"]+'</td>';
          html += '<td>'+data["responseData"][i]["product_price"]+' ₺</td>';
          html += '<td>'+data["responseData"][i]["product_availability"]+'</td>';
          html += '<td>';
          html += '<a href="/cms-admin/pages/product/update-product.php?product='+data["responseData"][i]["product_id"]+'" class="btn btn-primary btn-sm">Düzenle</a>';
          html += '<button class="btn btn-danger btn-sm ml-2 delete-product" product-id='+data["responseData"][i]["product_id"]+'>Sil</button>';
          html += '</td>';
          html += '<tr>';

          table.find("tbody").append(html);
        }
      }}
    );
  }




  $(document).on("click",".delete-product", function () {
    const row = $(this).closest("tr");
    const product_id = $(this).attr("product-id");

    $.ajax({
      url: "/cms-admin/controllers/Product.php",
      type: "POST",
      data: {delete:product_id},
      success: function(result){
        const data = JSON.parse(result);

        if (data.response) {
          alert("Başarılı!");
          row.remove();
        }else {
          alert(data.responseData);
        }

      }}
    );

  })


  $("#frm-new-product").on("submit",function (e) {
    e.preventDefault();
    let isProductSaved = false;

    let product_id;
    let formValues = $(this).serializeJSON();
    let json = JSON.stringify(formValues);

    $.ajax({
      url: "/cms-admin/controllers/Product.php",
      type: "POST",
      async: false,
      data: {new:json},
      success: function(result){
        const data = JSON.parse(result);

        if (data.response) {
          alert("Ürün eklendi!");
          isProductSaved = true;
          product_id = data.responseData;

        }else {
          isProductSaved = false;

          alert(data.responseData);
        }

      }}
    );

    if (isProductSaved) {
      let formData = new FormData();

      for (var i = 0; i < $('#product_images')[0].files.length; i++) {
        formData.append('product_images[]', $('#product_images')[0].files[i]);
        formData.append('product', product_id);
      }

      $.ajax({
        url : '/cms-admin/controllers/File.php',
        type : 'POST',
        data : formData,
        async: false,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(result) {
          const data = JSON.parse(result);
          if (data.response) {
            alert("Görseller başarılyla yüklendi!");
            location.reload();
          }else {
            alert(data.responseData);
          }
        }
      });
    }
  })


  $("#frm-update-product").on("submit",function (e) {
    e.preventDefault();
    let isProductSaved = false;

    let formValues = $(this).serializeJSON();
    let json = JSON.stringify(formValues);
    let product_id = formValues["product_id"];

    $.ajax({
      url: "/cms-admin/controllers/Product.php",
      type: "POST",
      async: false,
      data: {update:json},
      success: function(result){
        const data = JSON.parse(result);

        if (data.response) {
          alert("Ürün düzenlendi!");
          isProductSaved = true;

        }else {
          isProductSaved = false;

          alert(data.responseData);
        }

      }}
    );

    if (isProductSaved) {

      let shouldOtherPicturesDelete = "0";

      if($('#product_images')[0].files.length < 1){
        location.reload();
        return false;
      }else {
        shouldOtherPicturesDelete="1";
      }


      let formData = new FormData();

      for (var i = 0; i < $('#product_images')[0].files.length; i++) {
        formData.append('product_images[]', $('#product_images')[0].files[i]);
        formData.append('product', product_id);
        formData.append('delete-before', shouldOtherPicturesDelete);
      }

      $.ajax({
        url : '/cms-admin/controllers/File.php',
        type : 'POST',
        data : formData,
        async: false,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(result) {
          const data = JSON.parse(result);
          if (data.response) {
            alert("Görseller başarılyla yüklendi!");
            location.reload();
          }else {
            alert(data.responseData);
          }
        }
      });
    }
  })

})



const getUrlParameter = (sParam) => {
  var sPageURL = window.location.search.substring(1),
  sURLVariables = sPageURL.split('&'),
  sParameterName,
  i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }
};
