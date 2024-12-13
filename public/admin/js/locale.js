$(document).ready(function () {
    // Function to update the locale code based on selected language and country
    function updateLocaleCode() {
        const langCode = $("#language").val();
        const countryCode = $("#country").val();
        const localeCode =
            langCode && countryCode ? `${countryCode}_${langCode}` : "";
        $("#locale_code").val(localeCode);
    }

    // Function to update the hostname based on the selected country
    function updateHostname() {
        const countryCode = $("#country").val();
        const hostnameSelect = $("#hostname");

        // Clear hostname by default
        hostnameSelect.val("");

        if (countryCode) {
            // Loop through options of the hostname select
            hostnameSelect.find("option").each(function () {
                const optionCode = $(this).data("code");

                // If country code matches the option code
                if (countryCode.toLowerCase() === optionCode.toLowerCase()) {
                    hostnameSelect.val($(this).val());
                    return false; // Exit loop upon finding a match
                }
            });
        }
    }

    // Function to populate timezones based on the selected country
    function populateTimezones() {
        const selectedCountry = $("#country option:selected");
        const timezones = selectedCountry.data("timezones");

        // Clear the timezone dropdown before populating
        $("#timezone").empty();

        if (typeof timezones === "string") {
            timezones.split("|").forEach(function (timezone) {
                $("#timezone").append(new Option(timezone, timezone));
            });
        }
    }

    // Function to update the date format based on the selected country
    function updateDateFormat() {
        const countryCode = $("#country").val();
        const dateFormatSelect = $("#date_format");

        // Clear date format by default
        dateFormatSelect.val("");

        if (countryCode) {
            dateFormatSelect.find("option").each(function () {
                const optionCode = $(this).data("code");

                // If country code matches the option code
                if (countryCode.toLowerCase() === optionCode.toLowerCase()) {
                    dateFormatSelect.val($(this).val());
                    return false; // Exit loop upon finding a match
                }
            });
        }
    }

    // Initialize values on page load
    function initialize() {
        updateLocaleCode();
        updateHostname();
        populateTimezones();
        updateDateFormat();
    }

    // Event listeners for changes
    $("#language").on("change", updateLocaleCode);
    $("#country").on("change", function () {
        updateLocaleCode();
        updateHostname();
        populateTimezones();
        updateDateFormat();
    });

    // AJAX form submissions
    ajaxFormSubmit(
        "#localeCreateForm",
        "#save-locale-btn",
        "/admin/locales/store"
    );
    ajaxFetchFormData(
        ".edit-locale-btn",
        "update-locales-btn",
        "/admin/locales/edit/",
        "#createLocaleModal",
        {
            id: "#id",
            locale_code: "#locale_code",
            countrycode: "#country",
            date_format: "#date_format",
            hostname: "#hostname",
            currency_id: "#currency_id",
            language: "#language",
            timezone: "#timezone",
            direction: "#direction",
        },
        []
    );

    ajaxFormSubmit(
        "#localeCreateForm",
        "#update-locales-btn",
        "/admin/locales/update"
    );

    // Initialize on page load
    initialize();
});
