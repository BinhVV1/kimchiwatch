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
        <form action="{{ route('postAddOrEditProduct') }}" class="form" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($data) && !empty($data))
                <input type="hidden" name='id' value='{{ $data[0]['id'] }}'>
            @else
                @php $data = ''; @endphp
            @endif

            <div class="col-sm-12" style="padding:15px; gap:10px; border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Tên Sản Phẩm:</div>
                <div class="col-sm-6">
                    <input type="text" name='name' class='form-control' value='{{ $data ? $data[0]['name'] : old('name') }}' required style="border:1px solid gray; color:gray; background:white">
                </div>
                <div class="col-sm-3" style='color:gray'> Ví dụ: Seiko 5 Field Sports Style SRPH29K1 – Nam – Automatic – Mặt số 39.4mm, chống nước 10ATM, bộ máy In-House</div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Mã Sản Phẩm:</div>
                <div class="col-sm-6">
                    <input type="text" name='code' id='code' class='form-control' value='{{ $data ? $data[0]['code'] : old('code') }}' required style="border:1px solid gray; color:gray; background:white">
                </div>
                <div class="col-sm-3" style='color:gray'> Ví dụ: SRPH29K1</div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Giá Gốc:</div>
                <div class="col-sm-6">
                    <input type="text" name='price_old' class='form-control' value='{{ $data ? $data[0]['price_old'] : old('price_old') }}' required style="border:1px solid gray; color:gray; background:white">
                </div>
                <div class="col-sm-3" style='color:gray'> Ví dụ: 9.000.000</div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Giá Sau Giảm:</div>
                <div class="col-sm-6">
                    <input type="text" name='price' class='form-control' value='{{ $data ? $data[0]['price'] : old('price') }}' required style="border:1px solid gray; color:gray; background:white">
                </div>
                <div class="col-sm-3" style='color:gray'> Ví dụ: 9.000.000</div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Loại:</div>
                <div class="col-sm-6" style='display:flex; gap:4px'>
                    @foreach($category as $value)
                        @if ($value['id_category'] == 1)
                            <input style='margin:0;' type="radio" name="sex" required value="{{ $value['id'] }}" {{ ($data && $data[0]['sex'] ===  $value['id']) || old('sex') == $value['id']  ? 'checked' : '' }}><span style='margin-right:10px;'>{{ $value['name_category'] }} </span>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Thương Hiệu:</div>
                <div class="col-sm-6">
                    <select class="form-select" name="trademark" required>
                        @foreach($category as $value)
                            @if ($value['id_category'] == 2)
                                <option value="{{ $value['id'] }}" {{ ($data && $data[0]['trademark'] === $value['id']) || old('trademark') == $value['id'] ? 'selected' : '' }}>{{ $value['name_category'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Chất Liệu Dây:</div>
                <div class="col-sm-6">
                    <select class="form-select" name="material" required>
                        @foreach($category as $value)
                            @if ($value['id_category'] == 3)
                                <option value="{{ $value['id'] }}" {{ ($data && $data[0]['material'] === $value['id']) || old('material') == $value['id'] ? 'selected' : '' }}>{{ $value['name_category'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px; border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Link Video:</div>
                <div class="col-sm-6">
                    <input type="text" name='link' class='form-control' value='{{ $data ? $data[0]['link'] : old('link') }}' required style="border:1px solid gray; color:gray; background:white">
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Ảnh Chính:</div>
                <div class="col-sm-6">
                    @if($data && $data[0]['images_main'])
                        <img style="width: 50%; margin-bottom:20px" src="{{ asset('storage/images-product/' . basename($data[0]['images_main'])) }}" alt="">
                    @endif
                    <input type="file" name='images_main' {{ $data ? '' : 'required'}} accept="image/*" style="border:1px solid gray; color:gray; background:white; width:100%">
                </div>
                <div class="col-sm-3" style='color:gray'> Chọn ảnh đại diện của sản phẩm</div>
            </div>

            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>List Ảnh Phụ:</div>
                <div class="col-sm-6">
                    @if($data && $data[0]['images'])
                        <div style="gap: 10px; margin-bottom:20px; display:flex; align-items:flex-end;flex-wrap: wrap;">
                            @foreach(explode(',', $data[0]['images']) as $value)
                                <div style="width: 22%;display: flex;justify-content: center;flex-wrap: wrap;">
                                    <img style="width: 100%; margin-bottom:10px;" src="{{ asset('storage/images-product/' . basename($value)) }}" alt="">
                                    <a href="/admin/delete-images/{{ $data[0]['id'] }}/{{ basename($value) }}" type="button" class="btn btn-danger" style='color:white;'>Xóa</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name='images[]' value="" {{ $data ? '' : 'required'}} accept="image/*" multiple style="border:1px solid gray; color:gray; background:white; width:100%">
                </div>
                <div class="col-sm-3" style='color:gray'> Chọn danh sách ảnh khác của sản phẩm </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Mô tả:</div>
                <div class="col-sm-6">
                    <textarea class="form-control" name='subtitle' rows="2" id="comment" required style="border:1px solid gray; color:gray; background:white">{{ $data ? $data[0]['subtitle'] : old('subtitle') }}</textarea>
                </div>
                <div class="col-sm-3" style='color:gray'> Ví dụ: Mẫu đồng hồ nam Casio A158WA-1DF với kiểu dáng vuông huyền thoại...</div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Thông tin sản phẩm:</div>
                <div class="col-sm-10">
                    <textarea id="editor1" name="information" style="height:500px">{{ $data ? $data[0]['information'] : (old('information') ? old('information') : '<p><strong>Thương hiệu</strong>: <br>
                        <strong>Số hiệu sản phẩm</strong>: <br>
                        <strong>Xuất xứ</strong>: <br>
                        <strong>Giới tính</strong>: <br>
                        <strong>Kính</strong>: <br>
                        <strong>Máy</strong>: <br>
                        <strong>Bảo hành</strong>: <br>
                        <strong>Đường kính mặt số</strong>: <br>
                        <strong>Dây đeo</strong>: <br>
                        <strong>Màu mặt số</strong>: <br>
                        <strong>Chống nước</strong>: <br>
                        <strong>Chức năng</strong>: <br>
                        <strong>Nơi sản xuất</strong>: <br>
                        </p>') }}</textarea>
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'>Chi tiết sản phẩm:</div>
                <div class="col-sm-10">
                    <textarea id="editor" name="description" style="height:500px">{{ $data ? $data[0]['description'] : old('description') }}</textarea>
                </div>
            </div>
            <div class="col-sm-12" style="padding:15px; gap:10px;border-bottom:1px solid rgb(200, 200, 200);">
                <div class="col-sm-2" style='font-weight:bold'></div>
                <div class="col-sm-6" style='display:flex; gap:4px'>
                    <input style='margin:0;' type="checkbox" name="noibat" value="2" {{ ($data && $data[0]['noibat'] == 2) || old('noibat') == 2  ? 'checked' : '' }}><span style='margin-right:10px;'>Sản Phẩm Nổi Bật </span>
                </div>
                <div class="col-sm-3" style='color:gray'> Sẽ hiển thị lên đầu trang</div>
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
