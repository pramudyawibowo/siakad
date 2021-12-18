
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Sistem Informasi Akademik Sekolah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
  <link rel="shrotcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
</head>
<body class="hold-transition login-page" style="background-image: url('<?php echo e(asset("img/wallup.jpg")); ?>'); background-size: cover; background-attachment: fixed;">
  <div class="login-box">
   
    <div class="login-logo" style="color: white;">
      <?php echo $__env->yieldContent('page'); ?>
    </div>

    <div class="card">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
   </div>

<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<!-- page script -->
<script>
  $(document).ready(function(){
      $('#role').change(function(){
          var kel = $('#role option:selected').val();
          if (kel == "Guru") {
            $("#noId").addClass("mb-3");
            $("#noId").html(`
              <input id="nomer" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control <?php $__errorArgs = ['nomer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
              `);
            $("#pesan").html(`
              <?php $__errorArgs = ['nomer'];
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
            `);
          } else if(kel == "Siswa") {
            $("#noId").addClass("mb-3");
            $("#noId").html(`
              <input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            `);
            $("#pesan").html(`
              <?php $__errorArgs = ['nomer'];
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
            `);
          } else {
            $('#noId').removeClass("mb-3");
            $('#noId').html('');
          }
      });
  });
  function inputAngka(e) {
    var charCode = (e.which) ? e.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
    return true;
  }
</script>
<?php echo $__env->yieldContent('script'); ?>

<?php $__errorArgs = ['id_card'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Guru");
  </script>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__errorArgs = ['guru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <script>
    toastr.error("Maaf Guru ini sudah terdaftar sebagai User!");
  </script>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__errorArgs = ['no_induk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Siswa");
  </script>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__errorArgs = ['siswa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <script>
    toastr.error("Maaf Siswa ini sudah terdaftar sebagai User!");
  </script>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php if(session('status')): ?>
  <script>
    toastr.success("<?php echo e(Session('success')); ?>");
  </script>
<?php endif; ?>
<?php if(Session::has('error')): ?>
    <script>
        toastr.error("<?php echo e(Session('error')); ?>");
    </script>
<?php endif; ?>

</body>
</html>
<?php /**PATH /Users/fai/Documents/siakad-smk/resources/views/layouts/app.blade.php ENDPATH**/ ?>