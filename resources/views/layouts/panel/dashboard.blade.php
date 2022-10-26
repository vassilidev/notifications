<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="Laravel 9 Admin Starter Kit"/>
    <meta name="author" content="Vassili JOFFROY (@vassilidev)"/>
    <title>@yield('title')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @stack('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="nav-fixed">
@include('layouts.panel.dashboard.navbar')
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        @include('layouts.panel.dashboard.sidenav')
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('layouts.panel.dashboard.footer')
    </div>
</div>
@include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
@stack('js')
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    function toast(data) {
        Toast.fire({
            icon: data.icon,
            title: data.message,
        });
    }
</script>
<script type="module">
    Echo.private("App.Models.User.{{ Auth::id() }}")
        .notification((notification) => {
            Livewire.emit('newNotification');
            toast(notification);
        });
</script>
@livewireScripts
</body>
</html>
