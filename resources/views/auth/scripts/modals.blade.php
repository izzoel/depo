  <script>
      $("#M_S_mahasiswa").on('show.bs.modal', function(e) {

          ["#S_nim", "#S_nama", "#S_tempat_lahir", "#S_alamat"].forEach(function(selector) {
              $(selector).on('keyup', function() {
                  this.value = this.value.toUpperCase();
              });
          });
      })

      $(document).on('click', '.U_B_mahasiswa', function() {
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
      });

      $(".D_B_mahasiswa").click(function() {
          let nim = $(this).data("nim");

          $(".modalDelete").attr("id", "M_D_mahasiswa-" + nim);
          $("#M_D_mahasiswa-" + nim).modal('show');
          $("#D_route").attr('action', "/data/mahasiswa/destroy/" + nim);
      })

      $(document).on('click', '.U_B_kerusakan', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_kerusakan-" + id);
          $("#M_U_kerusakan-" + id).modal('show');
          $("#U_route").attr('action', "/data/kerusakan/update/" + id);

          $.get("/data/kerusakan/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_lokasi").val(data.lokasi).prop('selected', true);
              $("#U_kondisi").val(data.kondisi);
              $("#U_status").val(data.status);
          });
      });

      $(".D_B_kerusakan").click(function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_kerusakan-" + id);
          $("#M_D_kerusakan-" + id).modal('show');
          $("#D_route").attr('action', "/data/kerusakan/destroy/" + id);
      })
  </script>
