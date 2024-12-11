$(document).ready(function () {
    ajaxFormSubmit(
        "#masterSheetFenceTaxesForm", // Form ID
        "#update-Fence-taxes-Button", // Submit button ID
        "/admin/mastersheet/fence/taxes/update", // URL for the store action
        "post",
        "taxes Detail For Fence has been Configured Succcessfully." // Success message
    );

        // Get the "Edit" and "Update" buttons
        const editButton = document.getElementById('edit-Fence-taxes-Button');
        const updateButton = document.getElementById('update-Fence-taxes-Button');
        const deleteButton = document.getElementById('delete-Fence-taxes-Button');

        // Flag to track whether the form is in edit mode
        let isEditable = false;

        // Function to toggle between read-only and editable fields
        function toggleEdit() {
            const inputs = document.querySelectorAll('input');
            isEditable = !isEditable;

            inputs.forEach(input => {
                input.readOnly = !isEditable;
            });

            // Change button text based on edit mode
            if (isEditable) {
                editButton.textContent = 'Cancel Edit';
            } else {
                editButton.textContent = 'Edit';
            }
        }

        // Attach event listener to Edit button
        editButton.addEventListener('click', toggleEdit);

        // Handle form submission (Update button)
        updateButton.addEventListener('click', function () {
            // Confirmation dialog before updating
            if (confirm('Do you want to update the data?')) {
                // Perform the form submission (e.g., AJAX or normal form submit)
                document.getElementById('masterSheetFenceTaxesForm').submit();
            } else {
                // Do nothing if the user cancels
                return false;
            }
        });

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
    }
}

    // Add event listeners to all material input fields
    document.querySelectorAll(".taxes-input").forEach((input) => {
        // Check value on input change or when focus is lost
        input.addEventListener("blur", function () {
            validateInput(this);
        });

        // Optional: Validate on input change (while typing)
        input.addEventListener("input", function () {
            validateInput(this);
        });
    });


    // Dynamic Row Addition with AJAX Fetch for Last ID
    $("#addRowButton").click(function () {
        // Make AJAX call to fetch the last ID from the database
        $.ajax({
            url: '/admin/mastersheet/fence/taxes/get-last-id', // Endpoint to get the last ID
            method: 'GET',
            success: function (response) {
                const lastId = response.lastId || 0; // Get last ID from the response (default to 0 if not found)
                const newRowId = lastId + 1; // Increment to get the new row's ID

                const tableexist = $("#taxes tbody");
                const rowCountexist = tableexist.children().length;
                const table = $("#taxesTable tbody");
                const rowCount = table.children().length + rowCountexist + 1;

                const newRow = $("<tr>");

                newRow.html(`
                    <td><input type="text" name="taxes[${newRowId}][code]" class="form-control taxes-input"></td>
                    <td><input type="text" name="taxes[${newRowId}][name]" class="form-control taxes-input"></td>
                    <td><input type="text" name="taxes[${newRowId}][percentage]" class="form-control taxes-input"></td>
                    <td><button type="button" class="btn btn-danger btn-delete-row"><i class="fas fa-trash"></i></button></td>
                `);

                table.append(newRow);

                // Add validation for new row inputs
                newRow.find(".taxes-input").each(function () {
                    $(this).on("blur", function () {
                        validateInput(this);
                    }).on("input", function () {
                        validateInput(this);
                    });
                });

                // Delete row event
                newRow.find(".btn-delete-row").click(function () {
                    newRow.remove();
                });
            },
            error: function () {
                alert('Error fetching the last ID.');
            }
        });
    });

    // Attach a click event listener to all delete buttons
    // $(document).on('click', '.delete-Fence-taxes-Button', function () {
    //     const row = $(this).closest('tr'); // Get the row containing the delete button
    //     const itemId = $(this).data('id'); // Get the ID of the item to delete
    //     const url = `/admin/mastersheet/fence/taxes/delete/${itemId}`; // Update with your route

    //     // Confirmation dialog before deleting
    //     if (confirm('Are you sure you want to delete this item?')) {
    //         $.ajax({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
    //             },
    //             type: 'POST', // Use POST or DELETE based on your route
    //             url: url,
    //             data: { _method: 'DELETE' }, // Simulate DELETE method
    //             success: function (response) {
    //                 if (response.success) {
    //                     alert('Item deleted successfully.');
    //                     row.remove(); // Remove the row from the table
    //                 } else {
    //                     alert(response.message || 'Error deleting item.');
    //                 }
    //             },
    //             error: function (xhr) {
    //                 alert('An unexpected error occurred.');
    //                 console.error(xhr.responseText);
    //             }
    //         });
    //     }
    // });

    ajaxFormSubmit(
        null, // formId is not applicable here since no form is involved
        ".delete-Fence-taxes-Button", // Button selector
        null, // URL will be dynamically passed
        "POST", // Simulate DELETE method
        "Item deleted successfully." // Success message
    );

    $(document).on("click", ".delete-Fence-taxes-Button", function (e) {
        e.preventDefault();
        const row = $(this).closest("tr");
        const itemId = $(this).data("id");
        const url = `/admin/mastersheet/fence/taxes/delete/${itemId}`;

        if (confirm("Are you sure you want to delete this item?")) {
            $(".overlay").show();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "POST", // Simulating DELETE request
                url: url,

                success: function (resp) {
                    $(".overlay").hide();

                    if (resp.status === "success") {

                        row.remove();
                        window.location.href =
                        resp.message +
                        "?successMessage=" +
                        encodeURIComponent("Row Deleted  Successfully.");
                        //  toastr.success(resp.message || "Row Deleted  Successfully.");
                    } else {
                        toastr.error(resp.message || "Error deleting item.");
                    }
                },
                error: function (xhr) {
                    $(".overlay").hide();
                    try {
                        const response = JSON.parse(xhr.responseText);
                        toastr.error(response.error || "An unexpected error occurred.");
                    } catch (e) {
                        console.error("Error parsing JSON response:", e);
                        toastr.error("An unexpected error occurred.");
                    }
                },
            });
        }
    });


});
