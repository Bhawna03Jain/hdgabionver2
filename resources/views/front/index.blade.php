@extends('front.Layout.layout')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/css/glightbox.css"
        integrity="sha512-iQ3H4A+iyBTP8M4ypX5PrTt2S+G1zmRjf0k0uOASKlFHysV8TL9ZoQyVwPss0D12IBTMoDEHA8+bg8a1viS9Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('rs-plugin/css/settings.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />
    <style>
        @media only screen and (min-width: 992px) {
            .tp-banner ul li:nth-child(1) .imgbox3 {
                right: 15% !important;
            }

            .tp-banner ul li:nth-child(1) .imgbox3 img {
                width: 23vw !important;
                height: auto !important;
            }

            .tp-banner ul li:nth-child(1) .imgbox1 {
                left: 45% !important;
            }

            .tp-banner ul li:nth-child(1) .imgbox1 img {
                width: 23vw !important;
                height: auto !important;
            }

            .tp-banner ul li:nth-child(1) .imgbox2 {
                left: 55% !important;
            }

            .tp-banner ul li:nth-child(1) .imgbox2 img {
                width: 23vw !important;
                height: auto !important;
            }
        }
    </style>
@endsection

@section('main-content')
    <section class="content">
        <section id="home-particle-carousel" class="">
            <div id="particles-js" style="height: 80vh;"></div>
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <li data-transition="fade" data-slotamount="7">
                            <img alt="" src="../front/images/AITool/12.jpg"
                                data-lazyload="../front/images/AITool/12.jpg" data-duration="1000"
                                style="width: 100%; height: auto;" />

                            <div class="overlay">
                                <div class="imgbox3 caption shadowed randomrotate randomrotateout" data-y="150"
                                    data-x="350" data-speed="1200" data-start="00" data-easing="Power4.easeOut"
                                    data-splitin="none" data-splitout="none" data-elementdelay="0"
                                    data-endelementdelay="0.1" data-endspeed="500" data-endeasing="Power4.easeIn">
                                    <model-viewer id="transform" camera-controls touch-action="pan-y" ar
                                        src="{{ asset('images/glb/logo10.glb') }}" alt="A 3D model of an astronaut"
                                        class="" style="transform: scale(1.5);">
                                    {{-- <img src="{{ asset('front/images/logo/animation/logo2.gif') }}" alt=""
                                        srcset="" style="width:100%; height: auto;"> --}}
                                </div>
                                <div class="caption medium-title tp-scrollbelowslider" data-y="70" data-x="center"
                                    data-hoffset="0" data-speed="600" data-start="0" data-easing="Power4.easeOut"
                                    data-splitin="chars" data-splitout="chars" data-elementdelay="0.05"
                                    data-endelementdelay="0.05" data-endspeed="300" data-endeasing="Power1.easeOut">
                                    HD-Gabion
                                </div>
                                <div class="caption large-text tp-resizeme "
                                    style="

                                color: rgb(206, 206, 17);
                                font-size: 30px;
                                font-weight:700;
                                text-transform: uppercase;word-break: break-word;"
                                    data-y="400" data-x="center" data-voffset="-100" data-speed="300" data-start="1200"
                                    data-easing="Power4.easeOut" data-splitin="chars" data-splitout="chars"
                                    data-elementdelay="0.05" data-endelementdelay="0.05" data-endspeed="300"
                                    data-endeasing="Power1.easeOut">
                                    Leading Gabion walls and baskets manufacturing company in Poland.
                                </div>

                        </li>
                        <li data-transition="fade" data-slotamount="7">
                            <img alt="" src="../front/images/AITool/12.jpg"
                                data-lazyload="../front/images/AITool/12.jpg" data-duration="1000"
                                style="width: 100%; height: auto;" />

                            <div class="overlay">
                                <div class="caption large-text tp-resizeme witTxt"
                                    style="color: white;
                                font-size: 30px;
                                text-transform: uppercase;"
                                    data-x="0" data-y="320" data-speed="600" data-start="0"
                                    data-easing="Power4.easeOut" data-splitin="chars" data-splitout="chars"
                                    data-elementdelay="0.05" data-endelementdelay="0.05" data-endspeed="300"
                                    data-endeasing="Power1.easeOut">
                                    Strong and Durable
                                </div>
                                <div class="caption medium-title tp-resizeme" data-x="0" data-y="360" data-speed="600"
                                    data-start="1200" data-easing="Power4.easeOut" data-splitin="chars"
                                    data-splitout="chars" data-elementdelay="0.05" data-endelementdelay="0.05"
                                    data-endspeed="300" data-endeasing="Power1.easeOut">
                                    Perfect for Your Property
                                </div>
                                <div class="caption lft tp-resizeme" data-x="0" data-y="0" data-speed="600"
                                    data-start="1400" style="position: relative;">
                                    <div style="height: 80px;width: 2px;background:#fff;left:10px;position: absolute;">
                                    </div>
                                    <div
                                        style="position:absolute;left:-50px;background: #fff; padding: 10px; border-radius: 50%; line-height: 40px; color: #777; text-transform: uppercase; font-size: 14px; margin-top: 80px;">
                                        Eco-Friendly
                                    </div>
                                </div>
                                <div class="caption lft tp-resizeme" data-x="70" data-y="0" data-speed="600"
                                    data-start="1700" style="position: relative;">
                                    <div
                                        style="height: 130px;width: 2px;background: #b8b8b8;left:30px;position: absolute;">
                                    </div>
                                    <div
                                        style="position:absolute;left:-30px;background: rgb(53, 31, 196); padding: 10px; border-radius: 50%; line-height: 40px; color: #fff; text-transform: uppercase; font-size: 14px; margin-top: 130px;">
                                        Long Lasting
                                    </div>
                                </div>
                                <div class="caption lft tp-resizeme" data-x="140" data-y="0" data-speed="600"
                                    data-start="2000" style="position: relative;">
                                    <div style="height: 180px;width: 2px;background: #fff;left:50px;position: absolute;">
                                    </div>
                                    <div
                                        style="position:absolute;left:0px;background: red;padding: 10px 20px;border-radius: 50%;line-height: 40px;color: #fff;text-transform: uppercase;font-size: 14px;margin-top: 180px;">
                                        Cost Effective
                                    </div>
                                </div>
                                <div class="imgbox3 caption shadowed lfr ltt" data-y="150" data-x="700"
                                    data-speed="600" data-start="2600" data-easing="Power4.easeOut" data-splitin="none"
                                    data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1"
                                    data-endspeed="500" data-endeasing="Power4.easeIn">
                                    {{-- <img alt="" src="../front/images/basket_orig/Basket 2.178.png"
                                        style="width:200px;" /> --}}
                                    <model-viewer id="transform" camera-controls touch-action="pan-y" ar
                                        src="{{ asset('images/glb/Basket2.glb') }}" alt="A 3D model of an astronaut"
                                        class="" style="transform: scale(3.2);" orientation="0deg 90deg 0deg">

                                </div>

                                {{-- <div class="imgbox1 caption shadowed lft ltt" data-y="18" data-x="335" data-speed="600"
                                    data-start="1700" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none"
                                    data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500"
                                    data-endeasing="Power4.easeIn">
                                    <img alt="" src="../images/carousel/web2.png" />
                                </div>

                                <div class="imgbox2 caption shadowed lfl ltt" data-y="230" data-x="500" data-speed="600"
                                    data-start="1900" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none"
                                    data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="500"
                                    data-endeasing="Power4.easeIn">
                                    <img alt="" src="../images/carousel/seo2.png" />
                                </div> --}}
                        </li>

                        {{-- <li data-transition="fade" data-slotamount="7">
                            <img alt="" src="../front/images/AITool/12.jpg"
                                data-lazyload="../front/images/AITool/12.jpg" data-duration="1000"
                                style="width: 100%; height: auto;" />

                            <div class="overlay">
                                <div class="caption large-text tp-resizeme witTxt"
                                    style="

                                color: white;
                                font-size: 30px;
                                text-transform: uppercase;"
                                    data-x="0" data-y="320" data-speed="600" data-start="1500"
                                    data-easing="Power4.easeOut" data-splitin="chars" data-splitout="chars"
                                    data-elementdelay="0.05" data-endelementdelay="0.05" data-endspeed="300"
                                    data-endeasing="Power1.easeOut">
                                    Strong and Durable
                                </div>
                                <div class="textpink caption medium-title tp-resizeme" data-x="0" data-y="360"
                                    data-speed="600" data-start="1600" data-easing="Power4.easeOut" data-splitin="chars"
                                    data-splitout="chars" data-elementdelay="0.05" data-endelementdelay="0.05"
                                    data-endspeed="300" data-endeasing="Power1.easeOut">
                                    Perfect for Your Property
                                </div>
                                <div class="caption lft tp-resizeme" data-x="30" data-y="0" data-speed="600"
                                    data-start="1600">
                                    <div style="height: 80px;width: 2px;background:#fff;left:40px;position: absolute;">
                                    </div>
                                    <div
                                        style="background: #fff; padding: 20px; border-radius: 50%; line-height: 40px; color: #777; text-transform: uppercase; font-size: 20px; margin-top: 80px;">
                                        Eco-Friendly
                                    </div>
                                </div>
                                <div class="caption lft tp-resizeme" data-x="100" data-y="0" data-speed="600"
                                    data-start="1800">
                                    <div
                                        style="height: 130px;width: 2px;background: #b8b8b8;left: 40px;position: absolute;">
                                    </div>
                                    <div
                                        style="background: yellow; padding: 20px; border-radius: 50%; line-height: 40px; color: #fff; text-transform: uppercase; font-size: 20px; margin-top: 130px;">
                                        Long Lasting
                                    </div>
                                </div>
                                <div class="caption lft tp-resizeme" data-x="170" data-y="0" data-speed="600"
                                    data-start="2000">
                                    <div style="height: 180px;width: 2px;background: #000;left: 50px;position: absolute;">
                                    </div>
                                    <div
                                        style="background: red;padding: 35px 20px;border-radius: 50%;line-height: 40px;color: #fff;text-transform: uppercase;font-size: 20px;margin-top: 180px;">
                                        Cost Effective
                                    </div>
                                </div>
                                <div class="imgbox3 caption shadowed lfr ltt" data-y="20" data-x="700"
                                    data-speed="600" data-start="2300" data-easing="Power4.easeOut" data-splitin="none"
                                    data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1"
                                    data-endspeed="500" data-endeasing="Power4.easeIn">
                                    <img alt="" src="../images/carousel/res1.png" />
                                </div>

                                <div class="imgbox1 caption shadowed lft ltt" data-y="18" data-x="335"
                                    data-speed="600" data-start="1700" data-easing="Power4.easeOut" data-splitin="none"
                                    data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1"
                                    data-endspeed="500" data-endeasing="Power4.easeIn">
                                    <img alt="" src="../images/carousel/web2.png" />
                                </div>

                                <div class="imgbox2 caption shadowed lfl ltt" data-y="230" data-x="500"
                                    data-speed="600" data-start="1900" data-easing="Power4.easeOut" data-splitin="none"
                                    data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1"
                                    data-endspeed="500" data-endeasing="Power4.easeIn">
                                    <img alt="" src="../images/carousel/seo2.png" />
                                </div>
                        </li> --}}
                        {{-- ==============slide 2===================== --}}
                        {{-- <li data-slotamount="7" data-transition="curtain-3" data-masterspeed="1000"
                            data-saveperformance="on">
                            <img alt="" src="../images/carousel/dummy.png"
                                data-lazyload="../images/carousel/banner5.jpg" />
                            <div class="overlay">
                                <div class="caption sft slide-head witTxt tp-resizeme" data-x="center" data-y="50"
                                    data-speed="400" data-start="1000">
                                    What Choose Gabion Gold?
                                </div>
                                <div class="caption sfl wit-line" data-x="250" data-y="70" data-speed="400"
                                    data-start="1200"></div>
                                <div class="caption sfr wit-line" data-x="700" data-y="70" data-speed="400"
                                    data-start="1200"></div>
                                <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="150"
                                    data-speed="400" data-start="1200">
                                    Customizable to Fit Your Needs
                                </div>

                                <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="200"
                                    data-speed="400" data-start="1400">
                                    Durable for Long-Term Use
                                </div>

                                <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="250"
                                    data-speed="400" data-start="1600">
                                    Easy Installation and Maintenance
                                </div>
                                <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="300"
                                    data-speed="400" data-start="1800">
                                    Reliable and Versatile
                                </div>

                                <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="350"
                                    data-speed="400" data-start="2000">
                                    Digital Marketing
                                </div>

                                <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="400"
                                    data-speed="400" data-start="2200">
                                    SEO/SEM
                                </div>
                                <div class="caption sfl vert-line" data-x="10" data-y="150" data-speed="400"
                                    data-start="1000">
                                </div>
                                <div class="caption sfl wit-line horiz-line" data-x="0" data-y="160"
                                    data-speed="400" data-start="1200" style="width: 30px;"></div>
                                <div class="caption sfl wit-line horiz-line" data-x="0" data-y="210"
                                    data-speed="400" data-start="1400" style="width: 30px;"></div>
                                <div class="caption sfl wit-line horiz-line" data-x="0" data-y="260"
                                    data-speed="400" data-start="1600" style="width: 30px;"></div>
                                <div class="caption sfl wit-line horiz-line" data-x="0" data-y="310"
                                    data-speed="400" data-start="1800" style="width: 30px;"></div>
                                <div class="caption sfl wit-line horiz-line" data-x="0" data-y="360"
                                    data-speed="400" data-start="2000" style="width: 30px;"></div>
                                <div class="caption sfl wit-line horiz-line" data-x="0" data-y="410"
                                    data-speed="400" data-start="2200" style="width: 30px;"></div>

                                <div class="tp-caption customin main-title tp-resizeme main-bg" data-x="center"
                                    data-hoffset="0" data-y="180" data-voffset="0"
                                    data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="300" data-start="3000" data-easing="Power3.easeInOut"
                                    data-splitin="none" data-splitout="none" data-elementdelay="0.1"
                                    data-endelementdelay="0.1" data-endspeed="1000"
                                    style="z-index: 18;max-width: auto;max-height: auto;white-space: nowrap;padding: 5px 10px;color: #fff;">
                                    SO
                                </div>
                                <div class="caption sfl witTxt large-desc tp-resizeme" data-x="610" data-y="220"
                                    data-speed="400" data-start="3500"
                                    style="font-size: 17px; text-transform: uppercase;">
                                    Let's Get Started
                                </div>
                                <div class="caption customin customout text-title tp-resizeme" data-x="610"
                                    data-y="250" data-splitin="chars" data-elementdelay="0.05" data-start="3800"
                                    data-speed="600" data-easing="Back.easeOut"
                                    data-customin="x:350;y:200;z:0;rotationX:0;rotationY:0;rotationZ:-120;scaleX:8;scaleY:8;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:220% 190%;"
                                    data-splitout="" data-endelementdelay="0"
                                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-end="90000" data-endspeed="1500" data-endeasing="Power3.easeInOut"
                                    data-captionhidden="on">
                                    Creative Design
                                </div>

                        </li> --}}
                        {{-- ==============slide 3===================== --}}
                        {{-- <li data-slotamount="7" data-transition="curtain-2" data-masterspeed="1000"
                            data-saveperformance="on">
                            <img alt="" src="../images/carousel/dummy.png"
                                data-lazyload="../images/carousel/banner5.jpg" />
                            <div class="overlay"></div>
                            <div class="caption sft slide-head witTxt tp-resizeme" data-x="center" data-y="50"
                                data-speed="400" data-start="1000">
                                Innovative Solutions
                            </div>

                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="150"
                                data-speed="400" data-start="1200">
                                Affordable Pricing
                            </div>

                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="200"
                                data-speed="400" data-start="1400">
                                Excellent Customer Support
                            </div>


                            <div class="caption sfl vert-line" data-x="10" data-y="150" data-speed="400"
                                data-start="1000">
                            </div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="160" data-speed="400"
                                data-start="1200" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="210" data-speed="400"
                                data-start="1400" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="260" data-speed="400"
                                data-start="1600" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="310" data-speed="400"
                                data-start="1800" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="360" data-speed="400"
                                data-start="2000" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="410" data-speed="400"
                                data-start="2200" style="width: 30px;"></div>

                            <div class="tp-caption customin main-title tp-resizeme main-bg" data-x="center"
                                data-hoffset="0" data-y="180" data-voffset="0"
                                data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="300" data-start="3000" data-easing="Power3.easeInOut" data-splitin="none"
                                data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"
                                data-endspeed="1000"
                                style="z-index: 18;max-width: auto;max-height: auto;white-space: nowrap;padding: 5px 10px;color: #fff;">
                                SO
                            </div>
                            <div class="caption sfl witTxt large-desc tp-resizeme" data-x="610" data-y="220"
                                data-speed="400" data-start="3500" style="font-size: 17px; text-transform: uppercase;">
                                Let's Get Started
                            </div>
                            <div class="caption customin customout text-title tp-resizeme" data-x="610" data-y="250"
                                data-splitin="chars" data-elementdelay="0.05" data-start="3800" data-speed="600"
                                data-easing="Back.easeOut"
                                data-customin="x:350;y:200;z:0;rotationX:0;rotationY:0;rotationZ:-120;scaleX:8;scaleY:8;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:220% 190%;"
                                data-splitout="" data-endelementdelay="0"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-end="90000" data-endspeed="1500" data-endeasing="Power3.easeInOut"
                                data-captionhidden="on">
                                Creative Design
                            </div>

                        </li> --}}
                        {{-- -----------Slide 3---------------- --}}
                        {{-- <!-- Slide 3 --> --}}
                        {{-- <li data-slotamount="7" data-transition="curtain-1" data-masterspeed="1000"
                            data-saveperformance="on">
                            <img alt="" src="../images/carousel/dummy.png"
                                data-lazyload="../images/carousel/banner4.jpg" />
                                <div class="overlay"></div>
                            <div class="caption sft slide-head witTxt tp-resizeme" data-x="center" data-y="50"
                                data-speed="400" data-start="1000">Innovative Solutions</div>
                            <div class="caption sfl wit-line" data-x="250" data-y="70" data-speed="400"
                                data-start="1200"></div>
                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="150"
                                data-speed="400" data-start="1200">Affordable Pricing</div>
                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="200"
                                data-speed="400" data-start="1400">Excellent Customer Support</div>
                        </li> --}}

                        {{-- ===================slide 4==================== --}}
                        {{-- <!-- Slide for 3D Configurator of Gabion Fences --> --}}
                        {{-- <li data-slotamount="7" data-transition="fade" data-masterspeed="1000"
                            data-saveperformance="on">
                            <img alt="" src="../front/images/AITool/11.jpg"
                                data-lazyload="../front/images/AITool/11.jpg" />
                                <div class="overlay"></div>
                            <div class="caption sft slide-head witTxt tp-resizeme" data-x="center" data-y="50"
                                data-speed="400" data-start="1000">
                                Design Your Gabion Fence in 3D
                            </div>
                            <div class="caption sfl wit-line" data-x="250" data-y="70" data-speed="400"
                                data-start="1200"></div>
                            <div class="caption sfr wit-line" data-x="700" data-y="70" data-speed="400"
                                data-start="1200"></div>
                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="150"
                                data-speed="400" data-start="1200">
                                Customize Dimensions, Materials, and Colors
                            </div>
                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="200"
                                data-speed="400" data-start="1400">
                                Real-Time 3D Preview
                            </div>
                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="250"
                                data-speed="400" data-start="1600">
                                Easy to Use Interface
                            </div>
                            <div class="caption sfl witTxt large-desc bull tp-resizeme" data-x="40" data-y="300"
                                data-speed="400" data-start="1800">
                                Save and Share Your Designs
                            </div>

                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="160" data-speed="400"
                                data-start="1200" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="210" data-speed="400"
                                data-start="1400" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="260" data-speed="400"
                                data-start="1600" style="width: 30px;"></div>
                            <div class="caption sfl wit-line horiz-line" data-x="0" data-y="310" data-speed="400"
                                data-start="1800" style="width: 30px;"></div>

                            <div class="caption sft tp-resizeme img-container" data-x="center" data-y="100"
                                data-speed="400" data-start="2000">
                                <img alt="3D Configurator" src="../images/carousel/web2.png"
                                    style="max-width: 100%; height: auto;" />
                            </div>

                            <div class="caption sfl witTxt large-desc tp-resizeme" data-x="center" data-y="400"
                                data-speed="400" data-start="2200" style="font-size: 20px; text-transform: uppercase;">
                                Get Started Today!
                            </div>
                        </li> --}}

                    </ul>
                </div>


            </div>
        </section>

        <!-- {{-- ***********************Carousel*********************** --}} -->
        {{--
        <section id="home-carousel">

            <ul class='slider'>
                <li class='item' style="background-image: url('{{ asset('front/images/AITool/1.webp') }}')">

                    <div class="overlay"></div>
                    <div class='content'>
                        <h2 class='title'>"Lossless Youths"</h2>
                        <p class='description'> Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
                            praesentium nisi. Id laboriosam ipsam enim. </p>
                        <button class="btn-red">Read More</button>
                    </div>
                </li>

                <li class='item' style="background-image: url('{{ asset('front/images/AITool/3.webp') }}')">
                    <div class="overlay"></div>
                    <div class='content'>
                        <h2 class='title'>"Last Trace Of Us"</h2>
                        <p class='description'>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore fuga voluptatum, iure
                            corporis inventore praesentium nisi. Id laboriosam ipsam enim.
                        </p>
                        <button class="btn-red">Read More</button>
                    </div>
                </li>
                <li class='item' style="background-image: url('{{ asset('front/images/AITool/4.jpg') }}')">
                    <div class="overlay"></div>
                    <div class='content'>
                        <h2 class='title'>"Urban Decay"</h2>
                        <p class='description'>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore fuga voluptatum, iure
                            corporis inventore praesentium nisi. Id laboriosam ipsam enim.
                        </p>
                        <button class="btn-red">Read More</button>
                    </div>
                </li>
                <li class='item' style="background-image: url('{{ asset('front/images/AITool/5.jpg') }}')">
                    <div class="overlay"></div>
                    <div class='content'>
                        <h2 class='title'>"The Migration"</h2>
                        <p class='description'> Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
                            praesentium nisi. Id laboriosam ipsam enim. </p>
                        <button class="btn-red">Read More</button>
                    </div>
                </li>

                <li class='item' style="background-image: url('{{ asset('front/images/AITool/6.jpg') }}')">
                    <div class="overlay"></div>
                    <div class='content'>
                        <h2 class='title'>"Estrange Bond"</h2>
                        <p class='description'> Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
                            praesentium nisi. Id laboriosam ipsam enim. </p>
                        <button class="btn-red">Read More</button>
                    </div>
                </li>

                <li class='item' style="background-image: url('{{ asset('front/images/AITool/7.jpg') }}')">
                    <div class="overlay"></div>
                    <div class='content'>
                        <h2 class='title'>"Last Trace Of US"</h2>
                        <p class='description'>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore fuga voluptatum, iure
                            corporis inventore praesentium nisi. Id laboriosam ipsam enim.
                        </p>
                        <button class="btn-red">Read More</button>
                    </div>
                </li>
            </ul>
            <nav class='nav'>
                <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
                <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
            </nav>


            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        </section> --}}

        <!-- {{-- *********************** End Carousel *********************** --}} -->
        <!-- ======= About Section ======= -->
        <style>
            .about .bar {
                display: block;
                height: 5px;
                width: 100px;
                background: var(--color-red);
                position: relative;
                border-radius: 5px;
                overflow: hidden;
                margin: 20px auto 20px 0;
            }

            .about .bar::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                height: 100%;
                width: 5px;
                background: white;
                /* Animation color */
                animation: MOVE-BG 4s linear infinite;
            }

            @keyframes MOVE-BG {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(105px);
                }
            }

            .about #video-container {
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }

            .about .icon-boxes h4 {
                /* font-size: 18px; */
                color: #E4002B;
                margin-bottom: 15px;
            }

            /* .about .icon-boxes h3 {
                                                                                    font-size: 28px;
                                                                                    font-weight: 700;
                                                                                    color: #E4002B;
                                                                                    margin-bottom: 15px;
                                                                                } */

            .about .icon-box {
                margin-top: 10px;
            }

            .about .icon-box .icon {
                float: left;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 64px;
                height: 64px;
                border: 2px solid #E4002B;
                border-radius: 50px;
                transition: 0.5s;
            }

            .about .icon-box .icon i {
                color: #E4002B;
                font-size: 32px;
            }

            .about .icon-box:hover .icon {
                background: #E4002B;
                border-color: #E4002B;
            }

            .about .icon-box:hover .icon i {
                color: #fff;
            }

            .about .icon-box .title {
                margin-left: 85px;
                font-weight: 700;
                margin-bottom: 10px;
                font-size: 18px;
            }

            .about .icon-box .title a {
                color: #343a40;
                transition: 0.3s;
            }

            .about .icon-box .title a:hover {
                color: #e9470c;
            }

            .about .icon-box .description {
                margin-left: 85px;
                line-height: 24px;
                font-size: 14px;
            }

            .about .video-box {
                background: url("../front/images/AITool/1.webp") center center no-repeat;
                background-size: cover;
                min-height: 80%;
                width: 90%;
            }

            .about .play-btn {
                width: 94px;
                height: 94px;
                background: radial-gradient(rgba(237, 61, 7, 0.9) 50%, rgba(237, 61, 7, 0.4) 52%);
                border-radius: 50%;
                display: block;
                position: absolute;
                left: calc(50% - 47px);
                top: calc(50% - 47px);
                overflow: hidden;
            }

            .about .play-btn::after {
                content: "";
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translateX(-40%) translateY(-50%);
                width: 0;
                height: 0;
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
                border-left: 15px solid #fff;
                z-index: 100;
                transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
            }

            .about .play-btn::before {
                content: "";
                position: absolute;
                width: 120px;
                height: 120px;
                animation-delay: 0s;
                animation: pulsate-btn 2s;
                animation-direction: forwards;
                animation-iteration-count: infinite;
                animation-timing-function: steps;
                opacity: 1;
                border-radius: 50%;
                border: 5px solid rgba(239, 59, 4, 0.7);
                top: -15%;
                left: -15%;
                background: rgba(198, 16, 0, 0);
            }

            .about .play-btn:hover::after {
                border-left: 15px solid #e53504;
                transform: scale(20);
            }

            .about .play-btn:hover::before {
                content: "";
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translateX(-40%) translateY(-50%);
                width: 0;
                height: 0;
                border: none;
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
                border-left: 15px solid #fff;
                z-index: 200;
                animation: none;
                border-radius: 0;
            }

            @keyframes pulsate-btn {
                0% {
                    transform: scale(0.6, 0.6);
                    opacity: 1;
                }

                100% {
                    transform: scale(1, 1);
                    opacity: 0;
                }
            }
        </style>
        <section id="home-aboutus" class="mainSection">
            <div class="container-fluid z-3 position-relative">
                <div class="row">
                    <div class="col-12">
                        <header style="min-height:7rem;">
                            <h1 class="sectionTitle text-center position-relative z-5">
                                Welcome To<span class="color-red"> HD-Gabion</span>
                            </h1>
                            <div class="line mx-auto"></div>
                        </header>
                        {{-- <header class="">
                            <div class="centerHeading">Unmatched <span
                                    class="centerHeadingBold d-block d-sm-inline-block co"> Gabion </span> Solutions and a
                                Cutting-Edge
                                <span class="centerHeadingBold d-block d-sm-inline-block co">3D Configurator
                                </span>
                            </div>
                            <div class="centerSubHeading">

                                <span class="centerSubHeadingBold"> HD-GABION</span>
                                - Has It All!
                            </div>
                            <div class="line mx-auto"></div>
                            <span class="bar"></span>
                        </header> --}}

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-justify">
                            <b>HD-GABION</b> is a <b>leading gabion walls and gabion baskets</b>
                            manufacturing company based in <b>
                                Poland</b>.
                            At <b>HD-GABION</b>, we pride ourselves on using advanced technology and premium materials to
                            produce
                            <b>gabion
                                fences, retaining walls, and baskets</b> designed for <b>durability and versatility</b>.
                        </p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">

                        <div class="d-flex justify-content-center align-items-center">
                            <a class="btn btn-red " aria-current="page" href="http://127.0.0.1:8000"><span>Know
                                    More >></span></a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
{{-- *********************************** --}}
<section id="home_call_to_action" class="mainSection">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 col-lg-5 ">

                <header>
                    <div class="largeTitle  text-justify">
                        "Let us
                        help you build fences and walls that stand the test of time
                        while enhancing
                        your property’s
                        aesthetic appeal."
                    </div>
                </header>

            </div>
            <div class="col-12  col-lg-7">
                <div class="" id="box">

                    <div class="wrapper">
                        <div class="object">
                            <div class="carousel">
                                <div class="cell">
                                    <h3>Mission</h3>
                                    <p>
                                        Deliver innovative Gabion products that are not
                                        only practical but also
                                        enhance the aesthetic value of your property.
                                    </p>
                                    <!-- <p>
                                                                                                                                                                                                        At <strong>HD-GABION</strong>, we do more than manufacture gabions—we guide
                                                                                                                                                                                                        you every step of
                                                                                                                                                                                                        the way. From
                                                                                                                                                                                                        expert advice on material selection to customized 3D visualizations of your
                                                                                                                                                                                                        gabion fence, we
                                                                                                                                                                                                        provide
                                                                                                                                                                                                        comprehensive solutions tailored to your needs. Our team delivers detailed
                                                                                                                                                                                                        price quotes,
                                                                                                                                                                                                        ensuring
                                                                                                                                                                                                        transparency and satisfaction.
                                                                                                                                                                                                    </p> -->

                                </div>
                                <div class="cell">
                                    <h3>Branches</h3>

                                    <ul>
                                        <li>Spain</li>

                                        <li>Poland</li>
                                        <li>Germany</li>
                                        <li>Netherlands</li>
                                        <li>Czechia</li>
                                        <li>France</li>
                                        <li>
                                            Slovakia
                                    </ul>
                                    </b>


                                </div>
                                <div class="cell">
                                    <h3>WHAT WE EARNED</h3>
                                    <p>
                                        With years of expertise and thousands of
                                        kilometers of gabion fences
                                        installed, we’ve earned a
                                        reputation
                                        for reliability, innovation, and competitive
                                        pricing. Our commitment to
                                        excellence ensures you
                                        receive
                                        durable products at the best value on the
                                        market.
                                    </p>


                                </div>
                                <div class="cell">
                                    <h3>WHY CHOOSE US</h3>
                                    <p class="text-justify"></p>
                                    Specialize in providing <b>durable, eco-friendly,
                                        and cost-effective</b>
                                    solutions to meet the
                                    needs of
                                    customers across <b>Central Europe</b>.
                                    </p>
                                    <p class="text-justify">
                                        Offer full multilingual support, providing
                                        services in the native languages
                                        of each region to better cater to your needs and
                                        expectations.
                                    </p>

                                </div>
                                <div class="cell">
                                    <h3>Our Core Services</h3>
                                    <ul>
                                        <li>
                                            customized gabion solutions.
                                        </li>
                                        <li>3D visualization</li>
                                        <li>Asembly advice</li>
                                        <li>Competitive pricing</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="position-relative">
                        <p class="button-group">
                            <button class="previous-button">
                                << </button>
                                    <button class="next-button"> >></button>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ********************End About Us ************ -->
        <section id="home-aboutus" class="about mainSection position-relative">
            {{-- <section id="about" class="about mainSection"> --}}
            <div class="container-fluid">
                <div class="position-absolute top-0 start-0 w-100 h-100 z-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#e1dede" fill-opacity="0.5"
                            d="M0,0L60,21.3C120,43,240,85,360,90.7C480,96,600,64,720,96C840,128,960,224,1080,250.7C1200,277,1320,235,1380,213.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                        </path>
                    </svg>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{-- <header style="min-height:7rem;">
                            <h1 class="sectionTitle text-center position-relative z-5">
                                Our<span class="color-red"> Speciality </span>
                            </h1>
                            <div class="line mx-auto"></div>
                        </header> --}}
                        <header class="position-relative z-5 pt-5">
                            <div class="centerHeading">Unmatched <span
                                    class="centerHeadingBold d-block d-sm-inline-block co"> Gabion </span> Solutions and a
                                Cutting-Edge
                                <span class="centerHeadingBold d-block d-sm-inline-block co">3D Configurator
                                </span>
                            </div>
                            <div class="centerSubHeading">

                                <span class="centerSubHeadingBold"> HD-GABION</span>
                                - Has It All!
                            </div>
                            <div class="line mx-auto"></div>

                        </header>
                    </div>
                </div>
                <div class="row ">
                    <!-- Video Section -->
                    <div class="col-12 col-lg-6 position-relative" id="video-container">
                        <div class="video-box position-relative">
                            <a href="https://www.youtube.com/watch?v=c1eWgR5V83k" class="glightbox play-btn mb-4"
                                aria-label="Watch HD-Gabion introduction video"></a>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="col-12 col-lg-6 icon-boxes position-relative " style="z-index: 99;">
                        {{-- <header style="margin-bottom: 0px; min-height:7rem;">
                            <h1 class="sectionTitle text-center position-relative z-5">
                                Our<span class="color-red"> Speciality </span>
                            </h1>
                            <div class="line mx-auto"></div>
                        </header> --}}
                        {{--
                        <span class="bar"></span> --}}
                        {{-- <p>
                            HD-GABION is a leading gabion walls and gabion baskets manufacturing company based in Poland. At
                            HD-GABION, we
                            pride ourselves on using advanced technology and premium materials to produce gabion fences,
                            retaining walls,
                            and baskets designed for durability and versatility.
                        </p> --}}

                        <!-- Gabion Design Services -->
                        <div class="icon-box">
                            <div class="icon" aria-label="GabionFences Icon"><i class="bx bx-3d-rotate"></i></div>
                            <h4 class="title"><a href="" title="Gabion Fences">Gabion Fences</a></h4>
                            <p class="description">
                                Upgrade your security and style with our robust gabion fences. Designed for privacy and
                                aesthetic appeal, these fences add a modern touch to residential, commercial, and industrial
                                properties while ensuring long-lasting performance.
                            </p>
                        </div>
                        <div class="icon-box">
                            <div class="icon" aria-label="GabionBaskets Icon"><i class="bx bx-cube-alt"></i></div>
                            <h4 class="title"><a href="" title="Gabion Fences">Gabion Baskets</a></h4>
                            <p class="description">
                                Our high-quality gabion baskets are engineered to withstand harsh weather conditions and
                                heavy loads, making them ideal for creating unique outdoor features, such as planters,
                                benches, and decorative partitions. </p>
                        </div>
                        <!-- Customization Options -->
                        <div class="icon-box">
                            <div class="icon" aria-label="Customization Options Icon"><i class="bx bx-customize"></i>
                            </div>
                            <h4 class="title"><a href=""
                                    title="Explore Gabion Customization Options">Customization Options</a></h4>
                            <p class="description">
                                Create unique gabion solutions with versatile customization options for fences and baskets,
                                ensuring a perfect match.
                            </p>
                        </div>

                        <!-- 3D Visualization -->
                        <div class="icon-box">
                            <div class="icon" aria-label="3D Visualization Icon"><i class="bx bx-3d-rotate"></i></div>
                            <h4 class="title"><a href=""
                                    title="Learn about 3D Visualization for Gabion Projects">3D Visualization</a></h4>
                            <p class="description">
                                Leverage advanced 3D visualization tools to preview your gabion projects, providing a clear
                                understanding of the final outcome.
                            </p>
                        </div>

                        <!-- Premium Materials -->
                        <div class="icon-box">
                            <div class="icon" aria-label="Premium Materials Icon"><i class="bx bx-shield"></i></div>
                            <h4 class="title"><a href="" title="Discover Gabion Premium Materials">Premium
                                    Materials</a></h4>
                            <p class="description">
                                We use high-quality, weather-resistant materials to ensure your gabion walls and fences
                                stand the test of time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="position-absolute start-0 w-100 z-0" style="bottom:0;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#e1dede" fill-opacity="1"
                            d="M0,224L30,218.7C60,213,120,203,180,202.7C240,203,300,213,360,218.7C420,224,480,224,540,240C600,256,660,288,720,288C780,288,840,256,900,245.3C960,235,1020,245,1080,256C1140,267,1200,277,1260,256C1320,235,1380,181,1410,154.7L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </div>
        </section>
        {{-- ******************What we Offer************************* --}}


        {{-- <section id="home-offers" class="mainSection position-relative bg-grey">

            <!-- <section id="home-whychooseus" class="mainSection position-relative bg-grey"> -->
            <div class="position-absolute  top-0 start-0 w-100 h-100 z-0 ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#e1dede" fill-opacity="0.5"
                        d="M0,0L60,21.3C120,43,240,85,360,90.7C480,96,600,64,720,96C840,128,960,224,1080,250.7C1200,277,1320,235,1380,213.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                    </path>
                </svg>
            </div>
            <div class="row position-relative">
                <div class="col-12">
                    <header class="pb-5">
                        <div class="sectionTitle text-center">
                            What We <span class="color-red">Offer</span>

                        </div>
                        <!-- <div class="centerSubHeading">

                                                                                                                                                                    <span class="centerSubHeadingBold"> </span>
                                                                                                                                                                    - Has It All!
                                                                                                                                                                </div> -->
                        <div class="line mx-auto"></div>
                    </header>


                </div>
            </div>
            <div class="wrapper container-fluid container-xl z-3 position-relative">

                <div class="content">
                    <div class="bg-shape">
                        <img src="{{ asset('front/images/logo/white_textlogo.png') }}" alt="">
                    </div>


                    <div class="product-img">

                        <div class="product-img__item" id="img1">
                              <img src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}" alt=""
                                srcset="">
                               </div>

                        <div class="product-img__item" id="img2">
                            <img src="{{ asset('front/images/AITool/fence1-wobg.png') }}" alt="star wars"
                                class="product-img__img">
                        </div>

                    </div>



                    <div class="product-slider">
                        <button class="prev disabled">
                            <span class="icon">
                                <svg class="icon icon-arrow-right">
                                    <use xlink:href="#icon-arrow-left"></use>
                                </svg>
                            </span>
                        </button>
                        <button class="next">
                            <span class="icon">
                                <svg class="icon icon-arrow-right">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </span>
                        </button>

                        <div class="product-slider__wrp swiper-wrapper">

                            <div class="product-slider__item swiper-slide" data-target="img1">
                                <div class="product-slider__card" style="background-color: #cc3743;">
                                    <!-- <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1536405222/starwars/item-1-bg.webp" alt="star wars" class="product-slider__cover"> -->
                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">
                                            Gabion Baskets
                                        </h1>
                                        <div class="product-ctr">
                                            <div class="product-labels">
                                                <!-- <div class="product-labels__title">ENGINE UNIT</div> -->
                                                <p>Lorem ipsum dolor sit amet consectetur,
                                                    adipisicing elit. Nesciunt
                                                    quaerat
                                                    perferendis optio odio quia a nulla? Enim
                                                    ipsum ab exercitationem
                                                    consectetur beatae minus quisquam vero
                                                    corrupti quae architecto. Aut,
                                                    fugit.
                                                </p>
                                                <div class="product-labels__group">
                                                    <label class="product-labels__item">

                                                    </label>

                                                </div>

                                            </div>

                                            <span class="hr-vertical"></span>

                                            <div class="product-inf">
                                                <div class="product-inf__percent">
                                                    <div class="product-inf__percent-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100"
                                                            height="100" viewBox="0 0 100 100">
                                                            <defs>
                                                                <linearGradient id="gradient" x1="0%"
                                                                    y1="0%" x2="0%" y2="100%">
                                                                    <stop offset="0%" stop-color="#0c1e2c"
                                                                        stop-opacity="0" />
                                                                    <stop offset="100%" stop-color="#cb2240"
                                                                        stop-opacity="1" />
                                                                </linearGradient>
                                                            </defs>
                                                            <circle cx="50" cy="50" r="47"
                                                                stroke-dasharray="225, 300" stroke="#cb2240"
                                                                stroke-width="4" fill="none" />
                                                        </svg>
                                                    </div>
                                                    <div class="product-inf__percent-txt">
                                                        75%
                                                    </div>
                                                </div>

                                                <span class="product-inf__title">DURABILITY</span>
                                            </div>

                                        </div>

                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">
                                                Explore
                                            </button>

                                            <button class="product-slider__fav js-fav"><span class="heart"></span> 3D
                                                Configurator</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-slider__item swiper-slide" data-target="img2">
                                <div class="product-slider__card" style="background-color: #708a08;">

                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">
                                            Gabion Fences
                                        </h1>
                                        <div class="product-ctr">
                                            <div class="product-labels">
                                                <!-- <div class="product-labels__title">ENGINE UNIT</div> -->
                                                <p>Lorem ipsum dolor sit amet consectetur,
                                                    adipisicing elit. Nesciunt
                                                    quaerat
                                                    perferendis optio odio quia a nulla? Enim
                                                    ipsum ab exercitationem
                                                    consectetur beatae minus quisquam vero
                                                    corrupti quae architecto. Aut,
                                                    fugit.
                                                </p>
                                                <div class="product-labels__group">
                                                    <label class="product-labels__item">

                                                    </label>

                                                </div>

                                            </div>

                                            <span class="hr-vertical"></span>

                                            <div class="product-inf">
                                                <div class="product-inf__percent">
                                                    <div class="product-inf__percent-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100"
                                                            height="100" viewBox="0 0 100 100">
                                                            <defs>
                                                                <linearGradient id="gradient" x1="0%"
                                                                    y1="0%" x2="0%" y2="100%">
                                                                    <stop offset="0%" stop-color="#0c1e2c"
                                                                        stop-opacity="0" />
                                                                    <stop offset="100%" stop-color="#cb2240"
                                                                        stop-opacity="1" />
                                                                </linearGradient>
                                                            </defs>
                                                            <circle cx="50" cy="50" r="47"
                                                                stroke-dasharray="225, 300" stroke="#cb2240"
                                                                stroke-width="4" fill="none" />
                                                        </svg>
                                                    </div>
                                                    <div class="product-inf__percent-txt">
                                                        75%
                                                    </div>
                                                </div>

                                                <span class="product-inf__title">DURABILITY</span>
                                            </div>

                                        </div>

                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">
                                                Explore
                                            </button>

                                            <button class="product-slider__fav js-fav"><span class="heart"></span> 3D
                                                Configurator</button>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>



            </div>
            <div class="position-absolute  start-0  w-100 z-0" style="bottom:0;">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#e1dede" fill-opacity="1"
                        d="M0,224L30,218.7C60,213,120,203,180,202.7C240,203,300,213,360,218.7C420,224,480,224,540,240C600,256,660,288,720,288C780,288,840,256,900,245.3C960,235,1020,245,1080,256C1140,267,1200,277,1260,256C1320,235,1380,181,1410,154.7L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section> --}}
        <style>
            #home-offers {
                background: url("../front/images/AITool/2.webp") #ef0505;
                background-repeat: cover;
                background-size: initial;
                background-position: top center;
                background-attachment: fixed;

                .product-slider__card {

                    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.22) 0px -12px 30px, rgba(0, 0, 0, 0.22) 0px 4px 6px, rgba(0, 0, 0, 0.27) 0px 12px 13px, rgba(0, 0, 0, 0.19) 0px -3px 5px;

                    backdrop-filter: blur(30px);

                }
            }
        </style>
        <section id="home-offers" class=" py-0 mainSection position-relative bg-grey">
            <header style="margin-bottom: 0px; position:relative; z-index:99;" class="z-99">
                <h1 class="sectionTitle text-center pt-5">Our <span class="color-red">Services</span></h1>
            </header>
            <!-- Background SVG Top -->
            {{-- <div class="position-absolute top-0 start-0 w-100 h-100 z-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#e1dede" fill-opacity="0.5"
                        d="M0,0L60,21.3C120,43,240,85,360,90.7C480,96,600,64,720,96C840,128,960,224,1080,250.7C1200,277,1320,235,1380,213.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                    </path>
                </svg>
            </div> --}}

            <!-- Section Title -->
            {{-- <div class="row position-relative">
                <div class="col-12">
                    <header class="pb-5">
                        <div class="sectionTitle text-center">
                            Discover Our <span class="color-red">Gabion Solutions</span>
                        </div>
                        <div class="line mx-auto"></div>
                    </header>
                </div>
            </div> --}}

            <!-- Products & Descriptions -->
            <div class="wrapper container-fluid container-xl z-3 position-relative">
                <div class="content">
                    <div class="bg-shape">
                        <img src="{{ asset('front/images/logo/white_textlogo.png') }}" alt="HD-Gabion Logo">
                    </div>

                    <div class="product-img">
                        <div class="product-img__item" id="img1">
                            <img src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}" alt="Gabion Baskets">
                        </div>
                        <div class="product-img__item" id="img2">
                            <img src="{{ asset('front/images/AITool/fence1-wobg.png') }}" alt="Gabion Fences">
                        </div>
                    </div>

                    <!-- Slider with Descriptions -->
                    <div class="product-slider">
                        {{-- <button class="prev disabled">
                            <span class="icon">
                                <svg class="icon icon-arrow-left">
                                    <use xlink:href="#icon-arrow-left"></use>
                                </svg>
                            </span>
                        </button> --}}
                        {{-- <button class="next">
                            <span class="icon">
                                <svg class="icon icon-arrow-right">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </span>
                        </button> --}}

                        <div class="product-slider__wrp swiper-wrapper">
                            <!-- Gabion Baskets -->
                            <div class="product-slider__item swiper-slide" data-target="img1">
                                <div class="product-slider__card">
                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">Gabion Baskets</h1>
                                        {{-- <div class="product-img__item" id="img1">
                                            <img src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}" alt="Gabion Baskets">
                                        </div> --}}
                                        <p>
                                            Durable and versatile, our Gabion Baskets are ideal for landscaping, erosion
                                            control,
                                            and modern architectural designs.
                                        </p>
                                        <ul>
                                            <li>Customizable sizes and designs</li>
                                            <li>Eco-friendly and sustainable materials</li>
                                            <li>Long-lasting corrosion resistance</li>
                                        </ul>
                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">Learn More</button>
                                            <button class="product-slider__fav ">3D Configurator</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gabion Fences -->
                            <div class="product-slider__item swiper-slide" data-target="img2">
                                <div class="product-slider__card">
                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">Gabion Fences</h1>
                                        <p>
                                            Stylish and functional, our Gabion Fences combine aesthetics with structural
                                            integrity,
                                            perfect for privacy and boundary solutions.
                                        </p>
                                        <ul>
                                            <li>Modern and sleek designs</li>
                                            <li>Enhanced privacy and sound reduction</li>
                                            <li>Low maintenance with high durability</li>
                                        </ul>
                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">Learn More</button>
                                            <button class="product-slider__fav js-fav">3D Configurator</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Background SVG Bottom -->
            {{-- <div class="position-absolute start-0 w-100 z-0" style="bottom:0;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#e1dede" fill-opacity="1"
                        d="M0,224L30,218.7C60,213,120,203,180,202.7C240,203,300,213,360,218.7C420,224,480,224,540,240C600,256,660,288,720,288C780,288,840,256,900,245.3C960,235,1020,245,1080,256C1140,267,1200,277,1260,256C1320,235,1380,181,1410,154.7L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                    </path>
                </svg>
            </div> --}}
        </section>


        {{-- **********************End What we offer*********************** --}}

        {{-- ******************************try1******************************** --}}
        {{-- <style>
    .services-container{
        background: url("../front/images/AITool/2.webp") #ef0505;
    background-repeat: cover;
    background-size: initial;
    background-position: top center;
    background-attachment: fixed;
    color:white;
    /* animation: background 90s linear infinite; */
    #services-top-row {
    /* width: 95%;
    height: 50%; */
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-around;
    align-items: center;
}
.services-glass-card {
    width: 50%;
    height: 90%;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.22) 0px -12px 30px, rgba(0, 0, 0, 0.22) 0px 4px 6px, rgba(0, 0, 0, 0.27) 0px 12px 13px, rgba(0, 0, 0, 0.19) 0px -3px 5px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(4px);
    text-align: center;
}
    }

    @keyframes background {
                0% {
                    background-position: 0% 0%;
                }

                50% {
                    background-position: 100% 100%;
                }

                100% {
                    background-position: 0% 0%;
                }
            }
</style>
        <div class="services-container">

            <div id="services-top-row">

                <div class="services-glass-card">

                    <div class="camera-container">

                        <div class="circle">
                            <div class="camera-eye">
                                <div class="inner-eye">
                                    <div class="blinking"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card-info">

                        <i class="bi bi-key-fill"></i>

                        <h2>
                            ACCESS CONTROL
                        </h2>

                        <p>
                            Physical access controls help protect important or sensitive assets within any organization.
                            Stop the hassle of passing out physical keys and consider a managed electronic door system.
                        </p>

                    </div>

                    <div class="service-card-video">

                        <div class="tool-tip-container">

                            <p class="d-none d-lg-block">
                                CLICK PREVIEW BELOW TO VIEW PAGE.
                            </p>

                            <p class="d-block d-lg-none">
                                TAP PREVIEW BELOW TO VIEW PAGE.
                            </p>

                        </div>

                        <figure class="effect-ming">
                            <video preload="auto" playsinline="true" loop="true" muted="true" autoplay="true"
                                class="img-fluid" poster="images/accesscontrolposter.jpg">
                                <source src="https://digitalupgrade.com/images/accesscontrol.webm" type="video/webm">
                                <source src="https://digitalupgrade.com/images/accesscontrol.mp4" type="video/mp4">
                            </video>
                            <figcaption>
                                <p>VIEW PAGE</p>
                                <a href="/security/access-control" rel="noopener">View more</a>
                            </figcaption>
                        </figure>
                    </div>

                </div>

                <div class="services-glass-card">

                    <div class="camera-container">
                        <div class="circle">
                            <div class="camera-eye">
                                <div class="inner-eye">
                                    <div class="blinking"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card-info">

                        <i class="bi bi-camera2"></i>

                        <h2>
                            SURVEILLANCE
                        </h2>

                        <p>
                            Every business should have a video surveillance system in place, creating safe work environments
                            for customers and employees. Digital Upgrade offers industry-leading video surveillance
                            technology to assist in protecting business owners and their business investments.
                        </p>

                    </div>

                    <div class="service-card-video">
                        <div class="tool-tip-container">

                            <p class="d-none d-lg-block">
                                CLICK PREVIEW BELOW TO VIEW PAGE.
                            </p>

                            <p class="d-block d-lg-none">
                                TAP PREVIEW BELOW TO VIEW PAGE.
                            </p>

                        </div>
                        <figure class="effect-ming bg-danger">
                            <video preload="auto" playsinline="true" loop="true" muted="true" autoplay="true"
                                class="img-fluid" poster="images/accesscontrolposter.jpg">
                                <source src="https://digitalupgrade.com/images/surveillance.webm" type="video/webm">
                                <source src="https://digitalupgrade.com/images/surveillance.mp4" type="video/mp4">
                            </video>


                            <figcaption>
                                <p>VIEW PAGE</p>
                                <a href="/security/access-control" rel="noopener">View more</a>
                            </figcaption>
                        </figure>
                    </div>

                </div>

            </div>

            <div id="services-bottom-row">

                <div class="services-glass-card">

                    <div class="gear-container">
                        <div class="arrow-placeholder"></div>
                        <div class="arrow-circle"></div>
                        <div class="gear">
                            <div class="tooth-1"></div>
                            <div class="tooth-2"></div>
                            <div class="tooth-3"></div>
                            <div class="tooth-4"></div>
                            <div class="tooth-5"></div>
                            <div class="tooth-6"></div>
                            <div class="tooth-7"></div>
                            <div class="tooth-8"></div>
                            <div class="tooth-9"></div>
                            <div class="tooth-10"></div>
                            <div class="tooth-11"></div>
                            <div class="tooth-12"></div>
                        </div>
                    </div>

                    <div class="service-card-info">

                        <i class="bi bi-brush-fill"></i>

                        <h2>
                            WEB DESIGN
                        </h2>

                        <p>
                            If you're looking for a clean, custom-tailored website for your company, Digital Upgrade is
                            unrivaled. Digital Upgrade is Evansville, Indiana's leading website design and development
                            company. Digital Upgrade can also refresh outdated-looking websites!
                        </p>

                    </div>

                    <div class="service-card-video">
                        <div class="tool-tip-container">

                            <p class="d-none d-lg-block">
                                CLICK PREVIEW BELOW TO VIEW PAGE.
                            </p>

                            <p class="d-block d-lg-none">
                                TAP PREVIEW BELOW TO VIEW PAGE.
                            </p>

                        </div>
                        <figure class="effect-ming">
                            <video preload="auto" playsinline="true" loop="true" muted="true" autoplay="true"
                                class="img-fluid" poster="images/accesscontrolposter.jpg">
                                <source src="https://digitalupgrade.com/images/webdesign.webm" type="video/webm">
                                <source src="https://digitalupgrade.com/images/webdesign.mp4" type="video/mp4">
                            </video>
                            <figcaption>
                                <p>VIEW PAGE</p>
                                <a href="/security/access-control" rel="noopener">View more</a>
                            </figcaption>
                        </figure>
                    </div>

                </div>

                <div class="services-glass-card">

                    <div class="gear-container">
                        <div class="arrow-placeholder"></div>
                        <div class="arrow-circle"></div>
                        <div class="gear">
                            <div class="tooth-1"></div>
                            <div class="tooth-2"></div>
                            <div class="tooth-3"></div>
                            <div class="tooth-4"></div>
                            <div class="tooth-5"></div>
                            <div class="tooth-6"></div>
                            <div class="tooth-7"></div>
                            <div class="tooth-8"></div>
                            <div class="tooth-9"></div>
                            <div class="tooth-10"></div>
                            <div class="tooth-11"></div>
                            <div class="tooth-12"></div>
                        </div>
                    </div>

                    <div class="service-card-info">

                        <i class="bi bi-envelope-fill"></i>

                        <h2>
                            COMPANY EMAIL
                        </h2>

                        <p>
                            Your company or business merits a professional-looking email address. Digital Upgrade
                            specializes in company email setup and configuration. The professionals at Digital Upgrade will
                            transfer your business data and emails from your old company account to your new company email
                            account.
                        </p>

                    </div>

                    <div class="service-card-video">
                        <div class="tool-tip-container">

                            <p class="d-none d-lg-block">
                                CLICK PREVIEW BELOW TO VIEW PAGE.
                            </p>

                            <p class="d-block d-lg-none">
                                TAP PREVIEW BELOW TO VIEW PAGE.
                            </p>

                        </div>
                        <figure class="effect-ming">
                            <img src="https://digitalupgrade.com/images/companyemail.jpg" alt="img09"
                                class="img-fluid" />
                            <figcaption>
                                <p>VIEW PAGE</p>
                                <a href="/security/access-control" rel="noopener">View more</a>
                            </figcaption>
                        </figure>
                    </div>

                </div>

                <div class="services-glass-card">

                    <div class="gear-container">
                        <div class="arrow-placeholder"></div>
                        <div class="arrow-circle"></div>
                        <div class="gear">
                            <div class="tooth-1"></div>
                            <div class="tooth-2"></div>
                            <div class="tooth-3"></div>
                            <div class="tooth-4"></div>
                            <div class="tooth-5"></div>
                            <div class="tooth-6"></div>
                            <div class="tooth-7"></div>
                            <div class="tooth-8"></div>
                            <div class="tooth-9"></div>
                            <div class="tooth-10"></div>
                            <div class="tooth-11"></div>
                            <div class="tooth-12"></div>
                        </div>
                    </div>

                    <div class="service-card-info">

                        <i class="bi bi-people-fill"></i>

                        <h2>
                            SOCIAL MEDIA
                        </h2>

                        <p>
                            Digital Upgrade can set up and manage all business social media accounts. The professionals at
                            Digital Upgrade want to help Evansville, IN businesses thrive digitally, letting companies focus
                            on other areas of their business.
                        </p>

                    </div>

                    <div class="service-card-video">
                        <div class="tool-tip-container">

                            <p class="d-none d-lg-block">
                                CLICK PREVIEW BELOW TO VIEW PAGE.
                            </p>

                            <p class="d-block d-lg-none">
                                TAP PREVIEW BELOW TO VIEW PAGE.
                            </p>

                        </div>
                        <figure class="effect-ming">
                            <video preload="auto" playsinline="true" loop="true" muted="true" autoplay="true"
                                class="img-fluid" poster="images/accesscontrolposter.jpg">
                                <source src="https://digitalupgrade.com/images/socialmedia.webm" type="video/webm">
                                <source src="https://digitalupgrade.com/images/socialmedia.mp4" type="video/mp4">
                            </video>

                            <figcaption>
                                <p>VIEW PAGE</p>
                                <a href="/security/access-control" rel="noopener">View more</a>
                            </figcaption>
                        </figure>
                    </div>

                </div>

            </div>

        </div>
 --}}


        {{-- ***********************************end try1**************************** --}}

        <!-- {{-- ************************Overlapping Images Version 2 ************** --}} -->
        <section class="mainSection" id="about_section">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="content col-12 col-lg-5 p-4 m-3">
                        <div class="text-center">
                            <header style="margin-bottom: 0px;">

                                <h2 class="sectionTitle">Modular Gabion System <span class="color-golden pt-5">GOLD</span>
                                </h2>
                                <div class="line mx-auto"></div>
                            </header>

                            <p class="mb-5"><strong>Gabions</strong>, also known as <strong>stone baskets</strong>, are
                                metal baskets in any structural
                                state filled with stones or other materials.These structures are traditionally used for
                                <strong>stabilizing embankments, reinforcing banks, and creating decorative walls</strong>.
                            </p>
                            <p><strong>The Modular Gabion System <span class="color-golden">GOLD</span></strong> takes this
                                concept to the next level with
                                a <strong>flexible, reusable, and durable design</strong> that is easily adaptable to
                                different
                                landscaping and infrastructure projects.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                        <article class="gallery">
                            <img src="{{ asset('images/baskets_lemon/gabion1.jpg') }}" alt="guitar player at concert" />
                            <img src="{{ asset('images/baskets_lemon/gabion1.jpg') }}" alt="duo singing" />
                            <img src="{{ asset('images/baskets_lemon/gabion2.jpg') }}" alt="crowd cheering" />
                            <img src="{{ asset('images/baskets_lemon/gabion3.jpg') }}" alt="singer performing" />
                            <img src="{{ asset('images/baskets_lemon/gabion4.jpg') }}" alt="singer fistbumping crowd" />
                            <img src="{{ asset('images/baskets_lemon/gabion5.jpg') }}" alt="man with a guitar singing" />
                            <img src="{{ asset('images/baskets_lemon/gabion6.jpg') }}"
                                alt="crowd looking at a lighted stage" />
                            <img src="{{ asset('images/baskets_lemon/gabion7.jpg') }}" alt="woman singing on stage" />
                        </article>

                    </div>

                </div>
                <div class="row ">
                    <div class="col-12">

                        <div class="d-flex justify-content-center align-items-center">
                            <a class="btn btn-red " aria-current="page" href="http://127.0.0.1:8000"><span>Know
                                    More >></span></a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- ===================Department======================= --}}

        <section id="departments" class="departments mainSection">
            <div class="container-fluid">
                <header class="text-center">
                    <h2 class="sectionTitle">Applications of <span class="color-red">Gabion Walls and Gabion Fences</span></h2>
                    <div class="line mx-auto"></div>
                    <p class="text-center">Discover durable, eco-friendly, and stylish gabion products for fencing, walls,
                        and decorative features. Explore the practical applications of gabion walls and gabion fences in
                        construction, landscaping, erosion control, and more.</p>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                    <h3>Landscaping</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                    <h3>Construction</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                    <h3>Architectural Design</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                                    <h3>Outdoor Furniture</h3>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">
                                    <h3>Custom Gabion Solutions</h3>
                                </a>
                            </li> --}}
                            <!-- New Tabs Added -->
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-6">
                                    <h3>Erosion Control</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-7">
                                    <h3>Water Management</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-8">
                                    <h3>Sound Barriers</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-9">
                                    <h3>Security Fencing</h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-10">
                                    <h3>Industrial Applications</h3>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Landscaping</h3>
                                        <p>Gabion fences are perfect for landscaping, helping you create elegant garden
                                            walls, raised beds, and outdoor seating areas. They provide both functional and
                                            aesthetic value, blending seamlessly with natural surroundings.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/10.webp') }}" alt="Gabion Fence"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Construction</h3>
                                        <p>Gabion baskets are ideal for reinforcing slopes, managing erosion, and building
                                            retaining walls in construction projects. Their modular design allows for quick
                                            installation while maintaining long-lasting stability for the structure.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/11.jpg') }}" alt="Gabion Basket"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Architectural Design</h3>
                                        <p>Gabion walls and fences are increasingly used in architectural design to add a
                                            modern and unique aesthetic to both commercial and residential spaces. Their
                                            versatility allows for creative, striking features that can be both functional
                                            and visually appealing.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/12.jpg') }}" alt="Gabion Retaining Wall"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Outdoor Furniture</h3>
                                        <p>Gabion products are also used to design durable outdoor furniture such as
                                            benches, tables, and planters, blending natural beauty with strength and
                                            functionality for various outdoor settings.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/4.webp') }}" alt="Decorative Gabion"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane" id="tab-5">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Custom Gabion Solutions</h3>
                                        <p>We offer tailored gabion solutions to meet the specific needs of your project,
                                            from unique shapes to custom materials, ensuring that each structure is both
                                            functional and visually appealing.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/3.webp') }}" alt="Custom Gabion Solution"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="tab-pane" id="tab-6">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Erosion Control</h3>
                                        <p>Gabion baskets and walls are highly effective in controlling erosion. They can be
                                            strategically placed along riverbanks, hillsides, and other vulnerable areas to
                                            prevent soil loss and manage water runoff, providing long-term environmental
                                            protection.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/13.jpg') }}" alt="Erosion Control"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!-- New Tab Content for Water Management -->
                            <div class="tab-pane" id="tab-7">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Water Management</h3>
                                        <p>Gabions are ideal for water management solutions, from controlling water flow to
                                            stabilizing riverbanks and creating drainage systems. These structures help to
                                            minimize flood risk and reduce the impact of heavy rainfall on vulnerable
                                            landscapes.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/14.jpg') }}" alt="Water Management"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!-- New Tab Content for Sound Barriers -->
                            <div class="tab-pane" id="tab-8">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Sound Barriers</h3>
                                        <p>Gabion walls are often used as sound barriers to reduce noise pollution. By
                                            acting as a dense and solid structure, they block unwanted sounds from highways,
                                            industrial zones, and other noisy areas, ensuring a quieter and more peaceful
                                            environment.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/15.jpg') }}" alt="Sound Barrier"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!-- New Tab Content for Security Fencing -->
                            <div class="tab-pane" id="tab-9">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Security Fencing</h3>
                                        <p>Gabion fences offer enhanced security by creating robust, impenetrable barriers.
                                            They're widely used for perimeter fencing in both private and public sectors,
                                            providing a high level of protection while maintaining a natural aesthetic.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/16.jpg') }}" alt="Security Fencing"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!-- New Tab Content for Industrial Applications -->
                            <div class="tab-pane" id="tab-10">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Industrial Applications</h3>
                                        <p>Gabion baskets are widely used in industrial settings for a variety of
                                            applications such as stabilizing foundations, supporting heavy structures, and
                                            protecting infrastructure against natural disasters like landslides and floods.
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/17.jpg') }}"
                                            alt="Industrial Applications" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{--
        <section id="departments" class="departments mainSection">
            <div class="container-fluid">
                <div class="section-title">
                    <h2>Applications of Gabion Walls and Gabion Fences</h2>
                    <p class="text-center">Discover the practical applications of gabion walls and gabion fences in construction, landscaping, and erosion control.</p>
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
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Gabion Fences</h3>
                                        <p class="fst-italic">Gabion fences serve as versatile solutions for property boundary demarcation, privacy, and aesthetic enhancement.</p>
                                        <p>Gabion fences are widely used in both residential and commercial applications, providing an environmentally-friendly and durable alternative to traditional fencing options. Constructed from high-quality wire mesh and filled with natural stones, gabion fences are ideal for enhancing privacy, providing sound insulation, and offering a natural, rustic appearance. They are particularly useful for noise reduction in urban areas, acting as a natural barrier against unwanted sounds. Their long-lasting construction ensures minimal maintenance, making them a reliable and sustainable option for modern fencing needs.</p>
                                        <p>These fences are also effective in landscaping projects, where they can be used to integrate natural stone elements into outdoor spaces, providing a visually appealing solution that blends seamlessly with the environment.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/10.webp') }}" alt="Gabion Fence" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Gabion Baskets</h3>
                                        <p class="fst-italic">Gabion baskets offer versatile solutions for erosion control, landscaping, and drainage projects.</p>
                                        <p>Gabion baskets are widely used for stabilizing slopes, preventing erosion, and controlling water flow in various construction projects. These baskets, filled with stones or other materials, are ideal for creating retaining structures that protect landscapes from soil movement and water erosion. Whether used for creating garden walls, shoreline protection, or drainage systems, gabion baskets provide an effective, eco-friendly solution that blends well with natural surroundings.</p>
                                        <p>They are also suitable for creating functional structures such as gabion steps, terraces, or barriers, offering flexibility in design and installation. Their robust structure ensures durability, and they are particularly well-suited for areas where traditional retaining walls may not be practical.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/11.jpg') }}" alt="Gabion Basket" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Retaining Walls</h3>
                                        <p class="fst-italic">Gabion retaining walls offer a practical and eco-friendly solution for slope stabilization and soil erosion control.</p>
                                        <p>Retaining walls made of gabions are highly effective in preventing soil erosion and stabilizing slopes in both urban and rural environments. Their modular construction allows for quick and easy installation, while their durable design ensures that the wall will last for years with minimal maintenance. These walls are particularly useful for gardens, terraces, and agricultural landscapes, where they can help manage water runoff, support growing plants, and maintain the integrity of the landscape.</p>
                                        <p>In addition to their functional role, gabion retaining walls are also an attractive addition to any outdoor space, offering a natural, textured look that complements the surrounding environment.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/12.jpg') }}" alt="Gabion Retaining Wall" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Decorative Gabions</h3>
                                        <p class="fst-italic">Decorative gabions are an excellent choice for adding unique and artistic features to your outdoor spaces.</p>
                                        <p>With their customizable design and the ability to incorporate various materials such as glass, colorful stones, or metal, decorative gabions offer a versatile and aesthetically pleasing solution for landscaping. These gabions can be used to create unique garden features such as planters, seating areas, and decorative walls that not only serve functional purposes but also add artistic appeal to the environment.</p>
                                        <p>Perfect for modern landscape designs, decorative gabions allow for the creation of one-of-a-kind outdoor spaces that combine durability with style, making them a popular choice for residential, commercial, and public spaces.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/4.webp') }}" alt="Decorative Gabion" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-5">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1 content">
                                        <h3>Custom Gabion Solutions</h3>
                                        <p class="fst-italic">We offer tailored gabion solutions to meet the specific needs of your project, from unique shapes to custom materials.</p>
                                        <p>Our custom gabion solutions provide the flexibility to design structures that perfectly align with your specific requirements. Whether you're looking to create a functional retaining wall, an aesthetic garden feature, or a robust security fence, we can tailor our gabion products to meet your vision. With options for different mesh types, stone fills, and finishes, we ensure that our custom gabions are not only durable but also visually appealing, perfectly suited for any landscape or architectural project.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 img-box">
                                        <img src="{{ asset('front/images/AITool/3.webp') }}" alt="Custom Gabion Solution" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section id="departments" class="departments mainSection">
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
        </section> --}}
        {{-- ===================End Department======================= --}}
        {{-- ===================================section1===================== --}}
        <style>
            #home-transform {
                background-color: #f1ecec;
                #right-box{
                    background-color: var(--color-red);
                    /* clip-path: polygon(0% 0%, 100% 0%, 60% 100%, 40% 100%); */
                    z-index:0;
                    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;

    clip-path: polygon(0% 0%, 100% 0%, 60% 100%, 40% 100%);
                }
                /* #right-box img{

                    z-index:70;
                } */
                .container-fluid {
                    /* background-image: url(https://i.ibb.co/wCyxmS3/bg.jpg);
                    background-size: cover;
                    background-position: center; */
                }

                /* img {
                                            width: 90%;
                                            height: 90%;
                                            margin: auto;
                                            animation: arrows 4s infinite ease-in-out;
                                        } */
                img {
                    width: 90%;
                    height: 90%;
                    margin: auto;
                    animation: arrows 4s infinite ease-in-out;
                    position: absolute;
                    left: 0%;
                    top: 30%;
                    transform: translate(-50%, -50%);
                }

                .title {
                    font-size: 2em;
                    font-family: 'Ubuntu', sans-serif;
                    font-weight: 700;
                    margin-bottom: 10px;
                }

                .sub-title {
                    font-size: 1em;
                    font-weight: 400;
                    color: gray;
                    line-height: 1.4em;
                    letter-spacing: 0.08em;
                }

                /*  .container {
                                                        width: 100%;
                                                        height: 100vh;
                                                        background-image: url(https://i.ibb.co/wCyxmS3/bg.jpg);
                                                        background-size: cover;
                                                        background-position: center;
                                                        display: flex;
                                                        justify-content: center;
                                                        align-items: center;
                                                    }

                                                    .container section {
                                                        width: 80%;
                                                        text-align: center;
                                                    }

                         */
                /* Visibility Animation */
                /* .inline-photo,
                                                .inline-photo2,
                                                .inline-photo3 {
                                                    opacity: 0;
                                                    transition: transform 1.5s ease, opacity 1s ease;
                                                }

                                                .inline-photo {
                                                    transform: translateY(4em) rotateZ(0deg);
                                                }

                                                .inline-photo2 {
                                                    transform: translateX(-15em) rotateZ(0deg);
                                                }

                                                .inline-photo3 {
                                                    transform: translateX(15em) rotateZ(0deg);
                                                }

                                                .inline-photo.is-visible,
                                                .inline-photo2.is-visible2,
                                                .inline-photo3.is-visible3 {
                                                    opacity: 1;
                                                    transform: translate(0, 0) rotateZ(0deg);
                                                } */


                /* table td {
                                                    width: 50%;
                                                    padding: 20px;
                                                }

                                                @media (max-width: 800px) {
                                                    table td {
                                                        width: 100%;
                                                        display: block;
                                                    }
                                                }


                                                .container img {
                                                    margin: auto;
                                                    width: 100%;
                                                    height: 70%;
                                                    position: absolute;
                                                    bottom: 0;
                                                    pointer-events: none;
                                                    animation: arrows 4s infinite ease-in-out;
                                                }
                                                }


                                                .animate {
                                                    animation: animatezoom 0.6s ease-out;
                                                }

                                                @keyframes animatezoom {
                                                    from {
                                                        transform: scale(0);
                                                    }

                                                    to {
                                                        transform: scale(1);
                                                    }
                                                }
                                              */

            }

            @keyframes arrows {

                0%,
                100% {
                    color: black;
                    transform: translateY(0);
                }

                50% {
                    color: #c0cb1c;
                    transform: translateY(20px);
                }
            }
        </style>

        <section id="home-transform" class="mainSection bg-grey">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6" id="left-box">
                        <div id="leftbox">
                            <h1 class="title">Bringing Your Ideas to Life with 3D Visualization</h1>

                            <h5 class="sub-title">At HD-GABION, we go beyond manufacturing. Our advanced 3D visualization
                                services allow you to see your designs come to life before they’re built. With detailed
                                renderings of gabion walls, fences, and baskets, you can plan your project with precision
                                and confidence.</h5>
                            <div class="btns-group">
                                <a class="btn-red" href="http://gabionstore.com">
                                    <i class="fa fa-cubes"></i>
                                    Explore <span class="big-txt">3D Configurator</span>
                                </a>
                                <a class="btn-red" href="http://gabioninstallation.com">
                                    <i class="fa fa-wrench"></i>
                                    Learn About <span class="big-txt">Installation</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 position-relative" >
                       <div id="right-box">

                       </div>
                       <img src="{{ asset('front/images/AITool/fence1-wobg.png') }}" alt="Gabion Showcase">

                    </div>
                </div>
            </div>
        </section>
        {{-- =====================End section1========================== --}}

        <!--  ***************************Product filter with zoom*************************  -->
        <section class="py-5 mainSection    " id="gallery-one">
            <header style="margin-bottom: 0px;">
                <h1 class="sectionTitle text-center pt-5">Our <span class="color-red">Products</span></h1>
                <div class="line mx-auto"></div>
            </header>
            <div class="gallery pt-3 p-5" data-mau-gallery-id="maugallery" data-mau-lightbox="true"
                data-mau-navigation="true" data-mau-showtags="true" data-mau-tagsposition="top"
                data-mau-mutable-options="false" data-mau-columns-xs="1" data-mau-columns-sm="2" data-mau-columns-md="6"
                data-mau-columns-lg="6" data-mau-columns-xl="6">

                <picture>
                    <source srcset="{{ asset('front/images/AITool/1.webp') }}" media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/AITool/1.webp') }}" media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/AITool/1.webp') }}"
                        alt="Fence photo : black and white/sepia photography of a long-haired woman wearing a hat."
                        datllery-tag="Fence" class="mau gallery-item" style="display: none; object-fit: cover"
                        width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/AITool/2.webp') }}" media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/AITool/2.webp') }}" media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/AITool/2.webp') }}"
                        alt="Basket photo : photography of a man sitting on a chair, legs crossed, looking out the window."
                        data-gallery-tag="Basket" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/AITool/3.webp') }}" media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/AITool/3.webp') }}" media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/AITool/3.webp') }}"
                        alt="Fence photo : photography of a coffee mug, plain yellow background." data-gallery-tag="Fence"
                        class="mau gallery-item" style="display: none; object-fit: cover" loading="lazy" width="140"
                        height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/AITool/4.jpg') }}" media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/AITool/4.jpg') }}" media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/AITool/4.jpg') }}"
                        alt="Basket photo : a standing man wearing a turtleneck sweater and glasses, with a three-day beard, behind which we see a university. Outdoor photograph in daylight, blurred background."
                        data-gallery-tag="Basket" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/AITool/5.jpg') }}" media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/AITool/5.jpg') }}" media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/AITool/5.jpg') }}"
                        alt="Basket photo : photography of a black bulldog wearing a knit. Plain yellow background."
                        data-gallery-tag="Basket" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/AITool/6.jpg') }}" media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/AITool/6.jpg') }}" media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/AITool/6.jpg') }}"
                        alt="Fence photo : a photography of a smiling woman wearing a grey short-sleeved t-shirt, a watch with a white silicone strap, sunglasses with a brown frame, jeans, and a black belt. Plain white background."
                        data-gallery-tag="Fence" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/AITool/7.jpg') }}" media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/AITool/7.jpg') }}" media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/AITool/7.jpg') }}"
                        alt="Basket photo : a photography of a happy French bulldog, wearing a red collar, standing with both front paws resting on a white ledge. Rather green country blurred background, with a white sky."
                        data-gallery-tag="Basket" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/reinier/13.jpeg') }} " media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/reinier/13.jpeg') }} " media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/reinier/13.jpeg') }}   "
                        alt="Fence photo : photography of a white cup of steaming coffee, set on a bed of coffee beans above which there is a brown textured wood blurred background."
                        data-gallery-tag="Fence" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/reinier/15.jpeg') }} " media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/reinier/15.jpeg') }} " media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/reinier/15.jpeg') }}   "
                        alt="Basket photo : a photography of a dark-haired man with green eyes posed in front of a gray pallet wood exterior wall, wearing a thin gold chain, a blue-gray wool sweater with a round neck, and a navy blue down jacket, holding a cup of hot chocolate with both hands."
                        data-gallery-tag="Basket" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/reinier/20.jpeg') }} " media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/reinier/20.jpeg') }} " media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/reinier/20.jpeg') }}   "
                        alt="Fence photo : photography of a brown-eyed Asian woman, wearing red nail polish on both hands, holding a cupcake in her right hand and tasting the cream of the cake on one fingertip of her left hand. Plain pink background."
                        data-gallery-tag="Fence" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/reinier/21.jpeg') }} " media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/reinier/21.jpeg') }} " media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/reinier/21.jpeg') }}   "
                        alt="Fence photo : top view photo of two steaming cups of coffee, each held by a hand. The one on the left is held by the hand of a white woman, of whom we can only see her hand and a part of her arm on which she wears bracelets. The one on the right is held by a white man whose hand is visible only."
                        data-gallery-tag="Fence" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

                <picture>
                    <source srcset="{{ asset('front/images/reinier/5.jpeg') }}  " media="(max-width: 480px)" />
                    <source srcset="{{ asset('front/images/reinier/5.jpeg') }}  " media="(max-width: 1000px)" />
                    <img src="{{ asset('front/images/reinier/5.jpeg') }}"
                        alt="Basket photo : photography of an American Eskimo dog with green eyes lying in the grass with his tongue out. Blurred background."
                        data-gallery-tag="Basket" class="mau gallery-item" style="display: none; object-fit: cover"
                        loading="lazy" width="140" height="40" />
                </picture>

            </div>
            <div class="text-white d-flex justify-content-center"><a href="#" class="btn-red">View More>></a>
            </div>
        </section>
        <section class="testimonial_section mainSection">
            <header style="margin-bottom: 0px;">
                <h2 class="sectionTitle text-center pt-5">Our <span class="color-red">Testimonial</span></h2>
                <div class="line mx-auto"></div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="about_content">
                            <div class="background_layer"></div>
                            <div class="layer_content">
                                <div class="section_title">
                                    <h5>CLIENTS</h5>
                                    <h2>Happy with<strong>Customers & Clients</strong></h2>
                                    <div class="heading_line"><span></span></div>
                                    <p>If you need any industrial solution we are available for you. Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                </div>
                                <a href="#">Contact Us<i class="icofont-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="testimonial_box">
                            <div class="testimonial_container">
                                <div class="background_layer"></div>
                                <div class="layer_content">
                                    <div class="testimonial_owlCarousel owl-carousel">
                                        <div class="testimonials">
                                            <div class="testimonial_content">
                                                <div class="testimonial_caption">
                                                    <h6>Robert Clarkson</h6>
                                                    <span>CEO, Axura</span>
                                                </div>
                                                <p>The team at Tectxon industry is very talented, dedicated, well organized and
                                                    knowledgeable. I was most satisfied with the quality of the workmanship.
                                                    They did excellent work.</p>
                                            </div>
                                            <div class="images_box">
                                                <div class="testimonial_img">
                                                    <img class="img-center"
                                                        src="https://cdn.pixabay.com/photo/2017/08/30/17/27/business-woman-2697954_960_720.jpg"
                                                        alt="images not found">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonials">
                                            <div class="testimonial_content">
                                                <div class="testimonial_caption">
                                                    <h6>Robert Clarkson</h6>
                                                    <span>CEO, Axura</span>
                                                </div>
                                                <p>The team at Tectxon industry is very talented, dedicated, well organized and
                                                    knowledgeable. I was most satisfied with the quality of the workmanship.
                                                    They did excellent work.</p>
                                            </div>
                                            <div class="images_box">
                                                <div class="testimonial_img">
                                                    <img class="img-center"
                                                        src="https://cdn.pixabay.com/photo/2016/02/19/10/56/man-1209494_960_720.jpg"
                                                        alt="images not found">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonials">
                                            <div class="testimonial_content">
                                                <div class="testimonial_caption">
                                                    <h6>Robert Clarkson</h6>
                                                    <span>CEO, Axura</span>
                                                </div>
                                                <p>The team at Tectxon industry is very talented, dedicated, well organized and
                                                    knowledgeable. I was most satisfied with the quality of the workmanship.
                                                    They did excellent work.</p>
                                            </div>
                                            <div class="images_box">
                                                <div class="testimonial_img">
                                                    <img class="img-center"
                                                        src="https://cdn.pixabay.com/photo/2017/09/21/19/06/woman-2773007_960_720.jpg"
                                                        alt="images not found">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- ******************************End Testimonial************************** --}}

        <!-- ********************About Us *********** -->
        <section id="main-cta" class="mainSection">
            <style>
                .cta {
                    text-align: center;
                    padding: 2em;
                    background: linear-gradient(135deg, #3AB493, #0F766E);
                    color: white;
                    border-radius: 10px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .cta p {
                    font-size: 1.2rem;
                    margin: 0.5em 0;
                    line-height: 1.5;
                    font-family: 'Ubuntu', sans-serif;
                }

                .cta a {
                    display: inline-block;
                    margin-top: 1em;
                    padding: 0.8em 2em;
                    font-size: 1rem;
                    font-weight: 600;
                    color: #3AB493;
                    background-color: white;
                    border: 2px solid white;
                    border-radius: 5px;
                    text-decoration: none;
                    transition: all 0.3s ease;
                }

                .cta a:hover {
                    background-color: #3AB493;
                    color: white;
                    border-color: #0F766E;
                    transform: scale(1.05);
                }

                /* Interactive effects for the entire CTA block */
                .cta:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
                }

                /* Media Queries for Responsiveness */
                @media (max-width: 768px) {
                    .cta {
                        padding: 1.5em;
                    }

                    .cta p {
                        font-size: 1rem;
                    }

                    .cta a {
                        font-size: 0.9rem;
                        padding: 0.6em 1.5em;
                    }
                }
            </style>
            <div class="cta">
                <p>Experience the HD-GABION Difference</p>
                <p>Contact us today to explore our products and 3D visualization services!</p>
                <a href="contact.html">Get in Touch</a>
            </div>
        </section>



    </section>
    <style>
        .features {
            .features {
                padding: 50px 0;
            }

            .section-title {
                text-align: center;
                margin-bottom: 30px;
            }

            .feature-box {
                background: #f9f9f9;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s;
            }

            .feature-box:hover {
                transform: translateY(-5px);
            }

            .feature-box h3 {
                font-size: 18px;
                color: #333;
                margin-bottom: 10px;
            }

            .feature-box p {
                font-size: 14px;
                color: #555;
            }

        }
    </style>
    <section class="features">
        <div class="container">
            <h2 class="section-title">Our Services and Features</h2>
            <div class="row">

                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Gabion Design Services</h3>
                        <p>Fast and accurate <strong>gabion design services</strong> with custom options for wall and
                            fence sizes, delivered with precision to match your project requirements.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Customization</h3>
                        <p>Convenient and seamless <strong>customization options</strong> for gabion fences and baskets,
                            tailored to your specifications, ensuring durability and aesthetic appeal.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>3D Visualization</h3>
                        <p>Advanced <strong>3D visualization tools</strong> to preview your gabion designs, allowing you
                            to visualize fences, walls, and baskets in their intended space before construction begins.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Installation Support</h3>
                        <p>Comprehensive <strong>installation support services</strong> with step-by-step guides,
                            professional assistance, and on-site supervision available for large-scale projects.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Material Quality Assurance</h3>
                        <p>Stringent <strong>quality checks</strong> to ensure the use of premium materials in gabion
                            manufacturing, offering long-lasting and weather-resistant products.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Environmental Sustainability</h3>
                        <p>Eco-friendly <strong>design practices</strong> that integrate recycled materials and
                            sustainable construction methods, helping to minimize environmental impact while enhancing
                            landscapes.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- =========================What we offers=========================== -->
    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"); */

        /*==================== VARIABLES CSS ====================*/
        :root {
            /*========== Colors ==========*/
            --text-color: #000000;
            --bg-color: #222222;

            /*========== Font and typography ==========*/
            /* --body-font: "Poppins", sans-serif;
                                                                                                                      --normal-font-size: 0.938rem; */
        }

        @media screen and (min-width: 968px) {
            :root {
                /* --normal-font-size: 1rem; */
            }
        }

        /*==================== BASE ====================*/
        *,
        *:after,
        *:before {
            /* padding: 0;
                                                                                                                      margin: 0;
                                                                                                                      box-sizing: border-box; */
        }

        body {
            /* font-size: var(--normal-font-size);
                                                                                                                      background-color: var(--bg-color);
                                                                                                                      color: var(--text-color);
                                                                                                                      font-weight: 400;
                                                                                                                      font-family: var(--body-font); */
            transition: all 0.2s ease;
        }

        /*==================== REUSABLE CSS CLASSES ====================*/
        .container {
            /* max-width: 1140px;
                                                                                                                      width: 100%;
                                                                                                                      margin: 0 auto;
                                                                                                                      padding: 3rem 0;
                                                                                                                      min-height: 100vh;
                                                                                                                      display: grid;
                                                                                                                      place-items: center; */
        }

        /*==================== SERVICE CARD ====================*/
        .card__container {
            display: flex;
            flex-wrap: wrap;
            gap: 60px;
            justify-content: center;
            width: 100%;
            max-width: 90%;
            margin: auto;
            padding: 60px 0;
        }

        .card__bx {
            --dark-color: #2e2e2e;
            --dark-alt-color: #777777;
            --white-color: #ffffff;
            --button-color: #333333;
            --transition: 0.5s ease-in-out;

            font-family: inherit;
            height: 350px;
            width: 300px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--dark-color);
            transition: var(--transition);
        }

        .card__bx::before,
        .card__bx::after {
            content: "";
            position: absolute;
            z-index: -1;
            transition: var(--transition);
        }

        .card__bx::before {
            inset: -10px 50px;
            border-top: 4px solid var(--clr);
            transform: skewY(15deg);
            border-bottom: 4px solid var(--clr);
        }

        .card__bx:hover::before {
            inset: -10px 40px;
            transform: skewY(0deg);
        }

        .card__bx::after {
            inset: 60px -10px;
            border-left: 4px solid var(--clr);
            transform: skew(15deg);
            border-right: 4px solid var(--clr);
        }

        .card__bx:hover::after {
            inset: 40px -10px;
            transform: skew(0deg);
        }

        .card__bx .card__data {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 30px;
            text-align: center;
            padding: 0 20px;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .card__bx .card__data .card__icon {
            height: 80px;
            width: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3rem;
            color: var(--text-color);
            background-color: var(--dark-color);
            transition: var(--transition);
        }

        .card__bx .card__data .card__icon {
            color: var(--clr);
            box-shadow: 0 0 0 4px var(--dark-color), 0 0 0 6px var(--clr);
        }

        .card__bx:hover .card__data .card__icon {
            color: var(--dark-color);
            background-color: var(--clr);
            box-shadow: 0 0 0 4px var(--dark-color), 0 0 0 300px var(--clr);
        }

        .card__bx .card__data .card__content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
        }

        .card__bx .card__data h3 {
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--white-color);
            transition: var(--transition);
        }

        .card__bx:hover .card__data h3 {
            color: var(--dark-color);
            transition: var(--transition);
        }

        .card__bx .card__data p {
            font-size: 0.9rem;
            color: var(--dark-alt-color);
            transition: var(--transition);
        }

        .card__bx:hover .card__data p {
            color: var(--dark-color);
            transition: var(--transition);
        }

        .card__bx .card__data a {
            position: relative;
            display: inline-flex;
            padding: 8px 15px;
            text-decoration: none;
            font-weight: 500;
            margin-top: 10px;
            border: 2px solid var(--clr);
            color: var(--dark-color);
            background-color: var(--clr);
            transition: var(--transition);
        }

        .card__bx:hover .card__data a {
            color: var(--clr);
            background-color: var(--dark-color);
        }

        .card__bx:hover .card__data a:hover {
            border-color: var(--dark-color);
            color: var(--dark-color);
            background-color: var(--clr);
        }
    </style>
    <section class="container">
        <section class="card__container">
            <div class="card__bx" style="--clr: #89ec5b">
                <div class="card__data">
                    <div class="card__icon">
                        <i class="fa-solid fa-paintbrush"></i>
                    </div>
                    <div class="card__content">
                        <h3>Designing</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="card__bx" style="--clr: #eb5ae5">
                <div class="card__data">
                    <div class="card__icon">
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <div class="card__content">
                        <h3>Develoment</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="card__bx" style="--clr: #5b98eb">
                <div class="card__data">
                    <div class="card__icon">
                        <i class="fa-brands fa-searchengin"></i>
                    </div>
                    <div class="card__content">
                        <h3>SEO</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>

        </section>

    </section>

{{-- ************************** --}}
     {{-- *****************Why Choose Us************** --}} {{-- ***************why choose us******************** --}}
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes rotateGradient {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse {
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

        .why-choose-us {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .feature-card {
            text-align: center;
            padding: 30px 20px;
            margin-bottom: 30px;
            position: relative;
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }


        .feature-card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .feature-card:nth-child(2) {
            animation-delay: 0.4s;
        }

        .feature-card:nth-child(3) {
            animation-delay: 0.6s;
        }

        .feature-card:nth-child(4) {
            animation-delay: 0.8s;
        }

        .icon-container {
            position: relative;
            width: 220px;
            height: 220px;
            margin: 0 auto 20px;
        }

        .circle-base {
            width: 200px;
            height: 200px;
            background-color: #f8f9fa;
            border-radius: 50%;
            position: absolute;
            top: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .circle-gradient-1,
        .circle-gradient-2 {
            width: 200px;
            height: 200px;
            position: absolute;
            top: 0;
            border-radius: 50%;
            z-index: 1;
            animation: rotateGradient 8s linear infinite;
        }

        .circle-gradient-1 {
            background: linear-gradient(#0d315f 0%, #64A2F2 50%);
            /* background: linear-gradient(#623636 0%, #FF0000 50%); */
        }

        .circle-gradient-2 {
            background: linear-gradient(#64A2F2 0%, #0d315f 50%);
        }

        .feature-icon {
            font-size: 5rem;
            color: #000000;
            position: relative;
            z-index: 3;
            transition: transform 0.3s ease;
        }

        .icon-container:hover .feature-icon {
            transform: scale(1.1);
        }

        .icon-container:hover .circle-base {
            animation: pulse 1s ease-in-out infinite;
        }

        .feature-title {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 20px;
            margin-top: -25px;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .feature-text {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .section-title {
            color: #64A2F2;
            /* var(--color-secondary); */
            /* #ff0000; */
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 50px;
            text-align: center;
            animation: fadeInUp 0.8s ease-out;
        }

        .divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #64A2F2, #0d315f);
            margin: 25px auto;
            border-radius: 50px;
            transition: width 0.3s ease;
        }

        .feature-card:hover .divider {
            width: 120px;
        }

        .feature-card:hover .feature-title {
            color: #ff0000;
        }

        @media (max-width: 768px) {
            .icon-container {
                width: 170px;
                height: 170px;
            }

            .circle-base,
            .circle-gradient-1,
            .circle-gradient-2 {
                width: 150px;
                height: 150px;
            }

            .feature-icon {
                font-size: 3.5rem;
            }
        }
    </style>
     <section class="why-choose-us ">
        <div class="container">
            <h2 class="section-title">Why Choose US</h2>

            <div class="row gy-4">
                <!-- Quality -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon-container">
                            <div class="circle-gradient-1"></div>
                            <div class="circle-base">
                                <i class="fas fa-award feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Quality</h3>
                        <p class="feature-text">
                            These softer shades of red can still give you that warm radiant tone without being
                            overwhelming. You can also adjust the brightness or opacity to make the color less
                            vivid.
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>

                <!-- 3D Visualization -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon-container">
                            <div class="circle-gradient-2"></div>
                            <div class="circle-base">
                                <i class="fas fa-laptop feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">3D - Visualisation</h3>
                        <p class="feature-text">
                            These softer shades of red can still give you that warm radiant tone without being
                            overwhelming. You can also adjust the brightness or opacity to make the color less
                            vivid.
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>

                <!-- Service -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon-container">
                            <div class="circle-gradient-1"></div>
                            <div class="circle-base">
                                <i class="fas fa-cog feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Service</h3>
                        <p class="feature-text">
                            These softer shades of red can still give you that warm radiant tone without being
                            overwhelming. You can also adjust the brightness or opacity to make the color less
                            vivid.
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>

                <!-- Commitment -->
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="icon-container">
                            <div class="circle-gradient-2"></div>
                            <div class="circle-base">
                                <i class="fas fa-handshake feature-icon"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Commitment</h3>
                        <p class="feature-text">
                            These softer shades of red can still give you that warm radiant tone without being
                            overwhelming. You can also adjust the brightness or opacity to make the color less
                            vivid.
                        </p>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



{{-- *********************************** --}}
    {{-- <section id="home_call_to_action" class="mainSection">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 col-lg-5 ">

                    <header>
                        <div class="largeTitle  text-justify">
                            "Let us
                            help you build fences and walls that stand the test of time
                            while enhancing
                            your property’s
                            aesthetic appeal."
                        </div>
                    </header>

                </div>
                <div class="col-12  col-lg-7">
                    <div class="" id="box">

                        <div class="wrapper">
                            <div class="object">
                                <div class="carousel">
                                    <div class="cell">
                                        <h3>Mission</h3>
                                        <p>
                                            Deliver innovative Gabion products that are not
                                            only practical but also
                                            enhance the aesthetic value of your property.
                                        </p>
                                        <!-- <p>
                                                                                                                                                                                                            At <strong>HD-GABION</strong>, we do more than manufacture gabions—we guide
                                                                                                                                                                                                            you every step of
                                                                                                                                                                                                            the way. From
                                                                                                                                                                                                            expert advice on material selection to customized 3D visualizations of your
                                                                                                                                                                                                            gabion fence, we
                                                                                                                                                                                                            provide
                                                                                                                                                                                                            comprehensive solutions tailored to your needs. Our team delivers detailed
                                                                                                                                                                                                            price quotes,
                                                                                                                                                                                                            ensuring
                                                                                                                                                                                                            transparency and satisfaction.
                                                                                                                                                                                                        </p> -->

                                    </div>
                                    <div class="cell">
                                        <h3>Branches</h3>

                                        <ul>
                                            <li>Spain</li>

                                            <li>Poland</li>
                                            <li>Germany</li>
                                            <li>Netherlands</li>
                                            <li>Czechia</li>
                                            <li>France</li>
                                            <li>
                                                Slovakia
                                        </ul>
                                        </b>


                                    </div>
                                    <div class="cell">
                                        <h3>WHAT WE EARNED</h3>
                                        <p>
                                            With years of expertise and thousands of
                                            kilometers of gabion fences
                                            installed, we’ve earned a
                                            reputation
                                            for reliability, innovation, and competitive
                                            pricing. Our commitment to
                                            excellence ensures you
                                            receive
                                            durable products at the best value on the
                                            market.
                                        </p>


                                    </div>
                                    <div class="cell">
                                        <h3>WHY CHOOSE US</h3>
                                        <p class="text-justify"></p>
                                        Specialize in providing <b>durable, eco-friendly,
                                            and cost-effective</b>
                                        solutions to meet the
                                        needs of
                                        customers across <b>Central Europe</b>.
                                        </p>
                                        <p class="text-justify">
                                            Offer full multilingual support, providing
                                            services in the native languages
                                            of each region to better cater to your needs and
                                            expectations.
                                        </p>

                                    </div>
                                    <div class="cell">
                                        <h3>Our Core Services</h3>
                                        <ul>
                                            <li>
                                                customized gabion solutions.
                                            </li>
                                            <li>3D visualization</li>
                                            <li>Asembly advice</li>
                                            <li>Competitive pricing</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="position-relative">
                            <p class="button-group">
                                <button class="previous-button">
                                    << </button>
                                        <button class="next-button"> >></button>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section> --}}

    <!-- ********************End About Us ************ -->

    <!-- Banner Start -->
    <section class="overflow-hidden mainSection" id="banner">
        <div class="container">
            <div class="banner-box">
                <h1 id="headingBig">D</h1>
                <div class="banner-text">
                    <h2 id="headingSmall">Design a Space <br> You Love.</h2>
                    <h3 id="headingText">Let’s bring your creative <br> imagination to
                        reality.</h3>
                </div>
                <div class="row gx-0">
                    <div class="col-md-6 col-xxl-7 ms-auto">
                        <div class="banner-img" id="bannerBigimg">
                            <img src="{{ asset('front/images/AITool/1.webp') }}" class="img-fluid" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    {{-- ******************************Testimonial************************** --}}

    </section>
@endsection
@section('js')
    <!-- ===================GSAP===================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
        integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- =================================Swiper============================ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
    <script src="{{ asset('front/js/maugalleryLauncher.js') }}" async></script>
    <script src="{{ asset('front/js/maugallery.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
        integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/js/glightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js"></script>

    <script>
        /**
         * Initiate glightbox
         */
        const glightbox = GLightbox({
            selector: '.glightbox'
        });
    </script>

    <!-- <script src="{{ asset('front/js/custom.js') }}"></script>
                                                                                                                                                                        <script src="{{ asset('admin/js/functions.js') }}"></script>
                                                                                                                                                                        {{-- <script src="{{ asset('front/js/drawingLoader.js') }}"></script> --}}
                                                                                                                                                                      <script src="{{ asset('front/js/header.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('front/js/particle.min.js') }}"></script>
    <script src="{{ asset('front/js/home.js') }}"></script>
@endsection
