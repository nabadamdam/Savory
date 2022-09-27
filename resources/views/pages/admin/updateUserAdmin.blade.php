@extends("layouts/template")
@section("mainContent")
<div class="container"> 
    <h2 class="cursive-font primary-color regH">Update User</h2>
    <form action="{{url('/admin/formUpdateUser')}}" method="POST" onSubmit="return proveraPodatakaUser();">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    @foreach($users as $user)
        <div class="row form-group">
            <div class="col-md-12">
                <input type="hidden" value="{{$user->idKorisnika}}" name="idUsr" id="idUsr" class="form-control"/>
            </div>
            <div class="col-md-12">
                <label for="date-start">Name</label>
                <input type="text" value="{{$user->Ime}}" name="Name" id="idName" class="form-control"/>
                <span id="errorNameUsr"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Surename</label>
                <input type="text" value="{{$user->Prezime}}" name="Surname" id="idSur" class="form-control" placeholder="app/assets/images/primer.jpg"/>
                <span id="errorSurnameUsr"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Email</label>
                <input type="text" value="{{$user->Email}}" name="Email" id="idEmail" class="form-control"/>
                <span id="errorEmailUsr"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Username</label>
                <input type="text" value="{{$user->Username}}" name="Username" id="idUsernameUsr" class="form-control"/>
                <span id="errorUsernameUsr"></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="date-start">Role</label>
                <select name="idUser" class="form-control">
                    @if($user->idUloga == 1)
                        @foreach($roles as $role)
                            @if($role->idUloga == 1)
                                <option value="{{$role->idUloga}}" selected="selected">{{$role->NazivUloga}}</option>
                            @else
                                <option value="{{$role->idUloga}}">{{$role->NazivUloga}}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach($roles as $role)
                            @if($role->idUloga == 2)
                                <option value="{{$role->idUloga}}" selected="selected">{{$role->NazivUloga}}</option>
                            @else
                                <option value="{{$role->idUloga}}">{{$role->NazivUloga}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <input type="submit" name="updateUser" class="btn btn-primary btn-block" value="Update"/>
            </div>
        </div>
        @endforeach
    </form>	
    @isset($errors)
        @foreach($errors->all() as $error)
                {{ $error }}
        @endforeach
    @endisset
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
