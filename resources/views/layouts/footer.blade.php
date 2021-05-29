<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @foreach ($popular_posts as $post)
                                <a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{ $post->getImage() }}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <small>{{ $post->getPostDate() }} / </small>
                                        <small><i class="fa fa-eye"></i> {{ $post->view }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Categories</h2>
                    <div class="link-widget">
                        <ul>
                            @foreach ($cats as $category)
                                <li><a href="{{ route('categories.single', ['slug' => $category->slug]) }}">{{ $category->title }}
                                        <span>({{ $category->posts_count }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Info</h2>
                    <div class="link-widget">
                        <ul>
                            @guest
                                <li><a href="{{ route('register.create') }}">Registration</a></li>
                                <li><a href="{{ route('login.create') }}">Authorization</a></li>
                            @endguest
                            <li><a href="{{ route('send') }}">Contact Us</a></li>
                            <li><a href="#">Blog Information</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.
                </div>
            </div>
        </div>
    </div>
</footer>
