@extends('front.Layout.layout')

@section('style')
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <link rel="stylesheet" href="{{ url('front/css/shop.css') }}">

    <style>
        #header {
            height: 92px;
            background: #fff url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/header-icons.png") 1448px -2px no-repeat;
            border-bottom: 1px solid #eee;
        }

        #header ul {
            padding: 33px 0 0 45px;
        }

        #header li {
            list-style: none;
            float: left;
            margin-right: 30px;
        }

        #header li a {
            font-weight: 700;
            color: #333;
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        #headerli a:hover {
            color: #000;
            cursor: pointer;
        }

        #grid-selector {
            height: 10px;
            /* width: 1291px; */
            padding: 40px 0 40px 30px;
            /* float: left; */
            color: #5d5f68;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
        }

        #grid-menu {
            /* float: right; */
            width: 25%;
            display: flex;
            justify-content: center;

        }

        #grid-menu ul {

            display: flex;
            justify-content: space-around;
            width: 100px;
            /* float: right; */
            /* position: relative; */
            /* top: -1px; */
        }

        #grid-menu li {
            /* float: right; */
            /* width: 25px; */
            height: 25px;
            list-style: none;
        }

        #grid-menu li a {
            display: block;
            width: 25px;
            height: 25px;
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/grid-menu.png") 0 0 no-repeat;
        }

        #grid-menu li.smallGrid {
            margin-right: 7px;
        }

        #grid-menu li.smallGrid a {
            background-position: 0 -33px;
        }

        #grid-menu li.largeGrid a {
            background-position: -37px 0;
        }

        #grid-menu li.smallGrid a.active {
            background-position: 0 0;
        }

        #grid-menu li.largeGrid a.active {
            background-position: -37px -33px;
        }


        #grid {
            /* width: 1335px; */
            /* position: absolute; */
            /* left: 340px; */
            /* height: 1200px; */
            /* top: 180px; */
        }

        #sidebar {
            /* float: left; */
            background: #fff;
            /* width: 275px; */
            padding: 13px 0 0 45px;
            /* height: 1400px; */
            border-right: 1px solid #eee;
        }

        #sidebar h3 {
            color: #262626;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 700;
            padding: 35px 0 10px 0;
            letter-spacing: 1px;
            clear: both;
            position: relative;
            left: 50px;
        }

        #sidebar h3 span {
            position: absolute;
            left: 50px;
        }

        #cart .empty {
            font-style: italic;
            color: #a0a3ab;
            font-size: 14px;
            letter-spacing: 1px;
        }

        #sidebar .checklist {
            padding: 0;
        }

        .checklist ul li {
            font-size: 14px;
            font-weight: 400;
            list-style: none;
            padding: 7px 0 7px 23px;
        }

        .checklist li span {
            float: left;
            width: 11px;
            height: 11px;
            margin-left: -23px;
            margin-top: 4px;
            border: 1px solid #d1d3d7;
            position: relative;
        }

        .sizes li span,
        .categories .sizes li {
            -webkit-transition: all 300ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
        }

        .checklist li a {
            color: #676a74;
            text-decoration: none;
            -webkit-transition: all 300ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
        }

        .checklist li a:hover {
            color: #222;
            -webkit-transition: all 300ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
        }

        .checklist a:hover span {
            border-color: #a6aab3;
        }

        .sizes a:hover span,
        .categories a:hover span {
            border-color: #a6aab3;
            -webkit-transition: all 300ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
        }

        .checklist a span span {
            border: none;
            margin: 0;
            float: none;
            position: absolute;
            top: 0;
            left: 0;
        }

        .checklist a .x {
            display: block;
            width: 0;
            height: 2px;
            background: #5ff7d2;
            top: 6px;
            left: 2px;
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-transition: all 50ms ease-out;
        }

        .checklist a .x.animate {
            width: 4px;
            -webkit-transition: all 100ms ease-in;
            -moz-transition: all 100ms ease-in;
            -ms-transition: all 100ms ease-in;
            -o-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
        }

        .checklist a .y {
            display: block;
            width: 0px;
            height: 2px;
            background: #5ff7d2;
            top: 4px;
            left: 3px;
            -ms-transform: rotate(13deg);
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
            -webkit-transition: all 50ms ease-out;
        }

        .checklist a .y.animate {
            width: 8px;
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -ms-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .checklist .checked span {
            border-color: #8d939f;
        }

        .colors ul,
        .sizes ul {
            float: left;
            width: 130px;
        }

        .colors ul li {
            padding-left: 21px;
        }

        .colors a span {
            border: none;
            position: relative;
            border-radius: 100%;
            background-color: #eae3d3;
            width: 13px;
            height: 13px;
            margin-left: -20px;
        }

        .colors a:hover span {
            width: 15px;
            height: 15px;
            margin-top: 3px;
            margin-left: -21px;
        }

        #sidebar img {
            margin-top: 6px;
        }

        .product {
            position: relative;
            perspective: 800px;
            width: 306px;
            height: 471px;
            transform-style: preserve-3d;
            transition: transform 5s;
            float: left;
            margin-right: 23px;
            -webkit-transition: width 500ms ease-in-out;
            -moz-transition: width 500ms ease-in-out;
            -ms-transition: width 500ms ease-in-out;
            -o-transition: width 500ms ease-in-out;
            transition: width 500ms ease-in-out;
            margin-bottom: 40px;
        }

        .product-front img {
            width: 100%;
        }

        .product-front,
        .product-back {
            /* width: 315px;
                                            height: 480px; */
            background: #fff;
            position: absolute;
            /* left: -5px;
                                            top: -5px; */
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .product-back {
            display: none;
            transform: rotateY(180deg);
        }

        .make3D.animate .product-back,
        .make3D.animate .product-front,
        div.large .product-back {
            top: 0px;
            left: 0px;
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .make3D {
            /* width: 305px;
                                            height: 470px; */
            width: 100%;
            height: 100%;
            position: absolute;
            top: 5%;
            left: 5%;
            bottom: 5%;
            right: 5%;
            overflow: hidden;
            transform-style: preserve-3d;
            -webkit-transition: 100ms ease-out;
            -moz-transition: 100ms ease-out;
            -o-transition: 100ms ease-out;
            transition: 100ms ease-out;
        }

        div.make3D.flip-10 {
            -webkit-transform: rotateY(-10deg);
            -moz-transform: rotateY(-10deg);
            -o-transform: rotateY(-10deg);
            transform: rotateY(-10deg);
            transition: 50ms ease-out;
        }

        div.make3D.flip90 {
            -webkit-transform: rotateY(90deg);
            -moz-transform: rotateY(90deg);
            -o-transform: rotateY(90deg);
            transform: rotateY(90deg);
            transition: 100ms ease-in;
        }

        div.make3D.flip190 {
            -webkit-transform: rotateY(190deg);
            -moz-transform: rotateY(190deg);
            -o-transform: rotateY(190deg);
            transform: rotateY(190deg);
            transition: 100ms ease-out;
        }

        div.make3D.flip180 {
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            transform: rotateY(180deg);
            transition: 150ms ease-out;
        }

        .make3D.animate {
            top: 5px;
            left: 5px;
            width: 315px;
            height: 480px;
            box-shadow: 0px 5px 31px -1px rgba(0, 0, 0, 0.15);
            -webkit-transition: 100ms ease-out;
            -moz-transition: 100ms ease-out;
            -o-transition: 100ms ease-out;
            transition: 100ms ease-out;
        }

        div.large .make3D {
            top: 0;
            left: 0;
            width: 315px;
            height: 480px;
            -webkit-transition: 300ms ease-out;
            -moz-transition: 300ms ease-out;
            -o-transition: 300ms ease-out;
            transition: 300ms ease-out;
        }

        .large div.make3D {
            box-shadow: 0px 5px 31px -1px rgba(0, 0, 0, 0);
        }

        .large div.flip-back {
            display: none;
        }

        .stats-container {
            background: #fff;
            position: absolute;
            top: 320px;
            left: 0;
            width: 100%;
            height: 50px;
            padding: 24px 40px 35px 32px;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        .make3D.animate .stats-container {
            top: 265px;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        .stats-container .product_name {
            font-size: 15px;
            color: #393c45;
            font-weight: 700;
        }

        .stats-container p {
            font-size: 15px;
            color: #b1b1b3;
            padding: 20px 0 0px 0;
        }

        .stats-container .product_price {
            float: right;
            color: #64A2F2;
            font-size: 22px;
            font-weight: 600;
        }

        .image_overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #8b9593;
            opacity: 0;
        }

        .make3D.animate .image_overlay {
            opacity: 0.7;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        .product-options {
            padding: 0;
        }

        .product-options strong {
            font-weight: 700;
            color: #393c45;
            font-size: 14px;
        }

        .product-options span {
            color: #969699;
            font-size: 14px;
            display: block;
            margin-bottom: 8px;
        }

        .add_to_cart {
            position: absolute;
            top: 80px;
            left: 50%;
            width: 152px;
            font-size: 15px;
            margin-left: -78px;
            border: 2px solid #fff;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px 0;
            opacity: 0;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        .add_to_cart:hover {
            background: #fff;
            color: #5ff7d2;
            cursor: pointer;

        }

        .make3D.animate .add_to_cart {
            opacity: 1;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        .view_gallery {
            position: absolute;
            top: 144px;
            left: 50%;
            width: 152px;
            font-size: 15px;
            margin-left: -78px;
            border: 2px solid #fff;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px 0;
            opacity: 0;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        .view_gallery:hover {
            background: #fff;
            color: #5ff7d2;
            cursor: pointer;

        }

        .make3D.animate .view_gallery {
            opacity: 1;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        div.colors div {
            margin-top: 3px;
            width: 15px;
            height: 15px;
            margin-right: 5px;
            float: left;
        }

        div.colors div span {
            width: 15px;
            height: 15px;
            display: block;
            border-radius: 50%;
        }

        div.colors div span:hover {
            width: 17px;
            height: 17px;
            margin: -1px 0 0 -1px;
        }

        div.c-blue span {
            background: #6e8cd5;
        }

        div.c-red span {
            background: #f56060;
        }

        div.c-green span {
            background: #44c28d;
        }

        div.c-white span {
            background: #fff;
            width: 14px;
            height: 14px;
            border: 1px solid #e8e9eb;
        }

        div.shadow {
            width: 335px;
            height: 520px;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 3;
            display: none;
            background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2));
            background: -o-linear-gradient(right, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2));
            background: -moz-linear-gradient(right, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2));
            background: linear-gradient(to right, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2));
        }

        .product-back div.shadow {
            z-index: 10;
            opacity: 1;
            background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1));
            background: -o-linear-gradient(right, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1));
            background: -moz-linear-gradient(right, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1));
            background: linear-gradient(to right, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1));
        }

        .flip-back {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .cx,
        .cy {
            background: #d2d5dc;
            position: absolute;
            width: 0px;
            top: 15px;
            right: 15px;
            height: 3px;
            -webkit-transition: all 250ms ease-in-out;
            -moz-transition: all 250ms ease-in-out;
            -ms-transition: all 250ms ease-in-out;
            -o-transition: all 250ms ease-in-out;
            transition: all 250ms ease-in-out;
        }

        .flip-back:hover .cx,
        .flip-back:hover .cy {
            background: #979ca7;
            -webkit-transition: all 250ms ease-in-out;
            -moz-transition: all 250ms ease-in-out;
            -ms-transition: all 250ms ease-in-out;
            -o-transition: all 250ms ease-in-out;
            transition: all 250ms ease-in-out;
        }

        .cx.s1,
        .cy.s1 {
            right: 0;
            width: 30px;
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -ms-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .cy.s2 {
            -ms-transform: rotate(50deg);
            -webkit-transform: rotate(50deg);
            transform: rotate(50deg);
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -ms-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .cy.s3 {
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -ms-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .cx.s1 {
            right: 0;
            width: 30px;
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -ms-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .cx.s2 {
            -ms-transform: rotate(140deg);
            -webkit-transform: rotate(140deg);
            transform: rotate(140deg);
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -ms-transition: all 100ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .cx.s3 {
            -ms-transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
            -webkit-transition: all 100ease-out;
            -moz-transition: all 100ms ease-out;
            -ms-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }

        .carousel {
            width: 315px;
            height: 500px;
            overflow: hidden;
            position: relative;
        }

        .carousel ul {
            position: absolute;
            top: 20%;
            left: 0;
        }

        .carousel li {
            width: 315px;
            height: 500px;
            float: left;
            overflow: hidden;
        }

        .carousel img {
            /* margin-top: -22px; */
            width: 100%;
        }

        .arrows-perspective {
            width: 315px;
            height: 55px;
            position: absolute;
            top: 218px;
            transform-style: preserve-3d;
            transition: transform 5s;
            perspective: 335px;
        }

        .carouselPrev,
        .carouselNext {
            width: 50px;
            height: 55px;
            background: #ccc;
            position: absolute;
            top: 0;
            transition: all 200ms ease-out;
            opacity: 0.9;
            cursor: pointer;
        }

        .carouselNext {
            top: 0;
            right: -26px;
            -webkit-transform: rotateY(-117deg);
            -moz-transform: rotateY(-117deg);
            -o-transform: rotateY(-117deg);
            transform: rotateY(-117deg);
            transition: all 200ms ease-out;

        }

        .carouselNext.visible {
            right: 0;
            opacity: 0.8;
            background: #fff;
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            transform: rotateY(0deg);
            transition: all 200ms ease-out;
        }

        .carouselPrev {
            left: -26px;
            top: 0;
            -webkit-transform: rotateY(117deg);
            -moz-transform: rotateY(117deg);
            -o-transform: rotateY(117deg);
            transform: rotateY(117deg);
            transition: all 200ms ease-out;

        }

        .carouselPrev.visible {
            left: 0;
            opacity: 0.8;
            background: #fff;
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            transform: rotateY(0deg);
            transition: all 200ms ease-out;
        }

        .carousel .x,
        .carousel .y {
            height: 2px;
            width: 15px;
            background: #5ff7d2;
            position: absolute;
            top: 31px;
            left: 17px;
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .carousel .x {
            -ms-transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
            top: 21px;
        }

        .carousel .carouselNext .x {
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .carousel .carouselNext .y {
            -ms-transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
        }

        div.floating-cart {
            position: absolute;
            top: 0;
            left: 0;
            width: 315px;
            height: 480px;
            background: #fff;
            z-index: 200;
            overflow: hidden;
            box-shadow: 0px 5px 31px -1px rgba(0, 0, 0, 0.15);
            display: none;
        }

        div.floating-cart .stats-container {
            display: none;
        }

        div.floating-cart .product-front {
            width: 100%;
            top: 0;
            left: 0;
        }

        div.floating-cart.moveToCart {
            left: 75px !important;
            top: 55px !important;
            width: 47px;
            height: 47px;
            -webkit-transition: all 800ms ease-in-out;
            -moz-transition: all 800ms ease-in-out;
            -ms-transition: all 800ms ease-in-out;
            -o-transition: all 800ms ease-in-out;
            transition: all 800ms ease-in-out;
        }

        body.MakeFloatingCart div.floating-cart.moveToCart {
            left: 90px !important;
            top: 140px !important;
            width: 21px;
            height: 22px;
            box-shadow: 0px 5px 31px -1px rgba(0, 0, 0, 0);
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -ms-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        div.cart-icon-top {
            /* position: absolute; */
            background: #fff url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/cart.png") 0 -3px no-repeat;
            margin: 0;
            width: 21px;
            height: 3px;
            z-index: 1;
            /* top: 140px; */
            /* left: 190px; */
        }

        div.cart-icon-bottom {
            /* position: absolute; */
            background: #fff url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/cart.png") 0 -3px no-repeat;
            margin: 0;
            width: 21px;
            height: 19px;
            z-index: 1;
            /* top: 143px; */
            /* left: 90px; */
        }

        body.MakeFloatingCart div.cart-icon-top {
            z-index: 30;
        }

        body.MakeFloatingCart div.cart-icon-bottom {
            z-index: 300;
        }

        .cart-item {
            padding: 11px 0 5px 110px;
            height: 62px;
            width: 210px;
            margin-left: -45px;
            position: relative;
            background: #fff;
            -webkit-transition: all 1000ms ease-out;
            -moz-transition: all 1000ms ease-out;
            -ms-transition: all 1000ms ease-out;
            -o-transition: all 1000ms ease-out;
            transition: all 1000ms ease-out;
        }

        .cart-item.flash {
            background: #fffeb0;
        }

        .cart-item-border {
            position: absolute;
            bottom: 0;
            left: 45px;
            background: #edeff0;
            height: 1px;
            width: 230px;
        }

        .cart-item .img-wrap {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border: 1px solid #edeff0;
            float: left;
            margin-left: -65px;
        }

        .cart-item img {
            width: 100%;
            position: relative;
            top: -10px;
        }

        .cart-item strong {
            color: #5ff7d2;
            font-size: 16px;
        }

        .cart-item span {
            color: #393c45;
            display: block;
            font-size: 14px;
        }

        .cart-item .delete-item {
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/delete-item.png") 0 0 no-repeat;
            width: 15px;
            height: 15px;
            float: right;
            margin-right: 18px;
            display: none;
        }

        .cart-item:hover .delete-item {
            display: block;
            cursor: pointer
        }


        #info {
            position: absolute;
            top: 20px;
            left: 676px;
            text-align: center;
            width: 413px;

        }

        #info p {
            font-size: 15px;
            padding: 3px;
            color: #b1b1b3
        }

        #info a {
            text-decoration: none;
        }

        #checkout {
            border: 2px solid #5ff7d2;
            font-size: 13px;
            font-weight: 700;
            padding: 3px 9px;
            position: absolute;
            top: 137px;
            left: 181px;
            color: #5ff7d2;
            display: none;
        }

        .product.large {
            width: 639px;
            margin-bottom: 25px;
            overflow: hidden;
            -webkit-transition: all 500ms ease-in-out;
            -moz-transition: all 500ms ease-in-out;
            -ms-transition: all 500ms ease-in-out;
            -o-transition: all 500ms ease-in-out;
            transition: all 500ms ease-in-out;
            box-shadow: 0px 2px 20px 0px rgba(0, 0, 0, 0.15);

        }




        /* ---------------- */
        .floating-image-large {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .info-large {
            display: none;
            position: absolute;
            top: 0;
            left: 0px;
            padding: 42px;
            width: 245px;
            height: 395px;
            -webkit-transition: all 500ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
        }

        .large .info-large {
            left: 310px;
            -webkit-transition: all 300ms ease-out;
            -moz-transition: all 300ms ease-out;
            -ms-transition: all 300ms ease-out;
            -o-transition: all 300ms ease-out;
            transition: all 300ms ease-out;
        }

        .info-large h4 {
            text-transform: uppercase;
            font-size: 28px;
            color: #000;
            font-weight: 400;
            padding: 0;
        }

        div.sku {
            font-weight: 700;
            color: #d0d0d0;
            font-size: 12px;
            padding-top: 11px;
        }

        div.sku strong {
            color: #000;
        }

        .price-big {
            font-size: 34px;
            font-weight: 600;
            color: #64A2F2;
            margin-top: 21px;
        }

        .price-big span {
            color: #d0d0d0;
            font-weight: 400;
            text-decoration: line-through;
        }

        .add-cart-large {
            border: 3px solid #000;
            font-size: 17px;
            background: #fff;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px;
            font-family: "Open Sans", sans-serif;
            width: 246px;
            margin-top: 38px;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -ms-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }

        .add-cart-large:hover {
            color: #5ff7d2;
            border-color: #5ff7d2;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -ms-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
            cursor: pointer;
        }

        .info-large h3 {
            letter-spacing: 1px;
            color: #262626;
            text-transform: uppercase;
            font-size: 14px;
            clear: left;
            margin-top: 20px;
            font-weight: 700;
            margin-bottom: 3px;
        }


        .colors-large {
            margin-bottom: 38px;
        }

        .colors-large li {
            float: left;
            list-style: none;
            margin-right: 7px;
            width: 16px;
            height: 16px;
        }

        .colors-large li a {
            float: left;
            width: 16px;
            height: 16px;
            border-radius: 50%;
        }

        .colors-large li a:hover {
            width: 19px;
            height: 19px;
            position: relative;
            top: -1px;
            left: -1px;
        }

        .sizes-large {}

        .sizes-large span {
            font-weight: 600;
            color: #b0b0b0;
        }

        .sizes-large span:hover {
            color: #000;
            cursor: pointer;
        }

        .product.large:hover {
            box-shadow: 0px 5px 31px -1px rgba(0, 0, 0, 0.15);
        }

        .credit {
            background: #fff;
            padding: 12px;
            font-size: 9pt;
            text-align: center;
            color: #333;
            margin-top: 40px;

        }

        .credit span:before {
            font-family: FontAwesome;
            color: #e41b17;
            content: "\f004";


        }

        .credit a {
            color: #333;
            text-decoration: none;
        }

        .credit a:hover {
            color: #1DBF73;
        }

        .credit a:hover:after {
            font-family: FontAwesome;
            content: "\f08e";
            font-size: 9pt;
            position: absolute;
            margin: 3px;
        }
    </style>

    <style>
        .top-hero-section {
            position: relative;
            width: 100%;
            max-width: none;
            height: 300px;
            background: linear-gradient(180deg, #0E0E0E, #9CACAE);
            /* background: linear-gradient(180deg, #250303, #ad2410); */
            display: flex;
            align-items: flex-start;
            justify-content: center;
            color: white;
            gap: 30px;
            margin-top: 120px;
        }

        .top-hero-section #header_content {
            padding-top: 50px;
        }

        .top-hero-section .tilted-box {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: white;
            transform: skewY(2deg);
            transform-origin: bottom left;
        }

        .top-hero-section h3,
        .top-hero-section h1 {
            margin: 0;
            text-align: center;
            z-index: 1;
        }

        .top-hero-section .hero-subtitle {
            color: #F7DA68;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: .08px;
            line-height: normal;
            margin-bottom: 1.2222222222rem;
            text-transform: uppercase;
        }

        .top-hero-section .hero-heading {
            font-size: 60px;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 24px;
            margin-top: 0;
            text-transform: uppercase;
        }

        /* .vertical-tabs .tab-image img {

                        width: 70%;
                        height: inherit;
                        object-fit: cover;
                        filter: grayscale(100%);
                        padding-top: 5%;
                        padding-left: 10%;
                    } */

        .top-hero-section #model {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100%;
            padding-top: 0px;
            padding-left: 50px;
        }

        .top-hero-section #model model-viewer {
            height: 120%;

        }

        /* .overlay-image {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    z-index: 0;
                    overflow: hidden;
                    background-color: rgba(0,0,0, 0.7);
                }

                .overlay-image img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    mix-blend-mode: overlay;
                    opacity: 0.8;
                } */
    </style>
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <section class="container-fluid top-hero-section">
                {{-- <div class="overlay-image">
                    <img src="{{ asset('images/AITool/DALL·E 2024-11-25 10.40.40 - A modern landscaped garden featuring a rectangular grassy plot elevated with gabion walls made of wire mesh baskets filled with neatly stacked light-c.webp') }}" alt="Background Image">
                </div> --}}
                <div id="header_content">
                    <h3 class="hero-subtitle ">3D Product Configuration</h3>
                    <h1 class="hero-heading">Gabion Fences</h1>
                </div>
                <div class="tilted-box"></div>
                <div id="model">
                    <model-viewer id="transform" camera-controls touch-action="pan-y" ar
                        src="{{ asset('images/glb/Basket.glb') }}" auto-rotate alt="A 3D model of an astronaut"
                        class="homepage-hero__webm">

                    </model-viewer>

                </div>
            </section>
            <div class="row">

                <div class="col-12">
                    <div id="header">
                        <ul>
                            <li><a href="">Fences</a></li>
                            <li><a href="">Baskets</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-md-3 ps-5">
                    <div id="sidebar">
                        <div class="cart">
                            <h3>CART
                                <span>
                                    <div class="cart-icon-top">
                                    </div>
                                    <div class="cart-icon-bottom">
                                    </div>
                                </span>

                            </h3>
                            <div id="cart">
                                <span class="empty">No items in cart.</span>
                            </div>
                        </div>
                        <div class="sidebar__dimensions">
                            {{-- <form id="filterForm" method="post" action="{{ route('filter.products', 'baskets') }}">> --}}
                            <form id="filterBasketForm" action="javascript:;" method="POST">
                                @csrf
                                {{-- ****************Length********************** --}}
                                <div class="section-title">
                                    <h4>Shop by Length</h4>
                                </div>
                                <div class="checklist length_sizes">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="length[]" id="lengthAll" value="length_all">
                                                <label class="form-check-label" for="lengthAll">
                                                    All Length
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="length[]" id="length5x5" value="30">
                                                <label class="form-check-label" for="length5x5">
                                                    30m
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="length[]" id="length5x10" value="50">
                                                <label class="form-check-label" for="length5x10">
                                                    50m
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="length[]" id="length5x15" value="100">
                                                <label class="form-check-label" for="length5x15">
                                                    100m
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                {{-- ****************Depth********************** --}}
                                <div class="section-title">
                                    <h4>Shop by Width</h4>
                                </div>
                                <div class="checklist width_sizes">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                    id="widthAll" value="width_all">
                                                <label class="form-check-label" for="widthAll">
                                                    All width
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                    id="width5x5" value="20">
                                                <label class="form-check-label" for="width5x5">
                                                    20cm
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox" name="width[]"
                                                    id="width5x10" value="30">
                                                <label class="form-check-label" for="width5x10">
                                                    30cm
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="width[]" id="width5x15" value="50">
                                                <label class="form-check-label" for="width5x15">
                                                    50cm
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="width[]" id="width5x15" value="70">
                                                <label class="form-check-label" for="width5x5">
                                                    70cm
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="width[]" id="width5x15" value="100">
                                                <label class="form-check-label" for="width5x10">
                                                    100cm
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- ****************Height********************** --}}
                                <div class="section-title">
                                    <h4>Shop by Height</h4>
                                </div>
                                <div class="checklist height_sizes">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="height[]" id="heightAll" value="height_all">
                                                <label class="form-check-label" for="heightAll">
                                                    All Height
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="height[]" id="height5x5" value="30">
                                                <label class="form-check-label" for="height5x5">
                                                    30cm
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="height[]" id="height5x5" value="50">
                                                <label class="form-check-label" for="height5x5">
                                                    50cm
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="height[]" id="height5x5" value="70">
                                                <label class="form-check-label" for="height5x5">
                                                    70cm
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="height[]" id="height5x5" value="100">
                                                <label class="form-check-label" for="height5x5">
                                                    100cm
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- ****************Mesh********************** --}}
                                <div class="section-title">
                                    <h4>Shop by Maze</h4>
                                </div>
                                <div class="checklist maze_sizes">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="maze[]" id="mazeAll" value="maze_all">
                                                <label class="form-check-label" for="mazeAll">
                                                    All maze
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="maze[]" id="maze5x5" value="5x5">
                                                <label class="form-check-label" for="maze5x5">
                                                    5×5
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input basket-filter" type="checkbox"
                                                    name="maze[]" id="maze5x5" value="5x10">
                                                <label class="form-check-label" for="maze5x10">
                                                    5×10
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                {{-- <button type="submit">Filter</button> --}}
                            </form>

                        </div>
                        <h3>CATEGORIES</h3>
                        <div class="checklist categories">
                            <ul>
                                <li><a href=""><span></span>Baskets</a></li>
                                <li><a href=""><span></span>Fences</a></li>
                                <li><a href=""><span></span>Basket Parts</a></li>
                                <li><a href=""><span></span>Fences Parts</a></li>
                                <li><a href=""><span></span>Others</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12">
                            <div id="grid-selector">
                                <div id="basket-pagination"> Showing 1–9 of 48 results</div>
                                <div id="grid-menu">
                                    View:
                                    <ul>
                                        <li class="largeGrid"><a href=""></a></li>
                                        <li class="smallGrid"><a class="active" href=""></a></li>
                                    </ul>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="grid" class="productContainer">
                                <div class="product">
                                    <div class="info-large">
                                        <h4>Gabion Basket</h4>
                                        <div class="sku">
                                            <strong>30x30x30</strong>
                                        </div>

                                        <div class="price-big">

                                            $39
                                        </div>

                                        {{-- <h3>COLORS</h3>
                                        <div class="colors-large">
                                            <ul>
                                                <li><a href="" style="background:#222"><span></span></a></li>
                                                <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                                                <li><a href="" style="background:#f56060"><span></span></a></li>
                                                <li><a href="" style="background:#44c28d"><span></span></a></li>
                                            </ul>
                                        </div>

                                        <h3>SIZE</h3>
                                        <div class="sizes-large">
                                            <span>XS</span>
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                            <span>XXL</span>
                                        </div> --}}

                                        <button class="add-cart-large"><a href="{{ route('basket-detail') }}">View
                                                Detail</a></button>

                                    </div>
                                    <div class="make3D">
                                        <div class="product-front">
                                            <div class="shadow"></div>
                                            <img src="{{ asset('images/basket_orig/A001.png') }}" alt="" />
                                            <div class="image_overlay"></div>
                                            <div class="view_gallery"><a href="{{ route('basket-detail') }}">View
                                                    Detail</a>
                                            </div>
                                            <div class="add_to_cart">Add To Cart</div>
                                            <div class="view_gallery">View gallery</div>
                                            <div class="stats">
                                                <div class="stats-container">
                                                    <span class="product_price">$39</span>
                                                    <span class="product_name">Gabion Basket</span>
                                                    <p>30x30x30</p>

                                                    {{-- <div class="product-options">
                                                        <strong>SIZES</strong>
                                                        <span>XS, S, M, L, XL, XXL</span>
                                                        <strong>COLORS</strong>
                                                        <div class="colors">
                                                            <div class="c-blue"><span></span></div>
                                                            <div class="c-red"><span></span></div>
                                                            <div class="c-white"><span></span></div>
                                                            <div class="c-green"><span></span></div>
                                                        </div>
                                                    </div> --}}

                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-back">
                                            <div class="shadow"></div>
                                            <div class="carousel">
                                                <ul class="carousel-container">
                                                    <li><img src="{{ asset('images/basket_orig/Basket 1.jpg') }}"
                                                            alt="" />
                                                    </li>
                                                    <li><img src="{{ asset('images/basket_orig/Basket 2.165.jpg') }}"
                                                            alt="" />
                                                    </li>
                                                    <li><img src="{{ asset('images/basket_orig/Basket 3.jpg') }}"
                                                            alt="" /></li>


                                                </ul>
                                                <div class="arrows-perspective">
                                                    <div class="carouselPrev">
                                                        <div class="y"></div>
                                                        <div class="x"></div>
                                                    </div>
                                                    <div class="carouselNext">
                                                        <div class="y"></div>
                                                        <div class="x"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flip-back">
                                                <div class="cy"></div>
                                                <div class="cx"></div>
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
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $(".largeGrid").click(function() {
                $(this).find('a').addClass('active');
                $('.smallGrid a').removeClass('active');

                $('.product').addClass('large').each(function() {});
                setTimeout(function() {
                    $('.info-large').show();
                }, 200);
                setTimeout(function() {

                    $('.view_gallery').trigger("click");
                }, 400);

                return false;
            });

            $(".smallGrid").click(function() {
                $(this).find('a').addClass('active');
                $('.largeGrid a').removeClass('active');

                $('div.product').removeClass('large');
                $(".make3D").removeClass('animate');
                $('.info-large').fadeOut("fast");
                setTimeout(function() {
                    $('div.flip-back').trigger("click");
                }, 400);
                return false;
            });

            $(".smallGrid").click(function() {
                $('.product').removeClass('large');
                return false;
            });

            $('.colors-large a').click(function() {
                return false;
            });


            $('.product').each(function(i, el) {

                // Lift card and show stats on Mouseover
                $(el).find('.make3D').hover(function() {
                    $(this).parent().css('z-index', "20");
                    $(this).addClass('animate');
                    $(this).find('div.carouselNext, div.carouselPrev').addClass('visible');
                }, function() {
                    $(this).removeClass('animate');
                    $(this).parent().css('z-index', "1");
                    $(this).find('div.carouselNext, div.carouselPrev').removeClass('visible');
                });

                // Flip card to the back side
                $(el).find('.view_gallery').click(function() {

                    $(el).find('div.carouselNext, div.carouselPrev').removeClass('visible');
                    $(el).find('.make3D').addClass('flip-10');
                    setTimeout(function() {
                        $(el).find('.make3D').removeClass('flip-10').addClass('flip90')
                            .find('div.shadow').show().fadeTo(80, 1, function() {
                                $(el).find('.product-front, .product-front div.shadow')
                                    .hide();
                            });
                    }, 50);

                    setTimeout(function() {
                        $(el).find('.make3D').removeClass('flip90').addClass('flip190');
                        $(el).find('.product-back').show().find('div.shadow').show().fadeTo(
                            90, 0);
                        setTimeout(function() {
                            $(el).find('.make3D').removeClass('flip190').addClass(
                                'flip180').find('div.shadow').hide();
                            setTimeout(function() {
                                $(el).find('.make3D').css('transition',
                                    '100ms ease-out');
                                $(el).find('.cx, .cy').addClass('s1');
                                setTimeout(function() {
                                    $(el).find('.cx, .cy').addClass(
                                        's2');
                                }, 100);
                                setTimeout(function() {
                                    $(el).find('.cx, .cy').addClass(
                                        's3');
                                }, 200);
                                $(el).find(
                                    'div.carouselNext, div.carouselPrev'
                                ).addClass('visible');
                            }, 100);
                        }, 100);
                    }, 150);
                });

                // Flip card back to the front side
                $(el).find('.flip-back').click(function() {

                    $(el).find('.make3D').removeClass('flip180').addClass('flip190');
                    setTimeout(function() {
                        $(el).find('.make3D').removeClass('flip190').addClass('flip90');

                        $(el).find('.product-back div.shadow').css('opacity', 0).fadeTo(100,
                            1,
                            function() {
                                $(el).find('.product-back, .product-back div.shadow')
                                    .hide();
                                $(el).find('.product-front, .product-front div.shadow')
                                    .show();
                            });
                    }, 50);

                    setTimeout(function() {
                        $(el).find('.make3D').removeClass('flip90').addClass('flip-10');
                        $(el).find('.product-front div.shadow').show().fadeTo(100, 0);
                        setTimeout(function() {
                            $(el).find('.product-front div.shadow').hide();
                            $(el).find('.make3D').removeClass('flip-10').css(
                                'transition', '100ms ease-out');
                            $(el).find('.cx, .cy').removeClass('s1 s2 s3');
                        }, 100);
                    }, 150);

                });

                makeCarousel(el);
            });

            $('.add-cart-large').each(function(i, el) {
                $(el).click(function() {
                    var carousel = $(this).parent().parent().find(".carousel-container");
                    var img = carousel.find('img').eq(carousel.attr("rel"))[0];
                    var position = $(img).offset();

                    var productName = $(this).parent().find('h4').get(0).innerHTML;

                    $("body").append('<div class="floating-cart"></div>');
                    var cart = $('div.floating-cart');
                    $("<img src='" + img.src + "' class='floating-image-large' />").appendTo(cart);

                    $(cart).css({
                        'top': position.top + 'px',
                        "left": position.left + 'px'
                    }).fadeIn("slow").addClass('moveToCart');
                    setTimeout(function() {
                        $("body").addClass("MakeFloatingCart");
                    }, 800);

                    setTimeout(function() {
                        $('div.floating-cart').remove();
                        $("body").removeClass("MakeFloatingCart");


                        var cartItem =
                            "<div class='cart-item'><div class='img-wrap'><img src='" + img
                            .src + "' alt='' /></div><span>" + productName +
                            "</span><strong>$39</strong><div class='cart-item-border'></div><div class='delete-item'></div></div>";

                        $("#cart .empty").hide();
                        $("#cart").append(cartItem);
                        $("#checkout").fadeIn(500);

                        $("#cart .cart-item").last()
                            .addClass("flash")
                            .find(".delete-item").click(function() {
                                $(this).parent().fadeOut(300, function() {
                                    $(this).remove();
                                    if ($("#cart .cart-item").size() == 0) {
                                        $("#cart .empty").fadeIn(500);
                                        $("#checkout").fadeOut(500);
                                    }
                                })
                            });
                        setTimeout(function() {
                            $("#cart .cart-item").last().removeClass("flash");
                        }, 10);

                    }, 1000);


                });
            })

            /* ----  Image Gallery Carousel   ---- */
            function makeCarousel(el) {


                var carousel = $(el).find('.carousel ul');
                var carouselSlideWidth = 315;
                var carouselWidth = 0;
                var isAnimating = false;
                var currSlide = 0;

                $(carousel).attr('rel', currSlide);

                // building the width of the casousel
                $(carousel).find('li').each(function() {
                    carouselWidth += carouselSlideWidth;
                });
                $(carousel).css('width', carouselWidth);
                // Calculate the total width based on the number of <li> elements
                var numSlides = $(carousel).find('li').length;
                var liWidth = 100 / numSlides; // Each <li> will take up an equal portion

                // Set the width of each <li> element and ensure the carousel container is wide enough
                $(carousel).find('li').css('width', liWidth + '%');
                // Load Next Image
                $(el).find('div.carouselNext').on('click', function() {
                    var currentLeft = Math.abs(parseInt($(carousel).css("left")));
                    var newLeft = currentLeft + carouselSlideWidth;
                    if (newLeft == carouselWidth || isAnimating === true) {
                        return;
                    }
                    $(carousel).css({
                        'left': "-" + newLeft + "px",
                        "transition": "300ms ease-out"
                    });
                    isAnimating = true;
                    currSlide++;
                    $(carousel).attr('rel', currSlide);
                    setTimeout(function() {
                        isAnimating = false;
                    }, 300);
                });

                // Load Previous Image
                $(el).find('div.carouselPrev').on('click', function() {
                    var currentLeft = Math.abs(parseInt($(carousel).css("left")));
                    var newLeft = currentLeft - carouselSlideWidth;
                    if (newLeft < 0 || isAnimating === true) {
                        return;
                    }
                    $(carousel).css({
                        'left': "-" + newLeft + "px",
                        "transition": "300ms ease-out"
                    });
                    isAnimating = true;
                    currSlide--;
                    $(carousel).attr('rel', currSlide);
                    setTimeout(function() {
                        isAnimating = false;
                    }, 300);
                });
            }

            $('.sizes a span, .categories a span').each(function(i, el) {
                $(el).append('<span class="x"></span><span class="y"></span>');

                $(el).parent().on('click', function() {
                    if ($(this).hasClass('checked')) {
                        $(el).find('.y').removeClass('animate');
                        setTimeout(function() {
                            $(el).find('.x').removeClass('animate');
                        }, 50);
                        $(this).removeClass('checked');
                        return false;
                    }

                    $(el).find('.x').addClass('animate');
                    setTimeout(function() {
                        $(el).find('.y').addClass('animate');
                    }, 100);
                    $(this).addClass('checked');
                    return false;
                });
            });


            $('.add_to_cart').click(function() {
                var productCard = $(this).parent();
                var position = productCard.offset();
                var productImage = $(productCard).find('img').get(0).src;
                var productName = $(productCard).find('.product_name').get(0).innerHTML;

                $("body").append('<div class="floating-cart"></div>');
                var cart = $('div.floating-cart');
                productCard.clone().appendTo(cart);
                $(cart).css({
                    'top': position.top + 'px',
                    "left": position.left + 'px'
                }).fadeIn("slow").addClass('moveToCart');
                setTimeout(function() {
                    $("body").addClass("MakeFloatingCart");
                }, 800);
                setTimeout(function() {
                    $('div.floating-cart').remove();
                    $("body").removeClass("MakeFloatingCart");


                    var cartItem = "<div class='cart-item'><div class='img-wrap'><img src='" +
                        productImage + "' alt='' /></div><span>" + productName +
                        "</span><strong>$39</strong><div class='cart-item-border'></div><div class='delete-item'></div></div>";

                    $("#cart .empty").hide();
                    $("#cart").append(cartItem);
                    $("#checkout").fadeIn(500);

                    $("#cart .cart-item").last()
                        .addClass("flash")
                        .find(".delete-item").click(function() {
                            $(this).parent().fadeOut(300, function() {
                                $(this).remove();
                                if ($("#cart .cart-item").size() == 0) {
                                    $("#cart .empty").fadeIn(500);
                                    $("#checkout").fadeOut(500);
                                }
                            })
                        });
                    setTimeout(function() {
                        $("#cart .cart-item").last().removeClass("flash");
                    }, 10);

                }, 1000);
            });
        });
    </script>
    <script>
        const modelViewerTransform = document.querySelector("model-viewer#transform");
        modelViewerTransform.style.transform = "scale(1)";
        const modelViewerColor = document.querySelector("model-viewer#color");
        modelViewerTransform.addEventListener("load", (ev) => {

            let material = modelViewerTransform.model.materials[0];

            material.pbrMetallicRoughness.setBaseColorFactor([0.7294, 0.5333, 0.0392]);

        });
    </script>
    <script src="{{ asset('admin/js/product.js') }}"></script>
@endsection
