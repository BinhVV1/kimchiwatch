@extends('layouts.app')

@section('content')
 <!-- title page -->
 <div class="ltn__slide-item ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner text-center">
                    <h2 class="ltn__page-title">SẢN PHẨM</h2>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/">Trang Chủ</a></li>
                            <li>Sản Phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-2 mb-100">
                <div class="ltn__shop-options header-search-3">
                    <ul>
                        <li>
                            <div class="showing-product-number text-right">
                                 <span>Có {{$count}} Sản Phẩm Phù Hợp</span>
                             </div>
                         </li>
                        <li>
                            <div class="ltn__grid-list-tab-menu ">
                                <div class="nav">
                                    <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="icon-grid"></i></a>
                                    <a data-bs-toggle="tab" href="#liton_product_list"><i class="icon-magnifier"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                                <!-- ltn__product-item -->
                                @if(isset($data) && !empty($data) && $count > 0)
                                    <div class='col-lg-12 header-search-4' style="padding:0px 20px 20px 20px!important; width:100%">
                                        Có {{$count}} Sản Phẩm Phù Hợp
                                    </div>
                                    @foreach ($data as $item)
                                    @php
                                        $name = preg_replace('/[\/,?!@%#*&()^]+/', '-', $item['name']);
                                        $name = str_replace(' ', '-', strtolower($name));
                                        $link = preg_replace('/-+/', '-', trim($name, '-'));
                                    @endphp
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6 san-pham">
                                        <div class="ltn__product-item text-center">
                                            <div class="product-img">
                                                <a href="/san-pham/{{ $link }}?id={{ $item['id'] }}" class='anh-san-pham' style="overflow: hidden; display:flex">
                                                    <img class="img" style="width: 100%; height: auto; object-fit: cover;" src="{{ asset('storage/images-product/' . basename($item['images_main'])) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h2 class="product-title"><a href="san-pham/{{ $link }}?id={{ $item['id'] }}" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;">{{ $item['name'] }}</a></h2>
                                                <div class="product-price">
                                                    <del>{{ $item['price_old'] ? $item['price_old'] . ' đ' : ''}}</del>
                                                    <span style="font-size: 18px !important;">{{ $item['price'] }} đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class='col-lg-12' style="padding:20px; width:100%">
                                        Không Có Sản Phẩm Phù Hợp
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="ltn__pagination-area text-center">
                            <div class="ltn__pagination ltn__pagination-2" style="display:flex;justify-content:center">
                                {{ $data->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liton_product_list">
                        <div class="ltn__product-tab-content-inner ltn__product-list-view">
                            <div class="row">
                                <div class="col-lg-12 header-search-3">
                                    <aside class="sidebar ltn__shop-sidebar">
                                        <form action="/san-pham" class="form" method="get" enctype="multipart/form-data">
                                            @csrf
                                            <!-- Price Filter Widget -->
                                            <div class="widget ltn__price-filter-widget" style="margin-bottom:100px">
                                                <h4 class="ltn__widget-title">Khoảng Giá</h4>
                                                <div class="price_slider_amount" style="overflow:unset;">
                                                    <select name="gia" style="margin:0; padding:5px;width:100%">
                                                        <option></option>
                                                        <option value="duoi-1tr" {{ request()->input('gia') == "duoi-1tr" ? 'selected' : '' }}>Dưới 1 Triệu</option>
                                                        <option value="1tr-2tr" {{ request()->input('gia') == "1tr-2tr" ? 'selected' : '' }}>Từ 1 Đến 2 Triệu</option>
                                                        <option value="2tr-3tr" {{ request()->input('gia') == "2tr-3tr" ? 'selected' : '' }}>Từ 2 Đến 3 Triệu</option>
                                                        <option value="tren-3tr" {{ request()->input('gia') == "tren-3tr" ? 'selected' : '' }}>Trên 3 Triệu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Category Widget -->
                                            <div class="widget ltn__menu-widget">
                                                <h4 class="ltn__widget-title">Phân Loại</h4>
                                                <div class="price_slider_amount" style="overflow:unset; display: flex; flex-wrap:wrap; gap:20px">
                                                    @foreach($category as $value)
                                                        @if ($value['id_category'] == 1)
                                                            <div>
                                                                <input  type="checkbox" name="loai[]" value="{{ $value['name_code'] }}" {{ in_array($value['name_code'], request()->input('loai', [])) == $value['name_code'] ? 'checked' : '' }}>
                                                                {{ $value['name_category'] }}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- Color Widget -->
                                            <div class="widget ltn__color-widget">
                                                <h4 class="ltn__widget-title">Chất Liệu Dây</h4>
                                                <div class="price_slider_amount" style="overflow:unset; display: flex; flex-wrap:wrap; gap:20px">
                                                    @foreach($category as $value)
                                                        @if ($value['id_category'] == 3)
                                                            <div>
                                                                <input  type="checkbox" name="day[]" value="{{ $value['name_code'] }}" {{ in_array($value['name_code'], request()->input('day', [])) == $value['name_code'] ? 'checked' : '' }}>
                                                                {{ $value['name_category'] }}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- Size Widget -->
                                            <div class="widget ltn__size-widget">
                                                <h4 class="ltn__widget-title">Thương Hiệu
                                                </h4>
                                                <div class="price_slider_amount" style="overflow:unset; display: flex; flex-wrap:wrap; gap:20px">
                                                    @foreach($category as $value)
                                                        @if ($value['id_category'] == 2)
                                                            <div>
                                                                <input  type="checkbox" name="thuonghieu[]" value="{{ $value['name_code'] }}" {{ in_array($value['name_code'], request()->input('thuonghieu', [])) == $value['name_code'] ? 'checked' : '' }}>
                                                                {{ $value['name_category'] }}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="widget ltn__size-widget">
                                                <button type="submit" style="background:#F8AFAB !important; padding:5px 25px; border-radius:10px; width:100%; font-weight:600">Áp Dụng</button>
                                            </div>
                                        </form>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-100 header-search-4">
                <aside class="sidebar ltn__shop-sidebar">
                    <form action="/san-pham" class="form" method="get" enctype="multipart/form-data">
                        @csrf
                        <!-- Price Filter Widget -->
                        <div class="widget ltn__price-filter-widget" style="margin-bottom:100px">
                            <h4 class="ltn__widget-title">Khoảng Giá</h4>
                            <div class="price_slider_amount" style="overflow:unset;">
                                <select name="gia" style="margin:0; padding:5px;width:100%">
                                    <option value=""></option>
                                    <option value="duoi-1tr" {{ request()->input('gia') == "duoi-1tr" ? 'selected' : '' }}>Dưới 1 Triệu</option>
                                    <option value="1tr-2tr" {{ request()->input('gia') == "1tr-2tr" ? 'selected' : '' }}>Từ 1 Đến 2 Triệu</option>
                                    <option value="2tr-3tr" {{ request()->input('gia') == "2tr-3tr" ? 'selected' : '' }}>Từ 2 Đến 3 Triệu</option>
                                    <option value="tren-3tr" {{ request()->input('gia') == "tren-3tr" ? 'selected' : '' }}>Trên 3 Triệu</option>
                                </select>
                            </div>
                        </div>
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">Phân Loại</h4>
                            <div class="price_slider_amount" style="overflow:unset; display: flex; flex-wrap:wrap; gap:20px">
                                @foreach($category as $value)
                                    @if ($value['id_category'] == 1)
                                        <div>
                                            <input  type="checkbox" name="loai[]" value="{{ $value['name_code'] }}" {{ in_array($value['name_code'], request()->input('loai', [])) == $value['name_code'] ? 'checked' : '' }}>
                                            {{ $value['name_category'] }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- Color Widget -->
                        <div class="widget ltn__color-widget">
                            <h4 class="ltn__widget-title">Chất Liệu Dây</h4>
                            <div class="price_slider_amount" style="overflow:unset; display: flex; flex-wrap:wrap; gap:20px">
                                @foreach($category as $value)
                                    @if ($value['id_category'] == 3)
                                        <div>
                                            <input  type="checkbox" name="day[]" value="{{ $value['name_code'] }}" {{ in_array($value['name_code'], request()->input('day', [])) == $value['name_code'] ? 'checked' : '' }}>
                                            {{ $value['name_category'] }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- Size Widget -->
                        <div class="widget ltn__size-widget">
                            <h4 class="ltn__widget-title">Thương Hiệu
                            </h4>
                            <div class="price_slider_amount" style="overflow:unset; display: flex; flex-wrap:wrap; gap:20px">
                                @foreach($category as $value)
                                    @if ($value['id_category'] == 2)
                                        <div>
                                            <input  type="checkbox" name="thuonghieu[]" value="{{ $value['name_code'] }}" {{ in_array($value['name_code'], request()->input('thuonghieu', [])) == $value['name_code'] ? 'checked' : '' }}>
                                            {{ $value['name_category'] }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="widget ltn__size-widget">
                            <button type="submit" style="background:#F8AFAB !important; padding:5px 25px; border-radius:10px; width:100%; font-weight:600">Áp Dụng</button>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection

