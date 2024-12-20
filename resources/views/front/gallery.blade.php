@extends('front.Layout.layout')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <style>
        :root {
            --lightbox: rgb(0 0 0 / 0.75);
            --carousel-text: #fff;
        }

        /* body {
                margin: 1.5rem 0 3.5rem;
            } */

        @keyframes zoomin {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .gallery-item {
            display: block;
        }

        .gallery-item img {
            box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.15);
            transition: box-shadow 0.2s;
        }

        .gallery-item:hover img {
            box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.35);
        }
        .lightbox-modal{
            padding:3rem 0 8rem;
        }
        .lightbox-modal .modal-content {
            background-color: var(--lightbox);
        }

        .lightbox-modal .btn-close {
            position: absolute;
            top: 1.25rem;
            right: 1.25rem;
            font-size: 1.25rem;
            z-index: 10;
            filter: invert(1) grayscale(100);
        }

        .lightbox-modal .modal-body {
            display: flex;
            align-items: center;
            padding: 0;
        }

        .lightbox-modal .lightbox-content {
            width: 100%;
        }

        .lightbox-modal .carousel-indicators {
            margin-bottom: 0;
        }

        .lightbox-modal .carousel-indicators [data-bs-target] {
            background-color: var(--carousel-text) !important;
        }

        .lightbox-modal .carousel-inner {
            width: 75%;
        }

        .lightbox-modal .carousel-inner img {
            animation: zoomin 10s linear infinite;
        }

        .lightbox-modal .carousel-item .carousel-caption {
            right: 0;
            bottom: 0;
            left: 0;
            padding-bottom: 2rem;
            background-color: var(--lightbox);
            color: var(--carousel-text) !important;
        }

        .lightbox-modal .carousel-control-prev,
        .lightbox-modal .carousel-control-next {
            width: auto;
        }

        .lightbox-modal .carousel-control-prev {
            left: 1.25rem;
        }

        .lightbox-modal .carousel-control-next {
            right: 1.25rem;
        }

        @media (min-width: 1400px) {
            .lightbox-modal .carousel-inner {
                max-width: 60%;
            }
        }

        [data-bs-theme = "dark"] .lightbox-modal .carousel-control-next-icon,
        [data-bs-theme = "dark"] .lightbox-modal .carousel-control-prev-icon {
            filter: none;
        }
    </style>
    <style>
        .main {
  .container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1rem;
    justify-content: center;
    align-items: center;
  }

  .card {
    background: $color-white;
    box-shadow: $box-shadow;
    color: $color-dark;
    border-radius: 2px;

    &-image {
      background: $color-white;
      display: block;
      padding-top: 70%;
      position: relative;
      width: 100%;

      img {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }
  }
}

@media only screen and (max-width: 600px) {
  .main {
    .container {
      display: grid;
      grid-template-columns: 1fr;
      grid-gap: 1rem;
    }
  }
}

    </style>
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <section class="new_gallery">
                <main class="main">
                    <div class="container">
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/34MdBRc" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/34MdBRc" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/2Nv9zHh" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/2Nv9zHh" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/2q0iuay" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/2q0iuay" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/34PEofp" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/34PEofp" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/2X4z711" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/2X4z711" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/2rtIqMl" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/2rtIqMl" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/33xTVAn" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/33xTVAn" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/2K3jaDa" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/2K3jaDa" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-image">
                          <a href="https://bit.ly/2WZ3fe2" data-fancybox="gallery" data-caption="Caption Images 1">
                            <img src="https://bit.ly/2WZ3fe2" alt="Image Gallery">
                          </a>
                        </div>
                      </div>
                    </div>
                  </main>
            </section>
            <section class="mt-5" style="margin: 1.5rem 0 3.5rem;">
                <h1 class="text-center mb-5">Our Gallery</h1>
                {{-- <p class="text-center mb-4">Click an image to reveal the lightbox</p> --}}

                <section class="photo-gallery">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion1.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion1.jpg') }}" class="img-fluid"
                                        alt="Lorem ipsum dolor sit amet">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion2.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion2.jpg') }}" class="img-fluid"
                                        alt="Ipsum lorem dolor sit amet">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion3.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion3.jpg') }}" class="img-fluid"
                                        alt="Dolor lorem ipsum sit amet">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion4.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion4.jpg') }}" class="img-fluid"
                                        alt="Sit amet lorem ipsum dolor">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion5.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion5.jpg') }}" class="img-fluid"
                                        alt="Aut ipsam deserunt nostrum quo">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion6.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion6.jpg') }}" class="img-fluid"
                                        alt="Nulla ex nihil eligendi tempora">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion7.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion8.jpg') }}" class="img-fluid"
                                        alt="Nemo perspiciatis voluptatum">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="{{ asset('images/baskets_lemon/gabion9.jpg') }}">
                                    <img src="{{ asset('images/baskets_lemon/gabion9.jpg') }}" class="img-fluid"
                                        alt="Accusantium consequuntur modi">
                                </a>
                            </div>
                            <div class="col">
                                <a class="gallery-item" href="https://picsum.photos/id/197/1200/800.webp">
                                    <img src="https://picsum.photos/id/197/480/320.webp" class="img-fluid"
                                        alt="Dolore asperiores reprehenderit">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="modal fade lightbox-modal" id="lightbox-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="lightbox-content">
                                    <!-- JS content here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        const html = document.querySelector('html');
        html.setAttribute('data-bs-theme', 'dark');

        const galleryGrid = document.querySelector(".gallery-grid");
        const links = galleryGrid.querySelectorAll("a");
        const imgs = galleryGrid.querySelectorAll("img");
        const lightboxModal = document.getElementById("lightbox-modal");
        const bsModal = new bootstrap.Modal(lightboxModal);
        const modalBody = lightboxModal.querySelector(".lightbox-content");

        function createCaption(caption) {
            return `<div class="carousel-caption d-none d-md-block">
      <h4 class="m-0">${caption}</h4>
    </div>`;
        }

        function createIndicators(img) {
            let markup = "",
                i, len;

            const countSlides = links.length;
            const parentCol = img.closest('.col');
            const curIndex = [...parentCol.parentElement.children].indexOf(parentCol);

            for (i = 0, len = countSlides; i < len; i++) {
                markup += `
      <button type="button" data-bs-target="#lightboxCarousel"
        data-bs-slide-to="${i}"
        ${i === curIndex ? 'class="active" aria-current="true"' : ''}
        aria-label="Slide ${i + 1}">
      </button>`;
            }

            return markup;
        }

        function createSlides(img) {
            let markup = "";
            const currentImgSrc = img.closest('.gallery-item').getAttribute("href");

            for (const img of imgs) {
                const imgSrc = img.closest('.gallery-item').getAttribute("href");
                const imgAlt = img.getAttribute("alt");

                markup += `
      <div class="carousel-item${currentImgSrc === imgSrc ? " active" : ""}">
        <img class="d-block img-fluid w-100" src=${imgSrc} alt="${imgAlt}">
        ${imgAlt ? createCaption(imgAlt) : ""}
      </div>`;
            }

            return markup;
        }

        function createCarousel(img) {
            const markup = `
    <!-- Lightbox Carousel -->
    <div id="lightboxCarousel" class="carousel slide carousel-fade" data-bs-ride="true">
      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        ${createIndicators(img)}
      </div>
      <!-- Wrapper for Slides -->
      <div class="carousel-inner justify-content-center mx-auto">
        ${createSlides(img)}
      </div>
      <!-- Controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    `;

            modalBody.innerHTML = markup;
        }

        for (const link of links) {
            link.addEventListener("click", function(e) {
                e.preventDefault();
                const currentImg = link.querySelector("img");
                const lightboxCarousel = document.getElementById("lightboxCarousel");

                if (lightboxCarousel) {
                    const parentCol = link.closest('.col');
                    const index = [...parentCol.parentElement.children].indexOf(parentCol);

                    const bsCarousel = new bootstrap.Carousel(lightboxCarousel);
                    bsCarousel.to(index);
                } else {
                    createCarousel(currentImg);
                }

                bsModal.show();
            });
        }
    </script>

    <script>
        // Fancybox Config
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});

    </script>
@endsection
