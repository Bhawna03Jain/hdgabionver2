$(document).ready(function () {
 // Function to update the country code based on the selected option
 function updateCountryCode() {
    const selectedOption = $("#country_name option:selected"); // Get the selected option
    const countryCode = selectedOption.data("code"); // Access the data-code attribute

    // Update the country_code input based on the selected option
    $("#country_code").val(countryCode || ""); // Use a logical OR to set to "" if no code is found
}
function populateTimezones() {
    const selectedCountry = $("#country_name option:selected");
    const timezones = selectedCountry.data("timezones");
// alert(timezones);
    // Clear the timezone dropdown before populating
    $("#timezone").empty();
    $("#timezone").val(timezones);
    // if (typeof timezones === "string") {
    //     timezones.split("|").forEach(function (timezone) {
    //         $("#timezone").append(new Option(timezone, timezone));
    //     });
    // }
}
updateCountryCode(); // Set default locale code on page load
populateTimezones();
// Update locale code on change
$("#country_name").on("change", function(){
    updateCountryCode(); // Use direct function reference
    populateTimezones();
});
$("#countryCreateForm").submit(function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Show loader if necessary (optional)
    // $("#loader").show();
    $(".preloader").show();
    var formData = $(this).serialize(); // Serialize form data

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST", // Use POST or PUT depending on the action
        url: "/admin/countries/store", // Form action URL for create/update
        data: formData,
        success: function (resp) {
            if (resp.status === "success") {
                $("#createCountryModal").modal("hide"); // Hide the modal

                window.location.href =
                    resp.message +
                    "?successMessage=" +
                    encodeURIComponent("Country saved successfully.");
            } else {
                toastr.error("Failed to save country.");
            }
        },
        error: function (xhr) {
            console.log("An error occurred during the AJAX request");
            toastr.error("An error occurred during the AJAX request");
        },
    });
});

// When edit button clicked

ajaxFetchFormData(
    ".edit-country-btn", // Button class for editing
    "update-country-btn", // Update button ID
    "/admin/countries/edit/", // Base URL for fetching data
    "#createCountryModal", // Modal ID
    {
        // Form field mappings
        id: "#id",
        code: "#code",
        name: "#name",
        // Include other fields as needed
    },
    [
        // Read-only fields
        // Add any fields that should be read-only when editing, if applicable
    ]
);
// Call the function for updating the country
ajaxFormSubmit(
    "#countryCreateForm", // Form ID
    "#update-country-btn", // Update button ID
    "/admin/countries/update" // URL for the update action
);
});
