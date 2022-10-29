/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/admin/customer.js ***!
  \****************************************/
$(function () {
  function readURL(input, selector) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $(selector).attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#img").change(function () {
    readURL(this, '#image');
  });
});
$('.toastrDefaultSuccess').click(function () {
  toastr.success('Thêm thành công');
});
$('.toastrDefaultInfo').click(function () {
  toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
});
$('.toastrDefaultError').click(function () {
  toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
});
$('.toastrDefaultWarning').click(function () {
  toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
});
/******/ })()
;