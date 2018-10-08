<?php $__env->startSection('title', 'Questions/Orders'); ?>

<!--Grid row-->
<?php $__env->startSection('content'); ?>
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <div class="card-body">

                        <!-- Table  -->
                        <table class="table table-hover">
                            <!-- Table head -->
                            <thead class="blue-grey lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>Summary</th>
                                    <th>Date Posted</th>
                                    <th>Deadline</th>

                                    <th>Status</th>
                                    <th>Customer</th>
                                    <th>Tutor </th>
                                    <th>Amount Paid</th>
                                    
                                </tr>
                            </thead>
                            <!-- Table head -->

                            <!-- Table body -->
                            <tbody>

                                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($key->question_id); ?></th>
                                    <td><?php echo e($key->topic); ?></td>
                                    <td><?php echo e($key->created_at); ?></td>
                                    <td> <?php echo e($key->question_deadline); ?></td>
                                    <td><?php echo e($key->question_price); ?></td>

                                    <td><?php echo e($key->user_id); ?></td>
                                    <td><?php echo e($key->tutor_price); ?></td>
                                    <td><?php echo e($key->pagenum); ?></td>
                                    
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                            <!-- Table body -->
                        </table>
                        <!-- Table  -->

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>