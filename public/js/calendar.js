//モーダル
$(function () {
  $('.cancel-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserve_part = $(this).attr('reserve_part');
    var reserve_day = $(this).val();
    $('.cancel-modal-part').text(reserve_part);
    $('.cancel-modal-day').text(reserve_day);
    $('.cancel-modal-part-hidden').val(reserve_part);
    $('.cancel-modal-day-hidden').val(reserve_day);
    return false;
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});
