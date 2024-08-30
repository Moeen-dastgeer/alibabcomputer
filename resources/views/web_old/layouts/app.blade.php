<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AliBabaComputers | {{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font awesome -->
    <link href="{{ asset('web_assets/fontawesome-free-6.0.0/css/all.min.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('web_assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('web_assets/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/jquery.simpleLens.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('web_assets/css/theme-color/default-theme.css') }}" class="lin" rel="stylesheet">
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/bridge-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/dark-red-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/orange-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/green-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/lite-blue-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/pink-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/purple-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/red-theme.css') }}" rel="stylesheet">  --}}
    {{-- <link id="switcher" href="{{ asset('web_assets/css/theme-color/yellow-theme.css') }}" rel="stylesheet">  --}}
    <!-- Top Slider CSS -->
    <link href="{{ asset('web_assets/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('web_assets/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('lobibox/dist/css/LobiBox.min.css') }}">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    {{ $header }}
</head>

<body>
    @include('web.layouts.header')
    {{ $slot }}
    @include('web.layouts.footer')

    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('web_assets/js/bootstrap.js') }}"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{ asset('web_assets/js/jquery.smartmenus.js') }}"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{ asset('web_assets/js/jquery.smartmenus.bootstrap.js') }}"></script>
    <!-- To Slider JS -->
    <script src="{{ asset('web_assets/js/sequence.js') }}"></script>
    <script src="{{ asset('web_assets/js/sequence-theme.modern-slide-in.js') }}"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="{{ asset('web_assets/js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web_assets/js/jquery.simpleLens.js') }}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{ asset('web_assets/js/slick.js') }}"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="{{ asset('web_assets/js/nouislider.js') }}"></script>
    <script src="{{ asset('lobibox/dist/js/lobibox.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('web_assets/js/custom.js') }}"></script>  

{{-- 
    @if ($message = Session::get('success'))

    <script>
     notification('success',{{$message}});
    </script>

    
     @endif --}}

    {{ $footer }}





    {{-- <script type="text/javascript">
        
            function themecolour(color){
                    var a = color.val();
                    var b = "";
                    if(a == "default")
                    {
                         b = $('.lin').attr('href',"{{ asset('web_assets/css/theme-color/default-theme.css') }}");
                    }

                    if(a == "pink")
                    {
                         b = $('.lin').attr('href',"{{ asset('web_assets/css/theme-color/pink-theme.css') }}");
                    }

                    if(a == "orange")
                    {
                         b = $('.lin').attr('href',"{{ asset('web_assets/css/theme-color/orange-theme.css') }}");
                    }

                    if(a == "red")
                    {
                         b = $('.lin').attr('href',"{{ asset('web_assets/css/theme-color/red-theme.css') }}");
                    }

                    if(a == "purple")
                    {
                         b = $('.lin').attr('href',"{{ asset('web_assets/css/theme-color/purple-theme.css') }}");
                    }

                    if(a == "green")
                    {
                         b = $('.lin').attr('href',"{{ asset('web_assets/css/theme-color/green-theme.css') }}");
                    }

                    if(a == "bridge")
                    {
                         b = $('.lin').attr('href',"{{ asset('web_assets/css/theme-color/bridge-theme.css') }}");
                    }
                    
            }
    </script> --}}

    <script>

function fetchdata() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_data",
                    success: function(data) {
                        $('#cart').html(data);
                    }
                });
            }


            $('.create_cart').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data.status == 'success') {
                            notification(data.status,data.message);

                        }
                        $('#cart').html("");
                        fetchdata();

                    }
                });
            });


            function deletecart1(id) {
                
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '{{ url('/delete_cart') }}',
                    data: {_token: _token, id: id},
                    success: function(data) {
                        if (data.status == 'success') {
                            notification(data.status,data.message);  
                        }
                        fetchdata();
                    }
                });
            }


    </script>


</body>

</html>
