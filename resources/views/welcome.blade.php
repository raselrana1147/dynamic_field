<!-- imageupload.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel Multiple Images Upload Using Dropzone</title>
    <meta name="_token" content="{{csrf_token()}}" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card">
        <form action="{{route('store_info')}}" method="post">
            @csrf

            <input type="text" name="valid[]" class="myId" value="">
         <div class="p-4" id="insert_row">
          <div class="row p-1">
            <div class="col">
               <input type="text" class="name_field1 form-control" name="name[]" placeholder="name" value="">
               <ul class="setcat1"></ul>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="age[]" placeholder="age">
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
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script type="text/javascript">
      $(document).ready(function(){

         let count=1;

            $('body').on('click','.add_new',function(){
               count=count+1
                var html='';
                html+='<div class="row p-1 deleterow">';
                html+='<div class="col"><input  type="text" class="name_field'+count+' form-control" name="name[]" placeholder="name" value=""><ul class="setcat'+count+'"></ul></div>';
                html+='<div class="col"><input type="text" class="form-control" name="age[]" placeholder="age"></div>';
                html+='<div class="col"><button type="button" class="btn btn-danger" id="delete">Remove</button></div>';
                html+='<div>';

                 $("#insert_row").append(html)
                     
                $("body").on('keyup','.name_field'+count,function(){

                    var search_value=$(this).val();
                    if (search_value ==="") {
                        $('.setcat'+count).hide();
                    }else{
                    $.ajax({
                    url: "{{route('search_cat')}}",
                    method: "POST",
                    data:{search_value:search_value},
                    success:function (response) {
                        console.log(response);
                        var setItem="";
                        
                        if (response.data.length>0) {
                             response.data.forEach(function(item,index){
                               setItem+='<li class="get_product_name" f_id="'+item.id+'">'+item.name+'</li>';
                              });
                               $('.setcat'+count).fadeIn().html(setItem);
                          }else{
                              $('.setcat'+count).fadeIn().html('<li>'+response.msg+'</li>');
                          } 
                     }
                    });
                  }

                })
                
                //console.log(count)
            })

              $("body").on('keyup','.name_field'+count,function(){
                    
                   var search_value=$(this).val();
                    if (search_value ==="") {
                        $('.setcat'+count).hide();
                    }else{
                    $.ajax({
                    url: "{{route('search_cat')}}",
                    method: "POST",
                    data:{search_value:search_value},
                    success:function (response) {
                        //console.log(response);
                        var setItem="";
                        
                        if (response.data.length>0) {
                             response.data.forEach(function(item,index){
                               setItem+='<li class="get_product_name" f_id="'+item.id+'">'+item.name+'</li>';
                              });
                               $('.setcat'+count).fadeIn().html(setItem);
                          }else{
                              $('.setcat'+count).fadeIn().html('<li>'+response.msg+'</li>');
                          } 
                     }
                    });
                  }
                  
                })

             $("body").on('click',"#delete",function(){
                $(this).closest('.deleterow').remove();
            })

             $('body').on('click','.get_product_name',function(){
                  var product_name=$(this).text();
                  var f_id=$(this).attr('f_id');
                  console.log(f_id)
                  $(".name_field"+count).val(product_name);
                  $(".myId").val(f_id);
                  $('.setcat'+count).fadeOut();

             });

            
      })
</script>
</body>
</html>