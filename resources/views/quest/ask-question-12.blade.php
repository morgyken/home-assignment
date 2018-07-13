
@extends('layouts.new-layout')

@section('content')
    <!--Card-->
   

        <!--Card content-->
        <div class="card-body">   
        <form action="{{route('ask-questions')}}" method="post" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
               <input type="text" name="topic" class="form-control input-lg" placeholder="Enter Topic" required="required"  id="topic">
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
            @include('part.ckeditor')
            </div>

            <div class="form-group">
                <label for="comment">Special Instructions </label>
                <textarea class="form-control" name="special" rows="5" id="comment"></textarea>
            </div>

            <div class="form-group">
                <label for="usr">Include Files</label>
                @include('part.file-picker')
            </div>           

            <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form> 

        </div>

   

@endsection