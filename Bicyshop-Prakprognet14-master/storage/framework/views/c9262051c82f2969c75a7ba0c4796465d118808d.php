

<?php $__env->startSection('title', 'BicyShop | Daftar Barang'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h1 class="mb-0">DAFTAR BARANG</h1>
            </div>
            <div class="col-4 text-end">
                <a type="button" href="" class="btn btn-sm btn-primary text-white">Tambah</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product Name</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produt Rate</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Weight</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/barang.blade.php ENDPATH**/ ?>