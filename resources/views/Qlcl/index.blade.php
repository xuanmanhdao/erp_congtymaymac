@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <h3>Quản lý chất liệu</h3>

    <a class="btn btn-success" href="{{ route('chatlieu.create') }}"><i class="fa-solid fa-plus"></i></a>
    {{-- <caption>
    <form class="float-right form-group form-inline">
        <label class="mr-1">Search:</label>
        <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã nguyên vật liệu"
            class="form-control">
    </form>
</caption> --}}
    <table class="table table-striped table-centered mb-0">
        <tr>
            <th>Mã chất liệu</th>
            <th>Tên chất liệu</th>
            <th>Mô tả chất liệu</th>
            <th>Tác vụ</th>

        </tr>
        @foreach ($chatlieu as $data)
        <tr>
            <td>{{ $data->MaChatLieu }}</td>
            <td>{{ $data->TenChatLieu }}</td>
            <td>{{ $data->MoTaChatLieu }}</td>

                <td>
                    <a class="btn btn-warning " href="{{ route('chatlieu.edit', $data->MaChatLieu) }}">
                        <i class="fa-solid fa-pen-to-square"></i></a>

                </td>
            </tr>
        </tr>
        @endforeach
        {{-- @foreach ($chatlieu as $data)
        <tr>
            <td>{{ $data->nguyenvatlieu->TenNguyenVatLieu }}</td>
            <td>
                {{-- {{ $data->ChatLieu }} --}}
        {{-- @foreach ($data->nguyenvatlieu as $each)
                        <p>{{ $each->ChatLieu }}</p>
                @endforeach --}}
        {{-- </td> --}}


        

        {{-- @endforeach --}}
    </table>
@endsection
