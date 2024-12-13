
$(document).ready(function () {
// ajaxFormSubmit(
//     "#productCreateForm", // Form ID
//     "#save-product", // Submit button ID
//     "/admin/products/store", // Update URL
//     "POST", // HTTP Method
//     "Product Created Successfully!" // Success message
// );
// handleFormValidation(
//    "#productCreateForm",
//    "/admin/products/store",
//     "Product Created Successfully!",
//     "reset",
//     successCallback = null,
//     isFileUpload = true
// )

$("#productCreateForm").submit(function (event) {
    event.preventDefault(); // Prevent default form submission

    // Show loader
    $("#loader").show();
    // $('.overlay').show();
    // Set form data and handle file upload
    var isFileUpload=true;
    var formData = new FormData(this) ;

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
            }
        },
        error: function () {
            $(".overlay").hide();
            console.log("Error occurred.");
        },
    });
});
$("#save-product").click(function (event) {
    event.preventDefault(); // Prevent default form submission
    var url = $(this).attr('action');

    // Show loader
    $("#loader").show();
    // $('.overlay').show();
    // Set form data and handle file upload
    var isFileUpload=true;
    var formData = new FormData(this) ;

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
document.querySelectorAll('.show-product-images-btn').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        const gallery = document.getElementById(`image-gallery-${productId}`);

        console.log('Button clicked for product ID:', productId); // Debugging line

        if (gallery.style.display === 'none' || gallery.style.display === '') {
            gallery.style.display = 'table-row';
            this.innerHTML = '<i class="fas fa-eye-slash icon-white" data-toggle="tooltip" title="Hide Images"></i>';
        } else {
            gallery.style.display = 'none';
            this.innerHTML = '<i class="fas fa-eye icon-white" data-toggle="tooltip" title="Show Images"></i>';
        }
    });
});

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
document.querySelector('#producteditForm #main_image').addEventListener('change', function(event) {

     const file = event.target.files[0]; // Get the first selected file
     const reader = new FileReader();

     reader.onload = function(e) {

         // Update the main image box with the preview
         document.querySelector('#producteditForm #main_image_box').innerHTML =
             `<img src="${e.target.result}" width="100" />`;
     };

     reader.readAsDataURL(file); // Read the file as a data URL
 });

 // Listen for changes on the relevant_images input within the #producteditForm
 document.querySelector('#producteditForm #relevant_images').addEventListener('change', function(event) {
     const files = event.target.files; // Get all selected files
     const relImageBox = document.querySelector('#producteditForm #rel_image_box'); // Container to display images
     relImageBox.innerHTML = ''; // Clear any existing content

     // Loop through each selected file
     Array.from(files).forEach(file => {
         const reader = new FileReader();

         reader.onload = function(e) {
             // Create and append an image preview to the container
             const imgElement = document.createElement('img');
             imgElement.src = e.target.result;
             imgElement.width = 100;
             imgElement.style.margin = '5px'; // Add some margin for better spacing
             relImageBox.appendChild(imgElement);
         };

         reader.readAsDataURL(file); // Read the file and trigger onload
     });
 });
document.getElementById('main_image').addEventListener('change', function(event) {

    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('main_image_box').innerHTML =
            `<img src="${e.target.result}" width="100" />`;
    };
    reader.readAsDataURL(file);
});

document.getElementById('relevant_images').addEventListener('change', function(event) {
const files = event.target.files; // Get all selected files
const relImageBox = document.getElementById('rel_image_box'); // Container to display images
relImageBox.innerHTML = ''; // Clear any existing content

Array.from(files).forEach(file => { // Loop through each selected file
const reader = new FileReader();
reader.onload = function(e) {
    // Append each image preview to the container
    const imgElement = document.createElement('img');
    imgElement.src = e.target.result;
    imgElement.width = 100;
    imgElement.style.margin = '5px'; // Add some margin for better spacing
    relImageBox.appendChild(imgElement);
};
reader.readAsDataURL(file); // Read the file and trigger onload
});
});

// Listen for changes on the main_image input within the #producteditForm


});
