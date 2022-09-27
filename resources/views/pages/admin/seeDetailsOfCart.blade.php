@extends("layouts/template")
@section("mainContent")
<div class="container"> 
    <h2 class="cursive-font primary-color regH">Details of cart</h2>
    <div class="container table-responsive table1A">   
        <table class="table">
            <thead>
            <tr>
                <th class="colorFont">Number of item</th>
                <th class="colorFont">Name</th>
                <th class="colorFont">Price</th>
                <th class="colorFont">Quantity</th>
            </tr>
            </thead>
            <tbody id="tableUser">
                @foreach($cartItems as $cartItem)
                    <tr>     
                        <td>#{{$loop->iteration}}</td>
                        @foreach($allProducts as $product)
                            @if($product->idProizvoda == $cartItem->item_id)
                                <td>{{$product->Naziv}}</td>
                                @break;
                            @endif
                        @endforeach
                        <td>{{$cartItem->price}}</td>
                        <td>{{$cartItem->quantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="backToAdmin">
            <a href="{{ url("/admin") }}" name="backPage" class="btn btn-primary btn-block backToAdmin">Back to Admin panel</a>
        </div>
    </div>
    
</div>  

@endsection
@section('headerContent')
<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
    <h1 class="cursive-font">Admin Panel</h1>	
</div>	
@endsection
@section('velicina')
sm
@endsection
@section('headerPicture')
url({{asset('images/img_bg_6.jpg')}}
@endsection