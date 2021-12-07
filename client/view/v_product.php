<section class="product">
    <input type="checkbox" name="" id="toggle__filter">
    <div class="product__filter">
        <div class="product__filter-icon-close">
            <label for="toggle__filter" class="product__filter-icon-close-btn">
                <i class="fas fa-times header__menu-mobile-close-btn-icon"></i>
            </label>
        </div>
        <div class="product__filter-action">
            <button for="" class="product__filter-action-clear">Xóa tất cả</button>
            <button for="" class="product__filter-action-apply">Chấp nhận</button>
        </div>
        <!-- Start filter column -->
        <div class="product__filter-column">
            <label class="label__head" for="sort"> <span class="label__head-name">Sắp xếp</span>
                <label class="plus-icon" for="sort">
                    <i><i class="fas fa-plus"></i></i>
                </label>
            </label>
            <input class="filter-toggle" type="checkbox" name="" id="sort">
            <div class="product__filter-content">
                <div class="product__filter-item">
                    <input type="radio" id="newest" name="filter__sort">
                    <label class=" product__filter-label__radio" for="newest"><span class="filter-name">Mới
                            nhất</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="most" name="filter__sort">
                    <label class=" product__filter-label__radio" for="most"><span class="filter-name">Nổi bật
                            nhất</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="pricedown" name="filter__sort">
                    <label class=" product__filter-label__radio" for="pricedown"><span class="filter-name">Giá giảm
                            dần
                        </span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="priceup" name="filter__sort">
                    <label class=" product__filter-label__radio" for="priceup"><span class="filter-name">Giá tăng
                            dần
                        </span></label>
                </div>
            </div>
        </div>
        <!-- End filter column -->
        <!-- Start filter column -->
        <div class="product__filter-column">
            <label class="label__head" for="price"> <span class="label__head-name">Mức giá</span>
                <label class="plus-icon" for="price">
                    <i><i class="fas fa-plus"></i></i>
                </label>
            </label>
            <input class="filter-toggle" type="checkbox" name="" id="price">
            <div class="product__filter-content">
                <div class="product__filter-item">
                    <input type="radio" id="below1m" name="filter__price">
                    <label class=" product__filter-label__radio" for="below1m"><span class="filter-name">Dưới
                            1 triệu</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="1mto2m" name="filter__price">
                    <label class=" product__filter-label__radio" for="1mto2m"><span class="filter-name">Từ 1
                            đến 2 triệu</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="2mto3m" name="filter__price">
                    <label class=" product__filter-label__radio" for="2mto3m"><span class="filter-name">Từ 2
                            đến 3 triệu
                        </span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="3mto4m" name="filter__price">
                    <label class=" product__filter-label__radio" for="3mto4m"><span class="filter-name">Từ 3
                            đến 4 triệu
                        </span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="4mto5m" name="filter__price">
                    <label class=" product__filter-label__radio" for="4mto5m"><span class="filter-name">Từ 4
                            đến 5 triệu
                        </span></label>
                </div>
                <div class="product__filter-item">
                    <input type="radio" id="over5m" name="filter__price">
                    <label class=" product__filter-label__radio" for="over5m"><span class="filter-name"> Trên 5
                            triệu
                        </span></label>
                </div>
            </div>
        </div>
        <!-- End filter column -->
        <!-- Start filter column -->
        <div class="product__filter-column">
            <label class="label__head" for="sex"> <span class="label__head-name">Giới tính</span>
                <label class="plus-icon" for="sex">
                    <i><i class="fas fa-plus"></i></i>
                </label>
            </label>
            <input class="filter-toggle" type="checkbox" name="" id="sex">
            <div class="product__filter-content">
                <div class="product__filter-item">
                    <input type="checkbox" id="male">
                    <label class="product__filter-label" for="male"><span class="filter-name">Nam</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="female">
                    <label class="product__filter-label" for="female"><span class="filter-name">Nữ</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="lgbt">
                    <label class="product__filter-label" for="lgbt"><span class="filter-name">Trung
                            Tính</span></label>
                </div>
            </div>
        </div>
        <!-- End filter column -->
        <!-- Start filter column -->
        <div class="product__filter-column">
            <label class="label__head" for="age"><span class="label__head-name">Độ tuổi</span>
                <label for="age" class="plus-icon">
                    <i><i class="fas fa-plus"></i></i>
                </label>
            </label>
            <input class="filter-toggle" type="checkbox" name="" id="age">
            <div class="product__filter-content">
                <div class="product__filter-item">
                    <input type="checkbox" id="adults">
                    <label class="product__filter-label" for="adults"><span class="filter-name">Ngưới
                            lớn</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="childen">
                    <label class="product__filter-label" for="childen"><span class="filter-name">Trẻ
                            em</span></label>
                </div>
            </div>
        </div>
        <!-- End filter column -->
        <!-- Start filter column -->
        <div class="product__filter-column">
            <label class="label__head" for="brand"><span class="label__head-name"> Thương hiệu</span>
                <label for="brand" class="plus-icon">
                    <i><i class="fas fa-plus"></i></i>
                </label>
            </label>
            <input class="filter-toggle" type="checkbox" name="" id="brand">
            <div class="product__filter-content">
                <div class="product__filter-item">
                    <input checked type="checkbox" id="adidas">
                    <label class="product__filter-label" for="adidas"><span class="filter-name">Adidas</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="nike">
                    <label class="product__filter-label" for="nike"><span class="filter-name">Nike</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="bitis">
                    <label class="product__filter-label" for="bitis"><span class="filter-name">Bitis</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="newbalance">
                    <label class="product__filter-label" for="newbalance"><span class="filter-name">New
                            Balance</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="puma">
                    <label class="product__filter-label" for="puma"><span class="filter-name">Puma</span></label>
                </div>
                <div class="product__filter-item">
                    <input type="checkbox" id="balenciaga">
                    <label class="product__filter-label" for="balenciaga"><span
                            class="filter-name">Balenciaga</span></label>
                </div>
            </div>
        </div>
        <!-- End filter column -->
        <!-- Start filter column -->
        <div class="product__filter-column">
            <label class="label__head" for="colors"><span class="label__head-name">Màu sắc</span>
                <label for="colors" class="plus-icon">
                    <i><i class="fas fa-plus"></i></i>
                </label>
            </label>
            <input class="filter-toggle" type="checkbox" name="" id="colors">
            <div class="product__filter-content product__filter-content--color">
                <label class="product__filter-item-color">
                    <input type="checkbox" id="orange">
                    <div class="product__filter-label--circle" for="orange" style="--bg-color:#EE6F57;"></div>
                </label>
                <label class="product__filter-item-color">
                    <input type="checkbox" id="red">
                    <div class="product__filter-label--circle" for="red" style="--bg-color:
                            #CF455C;"></div>
                </label>
                <label class="product__filter-item-color">
                    <input type="checkbox" id="turqoise">
                    <div class="product__filter-label--circle" for="turqoise" style="--bg-color:
                                #51C4D3;"></div>
                </label>
                <label class="product__filter-item-color">
                    <input type="checkbox" id="black">
                    <div class="product__filter-label--circle" for="black" style="--bg-color:
                                #333333;"></div>
                </label>
                <label class="product__filter-item-color">
                    <input type="checkbox" id="white">
                    <div class="product__filter-label--circle" for="white" style="--bg-color:
                                #ffffff;"></div>
                </label>
                <label class="product__filter-item-color">
                    <input type="checkbox" id="gray">
                    <div class="product__filter-label--circle" for="gray" style="--bg-color:
                                #8d886f;"></div>
                </label>
                <label class="product__filter-item-color">
                    <input type="checkbox" id="lightgray">
                    <div class="product__filter-label--circle" for="lightgray" style="--bg-color:
                                #999999;"></div>
                </label>
            </div>
        </div>
        <!-- End filter column -->
        <!-- Start filter column -->
        <div class="product__filter-column">
            <label class="label__head" for="sizes"><span class="label__head-name">Kích cỡ</span>
                <label for="sizes" class="plus-icon">
                    <i><i class="fas fa-plus"></i></i>
                </label>
            </label>
            <input class="filter-toggle" type="checkbox" name="" id="sizes">
            <div class="product__filter-content product__filter-content-size">
                <label class="product__filter-item">
                    <input type="checkbox" id="24">
                    <div class="product__filter-label-size" for="24"><span class="prodduct__size-name">24</span></div>
                </label>
                <label class="product__filter-item">
                    <input type="checkbox" id="25">
                    <div class="product__filter-label-size" for="25"><span class="prodduct__size-name">25</span></div>
                </label>
                <label class="product__filter-item">
                    <input type="checkbox" id="26">
                    <div class="product__filter-label-size" for="26"><span class="prodduct__size-name">
                            26</span></div>
                </label>
                <label class="product__filter-item">
                    <input type="checkbox" id="27">
                    <div class="product__filter-label-size" for="27"><span class="prodduct__size-name">
                            27</span></div>
                </label>
                <label class="product__filter-item">
                    <input type="checkbox" id="28">
                    <div class="product__filter-label-size" for="28"><span class="prodduct__size-name">
                            28</span></div>
                </label>
                <label class="product__filter-item">
                    <input type="checkbox" id="29">
                    <div class="product__filter-label-size" for="29"><span class="prodduct__size-name">
                            29</span></div>
                </label>
                <label class="product__filter-item">
                    <input type="checkbox" id="30">
                    <div class="product__filter-label-size" for="30"><span class="prodduct__size-name">
                            30</span></div>
                </label>
                <label class="product__filter-item">
                    <input type="checkbox" id="31">
                    <div class="product__filter-label-size" for="31"><span class="prodduct__size-name">
                            31</span></div>
                </label>
            </div>
        </div>
        <!-- End filter column -->
    </div>
    <div class="product__area">
        <!-- Start product area -->
        <div class="product__area-top">
            <div class="filter-menu">
                <label for="toggle__filter" class="filter-menu__icon"><i class="fas fa-bars"></i></label>
            </div>
            <ul class="product-bar">
                <li class="product-bar__item">
                    <input type="checkbox" name="" id="giay_tay">
                    <label for="giay_tay" class="product-bar__label">Giày Tây</label>
                </li>
                <li class="product-bar__item">
                    <input type="checkbox" name="" id="giay_the_thao">
                    <label for="giay_the_thao" class="product-bar__label">Giày Thể Thao</label>
                </li>
                <li class="product-bar__item">
                    <input type="checkbox" name="sandal" id="sandal">
                    <label for="sandal" class="product-bar__label">Sandal</label>
                </li>
            </ul>
        </div>
        <!-- End section top -->
        <!-- Start product__breadcrumb -->
        <ul class="product__breadcrumb">
            <li class="product__breadcrumb__item">
                <label class="product__breadcrumb__item-label">Sắp xếp: Nổi bật nhất
                    <a class="product__breadcrumb__item--icon-close" href=""><i class="fas fa-times"></i></a>
                </label>
            </li>
            <li class="product__breadcrumb__item">
                <label class="product__breadcrumb__item-label">Mức giá: Từ 1 đến 2 triệu
                    <a class="product__breadcrumb__item--icon-close" href=""><i class="fas fa-times"></i></a>
                </label>
            </li>
            <div class="product__breadcrumb__btn">
                <button>XOÁ BỘ LỌC</button>
            </div>
        </ul>
        <!-- End product__breadcrumb -->
        <!-- Start product section -->
        <div class="product__section">
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit" class="js-buy-prod-btn">Mua Hàng</button>
                </div>
            </div>
        </div>

        <ul class="product__pagination">
            <li class="product__pagination__link"><button type="submit">1</button></li>
            <li class="product__pagination__link"><button type="submit">2</button></li>
            <li class="product__pagination__link product__pagination__link--active"><button type="submit">3</button>
            </li>
            <li class="product__pagination__link"><button type="submit">4</button></li>
            <li class="product__pagination__link"><button type="submit"><i
                        class="fas fa-angle-double-right"></i></button>
            </li>
        </ul>
    </div>
    <!-- End  product area -->

</section>