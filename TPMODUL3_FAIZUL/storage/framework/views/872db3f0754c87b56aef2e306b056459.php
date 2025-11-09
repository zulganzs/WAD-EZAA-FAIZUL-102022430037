<?php $__env->startSection('title', 'Daftar Kucing'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center mb-4">
        <h1 class="cat-title">🐾 Daftar Kucing Peliharaan 🐾</h1>
        <p class="cat-subtitle">Klik nama kucing untuk melihat detailnya</p>
    </div>

    <div class="row justify-content-center">
        <!--1. Buat perulangan foreach untuk menampung informasi setiap kucing-->
        <?php $__currentLoopData = $kucings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kucing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-3">
            <div class="cat-card text-center">
                <h4><?php echo e($kucing->nama_kucing); ?></h4>
                <p class="text-muted"><?php echo e($kucing->ras); ?></p>
                <!--4. Isi value untuk atribut href agar mendirect ke halaman detail kucing yang dipilih-->
                <a href="<?php echo e(url('/kucing/' . $kucing->id)); ?>" class="btn btn-custom btn-sm">Lihat Detail</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Zul\Desktop\TP_Modul3\resources\views/DaftarKucing.blade.php ENDPATH**/ ?>