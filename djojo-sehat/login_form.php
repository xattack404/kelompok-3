<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login_modal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" id="form-login" class="form-contrainer" action="login.php">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group has-feedback"><label>Username</label>
                    <input class="form-control" name="username" type="text" id="username" required
                      placeholder="Username..." />
                    <span class="glyphicon glyphicon-envelope form-control-feedback">
                    </span>
                  </div>
                  <div class="form-group has-feedback"><label>Password</label>
                    <input class="form-control" name="password" type="password" id="password" required
                      placeholder="Password..." />
                    <span class="glyphicon glyphicon-envelope form-control-feedback">
                    </span>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- left column -->
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
      </div>
    </div>
  </div>
</div>