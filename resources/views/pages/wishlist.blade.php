@extends('layouts.app')
@section('content')

@include('layouts.menubar')

<!-- Cart -->

<div class="cart_section pt-4 mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Wishlist</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($wishlist as $list)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image pt-3">
                                        <img src="{{ asset($list->product->image_one) }}" style="height:100px;">
                                    </div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $list->product->product_name }}</div>
                                        </div>

                                        @if ($list->product->product_color == NULL)
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text">
                                                    {{ $list->product->product_color }}
                                                </div>
                                            </div>
                                        @endif

                                        @if ($list->product->product_size == NULL)    
                                        @else
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Size</div>
                                                <div class="cart_item_text">
                                                    {{ $list->product->product_size }}
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Action</div>
                                            <div class="cart_item_text">
                                                <a class="btn btn-sm btn-danger addcart" id="{{ $list->product_id }}" data-toggle="modal"
                                                    data-target="#cartModal" onclick="productView(this.id)">Add To Cart</a>
                                                {{-- <button class="product_cart_button addcart" id="{{ $list->id }}" data-toggle="modal"
                                                    data-target="#cartModal" onclick="productView(this.id)">Add to Cart</button>    --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart Add Modal -->
<div class="modal fade " id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 16rem;">
                            <img src="" class="card-img-top" id="pimage" style="height: 240px;">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="card-title" id="pname"></h5></span>
                            </li>
                            <li class="list-group-item">Product code: <span id="pcode"> </span></li>
                            <li class="list-group-item">Category: <span id="pcat"> </span></li>
                            <li class="list-group-item">SubCategory: <span id="psubcat"> </span></li>
                            <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
                            <li class="list-group-item">Stock: <span class="badge "
                                    style="background: green; color:white;">Available</span></li>
                        </ul>
                    </div>
                    <div class="col-md-4 ">
                        <form action="{{ route('insert.cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="form-group mr-4" id="colordiv">
                                <label for="">Color</label>
                                <select name="color" class="form-control pr-2">
                                </select>
                            </div>
                            <div class="form-group mr-4" id="sizediv">
                                <label for="exampleInputEmail1">Size</label>
                                <select name="size" class="form-control" id="size">
                                </select>
                            </div>
                            <div class="form-group mr-3">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="number" class="form-control" value="1" name="qty" pattern="[0-9]*" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ends -->


<script type="text/javascript">
    function productView(id){
        console.log(id);
        $.ajax({
            url: "{{  url('/cart/product/view/') }}/"+id,
            type:"GET",
            dataType:"json",
            success:function(data) {
                // alert('Done');
                $('#pname').text(data.product.product_name);
                $('#pimage').attr('src',data.product.image_one);
                $('#pcat').text(data.product.category_name);
                $('#psubcat').text(data.product.subcategory_name);
                $('#pbrand').text(data.product.brand_name);
                $('#pcode').text(data.product.product_code);
                $('#product_id').val(data.product.id);

                var d = $('select[name="size"]').empty();
                $.each(data.size, function(key, value){
                    $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                    if (data.size == "") {
                        $('#sizediv').hide();   
                    }
                    else{
                        $('#sizediv').show();
                    } 
                 });

                var d =$('select[name="color"]').empty();
                $.each(data.color, function(key, value){
                    $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                    if (data.color == "") {
                        $('#colordiv').hide();
                    }
                    else{
                        $('#colordiv').show();
                    }
                });
            }

        })
        
    }
</script>

@endsection