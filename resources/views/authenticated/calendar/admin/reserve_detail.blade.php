<x-sidebar>
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 m-auto h-75">
    <p><span>{{ $dateJapanese }}</span><span class="ml-3">{{ $part }}部</span></p>
    <div class="border shadow p-2" style="border-radius:5px; background:#FFF;">
      <table class="reserve_detail_table">
        <tr class="text-center reserve_detail_tag">
          <th class="reserve_detail_id">ID</th>
          <th class="w-25">名前</th>
          <th class="w-25">場所</th>
        </tr>
        @foreach($reservePersons as $persons)
          @foreach($persons->users as $person)   <!-- もっと効率的なやり方もある気がする -->
            <tr class="text-center reserve_detail_data">
              <td class="reserve_detail_id pt-2 pb-2">{{ $person->id }}</td>
              <td class="w-25 pt-2 pb-2">{{ $person->over_name }}{{ $person->under_name }}</td>
              <td class="w-25 pt-2 pb-2">リモート</td>
          </tr>
          @endforeach
        @endforeach
      </table>
    </div>
  </div>
</div>
</x-sidebar>
