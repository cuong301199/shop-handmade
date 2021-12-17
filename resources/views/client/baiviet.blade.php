@extends('client.template.master')
@section('content')
    <style>
        .btn-comment {
            margin-top: 10px;

        }

        .input-comment {
            border: 1px solid rgb(221, 209, 209)
        }
        .related_blog_post{
            margin-left: 0px
        }
        img{
            padding: 0px;
        }

    </style>
    {{-- {{ dd($post) }} --}}

    <div class="page_title_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="page_title">
                        <h1>Bài Viết</h1>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="bredcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Men's</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content margin-bottom-70px">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="blog_content">
                        <article class="single_blog_post">
                            <a href="#"><img class="img-responsive" src="{{ asset($post->hinhanh_bv) }}" alt="" /></a>
                            <a href="#">
                                <h3 class="post_title">{{ $post->tieude_bv }}</h3>
                            </a>

                            <h4><span class="date"><a href="#">Ngày đăng : {{ $post->created_at }}</a></span> |
                                <span class="author"><a href="#">{{ $post->ten_nd }}</a></span> | in <span
                                    class="category"><a href="#">clothes</a></span></h4>

                            <blockquote>"{!! $post->tomtat_bv !!}"</blockquote>

                            <p>{!! $post->noidung_bv !!}</p>

                            <div class="post_metas">
                                <div class="post_tags">
                                    <span>Tage</span>
                                    <ul>
                                        <li><a href="#">Cloths</a></li>
                                        <li><a href="#">Store</a></li>
                                        <li><a href="#">Kids</a></li>
                                    </ul>
                                </div> <!-- end of post_tags -->
                                <div class="social_shares">
                                    <span>Share</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus "></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p "></i></a></li>
                                    </ul>
                                </div> <!-- end of social_shares -->
                            </div> <!-- end of post meta -->
                            <div class="clear-fix"></div>
                        </article> <!-- end of single_blog_post -->
                        {{-- <div class="media this_post_author">
                            <div class="media-left">
                                <a href="#"><img class="media-object"
                                        src="{{ asset('template-client') }}/img/blog/author.jpg" alt="" /></a>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Jonathan Doe <span>CEO of <a href="#">Marketing Shop
                                            Agency</a></span></h3>
                                <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                                    sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                    consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                    magna aliquyam erat, sed diam voluptua.</p>
                            </div>
                        </div> <!-- end of this_post_author --> --}}
                        <!-- related blog post -->
                        {{-- <div class="related_blog_post">
                            <h2 class="related_post_title"><span>related blog posts</span></h2>
                            <article
                                class="standard_blog_post col-md-6 col-sm-6 col-xs-12 no-padding-right no-padding-left">
                                <a href="#">
                                    <img class="img-responsive"
                                        src="{{ asset('template-client') }}/img/blog/blog_archive1.jpg" alt="" />
                                </a>
                                <a href="#">
                                    <h3 class="post_title">Awesome Suits for Men</h3>
                                </a>

                                <h4>
                                    <span class="date">
                                        <a href="#">April 14,2015</a>
                                    </span> |
                                    <span class="author">
                                        <a href="#">Jonah Doe</a>
                                    </span> | in
                                    <span class="category">
                                        <a href="#">clothes</a>
                                    </span>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

                                <a class="read_more" href="#">
                                    <span class="blog-icon arrow_right"></span>
                                </a>
                            </article> <!-- end of standard_blog_post -->

                            <article
                                class="standard_blog_post col-md-6 col-sm-6 col-xs-12 no-padding-right no-padding-left">
                                <a href="#">
                                    <img class="img-responsive"
                                        src="{{ asset('template-client') }}/img/blog/blog_archive2.jpg" alt="" />
                                </a>

                                <a href="#">
                                    <h3 class="post_title">Awesome Suits for Men</h3>
                                </a>

                                <h4>
                                    <span class="date"><a href="#">April 14,2015</a></span> | <span
                                        class="author"><a href="#">Jonah Doe</a></span> | in <span
                                        class="category"><a href="#">clothes</a></span>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                <a class="read_more pull-right" href="#"><span class="blog-icon arrow_right"></span></a>
                            </article> <!-- end of standard_blog_post -->

                            <div class="clear-fix"></div>
                        </div> <!-- end of related blog post --> --}}

                        <!-- post_comments -->
                        <div class="post_comments">
                            <h2 class="comment_title"><span>4 comments</span></h2>
                            <ul class="media-list">
                                @if (Auth::guard('nguoi_dung')->check())
                                <?php
                                    $id_nd= Auth::guard('nguoi_dung')->user()->id;
                                    $user= DB::table('nguoi_dung')->where('id',$id_nd)->first();
                                ?>
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img width="100px" height="90px" class="media-object "
                                            src="{{ asset('template-client') }}/img/avatar1.png" alt="" />
                                            {{-- {{ asset('template-client') }}/img/blog/comment1.png --}}
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">{{ $user->ten_nd }}</a></h4>
                                        <input class="input-comment" type="text" placeholder="Viết bình luận của bạn">
                                        <button type="submit" class="btn btn-comment" id="btn-comment">Bình luận</button>
                                        <div class="success-comment"></div>
                                    </div> <!-- end of media-body -->
                                </li> <!-- end of media -->
                                @endif
                                <div class="media-comment">
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
					<div class="sidebar">
						<div class="sidebar_widget">
							<h3 class="widget_title">Bài viết mới</h3>
							<div class="recent_post">
								<div class="media single_recent_post">
									<a class="pull-left" href="#"><img class="media-object img-responsive" src="{{ asset('template-client') }}/img/recent_post1.jpg" alt="" /></a>
									<div class="media-body">
										<a href="#"><h3 class="media-heading">Cách làm thiệp mừng sinh nhật</h3></a>
										<h4>Đăng bởi <span><a href="#"> Tiến Cường</a></span></h4>
									</div>
								</div>
								<div class="media single_recent_post">
									<a class="pull-left" href="#"><img class="media-object img-responsive" src="{{ asset('template-client') }}/img/recent_post2.jpg" alt="" /></a>
									<div class="media-body">
										<a href="#"><h3 class="media-heading">Bảo quản đồ da</h3></a>
										<h4>Đăng bởi <span><a href="#"> Tiến Cường</a></span></h4>
									</div>
								</div>
								<div class="media single_recent_post">
									<a class="pull-left" href="#"><img class="media-object img-responsive" src="{{ asset('template-client') }}/img/recent_post3.jpg" alt="" /></a>
									<div class="media-body">
										<a href="#"><h3 class="media-heading">Làm gấu nhồi bông</h3></a>
										<h4>Đăng bởi <span><a href="#"> Tiến Cường</a></span></h4>
									</div>
								</div>
							</div>
						</div> <!-- end of sidebar_widget -->

					</div> <!-- end of sidebar -->
				</div>
            </div>
        </div>
    </div>
    <input class="id_bv" type="" name="" value="{{ $post->id }}">

    @push('Add-list-cart')
        <script>
            $(document).ready(function() {
                const BASE_URL = window.location.origin //lấy base url
                var id_bv = $('.id_bv').val();
                load_comment();

                function load_comment() {
                    $.ajax({
                        type: "get",
                        url: "/client/load-comment/" + id_bv,
                        dataType: "json",
                        success: function(response) {
                            console.log(response)
                            for (let i = 0; i < response.length; i++) {
                           $('.media-comment').append('<li class="media">'+
                           '<a class="pull-left" href="#">'+
                            // '<img class="media-object" src="{{ asset('+response[i].anhdaidien_nd+') }}" alt="" />'+
                            '<img width="100px" height="90px" class="media-object" src="http://127.0.0.1:8000/'+response[i].anhdaidien_nd+'" alt="" />'+

                           '</a>'+
                           '<div class="media-body">'+
                           '<h4 class="media-heading"><a href="#">'+response[i].ten_nd+'</a><span>'+response[i].created_at+'</span></h4>'+
                           '<p>'+response[i].noidung_bl+'</p>'+
                            '@if (Auth::guard('nguoi_dung')->check())'+
                                '<div class="media">'+
                                '<a class="pull-left" href="#">'+
                                '<img width="100px" height="90px" class="media-object" src="{{ asset('template-client') }}/img/avatar1.png" alt="" />'+
                                '</a>'+
                                '<div class="media-body">'+
                                '<h4 class="media-heading"><a href="#">{{ $user->ten_nd }}</a> <span>April 20,2015  at 03:23</span></h4>'+
                                '<input class="input_comment" type="text" placeholder="Viết phản hồi của bạn">'+
                                '<button type="submit" class="btn btn_comment" id="btn-comment" >Phản hồi</button>'+
                                '</div>'+
                                '</div>'+
                            '@endif'+
                           '</div>'+
                           '</li>')
                            }
                        }
                    });


                }
                $('.btn-comment').click(function (e) {
                    e.preventDefault();
                     $('.media-comment').empty()
                      $('.success-comment').removeAttr("style")
                    var noidung_bl = $('.input-comment').val();
                    var id_bv = $('.id_bv').val();
                    $.ajax({
                        type: "get",
                        url: "/client/comment/" + id_bv,
                        data: {
                            noidung_bl  : noidung_bl ,
                        },
                        dataType: "json",
                        success: function (response) {
                        }
                    });
                    $('.success-comment').html('<span style="color:#45e312;">Thêm bình luận thành công</span>')
                    $('.input-comment').val('')
                    $('.success-comment').fadeOut(5000)
                    load_comment()



                });



            });
        </script>
    @endpush
@endsection
{{-- <div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="{{ asset('template-client') }}/img/blog/comment4.png" alt="" />
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="#">Nicole Sperus</a> <span>April 20,2015  at 03:23</span></h4>
        <p>Sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <a href="#">REPLY</a>
    </div> <!-- end of media-body -->
</div> --}}



{{-- $('.media-comment').append('<li class="media" >'
    '<a class="pull-left" href="#">'
    '<img class="media-object" src="{{ asset('template-client') }}/img/blog/comment3.png" alt="" />'
    '</a>'
    '<div class="media-body">'
    '<h4 class="media-heading"><a href="#">Kevin Harting</a> <span>April 18,2015  at 12:07</span></h4>'
    '<p>Ut wisi enim ad minim veniam, </p>'
    '<a href="#">REPLY</a>'
    ' <div class="media">'
    '<a class="pull-left" href="#">'
    '<img class="media-object" src="{{ asset('template-client') }}/img/blog/comment4.png" alt="" />'
    '</a>'
    '<div class="media-body">'
    '<h4 class="media-heading"><a href="#">Nicole Sperus</a> <span>April 20,2015  at 03:23</span></h4>'
    '<input class="input_comment" type="text" placeholder="Viết phản hồi của bạn">'
    '<button type="submit" class="btn btn_comment" id="btn-comment" >Phản hồi</button>'

    '</div>'
    '</div>'
    '</div>'
    '</div>'); --}}


