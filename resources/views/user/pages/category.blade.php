@extends('user.master')
@section('content')
 <section id="product">
    <div class="container">
     <!--  breadcrumb -->
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Category</li>
      </ul>
      <div class="row">
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
              @foreach ($menu_cate as $item_cate)
                <li>
                    <a href="{!! url('loai-san-pham',[$item_cate->id,$item_cate->alias]) !!}">{!! $item_cate->name !!}</a>
                </li>
              @endforeach
            </ul>
          </div>
         <!--  Best Seller -->
          <div class="sidewidt">
            <h2 class="heading2"><span>Best Seller</span></h2>
            <ul class="bestseller">
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Women Accessories</span>
                <span class="price">$250</span>
              </li>
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Electronics</span>
                <span class="price">$250</span>
              </li>
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Electronics</span>
                <span class="price">$250</span>
              </li>
            </ul>
          </div>
          <!-- Latest Product -->
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
            @foreach ($lasted_product as $item_lasted_product)
              <li>
                <img width="50" height="50" src="{{ asset('resources/upload/'.$item_lasted_product->image) }}" alt="product" title="product">
                <a class="productname" href="{!! url('chi-tiet-san-pham',[$item_lasted_product->id,$item_lasted_product->alias]) !!}">{!! $item_lasted_product->name !!}</a>
                <span class="procategory">{{ $name_cate->name }}</span>
                <span class="price">{!! number_format($item_lasted_product->price ,0,',','.')!!}</span>
              </li>
            @endforeach
            </ul>
          </div>
          <!--  Must have -->
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
          <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 800%; transition-duration: 0s; transform: translate3d(-540px, 0px, 0px);"><li class="clone" style="width: 270px; float: left; display: block;">
                <img src="img/product2.jpg" alt="">
              </li>
              <li class="" style="width: 270px; float: left; display: block;">
                <img src="img/product1.jpg" alt="">
              </li>
              <li class="flex-active-slide" style="width: 270px; float: left; display: block;">
                <img src="img/product2.jpg" alt="">
              </li>
            <li class="clone" style="width: 270px; float: left; display: block;">
                <img src="img/product1.jpg" alt="">
              </li></ul></div><ol class="flex-control-nav flex-control-paging"><li><a class="">1</a></li><li><a class="flex-active">2</a></li></ol><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul></div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                    @foreach ($product_cate as $item_product_cate)
                       <li class="span3">
                          <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item_product_cate->id,$item_product_cate->alias]) !!}">{!! $item_product_cate->name !!}</a>
                          <div class="thumbnail">
                            <span class="sale tooltip-test" data-original-title="">Sale</span>
                            <a href="{!! url('chi-tiet-san-pham',[$item_product_cate->id,$item_product_cate->alias]) !!}"><img alt="" src="{{ asset('resources/upload/'.$item_product_cate->image) }}"></a>
                            <div class="pricetag">
                              <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                              <div class="price">
                                <div class="pricenew">{!! number_format($item_product_cate->price,0,',','.') !!}</div>
                                <div class="priceold">giá cũ</div>
                              </div>
                            </div>
                          </div>
                        </li>
                    @endforeach
                  </ul>

                  <div class="pagination pull-right">
                    <ul>
                        @if ($product_cate->currentPage() != 1)
                            <li><a href="{!! str_replace('/?', '?', $product_cate->url($product_cate->currentPage() - 1)) !!}">Prev</a>
                          </li>
                        @endif
                        @for ($i = 1; $i < $product_cate->lastPage() ; $i++)
                            <li class="{!! ($product_cate->currentPage() == $i) ? 'active' : '' !!}">
                                <a href="{!! str_replace('/?', '?', $product_cate->url($i)) !!}">{!! $i !!}</a>
                            </li>
                        @endfor
                        @if ($product_cate->currentPage()!= $product_cate->lastPage())
                          <li><a href="{!! str_replace('/?', '?', $product_cate->url($product_cate->currentPage() + 1)) !!}">Next</a></li>
                       @endif
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>

@endsection