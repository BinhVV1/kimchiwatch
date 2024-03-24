@extends('layouts.admin.layout')

@section('content')
@if(session('error'))
<div id="error-message" class="alert alert-danger">
    {{ session('error') }}
</div>
@elseif(session('success'))
<div id="error-message" class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class='col-lg-12' style="padding: 0; margin:0; display:flex;flex-wrap:wrap;">
    @if(isset($data) && !empty($data) && count($data) > 0)
        <div class='col-lg-12' style="padding: 10px 16px 20px 16px; width:100%">
            <section class="tf-section flat-blog" style='padding:0'>
                <div class='col-lg-12' style="padding: 0; margin:0">
                    <div style="display: flex; flex-wrap:wrap;">
                        @foreach ($data as $item)
                            <div class="col-lg-2" style="padding: 5px; max-width:50%;">
                                <div class="" style="background: white; padding:10px; height:100%; display:grid; align-items:end;">
                                    <div class="" style="display:flex; overflow:hidden; max-height:130px; align-items:center;">
                                        <a href="/admin/news/sua-tin-tuc/{{ $item['id'] }}" style='color:#c80000;'>
                                            <img style="width:100%" src="{{ asset('storage/images-product/' . basename($item['images'])) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="content" style="width:100%;overflow: hidden;">
                                        <h3 style='display:flex; justify-content:center; margin:10px 0px;'>
                                            <a href="/admin/news/sua-tin-tuc/{{ $item['id'] }}" style='width:100%;color:black; font-size:13px;overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;'>
                                                {{ $item['name'] }}
                                            </a>
                                        </h3>
                                        <div style='display:flex; justify-content:space-around; flex-wrap:wrap; row-gap:10px; width:100%'>
                                            <a href="/admin/news/sua-tin-tuc/{{ $item['id'] }}" type="button" class="btn btn-primary" style='color:white; margin:auto; padding: 5px;'>Chỉnh Sửa</a>
                                            <a href="/admin/news/delete/{{ $item['id'] }}" type="button" class="btn btn-danger delete-btn" style='color:white;margin:auto;padding: 5px;'>Xóa</a>
                                        </div>
                                    </div>                                                              
                                </div>                        
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>           
        </div>
        <div style="width:100%; padding:15px;display:flex;justify-content:end">
            {{ $data->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
        </div> 
    @else
        <div class='col-lg-12' style="padding:16px; width:100%">
            Chưa Có Tin Tức
        </div>
    @endif
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var errorMessage = document.getElementById('error-message');

    if (errorMessage) {
        errorMessage.style.display = 'block';
        setTimeout(function() {
            errorMessage.style.display = 'none';
            errorMessage.style.opacity = 0;
        }, 5000);
    }

    var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var confirmed = confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');
                if (confirmed) {
                    window.location.href = button.getAttribute('href');
                }
            });
        });
});
</script>
@endsection
