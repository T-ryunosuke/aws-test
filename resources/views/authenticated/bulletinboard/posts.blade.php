@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100  m-auto d-flex">
  <div class="post_view w-100 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>

        <div class="d-flex post_status justify-content-between">
          @foreach($post->subCategories as $sub_category)
            <p class="sub_category">
              {{ $sub_category->sub_category }}
            </p>
          @endforeach
          <div class='d-flex'>
            <div class="mr-5">
              <i class="fa fa-comment comment_btn"></i><span class="">{{ $post_comment->commentCounts($post->id)->count() }}</span>
            </div>
            <div>
              @if(Auth::user()->is_Like($post->id))
              <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
              @else
              <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
              @endif
            </div>
          </div>
        </div>

    </div>
    @endforeach
  </div>
  <div class="other_area w-50">
    <div class="post_light_box text-center mt-5 d-flex">
      <div class="text-center mb-2"><a href="{{ route('post.input') }}" class="custom-button post_button">投稿</a></div>
      <div class="post_search_box d-flex">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        &nbsp;
        <input type="submit" class="custom-button search_button" value="検索" form="postSearchRequest">
      </div>
      <div class="default_category_box d-flex my-2 pt-2">
        <input type="submit" name="like_posts" class="custom-button category_btn1" value="いいねした投稿" form="postSearchRequest">
        &nbsp;
        <input type="submit" name="my_posts" class="custom-button category_btn2" value="自分の投稿" form="postSearchRequest">
      </div>
      <p class="text-left m-0 pt-2">カテゴリー検索</p>
      <div class="accordion">
        <div class="text-left accordion-item">
          @foreach($categories as $category)
          <div class="main_categories accordion-header" category_id="{{ $category->id }}"><span>{{ $category->main_category }}<span></div>
            <ul class="sub_categories accordion-content">
              @foreach($category->subCategories as $sub_category)
              <li>
                <input type="submit" name="category_word" class="category_btn3" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
              </li>
              @endforeach
            </ul>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
