@if (config('sweetalert.alwaysLoadJS') && !config('sweetalert.neverLoadJS'))
    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
@endif

@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif

    @if (!config('sweetalert.alwaysLoadJS') && !config('sweetalert.neverLoadJS'))
        <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @endif

   
@endif
