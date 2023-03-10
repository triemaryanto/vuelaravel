<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Login | Admin</title>
</head>

<body class="hold-transition login-page">
    <div class="login-box" id="app">
        <div class="login-logo">
            <a href="#"><b>Login Admin</b> <br> RAT 2023</a>
        </div>
        @include('includes.flash_message')
        <div class="card">
            <div class="card-body login-card-body">

                <form action="{{ route('user.validate') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="/admin/forgot">Lupa Password ?</a>
                </p>
                <p class="mb-0">
                    <a href="/admin/register" class="text-center">Buat Akun</a>
                </p>
            </div>

        </div>
    </div>
    <!-- /.login-box -->

    @include('anggota.script')
</body>

</html>