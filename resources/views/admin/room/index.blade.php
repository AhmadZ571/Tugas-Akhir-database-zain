@extends('layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kamar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Room</li>
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
                        <div class="card-header bg-gray-dark">
                            <h3 class="card-title">Room</h3>
                            <a type="button" href="{{ route('admin.room.create') }}" class="btn btn-success float-right"><i
                                    class="fas fa-plus"></i> Tambah
                                Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-head-fixed text-nowrap table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hotel</th>
                                        <th>Tipe Kamar</th>
                                        <th>Nama Kamar</th>
                                        <th>Fasilitas Kamar</th>
                                        <th>Harga Kamar</th>
                                        <th>Unit Kamar</th>
                                        <th>Foto Kamar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->hotel->NamaHotel }}</td>
                                            <td>{{ $item->TipeKamar }}</td>
                                            <td>{{ $item->NamaKamar }}</td>
                                            <td>{{ $item->FasilitasKamar }}</td>
                                            <td>@currency($item->HargaKamar)</td>
                                            <td>{{ $item->UnitKamar }}</td>
                                            <td>
                                                <a href="{{ URL::asset('/file/' . @$item->FotoKamar) }}"
                                                    download="{{ $item->files }}" class="tag">Download</a>
                                                <a href="{{ URL::asset('/file/' . @$item->FotoKamar) }}"
                                                    data-toggle="lightbox" data-title="Foto Kamar"><i
                                                        class="far fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.room.edit', $item->id) }}" class="btn btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.room.delete', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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
