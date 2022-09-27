@extends('layouts/template')
@section('mainContent')
    <div class="row" id="autor">
        <div class="col-md-12" id="autor1">
            <div class="mw-content mw-content-issue pt-0">
                <div class="container mt-2">
                    <div class="mw-content-body">
                        <div class="table-responsive">
                            <h1 class="text-center pb-2">Cart</h1>
                            <table class="table" id="cart">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" width="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart ?? [] as $key => $item)
                                    <tr>
                                        <td><b>#{{ $loop->iteration }}</b></td>
                                        <td><img src="{{$item['featured_image']}}"
                                                 class="img-fluid cover-image"
                                                 style="max-width: 100px;"/> {{ $item['name'] }}
                                        </td>
                                        <td>
                                            <div style="display: inline-block;"
                                                    class="price">{{ $item['quantity'] }} </div>
                                        </td>
                                        <td>
                                            <div style="display: inline-block;"
                                                 class="price"><?= number_format($item['price'],2,",",".");?></div>
                                        </td>
                                        <td>
                                            <a href="{{url('cart/remove/' . $item['id'])}}" type="button"
                                               class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="1"></td>
                                    <td><b>Total price</b></td>
                                    <td colspan="2"><b class="totalPrice"></b><?= number_format($final_price,2,",",".");?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        @if(count($errors) > 0 )
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        <div class="user-info mb-4 p-3 box-shadow">
                            <span class="user-info-title">User informations</span>

                            <!-- stripe -->
                            <script src="https://js.stripe.com/v3/"></script>
                            <input type="hidden" name="hiddenA" id="hiddenA" value="dd"/>

                            <!-- stripe -->

                            <form action="{{ route('payment') }}" method="POST" id="payment-form">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstName">Name</label>
                                        <input type="text" class="form-control" name="first_name" id="firstName"
                                               value="@if(isset($subscriber)) {{$subscriber->Ime}} @endif"
                                               required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastName">Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="lastName"
                                               value="@if(isset($subscriber)) {{$subscriber->Prezime}} @endif"
                                               required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="@if(isset($subscriber)) {{$subscriber->Email}} @endif" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone number</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone"
                                               value="@if(isset($subscriber)) {{$subscriber->broj_telefona}} @endif" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="@if(isset($subscriber)) {{$subscriber->adresa}} @endif" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="country_id">Country</label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="serbia">Serbia</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="zipCode">Postcode</label>
                                        <input type="number" class="form-control" name="postal_code" id="postal_code"
                                               value="{{@$subscriber->postanski_broj}}" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="city">Town</label>
                                        <input type="text" class="form-control" name="city" id="city"
                                               value="@if(isset($subscriber)) {{$subscriber->grad}} @endif" required>
                                    </div>
                                </div>
                                <hr class="my-1">


                                <!-- stripe -->

                                <input type="hidden" name="totall" id="totalPrice" value="{{$final_price}}" />

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                        <div id="ssdsdsd"></div>
                                    </div>
                                </div>

                                <!-- stripe -->

                                <div class="form-group text-right">
                                    <button type="submit" name="pay" id="buttonCardPay" data-status=1  name="buttonCardPay" value="Pay {{$final_price}}"
                                            class="btn btn-success mb-2">Card payment</button>
                                    <!---<button type="submit" name="pay" value="payment_slip" class="btn btn-success mb-2">Plati
                                        uplatnicom
                                    </button>---->
                                </div>


                            </form>


                        </div>
                    </div><!-- mw-content-body -->
                </div>
            </div><!-- mw-content -->
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/stripe.js')}}"></script>
@endsection
@section('velicina')
    sm
@endsection
<style>
    #gtco-header{
        display:none;
    }
    #darkCartNavigation{
        background-color: #000000;
    }
</style>