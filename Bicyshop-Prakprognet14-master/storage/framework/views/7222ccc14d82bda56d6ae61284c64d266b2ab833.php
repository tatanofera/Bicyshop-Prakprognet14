

<?php $__env->startSection('title', 'BicyShop | List Product Categories'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h1 class="mb-0">LIST PRODUCT CATEGORIES</h1>
            </div>
            <div class="col-4 text-end">
                <a type="button" href="<?php echo e(route('product-categories-add')); ?>" class="btn btn-sm btn-primary text-white">Add</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>
                        1
                    </td>
                    <td>
                        Sepeda Gunung
                    </td>
                    <td>
                        <button type="button" class="btn btn-success">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class="bi bi-backspace"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/product-categories.blade.php ENDPATH**/ ?>