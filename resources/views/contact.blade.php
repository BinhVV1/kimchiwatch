@extends('layouts.app')

@section('content')
 <!-- title page -->
 <div class="ltn__slide-item ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner text-center">
                    <h2 class="ltn__page-title">LIÊN HỆ</h2>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/">Trang Chủ</a></li>
                            <li>Liên Hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn__contact-address-area mb-60">
    <div class="container">
        <div class="row" style="display: flex; justify-content: space-around;flex-wrap:wrap">
            <div class="col-lg-3">
                <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <i class="icon-location-pin"></i>
                    </div>
                    <h3>Địa Chỉ</h3>
                    <p>11 An Cư 5, Da Nang, Vietnam</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <i class="icon-phone"></i>
                    </div>
                    <h3>Số Điện Thoại</h3>
                    <p><a href="tel:+0333345444">+033 334 5444</a></p>
                </div>
            </div>
            {{-- <div class="col-lg-3">
                <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <i class="icon-envelope"></i>
                    </div>
                    <h3>Email & Web</h3>
                    <p>info@webmail.com <br>
                        jobs@webexample.com</p>
                </div>
            </div> --}}
            <div class="col-lg-3">
                <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <i class="icon-speedometer"></i>
                    </div>
                    <h3>Thời Gian Mở Cửa</h3>
                    <p>7:00 đến 22:00 <br>
                        Tất cả các ngày trong tuần</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn_google-map-area" style="margin-bottom:30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.835062498548!2d108.23915151147031!3d16.07404658454197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314217889bb5e043%3A0x8a4e1fcd65e753a7!2zMTEgQW4gQ8awIDUsIEFuIEjhuqNpIELhuq9jLCBTxqFuIFRyw6AsIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1709130858277!5m2!1svi!2s" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
