<x-sidebar>
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p class="post_name"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}" class="post_title">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div class="post_category">
          @foreach($sub_categories as $sub_category)
            @if($sub_category->posts->contains('id', $post->id))
            <p class="sub_category">{{ $sub_category->sub_category }}</p>
            @endif
          @endforeach
        </div>
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">{{ $post->commentCounts($post->id)->count() }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>   <!-- なんで$likeが使える？ -->
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25">
    <div class="m-4">
      <div>
        <a href="{{ route('post.input') }}" class="btn btn-info btn_post btn_text">投稿</a>
      </div>
      <div class="input-group mb-3 mt-3">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="form-control">
        <input type="submit" value="検索" form="postSearchRequest" class="btn btn-info btn_keyword">
      </div>
      <div class="mb-3">
        <input type="submit" name="like_posts" class="category_btn btn_like_posts" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="category_btn btn_my_posts" value="自分の投稿" form="postSearchRequest">
      </div>
      <div class="search_category">
        <p>カテゴリー検索</p>
        <ul>
          @foreach($categories as $category)
          <li class="main_categories category_name{{ $category->id }}" category_id="{{ $category->id }}"><span>{{ $category->main_category }}</span></li>
            @foreach($sub_categories as $sub_category)
              @if($category->id == $sub_category->main_category_id)
              <li class="sub_categories category_num{{ $category->id }}">
                <input type="submit" name="category_word" class="" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
              </li>
              @endif
            @endforeach
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
