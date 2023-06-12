<div class="modal fade" id="modalEdit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEditUser">
        <div class="modal-body">
          <!-- <input type="hidden" name="idUser"> -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="id">Username</label>
                <input type="text" class="form-control" id="idUser" name="idUser" placeholder="Username" disabled>
                <small id="name_error" class="text-danger"> </small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="level_id">Level</label>
                <!-- <input type="text" class="form-control" name="level_id" placeholder="Level"> -->
                <option value="" selected disabled>Select User Level</option>
                  <?php foreach($all_level as $level){
                    $all_level = $row['id'];
                    if ($all_level==$level['id']){
                  ?>
                    <option value="<?php echo $level['id'];?>" selected><?php echo $level['description'];?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $level['id'];?>"><?php echo $level['description'];?></option>
                  <?php }
                  };?>
                <small id="level_id_error" class="text-danger"> </small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Password">
                <small id="password_error" class="text-danger"> </small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="blocked">Blocked</label>
                <select class="form-control" name="blocked" id="blocked">
                  <option value="" selected disabled>Select No/Yes</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                <small id="blocked_error" class="text-danger"> </small>
              </div>
            </div>
          </div>
        </div>
      </form>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="btn-updateUser" class="btn btn-primary">Save</button>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>