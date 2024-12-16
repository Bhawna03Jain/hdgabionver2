/* *************************Home Hero Section***************** */

    // const slider = document.querySelector('.slider');

    // function activate(e) {
    //     const items = document.querySelectorAll('.item');
    //     e.target.matches('.next') && slider.append(items[0])
    //     e.target.matches('.prev') && slider.prepend(items[items.length - 1]);
    // }
    // // Automatically advance the slider every 3 seconds
    // setInterval(() => {
    //     const items = document.querySelectorAll('.item');
    //     slider.append(items[0]); // Move first item to the end (next)
    // }, 5000); // Adjust this value for the time interval (3000ms = 3 seconds)

    // document.addEventListener('click', activate, true);

/* *************************End Home Hero Section***************** */
/* ==========================Home Intro Rotating Box================ */
document.addEventListener('DOMContentLoaded', function() {
    let carousel = document.querySelector('.carousel');

    let cellCount = 5;
    let selectedIndex = 0;
    let autoRotateInterval;
    let startX = 0; // To store the initial touch position
    let deltaX = 0; // To calculate swipe distance

    function rotateCarousel() {
        let angle = selectedIndex / cellCount * -360;
        carousel.style.transform = 'translateZ(-275px) rotateY(' + angle + 'deg)';
    }

    let prevButton = document.querySelector('.previous-button');
    prevButton.addEventListener('click', function() {
        selectedIndex--;
        rotateCarousel();
    });

    let nextButton = document.querySelector('.next-button');


    nextButton.addEventListener('click', function() {

        selectedIndex++;
        rotateCarousel();
    });

    // Function to start the automatic rotation
    function startAutoRotate() {
        autoRotateInterval = setInterval(() => {
            selectedIndex++;
            rotateCarousel();
        }, 3000); // Adjust the time interval (in milliseconds) as needed
    }

    // Function to stop the automatic rotation
    function stopAutoRotate() {
        clearInterval(autoRotateInterval);
    }

    // Start the automatic rotation initially
    startAutoRotate();

    // Pause automatic rotation on hover
    carousel.addEventListener('mouseenter', stopAutoRotate);
    carousel.addEventListener('mouseleave', startAutoRotate);

    // Touch events for swiping
    carousel.addEventListener('touchstart', (e) => {
        stopAutoRotate(); // Pause rotation when touch starts
        startX = e.touches[0].clientX; // Get the initial touch position
    });

    carousel.addEventListener('touchmove', (e) => {
        deltaX = e.touches[0].clientX - startX; // Calculate the swipe distance
    });

    carousel.addEventListener('touchend', () => {
        if (deltaX > 50) {
            // Swipe right
            selectedIndex--;
        } else if (deltaX < -50) {
            // Swipe left
            selectedIndex++;
        }
        rotateCarousel();
        startAutoRotate(); // Resume rotation after touch ends
    });

    //--------------//
    // IMAGE TOGGLE //
    //--------------//
    function changeImage() {
        let x = document.getElementById("image");
        let y = document.getElementById("imageChangeButton");
        let cat_url =
            "https://cdn.shopify.com/s/files/1/1453/9306/products/19950NBT2-2_1024x1024.jpg?v=1504778561";
        let dog_url = "https://i.ebayimg.com/images/g/0z8AAOSwFe5Xz-p2/s-l300.jpg";
        if (x.src === cat_url) {
            x.src = dog_url;
            y.innerText = "Change to Cat";
        } else {
            x.src = cat_url;
            y.innerText = "Change to Dog";
        }
    }
});

/* ==========================End Home Intro Rotating Box================ */
// {{-- *******************Testimonial*********************** --}}

$('.testimonial_owlCarousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    autoplay:true,
    smartSpeed: 3000,
    autoplayTimeout:4000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

// {{-- ****************************End Testimonial********************** --}}

// ===================Our Services=====================

var swiper = new Swiper('.product-slider', {
    spaceBetween: 30,
    effect: 'fade',
    // initialSlide: 2,
    loop: true,
    navigation: {
        nextEl: '.next',
        prevEl: '.prev'
    },
    autoplay: {
        delay: 3000, // Time in milliseconds (3 seconds in this case)
        disableOnInteraction: false, // Continue autoplay even after user interaction
    },
    // mousewheel: {
    //     // invert: false
    // },
    on: {
        init: function () {
            var index = this.activeIndex;

            var target = $('.product-slider__item').eq(index).data('target');



            $('.product-img__item').removeClass('active');
            $('.product-img__item#' + target).addClass('active');
        }
    }

});

swiper.on('slideChange', function () {
    var index = this.activeIndex;

    var target = $('.product-slider__item').eq(index).data('target');

    // console.log(target);

    $('.product-img__item').removeClass('active');
    $('.product-img__item#' + target).addClass('active');

});

$(".js-fav").on("click", function () {
    $(this).find('.heart').toggleClass("is-active");
});

$('.product-slider').hover(
    function() {
        swiper.autoplay.stop(); // Pause autoplay
    },
    function() {
        swiper.autoplay.start(); // Resume autoplay
    }
);
// End Our Services====================
// ==================Banner===============================

gsap.registerPlugin(ScrollTrigger);
// Banner Big Text
gsap.to("#headingBig", {
    duration: 150,
    scale: 3,

    transformOrigin: "center center",
    ease: "power2.inOut",
    yoyo: true,
    repeat: 1,
    repeatRefresh: true,
    scrollTrigger: {
        trigger: "#banner",
        start: "top bottom",
        end: "bottom bottom",
        scrub: true,
        markers: false,
    },
});
// Banner Big Image
gsap.to("#bannerBigimg", {
    duration: 150,
    // y: 1200,
    yPercent: 120,
    ease: "power2.inOut",
    delay: 15,
    yoyo: true,
    repeat: 1,
    repeatRefresh: true,
    scrollTrigger: {
        trigger: "#banner",
        start: "top bottom",
        end: "top top",
        scrub: true,
        markers: false,
    },
});


gsap.from("#headingSmall", {
    delay: 20,
    duration: 150,
    left: "-100vw",

    scrollTrigger: {
        trigger: "#banner",
        start: "top center",
        end: "top top",
        scrub: true,
        markers: false,
    },
});

gsap.from("#headingText", {
    delay: 20,
    duration: 150,
    left: "-100vw",
    // opacity: 1,
    scrollTrigger: {
        trigger: "#banner",
        start: "top 20%",
        end: "bottom bottom",
        scrub: true,
        markers: false,
    },
});




// ========================End Banner==========================

// ====================home-particle-carousel===================
// ParticlesJS Config.
particlesJS("particles-js", {
    particles: {
      number: {
        value: 50,
        density: {
          enable: true,
          value_area: 700,
        },
      },
      color: {
        value: "#ffffff",
      },
      shape: {
        type: "circle",
        stroke: {
          width: 0,
          color: "#000000",
        },
        polygon: {
          nb_sides: 5,
        },
      },
      opacity: {
        value: 0.5,
        random: false,
        anim: {
          enable: false,
          speed: 1,
          opacity_min: 0.1,
          sync: false,
        },
      },
      size: {
        value: 3,
        random: true,
        anim: {
          enable: false,
          speed: 40,
          size_min: 0.1,
          sync: false,
        },
      },
      line_linked: {
        enable: true,
        distance: 150,
        color: "#ffffff",
        opacity: 0.4,
        width: 1,
      },
      move: {
        enable: true,
        speed: 2,
        direction: "none",
        random: false,
        straight: false,
        out_mode: "out",
        bounce: false,
        attract: {
          enable: false,
          rotateX: 600,
          rotateY: 1200,
        },
      },
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: {
          enable: true,
          mode: "grab",
        },
        onclick: {
          enable: true,
          mode: "push",
        },
        resize: true,
      },
      modes: {
        grab: {
          distance: 140,
          line_linked: {
            opacity: 1,
          },
        },
        bubble: {
          distance: 400,
          size: 40,
          duration: 2,
          opacity: 8,
          speed: 3,
        },
        repulse: {
          distance: 200,
          duration: 0.4,
        },
        push: {
          particles_nb: 4,
        },
        remove: {
          particles_nb: 2,
        },
      },
    },
    retina_detect: true,
  });

// ********************* Carousel**************
  if ($(".tp-banner").length > 0) {
    $(".tp-banner")
      .show()
      .revolution({
        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
        responsiveLevels: [1240, 1024, 778, 480],

        delay: 6000,
        startheight: 510,
        startwidth: 1008,
        hideThumbs: 1000,
        navigationType: "none",
        touchenabled: "on",
        onHoverStop: "on",
        navOffsetHorizontal: 0,
        navOffsetVertical: 0,
        dottedOverlay: "none",
        fullWidth: "on",
        hideTimerBar: "on",
      });
  }

// *********************End home-particle-carousel**************






