

<?php $__env->startSection('title', 'BicyShop | Edit Product'); ?>

<?php $__env->startSection('body'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">EDIT PRODUCT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="<?php echo e(route('product')); ?>">Back</a>
            </div>
        </div>
    </div>
    <form action=" <?php echo e(route('product-edit-submit', $products->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row mt-3">
            <div class="p-5 pt-0">
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </div>
                <?php endif; ?>
                <div class="form-group mb-3">
                    <label for="product_name" class="form-control-label">Product Name</label>
                    <input class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e($products->product_name); ?>" placeholder="Masukkan nama produk" id="product_name" name="product_name">
                    <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="category_id" class="form-control-label">Category</label>
                    <input class="form-control <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" value="<?php echo e($det_categories->Product_categories->category_name); ?>" placeholder="Masukkan nama produk" id="category_id" name="category_id" disabled>
                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div> -->
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select class="form-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="category_id" name="category_id" value="">
                        <option selected disabled>Pilih kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->category_name); ?></option>
                        <!-- <?php if(!old('category_name')): ?>
                        <option class="" value="<?php echo e($value->id); ?>"><?php echo e($value->category_name); ?></option>
                        <?php elseif(old('category_name') && old('category_name')==$value->id): ?>
                        <option class="" value="<?php echo e(old('category_name')); ?>" selected><?php echo e($value->category_name); ?></option>
                        <?php else: ?>
                        <option class="" value="<?php echo e($value->id); ?>"><?php echo e($value->category_name); ?></option>
                        <?php endif; ?> -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="row">
                    <div class="col form-group mb-3">
                        <label for="price">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Amount (to the nearest dollar)" min="0" id="price" placeholder="Masukkan harga jual produk" name="price" value="<?php echo e($products->price); ?>">
                            <span class="input-group-text">.00</span>
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger invalid-feedback" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <strong><?php echo e($message); ?></strong>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col form-group mb-3">
                        <label for="stock" class="form-control-label">Stock</label>
                        <div class="input-group">
                            <input class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" min="0" id="stock" name="stock" value="<?php echo e($products->stock); ?>" placeholder="Masukkan stok produk">
                            <span class="input-group-text">pcs</span>
                        </div>
                        <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col form-group mb-3">
                        <label for="weight" class="form-control-label">Weight</label>
                        <div class="input-group">
                            <input class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" min="0" id="weight" name="weight" value="<?php echo e($products->weight); ?>" placeholder="Masukkan berat produk">
                            <span class="input-group-text">kg</span>
                        </div>
                        <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Amount (to the nearest dollar)" min="0" id="price" placeholder="Masukkan harga jual produk" name="price" value="<?php echo e($products->price); ?>">
                        <span class="input-group-text">.00</span>
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="stock" class="form-control-label">Stock</label>
                    <div class="input-group">
                        <input class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" min="0" id="stock" name="stock" value="<?php echo e($products->stock); ?>" placeholder="Masukkan stok produk">
                        <span class="input-group-text">pcs</span>
                    </div>
                    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="weight" class="form-control-label">Weight</label>
                    <div class="input-group">
                        <input class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" min="0" id="weight" name="weight" value="<?php echo e($products->weight); ?>" placeholder="Masukkan berat produk">
                        <span class="input-group-text">kg</span>
                    </div>
                    <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div> -->
                <div class="form-group mb-3 mt-3">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan deskripsi produk" id="description" name="description" rows="3"><?php echo e($products->description); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group mb-3">
                    <label class="" for="image_name">Add Image</label>
                    <div class="input-group mb-3 mt-2">
                        <input class="form-control <?php $__errorArgs = ['image_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image_name" name="image_name[]" type="file" value="" multiple>
                        <?php $__errorArgs = ['image_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="text-center pt-3">
                    <button type="submit" name="action" value="submit" class="btn btn-primary btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="p-5 pt-0">
            <label>Product Image</label>
            <div class="table-responsive">
                <table class="table table-striped align-items-center mb-0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="thumbnail">
                            <tr class="text-center">
                                <td>
                                    <h6 class="mb-0 text-xs"><?php echo e($loop->index+1); ?></h6>
                                </td>
                                <td>
                                    <img src="<?php echo e(asset('storage/'.$product_image->image_name)); ?>" alt="" style="width:100px; height:100px;">
                                </td>
                                <td>
                                    <form action="<?php echo e(route('product-image-delete', $product_image->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" name="action" value="delete-image" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                            <i class="bi bi-trash3"></i>
                                            <span> Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="thumbnail">
                            <tr class="text-center">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </div>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <!-- <?php if(empty($discount)): ?>
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
            <?php endif; ?> -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/admin/product/product-edit.blade.php ENDPATH**/ ?>