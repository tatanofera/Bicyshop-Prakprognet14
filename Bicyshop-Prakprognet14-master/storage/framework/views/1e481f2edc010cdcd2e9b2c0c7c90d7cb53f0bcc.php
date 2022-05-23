

<?php $__env->startSection('title', 'BicyShop | Dashboard'); ?>

<?php $__env->startSection('body'); ?>

<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <h1 class="text-center">BICYSHOP</h1>
            <p class="text-center">Dashboard Admin</p>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a class="text-sm mb-0 text-capitalize font-weight-bold" href="<?php echo e(route('product')); ?>">Product</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($daftar_produk); ?>

                                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a class="text-sm mb-0 text-capitalize font-weight-bold" href="<?php echo e(route('product-categories')); ?>">Category</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($daftar_kategori); ?>

                                        <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a class="text-sm mb-0 text-capitalize font-weight-bold" href="<?php echo e(route('discount')); ?>">Discount</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($daftar_diskon); ?>

                                        <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a class="text-sm mb-0 text-capitalize font-weight-bold" href="<?php echo e(route('courier')); ?>">Courier</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($daftar_kurir); ?>

                                        <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Theny\OneDrive\Documents\kuliah\smt4\Praktikum Prognet\Bicyshop-Prakprognet14-master\resources\views/admin/dashboard-new.blade.php ENDPATH**/ ?>