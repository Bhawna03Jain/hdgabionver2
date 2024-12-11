$(document).ready(function () {
    // Check Current User Password
    $("#current_pwd").keyup(function () {
        var current_pwd = $(this).val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "/admin/check-current-pwd",
            data: { current_pwd: current_pwd },
            success: function (resp) {
                if (resp == "false") {
                    $("#verifyCurrentPwd").html(
                        "<font color='red'>Current Password is incorrect</font>"
                    );
                } else if (resp == "true") {
                    $("#verifyCurrentPwd").html(
                        "<font color='green'>Current Password is correct</font>"
                    );
                }
            },
            error: function () {
                console.log("Error:", data);
            },
        });
    });
    // Custom callback for handling password update responses
    function handlePasswordUpdate(resp) {
        if (resp.type === "incorrect") {
            $(".reset-current_pwd").css("color", "red").html(resp.message);
        }
    }



    // Call common function for 'forgot password' form
    handleFormValidation(
        "#adminforgotpassword",
        "/admin/forgot-password",
        "#forgot-success",
        "forgot"
    );

    // Call common function for 'reset password' form
    handleFormValidation(
        "#adminresetpassword",
        "/admin/reset-password",
        "#reset-success",
        "reset"
    );




    // Form handling for admin password update
    handleFormValidation(
        "#adminUpdatePasswordForm",
        "/admin/update-password",
        "#reset-success",
        "reset",
        handlePasswordUpdate,
        "false",
        "'Password Updated"
    );

});
