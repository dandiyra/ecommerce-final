<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>E-Commerce Admin Panel</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('backend/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('backend/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">

    <!-- chart -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- Data Table css -->
    <link href="{{ asset('backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{ asset('backend/css/theme.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{ asset('backend//css/starlight.css') }}">
    <link href="{{ asset('backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
</head>

<body class="animsition">
    @guest

    @else
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin.body.header_mobile')
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        @include('admin.body.sidebar')
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('admin.body.header')
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    @endguest
    @yield('admin_content')
    <!-- Jquery JS-->
    <script src="{{ asset('backend/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('backend/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('backend/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


    <!-- <script src="{{ asset('backend/lib/jquery/jquery.js') }}"></script> -->
    <!-- <script src="{{ asset('backend/lib/popper.js/popper.js') }}"></script> -->
    <script src="{{ asset('backend/lib/bootstrap/bootstrap.js') }}"></script>
    <!-- <script src="{{ asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script> -->
    <script src="{{ asset('backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('backend/lib/select2/js/select2.min.js') }}"></script>

    <script>
        $(function () {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
            $('#datatable3').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });


            $('#datatable2').DataTable({
                bLengthChange: true,
                searching: true,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });

    </script>



    <script src="{{ asset('backend/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/select2/select2.min.js') }}"></script>

    <script src="{{ asset('backend/lib/medium-editor/medium-editor.js') }}"></script>
    <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function () {
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote').summernote({
                height: 150,
                tooltip: false
            })
        });

    </script>

    <script>
        $(function () {
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote1').summernote({
                height: 150,
                tooltip: false
            })
        });

    </script>




    <!-- Main JS-->
    <script src="{{ asset('backend/js/main.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>

    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif

    </script>

    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });

    </script>

</body>

</html>
<!-- end document-->
