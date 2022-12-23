<!DOCTYPE html>

<html lang="en">

<head>
    @include('admin.head')
    <title>Laravel | Vue</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        @include('admin.nav')

        @include('admin.aside')

        <div class="content-wrapper">

            <div class="content">
                <router-view></router-view>
            </div>

        </div>


        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        @include('admin.footer')
    </div>

    @include('admin.script')

</body>


</html>