@extends('layouts.admin-template')

@section('title', 'Questions/Orders')

<!--Grid row-->
@section ('content')
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

                                @foreach($questions as $question => $key)
                                <tr>
                                    <th scope="row">{{ $key->question_id }}</th>
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

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            @endsection