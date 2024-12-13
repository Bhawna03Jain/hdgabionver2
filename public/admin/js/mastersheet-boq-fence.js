$(document).ready(function () {

    // Get the "Edit" and "Update" buttons
    const editButton = document.getElementById("edit-Fence-Button");
    const updateButton = document.getElementById(
        "update-Fence-Button"
    );
    // const deleteButton = document.getElementById(
    //     "delete-Fence-Material-Button"
    // );

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
                                        "#masterSheetFenceConfigForm", // Form ID
                                        "#update-Fence-Button", // Submit button ID
                                        "/admin/mastersheet/boq/fence/update", // URL for the store action
                                        "post",
                                        "Detail For Fence has been Configured Succcessfully." // Success message
    );
            } else {

                return false;
            }
        }
    });
}


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




});
