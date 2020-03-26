@extends("layouts/template")
@section("content")
    <div class="hero-wrap" style="background-image: url({{ asset("images/bg_1.jpg") }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
                        <h1 class="mb-4 bread">Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-around">
                    <div class="mt-5 mb-5">
                        <input type="text" name="blogSearch" id="blogSearch" placeholder="Search Blog" />
                    </div>
                </div>
            </div>
            {{--  @dd($allBlogs)  --}}
            <div class="row d-flex" id="blogs">
                @foreach ($allBlogs as $b)
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <p class="block-20" style="background-image: url({{ asset("".$b->srcBlog) }});">
                        </p>
                        <div class="text mt-3 d-block">
                            <h3 class="heading mt-3">{{ $b->textBlog }}</h3>
                            <div class="meta mb-3">
                                <div>{{ $b->blogDate }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27 d-flex justify-content-around">
                            <ul id="paginationButtons">
                                @for($i = 1; $i <= $numberOfBlogs->numberOfBlogs/8; $i++)
                                    <li><a class="paginationLinks" href="/blog?page={{$i}}" data-id="{{$i}}">{{$i}}</a></li>
                                @endfor
                            </ul>


                           {{--  {{  $allBlogs->links() }}  --}}
                            {{--  <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>  --}}


                    </div>
                </div>
            </div>
        </div>
    </section>
    @component("partials.instagram")
    @endcomponent
@endsection
