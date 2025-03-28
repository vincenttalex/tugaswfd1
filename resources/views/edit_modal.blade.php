<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add/Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="productName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="productName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="productDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPhoto" class="form-label">Upload Photo</label>
                        <input type="file" class="form-control" id="productPhoto" name="photo_link" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#addProductForm").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this); // Capture form data

            $.ajax({
                url: "/product",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function (response) {
                    console.log(response); // Debug response
                    if (response.success) {
                        alert("Product added successfully!");
                        location.reload();
                    } else {
                        alert("Failed to add product.");
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText); // Debugging
                    alert("Error adding product. Check console.");
                }
            });
        });
    });
</script>