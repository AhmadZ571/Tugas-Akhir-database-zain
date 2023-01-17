@extends('layouts.layoutCustomer')

@section('content')
    <script type="text/javascript">
        function check() {

            var date1 = new Date(document.getElementById("checkin").value)
            var date2 = new Date(document.getElementById("checkout").value)

            var price = {!! json_encode($room->HargaKamar) !!}

            console.log(price)

            const diffTime = Math.abs(date2 - date1);
            const diff = Math.ceil(diffTime / (1000 * 60 * 60 * 24))

            var total = price * diff

            document.getElementById("totalHarga").value = total
            document.getElementById("total").innerHTML = `Rp. ${total}`
        }
    </script>

    <main>
        <article>
            <section class="hero" id="home"
                style="background-image: url({{ URL::asset('/file/' . @$room->FotoKamar) }})">
                <div class="container">
                    <h2 class="h1 hero-title">{{ $room->NamaKamar }}</h2>

                    <p class="hero-text">
                        {{ $room->TipeKamar }} - Fasilitas Kamar: {{ $room->FasilitasKamar }}
                    </p>
                </div>
            </section>

            <section class="tour-search">
                <div class="container">

                    <h2 class="h2 section-title" style="color: white">{{ $room->NamaKamar }} Total: </h2> <h2 id="total" class="h2 section-title" style="color: white">Rp. {{ $room->HargaKamar }}</h2>

                    <br>

                    <form action="{{ route('store.transaction') }}" method="POST"
                        class="tour-search-form tour-search-form">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="hotel_id" value="{{ $room->hotel->id }}">
                        <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" id="totalHarga" name="totalHarga" value="{{ $room->HargaKamar }}">
                        <div class="input-wrapper">
                            <label for="checkin" class="input-label">Checkin Date</label>

                            <input value="{{ $today }}" type="date" name="checkin" id="checkin" required class="input-field" onchange="check();">
                        </div>

                        <div class="input-wrapper">
                            <label for="checkout" class="input-label">Checkout Date</label>

                            <input value="{{ $tomorrow }}" type="date" name="checkout" id="checkout" required class="input-field" onchange="check();">
                        </div>
                        <div class="input-wrapper">
                            <label for="Harga" class="input-label">Payment</label>

                            <input type="number" name="Harga" id="Harga" required placeholder="Enter Payment"
                                class="input-field">
                        </div>
                        
                        <div class="input-wrapper">
                            <label for="NamaMobil" class="input-label">Rental Car</label>

                            <select name="NamaMobil" id="NamaMobil" class="input-field" style="width: 100%">
                                <option value="Avanza">Avanza</option>
                                <option value="Alphard">Alphard</option>
                                <option value="Hiace">Hiace</option>
                                <option value="Innova">Innova</option>
                            </select>

                        </div>

                        <div class="input-wrapper">
                            <label for="pickup" class="input-label">Pickup Date</label>

                            <input value="{{ $tomorrow }}" type="date" name="pickup" id="pickup" required class="input-field">
                        </div>

                        <div class="input-wrapper">
                            <label for="address" class="input-label">Pickup address</label>

                            <input type="text" name="address" id="address" required class="input-field" placeholder="Pickup Address">
                        </div>

                        <button type="submit" class="btn btn-secondary" style="grid-column: span 2; margin-top: 10px">Book</button>
                    </form>
                </div>
            </section>

        </article>
    </main>
@endsection
