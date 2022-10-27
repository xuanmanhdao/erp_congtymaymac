@extends('layout.master')
@section('content')

<h3>Quản lý sản xuất</h3>

{{-- <a class="btn btn-success" href="{{ route('')  }}">Thêm</a> --}}
<caption>
    <form class="float-right form-group form-inline">
        <label class="mr-1">Search:</label> 
        <input type="search" name="q" value placeholder="Theo mã sản xuất" class="form-control">
    </form>
</caption>
<table class="table table-striped table-centered mb-0">
    <tr>
        <th>Mã Sản Xuất</th>
        <th>Kế hoạch</th>
        <th>Ngày nhận</th>
        <th>Mã hoàn thành</th>
        <th>Ghi chú</th>
        <th>Tác vụ</th>
        <th>Sửa</th>
        <th>Xoá</th>

    </tr>

@endsection