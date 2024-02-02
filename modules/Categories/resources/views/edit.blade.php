@extends('layouts.backend')

@section('content')
    @if (session('mess'))
        <div class="alert alert-success">
            {{ session('mess') }}
        </div>
    @endif
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Tên</label>
                <input value="{{ old('name') ?? $category->name }}" type="text"
                    class="title form-control @error('name') is-invalid @enderror" name="name" id="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="slug">Slug</label>
                <input value="{{ old('slug') ?? $category->slug }}" type="text"
                    class="slug form-control @error('slug') is-invalid @enderror" name="slug" id="slug">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="parent_id">Cha</label>
                <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                    <option value="0">Không</option>
                    {{ getCategories($categories, old('parent_id') ?? $category->parent_id) }}
                </select>
                @error('parent_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">Hủy</a>
    </form>
@endsection
