<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/admin.css'])
</head>

<body>
    @include('sweetalert::alert')
    <div class="dashboard ">
        <x-sidebar-admin />
        <section class="content">
            <button class="openbtn text-white btn btn-dark mb-3" onclick="openNav()">☰</button>
            {{ $content }}
        </section>
    </div>
</body>
@stack('script')
<script>
    function openNav() {
        $(".sidebar").css("width", "300px");
        $(".sidebar").css("padding", "20px");
        $(".content").css("margin-left", "300px");
    }

    function closeNav() {
        $(".sidebar").css("width", "0px");
        $(".sidebar").css("padding", "0px");
        $(".content").css("margin-left", "0px");
    }

        $('.confirm-logout').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi Logout',
                    text: "Apakah Anda Yakin Ingin Logout?",
                    type: 'warning',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#logout-form').trigger('submit')
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                });
            });

        $('.confirm-accept-grooming').on('click', function(e) {
            e.preventDefault();
            var acceptUrl = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Form Grooming',
                text: "Apakah Anda Yakin Ingin Konfirmasi?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = acceptUrl;
                }
            });
        });
        
        $('.confirm-accept-pethotel').on('click', function(e) {
            e.preventDefault();
            var acceptUrl = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Form Pet Hotel',
                text: "Apakah Anda Yakin Ingin Konfirmasi?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = acceptUrl;
                }
            });
        });
        
</script>

</html>
