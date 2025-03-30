<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Are you sure you want to delete this product?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
          </div>
      </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        let productId;

        // When delete button is clicked, store the product ID
        $(".delete-btn").click(function () {
            productId = $(this).data("id");
        });

        // Handle delete confirmation
        $("#confirmDelete").click(function () {
            $.ajax({
                url: "/products/" + productId,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.success) {
                        // Remove product from the UI
                        $("#product-" + productId).fadeOut(500, function () {
                            $(this).remove();
                        });

                        // Hide modal
                        $("#deleteModal").modal("hide");
                    } else {
                        alert("Failed to delete the product.");
                    }
                },
                error: function () {
                    alert("Error deleting the product.");
                }
            });
        });
    });
</script>

