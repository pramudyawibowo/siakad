<?php $__env->startSection('page', 'Login Authentication'); ?>
<?php $__env->startSection('content'); ?>
<div class="card-body login-card-body">
  <p class="login-box-msg">Sign in to start your session</p>

  <form action="<?php echo e(route('login')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="input-group mb-3">
      <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('E-Mail Address')); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="off" autofocus>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
          <strong><?php echo e($message); ?></strong>
        </span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="input-group mb-3">
      <input id="password" type="password" placeholder="<?php echo e(__('Password')); ?>" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password" disabled>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
          <strong><?php echo e($message); ?></strong>
        </span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="row mb-1">
      <div class="col-7">
        <div class="icheck-primary">
          <input type="checkbox" id="remember" class="form-check-input" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> disabled>
          <label for="remember">
            <?php echo e(__('Remember Me')); ?>

          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-5">
        <button type="submit" id="btn-login"class="btn btn-primary btn-block" disabled><?php echo e(__('Login')); ?> &nbsp; <i class="nav-icon fas fa-sign-in-alt"></i></button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <p class="mb-1">
    <?php if(Route::has('password.request')): ?>
      <a class="text-center" href="<?php echo e(route('password.request')); ?>">
        <?php echo e(__('Lupa Password?')); ?>

      </a>
    <?php endif; ?>
  </p>
  <p class="mb-0">
    <a class="text-center" href="<?php echo e(route('register')); ?>">Buat Akun Baru</a>
  </p>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script>
    $("#email").keyup(function(){
        var email = $("#email").val();

        if (email.length >= 5){
          $.ajax({
              type:"GET",
              data: {
                  email : email
              },
              dataType:"JSON",
              url:"<?php echo e(url('/login/cek_email/json')); ?>",
              success:function(data){
                if (data.success) {
                  $("#email").removeClass("is-invalid");
                  $("#email").addClass("is-valid");
                  $("#password").val('');
                  $("#password").removeAttr("disabled", "disabled");
                } else {
                  $("#email").removeClass("is-valid");
                  $("#email").addClass("is-invalid");
                  $("#password").val('');
                  $("#password").attr("disabled", "disabled");
                  $("#remember").attr("disabled", "disabled");
                  $("#btn-login").attr("disabled", "disabled");
                }
              },
              error:function(){
              }
          });
        } else {
          $("#email").removeClass("is-valid");
          $("#email").removeClass("is-invalid");
          $("#password").val('');
          $("#password").attr("disabled", "disabled");
          $("#remember").attr("disabled", "disabled");
          $("#btn-login").attr("disabled", "disabled");
        }
    });

    $("#password").keyup(function(){
        var email = $("#email").val();
        var password = $("#password").val();

        if (password.length >= 8){
          $.ajax({
              type:"GET",
              data: {
                  email : email,
                  password : password
              },
              dataType:"JSON",
              url:"<?php echo e(url('/login/cek_password/json')); ?>",
              success:function(data){
                if (data.success) {
                  $("#password").removeClass("is-invalid");
                  $("#password").addClass("is-valid");
                  $("#remember").removeAttr("disabled", "disabled");
                  $("#btn-login").removeAttr("disabled", "disabled");
                } else {
                  $("#password").removeClass("is-valid");
                  $("#password").addClass("is-invalid");
                  $("#remember").attr("disabled", "disabled");
                  $("#btn-login").attr("disabled", "disabled");
                }
              },
              error:function(){
              }
          });
        } else {
          $("#password").removeClass("is-valid");
          $("#password").removeClass("is-invalid");
          $("#remember").attr("disabled", "disabled");
          $("#btn-login").attr("disabled", "disabled");
        }
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fai/Documents/siakad-smk/resources/views/auth/login.blade.php ENDPATH**/ ?>