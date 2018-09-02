

<label class="col-md-4"> University: </label>
<div class="col-md-8">
  <input type="text" name="university" class="form-control"  id="searchItem" placeholder="Enter your University">
</div>
  
<script type="text/javascript">
  $('#searchItem').autocomplete({
    source: "{!! URL::route('tutor-auto') !!}",
    minlength:1,
    autoFocus:true,
    select: function(e, ui){
      console.log('success');
    }
  });



