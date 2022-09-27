@extends("layouts/template")
@section("mainContent")
<div class="container table-responsive table1A tabela1Top">   
    <h2 class="cursive-font primary-color regH">Delete&Update Products</h2>  
    <table class="table">
        <thead>
        <tr>
            <th class="colorFont">Name</th>
            <th class="colorFont">AlterName</th>
            <th class="colorFont">Description</th>
            <th class="colorFont">Price</th>
        </tr>
        </thead>
        <tbody id="tableProduct">
            @foreach($products as $product)
                <tr>
                    <td>{{$product->Naziv}}</td>
                    <td>{{$product->SlikaAlt}}</td>
                    <td>{{$product->Opis}}</td>
                    <td>{{$product->Cena}}</td>
                    <td><input type="button" class="buttonProdDelete btn btn-light" data-id="{{$product->idProizvoda}}" value="Delete"/></td>
                    <td><a href="{{url('/admin/editProduct/'.$product->idProizvoda)}}" class="btn btn-light">Update</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if(session()->has('messageProductUpdate'))
        {{ session('messageProductUpdate') }}
    @endif
    @if(session()->has('error'))
        {{ session('error') }}
    @endif
</div>
<div class="container table-responsive table1A">   
    <h2 class="cursive-font primary-color regH">Delete&Update Users</h2>  
    <table class="table">
        <thead>
        <tr>
            <th class="colorFont">Name</th>
            <th class="colorFont">Surename</th>
            <th class="colorFont">Email</th>
            <th class="colorFont">Username</th>
            <th class="colorFont">Role</th>
        </tr>
        </thead>
        <tbody id="tableUser">
            @foreach($users as $user)
                <tr>     
                    <td>{{$user->Ime}}</td>
                    <td>{{$user->Prezime}}</td>
                    <td>{{$user->Email}}</td>
                    <td>{{$user->Username}}</td>
                    @if($user->idUloga == 1)
                        <td>Administrator</td>
                    @else   
                        <td>AutorizovaniKorisnik</td>
                    @endif
                    <td><input type="button" class="buttonUsrDelete btn btn-light" data-id="{{$user->idKorisnika}}" value="Delete"/></td>
                    <td><a href="{{url('/admin/editUser/'.$user->idKorisnika)}}" class="btn btn-light">Update</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container table-responsive table1A">   
    <h2 class="cursive-font primary-color regH">All Carts</h2>  
    <table class="table">
        <thead>
        <tr>
            <th class="colorFont">Email</th>
            <th class="colorFont">Total price</th>
            <th class="colorFont">Payment method</th>
            <th class="colorFont">Status</th>
        </tr>
        </thead>
        <tbody id="tableUser">
            @foreach($carts as $cart)
                <tr>     
                    <td>{{$cart->email}}</td>
                    <td>{{$cart->price}}</td>
                    <td>{{$cart->payment_method}}</td>
                    <td>{{$cart->status}}</td>
                    <td><a href="{{url('/admin/seeDetails/'.$cart->id)}}" class="btn btn-light">See details</a></td>
                    @if($cart->status == 'Succeeded')
                        <td><a href="{{url('/admin/setDelivered/'.$cart->id)}}" class="btn btn-light greenButton">Delivered</a></td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container"> 
    <h2 class="cursive-font primary-color regH">Insert Products</h2>
    <form action="{{url('/admin/insertProduct')}}" method="POST" enctype="multipart/form-data" onSubmit="return proveraPodatakaProduct();">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Name</label>
                <input type="text" name="name" id="nameProd" class="form-control"/>
                <span id="errorNameProd"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">PicturesSrc</label>
                <input type="file" name="picsrc" id="picsrc" class="form-control" placeholder="app/assets/images/primer.jpg"/>
                <span id="errorSrcProd"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">AlterName</label>
                <input type="text" name="picAlt" id="picAlt" class="form-control"/>
                <span id="errorAltProd"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Description</label>
                <input type="text" name="desc" id="desc" class="form-control"/>
                <span id="errorDescProd"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control"/>
                <span id="errorQuantity"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Price</label>
                <input type="text" name="price" id="price" class="form-control"/>
                <span id="errorPriceProd"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <input type="submit" name="insert" class="btn btn-primary btn-block" value="Insert"/>
            </div>
        </div>
    </form>	
    @if(session()->has('messageProduct'))
        {{ session('messageProduct') }}
    @endif
    @if(session()->has('error'))
        {{ session('error') }}
    @endif
</div>  
<div class="container table-responsive table1A table1B">   
    <h2 class="cursive-font primary-color regH">Contact</h2>  
    <table class="table">
        <thead>
        <tr>
            <th class="colorFont">Name</th>
            <th class="colorFont">Email</th>
            <th class="colorFont">Question</th>
            <th class="colorFont">Date</th>
        </tr>
        </thead>
        <tbody id="tableContact">
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->Ime}}</td>
                    <td>{{$contact->Email}}</td>
                    <td>{{$contact->Pitanje}}</td>
                    <td>{{$contact->Datum}}</td>
                    <td><input type="button" class="buttonContactDelete btn btn-light" data-id="{{$contact->idPitanja}}" value="Delete"/></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>  
<div class="container table-responsive table1A table1B">   
    <h2 class="cursive-font primary-color regH">Activity</h2>
    <span id="messageErrorDate"></span>  
    <input type="date" id="dateValue" class="form-control">
    <input type="button" class="buttonActivity btn btn-light" value="Filter activity"/></br></br>
    <table class="table">
        <thead>
        <tr>
            <th class="colorFont">Email</th>
            <th class="colorFont">Operation</th>
            <th class="colorFont">Date</th>
            <th class="colorFont">Time</th>
        </tr>
        </thead>
        <tbody id="tableContactActivity">
            @foreach($activitys as $activity)
                <tr>
                    <td>{{$activity->EmailKorisnika}}</td>
                    <td>{{$activity->Operacija}}</td>
                    <td>{{$activity->DatumOperacije}}</td>
                    <td>{{$activity->VremeOperacije}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>  
<div class="container table-responsive table1A table1B">   
    <h2 class="cursive-font primary-color regH">Subscribe</h2>  
    <table class="table">
        <thead>
        <tr>
            <th class="colorFont">Id</th>
            <th class="colorFont">Email</th>
        </tr>
        </thead>
        <tbody id="tableSubscribe">
            @foreach($subscribes as $subscribe)
                <tr>
                    <td>{{$subscribe->Email}}</td>
                    <td><input type="button" class="buttonSubscribeDelete btn btn-light" data-id="{{$subscribe->idSub}}" value="Delete"/></td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
