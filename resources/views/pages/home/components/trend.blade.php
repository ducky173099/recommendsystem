<div class="instagram">
    <div class="container-fluid">
        <div class="section-title">
            <h4>Hot Trend</h4>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($product_top_view as $key => $item)
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="{{asset('public/uploads/product/'.$item->product_image.'')}}">
                            <div class="instagram__text">
                                <a href="#">{{number_format($item->price,0,',','.')}} Đ</a>
                                <a href="{{route('product_detail', ['product_slug' => $item->product_slug])}}">{{$item->productname}}
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>