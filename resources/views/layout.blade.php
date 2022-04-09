<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.header')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('includes.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('includes.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('includes.modal')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript">
        
        $(function() {
            var usersTable = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url : '{!! route("users-fetch") !!}',
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'gender', name: 'gender' },
                    { data: 'status', name: 'status' },
                    { data: 'address_line1', name: 'address_line1' },
                    { data: 'address_line2', name: 'address_line2' },
                    { data: 'city', name: 'city' },
                    { data: 'country', name: 'country' },
                    {data: 'Actions', name: 'Actions', orderable:false, searchable:false, sClass:'text-center'},
                ]
            });


            var postsTable = $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url : '{!! route("posts-fetch") !!}',
                },
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'body', name: 'body' },
                    // { data: 'user_id', name: 'user_id' },
                    {data: 'Actions', name: 'Actions', orderable:false, searchable:false, sClass:'text-center'},
                ]
            });

        });

        $('#submitTokenData').click(function(e) {
                $('#error-div').html('');

                if(!$('#token-string').val())
                {
                    $('#error-div').html('<strong><li>Please enter the string</li></strong>');
                    $('#error-div').show();
                    return false;
                }
                
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{!! url('tokens') !!}',
                    method: 'POST',
                    data:{
                        tokenString: $('#token-string').val(),
                    },
                    success: function(result) {
                        if(result.errors) {
                            $.each(result.errors, function(key, value) {
                                // console.log(value);
                                $('#error-div').html('<strong><li>'+value+'</li></strong>');
                                $('#error-div').show();
                            });
                        } else {
                            $('#error-div').html('');
                            $('#error-div').hide();
                            
                            $('#token').val(result.token);
                            $('#token-div').show();
                        }
                    }
                });
                
            })
       
    </script>

</body>

</html>