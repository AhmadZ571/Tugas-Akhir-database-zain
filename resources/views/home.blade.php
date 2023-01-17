@extends('layouts.layoutCustomer')

@section('content')
    <main>
        <article>
            <section class="hero" id="home">
                <div class="container">

                    <h2 class="h1 hero-title">Journey to explore world</h2>

                    <p class="hero-text">
                        @auth
                            Welcome {{ Auth::user()->name }}!
                        @endauth
                        Search deals on hotels, homes, and much more...
                    </p>

                    <div class="btn-group">
                        <a href="{{ route('hotel') }}" class="btn btn-primary">Explore Hotel Now!</a>
                    </div>

                </div>
            </section>

            <section class="cta" id="contact">
                <div class="container">

                    <div class="cta-content">
                        <p class="section-subtitle">Call To Action</p>

                        <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

                        <p class="section-text">
                            Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum
                            cumque
                            laudantium. Sit ornare
                            mollitia tenetur, aptent.
                        </p>
                    </div>

                    <button class="btn btn-secondary">Contact Us !</button>

                </div>
            </section>

        </article>
    </main>
@endsection
