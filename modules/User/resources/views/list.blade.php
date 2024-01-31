@extends('layouts.backend')

@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-1">Thêm mới</a>
    @if (session('mess'))
        <div class="alert alert-success text-center">
            {{ session('mess') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Nhóm</th>
                            <th>Ngày tạo</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Nhóm</th>
                            <th>Ngày tạo</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.users.data') }}",
            "columns": [{
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'group_id'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'edit'
                },
                {
                    data: 'delete'
                }
            ],
            "language": {
                "decimal": "",
                "emptyTable": "Không có dữ liệu nào trong bảng",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(được lọc từ _MAX_ tổng số mục)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing": "",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy bản ghi phù hợp",
                "paginate": {
                    "first": "Đầu tiên",
                    "last": "Cuối cùng",
                    "next": "Tiếp theo",
                    "previous": "Trước đó"
                },
                "aria": {
                    "sortAscending": ": kích hoạt để sắp xếp cột theo thứ tự tăng dần",
                    "sortDescending": ": kích hoạt để sắp xếp cột theo thứ tự giảm dần"
                }
            }

        });
    </script>
@endsection
