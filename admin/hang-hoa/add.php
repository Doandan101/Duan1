<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới hàng hóa</div>
            <div class="card-body">
                <form action="index.php" method="POST" enctype="multipart/form-data" id="add_hang_hoa">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ma_loai" class="form-label">Loại hàng</label>
                            <select name="ma_loai" class="form-control" id="ma_loai">
                        
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ten_hh" class="form-label">Tên hàng hóa</label>
                            <input type="text" name="ten_hh" id="ten_hh" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ma_hh" class="form-label">Mã hàng hóa</label>
                            <input type="text" name="ma_hh" id="ma_hh" readonly class="form-control"
                                value="auto number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="hinh" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="don_gia" class="form-label">Đơn giá (vnđ)</label>
                            <input type="number" name="don_gia" id="don_gia" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="giam_gia" class="form-label">Giảm giá (vnđ)</label>
                            <input type="number" name="giam_gia" id="giam_gia" class="form-control">
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="1" name="dac_biet">Đặc biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="dac_biet" checked>Bình thường
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <?php $today = date_format(date_create(), 'Y-m-d'); ?>
                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control"
                                value="<?= $today ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="so_luot_xem" class="form-label">Số lượt xem</label>
                            <input type="text" name="so_luot_xem" id="so_luot_xem" readonly class="form-control"
                                value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                            <textarea id="txtarea" spellcheck="false" name="mo_ta"
                                class="form-control form-control-lg mb-3" id="textareaExample" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                        <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>