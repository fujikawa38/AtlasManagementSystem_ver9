<x-sidebar>
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5 shadow" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto" style="border-radius:5px;">
      <p class="text-center mt-3">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
    <div class="modal js-modal" id="modalCancel">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <p>予約日：<span class="cancel-modal-day"></span></p>
        <p>時間：<span class="cancel-modal-part"></span></p>
        <p>上記の予約をキャンセルしてもよろしいですか？</p>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-primary d-inline-block" href="">閉じる</a>
            <input type="hidden" class="cancel-modal-day-hidden" name="reserve_day" value="" form="deleteParts">
            <input type="hidden" class="cancel-modal-part-hidden" name="reserve_part" value="" form="deleteParts">
            <input type="submit" class="btn btn-danger d-block" value="キャンセル" form="deleteParts">
        </div>
      </div>
    </div>
  </div>
</div>
</x-sidebar>
