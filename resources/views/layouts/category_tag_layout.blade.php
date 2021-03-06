<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title')</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('assets/front/images/apple-touch-icon.png') }}">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
<link href="{{ asset('assets/front/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/css/colors.css') }}" rel="stylesheet">
<link href="{{ asset('assets/front/css/version/marketing.css') }}" rel="stylesheet">
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }

</style>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        @include('layouts.navbar')

        @yield('page-title')

        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        @include('layouts.sidebar')
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.footer')

        <div class="dmtop">Scroll to Top</div>

    </div>

    <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/animate.js') }}"></script>
    <script src="{{ asset('assets/front/js/custom.js') }}"></script>

    <script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#mes'), {
                alignment: {
                    options: ['left', 'center', 'right']
                },
                toolbar: ['heading', '|', 'bold', 'italic', '|', 'link', 'bulletedList', 'numberedList',
                    'alignment', '|', 'undo', 'redo'
                ]
            })
            .catch(function(error) {
                console.error(error);
            });

    </script>

</body>

</html>
