@extends('front.Layout.layout')

@section('style')
    <style>
        .tab-container {
            background: #344152;
            padding: 0;
            border: solid 1px #444;
            height: 440px;
            overflow: hidden;
            width: 100%;
        }

        .nav-tabs.nav-tabs-left {
            float: left;
            border-right: 0;
            width: 25%;
        }

        .nav-tabs.nav-tabs-left .nav-item {
            width: 100%;
            /* Ensure each tab item takes full width */
        }

        .nav-tabs.nav-tabs-left .nav-link {
            display: block;
            /* Stack links vertically */
            text-align: left;
            background-color: #344152;
            color: #fff;
        }

        .nav-tabs.nav-tabs-left .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.9);
            color: #444;
        }

        .nav-tabs.nav-tabs-left .nav-link.active {
            background-color: #fff;
            color: #333;
        }

        .tab-content {
            background: #fff;
            height: 440px;
            overflow-y: auto;
            padding: 20px;
            width: 75%;
            float: right;
        }
    </style>


{{-- *************************Top Header Carousel*************** --}}
<style>
    .custom-container {
        position: relative;
        overflow: hidden;
        height: 250px;
        max-height: 250px;
        background: #000;
    }

    .carousel {
        position: relative;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .carousel-inner {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .carousel-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transform: scale(1);
        transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
    }

    .carousel-item.active {
        opacity: 1;


    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.4) contrast(1.2);
        transform-style: preserve-3d;
    }


    .carousel-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.15) 50%, rgba(0, 0, 0, 0.2) 100%);
        opacity: 0.6;
        transition: opacity 0.4s ease-in-out;
        transform: rotateY(15deg) skewX(5deg);
        pointer-events: none;
        z-index: 1;
    }



    @keyframes tectonicLeft {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }

        20% {
            transform: translateX(0);
            opacity: 1;
        }

        80% {
            transform: translateX(0);
            opacity: 1;
        }

        100% {
            transform: translateX(-100%);
            opacity: 0;
        }
    }

    @keyframes tectonicRight {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }

        20% {
            transform: translateX(0);
            opacity: 1;
        }

        80% {
            transform: translateX(0);
            opacity: 1;
        }

        100% {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    @keyframes tectonicTop {
        0% {
            transform: translateY(-100%) translateX(-50%);
            opacity: 0;
        }

        20% {
            transform: translateY(0) translateX(-50%);
            opacity: 1;
        }

        80% {
            transform: translateY(0) translateX(-50%);
            opacity: 1;
        }

        100% {
            transform: translateY(-100%) translateX(-50%);
            opacity: 0;
        }
    }

    @keyframes tectonicBottom {
        0% {
            transform: translateY(100%) translateX(-50%);
            opacity: 0;
        }

        20% {
            transform: translateY(0) translateX(-50%);
            opacity: 1;
        }

        80% {
            transform: translateY(0) translateX(-50%);
            opacity: 1;
        }

        100% {
            transform: translateY(100%) translateX(-50%);
            opacity: 0;
        }
    }


    .left-arrow,
    .right-arrow {
        height: 400px;
        position: relative;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .left-arrow-1 {
        background-color: rgba(128, 128, 128, 0.1);
        width: 450px;
    }

    .left-arrow-2 {
        background-color: rgba(255, 255, 255, 0.2);
        width: 300px;
    }

    .triangle-left {
        position: absolute;
        width: 300px;
        height: 400px;
        left: 100%;
        clip-path: polygon(0 0, 0 100%, 30% 50%);
    }

    .triangle-left-1 {
        background-color:  rgba(128, 128, 128, 0.1);
    }

    .triangle-left-2 {
        background-color:  rgba(255, 255, 255, 0.2);
    }

    .right-arrow-1 {
        background-color:  rgba(128, 128, 128, 0.1);
        width: 450px;
    }

    .right-arrow-2 {
        background-color: rgba(255, 255, 255, 0.2);
        width: 300px;
    }

    .triangle-right {
        position: absolute;
        width: 300px;
        height: 400px;
        right: 100%;
        clip-path: polygon(100% 0, 100% 100%, 70% 50%);
    }

    .triangle-right-1 {
        background-color:  rgba(128, 128, 128, 0.1);
    }

    .triangle-right-2 {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .triangle-vertical {
        position: absolute;
        width: 150px;
        height: 100px;
        left: 50%;
        transform: translateX(-50%);
        background-color:rgba(255, 255, 255, 0.2);
        z-index: 2;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .triangle-above {
        top: 0;
        clip-path: polygon(50% 100%, 0 0, 100% 0);
    }

    .triangle-below {
        bottom: 0;
        clip-path: polygon(0 100%, 50% 0, 100% 100%);
    }

    .animate-left {
        animation: tectonicLeft 3s ease-in-out;
    }

    .animate-right {
        animation: tectonicRight 3s ease-in-out;
    }

    .animate-top {
        animation: tectonicTop 3s ease-in-out;
    }

    .animate-bottom {
        animation: tectonicBottom 3s ease-in-out;
    }



    .text-overlay {
        position: absolute;
        /* bottom: 45%; */
        top:0px;
        left:0px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        text-align: center;
        font-size: 3em;
        font-weight: 700;
        color: #fff;
        background: linear-gradient(90deg, #b0c4de, #ffffff, #b0c4de);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4), -2px -2px 4px rgba(255, 255, 255, 0.3),
                     0 0 15px rgba(255, 255, 255, 0.3), 0 0 20px rgba(255, 255, 255, 0.2);
        transition: opacity 1s ease-in-out, transform 0.3s ease-in-out;
        transform: translateZ(20px) perspective(500px);
    }




</style>

{{-- *************************End Top header carousel********************** --}}
    {{-- *****************Overlapping images***************** --}}


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Molle:ital@1&display=swap');

        .aboutsection {
            background-color: #f6feff;
            /* background: #076585; */
            background: #9CACAE;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #fff, #9CACAE);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #fff, #9CACAE);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        h1 {
            /* font-family: 'Molle', cursive; */
            color: CornflowerBlue;
        }

        p {
            color: DimGrey;
        }

        .padding {
            padding: 80px 0;
        }

        .aboutsection .about_img img {
            max-width: 90%;
            border-radius: 15px;
            box-shadow: 0 16px 28px 0 rgba(8, 56, 103, .5);
        }

        @media (max-width:992px) {
            .aboutsection .about_img img {
                width: 60%;
            }

            .about_section .about_img_2 {
                margin: -200px 0 0 200px;
            }

            .about_section .about_img_3 {
                margin: -160px 0 0 40px;
            }
        }

        @media(max-width:991px) {
            .aboutsection .about_img img {
                margin: 3rem 0;
            }
        }

        .about_section .content {
            background-color: white;
            border-radius: 35px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">

                <div class="custom-container">
                    <div id="breathingCarousel" class="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/AITool/DALL·E 2024-11-25 10.40.40 - A modern landscaped garden featuring a rectangular grassy plot elevated with gabion walls made of wire mesh baskets filled with neatly stacked light-c.webp') }}" alt="Slide 1">
                                <div class="text-overlay" data-text="Text for Slide 1">Text for Slide 1</div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/AITool/Leonardo_Phoenix_A_serene_and_vibrant_scene_featuring_a_majest_0 (1).jpg') }}" alt="Slide 2">
                                <div class="text-overlay" data-text="Text for Slide 1">Text for Slide 2</div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/AITool/DALL·E 2024-11-25 10.42.17 - A detailed outdoor scene showcasing gabion walls made of wire mesh baskets filled with uniformly stacked stones, forming a modern, clean boundary. The.webp') }}" alt="Slide 3">
                                <div class="text-overlay" data-text="Text for Slide 1">Text for Slide 3</div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/AITool/DALL·E 2024-11-25 10.42.17 - A detailed outdoor scene showcasing gabion walls made of wire mesh baskets filled with uniformly stacked stones, forming a modern, clean boundary. The.webp') }}" alt="Slide 4">
                                <div class="text-overlay" data-text="Text for Slide 1">Text for Slide 4</div>
                            </div>
                        </div>

                        <!-- Left Arrows -->
                        <div class="position-absolute start-0 top-0">
                            <div class="left-arrow left-arrow-1 ">
                                <div class="triangle-left triangle-left-1"></div>
                            </div>
                        </div>
                        <div class="position-absolute start-0 top-0">
                            <div class="left-arrow left-arrow-2">
                                <div class="triangle-left triangle-left-2"></div>
                            </div>
                        </div>

                        <!-- Right Arrows -->
                        <div class="position-absolute end-0 top-0">
                            <div class="right-arrow right-arrow-1">
                                <div class="triangle-right triangle-right-1"></div>
                            </div>
                        </div>
                        <div class="position-absolute end-0 top-0">
                            <div class="right-arrow right-arrow-2">
                                <div class="triangle-right triangle-right-2"></div>
                            </div>
                        </div>

                        <!-- Vertical Triangles -->
                        <div class="triangle-vertical triangle-above"></div>
                        <div class="triangle-vertical triangle-below"></div>
                    </div>
                </div>
                <section class="intro py-5">
                    <div class="container">
                        <h2 class="text-center sectionsubheading">Welcome To</h2>
                        <h1 class="text-center primaryheading"><span>HD-GABION</span></h1>
                        <hr class="pinkline">
                        <p class="text-justify">
                            <b>HD-GABION</b> is a <b>leading gabion walls and gabion baskets manufacturing company based in Poland</b>.
                            We specialize in providing durable, eco-friendly, and cost-effective solutions tailored to meet the needs of
                            customers across Central Europe. Our mission is to deliver innovative gabion products that are not only practical
                            but also enhance the aesthetic value of your property.
                        </p>
                        <p class="text-justify">
                            At <b>HD-GABION</b>, we pride ourselves on using advanced technology and premium materials to produce gabion
                            fences, retaining walls, and baskets designed for durability and versatility. Our core services include
                            <b>customized gabion solutions, 3D visualization, expert assembly advice, and competitive pricing</b>. Whether
                            you need a stylish fence, a functional retaining wall, or a custom design, we are here to assist you every step
                            of the way.
                        </p>
                        <div class="text-center mt-3">
                            <a href="#" class="btn clipbtn"><i class="fa fa-send"></i> Know More >></a>
                        </div>
                    </div>
                </section>

                {{-- *********************** Introduction Section *********************** --}}
                <section id="intro" class="py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="display-4">Expertly Crafted Gabion Solutions</h1>
                                <p class="lead text-muted">Durable, Affordable, and Tailored for You!</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <!-- Placeholder for future content or image -->
                                <div class="text-center h-100 d-flex align-items-center justify-content-center">
                                    <p><b>Global Presence Across Europe</b></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    Welcome to <strong>HD-GABION</strong>, your trusted partner in premium gabion manufacturing. As a certified
                                    leader in the industry, we specialize in producing high-quality gabion baskets and walls from our Poland
                                    facilities, proudly serving customers across Central Europe.
                                </p>
                                <p>
                                    With branches in <b>Spain, Poland, Germany, Netherlands, Czechia, France, and Slovakia</b>, we ensure our
                                    products and services are accessible to a wide customer base. We offer full multilingual support, providing
                                    services in the native languages of each region to better cater to your needs and expectations.
                                </p>
                                <p>
                                    With years of expertise and thousands of kilometers of gabion fences installed, we’ve earned a reputation
                                    for reliability, innovation, and competitive pricing. Our commitment to excellence ensures you receive
                                    durable products at the best value on the market.
                                </p>
                                <p>
                                    At <strong>HD-GABION</strong>, we do more than manufacture gabions—we guide you every step of the way. From
                                    expert advice on material selection to customized 3D visualizations of your gabion fence, we provide
                                    comprehensive solutions tailored to your needs. Our team delivers detailed price quotes, ensuring
                                    transparency and satisfaction.
                                </p>
                                <p>
                                    Choose <strong>HD-GABION</strong> for gabion solutions that combine strength, affordability, and style. Let us
                                    help you build fences and walls that stand the test of time while enhancing your property’s aesthetic appeal.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="intro py-5">
    <div class="container">
        <h2 class="text-center sectionsubheading">Welcome To</h2>
        <h1 class="text-center primaryheading"><span>HD-GABION</span></h1>
        <hr class="pinkline">
        <p class="text-justify">
            <b>HD-GABION</b> is a trusted manufacturer of high-quality gabion walls and baskets, proudly serving
            Central Europe from our base in Poland. With branches in <b>Spain, Germany, Netherlands, Czechia, France,
            and Slovakia</b>, we offer durable, eco-friendly, and stylish solutions for fences, retaining walls, and
            custom projects.
        </p>
        <p class="text-justify">
            We provide <b>multilingual support</b>, tailored 3D visualizations, and expert guidance to ensure your
            project’s success. Choose HD-GABION for innovation, affordability, and aesthetics that enhance your property.
        </p>
        <div class="text-center mt-3">
            <a href="#" class="btn clipbtn"><i class="fa fa-send"></i> Learn More >></a>
        </div>
    </div>
</section>
  {{-- ===================Department======================= --}}
  <style>
    .departments {
        overflow: hidden;
    }

    .departments .nav-tabs {
        border: 0;
    }

    .departments .nav-link {
        border: 0;
        padding: 12px 15px 12px 0;
        transition: 0.3s;
        color: #2c4964;
        border-radius: 0;
        border-right: 2px solid #ebf1f6;
        font-weight: 600;
        font-size: 15px;
    }

    .departments .nav-link:hover {
        color: #1977cc;
    }

    .departments .nav-link.active {
        color: #1977cc;
        border-color: #1977cc;
    }

    .departments .tab-pane.active {
        animation: fadeIn 0.5s ease-out;
    }

    .departments .details h3 {
        font-size: 26px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #2c4964;
    }

    .departments .details p {
        color: #777777;
    }

    .departments .details p:last-child {
        margin-bottom: 0;
    }

    .departments section {
        padding: 60px 0;
        overflow: hidden;
    }

    .departments .section-title {
        text-align: center;
        padding-bottom: 30px;
    }

    .departments .section-title h2 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
        padding-bottom: 20px;
        position: relative;
        color: #2c4964;
    }

    @media (max-width: 992px) {
        .departments .nav-link {
            border: 0;
            padding: 15px;
        }

        .departments .nav-link.active {
            color: #fff;
            background: #1977cc;
        }

        .departments .section-title p {
            text-align: center;
        }
    }
</style>
<section id="departments" class="departments mainSection">
    <div class="container">

        <div class="section-title">
            <h2>Types of Gabion Solutions We Offer</h2>
            <p class="text-center">Explore our comprehensive range of gabion solutions tailored to meet various
                landscaping and construction needs.</p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Gabion Fences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Gabion Baskets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Retaining Walls</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Decorative Gabions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Custom Gabion Solutions</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Gabion Fences</h3>
                                <p class="fst-italic">Gabion fences are a perfect blend of functionality and
                                    aesthetics, offering durability and style for your property.</p>
                                <p>Constructed with high-quality wire mesh and filled with natural stones, gabion
                                    fences provide excellent privacy, sound insulation, and a natural appearance.
                                    They are suitable for both residential and commercial use, ensuring a
                                    low-maintenance, long-lasting solution.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="assets/img/gabion-fence.jpg" alt="Gabion Fence" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Gabion Baskets</h3>
                                <p class="fst-italic">Gabion baskets are versatile solutions for erosion control,
                                    landscaping, and architectural projects.</p>
                                <p>Available in various sizes and shapes, these baskets are made of galvanized or
                                    PVC-coated wire mesh, ensuring strength and corrosion resistance. Filled with
                                    stones or other materials, they are ideal for stabilizing slopes, building
                                    walls, or creating decorative features.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="assets/img/gabion-basket.jpg" alt="Gabion Basket" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Retaining Walls</h3>
                                <p class="fst-italic">Retaining walls made with gabions are both functional and
                                    environmentally friendly.</p>
                                <p>These walls are designed to withstand pressure and prevent soil erosion while
                                    blending seamlessly into natural landscapes. Their modular structure allows for
                                    easy installation and customization, making them ideal for gardens, terraces,
                                    and civil engineering projects.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="assets/img/retaining-wall.jpg" alt="Gabion Retaining Wall"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Decorative Gabions</h3>
                                <p class="fst-italic">Enhance your outdoor spaces with decorative gabions,
                                    combining beauty and durability.</p>
                                <p>These gabions can be used to create unique garden features, planters, benches,
                                    and more. Filled with colorful stones, glass, or other materials, they provide a
                                    modern and artistic touch to any landscape design.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="assets/img/decorative-gabion.jpg" alt="Decorative Gabion"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-5">
                        <div class="row gy-4">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Custom Gabion Solutions</h3>
                                <p class="fst-italic">Tailored gabion solutions designed to meet your specific
                                    project requirements.</p>
                                <p>We provide fully customizable gabion designs, including unique shapes, materials,
                                    and finishes, to cater to your creative vision. Whether for residential,
                                    commercial, or industrial applications, our custom solutions ensure high quality
                                    and unmatched versatility.</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="assets/img/custom-gabion.jpg" alt="Custom Gabion Solution"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
{{-- ===================End Department======================= --}}
            {{-- ************************Overlapping Images ************** --}}
            {{-- <section class="about_section padding">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="content col-12 col-lg-7 p-4 ">
                            <div class="text-center">
                                <h1 class="my-5">Certified Manufacturer of Gabions: High-Quality Solutions at Competitive Prices</h1>
                                <p class="mb-5">As a certified manufacturer of gabions, we have established ourselves as a trusted leader in the industry. With years of experience and a commitment to excellence, our Poland-based production has enabled us to deliver thousands of kilometers of gabion fences annually across Central Europe.</p>
                                <p><strong>The Modular Gabion System GOLD</strong> takes this concept to the next level with
                                    a flexible, reusable, and durable design that is easily adaptable to different
                                    landscaping and infrastructure projects.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 p-3">
                            <div class="about_img">
                                <img src="{{ asset('images/baskets_lemon/gabion1.jpg') }}" alt="idea-images"
                                    class="about_img_1 ">
                                <img src="{{ asset('images/baskets_lemon/gabion2.jpg') }}" alt="idea-images"
                                    class="about_img_2">
                                <img src="{{ asset('images/baskets_lemon/gabion3.jpg') }}" alt="idea-images"
                                    class="about_img_3">
                            </div>
                        </div>

                    </div>
                </div>
            </section> --}}
            {{-- *******Certified************** --}}
            <section class="aboutsection padding">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="content col-12 col-lg-8">
                            <div class="text-center">
                                <h1 class="my-5">Certified Manufacturer of Gabions: High-Quality Solutions at Competitive Prices</h1>
                                <p class="mb-5">As a certified manufacturer of gabions, we have established ourselves as a trusted leader in the industry. With years of experience and a commitment to excellence, our Poland-based production has enabled us to deliver thousands of kilometers of gabion fences annually across Central Europe.</p>
                                <p><strong>The Modular Gabion System GOLD</strong> takes this concept to the next level with
                                    a flexible, reusable, and durable design that is easily adaptable to different
                                    landscaping and infrastructure projects.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="about_img">
                                <img src="{{ asset('images/baskets_lemon/gabion1.jpg') }}" alt="idea-images"
                                    class="about_img_1 ">

                            </div>
                        </div>

                    </div>
                </div>

            </section>
            <section class="padding">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <!-- Image Section -->
                        <div class="col-12 col-lg-4">
                            <div class="about_img text-center">
                                <img src="{{ asset('images/baskets_lemon/gabion1.jpg') }}" alt="High-Quality Gabion Products" class="about_img_1 img-fluid rounded shadow">
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="col-12 col-lg-8">
                            <div class="content">
                                <h1 class="mb-4">Why Choose Us for Your Gabion Needs?</h1>
                                <div class="mb-3">
                                    <h4 class="text-primary">Premium Quality at the Best Prices</h4>
                                    <p>We continually enhance our production to deliver durable, high-quality gabions at the most competitive prices available.</p>
                                </div>
                                <div class="mb-3">
                                    <h4 class="text-primary">Comprehensive Support</h4>
                                    <p>Our team provides expert guidance on selecting the ideal gabion products and stones, along with step-by-step assembly instructions.</p>
                                </div>
                                <div class="mb-3">
                                    <h4 class="text-primary">Custom 3D Visualization</h4>
                                    <p>Bring your project to life with our tailored 3D gabion fence designs, including a personalized price quote.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<section>

</section>
        </div>
    </section>
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('breathingCarousel');
        const items = carousel.querySelectorAll('.carousel-item');
        const leftArrows = carousel.querySelectorAll('.left-arrow');
        const rightArrows = carousel.querySelectorAll('.right-arrow');
        const verticalTriangles = carousel.querySelectorAll('.triangle-vertical');
        const textElements = document.querySelectorAll('.text-overlay');
        const metallicLine = carousel.querySelector('.metallic-line');
        const metallicLine2 = carousel.querySelector('.metallic-line-2');
        let currentIndex = 0;
        let isAnimating = false;

        function startTectonicAnimation() {
            // Set initial opacity for left/right arrows
            leftArrows.forEach(arrow => {
                arrow.style.opacity = '1';
            });
            rightArrows.forEach(arrow => {
                arrow.style.opacity = '1';
            });

            // Start the arrow entry animations with a short delay
            setTimeout(() => {
                leftArrows.forEach(arrow => {
                    arrow.classList.add('animate-left');
                });
                rightArrows.forEach(arrow => {
                    arrow.classList.add('animate-right');
                });
                textElements.forEach(text => {
                    text.style.opacity = '0.1';
                });
            }, 200);

            // Start vertical triangle animations slightly later
            setTimeout(() => {
                verticalTriangles.forEach(triangle => {
                    triangle.style.opacity = '1';
                });
                verticalTriangles[0].classList.add('animate-top');
                verticalTriangles[1].classList.add('animate-bottom');
            }, 800);

            // Smooth and slow exit of arrows and triangles
            setTimeout(() => {
                leftArrows.forEach(arrow => {
                    arrow.classList.remove('animate-left');
                    arrow.style.transition = 'opacity 3s ease'; // Slow exit
                    arrow.style.opacity = '0.1';
                });
                rightArrows.forEach(arrow => {
                    arrow.classList.remove('animate-right');
                    arrow.style.transition = 'opacity 3s ease'; // Slow exit
                    arrow.style.opacity = '0.1';
                });
                verticalTriangles.forEach(triangle => {
                    triangle.classList.remove('animate-top');
                    triangle.classList.remove('animate-bottom');
                    triangle.style.transition = 'opacity 10s ease'; // Slow exit
                    triangle.style.opacity = '0.1';
                });

                textElements.forEach(text => {
                    text.style.opacity = '1';
                });
            }, 3000); // Longer exit delay for a smoother feel
        }

        function transition() {
            if (isAnimating) return;
            isAnimating = true;

            const currentItem = items[currentIndex];
            const nextIndex = (currentIndex + 1) % items.length;
            const nextItem = items[nextIndex];

            nextItem.style.opacity = '0';
            nextItem.style.transform = 'scale(1)';
            nextItem.classList.add('active');

            let progress = 0;
            const duration = 4000;
            const interval = 50;
            const steps = duration / interval;
            let arrowAnimationStarted = false;

            const animate = () => {
                if (progress >= steps) {
                    currentItem.classList.remove('active');
                    currentItem.style.transform = 'scale(1.2)';
                    currentItem.style.opacity = '0';

                    currentIndex = nextIndex;
                    isAnimating = false;

                    // Start the next transition after a 2-second pause
                    setTimeout(transition, 2000);
                    return;
                }

                const scale = 1 + (0.4 * progress / steps); // Smooth and continuous zoom
                const currentOpacity = Math.max(0, 1 - (progress / steps));
                const nextOpacity = progress / steps;

                currentItem.style.transform = `scale(${scale})`;
                currentItem.style.opacity = currentOpacity;
                nextItem.style.opacity = nextOpacity;

                // Trigger arrow animation once at the start of the transition
                if (nextOpacity >= 0.4 && !arrowAnimationStarted) {
                    arrowAnimationStarted = true;
                    startTectonicAnimation();
                }

                progress++;
                setTimeout(animate, interval);
            };

            animate();
        }

        // Trigger initial arrow animation
        setTimeout(startTectonicAnimation, 10);

        // Start the transition sequence after the initial animation
        setTimeout(transition, 5000);


    });
</script>
@endsection
