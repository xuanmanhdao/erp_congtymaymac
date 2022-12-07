@extends('layout.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


  <title>Quản lý tình trạng xuất kho</title>


    <h3>Quản lý tình trạng xuất kho</h3>
    <hr>

    <a class="btn btn-success" href="{{ route('tinhtrangxuatkho.create') }}"><i class="fa-solid fa-plus"></i> </a>
    <caption>
        <form class="float-right form-group form-inline">
            <label class="mr-1">Search:</label>
            <input type="search" name="q" value="{{ $search }}" placeholder="Theo mã xuất kho" class="form-control">
        </form>
    </caption>
    <table class="table table-striped table-centered mb-0">
        <tr>
          
            <th>Mã Xuất kho</th>
            <th>Tình trạng</th>
           
           
            
            <th>Tác vụ</th>
        </tr>
        @foreach ($tinhtrangxuatkho as $data)
            <tr>
                <td>{{ $data->MaXuatKho}}</td>
                <td>
                   @switch($data->TinhTrang)
                    @case(0)
                        Chưa kiểm tra
                        @break
                 
                    @case(1)
                        Tốt
                        @break

                    @case(2)
                        Chưa đạt yêu cầu
                        @break
                 
                   
                @endswitch
                   
                  
                    </td>
               
                
               {{--  <td>{{ $data->MaDonViPhanPhoi }}</td> --}}
               
                
             <td>
                    <a class="btn btn-warning" href="{{ route('tinhtrangxuatkho.edit', $data->MaXuatKho) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button type="button" class="btn btn-primary" style="padding: 2px" data-toggle="modal"
                        data-target="#deleteModal">
                        <i  class="fa-solid fa-trash"></i>
                    </button>
                </td>           
            </tr>
            
            <!-- Modal Delete Start-->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Bạn có chắc muốn xoá không?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Có, hãy xoá!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                            <form action="{{ route('tinhtrangxuatkho.delete', $data->MaXuatKho) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Xoá</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Delete End-->
                
                
            </tr>
        @endforeach
    </table>
    <br>
    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $tinhtrangxuatkho->links() }}
        </ul>
    </nav>
    </div>
    </div>
    </div>    
@endsection

{{-- @section('scripts')

    <script>
        $(document).ready(function (){
            $('.deleteKehoachbtn').click(function (e) { 
                e.preventDefault();
                var MaKeHoach = $(this).val();
                $('#MaKeHoach').val(MaKeHoach);
                $('#deleteModal').modal('show');
            });
        })
    </script>

@endsection --}}
