@extends('layouts.admin-template')

@section('title', 'Questions/Orders')

<!--Grid row-->
@section ('content')

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

                                @foreach($questions as $question => $key)
                                <tr>
                                    <th scope="row"> <a href = "{{route('question_det', ['question_id' =>$key->question_id ]) }}" style="color: blue" >
                                      {{ $key->question_id }} </a></th>
                                    <td>{{$key->topic }}</td>
                                    <td>{{$key->created_at }}</td>
                                    <td> {{$key->question_deadline }}</td>
                                    <td>{{$key->question_price }}</td>

                                    <td>{{$key->user_id }}</td>
                                    <td>{{$key->tutor_price }}</td>
                                    <td>{{$key->pagenum }}</td>

                                </tr>

                            @endforeach

                            </tbody>
                            <!-- Table body -->
                        </table>
                        <!-- Table  -->

                    </div>
                    {{$questions->links('pagination.pagination') }}

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

            @endsection
