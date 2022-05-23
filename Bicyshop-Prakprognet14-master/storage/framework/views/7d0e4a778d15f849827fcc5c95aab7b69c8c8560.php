

<?php $__env->startSection('title', 'BicyShop | Add Courier'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h1 class="mb-0">ADD COURIER</h1>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="<?php echo e(route('courier')); ?>">Back</a>
            </div>
        </div>
    </div>
    <form action=" <?php echo e(route('courier-add-submit')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row mt-3">
            <div class="p-5 pt-0 pb-3">
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </div>
                <?php endif; ?>
                <div class="form-group mb-0">
                    <label for="courier" class="form-control-label">Courier</label>
                    <input class="form-control <?php $__errorArgs = ['courier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e(old('courier')); ?>" placeholder="Masukkan kurir" id="courier" name="courier">
                    <?php $__errorArgs = ['courier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="text-center pt-4">
                    <button type="submit" class="btn btn-primary btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/courier/courier-add.blade.php ENDPATH**/ ?>