@extends('Frontend.Layout.Main')
@section('styles')
    <style>
        .bg-header {
            display: flex;
            height: 100vh;
            width: 100vw;
            background: linear-gradient(rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)),
                url("{{ asset('storage/Config/header.webp') }}");
            background-size: cover;
            background-position: center;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endsection

@section('content')
    <div class="bg-header" id="home">
        <div class="container">
            <div class="row align-items-center" style="margin-top:25%">
                <div class="col-md-7 col-sm-12">
                    <p class="text-light">Hey There!, I'm Lorem</p>
                    <h1 class="text-warning">Wedding & Event Photographer</h1>
                    <p class="text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae qui
                        porro quis.
                    </p>
                    <button class="btn btn-warning text-light">Lihat Paket</button>
                </div>
            </div>
        </div>
    </div>
    <section class="container mt-4" id="paket">
        <div class="h4 pb-2 mb-4 text-warning border-bottom border-warning border-5">
            Harga Paket
        </div>
        <div class="row">
            @for ($i = 1; $i < 8; $i++)
                <div class="col-3 col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h6>Paket</h6>
                                <small class="fw-bold">Rp. 1000</small>
                            </div>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur consequatur iure voluptatum
                            molestias, earum delectus deserunt aut magnam corrupti vitae quia, ea dolore amet quo commodi
                            minus
                            qui totam quibusdam.
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning text-light form-control">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>
    <section class="bg-dark mt-4 pt-2" id="tentang-saya">
        <div class="container">
            <div class="h4 pb-2 mb-4 text-warning border-bottom border-warning border-5">
                Tentang Saya
            </div>
            <div class="row text-light">
                <div class="col-6 col-xs-12">
                    <div class="py-4">
                        <img src="{{ asset('storage/Config/self.jpg') }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-6 col-xs-12">
                    <div class="py-4">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi molestiae cumque soluta nam nemo,
                            asperiores
                            voluptatem, id aperiam impedit expedita natus tenetur enim, neque harum nisi repellat voluptate
                            autem
                            numquam?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi molestiae cumque soluta nam nemo,
                            asperiores
                            voluptatem, id aperiam impedit expedita natus tenetur enim, neque harum nisi repellat voluptate
                            autem
                            numquam?
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi molestiae cumque soluta nam nemo,
                            asperiores
                            voluptatem, id aperiam impedit expedita natus tenetur enim, neque harum nisi repellat voluptate
                            autem
                            numquam?
                        </p>
                    </div>
                    <div class="h4 pb-2 mb-4 text-warning border-bottom border-warning border-5">
                        Sosial Media
                    </div>
                    <a class="text-warning fs-3 text-decoration-none" href="https://www.facebook.com" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="text-warning fs-3 text-decoration-none" href="https://www.instagram.com" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-warning fs-3 text-decoration-none" href="mailto:admin@gmail.com">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <a class="text-warning fs-3 text-decoration-none" href="https://wa.me/6282312341234" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-4" id="gallery">
        <div class="h4 pb-2 mb-4 text-warning border-bottom border-warning border-5">
            Gallery
        </div>
        <ul class="image-gallery">
            @for ($i = 1; $i < 7; $i++)
                <li>
                    <a data-fslightbox="first-lightbox" href="{{ asset('storage/Gallery/Slug/' . $i . '.webp') }}">
                        <img src="{{ asset('storage/Gallery/Slug/' . $i . '.webp') }}">
                    </a>
                </li>
            @endfor
            @for ($i = 1; $i < 7; $i++)
                <li>
                    <a data-fslightbox="first-lightbox" href="{{ asset('storage/Gallery/Slug/' . $i . '.webp') }}">
                        <img src="{{ asset('storage/Gallery/Slug/' . $i . '.webp') }}">
                    </a>
                </li>
            @endfor
        </ul>
    </section>
@endsection
<a class="fixed-bottom btn btn-outline-warning w-gotop ms-auto" id="gotopBtn" href="#home">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
    </svg>
</a>
@section('scripts')
    <script src="{{ asset('js/fslightbox.js') }}"></script>
    <script src="{{ asset('js/gotop.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
@endsection
