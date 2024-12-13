$(document).ready(function () {
    // ajaxFormSubmit(
    //     "#masterSheetFenceMaterialForm", // Form ID
    //     "#update-Fence-Material-Button", // Submit button ID
    //     "/admin/mastersheet/boq/fence/materials/update", // URL for the store action
    //     "post",
    //     "Material Detail For Fence has been Configured Succcessfully." // Success message
    // );

    // Get the "Edit" and "Update" buttons
    const editButton = document.getElementById("edit-Fence-Material-Button");
    const updateButton = document.getElementById(
        "update-Fence-Material-Button"
    );
    const deleteButton = document.getElementById(
        "delete-Fence-Material-Button"
    );

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
    if(editButton){
        editButton.addEventListener("click", toggleEdit);
    }

    // Add event listener to the "Update" button
    if(updateButton){
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
                    errorMessage.classList.add("error-message", "text-danger");
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
        }else {
           console.log("Form is valid, proceeding with the update...");
            if (confirm("Do you want to update the data?")) {

                        ajaxFormSubmit(
                                        "#masterSheetFenceMaterialForm", // Form ID
                                        "#update-Fence-Material-Button", // Submit button ID
                                        "/admin/mastersheet/boq/fence/update/materials", // URL for the store action
                                        "post",
                                        "Material Detail For Fence has been Configured Succcessfully." // Success message
    );
            } else {

                return false;
            }
        }
    });
}

    // Handle form submission (Update button)
    // updateButton.addEventListener("click", function () {
    //     // Confirmation dialog before updating
    //     if (confirm("Do you want to update the data?")) {
    //         // Perform the form submission (e.g., AJAX or normal form submit)
    //         document.getElementById("masterSheetFenceMaterialForm").submit();
    //     } else {
    //         // Do nothing if the user cancels
    //         return false;
    //     }
    // });

    function validateInput(input) {
        const value = input.value.trim();

        if (value === "") {
            $(input)
                .css("border", "1px solid red")
                .next(".error-message")
                .text("Cannot be blank")
                .show();
        } else if (parseFloat(value) < 0) {
            $(input)
                .css("border", "1px solid red")
                .next(".error-message")
                .text("Cannot insert negative number")
                .show();
        } else {
            $(input).css("border", "").next(".error-message").text("").hide();
        }
    }

    // Attach validation to editable fields
    document.querySelectorAll(".editable-field").forEach((input) => {
        input.addEventListener("blur", () => validateInput(input));
        input.addEventListener("input", () => validateInput(input));
    });

    // Dynamic Row Addition with AJAX Fetch for Last ID
    $("#addRowButton").click(function () {
        // Make AJAX call to fetch the last ID from the database
        $.ajax({
            url: "/admin/mastersheet/boq/fence/get-last-id/materials/", // Endpoint to get the last ID
            method: "GET",
            success: function (response) {
                const lastId = response.lastId || 0; // Get last ID from the response (default to 0 if not found)
                const newRowId = lastId + 1; // Increment to get the new row's ID

                const tableexist = $("#material tbody");
                const rowCountexist = tableexist.children().length;
                const table = $("#materialTable tbody");
                const rowCount = table.children().length + rowCountexist + 1;

                const newRow = $("<tr>");

                newRow.html(`
                    <!-- Article No -->
                    <td>
                        <textarea name="material_configs[${newRowId}][article_no]"
                                    class="form-control editable-field" readonly
                                    required ></textarea>
                    </td>

                    <!-- HS Code -->
                    <td>
                        <textarea name="material_configs[${newRowId}][hs_code]"
                                    class="form-control editable-field" readonly></textarea>
                    </td>

                    <!-- Item Name -->
                    <td>
                        <textarea name="material_configs[${newRowId}][item_name]"
                                    class="form-control editable-field" readonly required ></textarea>
                    </td>

                    <!-- Length -->
                    <td>

                            <input type="text" name="material_configs[${newRowId}][length]"
                                    class="form-control  editable-field" value="" readonly>

                    </td>


                    <!-- Number -->

                    <td>

                        <input type="number" size="4" name="material_configs[${newRowId}][no]"
                                class="form-control  editable-field"
                                value="1" readonly
                                >
                    </td>

                    <!-- Weight per cm -->
                    <td>
                        <input type="number" step="0.00000001"
                                name="material_configs[${newRowId}][weight_per_cm]"
                                class="form-control editable-field"
                                value=""
                                readonly>
                    </td>

                    <!-- Unit Price -->
                    <td>
                        <input type="number" step="0.01"
                                name="material_configs[${newRowId}][unit_price]"
                                class="form-control editable-field" value="" readonly required>
                    </td>

                    <!-- Specs -->
                    <td>
                        <textarea name="material_configs[${newRowId}][specs]"
                                    class="form-control editable-field" readonly></textarea>
                    </td>


                    <td><button type="button" class="btn btn-danger btn-delete-row"><i class="fas fa-trash"></i></button></td>
                `);

                table.append(newRow);

                // Add validation for new row inputs
                newRow.find(".material-input").each(function () {
                    $(this)
                        .on("blur", function () {
                            validateInput(this);
                        })
                        .on("input", function () {
                            validateInput(this);
                        });
                });

                // Delete row event
                newRow.find(".btn-delete-row").click(function () {
                    newRow.remove();
                });
            },
            error: function () {
                alert("Error fetching the last ID.");
            },
        });
    });

    ajaxFormSubmit(
        null, // formId is not applicable here since no form is involved
        ".delete-Fence-Material-Button", // Button selector
        null, // URL will be dynamically passed
        "POST", // Simulate DELETE method
        "Item deleted successfully." // Success message
    );

    $(document).on("click", ".delete-Fence-Material-Button", function (e) {
        e.preventDefault();
        const row = $(this).closest("tr");
        const itemId = $(this).data("id");
        const url = `/admin/mastersheet/boq/fence/delete/materials/${itemId}`;

        if (confirm("Are you sure you want to delete this item?")) {
            $(".overlay").show();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
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
                        toastr.error(
                            response.error || "An unexpected error occurred."
                        );
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
});
