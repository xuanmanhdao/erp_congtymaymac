// $(document).ready(function () {
//       $(document).on('click', '#btn-them-san-pham', function(e){
//             e.preventDefault();
//             var newRow = `<tr>
//               <td> 
//               <input type="text" name="SanPham[]" list="sanpham" class ="form-control">
//               <datalist id="sanpham">
//                 <option value="Nước"> 
//                 <option value="Pepsi">
//                 <option value="Giặt là">
//                 <option value="Bia">
//                 <option value="Bữa sáng">
//                 <option value="Dọn phòng">
//               </datalist>
//               </td> 

//               <td>
//                 <input type ="number" min="0" step="1000" class="form-control txt-don-gia" list="giatien" name = "DonGia[]" />
//                 <datalist id="giatien">
//                  <option value="10000">Nước
//                  <option value="0">Giặt là, Bữa sáng, Dọn phòng
//                  <option value="15000">Bia
//                 </datalist>
//               </td>
//               <td>
//                   <input type ="number" min="0"  step="1" class="form-control txt-so-luong"  name = "SoLuong[]" />
//               </td>
//               <td class = "td-tong-tien" type ="number"></td>
//               <td >
//                   <a href="#" class="btn-xoa-san-pham text-danger"><i class="fa-solid fa-trash-can"></i> Xoá </a>
//               </td>
//             </tr>`;

//             $("#table-chi-tiet-don-hang tbody").append(newRow)
//       });

//       $(document).on('click','.btn-xoa-san-pham', function(e){
//         e.preventDefault();
//         var myTr = $(this).parent().parent();
//         myTr.remove();
//     });
    
//     function tinhTongTienDonHang(){
//         var tongTienDonHang = 0 ;
//         $("#table-chi-tiet-don-hang tbody tr").each(function(){
//             var donGia = $(this).find(".txt-don-gia").val();
//             var soLuong = $(this).find(".txt-so-luong").val();

//             donGia = (donGia === '' ?  0 : parseFloat(donGia));
//             soLuong = (soLuong === '' ?  0 :  parseFloat(soLuong));

//             var thanhTien = donGia * soLuong;
//             $(this).find('.td-tong-tien').text(thanhTien.toLocaleString('vi'));
//             tongTienDonHang = tongTienDonHang + thanhTien;
//         });
        
//         $('#tong-tien-don-hang').text(tongTienDonHang.toLocaleString('vi'));
//     }
//     $(document).on('change','.txt-so-luong, .txt-don-gia', function(){
//         var myTr = $(this).parent().parent();
//         tinhTongTienDonHang(myTr);
//     })
    

// });
