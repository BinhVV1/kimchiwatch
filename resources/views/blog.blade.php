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
                                <li>Tin Tức</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__blog-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title section-title-border">Tin Tức Mới Nhất</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $item)
                    @php
                        $name = preg_replace('/[\/,?!@%#*&()^]+/', '-', $item['name']);
                        $name = str_replace(' ', '-', strtolower($name));
                        $link = preg_replace('/-+/', '-', trim($name, '-'));
                    @endphp
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__blog-item">
                            <div class="ltn__blog-img" style="max-height:250px; overflow:hidden; display:flex; align-items:center">
                                <a href="/tin-tuc/{{ $link }}?id={{ $item['id'] }}"><img src="{{ asset('storage/images-product/' . basename($item['images'])) }}" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author d-none">
                                            <a href="#">by: KimChiWatch</a>
                                        </li>
                                        <li>
                                            <span>{{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y') }}
                                            </span>
                                        </li>
                                        <li class="ltn__blog-comment">
                                            <a href="#"><i class="icon-note"></i> KimChiWatch</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title blog-title-line"><a href="/tin-tuc/{{ $link }}?id={{ $item['id'] }}">{{ $item['name'] }} </a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination ltn__pagination-2" style="display: flex;justify-content: center;flex-wrap:wrap">
                            {{ $data->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection