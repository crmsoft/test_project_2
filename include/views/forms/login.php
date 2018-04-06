<form action="/post/login" method="post">

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail</label>

        <div class="col-md-6">
            <input id="email" type="email" value="admin@admin.com" class="form-control <?php echo filed_error_class('email'); ?>" name="email" required autofocus>

            <span class="invalid-feedback">
                <strong><?php echo get_field_error('email'); ?></strong>
            </span>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            <input id="email" type="password" value="password" class="form-control <?php echo filed_error_class('password'); ?>" name="password" required>

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