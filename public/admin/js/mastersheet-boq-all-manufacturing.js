$(document).ready(function () {
    // Get the "Edit" and "Update" buttons
    const editButton = document.getElementById(
        "edit-all-Manufacturing-Button"
    );
    const updateButton = document.getElementById(
        "update-all-Manufacturing-Button"
    );
    const deleteButton = document.getElementById(
        "delete-all-Manufacturing-Button"
    );
    let firstCodeExistField = null;
    let isValid = true;
    // Flag to track whether the form is in edit mode
    let isEditable = false;

    // Function to toggle between read-only and editable fields
    function toggleEdit() {
        const inputs = document.querySelectorAll(".editable-field");
        isEditable = !isEditable;

        inputs.forEach((input) => {
            input.readOnly = !isEditable;
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
    let isError = false;
    // let isCodeExist = false; // Flag to track if the form is valid
    const boqConfigId = $("#boqconfigid").val();
    function validateInput(input) {
        const value = input.value.trim(); // Use trim() to remove leading and trailing spaces

        if (value === "") {
            if ($(input).attr("required") !== undefined) {
                isError = true;
            }
        } else if (parseFloat(value) < 0) {
            isError = true;
        } else {
            isError = false;
        }

        // Return error status
        return isError;
    }

    // Check if the entered code value exists

    async function checkCodeExists(input) {
        const codeValue = $(input).val().trim();

        if (codeValue !== "" && boqConfigId) {
            try {
                const response = await $.ajax({
                    url: `/admin/mastersheet/boq/all/check-code/manufacturing`,
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: { code: codeValue, boqConfigId: boqConfigId },
                });

                if (response.exists) {
                    isCodeExist = true;
                    const existingValues = [];
                    $('.manufacturing-input[name*="[code]"]').each(function () {
                        if ($(this).val().trim() !== "") {
                            existingValues.push($(this).val().trim());
                        }
                    });
                    const codeCount = existingValues.filter(value => value === codeValue).length;
                    if (codeCount > 1) {
                        isCodeExist = true; // If exists more than once, set true
                    }
                    else{
                        isCodeExist=false;
                    }
                } else {
                    isCodeExist = false;
                }
            } catch (error) {
                console.log("Error checking the code:", error);
            }

        }

        // console.log("isCodeExist:", isCodeExist);
        return isCodeExist;
    }
    $(document).on("input", ".manufacturing-input", async function () {
        let hasError = validateInput(this);
        if (hasError) {
            showError(
                this,
                "Cannot insert negative number or cannot leave blank"
            );
        } else {
            removeError(this);
        }

        if ($(this).attr("name").includes("[code]")) {
            let isCodeExist = await checkCodeExists(this); // Use await here
            if (isCodeExist) {
                showError(this, "This code already exists.");
            } else if (!isCodeExist && !hasError) {
                removeError(this);
            }
        }
    });

    let totrow = 0; // Ensure totrow is initialized correctly

    $("#addRowButton").click(function () {
        // Make AJAX call to fetch the last ID from the database
        $.ajax({
            url: "/admin/mastersheet/boq/all/get-last-id/manufacturing", // Endpoint to get the last ID
            method: "GET",
            success: function (response) {
                const lastId = response.lastId || 0; // Get last ID from the response (default to 0 if not found)
                const newRowId = lastId + 1 + totrow; // Increment to get the new row's ID

                const tableexist = $("#manufacturing tbody");
                const rowCountexist = tableexist.children().length;
                const table = $("#manufacturingTable tbody");
                const rowCount = table.children().length + rowCountexist + 1;

                const newRow = $("<tr>");
                const readonlyAttribute = !isEditable ? "readonly" : "";
                newRow.html(`
                        <td><input type="text" name="extra_manufacturing[${newRowId}][code]" class="form-control manufacturing-input editable-field" required ${readonlyAttribute}></td>
                        <td><input type="text" name="extra_manufacturing[${newRowId}][name]" class="form-control manufacturing-input editable-field" required ${readonlyAttribute}></td>
                        <td><input type="number" name="extra_manufacturing[${newRowId}][cost_per_unit]" class="form-control manufacturing-input editable-field" required ${readonlyAttribute}></td>
                        <td><button type="button" class="btn btn-danger btn-delete-row"><i class="fas fa-trash"></i></button></td>
                    `);

                table.append(newRow);
                totrow++;

                // Add validation for new row inputs
                newRow.find(".manufacturing-input").on("input", function () {
                    const input = $(this);
                    validateInput(input); // Validate input
                    if (input.attr("name").includes("[code]")) {
                        checkCodeExists(input); // Check for code existence
                    }
                });

                // Delete row event
                newRow.find(".btn-delete-row").click(function () {
                    if (confirm("Do you want to delete the data?")) {
                        newRow.remove();
                    } else {
                        return false;
                    }

                });
            },
            error: function () {
                alert("Error fetching the last ID.");
            },
        });
    });
    if (updateButton) {
        updateButton.addEventListener("click", async function (event) {
            event.preventDefault(); // Prevent the default form submission
            isValid = true;
            const invalidFields = document.querySelectorAll(".is-invalid");
            const requiredFields = document.querySelectorAll("[required]");

            requiredFields.forEach(function (field) {
                if (field.value.trim() === "") {
                    isValid = false;
                    field.classList.add("is-invalid"); // You can define this class to show a red border or message
                    showError(field, "It is required Filed");
                }
            });
            if (invalidFields.length > 0) {
                isValid = false;
            }

            if (!isValid) {
                alert("Form is invalid, fix the errors!");
                console.log("Form is invalid, fix the errors!");
            } else {
                console.log("Form is valid, proceeding with the update...");
                if (confirm("Do you want to update the data?")) {
                    ajaxFormSubmit(
                        "#masterSheetAllManufacturingForm", // Form ID
                        "#update-all-Manufacturing-Button", // Submit button ID
                        "/admin/mastersheet/boq/all/update/manufacturing", // URL for the store action
                        "post",
                        "Manufacturing Detail has been Configured Successfully." // Success message
                    );
                } else {
                    return false;
                }
            }
        });
    }
    function showError(input, message) {
        let errorMessage = input.nextElementSibling;
        if (
            !errorMessage ||
            !errorMessage.classList.contains("error-message")
        ) {
            errorMessage = document.createElement("div");
            errorMessage.classList.add("error-message", "text-danger");
            input.parentNode.appendChild(errorMessage);
            $(input).css("border", "1px solid red").addClass("is-invalid");
        }
        errorMessage.textContent = message;
    }

    // Remove error message
    function removeError(input) {
        const errorMessage = input.nextElementSibling;
        if (errorMessage && errorMessage.classList.contains("error-message")) {
            errorMessage.remove();
            $(input).css("border", "none").removeClass("is-invalid");
        }
    }
    $(document).on("click", ".delete-all-Manufacturing-Button", function (e) {
        e.preventDefault();
        const row = $(this).closest("tr");
        const itemId = $(this).data("id");
        const url = `/admin/mastersheet/boq/fence/delete/manufacturing/${itemId}`;

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
});
