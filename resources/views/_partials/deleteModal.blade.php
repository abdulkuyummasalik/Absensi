<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modal-content">Are you sure you want to delete <span id="this-content"></span>?</p>
        <div id="form-modal">
          <form action="" id="deleteData" method="post">
            @csrf
            @method('delete')
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button form="deleteData" type="submit" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>