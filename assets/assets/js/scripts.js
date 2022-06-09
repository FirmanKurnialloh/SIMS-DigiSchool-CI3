(function (window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */

  //login-pd-confirm
  $("#tanggalLahirConfirmLogin").bind('change input', function() {
    $('#btnConfirmLogin').attr('class', 'btn btn-sm btn-primary');
    $('#btnConfirmLogin').html('Lanjutkan');
    $('#btnConfirmLogin').removeAttr("disabled");
  });

  //flatpickr
  var basicPickr = $('.flatpickr-basic');
  if (basicPickr.length) {
    basicPickr.flatpickr({
      // minDate: 'today',
      altInput: true,
      altFormat: 'l, j F Y',
      dateFormat: 'Y-m-d',
      locale: 'id'
    });
  }

  //select2 
  var select2 = $('.select2');
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownParent: $this.parent()
      });
    });
  }

  var hideSearch = $('.hide-search');
  hideSearch.select2({
    minimumResultsForSearch: Infinity
  });

  //form validation  
  var form = $('.validate-form');
  if (form.length) {
    form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          firstName: {
            required: true
          },
          lastName: {
            required: true
          },
          accountActivation: {
            required: true
          }
        }
      });
      // $this.on('submit', function (e) {
      //   e.preventDefault();
      // });
    });
  }

  // Update user photo on click of button
    var accountUploadImg = $('#account-upload-img');
    var accountUploadBtn = $('#account-upload');
    var accountUserImage = $('.uploadedAvatar');
    var accountResetBtn  = $('#account-reset');

  if (accountUserImage) {
    var resetImage = accountUserImage.attr('src');
    accountUploadBtn.on('change', function (e) {
      var reader = new FileReader(),
        files = e.target.files;
      reader.onload = function () {
        if (accountUploadImg) {
          accountUploadImg.attr('src', reader.result);
        }
      };
      reader.readAsDataURL(files[0]);
    });

    accountResetBtn.on('click', function () {
      accountUserImage.attr('src', resetImage);
    });
  }

  // Update user photo on click of button
    var accountUploadImg2 = $('#account-upload-img2');
    var accountUploadBtn2 = $('#account-upload2');
    var accountUserImage2 = $('.uploadedAvatar2');
    var accountResetBtn2  = $('#account-reset2');

  if (accountUserImage) {
    var resetImage2 = accountUserImage2.attr('src');
    accountUploadBtn2.on('change', function (e) {
      var reader = new FileReader(),
        files = e.target.files;
      reader.onload = function () {
        if (accountUploadImg2) {
          accountUploadImg2.attr('src', reader.result);
        }
      };
      reader.readAsDataURL(files[0]);
    });

    accountResetBtn2.on('click', function () {
      accountUserImage2.attr('src', resetImage2);
    });
  }

})(window);