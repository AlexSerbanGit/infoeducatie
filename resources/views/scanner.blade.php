<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ url('/css/app.css') }}">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <title>Trady - Caută Produse</title>
  </head>

  <style media="screen">
      body, html {
          height: 100%;
          margin: 0;
          overflow-x: hidden;
      }
      #background {
          /* The image used */
          /* background-image: url("/images/locations_background.jpg"); */
          background: rgb(187,106,122);
          background: linear-gradient(0deg, rgba(187,106,122,1) 0%, rgba(43,67,189,1) 100%);
          /* Full height */
          height: 100vh;

          /* Center and scale the image nicely */
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
      }
      .center-page {
          display: flex;
          justify-content: center;
          align-items: center;
      }
      /* .go-bottom {
          padding-top: 3vh;
      } */
      .title {
          color: white;
          font-weight: 600;
          font-size: 50px;
      }
      .title-token {
          color: white;
          font-weight: 600;
          font-size: 40px;
      }
      @media screen and (max-width: 600px) {
          .title {
              font-size: 30px;
          }
          .title-token {
              font-size: 30px;
          }
      }
      .twitter-typeahead,
      .tt-hint,
      .tt-input {
          width: 100%;
          border-bottom: 1px solid #218838;
      }
      .tt-menu{
          /* width: auto; ! important; */
          font-weight: normal;
          height:50vh;
          overflow-y: scroll;
          width: 116%;
          margin-left: -43px;
          margin-top: 20px;
      }
      .active-pink-2 input[type=text]:focus:not([readonly]) {
          border-bottom: 1px solid #f48fb1;
          box-shadow: 0 1px 0 0 #f48fb1;
      }
      .active-pink input[type=text] {
          border-bottom: 1px solid #f48fb1;
          box-shadow: 0 1px 0 0 #f48fb1;
      }
      .active-pink .fa, .active-pink-2 .fa {
          color: #f48fb1;
      }

      .form-control-borderless {
          border: none;
      }

      .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
          border: none;
          outline: none;
          box-shadow: none;
      }
  </style>

  <body id="background">
      <div class="center-page go-bottom">
          <h1 class="title ml-5 mr-2 mb-4">CAUTĂ PRODUSE</h1>
      </div>
      <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-9">

              <form class="card card-sm" action="" method="get">
                  {{ csrf_field() }}
                  <div class="card-body row no-gutters align-items-center">
                      <div class="col-auto">
                          <i class="fas fa-search h4 text-body"></i>
                      </div>
                      <div class="col w-100">
                          <input id="search" min="5" max="30" style="text-transform: uppercase;" required class="form-control form-control-lg form-control-borderless" type="search" data-provide="typeahead" placeholder="Nume produs..." name="search_key">
                      </div>
                      <div class="col-auto">
                          <button class="btn btn-lg btn-success" type="submit"> Cauta </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
     <!-- Custom scripts -->
     {{-- <script type="text/javascript" src="{{ url('/js/app.js') }}"></script> --}}
     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
	 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	 <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

      <!-- Initialize typeahead.js on the input -->
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
  					    return '<div style="font-weight:normal! important;" class="list-group-item">' + data.name + '<h6 class="text-success float-right font-weight-bold"> <i class="fas fa-coins"></i> ' + data.pret_vanzare + ' lei / buc' + '</h6>' + '</div></div>'
  					}
  				}
  			});
          });
  	 </script>
     </body>
</html>
