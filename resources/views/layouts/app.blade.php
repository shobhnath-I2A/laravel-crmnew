<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon" />

    <!-- Stylesheets -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote-bs4.css') }}">

    <!-- Font Awesome (One version only) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <!-- Additional custom styles -->
    <link href="{{ asset('assets/css/customstyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/pagestyle.css') }}" rel="stylesheet" type="text/css">

    @stack('styles') <!-- For any page-specific styles -->
</head>
<body>

    @include('partials.navigation')
    @include('partials.header')
    @include('partials.sidebar')

    <div class="container">
        {{-- Toast message --}}
        <div id="ajaxLoader">
            <div class="loader-bar"></div>
        </div>
        <div id="toastMessage"></div>
        {{-- <div id="formProgress" >
            <div class="progress mb-3">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width:100%">
                    Processing...
                </div>
            </div>
        </div> --}}
        {{-- End toast message --}}

        @yield('content')

        {{-- open sidebar popup forms --}}
        <div class="crm-sidebar" style="display:none;">
            <i class="fa fa-times" style="position:absolute; right:25px; top:15px; cursor:pointer;"
                onclick="closeSidebar();"></i>
            <div class="sidebar-box">
                <h4 class="sidebar-title" style="padding:15px; background:#f8f8f8; border-bottom:1px solid #ddd;">
                    Sidebar Title
                </h4>
                <div id="sidebar-content">
                    Loading...
                </div>
            </div>
        </div>
        {{-- end side bar popup forms --}}
    </div>

    @include('partials.footer')

    <!-- Scripts -->
    @stack('scripts') <!-- For any page-specific scripts -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>

    <!-- Additional plugins -->
    <script src="{{ asset('assets/plugins/jquery.peity.min.js') }}"></script>

    <!-- Main app.js (your custom JS) -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/dashboard.js') }}"></script> --}}

    <!-- TinyMCE -->
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <!-- jQuery Validation (for form validation) -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- amCharts (for charts) -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $('#queryForm').submit(function(e) {
        // $(document).on('submit', '#queryForm', function(e) {
        $(document).on('submit', '.ajax-form', function(e){
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            $('.validation-error').remove();
            $('.form-control').removeClass('is-invalid');
            $('#ajaxLoader').show();
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: formData,
                success: function(response) {
                    $('#ajaxLoader').hide();
                    $('#toastMessage').html(
                        '<div class="toast-box">' + response.message + '</div>'
                    );
                    setTimeout(function() {
                        $('#toastMessage').fadeOut();
                    }, 3000);
                    closeSidebar();
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    $('#ajaxLoader').hide();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            let input = $('[name="' + key + '"]');
                            input.addClass('is-invalid');
                            input.after(
                                '<div class="validation-error text-danger">' + value[0] +
                                '</div>'
                            );
                        });
                    }
                }
            });
        });
    </script>
    <script>
        // new form sidebar  open js
        function openSidebar(title, url) {
            $('#sidebar-content').html('Loading...');
            $('.sidebar-title').text(title);
            $('.crm-sidebar').show();
            $('body').css('overflow', 'hidden');
            $('#sidebar-content').load(url, function() {
                // Reinitialize UI components after AJAX load
                initCRMUI();
            });
        }
        function closeSidebar() {
            $('.crm-sidebar').hide();
            $('#sidebar-content').html('Loading...');
            $('body').css('overflow', 'auto');
        }
    </script>
</body>
</html>
