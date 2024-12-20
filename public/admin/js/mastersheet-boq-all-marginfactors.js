$(document).ready(function () {
    // Get the "Edit" and "Update" buttons
    const editButton = document.getElementById("edit-margin-factor-button");
    const updateButton = document.getElementById("update-margin-factor-button");
    // const deleteButton = document.getElementById('delete-all-taxes-Button');

    // Flag to track whether the form is in edit mode
    let isEditable = false;

    // Function to toggle between read-only and editable fields
    function toggleEdit() {
        const editableFields = document.querySelectorAll(".editable-field");
        isEditable = !isEditable;

        editableFields.forEach((field) => {
            field.readOnly = !isEditable;
        });

        // Change button text based on edit mode
        if (isEditable) {
            editButton.textContent = "Cancel Edit";
        } else {
            editButton.textContent = "Edit";
        }
    }


    // Attach event listener to Edit button
    if (editButton) {
        editButton.addEventListener("click", toggleEdit);
    }
    if (updateButton) {
        updateButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Get all required fields
            const requiredFields = document.querySelectorAll("[required]");

            let isValid = true; // Flag to track if the form is valid
            let firstInvalidField = null;
            requiredFields.forEach(function (field) {
                // If the field is empty, mark it as invalid
                if (field.value.trim() === "") {
                    isValid = false;

                    // Add an error class for styling or show error message
                    field.classList.add("is-invalid"); // You can define this class to show a red border or message

                    // Optionally, display a custom error message near the field
                    let errorMessage = field.nextElementSibling;
                    if (
                        !errorMessage ||
                        !errorMessage.classList.contains("error-message")
                    ) {
                        errorMessage = document.createElement("div");
                        errorMessage.classList.add(
                            "error-message",
                            "text-danger"
                        );
                        errorMessage.textContent = "This field is required";
                        field.parentNode.appendChild(errorMessage);
                    }
                    if (!firstInvalidField) {
                        firstInvalidField = field;
                    }
                } else {
                    // Remove the error styling if the field is valid
                    field.classList.remove("is-invalid");

                    // Remove the error message if the field is filled
                    let errorMessage = field.nextElementSibling;
                    if (
                        errorMessage &&
                        errorMessage.classList.contains("error-message")
                    ) {
                        errorMessage.remove();
                    }
                }
            });

            // If all required fields are valid, you can submit the form or proceed with the update
            if (!isValid) {
                console.log("Form is invalid, fix the errors!");
                if (firstInvalidField) {
                    firstInvalidField.focus(); // Focus on the first invalid field
                }
            } else {
                console.log("Form is valid, proceeding with the update...");
                if (confirm("Do you want to update the data?")) {
                    ajaxFormSubmit(
                        "#masterSheetAllMarginFactorsForm", // Form ID
                        "#update-margin-factor-button", // Submit button ID
                        "/admin/mastersheet/boq/all/update/margin_factors/", // URL for the store action
                        "post",
                        "Margin factor Detail For all has been Configured Succcessfully." // Success message
                    );
                } else {
                    return false;
                }
            }
        });

    }
    function validateInput(input) {
        const value = input.value.trim(); // Use trim() to remove leading and trailing spaces

        // Check if the value is empty
        if (value === "") {
            $("#invalid_no").html("Cannot be blank");
            $("#invalid_no").css("color", "red");
            $("#invalid_no").css("display", "block");
            $(input).css("border", "1px solid red");
        } else if (parseFloat(value) < 0) {
            // Check if the value is a negative number
            $("#invalid_no").html("Cannot insert negative number");
            $("#invalid_no").css("color", "red");
            $("#invalid_no").css("display", "block");
            $(input).css("border", "1px solid red");
        } else {
            // If valid input, clear the error messages
            $(input).css("border", "none");
            $("#invalid_no").html("");
            $(input).removeClass("is-invalid");

            let errorMessage = $(input).next(".error-message");
            if (errorMessage.length) {
                errorMessage.remove(); // Remove the error message element
            }
        }
    }

    // Add event listeners to all material input fields
    document.querySelectorAll(".margin-factor-input").forEach((input) => {
        // Check value on input change or when focus is lost
        input.addEventListener("blur", function () {
            validateInput(this);
        });

        // Optional: Validate on input change (while typing)
        input.addEventListener("input", function () {
            validateInput(this);
        });
    });

    // ===================For Future Use=======================

    // Dynamic Row Addition with AJAX Fetch for Last ID
    // $("#addRowButton").click(function () {
    //     // Make AJAX call to fetch the last ID from the database
    //     $.ajax({
    //         url: '/admin/mastersheet/boq/all/get-last-id/margin-factors', // Endpoint to get the last ID
    //         method: 'GET',
    //         success: function (response) {
    //             const lastId = response.lastId || 0; // Get last ID from the response (default to 0 if not found)
    //             const newRowId = lastId + 1; // Increment to get the new row's ID

    //             const tableexist = $("#taxes tbody");
    //             const rowCountexist = tableexist.children().length;
    //             const table = $("#taxesTable tbody");
    //             const rowCount = table.children().length + rowCountexist + 1;

    //             const newRow = $("<tr>");
    //             const readonlyAttribute = !isEditable ? 'readonly' : '';

    //             newRow.html(`
    //                 <td><input type="text" name="taxes[${newRowId}][code]" class="form-control taxes-input" required ${readonlyAttribute}></td>
    //                 <td><input type="text" name="taxes[${newRowId}][name]" class="form-control taxes-input" required ${readonlyAttribute}></td>
    //                 <td><input type="number" name="taxes[${newRowId}][percentage]" class="form-control taxes-input" required ${readonlyAttribute}></td>
    //                 <td><button type="button" class="btn btn-danger btn-delete-row"><i class="fas fa-trash"></i></button></td>
    //             `);

    //             table.append(newRow);

    //             // Add validation for new row inputs
    //             newRow.find(".taxes-input").each(function () {
    //                 $(this).on("blur", function () {
    //                     validateInput(this);
    //                 }).on("input", function () {
    //                     validateInput(this);
    //                 });
    //             });

    //             // Delete row event
    //             newRow.find(".btn-delete-row").click(function () {
    //                 newRow.remove();
    //             });
    //         },
    //         error: function () {
    //             alert('Error fetching the last ID.');
    //         }
    //     });
    // });

    // ajaxFormSubmit(
    //     null, // formId is not applicable here since no form is involved
    //     ".delete-all-taxes-Button", // Button selector
    //     null, // URL will be dynamically passed
    //     "POST", // Simulate DELETE method
    //     "Item deleted successfully." // Success message
    // );

    // $(document).on("click", ".delete-all-taxes-Button", function (e) {
    //     e.preventDefault();
    //     const row = $(this).closest("tr");
    //     const itemId = $(this).data("id");
    //     const url = `/admin/mastersheet/boq/all/delete/taxes/${itemId}`;

    //     if (confirm("Are you sure you want to delete this item?")) {
    //         $(".overlay").show();

    //         $.ajax({
    //             headers: {
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //             },
    //             type: "POST", // Simulating DELETE request
    //             url: url,

    //             success: function (resp) {
    //                 $(".overlay").hide();

    //                 if (resp.status === "success") {

    //                     row.remove();
    //                     window.location.href =
    //                     resp.message +
    //                     "?successMessage=" +
    //                     encodeURIComponent("Row Deleted  Successfully.");
    //                     //  toastr.success(resp.message || "Row Deleted  Successfully.");
    //                 } else {
    //                     toastr.error(resp.message || "Error deleting item.");
    //                 }
    //             },
    //             error: function (xhr) {
    //                 $(".overlay").hide();
    //                 try {
    //                     const response = JSON.parse(xhr.responseText);
    //                     toastr.error(response.error || "An unexpected error occurred.");
    //                 } catch (e) {
    //                     console.error("Error parsing JSON response:", e);
    //                     toastr.error("An unexpected error occurred.");
    //                 }
    //             },
    //         });
    //     }
    // });
// ===================End For Future Use=======================
});

// $(document).ready(function () {
//     // Edit Button Click
//     $("#edit-margin-factor-button").click(function () {
//         $(".form-control").prop("readonly", false); // Enable editing
//         $("#update-margin-factor-button").show(); // Show the update button
//         $(this).hide(); // Hide the edit button
//     });

//     // Update Button Click
//     $("#update-margin-factor-button").click(function () {
//         // Add your form submission logic here via AJAX or regular form submission
//         alert("Form submitted!");
//         $("#masterSheetallMarginFactorsForm").submit();
//     });

//     // Add Row Button Click
//     $("#add-row-margin-factor-button").click(function () {
//         var row = `<tr>
//                     <td>
//                         <select name="margin_factors[new][country_id]" class="form-control">
//                             @foreach($countries as $country)
//                                 <option value="{{ $country->id }}">{{ $country->name }}</option>
//                             @endforeach
//                         </select>
//                     </td>
//                     <td>
//                         <input type="number" name="margin_factors[new][margin_factor]" class="form-control">
//                     </td>
//                     <td>
//                         <button type="button" class="btn btn-danger remove-row-margin-factor">Remove</button>
//                     </td>
//                    </tr>`;
//         $("#new-margin-factor-table tbody").append(row);
//     });

//     // Remove Row
//     $(document).on("click", ".remove-row-margin-factor", function () {
//         $(this).closest("tr").remove();
//     });

//     // Delete Button in table
//     $(document).on("click", ".delete-margin-factor-button", function () {
//         var marginFactorId = $(this).data("id"); // Get the margin factor ID
//         var row = $(this).closest("tr"); // Get the row

//         if (confirm("Are you sure you want to delete this margin factor?")) {
//             // Make AJAX request to delete the margin factor
//             $.ajax({
//                 url: "/delete-margin-factor/" + marginFactorId, // URL to handle the delete action
//                 method: "DELETE",
//                 data: {
//                     _token: $('meta[name="csrf-token"]').attr("content"),
//                 },
//                 success: function (response) {
//                     row.remove(); // Remove the row from the table
//                     alert("Margin Factor deleted successfully");
//                 },
//                 error: function (response) {
//                     alert("Failed to delete the margin factor.");
//                 },
//             });
//         }
//     });
// });
