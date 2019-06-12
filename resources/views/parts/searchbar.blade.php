
<style>
    .twitter-typeahead,
    .tt-hint,
    .tt-input {
      width: 140% !important;
      border-bottom: 1px solid #218838;
    }
    .tt-menu{
      width: 140% !important;
      font-weight: normal;
      height:50vh;
      overflow-y: scroll;
      margin-left: 0px;
      margin-top: 20px;
      margin-bottom: 50px;
    }
</style>

{{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
{{-- <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script> --}}

<div class="form-group">
    <form action="" method="post" class="input-group mb-4">
        @csrf
        {{-- <div class="input-group-prepend mt-3">
            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
        </div> --}}
         <div class="col w-100">
            <input id="search" class="form-control mt-3" type="search" data-provide="typeahead" placeholder="Search" type="text" required autocomplete="off"/>
        </div>
        <div class="input-group-prepend mt-3">
            <button class="btn btn-primary"><i class=""></i> Cauta </button>
        </div>
    </form>
</div>
<script>
   $(document).ready(function() {
       var bloodhound = new Bloodhound({
           datumTokenizer: Bloodhound.tokenizers.whitespace,
           queryTokenizer: Bloodhound.tokenizers.whitespace,
           remote: {
               url: '/api/get/items',
               wildcard: '%QUERY%'
           },
       });

       $('#search').typeahead({
           hint: true,
           highlight: true,
           minLength: 3,
       }, {
           name: '',
           limit: 1000,
           source: bloodhound,
           display: function(data) {
               return data.name  //Input value to be set when you select a suggestion.
           },
           templates: {
               empty: [
                   '<div class="list-group search-results-dropdown"><div class="list-group-item"> Nu au fost găsite rezultate.</div></div>'
               ],
               header: [
                   '<div class="list-group search-results-dropdown col-md-12">'
               ],
               suggestion: function(data) {
                   return '<div style="font-weight:normal! important;" class="list-group-item">' + data.name + '</div></div>'
               }
           }
       });
     });
</script>
