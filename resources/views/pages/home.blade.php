@extends("layouts/template")

@section("mainContent")
<div id="gtco-counter" class="gtco-section">
	<div class="gtco-container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
				<h2 class="cursive-font primary-color">Fun Facts</h2>
				<p>Our restaurant is the best place in city. Check our stats and fun facts!</p>
			</div>
		</div>

		<div class="row">
			
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="5" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Avg. Rating</span>

				</div>
			</div>
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="43" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Food Types</span>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="32" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Chef Cook</span>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="1985" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Year Started</span>

				</div>
			</div>
				
		</div>
	</div>
</div>
<div id="gtco-subscribe">
	<div class="gtco-container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
				<h2 class="cursive-font">Subscribe</h2>
				<p>Be the first to know about the news in restaurant.</p>
			</div>
		</div>
		@if(session()->has("user"))
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form action="{{url('/home/subscribe')}}" method="POST" onSubmit="return proveraSubscribe();" class="form-inline">
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<div class="col-md-6 col-sm-6" id="marginLeft">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" name="email" class="form-control" value="{{session('user')[0]->Email}}" id="emailSub" placeholder="Your Email"  readonly="readonly"/>
								<span id="errorEmail3"></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" name="buttonSub" id="buttonSub" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		@else
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form action="{{url('/home/subscribe')}}" method="POST" onSubmit="return proveraSubscribe();" class="form-inline">
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<div class="col-md-6 col-sm-6" id="marginLeft">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" name="email" class="form-control" id="emailSub" placeholder="Your Email">
								<span id="errorEmail3"></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" name="buttonSub" id="buttonSub" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		@endif
	</div>
</div>
@endsection
@section('headerContent')
@if(session()->has("user"))
<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
	<h1 class="centerDiv cursive-font">All in good taste!</h1>	
</div>
@endif
@if(!session()->has("user"))
<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
	<h1 class="cursive-font">All in good taste!</h1>	
</div>
<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
	<div class="form-wrap">
		<div class="tab" id="textLeft">
			<div class="tab-content">
				<div class="tab-content-inner active" id="formLogIn" data-content="signup">
					<h3 class="cursive-font">Log in</h3>
					<form action="{{url('/login')}}" method="POST" onSubmit="return proveraPodatakaLogIn();">
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Email</label>
								<input type="email" name="email" id="email" class="form-control"/>
								<span id="errorEmail2"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Password</label>
								<input type="password" name="password" id="password" class="form-control"/>
								<span id="errorPassword2"></span>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="submit" name="login" class="btn btn-primary btn-block" value="Log in"/>
							</div>
						</div>
					</form>	
					@if(session()->has('message'))
						{{ session('message') }}
					@endif
					@if(session()->has('messageMiddleware'))
						{{ session('messageMiddleware') }}
					@endif
				</div>
					<div class="tab-content-inner active" id="formUser" data-content="signup">
						<h3 class="cursive-font">Enter your username</h3>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Username</label>
								<input type="password" name="username" id="username" class="form-control"/>
								<span id="errorPassword2"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="button" name="login" id="usernameCheck" class="btn btn-primary btn-block" value="Enter"/>
							</div>
						</div>
						<a href="#" id="showLogIn">Go back to log in!<a/>
						<p id="messageError"></p>
					</div>	
					<div class="tab-content-inner active" id="formUserPass" data-content="signup">
						<h3 class="cursive-font">Reset your password</h3>
						<input type="hidden" value="" id="idUser" name="idUser"/>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Password</label>
								<input type="password" name="pass" id="pass" class="form-control"/>
								<span id="errorPassword2"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Retype password</label>
								<input type="password" name="repass" id="repass" class="form-control"/>
								<span id="errorPassword2"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="button" name="login" id="resetPassword" class="btn btn-primary btn-block" value="Enter"/>
							</div>
						</div>
						<a href="#" id="showLogIn">Go back to log in!<a/>
						<p id="messageErrorPassword"></p>
					</div>		
				
			</div>
		</div>
	</div>
</div>
@endif
@endsection
@section('velicina')
md
@endsection
@section('headerPicture')
url({{asset('images/img_bg_1.jpg')}}
@endsection
@section('script')
	<script src="{{asset('js/subscribe.js')}}"></script>
	<script src="{{asset('js/resetPassword.js')}}"></script>
@endsection
