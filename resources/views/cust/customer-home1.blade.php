
@extends('layouts.new-layout')

@section('content')
    <!--Card-->
    <div class="card col-md-12">

<!--Card content-->
<div class="card-body">

    <!-- Table  -->
    <table class="table table-hover">
        <!-- Table head -->
        <thead class="blue lighten-4">
            <tr>
                <th>#</th>
                <th>Lorem</th>
                <th>Ipsum</th>
                <th>Dolor</th>
                <th>Lorem</th>
                <th>Ipsum</th>
                <th>Dolor</th>
            </tr>
        </thead>
        <!-- Table head -->

        <!-- Table body -->
        <tbody>
         <?php $q=0; ?>
            @for($q=0; $q <10; $q++ )
            <tr>
                <th scope="row">{{$q}}</th>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <th>Lorem</th>
                <th>Ipsum</th>
                <th>Dolor</th>
            </tr>

            @endfor
            
        </tbody>
        <!-- Table body -->
    </table>
    <!-- Table  -->

</div>

</div>
<!--/.Card-->

@endsection

