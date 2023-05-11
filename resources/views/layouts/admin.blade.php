<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">

</head>

<body>
    @auth
    <div class="row">
        <div class="col-md-2">
<x-admin-side-bar></x-admin-side-bar>
        </div>
        <div class="col-md-10" style="margin-left: 0px">
<x-admin-nav-bar></x-admin-nav-bar>
            @yield('body')
        </div>
    </div>
    @else
        <x-main-nav-bar></x-main-nav-bar>
    <div class="container-fluid">
        <div class="row my-5">

        </div>
        @yield('body')
    @endauth

        <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
    <script src="{{ asset('js/datatable.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#options').click(function() {
                if (this.checked) {
                    $('input[type="checkbox"]').prop('checked', true);
                } else {
                    $('input[type="checkbox"]').prop('checked', false);
                }
            });
            $(".alert").fadeOut(2000);
        });

    </script>
</body>

</html>
