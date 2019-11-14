<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="login_modal"><p class="text-center">Login</p></h3>
      </div>
      <form method="post" id="form-login" class="form-contrainer" action="login.php">
        <div class="modal-body">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group has-feedback"><label>Username</label>
                    <input class="form-control" name="username" type="text" id="user" placeholder="Username or Email..."
                      required />
                    <span class="glyphicon glyphicon-envelope form-control-feedback">
                    </span>
                  </div>
                  <div class="form-group has-feedback"><label>Password</label>
                    <input class="form-control" name="password" type="password" id="password" placeholder="Password..."
                      required />
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                    </span>
                  </div>
                </div> <!-- /.box-body -->
              </div> <!-- /.box -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
         <!--  <button type="submit" name="submit" class="btn btn-secondary">Lupa Password</button> -->
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <button type="reset" name="reset" class="btn btn-danger">Reset</button>
          <a href="">lupa password</a>
        </br>
      <label class="text-left">belum punya akun ? <a href="register.php">Klik disini</a></label>
        </div>
      </form>
    </div>
  </div>
</div>