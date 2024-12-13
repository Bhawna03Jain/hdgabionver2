$(document).ready(function () {
    function updateCurrencyName() {
        const selectedOption = $("#currency_code option:selected"); // Get the selected option
        const currencyName = selectedOption.data("name"); // Access the data-name attribute
        const currencySymbol = selectedOption.data("symbol"); // Access the data-symbol attribute

        // Update the currency_name and currency_symbol inputs based on the selected option
        $("#currency_name").val(currencyName || ""); // Set to "" if currencyName is falsy
        $("#currency_symbol").val(currencySymbol || ""); // Set to "" if currencySymbol is falsy
    }

    // Ensure the DOM is fully loaded before running code that interacts with it

    updateCurrencyName(); // Set default currency name and symbol on page load

    // Update currency name and symbol on change
    $("#currency_code").on("change", updateCurrencyName); // Use direct function reference

    // Call the function for creating a new currency
    ajaxFormSubmit(
        "#currencyCreateForm", // Form ID
        "#save-currency-btn", // Submit button ID
        "/admin/currencies/store" // URL for the store action
    );
    // Call the function for editing a currency
    ajaxFetchFormData(
        ".edit-currency-btn", // Button class to trigger the edit
        "update-currency-btn", // Update button ID
        "/admin/currencies/edit/", // Base URL for fetching currency data
        "#createCurrencyModal", // Modal ID
        {
            // Form field mappings
            id: "#id",
            currency_code: "#currency_code",
            currency_name: "#currency_name",
            currency_symbol: "#currency_symbol",
            base_currency: "#base_currency",
            is_base_currency: "#is_base_currency",
        },
        [
            // Read-only fields
            "#base_currency",
            "#is_base_currency",
        ]
    );
    if (resp.status === "success") {
        var currency = resp.data;
        // alert(currency.id);
        $("#id").val(currency.id);
        $("#currency_code").val(currency.currency_code);
        $("#currency_name").val(currency.currency_name);
        $("#currency_symbol").val(currency.currency_symbol);
        $("#base_currency").val(resp.basecurrency);
        $("#base_currency").prop("disabled", true);
        $("#is_base_currency").prop(
            "checked",
            currency.is_base_currency
        );
        $("#is_base_currency").prop("disabled", true);
        $("#createCurrencyModal").modal("show");
        $("#createCurrencyModal")
            .find('button[type="submit"]')
            .attr("id", "update-currency-btn");
        // $("#save-currency-btn").attr("id", "update-currency-btn");
    }
    ajaxFormSubmit(
        "#currencyCreateForm", // Form ID
        "#update-currency-btn", // Update button ID
        "/admin/currencies/update" // URL for the update action
    );
});
