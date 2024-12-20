$(document).ready(function () {

    // Get the "Edit" and "Update" buttons
    const editButton = document.getElementById("edit-basket-Material-Button");
    const updateButton = document.getElementById(
        "update-basket-Material-Button"
    );
    const deleteButton = document.getElementById(
        "delete-basket-Material-Button"
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
                    url: `/admin/mastersheet/boq/Basket/check-code/materials`,
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
                    $('.material-input[name*="[code]"]').each(function () {
                        if ($(this).val().trim() !== "") {
                            existingValues.push($(this).val().trim());
                        }
                    });
                    const codeCount = existingValues.filter(
                        (value) => value === codeValue
                    ).length;
                    if (codeCount > 1) {
                        isCodeExist = true; // If exists more than once, set true
                    } else {
                        isCodeExist = false;
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
    $(document).on("input", ".material-input", async function () {
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

    // Add event listener to the "Update" button
    if (updateButton) {
        updateButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Get all required fields
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
            // If all required fields are valid, you can submit the form or proceed with the update
            if (!isValid) {
                console.log("Form is invalid, fix the errors!");
                alert("Form is invalid, fix the errors!");
                // if (firstInvalidField) {
                //     firstInvalidField.focus(); // Focus on the first invalid field
                // }
            } else {
                console.log("Form is valid, proceeding with the update...");
                if (confirm("Do you want to update the data?")) {
                    ajaxFormSubmit(
                        "#masterSheetbasketMaterialForm", // Form ID
                        "#update-basket-Material-Button", // Submit button ID
                        "/admin/mastersheet/boq/Basket/update/materials", // URL for the store action
                        "post",
                        "Material Detail For Basket has been Configured Succcessfully." // Success message
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
    const modal = document.getElementById('modal');
    const overlay = document.getElementById('overlay');
    // const anyValueInput = document.getElementById('anyValue');
    // const predefinedLengthSelect = document.getElementById('predefinedLength');
    // const formulaSelect = document.getElementById('formulaSelect');
    const okButton = document.getElementById('okButton');
    const cancelButton = document.getElementById('cancelButton');
    let currentCell = null;
    let currentRow = null; // Track the currently clicked row
    // modal.style.display = 'block';
    // Function to open the modal
    function openModal(row) {
        // currentRow = row;
        // currentRow = $(this).closest("tr"); // Get the clicked row
        console.log(currentRow  );
        // anyValueInput.value = cell.dataset.value;
        // predefinedLengthSelect.value = '';
        // formulaSelect.value = '';
        modal.style.display = 'block';
        overlay.style.display = 'block';
    }
     // Function to close the modal
     function closeModal() {
        modal.style.display = 'none';
        overlay.style.display = 'none';
        currentCell = null;
    }
     // Handle OK button click
     okButton.addEventListener('click', function () {
        console.log(currentRow  );
        const selectedProduct = $("input[name='productSelect']:checked").val(); // Get selected product name
      console.log(selectedProduct);
      if (!selectedProduct) {
        alert("Please select a product!");
        return;
    }
    // Fetch data from the selected row in the modal
    const selectedRow = $("input[name='productSelect']:checked").closest("tr");
    const prod_id = selectedRow.find("td[data-label='id'] ").text(); // Article No
    const articleNo = selectedRow.find("td[data-label='article_no'] ").text(); // Article No
    const hsCode =selectedRow.find("td[data-label='hs_code'] ").text();


    const itemName =selectedRow.find("td[data-label='name'] ").text();
    const length =selectedRow.find("td[data-label='length'] ").text();
    const no =selectedRow.find("td[data-label='no'] ").text();
    const weightPerCm =selectedRow.find("td[data-label='weight_per_unit']").text();

    const unitPrice =selectedRow.find("td[data-label='unit_price'] ").text();
    const specs =selectedRow.find("td[data-label='short_desc'] ").text();
    // const articleNo = selectedRow.find("td:nth-child(2)").text(); // Article No

    // const hsCode = selectedRow.find("td:nth-child(3)").text();   // HS Code

    // const itemName = selectedRow.find("td:nth-child(4)").text(); // Item Name
    // const length = selectedRow.find("td:nth-child(5)").text();   // Length
    // const no = selectedRow.find("td:nth-child(6)").text();       // No
    // const weightPerCm = selectedRow.find("td:nth-child(7)").text(); // Weight per cm
    // const unitPrice = selectedRow.find("td:nth-child(8)").text();  // Unit Price
    // const specs = selectedRow.find("td:nth-child(9)").text();      // Specs

    // Populate the data into the current row
    currentRow.find("td[data-label='prod_id']").find('textarea').val(prod_id);
    currentRow.find("td[data-label='article_no']").find('textarea').val(articleNo.trim());
    // currentRow.find("td[data-label='article_no']").text(articleNo);
    currentRow.find("td[data-label='hs_code']").find('textarea').text(hsCode.trim());
    currentRow.find("td[data-label='name']").find('textarea').text(itemName.trim());
    currentRow.find("td[data-label='length']").find('input').val(length.trim());
    currentRow.find("td[data-label='no']").find('input').val(no.trim());

    currentRow.find("td[data-label='weight_per_unit']").find('input').val(weightPerCm.trim());
//    console.log( currentRow.find("td[data-label='weight_per_unit']").find('input'));
    currentRow.find("td[data-label='unit_price']").find('input').val(unitPrice.trim());
    currentRow.find("td[data-label='short_desc']").find('textarea').text(specs.trim());

        // const value = anyValueInput.value || predefinedLengthSelect.value;
        // const formula = formulaSelect.value;

        // if (currentCell) {
        //     if (formula) {
        //         const rowCells = Array.from(currentCell.parentElement.children).filter(cell => cell.dataset.value);
        //         if (formula === 'sum') {
        //             const sum = rowCells.reduce((acc, cell) => acc + (parseFloat(cell.dataset.value) || 0), 0);
        //             currentCell.dataset.value = sum;
        //             currentCell.textContent = sum;
        //         } else if (formula === 'average') {
        //             const values = rowCells.map(cell => parseFloat(cell.dataset.value) || 0);
        //             const average = values.reduce((acc, val) => acc + val, 0) / values.length;
        //             currentCell.dataset.value = average.toFixed(2);
        //             currentCell.textContent = average.toFixed(2);
        //         }
        //     } else {
        //         currentCell.dataset.value = value;
        //         currentCell.textContent = value || 'Click to Set';
        //     }
        // }
        closeModal();
    });

    // Handle Cancel button click
    cancelButton.addEventListener('click', closeModal);

    // Close modal when clicking on the overlay
    overlay.addEventListener('click', closeModal);
    let totrow=0;
    $("#addRowButton").click(function () {
        // Make AJAX call to fetch the last ID from the database
        $.ajax({
            url: "/admin/mastersheet/boq/Basket/get-last-id/materials/", // Endpoint to get the last ID
            method: "GET",
            success: function (response) {
                const lastId = response.lastId || 0; // Get last ID from the response (default to 0 if not found)
                // alert(lastId);
                const newRowId = lastId + 1 + totrow++; // Increment to get the new row's ID
// alert(newRowId);
                const tableexist = $("#material tbody");
                const rowCountexist = tableexist.children().length;
                const table = $("#materialTable tbody");
                const rowCount = table.children().length + rowCountexist + 1;

                const newRow = $("<tr>");

                newRow.html(`
                    <!-- Article No -->
                    <td data-label="prod_id">
                        <textarea name="extra_material_configs[${newRowId}][product_id]"
                                    class="form-control" readonly
                                    required ></textarea>
                    </td>
                    <td data-label="article_no">
                        <textarea name="extra_material_configs[${newRowId}][article_no]"
                                    class="form-control" readonly
                                    required ></textarea>
                    </td>

                    <!-- HS Code -->
                    <td data-label="hs_code">
                        <textarea name="extra_material_configs[${newRowId}][hs_code]"
                                    class="form-control " readonly></textarea>
                    </td>

                    <!-- Item Name -->
                    <td data-label="name">
                        <textarea name="extra_material_configs[${newRowId}][item_name]"
                                    class="form-control " readonly required ></textarea>
                    </td>

                    <!-- Length -->
                    <td data-label="length">

                            <input type="text" name="extra_material_configs[${newRowId}][length]"
                                    class="form-control  editable-field" value="" readonly>

                    </td>


                    <!-- Number -->

                    <td data-label="no">

                        <input type="number" size="4" name="extra_material_configs[${newRowId}][no]"
                                class="form-control  editable-field"
                                value="1" readonly
                                >
                    </td>

                    <!-- Weight per cm -->
                    <td data-label="weight_per_unit">
                        <input type="number" step="0.00000001"
                                name="extra_material_configs[${newRowId}][weight_per_cm]"
                                class="form-control "
                                value=""
                                readonly>
                    </td>

                    <!-- Unit Price -->
                    <td data-label="unit_price">
                        <input type="number" step="0.01"
                                name="extra_material_configs[${newRowId}][unit_price]"
                                class="form-control " value="" readonly required>
                    </td>

                    <!-- Specs -->
                    <td data-label="short_desc">
                        <textarea name="extra_material_configs[${newRowId}][specs]"
                                    class="form-control " readonly></textarea>
                    </td>


                    <td><button type="button" class="btn btn-danger btn-delete-row"><i class="fas fa-trash"></i></button></td>
                `);

                table.append(newRow);
                console.log(newRow);
// Attach modal opening functionality to new cells with data-value
// newRow.find("td[data-value]").on("click", function () {
//     openModal(this); // Call your openModal function
// });
newRow.on("click", function () {
    if(!isEditable){
    currentRow = $(this).closest("tr");
    openModal(this); // Call your openModal function
    }
});

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
    $(document).on("click", ".delete-Basket-Material-Button", function (e) {
        e.preventDefault();
        const row = $(this).closest("tr");
        const itemId = $(this).data("id");
        const url = `/admin/mastersheet/boq/Basket/delete/materials/${itemId}`;

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


    // function validateInput(input) {
    //     const value = input.value.trim();

    //     if (value === "") {
    //         $(input)
    //             .css("border", "1px solid red")
    //             .next(".error-message")
    //             .text("Cannot be blank")
    //             .show();
    //     } else if (parseFloat(value) < 0) {
    //         $(input)
    //             .css("border", "1px solid red")
    //             .next(".error-message")
    //             .text("Cannot insert negative number")
    //             .show();
    //     } else {
    //         $(input).css("border", "").next(".error-message").text("").hide();
    //     }
    // }

    // Attach validation to editable fields
    // document.querySelectorAll(".editable-field").forEach((input) => {
    //     input.addEventListener("blur", () => validateInput(input));
    //     input.addEventListener("input", () => validateInput(input));
    // });

    // Dynamic Row Addition with AJAX Fetch for Last ID

    // ajaxFormSubmit(
    //     null, // formId is not applicable here since no form is involved
    //     ".delete-Basket-Material-Button", // Button selector
    //     null, // URL will be dynamically passed
    //     "POST", // Simulate DELETE method
    //     "Item deleted successfully." // Success message
    // );


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
