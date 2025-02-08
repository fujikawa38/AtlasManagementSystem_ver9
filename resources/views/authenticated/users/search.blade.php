<x-sidebar>
<div class="search_content w-100 d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person shadow">
      <div>
        <span class="user_item">ID : </span><span class="user_data">{{ $user->id }}</span>
      </div>
      <div>
        <span class="user_item">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span class="user_data">{{ $user->over_name }}</span>
          <span class="user_data">{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span class="user_item">カナ : </span>
        <span class="user_data">({{ $user->over_name_kana }}</span>
        <span class="user_data">{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span class="user_item">性別 : </span><span class="user_data">男</span>
        @elseif($user->sex == 2)
        <span class="user_item">性別 : </span><span class="user_data">女</span>
        @else
        <span class="user_item">性別 : </span><span class="user_data">その他</span>
        @endif
      </div>
      <div>
        <span class="user_item">生年月日 : </span><span class="user_data">{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span class="user_item">権限 : </span><span class="user_data">教師(国語)</span>
        @elseif($user->role == 2)
        <span class="user_item">権限 : </span><span class="user_data">教師(数学)</span>
        @elseif($user->role == 3)
        <span class="user_item">権限 : </span><span class="user_data">講師(英語)</span>
        @else
        <span class="user_item">権限 : </span><span class="user_data">生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span class="user_item">選択科目 : </span>
          @foreach($subjects as $subject)   <!--ChatGPTで調べた-->
            @if($subject->users->contains('id', $user->id))
            <span class="user_data">{{ $subject->subject }}</span>
            @endif
          @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 pr-5">
    <div class="">
      <div>
        <p class="search_text mt-5 mb-2">検索</p>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="mt-3 mb-3">
        <lavel class="search_label mb-2">カテゴリ</lavel>
        <select form="userSearchRequest" name="category" class="search_select">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="mt-3 mb-3">
        <label class="search_label mb-2">並び替え</label>
        <select name="updown" form="userSearchRequest" class="search_select">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="search_accordion">
        <p class="m-0 pb-2 search_conditions"><span>検索条件の追加</span></p>
        <div class="search_conditions_inner">
          <div class="selected_gender">
            <label class="search_label mt-3 mb-2">性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
          <div>
            <label class="search_label mt-3 mb-2">権限</label>
            <select name="role" form="userSearchRequest" class="engineer search_select">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label class="search_label mt-3 mb-2">選択科目</label>
            @foreach($subjects as $subject)
              <span>{{ $subject->subject }}</span><input type="checkbox" name="subjects[]" value="{{ $subject->id }}" form="userSearchRequest" class="mr-2">
            @endforeach
          </div>
        </div>
      </div>
      <div class="search_btn_area mt-4 mb-4">
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="btn btn-info search_btn">
      </div>
      <div class="search_btn_area">
        <input type="reset" value="リセット" form="userSearchRequest" class="reset_btn">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
</x-sidebar>
