$(document).ready(function () {
    handleFormValidation(
        "#categoryCreateForm",                // Form ID
        "/admin/save-category",               // URL for submission
        "#reset-success",                     // Success message selector
        "reset",                              // Error prefix (for displaying field-specific errors)
        function (resp) {                     // Optional success callback
            // Ensure `resp.message` contains a valid URL or path
            if (resp.message) {
                let redirectUrl =
                    resp.message +
                    "?successMessage=" +
                    encodeURIComponent("Category Created successfully");
                console.log("Redirecting to:", redirectUrl); // Debug the final URL
                window.location.href = redirectUrl; // Redirect to the constructed URL
            } else {
                console.error("Invalid redirect URL:", resp.message);
            }
        },
        true                                  // Indicating this is a file upload
    );
    handleFormValidation(
        "#categoryEditForm",           // Form ID
        "/admin/update-category",      // URL for the AJAX call
        "#reset-success",              // Element to display success messages
        "reset",                       // Prefix for error fields
       "",
        true                       // Set to true if the form contains file uploads
    );
    // ajaxFormSubmit("#categoryCreateForm", "#create-category-btn", "/admin/save-category");
    // handleFormValidation(
    //     "#categoryEditForm",           // Form ID
    //     "/admin/update-category",      // URL for the AJAX call
    //     "#reset-success",              // Element to display success messages
    //     "reset",                       // Prefix for error fields
    //     function (resp) {              // Success callback function
    //         // window.location.href = resp.message;
    //         window.location.href =
    //         resp.message +
    //         "?successMessage=" +encodeURIComponent("Category Updated successfully");
    //     },
    //     true                           // Set to true if the form contains file uploads
    // );
    //change status of category page

    // $(document).on("click", ".updateCategoryStatus", function () {
    //     var status = $(this).children("i").attr("status");
    //     var page_id = $(this).attr("page-id");
    //     alert(page_id);
    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "/admin/update-category-status",
    //         data: { status: status, page_id: page_id },
    //         success: function (resp) {
    //             if (resp["status"] == 0) {
    //                 $("#page-" + page_id).html(
    //                     '<i class="fas fa-toggle-off" status="Inactive" style="color: grey;"></i>'
    //                 );
    //             } else if (resp["status"] == 1) {
    //                 $("#page-" + page_id).html(
    //                     '<i class="fas fa-toggle-on" status="Active" style="color: green;"></i>'
    //                 );
    //             }
    //         },
    //         error: function () {
    //             // console.log();
    //             console.log("Error:", data);
    //             //alert("Error");
    //         },
    //     });
    // });


    // Admin Update Password
    // $("#categoryCreateForm").submit(function () {
    //     // event.preventDefault();  // Prevent default form submission
    //     // Show loader using jQuery
    //     $("#loader").show();
    //     // var formData = $(this).serialize();
    //     var formData = new FormData(this);
    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "/admin/save-category",
    //         data: formData,
    //         processData: false, // Prevent jQuery from processing the data
    //         contentType: false, // Prevent jQuery from setting the content type

    //         success: function (resp) {
    //             // Hide the loader
    //             $("#loader").hide();
    //             // Clear any existing error messages
    //             $(".reset-errors").empty();
    //             $(".reset-success").empty();
    //             $(".form-group p").empty(); // Clear individual field errors
    //             if (resp.type == "error" && resp.status == "false") {
    //                 $.each(resp.errors, function (i, error) {

    //                     $(".reset-" + i).attr("style", "color:red");
    //                     $(".reset-" + i).html(error);
    //                     setTimeout(function () {
    //                         $(".reset-" + i).css({
    //                             display: "none",
    //                         });
    //                     }, 8000);
    //                 });
    //             } else if (resp.type == "success") {
    //                 $("#reset-success").attr("style", "color:green");
    //                 $("#reset-success").html(resp.message);
    //                 window.location.href = resp.message;
    //             } else if (resp.type == "outoflimit") {
    //                 $("#reset-overflow").attr("style", "color:red");
    //                 $("#reset-overflow").html(resp.message);
    //                 // window.location.href = resp.message;
    //                 setTimeout(function () {
    //                     $("#reset-overflow").css({
    //                         display: "none",
    //                     });
    //                 }, 8000);
    //             }
    //         },
    //         error: function () {
    //             // console.log();
    //             console.log("Error");
    //             //alert("Error");
    //         },
    //     });
    // });
    // Replace your #categoryCreateForm submission code with this
// handleFormValidation(
//     "#categoryCreateForm",                // Form ID
//     "/admin/save-category",               // URL for submission
//     "#reset-success",                     // Success message selector
//     "reset",                              // Error prefix (for displaying field-specific errors)
//     function (resp) {                     // Optional success callback
//         // Success callback: redirect to the provided URL
//         // window.location.href = resp.message;
//         window.location.href =
//         resp.message +
//         "?successMessage=" +encodeURIComponent("Category Created successfully");
//     },
//     true                                  // Indicating this is a file upload
// );

    // $("#categoryEditForm").submit(function (event) {
    //     event.preventDefault(); // Prevent default form submission
    //     // Show loader using jQuery
    //     $("#loader").show();
    //     // var formData = $(this).serialize();
    //     var formData = new FormData(this);
    //     // var categoryId = $("#category_id").val();

    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "/admin/update-category",
    //         data: formData,
    //         processData: false, // Prevent jQuery from processing the data
    //         contentType: false, // Prevent jQuery from setting the content type
    //         success: function (resp) {
    //             // Hide the loader
    //             $("#loader").hide();
    //             // Clear any existing error messages
    //             $(".reset-errors").empty();
    //             $(".reset-success").empty();
    //             $(".form-group p").empty(); // Clear individual field errors
    //             if (resp.type == "error" && resp.status == "false") {
    //                 $.each(resp.errors, function (i, error) {
    //                     console.log(".reset-" + i);
    //                     $(".reset-" + i).attr("style", "color:red");
    //                     $(".reset-" + i).html(error);
    //                     setTimeout(function () {
    //                         $(".reset-" + i).css({
    //                             display: "none",
    //                         });
    //                     }, 8000);
    //                 });
    //             } else if (resp.type == "success") {
    //                 $("#reset-success").attr("style", "color:green");
    //                 $("#reset-success").html(resp.message);
    //                 window.location.href = resp.message;
    //             } else if (resp.type == "outoflimit") {
    //                 $("#reset-overflow").attr("style", "color:red");
    //                 $("#reset-overflow").html(resp.message);
    //                 // window.location.href = resp.message;
    //                 setTimeout(function () {
    //                     $("#reset-overflow").css({
    //                         display: "none",
    //                     });
    //                 }, 8000);
    //             }
    //         },
    //         error: function () {
    //             // console.log();
    //             $(".reset-errors").attr("style", "color:red");
    //             $(".reset-errors").html("Error");
    //             console.log("Error");
    //             //alert("Error");
    //         },
    //     });
    // });
    // $("#category_name").keyup(function () {
    //     var category_name = $(this).val();

    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "/admin/check-category-exists",
    //         data: { category_name: category_name },
    //         success: function (resp) {
    //             if (resp == "true") {
    //                 $(".reset-category_name").html(
    //                     "<font color='red'>This category already exists.</font>"
    //                 );
    //             }
    //             else{
    //                 $(".reset-category_name").html(
    //                     ""
    //                 );
    //             }

    //         },
    //         error: function () {
    //             console.log("Error:", data);

    //         },
    //     });
    // });
});
