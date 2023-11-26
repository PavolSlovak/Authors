<!-- Modal Edit -->

<div
  class="modal fade"
  id="editModal"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <label for="firstname">First name:</label><br />
          <input type="text" id="firstname" class="form-control" /><br />
          <label for="lastname">Last name:</label><br />
          <input type="text" id="lastname" class="form-control" /><br />
          <label for="address">Address:</label><br />
          <input type="address" id="address" class="form-control" /><br />
          <input type="hidden" id="userid" class="form-control" />

          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary">Save changes</a>
            <button
              class="btn btn-secondary translate-middle"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
