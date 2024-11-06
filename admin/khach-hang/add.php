<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới khách hàng</div>
            <div class="card-body">
                <form action="index.php" method="POST" enctype="multipart/form-data" id="admin_add_kh">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="ma_kh" class="form-label">Mã khách hàng (tên đăng nhập)</label>
                            <input type="text" name="ma_kh" id="ma_kh" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="mat_khau" class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" id="mat_khau" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="mat_khau" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="mat_khau2" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="hinh" class="form-label">Ảnh</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="form-label">Địa chỉ email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>
                

                    <div class="mb-3 text-center mt-3">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                        <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>