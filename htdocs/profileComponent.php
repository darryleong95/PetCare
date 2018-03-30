<div class="form-area profile">
  <div class="header-profile">
    <h2>Update your Profile</h2>
  </div>
  <form name="updateProfile_form" class="form-profile suForm form-horizontal form_font" method="POST" action="updateProfile_ps.php" onsubmit="return Validate()">
    <div class="form-group row">
      <label class="control-label col-sm-3" for="firstName">First name:</label>
      <div class="col-sm-9" id="firstName_div">
        <input class="form-control" id="firstName" type="text" name="firstName" value="<?= $_SESSION['firstName'] ?>" />
        <div id="firstName_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="lastName">Last name:</label>
      <div class="col-sm-9" id="lastName_div">
        <input class="form-control" id="lastName" type="text" name="lastName" value="<?= $_SESSION['lastName'] ?>" />
        <div id="lastName_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="email">Email:</label>
      <div class="col-sm-9" id="email_div">
        <input class="form-control" id="email" type="text" name="email" value="<?= $_SESSION['email'] ?>" disabled/>
        <div id="email_err"></div>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="password">Password:</label>
      <div class="col-sm-9" id="password_div">
        <input class="form-control" id="password" type="text" name="password" value="<?= $_SESSION['password'] ?>"/>
        <div id="password_err"></div>
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="address">Address:</label>
      <div class="col-sm-9" id="address_div">
        <input class="form-control" id="address" type="text" name="address" value="<?= $_SESSION['address'] ?>" />
        <div id="address_err"></div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-3" for="additionalInfo">Additional Information:</label>
      <div class="col-xs-8" id="additionalInfo_div">
        <textarea class="profile form-control" id="additionalInfo" name="additionalInfo"><?= $_SESSION['additionalInfo'] ?></textarea>
      </div>
    </div>
    <div class="sign_up_submit">
      <center>
        <input type="submit" name="submit" value="Update Profile" class="btn-profile"/>
      </center>
    </div>
  </form>
</div>
