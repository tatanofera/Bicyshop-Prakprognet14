

<?php $__env->startSection('title', 'Toko Buku | Alamat'); ?>

<?php $__env->startSection('body'); ?>
<form method="post" action="<?php echo e(route('beli-checkout', ['id' => $id, 'jumlah' => $jumlah])); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(Auth::guard('user')->user()->name); ?></h4>
            <div class="form-group">
                <label>Provinsi</label>
                <select class="form-control" id="provinsi" name="province">
                    <?php $__currentLoopData = $province["rajaongkir"]["results"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provinces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="<?php echo e($provinces['province_id']); ?>" value="<?php echo e($provinces['province_id']); ?>|<?php echo e($provinces['province']); ?>"><?php echo e($provinces["province"]); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kota</label>
                <select class="form-control <?php $__errorArgs = ['regency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="kota" name="regency" required>
                    <option selected value="">Pilih Kabupaten</option>
                    <?php $__currentLoopData = $city["rajaongkir"]["results"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="<?php echo e($citys['province_id']); ?>" value="<?php echo e($citys['city_id']); ?>|<?php echo e($citys['city_name']); ?>"><?php echo e($citys["city_name"]); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['regency'];
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
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Alamat" required spellcheck="false">
                <?php $__errorArgs = ['address'];
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
            <div class="form-group">
                <label>Pilih Kurir</label>
                <select class="form-control <?php $__errorArgs = ['courier_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="courier_id" id="kurir" required>
                    <option selected value="">Pilih Kurir</option>
                    <?php $__currentLoopData = $kurir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kurirs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="<?php echo e($kurirs->courier); ?>" value="<?php echo e($kurirs->id); ?>"><?php echo e($kurirs->courier); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['courier_id'];
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
        </div>
        <div class="d-grid mt-3 mx-3 mb-3">
            <button type="submit" class="btn btn-primary">Selanjutnya</button>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('#kota').on('click', function() {
        $("#kota option").each(function() {
            if ($(this).attr("id") == $('#provinsi').children(":selected").attr("id")) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    $('#provinsi').on('click', function() {
        $("#kota option").each(function() {
            if ($(this).attr("id") == $('#provinsi').children(":selected").attr("id")) {
                $(this).show();
                $(this).prop('selected', true);
            } else {
                $(this).hide();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Theny\OneDrive\Documents\kuliah\smt4\Praktikum Prognet\Bicyshop-Prakprognet14-master\resources\views/transaksi/beli-alamat.blade.php ENDPATH**/ ?>