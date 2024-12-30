$(document).ready(function () {

    // $("#.preloader").fadeOut("slow");
    // $("#copyAddress").prop('checked', false);

    // Check Current User Password
    // $("#current_pwd").keyup(function () {
    //     var current_pwd = $(this).val();

    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "/admin/check-current-pwd",
    //         data: { current_pwd: current_pwd },
    //         success: function (resp) {
    //             if (resp == "false") {
    //                 $("#verifyCurrentPwd").html(
    //                     "<font color='red'>Current Password is incorrect</font>"
    //                 );
    //             } else if (resp == "true") {
    //                 $("#verifyCurrentPwd").html(
    //                     "<font color='green'>Current Password is correct</font>"
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

    //change status of cms page

    // $(document).on("click", ".updateCmsPageStatus", function () {
    //     var status = $(this).children("i").attr("status");
    //     var page_id = $(this).attr("page-id");
    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "/admin/update-cms-page-status",
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

    // $(document).on("click", ".confirmDelete", function () {
    //     var record = $(this).attr("record");
    //     var recordid = $(this).attr("recordid");
    //     Swal.fire({
    //         title: "Are you sure?",
    //         text: "You won't be able to revert this!",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Yes, delete it!",
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             Swal.fire({
    //                 title: "Deleted!",
    //                 text: "Your file has been deleted.",
    //                 icon: "success",
    //             });
    //             window.location.href = "/admin/" + record + "/" + recordid;
    //         }
    //     });

    //     //   return false;
    // });
    // $(document).on("click", ".confirmDelete", function () {
    //     var record = $(this).attr("record");
    //     var recordid = $(this).attr("recordid");
    //     console.log(record);
    //     console.log(recordid);
    //     Swal.fire({
    //         title: "Are you sure?",
    //         text: "You won't be able to revert this!",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Yes, delete it!",
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 headers: {
    //                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                         "content"
    //                     ),
    //                 },
    //                 type: "POST",
    //                 url: "/admin/" + record + "/" + recordid,
    //                 data: {
    //                     _method: "DELETE", // Laravel uses this to determine the request type
    //                 },
    //                 success: function (response) {
    //                     Swal.fire(
    //                         "Deleted!",
    //                         "Your record has been deleted.",
    //                         "success"
    //                     ).then(() => {
    //                         location.reload(); // Optionally reload the page
    //                     });
    //                 },
    //                 error: function (xhr) {
    //                     Swal.fire("Error!", "Something went wrong.", "error");
    //                 },
    //             });
    //         }
    //     });
    // });

    //Forgot Password

    // $("#adminforgotpassword").submit(function () {
    //     // event.preventDefault();  // Prevent default form submission

    //     var formData = $(this).serialize();

    //     $.ajax({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         url: "/admin/forgot-password",
    //         data: formData,
    //         success: function (resp) {
    //             if (resp.type == "error") {
    //                 $.each(resp.errors, function (i, error) {
    //                     $(".forgot-" + i).attr("style", "color:red");
    //                     $(".forgot-" + i).html(error);
    //                     setTimeout(function () {
    //                         $(".forgot-" + i).css({
    //                             display: "none",
    //                         });
    //                     }, 4000);
    //                 });
    //             } else if (resp.type == "success") {
    //                 $("#forgot-success").attr("style", "color:green");
    //                 $("#forgot-success").html(resp.message);
    //             }
    //         },
    //         error: function () {
    //             // console.log();
    //             console.log("Error");
    //             //alert("Error");
    //         },
    //     });
    // });

    //Register Customer

    $("#customerRegisterForm").submit(function () {
        // Show loader using jQuery
        $("#loader").show();
        var formData = $(this).serialize();
;
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/customer/register",
            data: formData,
            success: function (resp) {
                // Hide the loader
                $("#loader").hide();
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $(".reset-" + i).attr("style", "color:red");
                        $(".reset-" + i).html(error);
                        setTimeout(function () {
                            $(".reset-" + i).css({
                                display: "none",
                            });
                        }, 8000);
                    });
                } else if (resp.type == "success") {
                    $("#reset-success").attr("style", "color:green");
                    $("#reset-success").html(resp.message);
                }
            },
            error: function () {
                // console.log();
                console.log("Error");
                //alert("Error");
            },
        });
    });

    //Login Customer

    $("#customerLoginForm").submit(function () {

        // Show loader using jQuery
        $("#loader").show();

        var formData = $(this).serialize();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/customer/login",
            data: formData,
            success: function (resp) {
                // Hide the loader
                $("#loader").hide();

                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $(".reset-" + i).attr("style", "color:red");
                        $(".reset-" + i).html(error);
                        setTimeout(function () {
                            $(".reset-" + i).css({
                                display: "none",
                            });
                        }, 8000);
                    });
                } else if (resp.type == "success") {
                    window.location.href = resp.message;
                } else if (resp.type == "inactive") {
                    $("#reset-error").attr("style", "color:red");
                    $("#reset-error").html(resp.message);
                } else if (resp.type == "notfound") {
                    $("#reset-error").attr("style", "color:red");
                    $("#reset-error").html(resp.message);
                } else if (resp.type == "invalidpassword") {
                    $("#reset-error").attr("style", "color:red");
                    $("#reset-error").html(resp.message);
                }
            },
            error: function () {
                // console.log();
                console.log("Error");
                //alert("Error");
            },
        });
    });

    //Forgot Password

    $("#customerforgotpassword").submit(function () {
        // event.preventDefault();  // Prevent default form submission

        var formData = $(this).serialize();
        $("#loader").show();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/customer/forgot-password",
            data: formData,
            success: function (resp) {
                $("#loader").hide();
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $(".forgot-" + i).attr("style", "color:red");
                        $(".forgot-" + i).html(error);
                        setTimeout(function () {
                            $(".forgot-" + i).css({
                                display: "none",
                            });
                        }, 4000);
                    });
                } else if (resp.type == "success") {
                    $("#forgot-success").attr("style", "color:green");
                    $("#forgot-success").html(resp.message);
                } else if (resp.type == "inactive") {
                    $("#forgot-error").attr("style", "color:red");
                    $("#forgot-error").html(resp.message);
                }
            },
            error: function () {
                // console.log();
                console.log("Error");
                //alert("Error");
            },
        });
    });

    //Reset Password

    $("#customerresetpassword").submit(function () {
        // event.preventDefault();  // Prevent default form submission
        // Show loader using jQuery
        $("#loader").show();
        var formData = $(this).serialize();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/customer/reset-password",
            data: formData,
            success: function (resp) {
                // Hide the loader
                $("#loader").hide();
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $(".reset-" + i).attr("style", "color:red");
                        $(".reset-" + i).html(error);
                        setTimeout(function () {
                            $(".reset-" + i).css({
                                display: "none",
                            });
                        }, 4000);
                    });
                } else if (resp.type == "success") {
                    // $("#reset-success").attr("style", "color:green");
                    // $("#reset-success").html(resp.message);
                    window.location.href = resp.message;
                }
            },
            error: function () {
                // console.log();
                console.log("Error");
                //alert("Error");
            },
        });
    });

    //Customer Update Password

    $("#customerUpdatePasswordForm").submit(function () {
        // event.preventDefault();  // Prevent default form submission
        // Show loader using jQuery
        $("#loader").show();
        var formData = $(this).serialize();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/customer/update-password",
            data: formData,
            success: function (resp) {
                // Hide the loader
                $("#loader").hide();

                if (resp.type == "error" && resp.status == "false") {
                    $.each(resp.errors, function (i, error) {
                        console.log(".reset-" + i);
                        $(".reset-" + i).attr("style", "color:red");
                        $(".reset-" + i).html(error);
                        setTimeout(function () {
                            $(".reset-" + i).css({
                                display: "none",
                            });
                        }, 4000);
                    });
                } else if (resp.type == "success") {
                    $("#reset-success").attr("style", "color:green");
                    $("#reset-success").html(resp.message);
                    // window.location.href = resp.message;
                } else if (resp.type == "incorrect") {
                    $(".reset-current_pwd").attr("style", "color:red");
                    $(".reset-current_pwd").html(resp.message);
                    // window.location.href = resp.message;
                    setTimeout(function () {
                        $(".reset-" + i).css({
                            display: "none",
                        });
                    }, 4000);
                }
            },
            error: function () {
                // console.log();
                console.log("Error");
                //alert("Error");
            },
        });
    });

    //Customer Update Details

    $("#customerUpdateDetail").submit(function () {
        // event.preventDefault();  // Prevent default form submission
        // Show loader using jQuery
        $("#loader").show();
        var formData = $(this).serialize();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/customer/update-details",
            data: formData,
            success: function (resp) {
                // Hide the loader
                $("#loader").hide();

                if (resp.type == "error" && resp.status == "false") {
                    $.each(resp.errors, function (i, error) {
                        console.log(".update-" + i);
                        $(".update-" + i).attr("style", "color:red");
                        $(".update-" + i).html(error);
                        setTimeout(function () {
                            $(".update-" + i).css({
                                display: "none",
                            });
                        }, 4000);
                    });
                } else if (resp.type == "success") {
                    $("#update-success").attr("style", "color:green");
                    $("#update-success").html(resp.message);
                    // $("#cust_").html("Profile picture updated successfully").css("color", "green");
                    // window.location.href = resp.message;
                    $("#cust_name").html(resp.user.name);
                    $("#cust_mobile").html(
                        "<strong>Mobile:</strong> " + resp.user.mobile
                    );
                    $("#cust_email").html(
                        "<strong>Email:</strong> " + resp.user.email
                    );

                    // Update form input values with the new data
                    $("#name").val(resp.user.name);
                    $("#mobile").val(resp.user.mobile);
                    $("#address").val(resp.user.address);
                }
            },
            error: function () {
                // console.log();
                console.log("Error");
                //alert("Error");
            },
        });
    });

    //Customer Update Pic

    //      $("#customerUpdatePic").submit(function () {
    //         // event.preventDefault();  // Prevent default form submission
    //         // Show loader using jQuery
    //         $("#loader").show();
    //         // var formData = $(this).serialize();
    //         var formData = new FormData(this);
    // // alert(formData);
    //         $.ajax({
    //             headers: {
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //             },
    //             type: "POST",
    //             url: "/customer/update-pic",
    //             data: formData,
    //             processData: false,  // Prevent jQuery from automatically transforming the data into a query string
    //             contentType: false,  // Set to false to allow the browser to set the correct Content-Type header (multipart/form-data)

    //             success: function (resp) {
    //                 // Hide the loader
    //                 $("#loader").hide();

    //                 if (resp.type == "error" && resp.status=='false') {
    //                     $.each(resp.errors, function (i, error) {
    //                         console.log(".update-" + i);
    //                         $(".update-" + i).attr("style", "color:red");
    //                         $(".update-" + i).html(error);
    //                         setTimeout(function () {
    //                             $(".update-" + i).css({
    //                                 display: "none",
    //                             });
    //                         }, 4000);
    //                     });
    //                 } else if (resp.type == "uploaded") {
    //                     $("#update-uploaded").attr("style", "color:green");
    //                     $("#update-uploaded").html(resp.message);
    //                     // window.location.href = resp.message;
    //                 }
    //                 else if (resp.type == "notupdated") {
    //                     $("#update-notupdated").attr("style", "color:red");
    //                     $("#update-notupdated").html(resp.message);
    //                     // window.location.href = resp.message;
    //                 }
    //                 else if (resp.type == "exception") {
    //                     $("#update-exception").attr("style", "color:red");
    //                     $("#update-exception").html(resp.message);
    //                     // window.location.href = resp.message;
    //                 }

    //             },
    //             error: function () {
    //                 // console.log();
    //                 console.log("Error");
    //                 //alert("Error");
    //             },
    //         });
    //     });
    $("#customerUpdatePic").submit(function (e) {
        e.preventDefault(); // Prevent default form submission
        $("#loader").show();

        var formData = new FormData(this); // FormData for file upload

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/customer/update-pic",
            data: formData,
            processData: false, // Prevent jQuery from transforming the data into a query string
            contentType: false, // Set to false to allow the browser to set the correct Content-Type header (multipart/form-data)
            success: function (resp) {
                $("#loader").hide(); // Hide the loader

                if (resp.type == "uploaded") {
                    // Update the current image section
                    const newImagePath =
                        "/front/images/profile/" + resp.message; // Assuming 'message' contains the image name
                    $(".profile-image").attr("src", newImagePath);

                    // Close the modal
                    $("#changePicModal").modal("hide");

                    // Show a success message (optional)
                    $("#update-uploaded")
                        .html("Profile picture updated successfully")
                        .css("color", "green");
                } else if (resp.type == "error" && resp.status == "false") {
                    $.each(resp.errors, function (i, error) {
                        $(".update-" + i)
                            .attr("style", "color:red")
                            .html(error);
                        setTimeout(function () {
                            $(".update-" + i).css({ display: "none" });
                        }, 4000);
                    });
                } else if (resp.type == "notupdated") {
                    $("#update-notupdated")
                        .html(resp.message)
                        .css("color", "red");
                } else if (resp.type == "exception") {
                    $("#update-exception")
                        .html(resp.message)
                        .css("color", "red");
                }
            },
            error: function () {
                console.log("Error occurred during upload.");
            },
        });
    });


});
