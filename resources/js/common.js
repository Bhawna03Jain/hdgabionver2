// Toggle visibility for dropdowns and menu items
export  const toggleVisibility = (triggerId, targetId, toggleClass = "hidden") => {

    const trigger = document.getElementById(triggerId);
    const target = document.getElementById(targetId);
    trigger.addEventListener("click", () => {

        target.classList.toggle(toggleClass);
    });

};

// *****forms********

document.addEventListener("DOMContentLoaded", function() {
    const formControls = document.querySelectorAll('.relative .form-control');

    formControls.forEach(formControl => {
        // Adjust label on page load based on input value
        toggleLabel(formControl);

        // Add event listeners for focus and blur
        formControl.addEventListener('focus', () => updateLabel(formControl, true));
        formControl.addEventListener('blur', () => toggleLabel(formControl));
    });

    // Function to toggle label based on value
    function toggleLabel(input) {
        const label = input.previousElementSibling;
        if (input.value === "") {
            label.classList.remove('text-red', 'top-0', '-translate-y-9', 'font-bold');
            label.classList.add('text-gray-500');
        } else {
            label.classList.add('text-gray-950', 'font-bold', 'top-0', '-translate-y-9');
            label.classList.remove('text-gray-500');
        }
    }

    // Function to update label on focus
    function updateLabel(input, isFocused) {
        const label = input.previousElementSibling;
        if (isFocused) {
            label.classList.add('text-red', 'top-0', '-translate-y-9');
            label.classList.remove('text-gray-500');
        }
    }
});

