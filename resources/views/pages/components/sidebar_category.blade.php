<div class="sidebar__categories">
    <div class="section-title">
        <h4>Categories</h4>
    </div>
    <div class="categories__accordion">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <ul>
                    @foreach ($categoy_products as $key => $item)
                        <li>
                            <a style="color: black !important;" href="{{route('product_by_category',['slug' => $item->slug])}}">{{$item->category_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>