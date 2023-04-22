<div class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('checkage') }}" method="Post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Enter your age</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" name="age" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
