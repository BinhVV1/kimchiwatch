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
        <form action="/admin/news/postNews" class="form" method="post" enctype="multipart/form-data">
            @csrf 
            @if(isset($data) && !empty($data))
                <input type="hidden" name='id' value='{{ $data[0]['id'] }}'>
            @else
                @php $data = ''; @endphp
            @endif

            <div class="col-sm-12" style="padding:15px; gap:10px; border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Tên Tin Tức:</div>
                <div class="col-sm-6">
                    <input type="text" name='name' class='form-control' value='{{ $data ? $data[0]['name'] : old('name') }}' required style="border:1px solid gray; color:gray; background:white">
                </div>
                <div class="col-sm-3" style='color:gray'> Ví dụ: Thay pin đồng hồ đeo tay giá bao nhiêu tiền?</div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Ảnh Đại Diện:</div>
                <div class="col-sm-6">
                    @if($data && $data[0]['images'])
                        <img style="width: 50%; margin-bottom:20px" src="{{ asset('storage/images-product/' . basename($data[0]['images'])) }}" alt="">
                    @endif
                    <input type="file" name='images' {{ $data ? '' : 'required'}} accept="image/*" style="border:1px solid gray; color:gray; background:white; width:100%">
                </div>
                <div class="col-sm-3" style='color:gray'> Chọn ảnh đại diện của Tin Tức</div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Chi tiết Tin Tức:</div>
                <div class="col-sm-10">
                    <textarea id="editor" name="description" style="height:500px">{{ $data ? $data[0]['description'] : old('description') }}</textarea>
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
