<div class="footer">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="subscribe-box box-border">
                    <h2>Subscribe to our newsletter</h2>
                    <form>
                        <input type="text" name="name" placeholder="enter your name">
                        <input type="email" name="email" placeholder="enter your email address">
                        <input type="submit" name="submit" value="Subscribe">
                    </form>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="box-el box-border box-border-small">
                    <div class="pull-left"><img class="img-responsive" alt="logo light" src="{{ asset('template-client') }}/img/logo-gray.png" /></div>
                    <h2>trendify fashion store</h2>
                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse.</p>
                </div>
            </div> --}}
        </div>
        <div class="seperator margin-bottom-50px"></div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="single-widget">
                    <h2>Hỗ trợ khách hàng </h2>
                    <p>Trung tâm trợ giúp</p>
                    <p>Quy chế quyền riêng tư</p>
                    <p>Liên hệ hỗ trợ</p>
                    <p>An toàn mua bán</p>
                    <p>Quy định cần biết</p>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <?php $danhmuc = DB::table('danh_muc')->get(); ?>
                <div class="single-widget">
                    <h2>Danh mục</h2>
                    <ul class="categories">
                        @foreach ($danhmuc as $danhsach )
                        <li><a href="#">{{ $danhsach->ten_dm }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="single-widget">
                    <h2>Popular Tags</h2>
                    <ul class="tags">
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Trends</a></li>
                        <li><a href="#">Clothes</a></li>
                        <li><a href="#">Store</a></li>
                        <li><a href="#">Kids</a></li>
                        <li><a href="#">Top</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">Dresses</a></li>
                    </ul>
                </div>
            </div> --}}
            <div class="col-md-3 col-sm-12 col-xs-12 pull-right" style="width:22% ;">
                <div class="single-widget">
                    <h2>Flickr Gallery</h2>
                    <ul class="flickr">
                        @foreach ($danhmuc as $item)
                        <li>
                            <a href="#"><img alt="flickr image" width="70px" height="70px" src="{{ asset($item->hinhanh_dm) }}"></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <ul class="social">
                <li><a href="#">facebook</a></li>
                <li><a href="#">twitter</a></li>
                <li><a href="#">pinterest</a></li>
                <li><a href="#">instagram</a></li>
                <li><a href="#">linked in</a></li>
                <li><a href="#">google+</a></li>
            </ul>
        </div> --}}
    </div>

    <div class="copyright">
        {{-- <p class="text-center">&copy; 2016 by Trendify - Fashion Template | All rights reserved</p> --}}
    </div>
</div>
