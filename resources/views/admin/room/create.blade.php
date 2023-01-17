@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kamar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Kamar</li>
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
            <form action="{{ route('admin.room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group" data-select2-id="29">
                        <label>Hotel</label>
                        <select name="hotel_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->NamaHotel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" data-select2-id="29">
                        <label>Tipe Kamar</label>
                        <select name="TipeKamar" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Suite">Suite</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NamaKamar">Nama Kamar</label>
                        <input type="text" autocomplete="off" class="form-control" id="NamaKamar" name="NamaKamar"
                            placeholder="Nama Kamar" required>
                    </div>
                    <div class="form-group">
                        <label for="FasilitasKamar">Fasilitas Kamar</label>
                        <textarea id="FasilitasKamar" name="FasilitasKamar" class="form-control" rows="3" placeholder="Fasilitas Kamar" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="HargaKamar">Harga Kamar</label>
                        <input type="number" autocomplete="off" class="form-control" id="HargaKamar" name="HargaKamar"
                            placeholder="Harga Kamar" required>
                    </div>
                    <div class="form-group">
                        <label for="UnitKamar">Unit Kamar</label>
                        <input type="number" autocomplete="off" class="form-control" id="UnitKamar" name="UnitKamar"
                            placeholder="Unit Kamar" required>
                    </div>
                    <div class="form-group">
                        <label for="FotoKamar">Foto Kamar</label>
                        <div class="input-group">
                            <input style="height: 45px;" id="FotoKamar" name="FotoKamar" type="file" class="form-control">
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
