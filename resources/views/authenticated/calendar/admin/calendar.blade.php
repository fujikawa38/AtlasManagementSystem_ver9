<x-sidebar>
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 border p-5 shadow" style="border-radius:5px; background:#FFF;">
    <p class="text-center mt-3">{{ $calendar->getTitle() }}</p>
    <div class="mb-4">
      {!! $calendar->render() !!}
    </div>
  </div>
</div>
</x-sidebar>
