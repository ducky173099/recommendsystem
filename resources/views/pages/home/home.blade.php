

@extends('layouts.page_master')

@section('content')
<section>
    @include('pages.components.slider')

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        @include('pages.home.components.property__gallery')
        @include('pages.home.components.trend')
    </div>
</section>
<!-- Product Section End -->
</section>
@stop