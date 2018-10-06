<style type="text/css">
  
  .cust{
    text-align: left;
  }

  .tutor{
    text-align: right;
  }

</style>


<div class="container">
        <div class="col-md-12 col-md-offset-2 ">
             
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title col-md-12">
               Messages Panel
                <a href="#" class=pull-right data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i>
            </a> </h3></div>
            <div class="panel-body">
            {{ csrf_field() }}
            <ul class="list-group">
            @foreach ( $messages as $message )
                <li class="list-group-item {{$class}}" data-toggle="modal" data-target=".bs-example-modal-lg">{{$message->message}}
                <input type="hidden" value ="{{$message->id}}" />
                </li>               
            @endforeach
            </ul>
            </div>
        </div>

        </div>
        
    </div>

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
<form action=" {{ route ('messages', ['questionid' =>$question->question_id]) }}" method="post">
       
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title col-md-12" id='title'>Insert Messages</h4>
      </div>
      <div class="modal-body">
      <input type="hidden" id="id"> 
       <input id="add-item" class="form-control" name="text" placeholder="Add new Item" />
       <input type="hidden" id="qid"  name="qid"   class="form-control" value="{{ $question->question_id }} ">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </div>
      <div class="modal-footer">
        
        <button type="button" data-dismiss="modal" class="btn btn-warning">
        cancel</button>
        
        <button type="submit"  class="btn btn-primary" >Submit</button>

      </div>

    </div><!-- /.modal-content -->

  </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
