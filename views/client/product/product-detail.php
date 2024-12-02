<?php include '../views/client/layout/header.php'; ?>
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                            <div class="product-image">
                                <div class="product_img_box">
                                    <!-- Hiển thị ảnh lớn -->
                                    <img id="main_product_image"
                                        src="./images/product_gallery/<?= $productDetail['galleries'][0]; ?>"
                                        data-zoom-image="./images/product_gallery/<?= $productDetail['galleries'][0]; ?>"
                                        alt="product_main_image" />
                                    <a href="#" class="product_img_zoom" title="Zoom">
                                        <span class="linearicons-zoom-in"></span>
                                    </a>
                                </div>

                                <!-- Hiển thị các ảnh nhỏ bên dưới -->
                                <div id="pr_item_gallery" class="product_gallery_item slick_slider"
                                    data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                    <?php foreach ($productDetail['galleries'] as $key => $gallery) : ?>
                                        <div class="item">
                                            <a href="#" class="product_gallery_item <?= $key === 0 ? 'active' : ''; ?>"
                                                data-image="./images/product_gallery/<?= $gallery; ?>"
                                                data-zoom-image="./images/product_gallery/<?= $gallery; ?>">
                                                <img src="./images/product_gallery/<?= $gallery; ?>"
                                                    alt="product_thumbnail_<?= $key + 1; ?>" />
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="pr_detail">
                                <form action="index.php?act=add-cart-byNow" method="post">
                                <div class="product_description">
                                    <input type="hidden" name="product_id" value="<?= $productDetail['product_id']; ?>">
                                    <h4 class="product_title"><a href="#"><?= $productDetail['product_name']; ?></a></h4>
                                    <div class="product_price">
                                        <span class="price price-variants">
                                            <?= number_format($productDetail['product_sale_price']); ?>₫
                                        </span>
                                        <?php if (!empty($productDetail['product_sale_price'])): ?>
                                            <del class="sale-price-variants"><?= number_format($productDetail['product_price']); ?>₫</del>
                                        <?php endif; ?>
                                        <input type="hidden" name="variant_id" id="variant_id" >
                                   

                                        <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(0)</span>
                                    </div>
                    
                                    </div>
                                   
                                    <br>
                                   

                                    <br>

                                    <!-- Chọn RAM -->
                                    <div class="pr_switch_wrap">
                                        <span class="switch_lable">RAM</span>
                                        <div class="product_size_switch">
                                            <?php foreach ($productDetail['variants'] as $variant): ?>
                                                <button type="button" class="btn btn-outline-primary btn-ram"
                                                    data-ram="<?= $variant['variant_Ram_name']; ?>">
                                                    <?= $variant['variant_Ram_name']; ?>
                                                </button>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Chọn ROM -->
                                    <div class="pr_switch_wrap">
                                        <span class="switch_lable">ROM</span>
                                        <div class="product_size_switch">
                                            <?php foreach ($productDetail['variants'] as $variant): ?>
                                                <button type="button" class="btn btn-outline-primary btn-rom"
                                                    data-rom="<?= $variant['variant_Rom_name']; ?>">
                                                    <?= $variant['variant_Rom_name']; ?>
                                                </button>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="cart_extra">
                                    <div class="cart-product-quantity">
                                        <label for="variant_quantity">Quantity:</label>
                                        <span id="variant_quantity">0</span> <!-- Sẽ cập nhật số lượng ở đây -->
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus">
                                            <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                            <input type="button" value="+" class="plus">
                                        </div>
                                    </div>


                                    <div class="cart_btn">
                                        <button class="btn btn-fill-out btn-addtocart" type="submit" name="add_to_cart">
                                            <i class="icon-basket-loaded"></i> Thêm vào Giỏ hàng 
                                        </button>
                                        <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                    </div>
                                </div>
                                <br>
                                    
                                    <div class="cart_btn">
                                        <button class="btn btn-fill-out btn-addtocart" type="button" name="buy-now">
                                            <i class="icon-basket-loaded"></i> Mua Ngay
                                        </button>
                                       
                                    </div>
                                </form>   
                                <hr>
                                <ul class="product-meta">
                                    <li>Mã: <a href="#"><?= ($productDetail['product_id']); ?></a></li>
                                    <li>Danh mục: <a href="#"><?= ($productDetail['category_name']); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs -->
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description"
                                    role="tab" aria-controls="Description" aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                aria-labelledby="Description-tab">
                                <p><?= ($productDetail['product_description']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Danh mục</h5>
                            <?php foreach ($category as $danhMuc) : ?>
                                <ul class="widget_categories">
                                    <li><a href="#"><span class="categories_name"><?= $danhMuc['name'] ?></span><span class="categories_num">(9)</span></a></li>
                                </ul>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Add JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const variants = <?= json_encode($productDetail['variants']); ?>;
            let selectedRam = null;
            let selectedRom = null;

            // Hàm định dạng giá
            function formatPrice(price) {
                return new Intl.NumberFormat('vi-VN').format(price * 1000) + '₫';
            }

            // Hàm cập nhật thông tin biến thể
            function updateVariantInfo() {
                const matchedVariant = variants.find(variant =>
                    variant.variant_Ram_name === selectedRam &&
                    variant.variant_Rom_name === selectedRom
                );

                if (matchedVariant) {
                    // Cập nhật giá
                    document.querySelector('.price-variants').textContent = formatPrice(matchedVariant.product_variant_price);
                    if (matchedVariant.product_variant_sale_price) {
                        document.querySelector('.sale-price-variants').textContent =
                            formatPrice(matchedVariant.product_variant_sale_price);
                    } else {
                        document.querySelector('.sale-price-variants').textContent = '';
                    }

                    // Cập nhật số lượng
                    document.getElementById('variant_quantity').textContent = matchedVariant.product_variant_quantity;
                    document.getElementById('variant_id').value = matchedVariant.variant_id;
                } else {
                    // Khi không có biến thể phù hợp
                    document.querySelector('.price-variants').textContent = 'Không có sẵn';
                    document.querySelector('.sale-price-variants').textContent = '';
                    document.getElementById('variant_quantity').textContent = 0;
                    document.getElementById('variant_id').value = '';
                }
            }

            // Gán sự kiện cho nút RAM
            document.querySelectorAll('.btn-ram').forEach(button => {
                button.addEventListener('click', function() {
                    selectedRam = this.getAttribute('data-ram');

                    // Xóa class 'active' khỏi tất cả nút RAM và thêm cho nút được chọn
                    document.querySelectorAll('.btn-ram').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Cập nhật thông tin biến thể
                    updateVariantInfo();
                });
            });

            // Gán sự kiện cho nút ROM
            document.querySelectorAll('.btn-rom').forEach(button => {
                button.addEventListener('click', function() {
                    selectedRom = this.getAttribute('data-rom');

                    // Xóa class 'active' khỏi tất cả nút ROM và thêm cho nút được chọn
                    document.querySelectorAll('.btn-rom').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Cập nhật thông tin biến thể
                    updateVariantInfo();
                });
            });
        });
    </script>

</div>
<?php include '../views/client/layout/footer.php'; ?>