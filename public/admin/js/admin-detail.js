$(document).ready(function () {
// Sync with the admin picture update form
  // Custom success callback for updating profile details
  function updateProfileDetails(resp) {
    // Update profile section with new data
    $("#profile-name").text(resp.admin.name);
    $("#profile-email").text(resp.admin.email);
    $("#profile-mobile").text(resp.admin.mobile);

    // Update form input values with the new data
    $("#name").val(resp.admin.name);
    $("#mobile").val(resp.admin.mobile);
    $("#address").val(resp.admin.address);
}
handleFormValidation(
    "#adminUpdatePic",
    "/admin/update-pic",
    "#update-uploaded",
    "update",
  "",
    true
);
 // Call common function for 'update details' form with a custom success callback
 handleFormValidation(
    "#adminUpdateDetail",
    "/admin/update-details",
    "#update-success",
    "update",
    updateProfileDetails,"false","Details has been updated Successfully."
);
   // Custom callback to update the admin profile picture
//    function updateAdminProfilePicture(resp) {

//     const newImagePath = resp.image; // Assuming 'message' contains the image name
//     $(".profile-user-img").attr("src", newImagePath); // Updated selector
//     $("#changePicModal").modal("hide"); // Close the modal
//     $("#update-uploaded")
//         .html("Profile picture updated successfully")
//         .css("color", "white");
//         setTimeout(function () {
//             $('#update-uploaded').hide();
//             }, 2000);
// }


});
