<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Laravel still recognizes this -->
                    <input type="hidden" id="editProductId" name="id">
                
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editProductName" name="name" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="editProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editProductPrice" name="price" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="editProductDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editProductDescription" name="description" rows="3" required></textarea>
                    </div>
                
                    <div class="mb-3">
                        <label for="editProductPhoto" class="form-label">Upload Photo</label>
                        <input type="file" class="form-control" id="editProductPhoto" name="photo_link" accept="image/*">
                        <input type="hidden" id="existingPhoto" name="existing_photo">
                        <img id="editProductPhotoPreview" src="" class="mt-2" width="100" style="display: none;">
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
        $(".edit-btn").click(function () {
            let productId = $(this).data("id");

            $.ajax({
                url: "/products/" + productId,
                type: "GET",
                success: function (response) {
                    if (response.success) {
                            let product = response.product;

                        // Populate form with existing data
                        $("#editProductId").val(product.id);
                        $("#editProductName").val(product.name);
                        $("#editProductPrice").val(product.price);
                        $("#editProductDescription").val(product.description);
                        $("#existingPhoto").val(product.photo_link); 

                        if (product.photo_link) {
                            $("#editProductPhotoPreview").attr("src", "/" + product.photo_link).show();
                        } else {
                            $("#editProductPhotoPreview").hide();
                        }

                        // Set form action dynamically
                        $("#editForm").attr("action", "/products/" + productId);

                        $("#editModal").modal("show");
                    } else {
                        alert("Product not found.");
                    }
                },
                error: function () {
                    alert("Error fetching product details.");
                }
            });
        });

        // Handle form submission
        $(document).ready(function () {
            $("#editForm").submit(function (e) {
                e.preventDefault();

                let productId = $("#editProductId").val();
                let formData = new FormData(this);
                formData.append("_method", "PUT"); // Tell Laravel it's a PUT request

                $.ajax({
                    url: "/products/" + productId,
                    type: "POST", // Laravel doesn't support PUT with FormData, so we use POST + _method=PUT
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function (response) {
                        if (response.success) {
                            window.location.href = "/product"; // Redirect immediately after success
                        } else {
                            alert("Failed to update product.");
                        }
                    },
                    error: function () {
                        alert("Error updating product.");
                    }
                });
            });
        });
    });
</script>