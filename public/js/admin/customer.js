/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/admin/customer.js ***!
  \****************************************/
$('#delete').click(function () {
  confirm("Bạn có chắc chắn muốn xóa ?");
});
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
/******/ })()
;