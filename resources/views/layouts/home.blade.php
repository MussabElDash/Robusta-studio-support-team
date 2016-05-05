<!doctype html>
<html>
<head>
    <title>@yield('title', 'Robusta')</title>
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/AdminLTE.min.css') !!}

    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/colorpicker/bootstrap-colorpicker.css') !!}
    {!! Html::style('/get-skin') !!}
    {!! Html::style('assets/css/our-css.css') !!}
    @section('styles')
    @show

    {!! Html::script('assets/js/jQuery-2.1.4.min.js') !!}
    {!! Html::script('assets/js/jquery-ui.min.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/AdminLTE.min.js') !!}
    {!! Html::script('assets/colorpicker/bootstrap-colorpicker.js') !!}
    {!! Html::script('js/tickets.js') !!}
    {!! Html::script('https://js.pusher.com/3.0/pusher.min.js') !!}


    @section('scripts')
    @show
    <script>
        $.widget.bridge('uibutton', $.ui.button);
        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        @include('layout-components.header')
    </header>
    <audio id="soundFX">
        <source src="/media/notification_sound.mp3"></source>
        Update your browser to enjoy HTML5 audio!
    </audio>
    @include('layout-components.sidebar.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            @section('content_header')
                @if(empty($headers))
                    {{--*/ $headers = [] /*--}}
                @endif
                @if(empty($footers))
                    {{--*/ $footers = [] /*--}}
                @endif
                @include('layout-components.breadcrumb', ['headers' => $headers, 'footers' => $footers])
            @show
        </section>

        <section class="content">
            @include('flash::custom')

            <div class="row">
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer">
        @include('layout-components.footer')
    </footer>
</div>

<div id="modals">
    @section('modals')
    @show
</div>
</body>
</html>
