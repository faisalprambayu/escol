
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this data ?
        </div>
        <div class="modal-footer">
            <?php if($data){?>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="<?= url('api/r_major/'.$datas['id'])?>" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <?php }?>
        </div>
      </div>
    </div>
  </div>
