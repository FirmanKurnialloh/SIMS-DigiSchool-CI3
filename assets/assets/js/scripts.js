(function (window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */

})(window);
//login-pd-confirm
$("#tanggalLahirConfirmLogin").bind('change input', function() {
  $('#btnConfirmLogin').attr('class', 'btn btn-sm btn-primary');
  $('#btnConfirmLogin').html('Lanjutkan');
  $('#btnConfirmLogin').removeAttr("disabled");
});

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
//login-pd-confirm