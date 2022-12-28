<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Login | Admin</title>
</head>

<body class="hold-transition login-page">
    <div class="login-box" id="app">
        <div class="login-logo">
            <a href="#"><b>Confirmasi Akun</b> <br> RAT 2023</a>
        </div>
        @include('includes.flash_message')
        <div class="card">
            <div class="card-body login-card-body">

                <p>Silahkan Klik <a href="http://127.0.0.1:8000/user/resent/{{$data}}"> re-sent</a>, jika tidak menerima menerima email dalam waktu 1 Menit</p>

                <p class="mb-0">
                    <a href="/admin/" class="text-center">Login</a>
                </p>
            </div>

        </div>
    </div>
    <!-- /.login-box -->

    @include('anggota.script')
</body>

</html>