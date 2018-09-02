<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    

  <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<label class="col-md-4">University:  </label>
<div class="col-md-8">
  <input type="text" name="university" class="form-control"  id="searchItem" placeholder="Enter your University">
</div>
  
<script type="text/javascript">
  $('#searchItem').autocomplete({
    source: "{!! URL::route('university') !!}",
    minlength:1,
    autoFocus:true,
    select: function(e, ui){
      console.log('success');
    }
  })
</script>
</body>
</html>


