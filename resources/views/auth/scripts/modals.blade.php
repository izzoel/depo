  <script>
      $("#M_S_mahasiswa").on('show.bs.modal', function(e) {

          ["#S_nim", "#S_nama", "#S_tempat_lahir", "#S_alamat"].forEach(function(selector) {
              $(selector).on('keyup', function() {
                  this.value = this.value.toUpperCase();
              });
          });
      })

      $(".U_B_Mahasiswa").click(function() {
          let nim = $(this).data("nim").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_mahasiswa-" + nim);
          $("#M_U_mahasiswa-" + nim).modal('show');
          $("#U_route").attr('action', "/data/mahasiswa/update/" + nim);

          $.get("/data/mahasiswa/show/" + nim, function(data) {
              if (data.kelamin == "L") {
                  var kelamin = "#U_l";
              } else {
                  var kelamin = "#U_p";
              }
              $("#U_nim").val(data.nim);
              $("#U_nama").val(data.nama);
              $("#U_tempat_lahir").val(data.tempat_lahir);
              $("#U_tanggal_lahir").val(data.tanggal_lahir);
              $(kelamin).val(data.kelamin).prop('checked', true);
              $("#U_prodi").val(data.prodi).prop('selected', true);
              $("#U_hp").val(data.no_hp);
              $("#U_alamat").val(data.alamat);
          });

          ["#U_nim", "#U_nama", "#U_tempat_lahir", "#U_alamat"].forEach(function(selector) {
              $(selector).on('keyup', function() {
                  this.value = this.value.toUpperCase();
              });
          });
      })



      $(".D_B_Mahasiswa").click(function() {
          let nim = $(this).data("nim");

          $(".modalDelete").attr("id", "M_D_mahasiswa-" + nim);
          $("#M_D_mahasiswa-" + nim).modal('show');
          $("#D_route").attr('action', "/data/mahasiswa/destroy/" + nim);


          //   alert($(".modalDelete").attr("id"));
      })

      //   $("#M_D_mahasiswa").on('show.bs.modal', function(e) {
      //       $("#D_route").click(function() {
      //           alert("tes2");
      //       })
      //   })




      //       let nim = $(this).data("nim").split('-').pop();
      //       alert(nim)
      //       //   $("#D_route").attr('action', "/data/mahasiswa/destroy/" + nim);
  </script>
