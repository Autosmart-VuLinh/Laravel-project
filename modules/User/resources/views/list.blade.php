@extends('layouts.client')

@section('title', 'Danh sách người dùng')

@section('content')
    <h1>Danh sách người dùng</h1>
    <table>
        {{ __('user::custom.title', ['name' => 'lĨNH']) }}
    </table>
@endsection
