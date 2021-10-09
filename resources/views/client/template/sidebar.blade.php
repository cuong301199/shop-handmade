<<?php
    $danhmuc = DB::table('danh_muc')->get();
    $loaisanpham = DB::table('loai_san_pham')->get();
?>
            <div class="col-md-3 col-md-pull-9 col-sm-12">
                <div class="side-bar">
                    <div class="sidebar-list widget">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach ($danhmuc as $item)
                            <li><a data-id="{{ $item->id }}" href="{{ route('sanpham.danhmuc', ['id'=>$item->id]) }}" class="triangle">{{ $item->ten_dm }}<span>(8)</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="checkboxes widget">
                        <h4> Select a brand</h4>
                        <ul>
                            {{-- <li>
                                <input type="checkbox" name="aberrombie" id="aberrombie" class="css-checkbox" />
                                <label for="aberrombie" class="css-label">Aberrombie</label>
                            </li> --}}
                            @foreach ($danhmuc as $item)
                            <li><a href="" class="triangle">{{ $item->ten_dm }}<span>(8)</span></a></li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="slider-range widget">
                        <h4>Refine a price</h4>
                        <div id="slider-range"></div>
                        <div class="values">
                            <input type="text" class="minamount" /> <span class="filter-gap"> - </span>
                            <input type="text" class="maxamount" />
                            <input type="submit" value="Filter" name="filter" />
                        </div>
                    </div>

                    <div class="size widget">
                        <h4> Choose a size </h4>
                        <ul>
                            <li><a href="#">XS</a></li>
                            <li><a href="#">S</a></li>
                            <li><a class="active" href="#">M</a></li>
                            <li><a href="#">L</a></li>
                            <li><a href="#">XL</a></li>
                        </ul>
                    </div>

                    <div class="item-color  widget">
                        <h4>sort by colour</h4>
                        <ul>
                            <li class="color1 active"></li>
                            <li class="color2"></li>
                            <li class="color3"></li>
                            <li class="color4"></li>
                            <li class="color5"></li>
                            <li class="color6"></li>
                            <li class="color7"></li>
                            <li class="color8"></li>
                            <li class="color9"></li>
                            <li class="color10"></li>
                        </ul>
                    </div>
                    <div class="popular-products widget">
                        <h4>Popular Products</h4>
                        <div class="product-single">
                            <div class="product-img">
                                <img class="img-responsive" alt="Single product" src="img/single_1.jpg">
                            </div>
                            <div class="product-info">
                                <h2>New Look Stripe Shirt</h2>
                                <div class="star-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-full"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del> $50 </del> $40
                                </div>
                            </div>
                        </div>

                        <div class="product-single">
                            <div class="product-img">
                                <img class="img-responsive" alt="Single product" src="img/single_1.jpg">
                            </div>
                            <div class="product-info">
                                <h2>New Look Stripe Shirt</h2>
                                <div class="star-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-full"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del> $50 </del> $40
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
