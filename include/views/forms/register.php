<form action="/post/register" method="post">

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">Name</label>

        <div class="col-md-6">
            <input id="email" type="text" value="<?php echo field_value('first_name'); ?>" class="form-control <?php echo filed_error_class('first_name'); ?>" name="first_name" autofocus>

            <span class="invalid-feedback">
                <strong><?php echo get_field_error('first_name'); ?></strong>
            </span>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">Surname</label>

        <div class="col-md-6">
            <input id="email" type="text" value="<?php echo field_value('last_name'); ?>" class="form-control <?php echo filed_error_class('last_name'); ?>" name="last_name" autofocus>

            <span class="invalid-feedback">
                <strong><?php echo get_field_error('last_name'); ?></strong>
            </span>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">Phone</label>

        <div class="col-md-6">
            <input id="email" type="text" value="<?php echo field_value('phone'); ?>" class="form-control <?php echo filed_error_class('phone'); ?>" name="phone" autofocus>

            <span class="invalid-feedback">
                <strong><?php echo get_field_error('phone'); ?></strong>
            </span>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail</label>

        <div class="col-md-6">
            <input id="email" type="email" value="<?php echo field_value('email'); ?>" class="form-control <?php echo filed_error_class('email'); ?>" name="email" autofocus>

            <span class="invalid-feedback">
                <strong><?php echo get_field_error('email'); ?></strong>
            </span>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            <input id="email" type="password" value="" class="form-control <?php echo filed_error_class('password'); ?>" name="password">

            <span class="invalid-feedback">
                <strong><?php echo get_field_error('password'); ?></strong>
            </span>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
    </div>

</form>