<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật danh mục</div>
            <div class="card-body">
                <form action="index.php?btn_update" method="POST" id="edit_loai">
                    <div class="mb-3">
                        <label for="ma_loai" class="form-label">Mã loại</label>
                        <input type="text" name="ma_loai" class="form-control" disabled value="">
                    </div>
                    <div class="mb-3">
                        <label for="ten_loai" class="form-label">Tên loại</label>
                        <input type="text" name="ten_loai" placeholder="Nhập tên loại" class="form-control" required
                            value="">
                    </div>
                    <div class="mb-3 text-center">
                        <input type="hidden" name="ma_loai" value="">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>




                </form>
            </div>
        </div>
    </div>
</div>