<div class="row justify-content-center">
  <div class="col-sm-4">
    <div class="card">
      <h3>Login Pelanggan</h3>
      <div class="card-body">
        <form action="page/ceklogin.php" method="post">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Username</span>
              </div>
              <input class="form-control" id="username" type="text" name="username">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-user"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
              </div>
              <input class="form-control" id="password" type="password" name="password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-asterisk"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group form-actions">
            <button class="btn btn-sm btn-warning" type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>