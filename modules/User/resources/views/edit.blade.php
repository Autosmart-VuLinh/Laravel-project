@extends('layouts.backend')

@section('content')
    @if (session('mess'))
        <div class="alert alert-success">
            {{ session('mess') }}
        </div>
    @endif
    <form action="" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Họ và tên</label>
                <input value="{{ old('name') ?? $user->name }}" type="text"
                    class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input value="{{ old('email') ?? $user->email }}" type="email"
                    class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="group_id">Nhóm</label>
                <select name="group_id" id="group_id" class="form-control @error('group_id') is-invalid @enderror">
                    <option selected>Choose...</option>
                    <option>...</option>
                    <option value="1">Admin</option>
                </select>
                @error('group_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="password">Mật khẩu</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Hủy</a>
    </form>
@endsection
