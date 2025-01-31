<x-sidebar>
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 border p-5 shadow" style="border-radius:5px; background:#FFF;">
    <p class="text-center mt-3">{{ $calendar->getTitle() }}</p>
      <div class="mb-4">
        {!! $calendar->render() !!}
      </div>
      <div class="adjust-table-btn text-right m-auto mt-2 pr-5">
        <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
      </div>
  </div>
</div>
</x-sidebar>
