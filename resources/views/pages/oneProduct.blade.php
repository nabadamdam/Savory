@extends("layouts/template")

@section("mainContent")
<div class="gtco-container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0 text-left">
            <div class="row row-mt-15em" id="marginOneProd">
                <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                    <img src="{{asset(''.$oneProducts->SlikaSrc)}}" alt="<?=$oneProducts->SlikaAlt?>" id="border" class="img-responsive">
                </div>
                <div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
                    <div class="form-wrap">
                        <div class="tab">
                            <div class="tab-content">
                                <div class="tab-content-inner active" data-content="signup">
                                    <h2 class="cursive-font" id="titleOneProd">Information of product</h2>
                                    <div class="fh5co-text">
                                        <h4><?=$oneProducts->Naziv?></h4>
                                        <p><?=$oneProducts->Opis?></p>
                                        <p><span class="price cursive-font" id="colorPriceOneProd">$<?=$oneProducts->Cena?></span></p>
                                        @if(session('user')[0]->idUloga != 1)
                                            @if($oneProducts->Kolicina >= 1)
                                                <p id="colorPriceOneProd">The maximum quantity of this specialty is <b><?=$oneProducts->Kolicina?></b> !</p>
                                                <div class="priceAndQuantity">
                                                    <button type="button" class="btn btn-primary add-to-cart" data-id="{{$oneProducts->idProizvoda}}">Add to cart</button>
                                                    <input type="number" value="1" id="quantityToAdd" name="quantityToAdd" max="{{$oneProducts->Kolicina}}" min="1" class="form-control" onkeyup="if(this.value > <?=$oneProducts->Kolicina?> || this.value < 1) this.value = null;" />
                                                </div>
                                            @else
                                                <p id="colorPriceOneProd">We don't have this specialty at the moment, it will be back soon</p>
                                            @endif
                                        @endif
                                        <a href="{{ url("/menu") }}" name="backPage" class="btn btn-primary btn-block">Back to Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('headerContent')
<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
	<h1 class="cursive-font">Taste all our menu!</h1>
</div>
@endsection

@section('velicina')
sm
@endsection
@section('headerPicture')
url({{asset('images/img_bg_1.jpg')}}
@endsection