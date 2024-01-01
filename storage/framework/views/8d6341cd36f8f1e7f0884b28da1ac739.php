

<?php $__env->startSection('title', 'Categorias'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active"><?php echo $__env->yieldContent('title'); ?></li>
                </ol>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="float-left">
                                <h2 class="mb-1 text-primary"><i class="fas fa-tag"></i> <?php echo $__env->yieldContent('title'); ?></h2>
                                <div class="text-muted fw-bold">
                                    <?php echo e($tableSize); ?> Kb <span class="mx-3">|</span>  <?php echo e(count($categories)); ?> registros
                                </div>
                            </div>
                            <div class="float-right">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary mx-3" data-placement="left">
                                    <i class="fas fa-plus-circle"></i> <?php echo e(__('Crear nuevo')); ?>

                                </a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-download"></i> Exportar
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-csv"></i> Exportar CVS</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i> Exportar PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>

											<td><?php echo e($category->nombre); ?></td>

                                            <td class="d-flex justify-content-end mb-2">
                                                <form action="<?php echo e(route('admin.categories.destroy',$category->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('admin.categories.show',$category->id)); ?>"><i class="fa fa-fw fa-eye"></i> <?php echo e(__('Ver')); ?></a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('admin.categories.edit',$category->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('Editar')); ?></a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="button" class="btn btn-danger btn-sm"  onclick="confirmDelete('<?php echo e(htmlentities($category->id)); ?>', '<?php echo e(htmlentities($category->nombre)); ?>')"><i class="fa fa-fw fa-trash"></i> <?php echo e(__('Eliminar')); ?></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php echo $categories->links(); ?>

            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <footer>
    </footer>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
 function confirmDelete(categoryId, categoryNombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Estás a punto de eliminar el permiso '${categoryNombre}'. Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, enviar el formulario
            document.getElementById('deleteForm_' + categoryId).submit();
        }
    });
}

</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\scud-dev\resources\views/admin/changelog/category/index.blade.php ENDPATH**/ ?>