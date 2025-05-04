<?php if (isset($_SESSION['messageError'])): ?>
    <div class="alert alert-danger alert-dismissible fade show text-center position-fixed top-0 start-50 translate-middle-x mt-3" role="alert" style="z-index: 9999; width: 50%;">
        <?= htmlspecialchars($_SESSION['messageError']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    <?php unset($_SESSION['messageError']); ?>
<?php endif; ?>