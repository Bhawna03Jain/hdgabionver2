function handleFormValidation(
    formId,
    url,
    successMessageSelector,
    errorPrefix,
    successCallback = null,
    isFileUpload = false,
    successMessage = "Action Successful"
) {
    $(formId).submit(function (event) {

        event.preventDefault(); // Prevent default form submission

        // Show loader
        $("#loader").show();
        // $('.overlay').show();
        // Set form data and handle file upload
        var formData = isFileUpload ? new FormData(this) : $(this).serialize();

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
                        $("." + errorPrefix + "-" + i)
                            .css("color", "red")
                            .html(error);
                        setTimeout(function () {
                            $("." + errorPrefix + "-" + i).hide();
                        }, 8000);
                        toastr.error(error);
                    });
                } else if (
                    resp.type === "success" ||
                    resp.type === "uploaded"
                ) {
                    $(successMessageSelector)
                        .css("color", "green")
                        .html(resp.message);
                        setTimeout(function () {
                            $(successMessageSelector).hide();
                        }, 4000);
                        $(formId).closest(".modal").modal("hide");
                        console.log("Redirecting to: " + resp.message);
                        window.location.href =
                            resp.message +
                            "?successMessage=" +
                            encodeURIComponent(successMessage);
                    // If a custom success callback is provided, call it
                    if (typeof successCallback === "function") {
                        successCallback(resp);
                    }

                    // encodeURIComponent(resp.data || "Action successful.");
                } else if (
                    resp.type === "notupdated" ||
                    resp.type === "exception"||
                    resp.type === "outoflimit"
                ) {
                    $(successMessageSelector)
                        .css("color", "red")
                        .html(resp.message);
                        setTimeout(function () {
                            $(successMessageSelector).hide();
                        }, 4000);
                        toastr.error(resp.message || "Action failed.");
                }
            },
            error: function () {
                $(".overlay").hide();
                console.log("Error occurred.");
            },
        });
    });
}

// write   if (!validateRequiredFields($("#productCreateForm"))) {
//     return; // Stop submission if validation fails
// } in form submit section

function validateRequiredFields(form) {
    let isValid = true;

    // Clear previous error messages and styles
    form.find(".form-control").removeClass("input-error");
    form.find(".error-message").remove();

    // Loop through required fields and validate
    form.find(".form-control[required]").each(function () {
        const $field = $(this);
        if ($field.val().trim() === "") {
            isValid = false;
            // Add red border
            $field.addClass("input-error");
            // Add error message
            $field.after('<p class="error-message">This field is required.</p>');
        }
    });

    return isValid;
}

$(document).on("input", ".form-control", function () {
    $(this).removeClass("input-error");
    $(this).next(".error-message").remove();
});
// ********For Create and Update**********
function ajaxFormSubmit(
    formId,
    submitButtonId,
    url,
    method = "POST",
    successMessage = "Action Successful"
) {
    $(document).on("click", submitButtonId, function (e) {
        e.preventDefault();

        // $(".preloader").show();
        // $("#loader").show();
        $(".overlay").show();
        // Serialize form data
        var formData = $(formId).serialize();
        console.log(FormData);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: method,
            url: url,
            data: formData,
            success: function (resp) {
                $(".overlay").hide(); // Hide loader
                // if (resp.type == "exist" && resp.status == "false") {
                //     toastr.error(resp.message );
                // }
                if (resp.type === "error" && resp.status === "false") {
                    $.each(resp.errors, function (i, error) {
                        console.log(".reset-" + i);
                        $(".reset-" + i).attr("style", "color:red");
                        $(".reset-" + i).html(error);
                        setTimeout(function () {
                            $(".reset-" + i).css({
                                display: "none",
                            });
                        }, 8000);
                        toastr.error(error);
                    });
                } else if (resp.status === "success") {
                    $(formId).closest(".modal").modal("hide");

                    window.location.href =
                        resp.message +
                        "?successMessage=" +
                        encodeURIComponent(successMessage);

                    // encodeURIComponent(resp.data || "Action successful.");
                } else if (
                    resp.status === "emailfail" &&
                    resp.status === "false"
                ) {
                    toastr.error(resp.emailmessage || "Action failed.");
                }  else if (resp.status === "fail" && resp.type==="trashed") {
                    // toastr.error(resp.msg|| "Error deleting item.");
                    window.location.href =
                    resp.message +
                    "?errorMessage=" +
                    encodeURIComponent(resp.msg);
                    // window.location.href =
                    //     resp.message;

                } else if (resp.status === "fail" && resp.type==="fail") {
                    window.location.href =
                    resp.message +
                    "?errorMessage=" +
                    encodeURIComponent(resp.msg);

                }   else {
                    toastr.error(resp.message || "Action failed.");
                }
            },
            error: function (xhr) {
                $(".overlay").hide(); // Hide loader
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (
                        response.status === "false" &&
                        response.type === "exception"
                    ) {
                        toastr.error(response.error || "An error occurred.");
                    } else if (response.status === "false") {
                        // Display specific error messages if available
                        $.each(response.errors, function (key, error) {
                            toastr.error(error[0]);
                        });
                    } else {
                        toastr.error("An unexpected error occurred.");
                    }
                } catch (e) {
                    console.error("Error parsing JSON response:", e);
                    toastr.error("An unexpected error occurred.");
                }
            },
        });
    });
}

// ********For Edit**********
function ajaxFetchFormData(
    fetchButtonClass,
    updateButtonClass,
    url,
    modalId,
    formFieldMappings,
    readonlyFields = []
) {
    $(document).on("click", fetchButtonClass, function () {
        var itemId = $(this).data("id");
        $(".overlay").show();
        // alert(itemId);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "GET",
            url: url + itemId,
            success: function (resp) {
                if (resp.status === "success") {
                    var data = resp.data;
                    // alert(resp.data);
                    // Populate form fields based on provided mappings
                    Object.keys(formFieldMappings).forEach((field) => {
                        const fieldSelector = formFieldMappings[field];
                        // alert(fieldSelector+data[field]);
                        if (data[field] !== undefined && data[field] !== null) {
                            if ($(fieldSelector).is("select")) {
                                $(fieldSelector).val(data[field]).change(); // Set selected value and trigger change event for select
                            } else {
                                // alert( fieldSelector+data[field]);
                                $(fieldSelector).val(data[field]);
                                // alert( $('#id').val());
                            }
                            // Checkboxes need special handling
                            if (field === "is_base_currency") {
                                $(fieldSelector).prop("checked", data[field]);
                            }
                        } else {
                            // alert("error");
                            $(fieldSelector).val(""); // Clear field if data is not available
                        }
                    });
                    // Show the modal
                    $(".overlay").hide();
                    $(modalId).modal("show");
                    // alert( "open");
                    // $("#createMaterialConfigModal").modal("show");
                    // Update submit button to the update button if needed
                    $(modalId)
                        .find('button[type="submit"]')
                        .attr("id", updateButtonClass);
                    // Set specified fields as read-only
                    setFormFieldsReadOnly(readonlyFields, true);
                } else {
                    toastr.error("Failed to fetch data.");
                }
            },
            error: function (xhr) {
                $(".overlay").hide();
                console.log("An error occurred during the AJAX request");
            },
        });
    });
}

function checkIfExists(inputSelector, messageSelector, url, dataKey) {
    $(inputSelector).on('input', function () {
          var $input = $(this);
        var inputValue = $(this).val();

        // Clear previous message
        $(messageSelector).text('');
        $input.removeClass('input-error');
        if (inputValue.length > 0) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: url,
                method: 'POST',
                data: {
                    [dataKey]: inputValue,
                },
                success: function (response) {
                    if (response.exists) {
                        $(messageSelector).text(`This ${dataKey.replace('_', ' ')} already exists.`);
                        $input.addClass('input-error');
                    }

                },
                error: function () {
                    console.error(`Error checking ${dataKey.replace('_', ' ')}.`);
                }
            });
        }
    });
}
/**
 * Set form fields as read-only.
 *
 * @param {string[]} fieldSelectors - Array of field selectors to be set as read-only.
 * @param {boolean} readonly - Whether to set the fields as read-only.
 */
function setFormFieldsReadOnly(fieldSelectors, readonly) {
    fieldSelectors.forEach((selector) => {
        $(selector).prop("disabled", true); // Set fields as read-only or editable
    });
}
$(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var successMessage = urlParams.get("successMessage");

    if (successMessage) {
        toastr.success(decodeURIComponent(successMessage));
        // Remove the successMessage parameter from the URL after displaying it
        const newUrl = window.location.origin + window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
});
// Common function to handle form submission
// Reusable form handling function for AJAX requests

//For Country Table***************MOdal
