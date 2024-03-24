@extends('layouts.app')

@section('content')

    <!-- title page -->
    <div class="ltn__slide-item ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container" style="padding-top:50px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h2 class="ltn__page-title">TIN TỨC</h2>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="/">Trang Chủ</a></li>
                                <li><a href="/tin-tuc">Tin Tức</a></li>
                                <li>{{ $data[0]['name'] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__page-details-area ltn__blog-details-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__blog-details-wrap" style="padding:0">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li>
                                        <span> {{ \Carbon\Carbon::parse($data[0]['created_at'])->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="ltn__blog-comment">
                                        <a href="#"><i class="icon-note"></i> KimChiWatch</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title blog-title-line">{{ $data[0]['name'] }}</h3>
                            <img class="blog-details-main-image mb-15" src="{{ asset('storage/images-product/' . basename($data[0]['images'])) }}" alt="Image">

                            <p> {!! $data[0]['description'] !!} </p>
                        </div>

                        <!-- blog-tags-social-media -->
                        <div class="ltn__blog-tags-social-media mt-20 row">
                            <div class="ltn__tagcloud-widget col-lg-7">
                                <h4>Tags: </h4>
                                <ul>
                                    <li>
                                        <a href="/tin-tuc">#tin-tuc</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- prev-next-btn -->
                        <div class="ltn__prev-next-btn row mb-50" style="gap:10px">
                            @if ($previousPost)
                                @php
                                    $name = preg_replace('/[\/,?!@%#*&()^]+/', '-', $previousPost['name']);
                                    $name = str_replace(' ', '-', strtolower($name));
                                    $link = preg_replace('/-+/', '-', trim($name, '-'));
                                @endphp
                                <div class="blog-prev col-lg-6">
                                    <div class="blog-prev-next-img">
                                        <a href="/tin-tuc/{{ $link }}?id={{ $previousPost['id'] }}"><img src="{{ asset('storage/images-product/' . basename($previousPost['images'])) }}" alt="Image"></a>
                                    </div>
                                    <div class="blog-prev-next-info">
                                        <p>Tin Tức Trước</p>
                                        <h3 class="ltn__blog-title"><a href="/tin-tuc/{{ $link }}?id={{  $previousPost['id'] }}">{{ $previousPost['name'] }}</a></h3>
                                    </div>
                                </div>
                            @endif
                            @if ($nextPost)
                                @php
                                    $name = preg_replace('/[\/,?!@%#*&()^]+/', '-', $nextPost['name']);
                                    $name = str_replace(' ', '-', strtolower($name));
                                    $link = preg_replace('/-+/', '-', trim($name, '-'));
                                @endphp
                                <div class="blog-prev blog-next text-right col-lg-6">
                                    <div class="blog-prev-next-info">
                                        <p>Tin Tức Tiếp Theo</p>
                                        <h3 class="ltn__blog-title"><a href="/tin-tuc/{{ $link }}?id={{ $nextPost['id'] }}"> {{ $nextPost['name'] }}</a></h3>
                                    </div>
                                    <div class="blog-prev-next-img">
                                        <a href="/tin-tuc/{{ $link }}?id={{ $nextPost['id'] }}"><img src="{{ asset('storage/images-product/' . basename($nextPost['images'])) }}" alt="Image"></a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                        <div class="widget ltn__popular-post-widget">
                            <h4 class="ltn__widget-title">Tin Tức Khác</h4>
                            <ul>
                                @foreach ($news as $item)
                                    @php
                                        $name = preg_replace('/[\/,?!@%#*&()^]+/', '-', $item['name']);
                                        $name = str_replace(' ', '-', strtolower($name));
                                        $link = preg_replace('/-+/', '-', trim($name, '-'));
                                    @endphp
                                    <li>
                                        <div class="popular-post-widget-item clearfix">
                                            <div class="popular-post-widget-img">
                                                <a href="/tin-tuc/{{ $link }}?id={{ $item['id'] }}"><img src="{{ asset('storage/images-product/' . basename($item['images'])) }}" alt="#"></a>
                                            </div>
                                            <div class="popular-post-widget-brief">
                                                <div class="ltn__blog-meta">
                                                    <ul>
                                                        <li>
                                                            <span>{{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y') }}</span>
                                                        </li>
                                                        <li class="ltn__blog-comment">
                                                            <a href="#"><i class="icon-note"></i> KimChiWatch</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h6 class="ltn__blog-title blog-title-line"><a href="/tin-tuc/{{ $link }}?id={{ $item['id'] }}">{{ $item['name'] }} </a></h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection