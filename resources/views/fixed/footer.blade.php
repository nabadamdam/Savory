<footer id="gtco-footer" role="contentinfo" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row row-pb-md">
            <div class="col-md-12 text-center">
                <div class="gtco-widget">
                    <h3>Get In Touch</h3>
                    <ul class="gtco-quick-contact">
                        <li><a href="#"><i class="icon-phone"></i> +381 65 201 12 46</a></li>
                        <li><a href="https://accounts.google.com/"><i class="icon-mail2"></i> &nbsp;&nbsp;nikola.riorovic98&#64;gmail&#46;com</a>
                        </li>
                    </ul>
                </div>
                <div class="gtco-widget">
                    <h3>Get Social</h3>
                    <ul class="gtco-social-icons">
                        <li><a href="https://twitter.com/"><i class="icon-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/nikola.riorovic"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/nikola-riorovi%C4%87-651413188/"><i
                                    class="icon-linkedin"></i></a></li>
                        </br>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 text-center copyright">
                <small class="block">Designed by <a href="{{url('/author')}}" target="_blank">Nikola Riorovic</a>
            </div>
        </div>
    </div>
</footer>
<!-- </div> -->

</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{asset('js/jquery.countTo.js')}}"></script>

<!-- Stellar Parallax -->
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>

<!-- Magnific Popup -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>

<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>


<!-- Main -->
<script src="{{asset('js/main.js')}}"></script>
@yield('script')
<script src="{{asset('js/mineMain.js')}}"></script>

<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

@toastr_render

<script>
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            $quantity = document.getElementById("quantityToAdd").value;
            $.ajax({
                type: 'GET',
                url: '{{ route('cart.add') }}',
                data: {
                    id: $(this).data('id'),
                    quantity: $quantity
                },
                success: function (response) {
                    if (response.success === true) {
                        toastr.success(response.msg);
                    } else if (response.info === true) {
                        toastr.info(response.msg);
                    } else if (response.warning === true) {
                        toastr.warning(response.msg);
                    } else if (response.error === true) {
                        toastr.error(response.msg);
                    }
                }
            });
        });
    });
</script>

</body>
</html>

