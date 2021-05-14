<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach ($categoy_products as $key => $cateItem)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="">{{$cateItem->category_name}}</a></h4>
                    </div>
                </div>
            @endforeach
        </div><!--/products-->

    
    </div>
</div>