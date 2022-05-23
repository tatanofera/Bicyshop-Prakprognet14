

<?php $__env->startSection('title', 'BicyShop | List Product'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST PRODUCT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" href="<?php echo e(route('product-add')); ?>" class="btn btn-sm btn-primary text-white">Add</a>
                <a type="button" href="<?php echo e(route('product-trash')); ?>" class="btn btn-sm btn-info text-white">Trash</a>
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
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product Name</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Weight</th>
                    <!-- <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th> -->
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs"><?php echo e($loop->index+1+($products->currentPage()-1)*5); ?></h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0"><?php echo e($product->product_name); ?></span>
                    </td>
                    <td>
                        <span class="text-dark text-xs">Rp.<?php echo e($product->price); ?></span>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0"><?php echo e($product->stock); ?> pcs</span>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0"><?php echo e($product->weight); ?> kg</span>
                    </td>
                    <!-- <td>
                        <p class="text-dark text-xs"><?php echo e($product->description); ?></p>
                    </td> -->
                    <td class="align-middle">
                        <form action="<?php echo e(route('product-delete', $product->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <a type="button" class="btn btn-success" href="<?php echo e(route('product-detail', $product->id)); ?>">
                                <i class="bi bi-box-arrow-in-down-right"></i>
                                <span> Detail</span>
                            </a>
                            <a type="button" class="btn btn-primary" href="<?php echo e(route('product-edit', $product->id)); ?>">
                                <i class="bi bi-pencil-square"></i>
                                <span> Edit</span>
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
        <div class="mt-2 mb-3 ms-3">
            <?php echo e($products->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/product/product.blade.php ENDPATH**/ ?>