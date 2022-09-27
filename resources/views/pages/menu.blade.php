@extends("layouts/template")

@section("mainContent")
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font primary-color">Popular Dishes</h2>
					<p>Here you can see some pictures of our specialities, fresh of the owen!</p>
				</div>
			</div>
			<div class="container containerSt">
				<form action="/menu/search" method="POST" role="search">
					{{ csrf_field() }}
					<div class="input-group">
						<input type="text" class="form-control" name="q"
							placeholder="Search users"> <span class="input-group-btn">
							<button type="submit" class="btn btn-default styleClass">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</form>
			</div>
			</br>
			</br>
			<div class="row" id="productSearch">
				@foreach($products as $product)
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="{{ url("/oneProduct/$product->idProizvoda") }}" class="fh5co-card-item">
							<figure>
								<img src="{{asset(''.$product->SlikaSrc)}}" alt="{{ $product->SlikaAlt }}" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>{{ $product->Naziv }}</h2>
								<p>{{ $product->Opis }}</p>
								<p><span class="price cursive-font">${{ $product->Cena }}</span></p>
							</div>
						</a>
					</div>
				@endforeach

			</div>
			{{$products->links()}}
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
<style>
	.pagination {
    	max-width: 100%!important;
		display: flex!important;
    	justify-content: center;
	}

</style>