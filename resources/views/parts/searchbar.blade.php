{{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="form-group">
    <form action="" method="post" class="input-group mb-4">
        @csrf
         <div class="col w-100">
            <input id="search" class="form-control mt-3" type="search" placeholder="Search" type="text" required autocomplete="off"/>
        </div>
        <div class="input-group-prepend mt-3">
            <button class="btn btn-primary"><i class=""></i> Cauta </button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
       $( "#search" ).autocomplete({

           source: function(request, response) {
               $.ajax({
               url: "{{url('/get/items')}}",
               data: {
                       term : request.term
                },
               dataType: "json",
               success: function(data){
                  var resp = $.map(data,function(obj){
                       //console.log(obj.city_name);
                       return obj.name;
                  });

                  response(resp);
               }
           });
       },
       minLength: 1
    });
});
</script> --}}
