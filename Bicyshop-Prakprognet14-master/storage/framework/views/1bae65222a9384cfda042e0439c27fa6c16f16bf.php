

<?php $__env->startSection('title', 'BicyShop | List Trash Discount'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST TRASH DISCOUNT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="<?php echo e(route('discount')); ?>">Back</a>
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
                <tr class="text-center">
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentage</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $products = App\Models\Product::onlyTrashed()->where('id', '=', $discount->product_id)->get();
                $product = App\Models\Product::onlyTrashed()->where('id', '=', $discount->product_id)->first();
                $product_count = $products->count();
                ?>
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs"><?php echo e($loop->index+1); ?></h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0"><?php echo e($discount->start); ?></span>
                    </td>
                    <td>
                        <span class="text-dark text-xs"><?php echo e($discount->end); ?></span>
                    </td>
                    <?php if(!empty($product_count)): ?>
                    <td>
                        <span class="text-xs font-weight-bold mb-0"><?php echo e($product->product_name); ?></span>
                    </td>
                    <?php else: ?>
                    <td>
                        <span class="text-xs font-weight-bold mb-0"><?php echo e($discount->Product->product_name); ?></span>
                    </td>
                    <?php endif; ?>
                    <td>
                        <span class="text-dark text-xs"><?php echo e($discount->percentage); ?>%</span>
                    </td>
                    <td class="align-middle">
                        <form action="<?php echo e(route('discount-delete-permanently', $discount->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php if(empty($product_count)): ?>
                            <a type="button" class="btn btn-primary" href="<?php echo e(route('discount-restore', $discount->id)); ?>">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <span> Restore</span>
                            </a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-trash3"></i>
                                <span> Delete</span>
                            </button>
                            <?php else: ?>
                            <button type="button" class="btn btn-warning">
                                <i class="bi bi-info-circle"></i>
                                <span> Restore Product</span>
                            </button>
                            <?php endif; ?>
                            <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-trash3"></i>
                                <span> Delete</span>
                            </button> -->
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/discount/discount-trash.blade.php ENDPATH**/ ?>