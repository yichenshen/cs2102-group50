<div class="container">
  <br/>
  <div class="row">
    <div class="col l8 offset-l2 m12">
      <form action="/login/login" method="post">
        <div class="card">
          <div class="card-image primary-700 darken-2">
            <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" height="130"/>
            <span class="card-title"><h3>Welcome back!</h3></span>
          </div>
          <div class="card-content">
            <div class="row">
              <?php if (isset($error)) { ?>
                <div class="input-field col l10 offset-l1 m12">
                  <?php include APP . 'view/error/_card.php' ?>
                  <br />
                </div>
              <?php } ?>
              <div class="input-field col l10 offset-l1 m12">
                <i class="material-icons prefix">account_circle</i>
                <input id="name" name="name" type="text" class="validate"
                       value="<?php echo isset($name) ? $name : ''; ?>">
                <label for="name">Name</label>
              </div>
              <div class="input-field col l10 offset-l1 m12">
                <i class="material-icons prefix">email</i>
                <input id="email" name="email" type="text" class="validate"
                       value="<?php echo isset($email) ? $email : ''; ?>">
                <label for="email">Email</label>
              </div>
              <div class="input-field col l5 offset-l1 m12">
                <i class="material-icons prefix">lock</i>
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
              <div class="input-field col l5 m12">
                <i class="material-icons prefix">lock_outline</i>
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password Confirmation</label>
              </div>
            </div>
            <br/>
            <div class="card-action">
              <button class="btn btn-large btn-large waves-effect waves-light secondary-accent right" type="submit"
                      name="action">
                Sign Up
              </button>
              <br/>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div
  </div>
</div>

