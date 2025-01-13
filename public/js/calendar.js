//モーダル
$(function () {
  $('.cancel-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserve_part = $(this).attr('reserve_part');
    var reserve_day = $(this).attr('reserve_day');
    $('.cancel-modal-part span').text(reserve_part);
    $('.cancel-modal-day span').text(reserve_day);
    return false;
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});
