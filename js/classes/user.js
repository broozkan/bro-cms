$(document).ready(function () {



  // login
  $("#frm-login").on("submit",function (e) {
    e.preventDefault();
    var formValues = $("form#frm-login").serializeJSON();
    var json = JSON.stringify(formValues);

    $.ajax({
      url: "/cms-admin/controllers/User.php",
      type: "POST",
      data: {login:json},
      success: function(result){
        const data = JSON.parse(result);
        
        if (data.response) {
          alert("Giriş başarılı!");
          location.href="/cms-admin/pages/product/product-list.php";
        }else {
          alert(data.responseData);
        }
      }}
    );
  })



})
