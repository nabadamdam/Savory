@extends("layouts/template")
@section("mainContent")
<div class="container"> 
    <h2 class="cursive-font primary-color regH">Update Product</h2>
    <form action="{{url('/admin/updateProduct')}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    @foreach($products as $product)
        <div class="row form-group">
            <div class="col-md-12">
                <input type="hidden" value="{{$product->idProizvoda}}" name="idProd" class="form-control"/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Name</label>
                <input type="text" value="{{$product->Naziv}}" name="name" class="form-control"/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">PathPicture</label>
                <input type="file" name="picsrc" id="picsrc" class="form-control" value="nesto"/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">AlterName</label>
                <input type="text" value="{{$product->SlikaAlt}}" name="picAlt" class="form-control"/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Description</label>
                <input type="text" value="{{$product->Opis}}" name="desc" class="form-control"/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Price</label>
                <input type="text" value="{{$product->Cena}}" name="price" class="form-control"/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <input type="submit" name="update" class="btn btn-primary btn-block" value="Update"/>
            </div>
        </div>
        @endforeach
    </form>	
    @if(session()->has('messageProductUpdate'))
        {{ session('messageProductUpdate') }}
    @endif
    @if(session()->has('error'))
        {{ session('error') }}
    @endif
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
