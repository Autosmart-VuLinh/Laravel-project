@extends('layouts.backend')

@section('content')
<form action="" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Tên</label>
            <input value="{{ old('name') }}" type="text" class="title form-control @error('name') is-invalid @enderror"
                name="name" id="name">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="slug">Slug</label>
            <input value="{{ old('slug') }}" type="text" class="slug form-control @error('slug') is-invalid @enderror"
                name="slug" id="slug">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="teacher_id">Giảng viên</label>
            <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                <option value="0">Chọn giảng viên</option>
                <option value="1">Hoàng An</option>
            </select>
            @error('teacher_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{--
            <div class="form-group col-md-6">
            <label for="thumbnail">Ảnh đại diện</label>
            <input value="{{ old('thumbnail') }}" type="file"
        class="thumbnail form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail">
        @error('thumbnail')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    --}}

    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="code">Mã khóa học</label>
            <input value="{{ old('code') }}" type="text" class="title form-control @error('code') is-invalid @enderror"
                name="code" id="code">
            @error('code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="price">Gía</label>
            <input value="{{ old('price') }}" type="text"
                class="price form-control @error('price') is-invalid @enderror" name="price" id="price">
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="sale_price">Mã khuyễn mãi</label>
            <input value="{{ old('sale_price') }}" type="text"
                class="title form-control @error('sale_price') is-invalid @enderror" name="sale_price" id="sale_price">
            @error('sale_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="price">Gía</label>
            <input value="{{ old('price') }}" type="text"
                class="price form-control @error('price') is-invalid @enderror" name="price" id="price">
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="is_document">Tài liệu đính kèm</label>
            <select name="is_document" id="is_document" class="form-control @error('is_document') is-invalid @enderror">
                <option value="0">Không</option>
                <option value="1">Có</option>
            </select>
            @error('is_document')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="0">Không</option>
                <option value="1">Có</option>
            </select>
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="supports">Hỗ trợ</label>
            <textarea value="{{ old('supports') }}" type="text"
                class="ckeditor form-control @error('supports') is-invalid @enderror" name="supports" id="supports"
                cols="30" rows="10"></textarea>
            @error('supports')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="detail">Nội dung</label>
            <textarea value="{{ old('detail') }}" type="text"
                class="ckeditor form-control @error('detail') is-invalid @enderror" name="detail" id="detail" cols="30"
                rows="10"></textarea>
            @error('detail')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>


    <div class="col-md-12">
        <div class="row align-items-end my-2">
            <div class="col-md-7">
                <label for="thumbnail">Ảnh đại diện</label>
                <input type="text" value="" class="form-control" name="thumbnail" id="thumbnail">
                @error('thumbnail')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-2">
                <button type="button" id="lfm" data-input="thumbnail" class="btn btn-primary d-grid"
                    data-preview="holder">Chọn ảnh</button>
            </div>
            <div class="col-md-3">
                <div id="holder">
                    <img src="" alt="">
                </div>

            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Lưu lại</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Hủy</a>
</form>
@endsection


@section('script')
<script>
$('#lfm').filemanager('image');
</script>
@endsection