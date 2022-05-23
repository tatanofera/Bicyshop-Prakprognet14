<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Verifikasi Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="<?php echo e(asset('assets_login_register/https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap')); ?>" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo e(asset('assets_login_register/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')); ?>">
	
	<link rel="stylesheet" href="<?php echo e(asset('assets_login_register/css/style.css')); ?>">

</head>

<body> 
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(<?php echo e(asset('assets_login_register/images/Logo.jpeg)')); ?>;">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Verifikasi Email</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if(session('resent')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(__('Link untuk verifikasi email telah dikirim.')); ?>

                                    </div>
                                <?php endif; ?>

                                <?php echo e(__('Periksalah inbox email Anda untuk melakukan verifikasi, setelahnya Anda dapat langsung login.')); ?>

                                <?php echo e(__('Belum menerima email?')); ?>

                                <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><?php echo e(__('Klik di sini')); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
    
    

<?php /**PATH C:\Users\Theny\OneDrive\Documents\kuliah\smt4\Praktikum Prognet\Bicyshop-Prakprognet14-master\resources\views/auth/verify.blade.php ENDPATH**/ ?>