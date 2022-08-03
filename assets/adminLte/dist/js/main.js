/* globals Stepper:false */

(function () {
    'use strict'
  
    window.stepper1 = new Stepper(document.querySelector('#stepper1'))
    $('#wizardId').on('click', function (e) {
      e.preventDefault();
      if (!$('input[name="P1"]').val() || !$('input[name="P2"]').val() || !$(
              'input[name="pilih"]:checked').val()) {
          Swal.fire(
              'Empty Field',
              'Harap isi semua field yang kosong!',
              'warning'

          )
          return false;
      }
      Swal.fire(
          'Data Terkirim',
          'Data yang anda amsukkan sudah diterima harap tunggu konfirmasi dari admin!',
          'success'

      )
  });
  
  })()