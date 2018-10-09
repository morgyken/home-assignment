<?php $__env->startSection('title', 'Questions/Orders'); ?>

<!--Grid row-->
<?php $__env->startSection('content'); ?>

<style type="text/css">
table {
  max-width: 1200px;
}
table {
white-space:nowrap;
}

td {
  /* css-3 */
    white-space: -o-pre-wrap;
    word-wrap: break-word;
    white-space: pre-wrap;
    white-space: -moz-pre-wrap;
    white-space: -pre-wrap;
}
.clickable-rows{
  cursor: pointer;
}
table {border-collapse:collapse; table-layout:fixed;}
  table td {border:solid 1px #fab; width:100px; word-wrap:nowrap;}
</style>
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!--Card-->
                <div class="card ">

                    <!--Card content-->
                    <div class="card-body clearfix" >

                        <!-- Table  -->
                        <table class="table table-striped table-hover" style="max-width: 900px">
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
                                    <th scope="row"> <a href = "<?php echo e(route('question_det', ['question_id' =>$key->question_id  ])); ?>" >
                                      <?php echo e($key->question_id); ?> </a></th>
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
                    <?php echo e($questions->links('pagination.pagination')); ?>


                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            <script>
            <!-- Initializations -->
            <script type="text/javascript">
              // Animations initialization
              new WOW().init();
              jQuery(document).ready(function($) {
              $(".clickable-rows").click(function() {
                  window.location = $(this).data("href");
              });
          });
              $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')

          })

      </script>

            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>