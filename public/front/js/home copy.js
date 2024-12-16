$(document).ready(function () {
  // *************Project section**************
// var swiper = new Swiper(".swiper-container", {
//   effect: "coverflow",
//   grabCursor: true,
//   centeredSlides: true,
//   slidesPerView: "auto",
//   loop: true,
//   autoplay: {
//     delay: 3000,
//     disableOnInteraction: false,
//   },
//   coverflowEffect: {
//     rotate: 70,
//     stretch: 0,
//     depth: 100,
//     modifier: 1,
//     slideShadows: true,
//   },
//   pagination: {
//     el: ".swiper-pagination",
//   },
//   // Navigation arrows
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },
// });
// $(".swiper-slide").on("mouseover", function () {
//   swiper.autoplay.stop();
// });

// $(".swiper-slide").on("mouseout", function () {
//   swiper.autoplay.start();
// });

// $(".sliderright i").click(function (e) {
//   e.preventDefault();
//   var el = $(this);
//   openmodal(el);
// });
// *************End Project section**************


// ************Project Modal Section*******************

// <!-- Initialize Swiper -->

//   var galleryThumbs = new Swiper(".gallery-thumbs", {
//     spaceBetween: 10,
//     slidesPerView: 4,
//     loop: true,
//     freeMode: true,
//     loopedSlides: 5, //looped slides should be the same
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     observer: true,
//     observeParents: true,
//   });
//   var galleryTop = new Swiper(".gallery-top", {
//     spaceBetween: 10,
//     loop: true,
//     loopedSlides: 5, //looped slides should be the same
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//     thumbs: {
//       swiper: galleryThumbs,
//     },
//     observer: true,
//     observeParents: true,
//   });

//   function openmodal(el) {
//     $("#myModal").css("display", "block");
//   }
//   // Close the Modal
//   function closeModal() {
//     $("#myModal").css("display", "none");
//   }

//   var galleryThumbs = new Swiper(".gallery-thumbs", {
//     spaceBetween: 10,
//     slidesPerView: 4,
//     loop: true,
//     freeMode: true,
//     loopedSlides: 5, //looped slides should be the same
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//   });
//   var galleryTop = new Swiper(".gallery-top", {
//     spaceBetween: 10,
//     loop: true,
//     loopedSlides: 5, //looped slides should be the same
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//     thumbs: {
//       swiper: galleryThumbs,
//     },
//   });

// **************End Project Modal Section**********************
// **************contact Form Section**********************

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        // (function () {
        //   "use strict";
        //   window.addEventListener(
        //     "load",
        //     function () {
        //       // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //       var forms = document.getElementsByClassName("needs-validation");
        //       // Loop over them and prevent submission
        //       var validation = Array.prototype.filter.call(forms, function (
        //         form
        //       ) {
        //         form.addEventListener(
        //           "submit",
        //           function (event) {
        //             if (form.checkValidity() === false) {
        //               event.preventDefault();
        //               event.stopPropagation();
        //             }
        //             form.classList.add("was-validated");
        //           },
        //           false
        //         );
        //       });
        //     },
        //     false
        //   );
        // })();

      // **************end contact Form Section**********************


  });

// // ParticlesJS Config.
//   particlesJS("particles-js", {
//     particles: {
//       number: {
//         value: 50,
//         density: {
//           enable: true,
//           value_area: 700,
//         },
//       },
//       color: {
//         value: "#ffffff",
//       },
//       shape: {
//         type: "circle",
//         stroke: {
//           width: 0,
//           color: "#000000",
//         },
//         polygon: {
//           nb_sides: 5,
//         },
//       },
//       opacity: {
//         value: 0.5,
//         random: false,
//         anim: {
//           enable: false,
//           speed: 1,
//           opacity_min: 0.1,
//           sync: false,
//         },
//       },
//       size: {
//         value: 3,
//         random: true,
//         anim: {
//           enable: false,
//           speed: 40,
//           size_min: 0.1,
//           sync: false,
//         },
//       },
//       line_linked: {
//         enable: true,
//         distance: 150,
//         color: "#ffffff",
//         opacity: 0.4,
//         width: 1,
//       },
//       move: {
//         enable: true,
//         speed: 2,
//         direction: "none",
//         random: false,
//         straight: false,
//         out_mode: "out",
//         bounce: false,
//         attract: {
//           enable: false,
//           rotateX: 600,
//           rotateY: 1200,
//         },
//       },
//     },
//     interactivity: {
//       detect_on: "canvas",
//       events: {
//         onhover: {
//           enable: true,
//           mode: "grab",
//         },
//         onclick: {
//           enable: true,
//           mode: "push",
//         },
//         resize: true,
//       },
//       modes: {
//         grab: {
//           distance: 140,
//           line_linked: {
//             opacity: 1,
//           },
//         },
//         bubble: {
//           distance: 400,
//           size: 40,
//           duration: 2,
//           opacity: 8,
//           speed: 3,
//         },
//         repulse: {
//           distance: 200,
//           duration: 0.4,
//         },
//         push: {
//           particles_nb: 4,
//         },
//         remove: {
//           particles_nb: 2,
//         },
//       },
//     },
//     retina_detect: true,
//   });

// // ********************* Carousel**************
//   if ($(".tp-banner").length > 0) {
//     $(".tp-banner")
//       .show()
//       .revolution({
//         /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
//         responsiveLevels: [1240, 1024, 778, 480],

//         delay: 6000,
//         startheight: 510,
//         startwidth: 1008,
//         hideThumbs: 1000,
//         navigationType: "none",
//         touchenabled: "on",
//         onHoverStop: "on",
//         navOffsetHorizontal: 0,
//         navOffsetVertical: 0,
//         dottedOverlay: "none",
//         fullWidth: "on",
//         hideTimerBar: "on",
//       });
//   }

// *********************End Carousel**************
