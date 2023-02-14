</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>

<script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>  

<script src="{{asset('front/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{asset('front/js/common.js')}}"></script>


@yield('scripts')

@include('front.partials.loader')
</body>
</html>