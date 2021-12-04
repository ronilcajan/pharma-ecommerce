<div class="site-section">
      <div class="container">
            <div class="row">
                  <div class="col-md-12">
                        <h2 class="h3 text-black">Register Here</h2>
                        <p><?php echo lang('create_user_subheading'); ?></p>
                  </div>
                  <div class="col-md-12">
                        <div id="infoMessage"><?php echo $message; ?></div>
                        <form action="<?= site_url('register') ?>" method="post">
                              <div class="p-3 p-lg-5 border">
                                    <div class="form-group row">
                                          <div class="col-md-6">
                                                <label for="c_fname" class="text-black"><?php echo lang('create_user_fname_label', 'first_name'); ?> <span class="text-danger">*</span></label>
                                                <?php echo form_input($first_name); ?>
                                          </div>
                                          <div class="col-md-6">
                                                <label for="c_lname" class="text-black"><?php echo lang('create_user_lname_label', 'last_name'); ?> <span class="text-danger">*</span></label>
                                                <?php echo form_input($last_name); ?>
                                          </div>
                                    </div>

                                    <div class="form-group row">
                                          <div class="col-md-6">
                                                <label for="phone" class="text-black"><?php echo lang('create_user_identity_label', 'identity'); ?> <span class="text-danger">*</span></label>
                                                <?php echo form_input($identity); ?>
                                          </div>
                                          <div class="col-md-6">
                                                <label for="email" class="text-black"><?php echo lang('create_user_email_label', 'email'); ?> <span class="text-danger">*</span></label>
                                                <?php echo form_input($email); ?>
                                          </div>

                                    </div>
                                    <div class="form-group row">
                                          <div class="col-md-6">
                                                <div class="form-group">
                                                      <label for="c_email" class="text-black"> <?php echo lang('create_user_company_label', 'company'); ?> </label>
                                                      <?php echo form_input($company); ?>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <label for="phone" class="text-black"><?php echo lang('create_user_phone_label', 'phone'); ?> <span class="text-danger">*</span></label>
                                                <?php echo form_input($phone); ?>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <div class="col-md-6">
                                                <label for="purok" class="text-black">Purok <span class="text-danger">*</span></label>
                                                <?php echo form_input($purok); ?>
                                          </div>
                                          <div class="col-md-6">
                                                <label for="barangay" class="text-black">Barangay <span class="text-danger">*</span></label>
                                                <?php echo form_input($barangay); ?>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <div class="col-md-6">
                                                <label for="city" class="text-black">City/Municipality<span class="text-danger">*</span></label>
                                                <?php echo form_input($city); ?>
                                          </div>
                                          <div class="col-md-6">
                                                <label for="province" class="text-black">Province <span class="text-danger">*</span></label>
                                                <?php echo form_input($province); ?>
                                          </div>
                                    </div>
                                    <div class="form-group row mb-5">
                                          <div class="col-md-6">
                                                <label for="password" class="text-black"> <?php echo lang('create_user_password_label', 'password'); ?><span class="text-danger">*</span></label>
                                                <?php echo form_input($password); ?>
                                                <span toggle="#password" class="field-icon toggle-password icon-eye"></span>
                                          </div>
                                          <div class="col-md-6">
                                                <label for="password_confirm" class="text-black"> <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <span class="text-danger">*</span></label>
                                                <?php echo form_input($password_confirm); ?>
                                                <span toggle="#password_confirm" class="field-icon toggle-password icon-eye"></span>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <div class="col-lg-12">
                                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Create Account">
                                          </div>
                                    </div>
                              </div>
                        </form>
                  </div>

            </div>
      </div>
</div>