@extends('layouts.layoutCustomer')

@section('content')
    <main>
        <article>
            <section class="tour-search" style="padding-top: 200px;">
                <div class="container">

                    <form action="" class="tour-search-form">

                        <div class="input-wrapper">
                            <label for="destination" class="input-label">Search Hotel</label>

                            <input type="text" name="search" id="search" placeholder="Enter Hotel" class="input-field">
                        </div>

                        <button type="submit" class="btn btn-secondary" onsubmit="handleSearch()">Search</button>
                    </form>
                </div>
            </section>


            <section class="package" id="package">
                <div class="container">

                    <p class="section-subtitle">Hotels</p>

                    <h2 class="h2 section-title">Checkout Our Hotels</h2>

                    <br>

                    <ul class="package-list">

                        @forelse ($hotel as $item)
                            <li>
                                <div class="package-card">

                                    <figure class="card-banner">
                                        <img src="{{ URL::asset('/file/' . @$item->FotoHotel) }}"
                                            alt="Experience The Great Holiday" loading="lazy">
                                    </figure>

                                    <div class="card-content">

                                        <h3 class="h3 card-title">{{ $item->NamaHotel }}</h3>

                                        <p class="card-text">
                                            {{ $item->AlamatHotel }}
                                        </p>

                                        <ul class="card-meta-list">

                                            <li class="card-meta-item">
                                                <div class="meta-box">
                                                    <ion-icon name="people"></ion-icon>

                                                    <p class="text">{{ $item->NoTelpHotel }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-price">
                                        <div class="wrapper">
                                            <a href="{{ route('view.hotel', $item->id) }}" class="btn btn-secondary">See
                                                Hotels</a>
                                        </div>
                                    </div>
                            </li>

                        @empty
                            <div class="section-text">
                                <p>No record found..</p>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </section>
        </article>
    </main>
    <script type="text/javascript">
        function handleSearch(event) {
            window.location.href = "{{ url('/hotel/?name=') }}" + $("#search").val();
        }
    </script>
@endsection
