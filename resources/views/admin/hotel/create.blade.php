@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Hotel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Hotel</li>
                    </ol>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.hotel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Hotel</label>
                        <input autocomplete="off" class="form-control" id="name" name="name"
                            placeholder="Nama Hotel" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Hotel</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="Alamat Hotel" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp Hotel</label>
                        <input type="number" autocomplete="off" class="form-control" id="no_telp" name="no_telp"
                            placeholder="No Telp Hotel" required>
                    </div>
                    <div class="form-group">
                        <label for="files">Foto Hotel</label>
                        <div class="input-group">
                            <input style="height: 45px;" id="files" name="files" type="file" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Dashboard";
        document.getElementById("kolam").innerHTML =
            '<a href="/admin" class="nav-link active"><i class="nav-icon fas fa-tint"></i><p>Dashboard</p></a>';
    </script>
@endsection
