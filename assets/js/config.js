function search(){
  $("#loading").show(); // Tampilkan loadingnya
  
  $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: baseurl + "form/search", // Isi dengan url/path file php yang dituju
        data: {id_bayar : $("#id_bayar").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
    },
    success: function(response){ // Ketika proses pengiriman berhasil
            $("#loading").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
        $("#nm_bayar").val(response.nm_bayar); // set textbox dengan id nama
        $("#an").val(response.an); // set textbox dengan id jenis kelamin
        $("#norek").val(response.norek); // set textbox dengan id telepon
      }else{ // Jika isi dari array status adalah failed
        alert("Data Tidak Ditemukan");
      }
    },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      alert(xhr.responseText);
        }
    });
}
$(document).ready(function(){
  $("#loading").hide(); // Sembunyikan loadingnya
  
    $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });
    
    $("#id_bayar").keyup(function(){ // Ketika user menekan tombol di keyboard
    if(event.keyCode == 13){ // Jika user menekan tombol ENTER
      search(); // Panggil function search
    }
  });
});