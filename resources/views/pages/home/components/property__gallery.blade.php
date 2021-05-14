<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
    
        </div>
        <div class="row property__gallery">
            <?php
                $customer_id = Session::get('customer_id');
                // echo 'ccccccccccccccccc'.$customer_id;
            ?>
            @foreach ($get_product_new as $key => $item)
                {{-- @foreach ($recommendation as $product_id => $rating)
                    @if ($item->id === $product_id) --}}
                        <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('public/uploads/product/'.$item->product_image.'')}}">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="/public/uploads/product/{{$item->product_image}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="{{route('product_detail', ['product_slug' => $item->product_slug])}}"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6 class="overflow_hidden_text"><a href="#">{{$item->productname}}</a></h6>
                                    
                                    <div class="product__price">{{number_format($item->price,0,',','.')}}</div>
                                </div>
                            </div>
                        </div>
                    {{-- @endif
                @endforeach --}}
            @endforeach
           
        </div>
    </div>
</section>