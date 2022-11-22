@extends('layout.master')
@section('content')

    <h3>Thêm chất liệu</h3>
    <br>
    <form action="{{ route('chatlieu.update', $data) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong>Mã chất liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="MaChatLieu" value="{{ $data->MaChatLieu }}" >
                @if ($errors->has('ChatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('ChatLieu') }}
                    </span>
                @endif
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong>Tên chất liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="TenChatLieu" value="{{ $data->TenChatLieu }}"  >
                @if ($errors->has('ChatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('ChatLieu') }}
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong>Mô tả chất liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="MoTaChatLieu" value="{{ $data->MoTaChatLieu }}"  >
                @if ($errors->has('ChatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('ChatLieu') }}
                    </span>
                @endif
            </div>
        </div>
        <br>


        <button class="btn btn-success">Sửa</button>


    </form>
@endsection
