
    
            <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                             
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Panel title 
                                <a href="#" class=pull-right data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i>
                            </a> </h3></div>
                            <div class="panel-body">
                            {{ csrf_field() }}
                            <ul class="list-group">
                            @foreach ( $item as $items )
                                <li class="list-group-item myitem" data-toggle="modal" data-target=".bs-example-modal-lg">{{$items->item}}
                                <input type="hidden" id="item-id" value ="{{$items->id}}" />
                                </li>
                               
                            @endforeach
                            </ul>
                            </div>
                        </div>

                        </div>
                        
                    </div>
                </div>

            </div>

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" id="add-new" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id='title'>Add Item </h4>
                  </div>
                  <div class="modal-body">
                  <input type="hidden" id="id"> 
                   <input type="text" id="add-item" class="form-control" placeholder="Add new Item" >
                  </div>
                  <div class="modal-footer">
                    <button type="button" style="display:none" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" style="display:none" id="delete"data-dismiss="modal" class="btn btn-warning">delete</button>
                    <button type="button" style="display:none" id="save" data-dismiss="modal" class="btn btn-secondary">Save Changes</button>
                    <button type="button"  id="add" class="btn btn-primary" data-dismiss="modal"  >Add new Item</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


