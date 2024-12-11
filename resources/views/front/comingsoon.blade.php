
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <link rel="icon" type="image/x-icon" sizes="40x40" href="imagestemp/favicon-40x40.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=SUSE:wght@100..800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <title>HD Gabion</title>
    <style>
        body {

            color: #fff;
            background-size: cover;
            background-position: center;
            font-size: 16px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(45deg, rgba(0 0, 0, 0.75),
                    rgba(0 0, 0, 0.75)), url('images/temp/background.jpg');
            background-image: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('images/temp/background.jpg');
            background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('images/temp/background.jpg');

        }

        #content {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            padding-left: 1rem;
            padding-right: 1rem;
            height: 100%;
            padding-bottom: 2rem;
            text-align: center;

        }

        #logo {
            height: 10rem;
            margin-top: 1.5rem;
            margin-bottom: 1rem;

        }

        #logo img {
            height: 100%;
        }

        .comingsoon {

            font-size: 3.5rem;
            margin-bottom: 5vh;
            --animate-duration: 10s;
            font-weight: 400;
            font-style: normal;

        }


        #your {
            font-size: 2rem;
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            letter-spacing: 0.1rem;
        }



        #text-box {
            /* font-size: 3rem; */

            text-transform: uppercase;
            border: 3px solid grey;
            /* border-radius: 2%; */
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: 1rem;
            padding-bottom: 1rem;
            margin-top: 20px;
            margin-bottom: 20px;
            color: #C0C0C0;
            box-shadow: 0px 1px 4px 0px rgb(248, 251, 252);
        }

        #text-box #gold {
            font-family: "Lora", serif;
            /* font-weight: 700; */
            font-size: 3.5rem;
            font-weight: 600;
            text-transform: uppercase;
            /* box-shadow: 10px 10px 5px 12px rgb(248, 251, 252); */
            line-height: 5rem;
            /* white-space: nowrap; */
            display: block;
        }

        #text-box #goldlarge {
            font-size: 4rem;
            text-transform: uppercase;
            display: block;
            font-family: "Lora", serif;
            font-weight: 700;

        }



        #wait {
            font-size: 2rem;
            padding-bottom: 2rem;
            /* --animate-duration: 25s; */
            font-family: "Roboto", sans-serif;

            font-weight: 600;
            letter-spacing: 0.1rem;

        }

        #contact {
            font-size: 2.5rem;
            /* --animate-duration: 5s; */
            font-family: "Roboto", sans-serif;

            font-weight: 600;
            letter-spacing: 0.1rem;
        }

        #emailid {
            font-size: 1.5rem;
            --animate-duration: 5s;

        }

        #contact-box {
            padding-top: 1rem;
        }

        .social-icons {
            display: flex;
            align-items: center;
            justify-content: space-around;
            width: 80%;
            margin-top: 2rem;
        }

        .social-icons img {
            -webkit-transform: scale(1.2);
            /* Chrome, Safari */
            -moz-transform: scale(1.2);
            /* Firefox */
            -o-transform: scale(1.2);
            /* Opera */
            transform: scale(1.2);
        }


        .social-icons img:hover {
            transform: scale(1.2);
        }

        .social-icons a .fa-square-facebook {
            color: #1877F2;

        }

        .social-icons a i.fa-square-pinterest {
            color: #E60023;

        }

        .social-icons a .fa-linkedin {
            color: #0077B5;

        }

        .social-icons a .fa-square-instagram {
            color: #E4405F;

        }

        .social-icons a .fa-youtube {
            color: #FF0000;

        }

        /* Media Queries */
        /* // Large devices (desktops, less than 1200px) */
        @media (max-width: 1199.98px) {}

        /* // Medium devices (tablets, less than 992px) */
        @media (max-width: 991.98px) {
            #text-box {

                /* border-radius: 2%; */
                padding-left: 1.5rem;
                padding-right: 1.5rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                margin-top: 20px;
                margin-bottom: 20px;

            }

            #text-box #gold {

                font-size: 3rem;
                font-weight: 600;

            }

            #text-box #goldlarge {
                font-size: 3.5rem;
                text-transform: uppercase;
                display: block;
                font-family: "Lora", serif;
                font-weight: 700;

            }

        }

        /* // Small devices (landscape phones, less than 768px) */
        @media (max-width: 767.98px) {
            #text-box {

                /* border-radius: 2%; */
                padding-left: 0.5rem;
                padding-right: 0.5rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                margin-top: 20px;
                margin-bottom: 20px;

            }

            #text-box #gold {

                font-size: 2.5rem;
                font-weight: 600;

            }

            #text-box #goldlarge {
                font-size: 3rem;


            }

        }

        /* // X-Small devices (portrait phones, less than 576px) */
        @media (max-width: 600px) {
            #text-box {

                /* border-radius: 2%; */
                padding-left: 0.4rem;
                padding-right: 0.4rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                margin-top: 20px;
                margin-bottom: 20px;

            }

            #text-box #gold {

                font-size: 2.3rem;


            }

            #text-box #goldlarge {
                font-size: 2.8rem;


            }

            #contact {
                font-size: 2.2rem;

            }

        }


        @media (max-width: 552px) {
            #text-box {

                padding-left: 0.3rem;
                padding-right: 0.3rem;
                padding-top: 1rem;
                padding-bottom: 1rem;


            }

            #text-box #gold {

                font-size: 2.1rem;
                letter-spacing: 0.1rem;


            }

            #text-box #goldlarge {
                font-size: 2.6rem;
                letter-spacing: 0.1rem;

            }

            #wait {
                font-size: 1.6rem;

                letter-spacing: 0.2rem;

            }

            #contact {
                font-size: 1.9rem;

            }

        }


        @media (max-width: 538px) {
            #text-box {

                /* border-radius: 2%; */
                padding-left: 0.3rem;
                padding-right: 0.3rem;
                padding-top: 1rem;
                padding-bottom: 1rem;


            }

            #text-box #gold {

                font-size: 1.8rem;
                letter-spacing: 0.1rem;


            }

            #text-box #goldlarge {
                font-size: 2.3rem;
                letter-spacing: 0.1rem;

            }

            #wait {
                font-size: 1.4rem;

                letter-spacing: 0.2rem;

            }

            #contact {
                font-size: 1.6rem;

            }

            #emailid {
                font-size: 1.3rem;


            }

        }

        @media (max-width: 474px) {
            .social-icons img {
                width: 35px;
                height: 35px;
            }

            #text-box {

                padding-left: 0.3rem;
                padding-right: 0.3rem;
                padding-top: 1rem;
                padding-bottom: 1rem;


            }

            #text-box #gold {

                font-size: 1.7rem;
                letter-spacing: 0.1rem;
                line-height: 3rem;

            }

            #text-box #goldlarge {
                font-size: 2.1rem;
                letter-spacing: 0.1rem;

            }

            .comingsoon {

                font-size: 3rem;
                margin-bottom: 5vh;


            }

            #your {
                font-size: 1.6rem;

            }

            #wait {
                font-size: 1.4rem;

                letter-spacing: 0.2rem;

            }

            #contact {
                font-size: 1.6rem;

            }

            #emailid {
                font-size: 1.3rem;


            }

        }

        @media (max-width: 451px) {
            #text-box {

                padding-left: 0.3rem;
                padding-right: 0.3rem;
                padding-top: 1rem;
                padding-bottom: 1rem;


            }

            #text-box #gold {

                font-size: 1.5rem;
                letter-spacing: 0.1rem;


            }

            #text-box #goldlarge {
                font-size: 2rem;
                letter-spacing: 0.1rem;

            }

            .comingsoon {

                font-size: 2.6rem;
                margin-bottom: 5vh;


            }

            #your {
                font-size: 1.6rem;

            }

            #wait {
                font-size: 1.2rem;

                letter-spacing: 0.2rem;

            }

            #contact {
                font-size: 1.4rem;

            }

            #emailid {
                font-size: 1.3rem;


            }

        }

        @media (max-width: 408px) {
            .social-icons {
                width: 100%;
            }

            .social-icons img {
                width: 38px;
                height: 38px;
            }

            #text-box {

                /* border-radius: 2%; */
                padding-left: 0.3rem;
                padding-right: 0.3rem;
                padding-top: 1rem;
                padding-bottom: 1rem;


            }

            #text-box #gold {

                font-size: 1.4rem;
                letter-spacing: 0.1rem;


            }

            #text-box #goldlarge {
                font-size: 1.8rem;
                letter-spacing: 0.1rem;

            }

            .comingsoon {

                font-size: 2.4rem;
                margin-bottom: 4vh;


            }

            #your {
                font-size: 1.4rem;

            }

            #wait {
                font-size: 1.2rem;

                letter-spacing: 0.2rem;

            }

            #contact {
                font-size: 1.4rem;

            }

            #emailid {
                font-size: 1.3rem;


            }

        }

        @media (max-width: 386px) {
            #logo {
                height: 8rem;
                margin-top: 1.5rem;
                margin-bottom: 1rem;

            }

            .social-icons img {
                width: 35px;
                height: 35px;
            }

            #text-box {

                padding-left: 0.8rem;
                padding-right: 0.8rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                margin-top: 10px;

            }

            #text-box #gold {

                font-size: 1.3rem;
                letter-spacing: 0.05rem;
                line-height: 3rem;

            }

            #text-box #goldlarge {
                font-size: 1.8rem;
                letter-spacing: 0.1rem;

            }

            .comingsoon {

                font-size: 2.4rem;
                margin-bottom: 4vh;


            }

            #your {
                font-size: 1.5rem;

            }

            #wait {
                font-size: 1.1rem;

                letter-spacing: 0.2rem;

            }

            #contact {
                font-size: 1.2rem;

            }

            #emailid {
                font-size: 1.3rem;


            }

        }

        @media (max-width: 364px) {
            /* #logo {
                height: 8rem;
                margin-top: 1.5rem;
                margin-bottom: 1rem;

            } */

            /* .social-icons img {
                width: 35px;
                height: 35px;
            } */

            #text-box {

                padding-left: 0.7rem;
                padding-right: 0.7rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
                margin-top: 10px;

            }

            #text-box #gold {

                font-size: 1.3rem;
                letter-spacing: 0.05rem;
                line-height: 3rem;

            }

            #text-box #goldlarge {
                font-size: 1.8rem;
                letter-spacing: 0.1rem;

            }

            .comingsoon {

                font-size: 2.4rem;
                margin-bottom: 4vh;


            }

            #your {
                font-size: 1.5rem;

            }

            #wait {
                font-size: 1.1rem;

                letter-spacing: 0.2rem;

            }

            #contact {
                font-size: 1.2rem;

            }

            #emailid {
                font-size: 1.3rem;


            }

        }

        /* // X-Large devices (large desktops, less than 1400px) */
        @media (max-width: 1399.98px) {}

        /* // XX-Large devices (larger desktops) */
        /* // No media query since the xxl breakpoint has no upper bound on its width */
    </style>
</head>

<body>
    <div id="content">

        <div id="logo">
            <img src="images/temp/HD-Gabion.png" alt="">

        </div>
        <h1 class="comingsoon text-warning animate__animated animate__headShake animate__infinite  " id="coming">Coming Soon</h1>

        <div id="your">Your</div>
        <!-- <span id="your">Your</span> -->
        <div id="text-box">
            <span id="gold">Gabion System Module</span>
            <span id="goldlarge" class="text-warning">GOLD</span>
        </div>
        <p id="contact-box"><span id="wait" class="">Can't Wait?</span>
            <span id="contact" class="animate__animated animate__swing animate__infinite">Contact Us Now</span>

        </p>
        <p id="emailid" class="animate__animated animate__headShake animate__infinite" id="contact">
            info@hd-gabion.eu</p>

        <!-- Social Media Icons -->
        <div class="social-icons">
            <!--
            <a href="">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href=""><i class="fa-brands fa-square-pinterest"></i></a>
            <a href=""><i class="fa-brands fa-linkedin"></i></a>
            <a href=""><i class="fa-brands fa-square-instagram"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a> -->
            <img width="48" height="48" src="https://img.icons8.com/fluency/48/facebook-new.png" alt="facebook-new" />
            <img width="48" height="48" src="https://img.icons8.com/fluency/48/instagram-new.png" alt="instagram-new" />
            <img width="48" height="48" src="https://img.icons8.com/fluency/48/pinterest.png" alt="pinterest" />
            <img width="48" height="48" src="https://img.icons8.com/fluency/48/linkedin.png" alt="linkedin" />
            <img width="48" height="48" src="https://img.icons8.com/color/48/youtube-play.png" alt="youtube-play" />

        </div>
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
