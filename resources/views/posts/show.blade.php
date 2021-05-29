@extends('layouts.main_layout')

@section('title', 'Markedia - Marketing Blog Template :: ' . $post->title)

@section('content')
    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                </li>
                <li class="breadcrumb-item active">{{ $post->title }}</li>
            </ol>

            <span class="color-yellow"><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                    title="">{{ $post->category->title }}</a></span>

            <h3>{{ $post->title }}</h3>

            <div class="blog-meta big-meta">
                <small>{{ $post->getPostDate() }}</small>
                <small><i class="fa fa-eye"></i> {{ $post->view }}</small>
            </div>

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="single-post-media">
            <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
        </div>

        <div class="blog-content">
            {!! $post->content !!}
        </div>

        <div class="blog-title-area">
            @if ($post->tags->count())
                <div class="tag-cloud-single">
                    <span>Tags</span>
                    @foreach ($post->tags as $tag)
                        <small><a href="{{ route('tags.single', ['slug' => $tag->slug]) }}"
                                title="">{{ $tag->title }}</a></small>
                    @endforeach
                </div>
            @endif

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">You may also like</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="{{ route('posts.single', ['slug' => $post_raw1->slug]) }}" title="">
                                <img src="{{ $post_raw1->getImage() }}" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div>
                            </a>
                        </div>
                        <div class="blog-meta">
                            <h4><a href="{{ route('posts.single', ['slug' => $post_raw1->slug]) }}"
                                    title="">{{ $post_raw1->title }}</a></h4>
                            <small><a href="{{ route('categories.single', ['slug' => $post_raw1->category->slug]) }}"
                                    title="">{{ $post_raw1->category->title }}</a></small>
                            <small>{{ $post_raw1->getPostDate() }}</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="{{ route('posts.single', ['slug' => $post_raw2->slug]) }}" title="">
                                <img src="{{ $post_raw2->getImage() }}" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div>
                            </a>
                        </div>
                        <div class="blog-meta">
                            <h4><a href="{{ route('posts.single', ['slug' => $post_raw2->slug]) }}"
                                    title="">{{ $post_raw2->title }}</a></h4>
                            <small><a href="{{ route('categories.single', ['slug' => $post_raw2->category->slug]) }}"
                                    title="">{{ $post_raw2->category->title }}</a></small>
                            <small>{{ $post_raw2->getPostDate() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">{{ $post->comments }} Comments</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="comments-list">
                        @foreach ($comments as $comment)
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading user_name">{{ $comment->user->name }}
                                        <small>{{ $comment->getPostDate() }}</small>
                                    </h4>
                                    <p>{!! $comment->comment !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="Page navigation">
                        {{ $comments->appends(['slug' => $post->slug])->onEachSide(2)->links() }}
                    </nav>
                </div>
            </div>
        </div>

        <hr class="invis1">
        @auth
            <div class="custombox clearfix">
                <h4 class="small-title">Leave a Reply</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-wrapper" method="post"
                            action="{{ route('posts.comments', ['slug' => $post->slug, 'id' => auth()->user()->id]) }}">
                            @csrf
                            <textarea class="form-control" name="comment" id="comment" placeholder="Your comment"></textarea>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
        @guest
            <div class="custombox clearfix">
                <h4 class="small-title">Leave a Reply</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Only registered users can leave comments</p>
                    </div>
                </div>
            </div>
        @endguest
    </div>
@endsection
