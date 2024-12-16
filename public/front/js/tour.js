document.addEventListener("DOMContentLoaded", function () {
    // Check if the user has already skipped the tour
    var tour;

    function tourFeatures() {
        tour.addStep({
            id: 'draw-step',
            text: 'Click "Draw" to start drawing on the canvas.',
            attachTo: {
                element: '.CreateLineBtn',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: function() {
                        const drawButton = document.querySelector('.CreateLineBtn');

                        if (!isDrawing) {
                            drawButton.click();

                        }

                        tour.next();

                    },
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference

                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });
        // // Adjust the top value as needed
        function checkIfLineExists() {
            const lines = canvas.getObjects("line"); // Get all line objects on the canvas
            const nonGridLines = lines.filter((line) => !line.isGrid);
            // console.log(nonGridLines.length);
            return nonGridLines.length; // Example: Replace with actual logic
        }
        tour.addStep({
            id: 'draw-line-step',
            text: 'Draw Any Line on Canvas',
            attachTo: {
                element: '#designCanvas',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: function() {

                        const lineExists = checkIfLineExists(

                        ); // Replace with your logic to verify if a line is present

                        if (lineExists <= 0) {
                            alert("First, draw a line on the canvas.");
                            return; // Do not proceed to the next step
                        }

                        tour.next();
                    },
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });

        tour.addStep({
            id: 'stop-draw-step',
            text: 'Click "Stop" to stop drawing on the canvas.',
            attachTo: {
                element: '.CreateLineBtn',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: function() {
                        const drawButton = document.querySelector('.CreateLineBtn');

                        if (isDrawing) {
                            drawButton.click();

                        }

                        tour.next();

                    },
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });
        let clickCount = 0;
        tour.addStep({
            id: 'show-hide-labels-step',
            text: 'Click To Hide/Show Labels',
            attachTo: {
                element: '#toggleLabels',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: function() {
                        // clickCount++; // Increment the click count

                        if (clickCount === 2) {
                            tour.next(); // Move to the next step after 2 clicks
                        } else {
                            alert(
                                "Please click this button to show/hide Labels."
                            ); // Prompt the user to click again
                        }
                    },
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });
        // Listen for clicks on the #toggleLabels button
        document.getElementById('toggleLabels').addEventListener('click', function() {
            clickCount++; // Increment the click count each time the button is clicked
        });
        tour.addStep({
            id: 'edit-step',
            text: 'Click Edit to edit Fences or delete Fences.',
            attachTo: {
                element: '.editModeBtn',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: function() {
                        const editButton = document.querySelector('.editModeBtn');

                        if (!isEditMode) {
                            editButton.click();

                        }

                        tour.next();

                    },
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });

        tour.addStep({
            id: 'select-step',
            text: 'Select Any Line on Canvas',
            attachTo: {
                element: '#designCanvas',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: function() {
                        const lineExists = checkIfLineExists();
                        if (lineExists <= 0) {
                            alert("No Line Found On canvas");
                            return;
                        } else {
                            // Here we can add additional checks to ensure the user selects a line
                            const selectedLine = canvas
                                .getActiveObject(); // Assuming you're using Fabric.js

                            if (!selectedLine) {
                                alert("Please select a line before proceeding.");
                                return; // Prevent proceeding
                            }
                            if (selectedLine.get('type') !== 'line') {
                                alert(
                                    "Only a line can be selected. Please select a line before proceeding."
                                );
                                return; // Prevent proceeding if the selected object is not a line
                            }
                        }
                        tour.next();
                    },
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });

        tour.addStep({
            id: 'modify-form-step',
            text: 'Modify Dimension Here',
            attachTo: {
                element: '#DimensionControl',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: tour.next,
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });

        tour.addStep({
            id: 'color-line-step',
            text: 'Select any color to change color of Selected Fence.',
            attachTo: {
                element: '.canvaspaintBucketBtn',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: tour.next,
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });

        tour.addStep({
            id: 'delete-line-step',
            text: 'Click Delete or Press "Del" Key to Delete Selected Fence.',
            attachTo: {
                element: '.deleteObjectBtn',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: tour.next,
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: 'btn-red'
                }
            ]
        });

        tour.addStep({
            id: 'stop-edit-step',
            text: 'Click Stop to Stop Editing Fences.',
            attachTo: {
                element: '.editModeBtn',
                on: 'bottom'
            },
            buttons: [{
                    text: 'Next',
                    action: function() {
                        const lineExists = checkIfLineExists();
                        if (lineExists <= 0) {
                            alert(
                                "No line present on canvas.Editing Has already been stopped"
                            );
                            // return;
                        } else {
                            const editButton = document.querySelector('.editModeBtn');

                            if (isEditMode) {
                                editButton.click();

                            }
                        }
                        tour.next();
                    },
                    classes: 'btn-green'
                },
                {
                    text: 'Skip Tour',
                    action: function() {
                        localStorage.setItem('tourSkipped', 'true'); // Store the preference
                        tour.complete();
                    },
                    classes: 'btn-red'
                }
            ]
        });
        tour.addStep({
            id: 'end-step',
            text: 'You have completed Phase 1 of the tour! Now Let\'s start Phase 2',
            attachTo: {
                element: '#endElement', // Attach to the end element (can be any relevant element)
                on: 'bottom'
            },
            buttons: [{
                text: 'Skip Tour',
                action: function() {
                    localStorage.setItem('tourSkipped', 'true'); // Store the preference
                    tour.complete(); // End the tour
                }
            }]
        });
        let isSaveClicked = false;
        tour.addStep({
            id: "save-line-step",
            text: "Save All Fences Exist on Canvas Locally",
            attachTo: {
                element: ".canvasSaveBtn",
                on: "bottom",
            },
            buttons: [
                {
                    text: "Next",
                    action: function () {
                        const lineExists = checkIfLineExists();
                        const drawButton =
                            document.querySelector(".CreateLineBtn");
                        if (lineExists <= 0) {
                            if (!isDrawing) {
                                drawButton.click();
                                alert("First, draw a line on the canvas.");
                                return; // Do not proceed to the next step
                            }
                        } else {
                            if (isDrawing) {
                                drawButton.click();
                            }
                            // const saveButtonClicked = localStorage.getItem('saveButtonClicked'); // Get flag value from localStorage
                            if (!isSaveClicked) {
                                alert(
                                    "Please click the Save button before proceeding."
                                );
                                return;
                            } else {
                                isSaveClicked = false;
                            }
                        }

                        tour.next();
                    },
                    classes: "btn-green",
                },
                {
                    text: "Skip Tour",
                    action: function () {
                        localStorage.setItem("tourSkipped", "true"); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: "btn-red",
                },
            ],
        });
        let isclearAllClicked = false;
        tour.addStep({
            id: "clear-all-line-step",
            text: "Clear All Fences on Canvas",
            attachTo: {
                element: ".clearAll",
                on: "bottom",
            },
            buttons: [
                {
                    text: "Next",
                    action: function () {
                        const lineExists = checkIfLineExists();
                        const drawButton =
                            document.querySelector(".CreateLineBtn");
                        if (lineExists > 0) {
                            if (!isclearAllClicked) {
                                alert(
                                    "Please click the Clear All Button to Clear Canvas."
                                );
                                // return
                            } else {
                                isclearAllClicked = false;
                            }
                        } else {
                            alert("No Fence Available on canvas to clear.");
                        }
                        tour.next();
                    },
                    classes: "btn-green",
                },
                {
                    text: "Skip Tour",
                    action: function () {
                        localStorage.setItem("tourSkipped", "true"); // Store the preference
                        tour.complete(); // Skip the tour
                    },
                    classes: "btn-red",
                },
            ],
        });
        document
            .querySelector(".canvasSaveBtn")
            .addEventListener("click", function () {
                // Set flag in localStorage when Save is clicked
                isSaveClicked = true;
            });
        // document.querySelector('.clearAll').addEventListener('click', function() {
        //     // Set flag in localStorage when Save is clicked
        //     isclearAllClicked = true;
        // });
        // Final Step: End of the tour
        tour.addStep({
            id: "end-step",
            text: "You have completed Phase 1 ofthe tour! Now you can start using the application.",
            attachTo: {
                element: "#endElement", // Attach to the end element (can be any relevant element)
                on: "bottom",
            },
            buttons: [
                {
                    text: "Finish Tour",
                    action: function () {
                        localStorage.setItem("tourSkipped", "true"); // Store the preference
                        tour.complete(); // End the tour
                    },
                },
            ],
        });
    }

    if (!localStorage.getItem("tourSkipped")) {
        // Initialize the Shepherd tour
        tour = new Shepherd.Tour({
            defaultStepOptions: {
                cancelIcon: {
                    enabled: true,
                }, // Enable the cancel icon on the steps
                showCancelLink: true, // Display cancel link for each step
            },
        });

        tourFeatures();
        // Start the tour
        tour.start();
    } else {
        // When the user has already skipped the tour, start it via button click
        console.log("Tour has been skipped. Button listener is set up.");
        document
            .getElementById("start-tutorial")
            .addEventListener("click", function () {
                console.log("Start button clicked.");

                if (!tour) {
                    // Reinitialize the tour if it's not yet initialized
                    console.log("Reinitializing tour.");
                    tour = new Shepherd.Tour({
                        defaultStepOptions: {
                            cancelIcon: {
                                enabled: true,
                            },
                            showCancelLink: true,
                        },
                    });
                    tourFeatures();
                }
                tour.start();
            });
    }
});
