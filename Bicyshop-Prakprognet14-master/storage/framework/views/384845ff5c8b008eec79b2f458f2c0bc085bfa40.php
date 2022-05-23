<!-- ** Header Area Start ** -->
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ** Logo Start ** -->
                        <a href="<?php echo e(route('landing')); ?>" class="logo">
                            <img src="assets/images/Logo.jpeg" style="width: 80px; height: 80px">
                        </a>
                        <!-- ** Logo End ** -->
                        <!-- ** Menu Start ** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#men">Men's</a></li>
                            <li class="scroll-to-section"><a href="#women">Women's</a></li>
                            <li class="scroll-to-section"><a href="#kids">Kid's</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>
                          <div class="col-20">
                            <li class="submenu">  
                                <a href="javascript:;">
                                <?php echo e(Auth::user()->user_name); ?>

                                </a>
                                <ul>
                                    <li><a href="<?php echo e(route('userprofile')); ?>">Profile</a></li>
                                    <li><a href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout
                                    </a></li>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                      <?php echo csrf_field(); ?>
                                    </form>
                                </ul>
                              </li>
                          </div>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ** Menu End ** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ** Header Area End ** --><?php /**PATH C:\Users\ASUS\Documents\KULIAH\TUGAS KULIAH\SMT 4\Praktikum Pemrograman Internet\Kelompok\V2\Bicyshop-Prakprognet14-master\resources\views/layouts/menu.blade.php ENDPATH**/ ?>