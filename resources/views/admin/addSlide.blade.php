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

<div class="">
   <div class='col-lg-12' style="padding: 16px; width:100%">
    <section class="tf-section flat-blog" style='padding:0'>
        <form action="{{ route('postSlide') }}" class="form" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($data) && !empty($data))
                <input type="hidden" name='id' value='{{ $data[0]['id'] }}'>
            @else
                @php $data = ''; @endphp
            @endif
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Ảnh Banner Máy Tính:</div>
                <div class="col-sm-6">
                    @if($data && $data[0]['images'])
                        <div style="gap: 10px; margin-bottom:20px; display:flex; align-items:flex-end">
                            @foreach(explode(',', $data[0]['images']) as $value)
                                <div style="width: 22%;display: flex;justify-content: center;flex-wrap: wrap;">
                                    <img style="width: 100%; margin-bottom:10px;" src="{{ asset('storage/images-product/' . basename($value)) }}" alt="">
                                    <a href="/admin/delete-images-slide/mt/{{ $data[0]['id'] }}/{{ basename($value) }}" type="button" class="btn btn-danger" style='color:white;'>Xóa</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name='images[]' value="" {{ $data ? '' : 'required'}} accept="image/*" multiple style="border:1px solid gray; color:gray; background:white; width:100%">
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Ảnh Banner Điện Thoại:</div>
                <div class="col-sm-6">
                    @if($data && $data[0]['images_sp'])
                        <div style="gap: 10px; margin-bottom:20px; display:flex; align-items:flex-end">
                            @foreach(explode(',', $data[0]['images_sp']) as $value)
                                <div style="width: 22%;display: flex;justify-content: center;flex-wrap: wrap;">
                                    <img style="width: 100%; margin-bottom:10px;" src="{{ asset('storage/images-product/' . basename($value)) }}" alt="">
                                    <a href="/admin/delete-images-slide/sp/{{ $data[0]['id'] }}/{{ basename($value) }}" type="button" class="btn btn-danger" style='color:white;'>Xóa</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name='images_sp[]' value="" {{ $data ? '' : 'required'}} accept="image/*" multiple style="border:1px solid gray; color:gray; background:white; width:100%">
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px; display:flex; justify-content:center;">
                <button type="submit" class="btn btn-success">Đồng ý</button>
            </div>
        </form>
    </section>
   </div>
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
});
</script>
@endsection
