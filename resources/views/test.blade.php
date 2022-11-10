<!-- imageupload.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Multiple Images Upload Using Dropzone</title>
    <meta name="_token" content="{{csrf_token()}}" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card">
        <form action="{{route('store_info')}}" method="post">
            @csrf
         <div class="p-4" id="insert_row">
          <div class="row p-1">
            <div class="col">
              <select class="form-control" name="name[]">
                  <option>Banana</option>
                  <option>Apple</option>
                  <option>Orange</option>
                  <option>Pine Apple</option>
                  <option>Wood Apple</option>
              </select>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="age[]" placeholder="Age">
            </div>

             <div class="col">
              <button type="button" class="btn btn-success add_new" >Add</button>
            </div>
          </div>
       
    </div>
         <button type="submit" class="btn btn-success">Add</button>
         </form>
    </div>
  
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script type="text/javascript">
      $(document).ready(function(){
            $('body').on('click','.add_new',function(){

                var html='';
                html+='<div class="row p-1 deleterow">';
                html+='<div class="col">'
                        +'<select class="form-control" name="name[]">'+
                                '<option>Banana</option>'+
                                '<option>Apple</option>'+
                                '<option>Orange</option>'+
                                '<option>Pine Apple</option>'+
                                '<option>Wood Apple</option>'+
                        '</select>'+
                '</div>';
                html+='<div class="col"><input type="text" class="form-control" name="age[]" placeholder="age"></div>';
                html+='<div class="col"><button type="button" class="btn btn-danger" id="delete">Remove</button></div>';
                html+='<div>';

                 $("#insert_row").append(html)

                 $("body").on('click',"#delete",function(){
                    $(this).closest('.deleterow').remove();
                 })
            })
      })
</script>
</body>
</html>