@extends('front.Layout.layout')

@section('style')
    @vite(['resources/css/cart.css'])

    <style>
        .gallery {
            .thumbnails #slider img {
                width: 100px;
            }

            #slider {
                transition: transform 0.5s ease-in-out;
            }

            .next,
            .prev {
                left: 50%;
                transform: translateX(-50%) rotateZ(-90deg);
                padding: 0px;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .next {
                top: -5px;
            }

            .prev {
                bottom: -5px;
            }

            @media only screen and (max-width: 640px) {

                .next,
                .prev {
                    top: 50%;
                    transform: translateY(-50%);
                    padding: 0px;
                    cursor: pointer;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: red;
                    color: white;
                }

                .next {
                    right: -8px;
                    left: 95%;
                    /* top: -5px; */

                }

                .prev {
                    left: -8px;
                    /* right: -5px;
                        bottom: -5px; */
                }

            }
        }
    </style>
@endsection
@section('content')
    <main class="min-h-screen">
        <section class="flex justify-around items-center flex-col sm:flex-row mt-5">
            <div
                class="gallery flex flex-col sm:flex-row justify-center sm:justify-around items-center w-full sm:w-7/12 mb-10">
                <div class="thumbnails relative flex overflow-hidden order-2 sm:order-1z-30">
                    <!-- Slider containing images -->
                    <div class=" py-2 border border-gray-400 ">
                        <div id="slider"
                            class="flex flex-row sm:flex-col items-center justify-center sm:justify-start min-h-24">
                            @php
                                $images = json_decode($product->relevant_images, true);
                            @endphp
                            @if (!empty($images) && is_array($images))
                                @foreach ($images as $image)
                                    <img src="{{ asset($image) }}" alt="Image 1" onclick="openImage(this)"
                                        class="slider-image max-w-80">
                                @endforeach
                            @else
                                <!-- Optional placeholder image -->
                                <img src="{{ asset($product->main_image) }}" alt="Placeholder Image" class="slider-image">
                            @endif

                            {{-- <img src="{{ asset('tmp/img/product01.png') }}" alt="Image 1" onclick="openImage(this)"
                                class="slider-image">
                            <img src="{{ asset('tmp/img/product02.png') }}" alt="Image 2" onclick="openImage(this)"
                                class="slider-image">
                            <img src="{{ asset('tmp/img/product03.png') }}" alt="Image 3" onclick="openImage(this)"
                                class="slider-image">
                            <img src="{{ asset('tmp/img/product04.png') }}" alt="Image 1" onclick="openImage(this)"
                                class="slider-image">
                            <img src="{{ asset('tmp/img/product05.png') }}" alt="Image 2" onclick="openImage(this)"
                                class="slider-image">
                            <img src="{{ asset('tmp/img/product06.png') }}" alt="Image 3" onclick="openImage(this)"
                                class="slider-image"> --}}
                        </div>

                        <!-- Navigation Buttons -->
                        <button
                            class="prev absolute  rounded-full w-6 h-6 z-50 border border-gray-300 text-secondary-800 text-xl"
                            onclick="moveSlide(-1)">&#10094;</button>
                        <button
                            class="next absolute  rounded-full w-6 h-6 z-50 border border-gray-300 text-secondary-800 text-xl"
                            onclick="moveSlide(1)">&#10095;</button>
                    </div>
                </div>
                <!-- Navigation Buttons -->
                <div class="mainImageBox flex justify-center sm:justify-end items-center order-1 sm:order-2 "
                    id="mainImageBox">
                    {{-- <span class="close">&times;</span> --}}
                    <img class="mainImageContent max-w-96" id="mainImage" src="{{ asset($product->main_image) }}">
                </div>
            </div>
            <!-- Right Section: Product Details -->
            <div
                class="flex flex-col justify-center sm:justify-between items-center sm:items-start w-full sm:w-5/12 p-5 sm:p-0 h-full mb-10">
                <!-- Product Title -->
                <h1 class="text-xl font-bold pb-4">{{ $product->name }}</h1>
                <!-- Ratings and Reviews -->
                <div class="flex items-center space-x-2 pb-4">
                    <div class="text-yellow-500">
                        ★★★★☆
                    </div>
                    <span class="text-gray-600 text-sm">(10 Review(s))</span>
                    <a href="#" class="text-blue-500 underline text-sm">Add your review</a>
                </div>
                <!-- Pricing -->
                <div class="pb-4">
                    <span class="text-red text-2xl font-bold">$980.00</span>
                    <span class="line-through text-gray-500 ml-2">$990.00</span>
                    <span class="text-green-600 ml-2">IN STOCK</span>
                </div>
                <!-- Description -->
                <p class="text-gray-600 py-8">
                    {{ $product->attributes->firstwhere('name', 'short_description')->value }}
                </p>
                <!-- Size and Color Select -->
                {{-- <div class="flex space-x-4">
                    <div>
                        <label for="size" class="block text-gray-700">Size</label>
                        <select id="size" class="border rounded p-2">
                            <option value="x">X</option>
                            <option value="y">Y</option>
                        </select>
                    </div>
                    <div>
                        <label for="color" class="block text-gray-700">Color</label>
                        <select id="color" class="border rounded p-2">
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                </div> --}}
                <!-- Quantity and Add to Cart -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center border rounded-full">
                        <button class="px-3 py-2" onclick="decrement(this)">-</button>
                        <input type="number" value="1" id="qtyid"
                            class="qty w-12 text-center border-none focus:outline-none">
                        <button class="px-3 py-2" onclick="increment(this)">+</button>
                    </div>
                    <button class="bg-red text-white px-6 py-3 rounded-full hover:bg-red-light" id="add_to_cart"
                        data-id={{ $product->id }}>
                        {{-- onclick="addToCart({{$product->id}})"> --}}
                        ADD TO CART
                    </button>
                </div>
                <!-- Wishlist and Compare -->
                {{-- <div class="flex space-x-4 text-gray-700 text-sm">
                    <a href="#" class="hover:text-red">Add to Wishlist</a>
                    <a href="#" class="hover:text-red">Add to Compare</a>
                </div> --}}
                <!-- Category and Share -->
                <div class="text-gray-700 text-sm pt-5">
                    <p><strong>Category:</strong> {{ $product->category->category_name }}</p>
                    {{-- <p class="flex items-center space-x-2">
                        <span>Share:</span>
                        <a href="#" class="text-blue-500"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-blue-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-red"><i class="fab fa-google"></i></a>
                    </p> --}}
                </div>
            </div>

            {{-- </div> --}}
        </section>
        <section>
            <div class="container mx-auto p-4">
                <div>
                    <!-- Tabs -->
                    <ul class="flex border-b">
                        <li class="mr-1">
                            <button data-tab="description" type="button"
                                class="tab-button bg-red inline-block py-2 px-4 text-white font-semibold rounded-t">
                                Description
                            </button>
                        </li>
                        {{-- <li class="mr-1">
                            <a href="#details" data-tab="tab-2"
                                class="tab-button bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-700">
                                Details
                            </a>
                        </li> --}}
                        <li class="mr-1">
                            <button data-tab="reviews" type="button"
                                class="tab-button  bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-700">
                                Reviews (5)
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="tab-content mt-4">

                    <!-- First Tab -->

                    <div id="description" class="">
                        <p class="text-gray-700"> {!! $product->attributes->firstwhere('name', 'full_description')->value !!}</p>
                    </div>
                    <!-- Second Tab -->
                    <div id="reviews" class="hidden">
                        <div class="flex justify-start items-start gap-12 mt-20">
                            <!--First Column-->
                            <div class="flex justify-start items-center flex-col w-4/12">
                                <!-- Review Section -->
                                <div class="flex items-center mb-4 w-full">
                                    <span class="text-4xl font-bold">4.5</span>
                                    <div class="flex items-center ml-2 text-red">
                                        <span class="text-2xl">&#9733;&#9733;&#9733;&#9733;</span>
                                        <span class="text-gray-400">&#9734;</span>
                                    </div>
                                </div>

                                <!-- Rating Breakdown -->
                                <div class="w-full">
                                    <div class="space-y-2">
                                        <div class="flex items-center">
                                            <span class="text-sm text-gray-500">5 stars</span>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mx-2">
                                                <div class="bg-red h-2 rounded-full" style="width: 60%;"></div>
                                            </div>
                                            <span class="text-sm text-gray-500">3</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-sm text-gray-500">4 stars</span>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mx-2">
                                                <div class="bg-red h-2 rounded-full" style="width: 40%;"></div>
                                            </div>
                                            <span class="text-sm text-gray-500">2</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-sm text-gray-500">3 stars</span>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mx-2"></div>
                                            <span class="text-sm text-gray-500">0</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-sm text-gray-500">2 stars</span>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mx-2"></div>
                                            <span class="text-sm text-gray-500">0</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-sm text-gray-500">1 star</span>
                                            <div class="w-full bg-gray-200 rounded-full h-2 mx-2"></div>
                                            <span class="text-sm text-gray-500">0</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!--second  Column-->
                            <!-- User Reviews -->
                            <div class="w-4/12 flex justify-center items-start">
                                <div class="space-y-4">
                                    <div class="border-b pb-4">
                                        <div class="flex justify-between">
                                            <div>
                                                <h4 class="font-bold">John</h4>
                                                <p class="text-sm text-gray-500">27 DEC 2018, 8:00 PM</p>
                                                <div class="text-red">&#9733;&#9733;&#9733;&#9733;&#9734;</div>

                                            </div>
                                        </div>
                                        <p class="mt-2 text-gray-700">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et
                                            dolore magna aliqua.
                                        </p>
                                    </div>
                                    <div class="border-b pb-4">
                                        <div class="flex justify-between items-center ">
                                            <div>
                                                <h4 class="font-bold">John</h4>
                                                <p class="text-sm text-gray-500">27 DEC 2018, 8:00 PM</p>
                                                <div class="text-red">&#9733;&#9733;&#9733;&#9733;&#9734;</div>

                                            </div>
                                        </div>
                                        <p class="mt-2 text-gray-700">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et
                                            dolore magna aliqua.
                                        </p>
                                    </div>
                                    <div class="border-b pb-4">
                                        <div class="flex justify-between">
                                            <div>
                                                <h4 class="font-bold">John</h4>
                                                <p class="text-sm text-gray-500">27 DEC 2018, 8:00 PM</p>
                                                <div class="text-red">&#9733;&#9733;&#9733;&#9733;&#9734;</div>

                                            </div>
                                        </div>
                                        <p class="mt-2 text-gray-700">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et
                                            dolore magna aliqua.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Review Form -->
                            <div class="w-4/12">
                                <form class="space-y-4">
                                    <input type="text" placeholder="Your Name"
                                        class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red" />
                                    <input type="email" placeholder="Your Email"
                                        class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red" />
                                    <textarea placeholder="Your Review" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-red"></textarea>
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-500 mr-2">Your Rating:</span>
                                        <div class="flex space-x-1">
                                            <span class="text-gray-400 cursor-pointer">&#9734;</span>
                                            <span class="text-gray-400 cursor-pointer">&#9734;</span>
                                            <span class="text-gray-400 cursor-pointer">&#9734;</span>
                                            <span class="text-gray-400 cursor-pointer">&#9734;</span>
                                            <span class="text-gray-400 cursor-pointer">&#9734;</span>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="w-full bg-red text-white py-2 rounded hover:bg-red-light transition">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="flex justify-center mt-4 space-x-2">
                            <button class="px-3 py-1 bg-red text-white rounded">1</button>
                            <button
                                class="px-3 py-1 bg-gray-200 text-gray-500 rounded hover:bg-red-light hover:text-white transition">
                                2
                            </button>
                            <button
                                class="px-3 py-1 bg-gray-200 text-gray-500 rounded hover:bg-red-light hover:text-white transition">
                                3
                            </button>
                            <button
                                class="px-3 py-1 bg-gray-200 text-gray-500 rounded hover:bg-red-light hover:text-white transition">
                                4
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
@endsection
@section('script')
    @vite(['resources/js/cart.js'])
    <!-- Script for Tab Switching -->
    <script>
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content > div');


        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                const tabContent = document.querySelectorAll('.tab-content > div');
                tabContent.forEach(tab => tab.classList.add('hidden'));

                document.getElementById(button.getAttribute('data-tab')).classList.remove('hidden');

                // Update tab styles
                document.querySelectorAll('.tab-button').forEach(tabBtn => {
                    tabBtn.classList.remove('bg-red', 'text-white', 'rounded-t');
                    tabBtn.classList.add('bg-white', 'text-blue-500');
                });
                button.classList.remove('bg-white', 'text-blue-500');
                button.classList.add('bg-red', 'text-white', 'rounded-t');
            });
        });
    </script>
    <script>
        var mainImage = document.getElementById('mainImage');

        function openImage(imgElement) {
            mainImage.src = imgElement.src;
        }
    </script>
    <script>
        let currentSlide = 0; // Track the current slide
        const slides = document.querySelectorAll('.slider-image');
        const totalSlides = slides.length;
        const noOfImagesDisplayed = 3;


        function moveSlide(direction) {
            currentSlide += direction; // Move the slide by 1

            // Check if the current slide is out of range and reset
            if (currentSlide < 0) {
                currentSlide = totalSlides - noOfImagesDisplayed; // Go to the last slide
            } else if (currentSlide >= totalSlides - noOfImagesDisplayed + 1) {
                currentSlide = 0; // Go to the first slide
            }

            updateSlider();
        }

        function updateSlider() {
            console.log(currentSlide);
            // var slideHeight = slides[0].clientHeight; // Get the width of each slide
            // var slideWidth = slides[0].clientWidth; // Get the width of each slide
            // Force recalculation of dimensions
            const slideHeight = slides[0].offsetHeight;
            const slideWidth = slides[0].offsetWidth;
            var slider = document.querySelector('#slider');
            if (window.innerWidth < 640) {
                // slider.style.height = slideHeight;
                slider.style.height = `${slideHeight}px`;
                slider.style.width = `${slideWidth * noOfImagesDisplayed}px`;
                slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
            } else {
                // slider.style.width = slideWidth;
                slider.style.width = `${slideWidth}px`;
                slider.style.height = `${slides[0].clientHeight * noOfImagesDisplayed}px`;
                slider.style.transform = `translateY(-${currentSlide * slideHeight}px)`;
            }
        }

        // Add an event listener for the window resize event
        window.addEventListener('resize', updateSlider);

        // Initialize the slider on page load
        document.addEventListener('DOMContentLoaded', updateSlider);
        // updateSlider();
    </script>
    <script>
        function increment() {
            var qty = document.getElementById('qtyid');
            qty.value = parseInt(qty.value) + 1;
        }

        function decrement() {
            var qty = document.getElementById('qtyid');
            qty.value = parseInt(qty.value) - 1;
            if (qty.value < 0) {
                qty.value = 0;
            }
        }
    </script>

    <script>
        // function addToCart(id){
        //     qty=document.querySelector('#qty');
        //     // console.log(qty.value);
        //     data = {product_id: id, quantity: qty.value};
        //     // console.log(data);
        //     fetch("/cart/add", {
        //             method: "POST",
        //             headers: {
        //                 "X-CSRF-TOKEN": document
        //                     .querySelector('meta[name="csrf-token"]')
        //                     .getAttribute("content"),
        //                     'Content-Type': 'application/json',
        //             },
        //             body: JSON.stringify(data)
        //         })
        //         .then((response) => response.json())
        //         .then((resp) => {
        //             // updateProductList(resp.products);
        //             // document.getElementById("loader").style.display = "none";

        //             if(resp.type === "error" && resp.status === "false") {

        //                 Object.entries(resp.errors).forEach(([key, error]) => {
        //                     const errorElement = document.querySelector(`.reset-${key}`);
        //                     if (errorElement) {
        //                         errorElement.style.color = "red";
        //                         errorElement.textContent = error;
        //                         errorElement.style.display = "block";

        //                         setTimeout(() => {
        //                             errorElement.style.display = "none";
        //                         }, 4000);
        //                     }

        //                     alert(decodeURIComponent(error));
        //                 });
        //             } else if(resp.type === "success") {

        //                 // updateProductList(resp.products);
        //             } else {
        //                 console.log("in");
        //             }
        //         })
        //         .catch(() => {
        //             console.error("Error occurred.");
        //         });

        // }
    </script>
@endsection
