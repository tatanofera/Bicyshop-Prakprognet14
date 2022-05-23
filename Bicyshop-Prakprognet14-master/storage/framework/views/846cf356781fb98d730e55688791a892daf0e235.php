<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo e(asset('assets_login_register/https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets_login_register/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets_login_register/css/style.css')); ?>">

</head>

<body>
    <section class="ftco-section">
        <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-warning"><?php echo e($error); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if($message = Session::get('error')): ?>
        <div class="alert alert-warning">
            <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(<?php echo e(asset('assets/images/Logo.jpeg)')); ?>;">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Login</h3>
                                </div>
                            </div>
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <p></p>
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                                    <?php if(Route::has('password.request')): ?>
                                    <a class="w-50 text-md-right" href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                                    <?php endif; ?>
                                    <p>Don't have an account? <a class="text-primary w-50 text-md-right" href="<?php echo e(route('register')); ?>">Register now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html<?php /**PATH C:\Users\Theny\OneDrive\Documents\kuliah\smt4\Praktikum Prognet\Bicyshop-Prakprognet14-master\resources\views/auth/login.blade.php ENDPATH**/ ?>