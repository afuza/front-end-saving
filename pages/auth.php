<?php
$tittle = "Login key";
$key = "login";
include('views/up/Meta.php'); ?>

<!-- login page start-->
<section>         </section>
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">
          <div class="login-card">
            <form class="theme-form login-form">
              <h4>Login Key</h4>
              <h6>Welcome back! Log in to your account.</h6>
              <div class="form-group">
                <label class="mb-3">Input Key Access</label>
                <div class="input-group"><span class="input-group-text"><i class="fa fa-key"></i></span>
                  <input class="form-control" type="email" required="" placeholder="Anc7123skdakjwhek1j2a">
                </div>
              </div>     
              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- login page end-->
<?php include('views/down/Footer.php'); ?>