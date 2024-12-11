$(document).ready(function () {
    ajaxFormSubmit(
        "#masterSheetFenceManufacturingForm", // Form ID
        "#update-Fence-Manufacturing-Button", // Submit button ID
        "/admin/mastersheet/fence/manufacturing/update", // URL for the store action
        "post",
        "Manufacturing Detail For Fence has been Configured Succcessfully." // Success message
    );

        // Get the "Edit" and "Update" buttons
        const editButton = document.getElementById('edit-Fence-Manufacturing-Button');
        const updateButton = document.getElementById('update-Fence-Manufacturing-Button');
        const deleteButton = document.getElementById('delete-Fence-Manufacturing-Button');

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
                document.getElementById('masterSheetFenceManufacturingForm').submit();
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
    document.querySelectorAll(".manufacturing-input").forEach((input) => {
        // Check value on input change or when focus is lost
        input.addEventListener("blur", function () {
            validateInput(this);
        });

        // Optional: Validate on input change (while typing)
        input.addEventListener("input", function () {
            validateInput(this);
        });
    });

// Dynamic Row Addition
// $("#addRowButton").click(function () {
//     const tableexist = $("#manufacturing tbody");
//     const rowCountexist = tableexist.children().length;
//     console.log(rowCountexist);
//     const table = $("#manufacturingTable tbody");
//     const rowCount = table.children().length+rowCountexist+1;
//     const newRow = $("<tr>");
//     console.log(rowCount);

//     newRow.html(`
//         <td><input type="text" name="manufacturing[${rowCount}][code]" class="form-control manufacturing-input"></td>
//         <td><input type="text" name="manufacturing[${rowCount}][name]" class="form-control manufacturing-input"></td>
//         <td><input type="text" name="manufacturing[${rowCount}][cost_per_unit]" class="form-control manufacturing-input"></td>
//         <td><button type="button" class="btn btn-danger btn-delete-row"><i class="fas fa-trash"></i></button></td>
//     `);

//     table.append(newRow);

//     // Add validation for new row inputs
//     newRow.find(".manufacturing-input").each(function () {
//         $(this).on("blur", function () {
//             validateInput(this);
//         }).on("input", function () {
//             validateInput(this);
//         });
//     });

//     // Delete row event
//     newRow.find(".btn-delete-row").click(function () {
//         newRow.remove();
//     });
// });

    // Dynamic Row Addition with AJAX Fetch for Last ID
    $("#addRowButton").click(function () {
        // Make AJAX call to fetch the last ID from the database
        $.ajax({
            url: '/admin/mastersheet/fence/manufacturing/get-last-id', // Endpoint to get the last ID
            method: 'GET',
            success: function (response) {
                const lastId = response.lastId || 0; // Get last ID from the response (default to 0 if not found)
                const newRowId = lastId + 1; // Increment to get the new row's ID

                const tableexist = $("#manufacturing tbody");
                const rowCountexist = tableexist.children().length;
                const table = $("#manufacturingTable tbody");
                const rowCount = table.children().length + rowCountexist + 1;

                const newRow = $("<tr>");

                newRow.html(`
                    <td><input type="text" name="manufacturing[${newRowId}][code]" class="form-control manufacturing-input"></td>
                    <td><input type="text" name="manufacturing[${newRowId}][name]" class="form-control manufacturing-input"></td>
                    <td><input type="text" name="manufacturing[${newRowId}][cost_per_unit]" class="form-control manufacturing-input"></td>
                    <td><button type="button" class="btn btn-danger btn-delete-row"><i class="fas fa-trash"></i></button></td>
                `);

                table.append(newRow);

                // Add validation for new row inputs
                newRow.find(".manufacturing-input").each(function () {
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
    // $(document).on('click', '.delete-Fence-Manufacturing-Button', function () {
    //     const row = $(this).closest('tr'); // Get the row containing the delete button
    //     const itemId = $(this).data('id'); // Get the ID of the item to delete
    //     const url = `/admin/mastersheet/fence/manufacturing/delete/${itemId}`; // Update with your route

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
        ".delete-Fence-Manufacturing-Button", // Button selector
        null, // URL will be dynamically passed
        "POST", // Simulate DELETE method
        "Item deleted successfully." // Success message
    );

    $(document).on("click", ".delete-Fence-Manufacturing-Button", function (e) {
        e.preventDefault();
        const row = $(this).closest("tr");
        const itemId = $(this).data("id");
        const url = `/admin/mastersheet/fence/manufacturing/delete/${itemId}`;

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

    // Code to add dynamic rows to add material************

    // Initialize existing item codes array (should be populated from your source)
    // let existingItemCodes = []; // Populate this from your server if needed

    // Function to find the maximum material code
    // function findMaxMaterialCode() {
    //     const table = document
    //         .getElementById("materialsTable")
    //         .getElementsByTagName("tbody")[0];

    //     // Find the highest existing material_code
    //     let lastItemCode = 0;

    //     Array.from(table.getElementsByTagName("tr")).forEach((row) => {
    //         const materialCode = row.getAttribute("data-material-code");
    //         if (materialCode) {
    //             const codeMatch = materialCode.match(/^misc(\d+)$/);
    //             if (codeMatch) {
    //                 const codeNumber = parseInt(codeMatch[1], 10);
    //                 if (codeNumber > lastItemCode) {
    //                     lastItemCode = codeNumber;
    //                 }
    //             }
    //         }
    //     });

    //     // Generate new item_code
    //     return "misc" + String(lastItemCode + 1).padStart(3, "0");
    // }

    // // Add event listener to the Add Row button
    // document
    //     .getElementById("addRowButton")
    //     .addEventListener("click", function () {
    //         const table = document
    //             .getElementById("materialsTable")
    //             .getElementsByTagName("tbody")[0];

    //         // Generate the new item_code
    //         const newItemCode = findMaxMaterialCode();

    //         // Create a new row
    //         const newRow = document.createElement("tr");
    //         newRow.setAttribute("data-material-code", newItemCode); // Set data attribute
    //         newRow.innerHTML = `

    //                 <input type="hidden" name="material_configs[${newItemCode}]" class="form-control material-input" value="${newItemCode}">

    //             <td>
    //                 <input type="text" name="material_configs[${newItemCode}][article_no]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="text" name="material_configs[${newItemCode}][hs_code]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="text" name="material_configs[${newItemCode}][item_name]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="number" name="material_configs[${newItemCode}][length]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="number" name="material_configs[${newItemCode}][no]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="number" step="0.000001" name="material_configs[${newItemCode}][weight_per_cm]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="number" step="0.01" name="material_configs[${newItemCode}][unit_price]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="number" step="0.0001" name="material_configs[${newItemCode}][weight_kg]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="number" step="0.01" name="material_configs[${newItemCode}][price]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <input type="text" name="material_configs[${newItemCode}][specs]" class="form-control material-input">
    //             </td>
    //             <td>
    //                 <button  style="background-color:transparent; border:none;" type="button" name="material_configs[${newItemCode}]" class="btn btn-danger btn-delete-row"><i class="fas fa-trash text-danger"></i></button>
    //             </td>

    //         `;

    //         table.appendChild(newRow);

    //         // Add event listener for the delete button
    //         newRow
    //             .querySelector(".btn-delete-row")
    //             .addEventListener("click", function () {
    //                 table.removeChild(newRow);
    //             });
    //             const inputFields = newRow.querySelectorAll(".material-input");
    //             inputFields.forEach(input => {
    //                 input.addEventListener("blur", function () {
    //                     validateInput(this);
    //                 });

    //                 input.addEventListener("input", function () {
    //                     validateInput(this);
    //                 });
    //             });
    //         });

    // Function to check for negative values and highlight the input


    // document.querySelectorAll(".btn-delete-row").forEach((button) => {
    //     button.addEventListener("click", function () {
    //         // Get the ID of the material configuration from the button value
    //         const materialId = this.value;
    //         const row = this.closest("tr");
    //         const url = `/admin/delete-material/${materialId}`;

    //         // Confirm deletion
    //         if (confirm("Are you sure you want to delete this row?")) {
    //             if (materialId) {
    //                 $("#loader").show(); // Show loader

    //                 $.ajax({
    //                     headers: {
    //                         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                             "content"
    //                         ), // Get CSRF token
    //                     },
    //                     type: "POST", // Use DELETE method
    //                     url: url, // Set the URL
    //                     success: function (resp) {
    //                         $("#loader").hide(); // Hide loader

    //                         // Handle the response
    //                         if (resp.type === "success") {
    //                             row.remove(); // Remove the row from the table
    //                             alert(resp.message); // Show success message
    //                         } else {
    //                             toastr.error(
    //                                 resp.message || "Error deleting material."
    //                             ); // Display error message
    //                         }
    //                     },
    //                     error: function (xhr) {
    //                         $("#loader").hide(); // Hide loader
    //                         try {
    //                             const response = JSON.parse(xhr.responseText); // Attempt to parse JSON response
    //                             if (response.type === "error") {
    //                                 const errors = response.errors;
    //                                 Object.keys(errors).forEach(function (key) {
    //                                     alert(errors[key][0]); // Display errors
    //                                 });
    //                             } else {
    //                                 console.log("Unexpected error:", xhr);
    //                             }
    //                         } catch (e) {
    //                             console.error(
    //                                 "Error parsing JSON response:",
    //                                 e
    //                             );
    //                             alert("An unexpected error occurred."); // General error message
    //                         }
    //                     },
    //                 });
    //             }
    //         } else {
    //             // If no value, simply remove the row
    //             row.remove();
    //         }
    //     });
    // });
    // If the button has a value, send an AJAX request to delete the material
    //     fetch(`/delete-material/${materialId}`, {
    //         method: "DELETE",
    //         headers: {
    //             "Content-Type": "application/json",
    //             "X-CSRF-TOKEN": "{{ csrf_token() }}" // Ensure you include CSRF token
    //         },
    //     })
    //     .then(response => {
    //         if (response.ok) {
    //             // Remove the row from the table
    //             row.remove();
    //         } else {
    //             alert("Error deleting material");
    //         }
    //     })
    //     .catch(error => {
    //         console.error("Error:", error);
    //     });
    // }

    // }
    //         });
    //     });
});
