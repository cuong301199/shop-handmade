{{-- {{ dd($lsp) }} --}}

<style>
    *{
        margin: 0px;
        padding: 0px;
    }
    h3{
        font-weight: bold;
    }
    .info{
        width: auto;
        height: 200px;
        /* border: 1px solid; */
        margin-bottom: 20px;
        border: 1px hidden #706b6b;
         padding: 20px;
         border-radius: 6px;
         box-shadow: inset 0px 0px 5px rgb(117, 115, 115);
    }
    .info a{
        background-color: #fe9900;
        color: white;
        font-size: bold;
        border: 1px hidden #f8f7f7;
        padding: 0px 15px;
        border-radius: 20px;
        box-shadow: inset 0px 0px 5px rgb(117, 115, 115);
    }
</style>
            <div class="col-md-3 col-md-pull-9 col-sm-12 ">
                <div class="side-bar">
                    <div class="sidebar-list widget">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach ($danhmuc as $item )
                            <li><a data-id="" href="" class="triangle">{{ $item->ten_dm }}<span>(8)</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="checkboxes widget">
                        <h4>Chọn loại sản phẩm</h4>
                        <ul>
                            @foreach ($lsp as $item )
                            <li>
                                <li><a data-id="" href="" class="triangle">{{ $item->ten_lsp }}<span>(8)</span></a></li>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
