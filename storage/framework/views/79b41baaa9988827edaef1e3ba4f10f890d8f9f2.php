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
                        <table class="table table-striped table-hover">
                            <!-- Table head -->
                            <thead class="blue-grey lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>Tutor Name</th>
                                    <th>Method</th>
                                    <th>Account</th>

                                    <th>Orders (C)</th>
                                
                                    <th>Next Date</th>
                                    <th>Amount Due</th>

                                    <th>More...</th>

                                </tr>
                            </thead>
                            <!-- Table head -->

                            <!-- Table body -->
                            <tbody>


                                <tr>
                                    <th scope="row"> <a href = "" style="color: blue" >
                                       1</a> </th>
                                    <td>Morgan Okoth </td>
                                    <td>Paypal </td>
                                    <td> morgyken@gmail.com</td>
                                    <td>34</td>

                                    <td><?php echo e($paydate); ?></td>
                                    <td> $234</td>
                                   <td> <a href=""> More .. </a></td>

                                </tr>

                                <tr>
                                    <th scope="row"> <a href = "" style="color: blue" >
                                       1</a> </th>
                                    <td>Morgan Okoth </td>
                                    <td>Paypal </td>
                                    <td> 23422</td>
                                    <td>34</td>

                                    <td>12/12/1990</td>
                                    <td> $234</td>
                                      <td> <a href=""> More .. </a></td>
                                   

                                </tr>

                       

                            </tbody>
                            <!-- Table body -->
                        </table>
                        <!-- Table  -->

                    </div>
                   

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