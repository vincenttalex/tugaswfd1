<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
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
            e.preventDefault(); // Prevent full page reload

            let formData = new FormData(this);

            $.ajax({
                url: "/products", // Corrected route for storing products
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // CSRF protection
                },
                success: function (response) {
                    if (response.success) {
                        // Append new product to the list dynamically
                        $(".row.mt-5").prepend(`
                            <div class="col-lg-4 col-md-6 mb-4" id="product-${response.product.id}">
                                <div class="card">
                                    <img src="${response.product.photo_link}" class="card-img-top" alt="${response.product.name}" />
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-white">${response.product.name}</h5>
                                        <p class="card-text text-white flex-grow-1">
                                            ${response.product.description ?? "No description available."}
                                        </p>
                                        <h5 class="card-text text-white" style="font-weight: bold;">Rp. ${response.product.price}</h5>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger delete-btn" data-id="${response.product.id}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);

                        // Hide the modal and reset the form
                        $("#addModal").modal("hide");
                        $("#addProductForm")[0].reset();
                    } else {
                        alert("Failed to add product.");
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert("Error adding product.");
                }
            });
        });
    });
</script>

    
  