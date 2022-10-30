<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <link rel="stylesheet" href="{{ asset('library/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/quanlykho/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/quanlykho/layouts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/quanlykho/product.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper">
        <div class="header d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('img/quanlykho/login_logo.png') }}" alt="">
                </a>
            </div>
            <div class="menu d-flex justify-content-between align-items-center">
                <ul>
                    <li><a href="#">TRANG CHỦ</a></li>
                    <li><a href="#">HỎI ĐÁP</a></li>
                    <li><a href="#">LIÊN HỆ</a></li>
                </ul>
                <ul class="menu2">
                    <li>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </li>
                    <li class="menu2-avatar">
                        <img src="{{ asset('img/quanlykho/avatar.png') }}" alt="">
                        <i class="fa-solid fa-caret-down"></i>
                    </li>
                    <li>
                        <p>VIE</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex">
            <div class="nav">
                <ul>
                    <li class="nav-items nav-active">
                        <a href="#">
                            <span>Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="#">
                            <span>Nhập hàng</span>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="#">
                            <span>Xuất hàng</span>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="#">
                            <span>Kiểm kê hàng hoá</span>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="#">
                            <span>Báo cáo</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="container">
                    <div class="box box-filter">
                        <div class="row">
                            <div class="col-lg-6 filter-options">
                                <label for="">Tên sản phẩm</label>
                                <div class="filter-input-icon">
                                    <input type="text" placeholder="Nhập tên sản phẩm">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </div>

                            <div class="col-lg-6 filter-options">
                                <label for="">Danh mục</label>
                                <div class="filter-input-icon">
                                    <select name="" id="">
                                        <option value="0" disabled selected>Chọn danh mục</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 filter-options">
                                <label for="">Danh mục</label>
                                <div class="filter-input">
                                    <input type="text" placeholder="Min">
                                    <span>-</span>
                                    <input type="text" placeholder="Max">
                                </div>
                            </div>
                            <div class="col-lg-6 filter-options">
                                <label for="">Doanh số</label>
                                <div class="filter-input">
                                    <input type="text" placeholder="Min">
                                    <span>-</span>
                                    <input type="text" placeholder="Max">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="filter-btn">
                                    <div class="btn add-btn">
                                        <a href="#">Tìm</a>
                                    </div>
                                    <div class="btn reset-btn">
                                        <a href="#">Nhập lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="tabs">
                            <a href="#" class="tap-options">
                                <span>Tất cả</span>
                            </a>
                            <a href="#" class="tap-options">
                                <span>Đang hoạt động</span>
                            </a>
                            <a href="#" class="tap-options">
                                <span>Hết hàng (0)</span>
                            </a>
                            <a href="#" class="tap-options">
                                <span>Chờ duyệt (0)</span>
                            </a>
                            <a href="#" class="tap-options">
                                <span>Vi phạm (0)</span>
                            </a>
                            <a href="#" class="tap-options">
                                <span>Đã ẩn (0)</span>
                            </a>
                        </div>
                        <div class="control-table">
                            <div class="control-info">
                                <div class="total-products">
                                    <p>0 Sản phẩm</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-label="Success example"
                                        style="width: 10%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="upload-info">
                                    <p>Có thể đăng tải 1000 sản phẩm</p>
                                </div>
                            </div>
                            <div class="control-actions">
                                <div class="btn add-btn">
                                    <img src="{{ asset('img/quanlykho/add.svg') }}" alt="">
                                    <a href="#">Thêm sản phẩm mới</a>
                                </div>
                                <div class="btn export-btn">
                                    <img src="{{ asset('img/quanlykho/export-file.svg') }}" alt="">
                                    <a href="#">Xuất file</a>
                                </div>
                            </div>
                        </div>
                        <div class="custom-table">
                            <div class="table-content">
                                <table class="table">
                                    <thead class="thead">
                                        <tr class="tr">
                                            <td class="td td-input">
                                                <input type="checkbox">
                                                <label for="">Tên sản phẩm</label>
                                            </td>
                                            <td class="td">Nhóm hàng</td>
                                            <td class="td">
                                                Giá
                                                <img src="{{ asset('img/quanlykho/sort-icon.svg') }}" alt="">
                                            </td>
                                            <td class="td">
                                                Kho hàng
                                                <img src="{{ asset('img/quanlykho/sort-icon.svg') }}" alt="">
                                            </td>
                                            <td class="td">
                                                Doanh số
                                                <img src="{{ asset('img/quanlykho/sort-icon.svg') }}" alt="">
                                            </td>
                                            <td class="td">Hoạt động</td>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr class="tr">
                                            <td class="td">
                                                <input type="checkbox">
                                                <img src="{{ asset('img/quanlykho/default.png') }}" alt="">
                                                <span>Tên sản phẩm</span>
                                            </td>
                                            <td class="td">
                                                <span>-</span>
                                            </td>
                                            <td class="td">
                                                <span>10000đ</span>
                                            </td>
                                            <td class="td">
                                                <span>1</span>
                                            </td>
                                            <td class="td">
                                                <span>1</span>
                                            </td>
                                            <td class="td">
                                                <a class="btn-edit" href="#">Sửa</a>
                                            </td>
                                        </tr>
                                        <tr class="tr">
                                            <td class="td">
                                                <input type="checkbox">
                                                <img src="{{ asset('img/quanlykho/default.png') }}" alt="">
                                                <span>Tên sản phẩm</span>
                                            </td>
                                            <td class="td">
                                                <span>-</span>
                                            </td>
                                            <td class="td">
                                                <span>10000đ</span>
                                            </td>
                                            <td class="td">
                                                <span>1</span>
                                            </td>
                                            <td class="td">
                                                <span>1</span>
                                            </td>
                                            <td class="td">
                                                <a class="btn-edit" href="#">Sửa</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="">
                                                <div class="table-paginate">
                                                    <a href="#">
                                                        << /a>
                                                            <a href="#">1</a>
                                                            <a href="#">></a>
                                                </div>
                                            </td>
                                            <td class="" colspan="">
                                                <div class="table-page">
                                                    <select name="" id="">
                                                        <option value="">24/trang</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <div class="table-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('library/bootstrap-5.2.2-dist/js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/fb15251dc0.js" crossorigin="anonymous"></script>
</body>

</html>
