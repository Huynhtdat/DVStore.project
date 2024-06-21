@extends('layouts.user.main-client')
@section('content-client')
    <style>
   .product_options {
    display: flex;
    align-items: center;
    gap: 20px; /* Space between the elements */
    }

    .product_options .sidebar_widget,
    .product_options .product_d_size,
    .product_options .product_stock {
        margin-bottom: 0; /* Remove bottom margin */
    }

    .product_options select {
        width: 100px; /* Adjust width as needed */
        padding: 5px; /* Adjust padding as needed */
        font-size: 14px; /* Adjust font size as needed */
    }

    /* Font styling for labels */
    .product_options .sidebar_widget label,
    .product_options .product_d_size label,
    .product_options .product_stock p {
        font-family: Arial, sans-serif; /* Change to desired font family */
        font-size: 16px; /* Change to desired font size */
        font-weight: bold; /* Change to desired font weight */
        color: #333; /* Change to desired font color */
    }

    </style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('user.home')}}">Home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                        <li>Product Detail</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product wrapper start-->
<div class="product_details">
    <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product_tab fix">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="{{ asset("asset/client/images/products/small/$product->img") }}" alt=""></a>
                            </li>
                            @foreach ($productImage as $key => $image)
                            <li>
                                <a data-toggle="tab" href="#p_tab{{ $key + 2 }}" role="tab" aria-controls="p_tab{{ $key + 2 }}" aria-selected="false"><img src="{{ asset("asset/client/images/products/small/$image->img") }}" alt=""></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content produc_tab_c">
                        <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ asset("asset/client/images/products/small/$product->img") }}" alt=""></a>
                                <div class="view_img">
                                    <a class="large_view" href="{{ asset("asset/client/images/products/small/$product->img") }}"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        @foreach ($productImage as $key => $image)
                        <div class="tab-pane fade" id="p_tab{{ $key + 2 }}" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ asset("asset/client/images/products/small/$image->img") }}" alt=""></a>
                                <div class="img_icone"></div>
                                <div class="view_img">
                                    <a class="large_view" href="{{ asset("asset/client/images/products/small/$image->img") }}"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <h1>{{ $product->name }}</h1>
                     <div class="avg-star">
                        <ul>
                            @for($i = 1; $i <= floor($avgRating); $i++)
                              <i class="fa fa-star"></i>
                            @endfor
                            @if (! is_int($avgRating))
                              <i class="fa fa-star-half-alt"></i>
                            @endif

                            <li><a href="#"> Da ban: {{ $productSold->sum ?? 0}} </a></li>
                        </ul>
                    </div>
                    <div class="product_desc">
                        <p>{!!$product->description!!}</p>
                    </div>

                    <div class="content_price mb-15">
                        <span>{{$product->price_sell}} VND</span>
                        {{-- <span class="old-price">{{}}</span> --}}
                    </div>
                    <div class="box_quantity mb-20">
                        <form action="#">
                            <label>quantity</label>
                            <input min="0" max="100" value="1" type="number">
                        </form>
                        <button type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        <a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                    </div>

                    <div class="product_options">
                        <div class="sidebar_widget color">
                            <label>Choose Color</label>
                            <select id="data-color">
                                @foreach ($productColor as $color)
                                    <option value="{{ $color->id }}">
                                        {{ $color->color_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="product_d_size">
                            <label for="group_1">Size</label>
                            <select id="data-size" data-sizes="{{ json_encode($productSize) }}" name="group_1">
                                {{-- {{ json_encode($productSize) }} --}}
                            </select>
                        </div>

                        <div class="product_stock">
                            <p>Remaining Quantity: <span id="quantity_remain">0</span> items</p>
                        </div>
                    </div>


                    <div class="wishlist-share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
</div>
<!--product details end-->

<!--product info start-->
                        <div class="product_d_info">
                            <div class="row">
                                <div class="col-12">
                                    <div class="product_d_inner">
                                        <div class="product_info_button">
                                            <ul class="nav" role="tablist">
                                                <li>
                                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                                </li>
                                                <li>
                                                     <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Data sheet</a>
                                                </li>
                                                <li>
                                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                                <div class="product_info_content">
                                                    <p>{!!$product->description!!}</p>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                                <div class="product_d_table">
                                                   <form action="#">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="first_child">Name</td>
                                                                    <td>{{ $product->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="first_child">Color</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="first_child">Size</td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                @if (count($productReviews) > 0)
                                                @foreach ($productReviews as $productReview)
                                                    <div class="product_info_inner">
                                                        <div class="product_ratting mb-10">
                                                            <ul>
                                                                <x-stars number="{{ $productReview->rating }}"/>
                                                            </ul>
                                                            <strong></strong>
                                                            <p>{{ $productReview->created_at }}</p>
                                                        </div>
                                                        <div class="product_demo">
                                                            <strong>{{ $productReview->user_name }}</strong>
                                                            <p>{{ $productReview->content }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @else
                                                <p class="text-center review-comment-null">Chưa có đánh giá nào</p>
                                                @endif
                                                {{-- <div class="product_review_form">
                                                    <form action="#">
                                                        <h2>Add a review </h2>
                                                        <p>Your email address will not be published. Required fields are marked </p>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="review_comment">Your review </label>
                                                                <textarea name="comment" id="review_comment"></textarea>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="author">Name</label>
                                                                <input id="author" type="text">

                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <label for="email">Email </label>
                                                                <input id="email" type="text">
                                                            </div>
                                                        </div>
                                                        <button type="submit">Submit</button>
                                                     </form>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--product info end-->

                        <!--new product area start-->
                        <div class="new_product_area product_page">
                            <div class="row">
                                <div class="col-12">
                                    <div class="block_title">
                                    <h3> Related Product </h3>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="single_p_active owl-carousel">
                                    <div class="col-lg-3">
                                        @foreach ($relatedProducts as $relatedProduct)
                                        <div class="single_product">
                                            <div class="product_thumb">
                                               <a href="single-product.html"><img src="{{ asset("asset/client/images/products/small/$relatedProduct->img") }}" alt=""></a>
                                               <div class="img_icone">
                                                   <img src="" alt="">
                                               </div>
                                               <div class="product_action">
                                                   <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                               </div>
                                            </div>
                                            <div class="product_content">
                                                <span class="product_price">{{ format_number_to_money($relatedProduct->price_sell) }} VNĐ</span>
                                                <h3 class="product_title"><a href="{{ route('user.products_detail', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a></h3>
                                            </div>
                                            <div class="product_info">
                                                <ul>
                                                    <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modal_box" title="">View Detail</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--new product area start-->


@vite(['resources/client/js/product-detail.js',
'resources/client/css/product-review.css'])

@endsection
