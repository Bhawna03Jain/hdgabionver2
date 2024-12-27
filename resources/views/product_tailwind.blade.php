@extends('layout')
@section('style')
    <style>
        /* #grid-selector .active{
                color:#000000;
            } */
    </style>
@endsection
@section('content')
    <main class="min-h-screen">
        <section class="mt-5">
            <div class="grid grid-cols-12 gap-6"> <!-- Added gap-4 for spacing -->
                <!-- Left Column -->
                <div class="col-span-12 md:col-span-3"> <!-- 4 out of 12 columns for left -->
                    <div class="sidebar__dimensions pl-10 border-r-2 border-gray-200">
                        <form id="filterBasketForm" action="javascript:;" method="POST">
                            @csrf
                            {{-- ****************Length********************** --}}
                            {{-- <div class="section-title my-4">
                                <h4 class="text-3xl font-semibold ">Filter</h4>
                            </div> --}}
                          <section class="flex flex-row md:flex-col justify-around md:justify-start items-baseline md:item-center gap-2 ">
                            <section>
                                <div class="section-title mb-4">
                                    <h4 class="text-lg font-semibold ">Shop by Length</h4>
                                </div>
                                <div class="border-b-4 border-red w-1/4 mb-4"></div>
                                <div class="checklist length_sizes space-y-3">
                                    <div class="flex flex-col space-y-3">
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="length[]"
                                                id="lengthAll" value="length_all">
                                            <label class="form-check-label text-sm" for="lengthAll">All Length</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="length[]"
                                                id="length5x5" value="30">
                                            <label class="form-check-label text-sm" for="length5x5">30cm</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="length[]"
                                                id="length5x10" value="50">
                                            <label class="form-check-label text-sm" for="length5x10">50cm</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="length[]"
                                                id="length5x15" value="100">
                                            <label class="form-check-label text-sm" for="length5x15">100cm</label>
                                        </div>
                                    </div>
                                </div>
                               </section>

                                {{-- ****************Width********************** --}}
                              <section>
                                <div class="section-title mt-6 mb-4">
                                    <h4 class="text-lg font-semibold">Shop by Width</h4>
                                </div>
                                <div class="border-b-4 border-red w-1/4 mb-4"></div>
                                <div class="checklist width_sizes space-y-3">
                                    <div class="flex flex-col space-y-3">
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                id="widthAll" value="width_all">
                                            <label class="form-check-label text-sm" for="widthAll">All width</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                id="width5x5" value="20">
                                            <label class="form-check-label text-sm" for="width5x5">20cm</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                id="width5x10" value="30">
                                            <label class="form-check-label text-sm" for="width5x10">30cm</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                id="width5x15" value="50">
                                            <label class="form-check-label text-sm" for="width5x15">50cm</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                id="width5x20" value="70">
                                            <label class="form-check-label text-sm" for="width5x20">70cm</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                id="width5x25" value="100">
                                            <label class="form-check-label text-sm" for="width5x25">100cm</label>
                                        </div>
                                    </div>
                                </div>
                              </section>

                                {{-- ****************Height********************** --}}
                                <section>
                                    <div class="section-title mt-6 mb-4">
                                        <h4 class="text-lg font-semibold">Shop by Height</h4>
                                    </div>
                                    <div class="border-b-4 border-red w-1/4 mb-4"></div>
                                    <div class="checklist height_sizes space-y-3">
                                        <div class="flex flex-col space-y-3">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="height[]"
                                                    id="heightAll" value="height_all">
                                                <label class="form-check-label text-sm" for="heightAll">All Height</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="height[]"
                                                    id="height30" value="30">
                                                <label class="form-check-label text-sm" for="height30">30cm</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="height[]"
                                                    id="height50" value="50">
                                                <label class="form-check-label text-sm" for="height50">50cm</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="height[]"
                                                    id="height70" value="70">
                                                <label class="form-check-label text-sm" for="height70">70cm</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="height[]"
                                                    id="height100" value="100">
                                                <label class="form-check-label text-sm" for="height100">100cm</label>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                {{-- ****************Maze********************** --}}

                              <section>
                                <div class="section-title mt-6 mb-4">
                                    <h4 class="text-lg font-semibold">Shop by Maze</h4>
                                </div>
                                <div class="border-b-4 border-red w-1/4 mb-4"></div>
                                <div class="checklist maze_sizes space-y-3">
                                    <div class="flex flex-col space-y-3">
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="maze[]"
                                                id="mazeAll" value="maze_all">
                                            <label class="form-check-label text-sm" for="mazeAll">All maze</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="maze[]"
                                                id="maze5x5" value="5x5">
                                            <label class="form-check-label text-sm" for="maze5x5">5×5</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input basket-filter" type="checkbox" name="maze[]"
                                                id="maze5x10" value="5x10">
                                            <label class="form-check-label text-sm" for="maze5x10">5×10</label>
                                        </div>
                                    </div>
                                </div>

                              </section>
                          </section>
                            <!-- Submit Button -->
                            {{-- <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Filter</button> --}}
                        </form>
                    </div>

                </div>

                <!-- Right Column -->
                <div class="col-span-12 md:col-span-9"> <!-- 8 out of 12 columns for right -->
                    <!-- Pagination-->
                    <div id="grid-selector"class="w-full bg-gray-200 p-2 flex justify-between">
                        <div id="basket-pagination"> Showing 1–9 of 48 results</div>
                        <div id="grid-menu" class="pr-5 flex justify between items-center gap-4">
                            View:
                            <ul class="flex justify between items-center gap-4">
                                <li class="largeGrid"  onclick="toggleActive(event,this)"><i
                                            class="fas fa-th text-xl text-red"></i></li>
                                <li class="smallGrid"  onclick="toggleActive(event,this)"><i
                                            class="fas fa-list text-xl text-gray-400"></i></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Grid-->
                    <div id="products-grid" class=" grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <div class="product rounded-lg border border-gray-300 mt-3">
                            <!--Image Box-->
                            <div class="img_box  relative flex justify-center items-center group rounded-full p-4">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-1 text-base view-detail-large rounded-lg bg-red hover:bg-red-light px-1 py-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-1 text-base add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 px-1 py-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3">
                            <!--Image Box-->
                            <div class="img_box  relative flex justify-center items-center group rounded-full p-4">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 text-sm view-detail-large rounded-lg bg-red hover:bg-red-light p-1 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 text-sm add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-1  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3">
                            <!--Image Box-->
                            <div class="img_box  relative flex justify-center items-center group rounded-full p-4">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 text-sm view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 text-sm add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3">
                            <!--Image Box-->
                            <div class="img_box  relative flex justify-center items-center group rounded-full p-4">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 text-sm view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 text-sm add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3">
                            <!--Image Box-->
                            <div class="img_box  relative flex justify-center items-center group rounded-full p-4">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 text-sm view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 text-sm add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3">
                            <!--Image Box-->
                            <div class="img_box  relative flex justify-center items-center group rounded-full p-4">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 text-sm view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 text-sm add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3">
                            <!--Image Box-->
                            <div class="img_box  relative flex justify-center items-center group rounded-full p-4">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 text-sm view-detail-large rounded-lg bg-red hover:bg-red-light p-1 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 text-sm add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-1    w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- List-->
                    <div id="products-list" class="hidden grid grid-cols-2 gap-6">
                        <div class="product rounded-lg border border-gray-300 mt-3 flex">
                            <!--Image Box-->
                            <div class="img_box relative flex justify-center items-center group rounded-full p-4 w-1/2  ">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg w-1/2">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3 flex">
                            <!--Image Box-->
                            <div class="img_box relative flex justify-center items-center group rounded-full p-4 w-1/2  ">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg w-1/2">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3 flex">
                            <!--Image Box-->
                            <div class="img_box relative flex justify-center items-center group rounded-full p-4 w-1/2  ">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg w-1/2">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 text-base view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 text-base add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3 flex">
                            <!--Image Box-->
                            <div class="img_box relative flex justify-center items-center group rounded-full p-4 w-1/2  ">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg w-1/2">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3 flex">
                            <!--Image Box-->
                            <div class="img_box relative flex justify-center items-center group rounded-full p-4 w-1/2  ">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg w-1/2">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="product rounded-lg border border-gray-300 mt-3 flex">
                            <!--Image Box-->
                            <div class="img_box relative flex justify-center items-center group rounded-full p-4 w-1/2  ">
                                <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png') }}" alt="" class="max-h-60"/>
                                <div
                                    class="image_overlay  absolute top-0 left-0 w-full h-full bg-red hover:opacity-70 opacity-0 transition-all duration-300 group-hover:opacity-70">

                                </div>
                                <div
                                    class="absolute text-white top-0 left-0 w-full h-full gap-6 flex justify-center items-center flex-col bg-transparent opacity-0 group-hover:opacity-100">
                                    <div
                                        class="add_to_cart w-1/2  text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        Zoom</div>
                                    <div
                                        class="view_gallery w-1/2 text-center px-3 py-2 rounded-lg border border-white hover:bg-white hover:text-red transition-all duration-300">
                                        3D</div>
                                </div>
                            </div>
                            <!--Info-->
                            <div class="flex justify-start items-center flex-col gap-5 pt-5 bg-gray-100 rounded-lg w-1/2">
                                <div class="flex justify-center items-center flex-col gap-1">
                                    <h4 class='font-bold text-2xl w-full text-center'>Gabion Basket</h4>
                                    <p class="text-sm">
                                        Dimension-100x100x100
                                    </p>
                                    <p class="text-sm">Mesh Size-10x10</p>
                                </div>

                                <div class="price-big flex justify-center gap-6 items-center w-full">
                                    <span class="text-2xl text-bold text-red">$43</span> <span  class="text-xl text-gray-500 line-through">$39</span>
                                </div>
                                <div class="action-btn flex justify-center items-center w-full gap-2 mb-1">
                                    <button class="ml-2 view-detail-large rounded-lg bg-red hover:bg-red-light p-2 w-1/2 text-white font-bold transition-all duration-300">View Detail</button>
                                    <button class="mr-2 add-cart-large  rounded-lg bg-secondary-800 hover:bg-secondary-700 p-2  w-1/2 text-white font-bold transition-all duration-300">Add To Cart</button>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
@section('script')
    <script>
        var gridLayout=document.getElementById('products-grid');
        var listLayout=document.getElementById('products-list');

        function toggleActive(event, element) {
            // Prevent the default anchor tag behavior (page refresh)
            event.preventDefault();

            // Remove 'text-black' class from all icons and set them to gray
            const icons = document.querySelectorAll('#grid-selector i');
            icons.forEach(icon => {
                icon.classList.remove('text-red');
                icon.classList.add('text-gray-400');
            });

            // Add 'text-red' class to the clicked icon and remove 'text-gray-400'
            const icon = element.querySelector('i');
            icon.classList.toggle('text-red');
            icon.classList.toggle('text-gray-400');



        if (element.classList.contains("largeGrid")) {
        // Show div1 (large grid), hide div2 (small grid)
        gridLayout.classList.remove("hidden");
        listLayout.classList.add("hidden");


    } else {
        gridLayout.classList.add("hidden");
        listLayout.classList.remove("hidden");
    }
}
    </script>
@endsection
