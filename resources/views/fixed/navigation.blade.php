<nav class="gtco-nav" id="darkCartNavigation" role="navigation">
	<div class="gtco-container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div id="gtco-logo"><a href="{{url('/')}}">Savory <em>.</em></a></div>
			</div>
			<div class="col-xs-8 text-right menu-1">
				<ul>
					@foreach($links as $link)
						@if(session()->has("user"))
							@if(session('user')[0]->idUloga == 1)
								@if($link->naziv == "Contact&Registration" || $link->naziv == "Contact" || $link->naziv == "Cart" || $link->naziv == "Author" || $link->naziv == "Services")
									@continue
								@else
									<li><a href="{{ url("$link->href") }}">{{$link->naziv}}</a></li>
								@endif
							@endif
							@if(session('user')[0]->idUloga != 1)
								@if($link->naziv == "Admin" || $link->naziv == "Contact&Registration")
									@continue
								@else
									<li><a href="{{ url("$link->href") }}">{{$link->naziv}}</a></li>
								@endif
							@endif
						@endif
						@if(!session()->has("user"))
							@if($link->naziv == "Admin" || $link->naziv == "Logout" || $link->naziv == "Contact" || $link->naziv == "Cart" || $link->naziv == "Menu")
								@continue
							@else
								<li><a href="{{ url("$link->href") }}">{{$link->naziv}}</a></li>
							@endif
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</nav>
