<div class="model">
    <!-- Login modal -->
    <div id="login-modal">
      <!-- Login Form -->
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Login to Superio</h3>
          <!--Login Form-->
          <form method="post" action="https://creativelayers.net/themes/superio/add-parcel.html">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input id="password-field" type="password" name="password" value="" placeholder="Password">
            </div>
  
            <div class="form-group">
              <div class="field-outer">
                <div class="input-group checkboxes square">
                  <input type="checkbox" name="remember-me" value="" id="remember">
                  <label for="remember" class="remember"><span class="custom-checkbox"></span> Remember me</label>
                </div>
                <a href="#" class="pwd">Forgot password?</a>
              </div>
            </div>
  
            <div class="form-group">
              <button class="theme-btn btn-style-one" type="submit" name="log-in">Log In</button>
            </div>
          </form>
  
          <div class="bottom-box">
            <div class="text">Don't have an account? <a href="register-popup.html" class="call-modal signup">Signup</a></div>
            <div class="divider"><span>or</span></div>
            <div class="btn-box row">
              <div class="col-lg-6 col-md-12">
                <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
              </div>
              <div class="col-lg-6 col-md-12">
                <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Login Form -->
    </div>
    <!-- End Login Module -->
  
    <script type="text/javascript">
      // Open modal in AJAX callback
      jQuery('.call-modal.signup').on('click', function(event) {
        event.preventDefault();
        this.blur();
        jQuery.get(this.href, function(html) {
          jQuery(html).appendTo('body').modal({
            fadeDuration: 300,
            fadeDelay: 0.15
          });
        });
      });
    </script>
  </div>