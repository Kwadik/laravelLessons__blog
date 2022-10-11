<?php

/**
 * @var \Illuminate\Pagination\Paginator $ramdom_posts
 */

$random_post_index = 0;
$fetured_post_index = 0;
$fetured_post_data = [
    'fade-right',
    'fade-up',
    'fade-left',
];

?>
@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($featured_posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="{{ $fetured_post_data[$fetured_post_index] }}">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ "storage/{$post->preview_image}" }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            <a href="#!" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                        <?php $fetured_post_index++; ?>
                    @endforeach
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <?php $counter = 1 + $ramdom_posts->perPage() * ($ramdom_posts->currentPage() - 1); ?>
                    @foreach($ramdom_posts as $post)
                            @if($random_post_index === 0)
                                <div class="row blog-post-row">
                                    @endif
                                    <div class="col-md-6 blog-post" data-aos="fade-up">
                                        <div class="blog-post-thumbnail-wrapper">
                                            <img src="{{ "storage/{$post->preview_image}" }}" alt="blog post">
                                        </div>
                                        <p class="blog-post-category">{{ $post->category->title }}</p>
                                        <a href="#!" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                                        </a>
                                    </div>
                                    @if($random_post_index === 1 || $ramdom_posts->total() === $counter)
                                </div>
                            @endif
                                    <?php $random_post_index = $random_post_index ? 0 : 1;
                                    $counter++; ?>
                        @endforeach
                        <div class="row">
                            <div class="mx-auto" style="margin-top: -80px;" data-aos="fade-up">
                                {{ $ramdom_posts->links() }}
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title">Post Lists</h5>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <figure class="carousel-item active">
                                        <img src="{{ asset('assets/images/blog_widget_carousel.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                    <figure class="carousel-item">
                                        <img src="{{ asset('assets/images/blog_7.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/images/blog_5.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярное</h5>
                        <ul class="post-list">
                            @foreach($popular_posts as $post)
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="{{ "storage/{$post->preview_image}" }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories" class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
