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
                <?php
                  foreach($all_level as $level) {
                      $al[$level->id] = $level->description;
                  }
                ?>
                <?= form_dropdown('level_id', $al, set_value('level', $this->uri->segment(3)), 'class="form-control select2 tip" id="level_id"  required="required" style="width:100%;"'); ?>
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
                <select name="blocked" class="form-control" data-plugin="select_hrm" data-placeholder="Select One">
                  <!-- <option <?php if($data->blocked == "No"): ?> selected="selected" <?php endif;?> value="No">No</option>
                  <option <?php if($data->blocked == "Yes"): ?> selected="selected" <?php endif;?> value="Yes">Yes</option> -->
                  <option selected="selected" value="No">No</option>
                  <option value="Yes">Yes</option>
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