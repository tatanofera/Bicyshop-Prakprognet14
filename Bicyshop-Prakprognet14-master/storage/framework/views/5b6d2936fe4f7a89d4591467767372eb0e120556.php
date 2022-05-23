

<?php $__env->startSection('title', 'BicyShop | List Trash Categories'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST TRASH CATEGORIES</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="<?php echo e(route('product-categories')); ?>">Back</a>
            </div>
        </div>
    </div>
    <?php if($message = Session::get('success')): ?>
    <div class="p-3 pt-0">
        <div class="alert alert-success" role="alert">
            <strong><?php echo e($message); ?></strong>
        </div>
    </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-striped align-items-center mb-0 mx-2 my-2">
            <thead>
                <tr>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs"><?php echo e($loop->index+1); ?></h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0"><?php echo e($product_category->category_name); ?></span>
                    </td>
                    <td class="align-middle">
                        <form action="<?php echo e(route('product-categories-delete-permanently', $product_category->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <a type="button" class="btn btn-primary" href="<?php echo e(route('product-categories-restore', $product_category->id)); ?>">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <span> Restore</span>
                            </a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-trash3"></i>
                                <span> Delete</span>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/product_categories/product-categories-trash.blade.php ENDPATH**/ ?>