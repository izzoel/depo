$(document).ready(function() {
  const name = 'admin'; // Set the username here

  $('#admin').on('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    Swal.fire({
      title: "Sst.. Passwordnya?",
      input: "password",
      showCancelButton: true,
      confirmButtonText: "Login",
      showLoaderOnConfirm: true,
      preConfirm: async (password) => {

        try {
          const response = await $.ajax({
            url: '/login', // Replace with your login URL
            method: 'POST',
            data: {
              name: name,
              password: password,
              _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            dataType: 'json'
          });

          if (response.success) {
            Swal.fire({
              title: 'Berhasil!',
              icon: 'success'
            }).then(() => {
              window.location.href = '/depo'; // Redirect to the dashboard or another page
            });
          } else {
            Swal.showValidationMessage(`Password Salah!`);
          }
        } catch (error) {
          Swal.showValidationMessage(`Request failed: ${error}`);
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    });
  });
});
