

<?php $__env->startSection('title', 'BicyShop | Detail Product'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">DETAIL PRODUCT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="<?php echo e(route('product')); ?>">Back</a>
            </div>
        </div>
    </div>
    <div class="container mb-2 mt-4">
        <div class="row p-5 ps-3 pt-0 pb-0 mb-0">
            <div class="col-4 mt-4">
                <?php if(!empty($count_product_images)): ?>
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key >0): ?>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo e($key); ?>" aria-label="Slide <?php echo e($key); ?>"></button>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li> -->
                    </div>
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                            <img src="<?php echo e(asset('storage/'.$slider->image_name)); ?>" class="img-fluid shadow border-radius-lg" style="width: 400px; height: 400px;" alt="...">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <!-- <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
                </div>
                <?php else: ?>
                <div class="thumbnail text-center">
                    <img class="img-fluid shadow border-radius-lg" src="../assets_admin/img/no_image.png" alt="..." style="width: 300px; height: 300px;">
                </div>
                <?php endif; ?>
                <!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                            <img src="<?php echo e(asset('storage/'.$slider->image_name)); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" style="width:auto height fit-content">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> -->
                <p class="text-center bold"><strong>Image Product : <?php echo e($products->product_name); ?></strong></p>
                <!-- <?php $__empty_1 = true; $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="row">
                    <form action="<?php echo e(route('product-image-delete', $product_image->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="thumbnail">
                            <img class="img-fluid-left img-thumbnail" src="<?php echo e(asset('storage/'.$product_image->image_name)); ?>" alt="" style="width:100%; height:100%;">
                        </div>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                            <i class="bi bi-backspace"></i>
                    </form>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-6 align-items-center">
                    <h3 class="mb-0">Tidak Ada Foto</h3>
                </div>
                <?php endif; ?> -->
            </div>
            <div class="col-8 mb-5">
                <label for="product_name" class="form-control-label">Product Name</label>
                <input class="form-control" type="text" value="<?php echo e($products->product_name); ?>" id="product_name" name="product_name" readonly>
                <div class="col">
                    <label for="category_id" class="form-control-label">Category</label>
                    <input class="form-control" type="text" value="<?php echo e($det_categories->Product_categories->category_name); ?>" rows="3" id="category_id" name="category_id" readonly>
                </div>
                <div class="row">
                    <div class="">
                        <label for="price" class="form-control-label">Price</label>
                        <input class="form-control" type="text" value="Rp.<?php echo e($products->price); ?>" id="price" name="price" readonly>
                    </div>
                </div>
                <div class="col">
                    <label for="description" class="form-control-label">Description</label>
                    <textarea class="form-control" type="text" value="<?php echo e($products->description); ?>" rows="3" id="description" name="description" readonly><?php echo e($products->description); ?></textarea>
                </div>
                <div class="col">
                    <label for="stock" class="form-control-label">Stock</label>
                    <input class="form-control" type="text" value="<?php echo e($products->stock); ?> pcs" id="stock" name="stock" readonly>
                </div>
                <div class="col">
                    <label for="weight" class="form-control-label">Weight</label>
                    <input class="form-control" type="text" value="<?php echo e($products->weight); ?> kg" id="weight" name="weight" readonly>
                </div>
            </div>
        </div>
        <?php if(empty($discount)): ?>
        <div class="table-responsive">
            <table class="table table-striped align-items-center mb-0">
                <label class="" for="discount">Product Discount</label>
                <thead>
                    <tr class="text-center">
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center">
                        <td>
                            <div>
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs"><?php echo e($loop->index+1+($discounts->currentPage()-1)*5); ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold mb-0"><?php echo e($discount->start); ?></span>
                        </td>
                        <td>
                            <span class="text-dark text-xs"><?php echo e($discount->end); ?></span>
                        </td>
                        <td>
                            <span class="text-dark text-xs"><?php echo e($discount->percentage); ?>%</span>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <?php echo e($discounts->links()); ?>

            </table>
        </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped align-items-center mb-0">
                <label class="" for="discount">Product Discount</label>
                <thead>
                    <tr class="text-center">
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>
                            <div>
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">-</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold mb-0">-</span>
                        </td>
                        <td>
                            <span class="text-dark text-xs">-</span>
                        </td>
                        <td>
                            <span class="text-dark text-xs">-</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        <br><br>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/product/product-detail.blade.php ENDPATH**/ ?>