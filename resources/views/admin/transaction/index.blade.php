@extends('layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content" style="padding-top: 15px">
        <div class="container-fluid">

            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-head-fixed text-nowrap table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hotel</th>
                                        <th>Room</th>
                                        <th>Customer</th>
                                        <th>Tanggal Check In</th>
                                        <th>Tanggal Check Out</th>
                                        <th>Bayar</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                {{ $item->hotel->NamaHotel }}
                                                <a href="{{ URL::asset('/file/' . @$item->hotel->FotoHotel) }}"
                                                    data-toggle="lightbox" data-title="Foto Hotel"><i
                                                        class="far fa-eye"></i></a>
                                            </td>
                                            <td>
                                                {{ $item->room->NamaKamar }}
                                                <a href="{{ URL::asset('/file/' . @$item->room->FotoKamar) }}"
                                                    data-toggle="lightbox" data-title="Foto Kamar"><i
                                                        class="far fa-eye"></i></a>
                                            </td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->TanggalCheckIn }}</td>
                                            <td>{{ $item->TanggalCheckOut }}</td>
                                            <td>@currency($item->TotalBayar)</td>
                                            <td>@currency($item->Harga)</td>
                                            <td>
                                                @if ($today < $item->TanggalCheckIn)
                                                    <small class="badge badge-warning">
                                                        Up coming
                                                    </small>
                                                @elseif($today >= $item->TanggalCheckIn && $today <= $item->TanggalCheckOut)
                                                    <small class="badge badge-primary">
                                                        On Going
                                                    </small>
                                                @else
                                                    <small class="badge badge-success">
                                                        Done
                                                    </small>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

    <!-- Ekko Lightbox -->
    <script src="{{ asset('AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <!-- Filterizr-->
    <script src="{{ asset('AdminLTE/plugins/filterizr/jquery.filterizr.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $("#datatable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endsection
