$(document).ready(function () {
    const mainImageInput = document.getElementById("main_image");
    const relevantImageInput = document.getElementById("relevant_images");
    const form = document.querySelector("form"); // Assuming your form is wrapped with <form>

    // Main Image Handling
    // if (document.getElementById('main_image_box').innerHTML.trim() !== '') {
    //     // Append the existing main image to the form data
    //     const existingMainImage = document.getElementById('main_image_box').querySelector('img').src;
    //     appendImageToForm(form, 'main_image', existingMainImage);
    // }

    // // // Relevant Images Handling
    // if (document.getElementById('rel_image_box').innerHTML.trim() !== '') {
    //     // Append existing relevant images to the form data
    //     const existingRelevantImages = document.getElementById('rel_image_box').querySelectorAll('img');
    //     existingRelevantImages.forEach(img => {
    //         appendImageToForm(form, 'relevant_images[]', img.src);
    //     });
    // }

    // function appendImageToForm(form, name, value) {
    //     const input = document.createElement('input');
    //     input.type = 'hidden';
    //     input.name = name;
    //     input.value = value;
    //     form.appendChild(input);
    // }
// Function to validate required fields

$.ajax({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    type: "post",
    url: "/admin/products/getlastno/article_no", // Your endpoint to fetch form data
    success: function (response) {
        console.log("Form data loaded:", response.no);
        if (response.no) {
            $("#article_no").val(parseInt(response.no) + 1);
        }
        // Add any other form field pre-fills here

        // Enable/disable form fields if necessary
    },
    error: function () {
        console.error("Error loading form data.");
    },
});
    $("#productCreateForm").submit(function (event) {
        event.preventDefault(); // Prevent default form submission
        // Validate required fields
        if (!validateRequiredFields($("#productCreateForm"))) {
            return; // Stop submission if validation fails
        }
        $("#loader").show();
        var isFileUpload = true;
        var formData = new FormData(this);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/admin/products/store",
            data: formData,
            processData: !isFileUpload, // Don't process if file upload
            contentType: isFileUpload
                ? false
                : "application/x-www-form-urlencoded",
            success: function (resp) {
                console.log(resp);
                $("#loader").hide();
                // $('.overlay').hide();
                if (resp.type === "error" && resp.status === "false") {
                    $.each(resp.errors, function (i, error) {
                        $(".reset-" + i)
                            .css("color", "red")
                            .html(error);
                        setTimeout(function () {
                            $(".reset-" + i).hide();
                        }, 4000);
                        toastr.error(decodeURIComponent(error));
                    });
                } else if (
                    resp.type === "success" ||
                    resp.type === "uploaded"
                ) {
                    $("#productCreateForm").closest(".modal").modal("hide");
                    console.log("Redirecting to: " + resp.message);
                    window.location.href =
                        resp.message +
                        "?successMessage=" +
                        encodeURIComponent("Product Created Successfully");
                    // If a custom success callback is provided, call it
                    if (typeof successCallback === "function") {
                        successCallback(resp);
                    }

                    // encodeURIComponent(resp.data || "Action successful.");
                } else if (
                    resp.type === "duplicate" &&
                    resp.status === "fail"
                ) {
                    // encodeURIComponent("");
                    toastr.error(decodeURIComponent("Product Already Exist"));
                }
            },
            error: function () {
                $(".overlay").hide();
                console.log("Error occurred.");
            },
        });
    });
    //
    // $("#save-product").click
    $("#productEditForm").submit(function (event) {
        event.preventDefault(); // Prevent default form submission
        // appendImageToForm(form, 'main_image', existingMainImage);
        // document.querySelectorAll('#rel_image_box img').forEach(img => {
        //     appendImageToForm(form, 'relevant_images[]', img.src);
        // });
        var url = $(this).attr("action");
        if (!validateRequiredFields($("#productEditForm"))) {
            return; // Stop submission if validation fails
        }
        // Show loader
        $("#loader").show();
        // $('.overlay').show();
        // Set form data and handle file upload
        var isFileUpload = true;
        var formData = new FormData(this);

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: url,
            data: formData,
            processData: !isFileUpload, // Don't process if file upload
            contentType: isFileUpload
                ? false
                : "application/x-www-form-urlencoded",
            success: function (resp) {
                console.log(resp);
                $("#loader").hide();
                // $('.overlay').hide();
                if (resp.type === "error" && resp.status === "false") {
                    $.each(resp.errors, function (i, error) {
                        $(".reset-" + i)
                            .css("color", "red")
                            .html(error);
                        setTimeout(function () {
                            $(".reset-" + i).hide();
                        }, 4000);
                        toastr.error(decodeURIComponent(error));
                    });
                } else if (
                    resp.type === "success" ||
                    resp.type === "uploaded"
                ) {
                    //                        $("#productCreateForm").closest(".modal").modal("hide");
                    console.log("Redirecting to: " + resp.message);
                    window.location.href =
                        resp.message +
                        "?successMessage=" +
                        encodeURIComponent("Product Saved Successfully");
                    // If a custom success callback is provided, call it
                    if (typeof successCallback === "function") {
                        successCallback(resp);
                    }

                    // encodeURIComponent(resp.data || "Action successful.");
                }
            },
            error: function () {
                $(".overlay").hide();
                console.log("Error occurred.");
            },
        });
    });

    // document.querySelectorAll(".show-product-images-btn").forEach((button) => {
    //     button.addEventListener("click", function () {
    //         const productId = this.getAttribute("data-id");
    //         const gallery = document.getElementById(
    //             `image-gallery-${productId}`
    //         );

    //         console.log("Button clicked for product ID:", productId); // Debugging line

    //         if (
    //             gallery.style.display === "none" ||
    //             gallery.style.display === ""
    //         ) {
    //             gallery.style.display = "table-row";
    //             this.innerHTML =
    //                 '<i class="fas fa-eye-slash icon-white" data-toggle="tooltip" title="Hide Images"></i>';
    //         } else {
    //             gallery.style.display = "none";
    //             this.innerHTML =
    //                 '<i class="fas fa-eye icon-white" data-toggle="tooltip" title="Show Images"></i>';
    //         }
    //     });
    // });
    document
        .querySelectorAll(".show-product-images-btn")
        .forEach(function (link) {
            link.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent default behavior
                var productId = document.querySelector(
                    "#relevantImagesModal-{{ $product->id }}"
                ).dataset.productId;

                console.log(productId);
                $('[data-fancybox="gallery"]').fancybox({
                    buttons: [
                        "slideShow",
                        // "thumbs",
                        "zoom",
                        "fullScreen",
                        // "share",
                        "close",
                    ],
                    loop: false,
                    protect: true,
                });
            });
        });

    // document.querySelectorAll(".view-description").forEach((link) => {
    //     link.addEventListener("click", function (e) {
    //         e.preventDefault(); // Prevent default behavior
    //         const productId = this.getAttribute("data-id");

    //         const descriptionRow = document.getElementById(
    //             `full-description-${productId}`
    //         );

    //         if (
    //             descriptionRow.style.display === "none" ||
    //             descriptionRow.style.display === ""
    //         ) {
    //             descriptionRow.style.display = "table-row"; // Show row
    //         } else {
    //             descriptionRow.style.display = "none"; // Hide row
    //         }
    //     });
    // });

    document.querySelectorAll(".view-description").forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault(); // Prevent default behavior

            // const productId = this.getAttribute("data-id");
            // const modal = document.getElementById(
            //     `productDescriptionModal-${productId}`
            // );
            // console.log(modal);
            // // const modalContent = document.getElementById(
            // //     `modalContent-${productId}`
            // // );
            // console.log(productId);

            // const instance = M.Modal.getInstance(modal); // Initialize modal instance

            // instance.open(); // Open modal
            // });
        });
    });

    // document
    //     .querySelectorAll("#filterBasketForm .basket-filter")
    //     .forEach((checkbox) => {
    //         checkbox.addEventListener("change", function () {
    //             // Pass the DOM element explicitly
    //             handleCheckboxChange($(this)); // Wrap it with jQuery to use jQuery methods
    //         });
    //     });

    // function handleCheckboxChange($checkbox) {
    //     const form = $("#filterBasketForm");
    //     const allCheckboxes = $(`input[name="${$checkbox.attr("name")}"]`);

    //     const isFileUpload = false; // Update if file upload is involved

    //     if ($checkbox.val().includes("_all")) {
    //         // If "All" is checked, uncheck all others
    //         if ($checkbox.is(":checked")) {
    //             allCheckboxes.not($checkbox).prop("checked", false);
    //         }
    //     } else {
    //         // If a specific option is checked, uncheck "All"
    //         allCheckboxes.filter('[value*="_all"]').prop("checked", false);
    //     }

    //     // Gather form data
    //     const formData = form.serialize(); // Serialize form inputs
    //     console.log(formData);
    //     // AJAX call
    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "product-filter-data/baskets",
    //         data: formData,
    //         processData: !isFileUpload,
    //         contentType: isFileUpload
    //             ? false
    //             : "application/x-www-form-urlencoded",
    //         success: function (resp) {
    //             console.log(resp);

    //             $("#loader").hide();
    //             if (resp.type === "error" && resp.status === "false") {
    //                 $.each(resp.errors, function (i, error) {
    //                     $(".reset-" + i)
    //                         .css("color", "red")
    //                         .html(error)
    //                         .show();

    //                     setTimeout(function () {
    //                         $(".reset-" + i).hide();
    //                     }, 4000);

    //                     toastr.error(decodeURIComponent(error));
    //                 });
    //             } else if (
    //                 resp.type === "success" ||
    //                 resp.type === "uploaded"
    //             ) {
    //                 updateProductList(resp.products);
    //                 // console.log("Redirecting to: " + resp.message);
    //                 // window.location.href =
    //                 //     resp.message +
    //                 //     "?successMessage=" +
    //                 //     encodeURIComponent("Filter Applied Successfully");

    //                 // if (typeof successCallback === "function") {
    //                 //     successCallback(resp);
    //                 // }
    //             } else {
    //                 // Update UI dynamically for products
    //                 // updateProductList(resp.products);
    //             }
    //         },
    //         error: function () {
    //             console.log("Error occurred.");
    //         },
    //     });
    // }
    // function updateProductList(products) {
    //     const productContainer = $(".productContainer"); // Target the container where products will be rendered
    //     // console.log(productContainer);
    //     // Clear existing products
    //     // productContainer.empty();

    //     // productContainer.append("productHTML");
    //     // Iterate over the products and append them to the container
    //     products.forEach((product) => {
    //         // console.log(product.name);
    //         // const productHTML = `${product.name}`;
    //         const productHTML = `
    //             <div class="product">
    //                 <div class="info-large">
    //                     <h4>${product.name}</h4>
    //                     <div class="sku">
    //                         <strong>${product.sku}</strong>
    //                     </div>
    //                     <div class="price-big">
    //                         $${product.price}
    //                     </div>
    //                     <button class="add-cart-large"><a href=/basket-detail/${
    //                         product.id
    //                     }>View Detail</a></button>
    //                 </div>
    //                 <div class="make3D">
    //                     <div class="product-front">
    //                         <div class="shadow"></div>
    //                         <img src="${product.main_image}" alt="">
    //                         <div class="image_overlay"></div>
    //                         <div class="view_gallery"><a href="/basket-detail/${
    //                             product.id
    //                         }">View Detail</a></div>
    //                         <div class="add_to_cart">Add To Cart</div>
    //                         <div class="view_gallery">View gallery</div>
    //                         <div class="stats">
    //                             <div class="stats-container">
    //                                 <span class="product_price">$${
    //                                     product.price
    //                                 }</span>
    //                                 <span class="product_name">${
    //                                     product.name
    //                                 }</span>
    //                                 <p>${
    //                                     product.attributes.find(
    //                                         (attr) => attr.name === "length"
    //                                     ).value
    //                                 }
    //                                 </p>
    //                             </div>
    //                         </div>
    //                     </div>
    //                     <div class="product-back">
    //                         <div class="shadow"></div>
    //                         <div class="carousel">

    //     <ul class="carousel-container" rel="0" style="width: 945px;">
    //     ${
    //         Array.isArray(product.relavant_images)
    //             ? product.relavant_images
    //                   .map(
    //                       (img) =>
    //                           `<li style="width: 33.3333%;"><img src="${img}" alt=""></li>`
    //                   )
    //                   .join("")
    //             : "<li>No images available</li>"
    //     }
    //     </ul>
    //                             <div class="arrows-perspective">
    //                                 <div class="carouselPrev">
    //                                     <div class="y"></div>
    //                                     <div class="x"></div>
    //                                 </div>
    //                                 <div class="carouselNext">
    //                                     <div class="y"></div>
    //                                     <div class="x"></div>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                         <div class="flip-back">
    //                             <div class="cy"></div>
    //                             <div class="cx"></div>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //         `;

    //         productContainer.append(productHTML);
    //     });

    //     // Initialize any interactive elements like carousels if needed
    //     // initializeCarousels();

    //     // Reinitialize interactive elements
    //     initializeInteractiveElements();
    // }
    // Function to reinitialize interactive elements
    function initializeInteractiveElements() {
        // Reinitialize hover effects and event listeners
        $(".product").each(function (i, el) {
            // Lift card and show stats on mouseover
            $(el)
                .find(".make3D")
                .hover(
                    function () {
                        $(this).parent().css("z-index", "20");
                        $(this).addClass("animate");
                        $(this)
                            .find("div.carouselNext, div.carouselPrev")
                            .addClass("visible");
                    },
                    function () {
                        $(this).removeClass("animate");
                        $(this).parent().css("z-index", "1");
                        $(this)
                            .find("div.carouselNext, div.carouselPrev")
                            .removeClass("visible");
                    }
                );

            // Flip card to the back side
            $(el)
                .find(".view_gallery")
                .click(function () {
                    $(el)
                        .find("div.carouselNext, div.carouselPrev")
                        .removeClass("visible");
                    $(el).find(".make3D").addClass("flip-10");
                    setTimeout(function () {
                        $(el)
                            .find(".make3D")
                            .removeClass("flip-10")
                            .addClass("flip90")
                            .find("div.shadow")
                            .show()
                            .fadeTo(80, 1, function () {
                                $(el)
                                    .find(
                                        ".product-front, .product-front div.shadow"
                                    )
                                    .hide();
                            });
                    }, 50);

                    setTimeout(function () {
                        $(el)
                            .find(".make3D")
                            .removeClass("flip90")
                            .addClass("flip190");
                        $(el)
                            .find(".product-back")
                            .show()
                            .find("div.shadow")
                            .show()
                            .fadeTo(90, 0);
                        setTimeout(function () {
                            $(el)
                                .find(".make3D")
                                .removeClass("flip190")
                                .addClass("flip180")
                                .find("div.shadow")
                                .hide();
                            setTimeout(function () {
                                $(el)
                                    .find(".make3D")
                                    .css("transition", "100ms ease-out");
                                $(el).find(".cx, .cy").addClass("s1");
                                setTimeout(function () {
                                    $(el).find(".cx, .cy").addClass("s2");
                                }, 100);
                                setTimeout(function () {
                                    $(el).find(".cx, .cy").addClass("s3");
                                }, 200);
                                $(el)
                                    .find("div.carouselNext, div.carouselPrev")
                                    .addClass("visible");
                            }, 100);
                        }, 100);
                    }, 150);
                });

            // Flip card back to the front side
            $(el)
                .find(".flip-back")
                .click(function () {
                    $(el)
                        .find(".make3D")
                        .removeClass("flip180")
                        .addClass("flip190");
                    setTimeout(function () {
                        $(el)
                            .find(".make3D")
                            .removeClass("flip190")
                            .addClass("flip90");

                        $(el)
                            .find(".product-back div.shadow")
                            .css("opacity", 0)
                            .fadeTo(100, 1, function () {
                                $(el)
                                    .find(
                                        ".product-back, .product-back div.shadow"
                                    )
                                    .hide();
                                $(el)
                                    .find(
                                        ".product-front, .product-front div.shadow"
                                    )
                                    .show();
                            });
                    }, 50);

                    setTimeout(function () {
                        $(el)
                            .find(".make3D")
                            .removeClass("flip90")
                            .addClass("flip-10");
                        $(el)
                            .find(".product-front div.shadow")
                            .show()
                            .fadeTo(100, 0);
                        setTimeout(function () {
                            $(el).find(".product-front div.shadow").hide();
                            $(el)
                                .find(".make3D")
                                .removeClass("flip-10")
                                .css("transition", "100ms ease-out");
                            $(el).find(".cx, .cy").removeClass("s1 s2 s3");
                        }, 100);
                    }, 150);
                });

            makeCarousel(el);
            // Any other interactivity initialization
            // $('.carousel-container').slick({
            //     // Slick.js settings, if applicable
            // });
        });

        // Initialize other necessary components (e.g., Slick or other carousel libraries)
    }
    function makeCarousel(el) {
        const carousel = $(el).find(".carousel ul");
        const carouselSlideWidth = 315;
        let carouselWidth = 0;
        let isAnimating = false;
        let currSlide = 0;

        $(carousel).attr("rel", currSlide);

        // Build the width of the carousel
        $(carousel)
            .find("li")
            .each(function () {
                carouselWidth += carouselSlideWidth;
            });
        $(carousel).css("width", carouselWidth);

        // Load Next Image
        $(el)
            .find("div.carouselNext")
            .on("click", function () {
                const currentLeft = Math.abs(parseInt($(carousel).css("left")));
                const newLeft = currentLeft + carouselSlideWidth;
                if (newLeft >= carouselWidth || isAnimating) return;

                $(carousel).css({
                    left: `-${newLeft}px`,
                    transition: "300ms ease-out",
                });
                isAnimating = true;
                currSlide++;
                $(carousel).attr("rel", currSlide);
                setTimeout(() => {
                    isAnimating = false;
                }, 300);
            });

        // Load Previous Image
        $(el)
            .find("div.carouselPrev")
            .on("click", function () {
                const currentLeft = Math.abs(parseInt($(carousel).css("left")));
                const newLeft = currentLeft - carouselSlideWidth;
                if (newLeft < 0 || isAnimating) return;

                $(carousel).css({
                    left: `-${newLeft}px`,
                    transition: "300ms ease-out",
                });
                isAnimating = true;
                currSlide--;
                $(carousel).attr("rel", currSlide);
                setTimeout(() => {
                    isAnimating = false;
                }, 300);
            });
    }

    // Function to initialize carousel controls or any other JS-based interactivity
    function initializeCarousels() {
        // Example carousel initialization code
        $(".carousel-container").slick({
            // Initialize the carousel here, e.g., slick.js settings
        });
    }

    // document.addEventListener('DOMContentLoaded', function () {
    //     // const mainImageInput = document.getElementById('main_image');
    //     console.log(mainImageInput);
    //     if (mainImageInput) { // Check if the element exists
    //         mainImageInput.addEventListener('change', function (event) {
    //             const file = event.target.files[0];
    //             const reader = new FileReader();
    //             reader.onload = function (e) {
    //                 document.getElementById('main_image_box').innerHTML =
    //                     `<img src="${e.target.result}" width="100" />`;
    //             };
    //             reader.readAsDataURL(file);
    //         });
    //     } else {
    //         console.error('Element with ID "main_image" not found.');
    //     }
    // });
    $("#productEditForm #main_image").on("change", function (event) {
        if (mainImageInput) {
            // Check if the element exists
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById(
                    "main_image_box"
                ).innerHTML = `<img src="${e.target.result}" width="100" />`;
            };
            reader.readAsDataURL(file);
        } else {
            console.error('Element with ID "main_image" not found.');
        }
    });
    $("#productEditForm #relevant_images").on("change", function (event) {
        if (relevantImageInput) {
            // Check if the element exists
            const files = event.target.files; // Get all selected files
            const relImageBox = document.getElementById("rel_image_box"); // Container to display images
            relImageBox.innerHTML = ""; // Clear any existing content

            Array.from(files).forEach((file) => {
                // Loop through each selected file
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Append each image preview to the container
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.width = 100;
                    imgElement.style.margin = "5px"; // Add some margin for better spacing
                    relImageBox.appendChild(imgElement);
                };
                reader.readAsDataURL(file); // Read the file and trigger onload
            });
        } else {
            console.error('Element with ID "main_image" not found.');
        }
    });
    $("#productCreateForm #main_image").on("change", function (event) {
        if (mainImageInput) {
            // Check if the element exists
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById(
                    "main_image_box"
                ).innerHTML = `<img src="${e.target.result}" width="100" />`;
            };
            reader.readAsDataURL(file);
        } else {
            console.error('Element with ID "main_image" not found.');
        }
    });
    $("#productCreateForm #relevant_images").on("change", function (event) {
        // alert("hi");
        if (relevantImageInput) {
            // Check if the element exists
            const files = event.target.files; // Get all selected files
            const relImageBox = document.getElementById("rel_image_box"); // Container to display images
            relImageBox.innerHTML = ""; // Clear any existing content

            Array.from(files).forEach((file) => {
                // Loop through each selected file
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Append each image preview to the container
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.width = 100;
                    imgElement.style.margin = "5px"; // Add some margin for better spacing
                    relImageBox.appendChild(imgElement);
                };
                reader.readAsDataURL(file); // Read the file and trigger onload
            });
        } else {
            console.error('Element with ID "main_image" not found.');
        }
    });
    // ****************Check Product name exist or not************

    // function checkIfExists(inputSelector, messageSelector, url, dataKey) {
    //     $(inputSelector).on('input', function () {
    //           var $input = $(this);
    //         var inputValue = $(this).val();

    //         // Clear previous message
    //         $(messageSelector).text('');
    //         $input.removeClass('input-error');
    //         if (inputValue.length > 0) {
    //             $.ajax({
    //                 headers: {
    //                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //                 },
    //                 url: url,
    //                 method: 'POST',
    //                 data: {
    //                     [dataKey]: inputValue,
    //                 },
    //                 success: function (response) {
    //                     if (response.exists) {
    //                         $(messageSelector).text(`This ${dataKey.replace('_', ' ')} already exists.`);
    //                         $input.addClass('input-error');
    //                     }

    //                 },
    //                 error: function () {
    //                     console.error(`Error checking ${dataKey.replace('_', ' ')}.`);
    //                 }
    //             });
    //         }
    //     });
    // }

    // Check for duplicate product name
    checkIfExists(
        "#productCreateForm #name",
        ".reset-name",
        "/admin/isProductByNameExist",
        "name"
    );

    // Check for duplicate article number
    checkIfExists(
        "#productCreateForm #article_no",
        ".reset-article_no",
        "/admin/isProductByArticleExist",
        "article_no"
    );

    // Check for duplicate HS code
    checkIfExists(
        "#productCreateForm #hs_code",
        ".reset-hs_code",
        "/admin/isProductByHsCodeExist",
        "hs_code"
    );
    checkIfExists(
        "#productEditForm #name",
        ".reset-name",
        "/admin/isProductByNameExist",
        "name"
    );

    // Check for duplicate article number
    checkIfExists(
        "#productEditForm #article_no",
        ".reset-article_no",
        "/admin/isProductByArticleExist",
        "article_no"
    );

    // Check for duplicate HS code
    checkIfExists(
        "#productEditForm #hs_code",
        ".reset-hs_code",
        "/admin/isProductByHsCodeExist",
        "hs_code"
    );
    // document.getElementById('relevant_images').addEventListener('change', function(event) {
    //     const files = event.target.files; // Get all selected files
    //     const relImageBox = document.getElementById('rel_image_box'); // Container to display images
    //     relImageBox.innerHTML = ''; // Clear any existing content

    //     Array.from(files).forEach(file => { // Loop through each selected file
    //     const reader = new FileReader();
    //     reader.onload = function(e) {
    //         // Append each image preview to the container
    //         const imgElement = document.createElement('img');
    //         imgElement.src = e.target.result;
    //         imgElement.width = 100;
    //         imgElement.style.margin = '5px'; // Add some margin for better spacing
    //         relImageBox.appendChild(imgElement);
    //     };
    //     reader.readAsDataURL(file); // Read the file and trigger onload
    //     });
    //     });
    // document.querySelectorAll('.full-description').forEach(button => {
    //     button.addEventListener('click', function() {
    //         const productId = this.getAttribute('data-id');
    //         const gallery = document.getElementById(`image-gallery-${productId}`);

    //         console.log('Button clicked for product ID:', productId); // Debugging line

    //         if (gallery.style.display === 'none' || gallery.style.display === '') {
    //             gallery.style.display = 'table-row';
    //             this.innerHTML = '<i class="fas fa-eye-slash icon-white" data-toggle="tooltip" title="Hide Images"></i>';
    //         } else {
    //             gallery.style.display = 'none';
    //             this.innerHTML = '<i class="fas fa-eye icon-white" data-toggle="tooltip" title="Show Images"></i>';
    //         }
    //     });
    // });
    // $('.view-description').on('click', function(e) {
    //     e.preventDefault(); // Prevent default anchor behavior
    //     $(this).next('.description-content').toggle(); // Toggle visibility of the description content
    // });
    // document.getElementsByClassName()
    // document.querySelectorAll('.edit-product-btn').forEach(button => {
    //     button.addEventListener('click', function() {
    //         const productId = this.getAttribute('data-id');
    //         populateProductForm(productId);
    //         $('#editProductModal').modal('show'); // Assuming you have a modal with this id
    //     });
    // });

    // function populateProductForm(productId) {
    //     // You can make an AJAX request to get the product details or populate the form if the data is already available
    //     // For example, using a Laravel route to get the product details:
    //    // Trigger the edit modal and populate the form fields via AJAX

    //     $.ajax({
    //         url: `/admin/products/${productId}/edit`, // Your backend route for editing a product
    //         method: 'GET',
    //         success: function(response) {

    //             // Check if the response contains product data
    //             if (response.product) {
    //                 // Populate the form fields with product data
    //                 $('#producteditForm #id').val(response.product.id);
    //                 $('#producteditForm #name').val(response.product.name);
    //                 $('#producteditForm #category_id').val(response.product.category_id); // Set category
    //                 $('#producteditForm #length').val(response.product.length);
    //                 $('#producteditForm #depth').val(response.product.depth);
    //                 $('#producteditForm #height').val(response.product.height);
    //                 $('#producteditForm #maze').val(response.product.maze);
    //                 // $('#producteditForm #main_image').src(response.product.main_image);
    //                 // If there are main image and relevant images, display them (if they exist)
    //                 if (response.product.main_image) {

    //                     $('#producteditForm #main_image_box').html(`
    //                         <img src="../../${response.product.main_image}" alt="Main Image" width="100">
    //                     `);
    //                 }

    //                 if (response.product.relevant_images) {
    //                     // Parse the JSON string into an array
    //                     let relevantImages = JSON.parse(response.product.relevant_images);

    //                     let relevantImagesHtml = '';
    //                     relevantImages.forEach(function(image) {
    //                         console.log(image);
    //                         relevantImagesHtml += `
    //                             <img src="../../${image}" alt="Relevant Image" width="100">
    //                         `;
    //                         console.log(relevantImagesHtml);
    //                     });

    //                     $('#producteditForm #rel_image_box').html(relevantImagesHtml);

    //                     // <img src="../../admin/images/products/78499.jpg" alt="Relevant Image" width="100"></img>
    //                 }

    //                 // Open the modal after the fields are populated
    //                 $('#editProductModal').modal('show');
    //             } else {
    //                 console.log('No product found in response');
    //             }
    //         },
    //         error: function() {
    //             console.log('Error fetching product data');
    //         }
    //     });

    // }
    // document.querySelector('#productEditForm #main_image').addEventListener('change', function(event) {

    //      const file = event.target.files[0]; // Get the first selected file
    //      const reader = new FileReader();

    //      reader.onload = function(e) {

    //          // Update the main image box with the preview
    //          document.querySelector('#productEditForm #main_image_box').innerHTML =
    //              `<img src="${e.target.result}" width="100" />`;
    //      };

    //      reader.readAsDataURL(file); // Read the file as a data URL
    //  });

    //  // Listen for changes on the relevant_images input within the #producteditForm
    //  document.querySelector('#productEditForm #relevant_images').addEventListener('change', function(event) {
    //      const files = event.target.files; // Get all selected files
    //      const relImageBox = document.querySelector('#productEditForm #rel_image_box'); // Container to display images
    //      relImageBox.innerHTML = ''; // Clear any existing content

    //      // Loop through each selected file
    //      Array.from(files).forEach(file => {
    //          const reader = new FileReader();

    //          reader.onload = function(e) {
    //              // Create and append an image preview to the container
    //              const imgElement = document.createElement('img');
    //              imgElement.src = e.target.result;
    //              imgElement.width = 100;
    //              imgElement.style.margin = '5px'; // Add some margin for better spacing
    //              relImageBox.appendChild(imgElement);
    //          };

    //          reader.readAsDataURL(file); // Read the file and trigger onload
    //      });
    //  });
    //  if(document.getElementById('main_image')){
    //     document.getElementById('main_image').addEventListener('change', function(event) {
    //         console.log("hi");
    //         // console.log(e.target.result);
    //             const file = event.target.files[0];
    //             const reader = new FileReader();
    //             reader.onload = function(e) {
    //                 document.getElementById('main_image_box').innerHTML =
    //                     `<img src="${e.target.result}" width="100" />`;
    //             };
    //             reader.readAsDataURL(file);
    //         });
    //  }

    // document.getElementById('main_image').addEventListener('change', function(event) {
    // console.log("hi");
    // // console.log(e.target.result);
    //     const file = event.target.files[0];
    //     const reader = new FileReader();
    //     reader.onload = function(e) {
    //         document.getElementById('main_image_box').innerHTML =
    //             `<img src="${e.target.result}" width="100" />`;
    //     };
    //     reader.readAsDataURL(file);
    // });

    // Listen for changes on the main_image input within the #producteditForm
    // $("#relevantImagesModal-{{ $product->id }}").on(
    //     "shown.bs.modal",
    //     function () {
    //         var productId = $(this).data("productId");
    //         console.log(productId);
    //         $('[data-fancybox="gallery-' + productId + '"]').fancybox({
    //             buttons: ["slideShow", "zoom", "fullScreen", "close"],
    //             loop: true,
    //             protect: true,
    //         });
    //     }
    // );
});
