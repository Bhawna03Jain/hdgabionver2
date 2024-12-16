<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Filter Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h3>Filter Options</h3>
                <form id="filter-form">
                    <div class="mb-3">
                        <label for="length" class="form-label">Length</label>
                        <select class="form-select" name="length" id="length">
                            <option value="">Select Length</option>
                            <option value="1">1m</option>
                            <option value="2">2m</option>
                            <option value="3">3m</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="depth" class="form-label">Depth</label>
                        <select class="form-select" name="depth" id="depth">
                            <option value="">Select Depth</option>
                            <option value="1">1m</option>
                            <option value="2">2m</option>
                            <option value="3">3m</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label">Height</label>
                        <select class="form-select" name="height" id="height">
                            <option value="">Select Height</option>
                            <option value="1">1m</option>
                            <option value="2">2m</option>
                            <option value="3">3m</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maze_size" class="form-label">Maze Size</label>
                        <select class="form-select" name="maze_size" id="maze_size">
                            <option value="">Select Maze Size</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h3>Images</h3>
                <div class="mb-3">
                    <button id="toggle-view" class="btn btn-secondary">Switch to List View</button>
                </div>
                <div id="image-container" class="row"></div>
                <div id="loader" class="text-center" style="display:none;">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <button id="load-more-btn" class="btn btn-primary">Load More</button>
            </div>
        </div>
    </div>

    <script>
        let currentPage = 1;
        let viewType = 'grid';

        // Function to fetch images
        function fetchImages(page) {
            const formData = $('#filter-form').serializeArray();
            formData.push({ name: 'page', value: page });

            // Show loader
            $('#loader').show();
            $('#load-more-btn').prop('disabled', true);

            $.ajax({
                url: '{{ route('fetch.images') }}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(data) {
                    const imageContainer = $('#image-container');

                    // Clear the loader
                    $('#loader').hide();
                    $('#load-more-btn').prop('disabled', false);

                    if (data.images.length) {
                        data.images.forEach(image => {
                            const col = $('<div></div>').addClass(viewType === 'grid' ? 'col-4 mb-3' : 'col-12 mb-3');
                            col.html(`
                                <div class="card">
                                    <img src="${image.url}" class="card-img-top" alt="Image" />
                                    <div class="card-body">
                                        <h5 class="card-title">${image.title}</h5>
                                    </div>
                                </div>
                            `);
                            imageContainer.append(col);
                        });
                    } else {
                        $('#load-more-btn').hide(); // Hide button if no more images
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    $('#loader').hide();
                    $('#load-more-btn').prop('disabled', false);
                }
            });
        }

        // Load initial images
        fetchImages(currentPage);

        // Load more images
        $('#load-more-btn').on('click', function() {
            currentPage++;
            fetchImages(currentPage);
        });

        // Toggle between grid and list view
        $('#toggle-view').on('click', function() {
            viewType = viewType === 'grid' ? 'list' : 'grid';
            const images = $('#image-container').find('.col-4, .col-12');
            images.each(function() {
                $(this).removeClass('col-4 col-12').addClass(viewType === 'grid' ? 'col-4 mb-3' : 'col-12 mb-3');
            });
            $(this).text(viewType === 'grid' ? 'Switch to List View' : 'Switch to Grid View');
        });

        // Filter images on selection change
        $('#filter-form').on('change', function() {
            $('#image-container').empty(); // Clear current images
            currentPage = 1; // Reset page count
            fetchImages(currentPage); // Fetch new images based on filters
        });
    </script>
</body>
</html>
