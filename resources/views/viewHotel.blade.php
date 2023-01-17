@extends('layouts.layoutCustomer')

@section('content')
    <main>
        <article>
            <section class="hero" id="home"
                style="background-image: url({{ URL::asset('/file/' . @$hotel->FotoHotel) }})">
                <div class="container">
                    <h2 class="h1 hero-title">{{ $hotel->NamaHotel }}</h2>

                    <p class="hero-text">
                        {{ $hotel->AlamatHotel }} - {{ $hotel->NoTelpHotel }}
                    </p>
                </div>
            </section>

            <section class="package" id="package">
                <div class="container">

                    <p class="section-subtitle">Rooms</p>

                    <h2 class="h2 section-title">List of Rooms</h2>

                    <br>

                    <ul class="package-list">

                        @foreach ($rooms as $room)
                            <li>
                                <div class="package-card">

                                    <figure class="card-banner">
                                        <img src="{{ URL::asset('/file/' . @$room->FotoKamar) }}" alt="Experience The Great Holiday On Beach"
                                            loading="lazy">
                                    </figure>

                                    <div class="card-content">

                                        <h3 class="h3 card-title">{{ $room->NamaKamar }}</h3>

                                        <p class="card-text">
                                            Fasilitas Kamar: {{ $room->FasilitasKamar }}
                                        </p>

                                        <ul class="card-meta-list">

                                            <li class="card-meta-item">
                                                <div class="meta-box">
                                                    <ion-icon name="bed-outline"></ion-icon>

                                                    <p class="text">{{ $room->UnitKamar }} unit</p>
                                                </div>
                                            </li>

                                            <li class="card-meta-item">
                                                <div class="meta-box">
                                                    <ion-icon name="people"></ion-icon>

                                                    <p class="text">{{ $room->TipeKamar }}</p>
                                                </div>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="card-price">
                                        <p class="price">
                                            @currency($room->HargaKamar)
                                            <span>/ per night</span>
                                        </p>

                                        <a href="{{ route('transaction', $room->id) }}" class="btn btn-secondary">Book Now</a>

                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </article>
    </main>
@endsection
