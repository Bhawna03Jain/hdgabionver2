@extends('front.Layout.layout')

@section('style')
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

{{-- <style>
    .text-bold {
            font-weight: 800;
        }

        text-color {
            color: #0093c4;
        }

        /* Main image - left */
        .main-img img {
            width: 100%;
        }

        /* Preview images */
        .previews img {
            width: 100%;
            height: 140px;
        }

        .main-description .category {
            text-transform: uppercase;
            color: #0093c4;
        }

        .main-description .product-title {
            font-size: 2.5rem;
        }

        .old-price-discount {
            font-weight: 600;
        }

        .new-price {
            font-size: 2rem;
        }

        .details-title {
            text-transform: uppercase;
            font-weight: 600;
            font-size: 1.2rem;
            color: #757575;
        }

        .buttons .block {
            margin-right: 5px;
        }

        .quantity input {
            border-radius: 0;
            height: 40px;

        }


        .custom-btn {
            text-transform: capitalize;
            background-color: #0093c4;
            color: white;
            width: 150px;
            height: 40px;
            border-radius: 0;
        }

        .custom-btn:hover {
            background-color: #0093c4 !important;
            font-size: 18px;
            color: white !important;
        }

        .similar-product img {
            height: 400px;
        }

        .similar-product {
            text-align: left;
        }

        .similar-product .title {
            margin: 17px 0px 4px 0px;
        }

        .similar-product .price {
            font-weight: bold;
        }

        .questions .icon i {
            font-size: 2rem;
        }

        .questions-icon {
            font-size: 2rem;
            color: #0093c4;
        }


        /* Small devices (landscape phones, less than 768px) */
        @media (max-width: 767.98px) {

            /* Make preview images responsive  */
            .previews img {
                width: 100%;
                height: auto;
            }

        }
</style> --}}
<style>
    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Barlow, sans-serif;

    } */
    body.fullscreen-mode {
        background-color: white;
      }

   .hero-section {
        position: relative;
        width: 100%;
        max-width: none;
        height: 500px;
        background: linear-gradient(180deg, #0E0E0E, #9CACAE);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }


    .tilted-box {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px;
        background: white;
        transform: skewY(3deg);
        transform-origin: bottom left;
    }

    h3,
    h1 {
        margin: 0;
        text-align: center;
        z-index: 1;
    }

    h3 {
        color: #ceff00;
        font-size: 1.4rem;
        font-weight: 700;
        letter-spacing: .08px;
        line-height: normal;
        margin-bottom: 1.2222222222rem;
        text-transform: uppercase;
    }

    h1 {
        font-size: 50px;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 24px;
        margin-top: 0;
        text-transform: uppercase;
    }

    .box {
        margin-top: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .image-box,
    .config-box {
        flex: 1;
        padding: 20px;
        margin: 20px 40px;
    }

    .image-box {
        height: 550px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2),
            10px 10px 20px rgba(0, 0, 0, 0.15),
            15px 15px 30px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        background-color: white;
    }

    model-viewer {
        width: 100%;
        max-width: 1000px;
        height: 400px;
        padding-top:10%
    }

    .config-box {
        height: 550px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2),
            10px 10px 20px rgba(0, 0, 0, 0.15),
            15px 15px 30px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: white;
    }

    .config-box h2 {
        line-height: 40px;
        font-weight: 700;
        color: #004586;
        text-transform: uppercase;
        font-size: 2rem;
        margin: 15px;
    }

    .config-box p {
        font-size: 13px;
        color: grey;
        margin: -10px 20px;
    }

    hr {
        background: #ced2d6;
        border: none;
        border-radius: 2rem;
        height: .25rem;
        margin: 20px;
        max-width: 12rem;
    }

    .config-box h3 {
        line-height: 40px;
        font-weight: 700;
        color: black;
        text-transform: uppercase;
        font-size: 1.4rem;
        text-align: left;
        margin: -13px 18px;
    }

    .config-options {
        display: flex;
        align-items: center;
        margin-top: 2rem;
    }

    .config-options .title {
        color: #50535a;
        font-family: Barlow, sans-serif;
        font-size: 1rem;
        font-weight: 700;
        text-transform: uppercase;
        white-space: nowrap;
        margin-right: 5.05rem;
    }

    .config-options-pills {
        display: flex;
        gap: 1rem;
    }

    .pill {
        position: relative;
    }

    .pill input[type=radio] {
        clip: rect(0 0 0 0);
        clip-path: inset(50%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

    .pill input[type=radio]:checked~.pill-handle {
        background: #27292e;
        border-color: #27292e;
        box-shadow: 0 0 0 4px #fff, 0 0 0 5px #27292e;
        color: #fff;
    }

    .pill-handle {
        border: 2px solid #a6abaf;
        border-radius: 9rem;
        color: #50535a;
        ;
        cursor: pointer;
        display: block;
        font-size: .875rem;
        line-height: 1.2;
        padding: .375rem 2rem;
        position: relative;
        user-select: none;
    }

    .fullscreen-btn {
        position: relative;
        bottom: -40px;
        right: -95%;
        color: rgb(68, 68, 67);
        border: none;

        border-radius: 10px;
        font-size: 1.5rem;
        cursor: pointer;
        width: 30px;
        height: 30px;
    }



    .fullscreen-btn {
        position: relative;
        bottom: -40px;
        right: -95%;
        color: rgb(68, 68, 67);
        border: none;
        border-radius: 10px;
        font-size: 1.5rem;
        cursor: pointer;
        width: 30px;
        height: 30px;
        background-color: #fff;
        display: flex;
        align-items: center;
        transition: transform 0.2s, color 0.2s;
    }

    .tooltip-text {
        visibility: hidden;
        background-color: black;
        color: #fff;
        text-align: center;
        padding: 5px;
        border-radius: 5px;
        position: absolute;
        bottom: 40px; /* Adjust to position above the button */
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.9rem;
        white-space: nowrap;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.2s;
    }

    .fullscreen-btn:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }




</style>
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="container-fluid hero-section">
                <div>
                    <h3>3D Product Configuration</h3>
                    <h1>Gabion Baskets</h1>
                </div>
                <div class="tilted-box"></div>
            </div>
            <div class="box">
                <div class="image-box">
                    <model-viewer id="viewer" src="../images/glb/Basket.glb" alt="A 3D model" camera-controls auto-rotate
                        auto-rotate-delay="0" ar ar-modes="scene-viewer webxr quick-look" ios-src="model.usdz"
                        camera-orbit="0deg 90deg 2.5m">
                        </model-viewer>
                        <button class="fullscreen-btn" id = "fullscreen-btn"style="background-color: #fff;">
                            <i class="fas fa-expand"></i>
                            <span class="tooltip-text">Toggle Fullscreen</span>
                        </button>

                </div>
                <div class="config-box">
                    <h2>Gabion Basket 30 x 30 x 30</h2>
                    <p>with mesh 10 x 10 with top net </p>
                    <hr>
                    <h3>10,91 € with VAT</h3>
                    <div class="config-options">
                        <h2 class="title">Mesh Size</h2>
                        <div class="config-options-pills">
                            <label class="pill">
                                <input type="radio" name="meshSize" checked>
                                <span class="pill-handle">10 x 10 cm</span>
                            </label>
                            <label class="pill">
                                <input type="radio" name="meshSize">
                                <span class="pill-handle">10 x 5 cm</span>
                            </label>
                        </div>
                    </div>
                    <div class="config-options">
                        <h2 class="title" style="margin-right: 100px;">Top Net</h2>
                        <div class="config-options-pills">
                            <label class="pill">
                                <input type="radio" name="topnet" checked>
                                <span class="pill-handle">Yes</span>
                            </label>
                            <label class="pill">
                                <input type="radio" name="topnet">
                                <span class="pill-handle">No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <section>
                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="image-box">
                                <model-viewer id="viewer" src="{{ asset('images/glb/Basket.glb') }}" alt="A 3D model" camera-controls auto-rotate
                                    auto-rotate-delay="0" ar ar-modes="scene-viewer webxr quick-look" ios-src="model.usdz"
                                    camera-orbit="0deg 90deg 2.5m">
                                    </model-viewer>
                                    <button class="fullscreen-btn" id = "fullscreen-btn"style="background-color: #fff;">
                                        <i class="fas fa-expand"></i>
                                        <span class="tooltip-text">Toggle Fullscreen</span>
                                    </button>

                            </div>
                            {{-- <div class="main-img">
                                <img class="img-fluid" src="https://cdn.pixabay.com/photo/2015/07/24/18/40/model-858753_960_720.jpg" alt="ProductS">
                                <div class="row my-3 previews">
                                    <div class="col-md-3">
                                        <img class="w-100" src="https://cdn.pixabay.com/photo/2015/07/24/18/40/model-858754_960_720.jpg" alt="Sale">
                                    </div>
                                    <div class="col-md-3">
                                        <img class="w-100" src="https://cdn.pixabay.com/photo/2015/07/24/18/38/model-858749_960_720.jpg" alt="Sale">
                                    </div>
                                    <div class="col-md-3">
                                        <img class="w-100" src="https://cdn.pixabay.com/photo/2015/07/24/18/39/model-858751_960_720.jpg" alt="Sale">
                                    </div>
                                    <div class="col-md-3">
                                        <img class="w-100" src="https://cdn.pixabay.com/photo/2015/07/24/18/37/model-858748_960_720.jpg" alt="Sale">
                                    </div>
                                </div>
                            </div> --}}
                        {{-- </div>
                        <div class="col-md-7">
                            <div class="main-description px-2">
                                <div class="category text-bold">
                                    Category: Women
                                </div>
                                <div class="product-title text-bold my-3">
                                    Black dress for Women
                                </div>


                                <div class="price-area my-4">
                                    <p class="old-price mb-1"><del>$100</del> <span class="old-price-discount text-danger">(20% off)</span></p>
                                    <p class="new-price text-bold mb-1">$80</p>
                                    <p class="text-secondary mb-1">(Additional tax may apply on checkout)</p>

                                </div>


                                <div class="buttons d-flex my-5">
                                    <div class="block">
                                        <a href="#" class="shadow btn custom-btn ">Wishlist</a>
                                    </div>
                                    <div class="block">
                                        <button class="shadow btn custom-btn">Add to cart</button>
                                    </div>

                                    <div class="block quantity">
                                        <input type="number" class="form-control" id="cart_quantity" value="1" min="0" max="5" placeholder="Enter email" name="cart_quantity">
                                    </div>
                                </div>




                            </div>

                            <div class="product-details my-4">
                                <p class="details-title text-color mb-1">Product Details</p>
                                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat excepturi odio recusandae aliquid ad impedit autem commodi earum voluptatem laboriosam? </p>
                            </div>

                                     <div class="row questions bg-light p-3">
                                <div class="col-md-1 icon">
                                    <i class="fa-brands fa-rocketchat questions-icon"></i>
                                </div>
                                <div class="col-md-11 text">
                                    Have a question about our products at E-Store? Feel free to contact our representatives via live chat or email.
                                </div>
                            </div>

                            <div class="delivery my-4">
                                <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-truck"></i></span> <b>Delivery done in 3 days from date of purchase</b> </p>
                                <p class="text-secondary">Order now to get this product delivery</p>
                            </div>
                            <div class="delivery-options my-4">
                                <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-filter"></i></span> <b>Delivery options</b> </p>
                                <p class="text-secondary">View delivery options here</p>
                            </div>


                        </div>
                    </div>
                </div>



                <div class="container similar-products my-4">
                    <hr>
                    <p class="display-5">Similar Products</p>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="similar-product">
                                <img class="w-100" src="https://source.unsplash.com/gsKdPcIyeGg" alt="Preview">
                                <p class="title">Lovely black dress</p>
                                <p class="price">$100</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="similar-product">
                                <img class="w-100" src="https://source.unsplash.com/sg_gRhbYXhc" alt="Preview">
                                <p class="title">Lovely Dress with patterns</p>
                                <p class="price">$85</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="similar-product">
                                <img class="w-100" src="https://source.unsplash.com/gJZQcirK8aw" alt="Preview">
                                <p class="title">Lovely fashion dress</p>
                                <p class="price">$200</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="similar-product">
                                <img class="w-100" src="https://source.unsplash.com/qbB_Z2pXLEU" alt="Preview">
                                <p class="title">Lovely red dress</p>
                                <p class="price">$120</p>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </section> --}}
        </div>
    </section>
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
const viewer = document.getElementById('viewer');
const fullscreenBtn = document.getElementById('fullscreen-btn');

fullscreenBtn.addEventListener('click', () => {
    if (!document.fullscreenElement) {
        viewer.requestFullscreen();
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
});

document.addEventListener('fullscreenchange', () => {
    if (document.fullscreenElement) {
        document.body.classList.add('fullscreen-mode');  // Add class to change background color
    } else {
        document.body.classList.remove('fullscreen-mode');  // Remove class when exiting fullscreen
    }
});

});

</script>
@endsection
