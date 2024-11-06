<!-- Vùng chứa và tiêu đề trang -->
<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách loại hàng</h4>
    </div>
    <!-- Hình thức xóa các mục đã chọn -->
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                    Xóa mục đã chọn</button>
                    <!-- Cấu trúc bảng -->
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th><a href="index.php" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input type="checkbox" name="ma_loai[]" value=""></td>
                            <td></td>
                            <td></td>
                            <td class="text-end">
                                <a href="" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded"
                                    onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>