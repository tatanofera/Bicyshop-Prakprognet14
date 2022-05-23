

<?php if(auth()->guard('admin')->check()): ?>
<?php $__env->startSection('title', 'Admin | Transaksi'); ?>
<?php endif; ?>

<?php if(auth()->guard('user')->check()): ?>
<?php $__env->startSection('title', 'Toko Buku | Transaksi'); ?>
<?php endif; ?>

<?php if(auth()->guard('user')->check()): ?>
<?php $__env->startSection('body'); ?>
<?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('transaksi-detail', $transactions->id)); ?>">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo e($transactions->status); ?></h4>
            <h6 class="card-subtitle mb-3 mt-2 text-muted">Tanggal&nbsp;:&nbsp;<?php echo e($transactions->created_at->format('Y-m-d')); ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Rp.<?php echo e($transactions->total); ?></h6>
            <?php if($transactions->status == "menunggu bukti pembayaran"): ?>
            <div class="form-inline">
                <p class="card-text">Countdown&nbsp;:&nbsp;<?php echo e($interval[$loop->index]); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php if(auth()->guard('admin')->check()): ?>
<?php $__env->startSection('body'); ?>
<table class="table table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th class="text-center" style="width: 50px;">No</th>
            <th class="text-center" style="width: 200px;">Nama User</th>
            <th class="text-center" style="width: 300px;">Status</th>
            <th class="text-center" style="width: 300px;">Tanggal</th>
            <th class="text-center" style="width: 300px;">Total</th>
            <th class="text-center" style="width: 100px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th class="text-center"> <?php echo e($loop->index+1+($transaction->currentPage()-1)*10); ?></th>
            <td class="text-center"><?php echo e($transactions->user->name); ?></td>
            <td><?php echo e($transactions->status); ?></td>
            <td class="text-center"><?php echo e($transactions->created_at); ?></td>
            <td class="text-center">Rp.<?php echo e($transactions->total); ?></td>
            <td class="text-center">
                <a type="button" class="btn btn-primary text-white" href="<?php echo e(route('adm-transaksi-detail', $transactions->id)); ?>">Ubah Status</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($transaction->links()); ?>

<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Theny\OneDrive\Documents\kuliah\smt4\Praktikum Prognet\Bicyshop-Prakprognet14-master\resources\views/transaksi/transaksi.blade.php ENDPATH**/ ?>