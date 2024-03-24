@extends('layouts.app')



@section('content')



<div class="ltn__utilize-overlay"></div>



<!-- BREADCRUMB AREA START -->

<div class="ltn__slide-item ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">

    <div class="container" style="padding-top:50px">

        <div class="row">

            <div class="col-lg-12">

                <div class="ltn__breadcrumb-inner text-center">

                    <h2 class="ltn__page-title">CHI TIẾT SẢN PHẨM</h2>

                    <div class="ltn__breadcrumb-list">

                        <ul>

                            <li><a href="/">Trang Chủ</a></li>

                            <li><a href="/san-pham">Sản Phẩm</a></li>

                            <li>{{ $product[0]['name'] }}</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- BREADCRUMB AREA END -->

 <!-- SHOP DETAILS AREA START -->

 <div class="ltn__shop-details-area pb-70">

    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-md-12">

                <div class="ltn__shop-details-inner">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="ltn__shop-details-img-gallery ltn__shop-details-img-gallery-2">

                                <div class="ltn__shop-details-large-img">

                                    <div class="single-large-img">

                                        <a href="{{ asset('storage/images-product/' . basename($product[0]['images_main'])) }}" data-rel="lightcase:myCollection">

                                            <img src="{{ asset('storage/images-product/' . basename($product[0]['images_main'])) }}">

                                        </a>

                                    </div>

                                    @if ($product[0]['images'])

                                        @foreach(explode(',', $product[0]['images']) as $value)

                                            <a href="{{ asset('storage/images-product/' . basename($value)) }}" data-rel="lightcase:myCollection">

                                                <img src="{{ asset('storage/images-product/' . basename($value)) }}">

                                            </a>

                                        @endforeach

                                    @endif

                                </div>

                                <div class="ltn__shop-details-small-img ltn__shop-details-small-img3 slick-arrow-2" style="width:75%; margin:10px 0px">

                                    <div class="single-small-img">

                                        <img src="{{ asset('storage/images-product/' . basename($product[0]['images_main'])) }}">

                                    </div>

                                    @if ($product[0]['images'])

                                        @foreach(explode(',', $product[0]['images']) as $value)

                                            <div class="single-small-img">

                                                <img src="{{ asset('storage/images-product/' . basename($value)) }}">

                                            </div>

                                        @endforeach

                                    @endif

                                </div>

                                <div class="ltn__shop-details-small-img ltn__shop-details-small-img2 slick-arrow-2" style="width:20%; margin:15px 2.2%">

                                    @if ($product[0]['link'] != '')

                                        <div class="single-large-img" style="position: relative;">

                                            <a href="https://www.youtube.com/embed/{{ $product[0]['link'] }}" data-rel="lightcase:myCollection">

                                                <img src="https://img.youtube.com/vi/{{ $product[0]['link'] }}/0.jpg" style="width:100%;">

                                                <img src="{{ asset('app/img/icon/youtube-player-multimedia-video-communication-interaction-com.svg') }}" class="youtube-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 30px; height: 30px;background:none !important">

                                            </a>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="modal-product-info shop-details-info pl-0">

                                <h3>{{ $product[0]['name'] }}</h3>

                                <div class="product-price-ratting mb-20">

                                    <ul>

                                        <li>

                                            <div class="product-price">

                                                <del>{{ $product[0]['price_old'] ? $product[0]['price_old'] . ' đ' : ''}}</del>

                                                <h1><span style="font-size: 18px; font-weight:200"></span>{{ $product[0]['price'] }} đ</h1>

                                            </div>

                                        </li>

                                    </ul>

                                </div>

                                <div class="modal-product-brief">

                                    <p>{{ $product[0]['subtitle'] }}</p>

                                </div>

                                <div class="modal-product-meta ltn__product-details-menu-1 mb-30">

                                    <ul>

                                        <li><strong>Mã sản phẩm:</strong> <span><b>{{ $product[0]['code'] }}</b></span></li>

                                        <li>

                                            <strong>Tags:</strong>
                                            <span>

                                                @foreach ($category as $value)

                                                    <a href="/san-pham?{{ $value['id_category'] == 1 ? 'loai%5B%5D' : ( $value['id_category'] == 2 ? 'thuonghieu%5B%5D' : 'day%5B%5D') }}={{ $value['name_code'] }}"><b>#{{ $value['name_category'] }}</b></a>

                                                @endforeach

                                            </span>

                                        </li>

                                    </ul>

                                </div>

                                <div class="ltn__social-media">

                                    <ul>

                                        <li class="d-meta-title">Các chính sách tại KimChiWatch:</li>

                                    </ul>

                                </div>

                                <div class="col-sm-12 row" style="margin:0; padding:0;">

                                    <div class="col-sm-6" style="margin:0; padding:5px">

                                        <div style="height:100%;gap:10px; padding:10px 15px; margin:0; display:flex; border:1.5px solid #F8AFAB; border-radius:10px;">

                                            <div class="feature-icon" style="width:50px;display:flex;align-items:center">

                                                <img src="{{asset('app/img/icon/distribution.png') }}" alt="#">

                                            </div>

                                            <div class="feature-info" style="display:flex;align-items:center">

                                                <h4 style='margin:0;font-weight:bold; text-align:left; font-size:15px'>Đổi trả lên đến 30 ngày</h4>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-6" style="margin:0; padding:5px">

                                        <div style="height:100%;gap:10px; padding:10px 15px; margin:0; display:flex; border:1.5px solid #F8AFAB; border-radius:10px;">

                                            <div class="feature-icon" style="width:50px;display:flex;align-items:center">

                                                <img src="{{asset('app/img/icon/guarantee.png') }}" alt="#">

                                            </div>

                                            <div class="feature-info" style="display:flex;align-items:center">

                                                <h4 style='margin:0;font-weight:bold; text-align:left; font-size:15px'>Bảo hành 2 năm</h4>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-6" style="margin:0; padding:5px">

                                        <div style="height:100%;gap:10px; padding:10px 15px; margin:0; display:flex; border:1.5px solid #F8AFAB; border-radius:10px;">

                                            <div class="feature-icon" style="width:50px;display:flex;align-items:center">

                                                <img src="{{asset('app/img/icon/goods.png') }}" alt="#">

                                            </div>

                                            <div class="feature-info" style="display:flex;align-items:center">

                                                <h4 style='margin:0;font-weight:bold; text-align:left; font-size:15px'>Được kiểm tra trước khi nhận</h4>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-6" style="margin:0; padding:5px">

                                        <div style="height:100%;gap:10px; padding:10px 15px; margin:0; display:flex; border:1.5px solid #F8AFAB; border-radius:10px;">

                                            <div class="feature-icon" style="width:50px;display:flex;align-items:center">

                                                <img src="{{asset('app/img/icon/free-delivery.png') }}" alt="#">

                                            </div>

                                            <div class="feature-info" style="display:flex;align-items:center">

                                                <h4 style='margin:0;font-weight:bold; text-align:left; font-size:15px'>Free Ship toàn quốc</h4>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- SHOP DETAILS AREA END -->



<!-- SHOP DETAILS TAB AREA START -->

<div class="ltn__shop-details-tab-area">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="ltn__shop-details-tab-inner">

                    <div class="ltn__shop-details-tab-menu">

                        <div class="nav" style="gap:10px;">

                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Thông Tin Sản Phẩm</a>

                            <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">Giới Thiệu</a>

                            <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_3" class="">Comments</a> -->

                            {{-- <a data-bs-toggle="tab" href="#liton_tab_details_1_4" class="">Chính Sách</a> --}}

                            <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_5" class="">Size Chart</a> -->

                        </div>

                    </div>

                    <div class="tab-content">

                        <div class="tab-pane fade active show" id="liton_tab_details_1_1">

                            <div class="ltn__shop-details-tab-content-inner text-left">

                                <p>{!! $product[0]['information'] !!}</p>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="liton_tab_details_1_2">

                            <div class="ltn__shop-details-tab-content-inner text-left">

                                <p>{!! $product[0]['description'] !!}</p>

                            </div>

                        </div>

                        {{-- <div class="tab-pane fade" id="liton_tab_details_1_4">

                            <div class="ltn__shop-details-tab-content-inner">

                                <h4 class="title-2">Chính Sách Khi Mua Hàng Tại KimChiWatch</h4>

                                <ul>

                                    <li>Đổi trả trong vòng 30 ngày</li>

                                    <li>Bảo Hành lên đến 2 năm</li>

                                    <li>Được kiểm tra hàng trước khi nhận</li>

                                    <li>Hỗ trợ miễn phí giao hàng toàn quốc</li>

                                    <li>Hỗ trợ, tư vấn, giải đáp thắc mắc 24/7</li>

                                </ul>

                            </div>

                        </div> --}}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- SHOP DETAILS TAB AREA END -->



<!-- PRODUCT SLIDER AREA START -->

<div class="ltn__product-slider-area pb-40">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="section-title-area text-center">

                    <h3 class="section-title section-title-border" style="font-size: 25px">SẢN PHẨM TƯƠNG TỰ</h3>

                </div>

            </div>

        </div>

        <div class="row ltn__related-product-slider-one-active slick-arrow-1">

            @foreach($data as $value)

                @php

                    $name = preg_replace('/[\/,?!@%#*&()^]+/', '-', $value['name']);

                    $name = str_replace(' ', '-', strtolower($name));

                    $link = preg_replace('/-+/', '-', trim($name, '-'));

                @endphp

                <div class="col-12">

                    <div class="ltn__product-item ltn__product-item-4">

                        <div class="product-img">

                            <a href="/san-pham/{{ $link }}?id={{ $value['id'] }}"><img src="{{ asset('storage/images-product/' . basename($value['images_main'])) }}" alt="#"></a>

                        </div>

                        <div class="product-info">

                            <h2 class="product-title"><a href="/san-pham/{{ $link }}?id={{ $value['id'] }}" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;">{{ $value['name'] }}</a></h2>

                            <div class="product-price">

                                <del>{{ $value['price_old'] ? $value['price_old'] . ' đ' : ''}}</del>

                                <span style="font-size: 18px !important;">{{ $value['price'] }} đ</span>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

<!-- PRODUCT SLIDER AREA END -->



@endsection