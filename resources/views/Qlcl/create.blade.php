@extends('layout.master')
@section('content')

    <h3>Thêm chất liệu</h3>
    <br>
    <form action="{{ route('chatlieu.store') }}" method="post">
        @csrf
        
        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong>Mã chất liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="MaChatLieu" >
                @if ($errors->has('MaChatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('MaChatLieu') }}
                    </span>
                @endif
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong>Tên chất liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="TenChatLieu" >
                @if ($errors->has('TenChatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('TenChatLieu') }}
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label class="col-sm-1,5 col-form-label flex-div"><strong>Mô tả chất liệu: </strong></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="MoTaChatLieu" >
                @if ($errors->has('MoTaChatLieu'))
                    <span class="error" style="color: red;">
                        {{ $errors->first('MoTaChatLieu') }}
                    </span>
                @endif
            </div>
        </div>
        <br>


        

        


        <button class="btn btn-success">Thêm</button>


    </form>
@endsection
