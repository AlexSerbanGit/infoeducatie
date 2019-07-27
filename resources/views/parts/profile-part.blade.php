<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header border">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          {{-- <span aria-hidden="true" style="font-size: 40px;">×</span> --}}
          <i aria-hidden="true" class="far fa-times-circle"></i>
        </button>
        <h3 class="modal-title" id="exampleModalLabel">Vizualizare & editare profil</h3>
      </div>
      <div class="modal-body">
          <form action="{{ route('user-update') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="py-3 text-center">
                  {{-- <h4 class="heading mt-4"></h4> --}}
                  <div class="form-group">
                      @if(Auth::user() -> picture != null)
                          <img class="img-responsive rounded-circle" src="{{ URL::asset('/pictures/' . Auth::user() -> picture) }}" style="height: 150px; whdth:150px;">
                      @else
                          @if(Auth::user() -> gender == 2)
                              <img class="img-responsive rounded-circle" src="{{ URL::asset('/pictures/female.png') }}" style="height: 150px; whdth:150px;">
                          @else
                              <img class="img-responsive rounded-circle" src="{{ URL::asset('/pictures/male.png') }}" style="height: 150px; whdth:150px;">
                          @endif
                      @endif
                      <br>
                      <label class="mt-3">Nume & Prenume</label>
                      <input type="text" min="1" class="form-control" required name="name" value="{{ Auth::user() -> name }}">

                      <label>Numar de telefon</label>
                      <input type="text" min="1" class="form-control" required name="phone_number" value="{{ Auth::user() -> phone_number }}">

                      <label class="mt-2">Schimba imaginea de profil</label>
                      <input type="file" name="picture" class="form-control">

                      <label>Sexul:</label>
                      <select name="gender" class="form-control" required>
                          @if(Auth::user() -> gender == 1)
                              <option value="1">Masculin</option>
                              <option value="2">Feminin</option>
                          @else
                              <option value="2">Feminin</option>
                              <option value="1">Masculin</option>
                          @endif
                      </select>

                      <label>Varsta(ani)</label>
                      <input type="number" min="1" class="form-control" required name="age" value="{{ Auth::user() -> age }}">

                      <label>Masa in kg</label>
                      <input type="number" min="1" class="form-control" required name="weight" value="{{ Auth::user() -> weight }}">

                      <label>Inaltimea(cm)</label>
                      <input type="number" min="1" class="form-control" required name="height" value="{{ Auth::user() -> height }}">

                      <label>Stil de viata:</label>
                      <select name="lifestyle" class="form-control" required>
                          @if(Auth::user() -> lifestyle == 1)
                              <option value="1">Sedentar</option>
                              <option value="2">Normal</option>
                              <option value="3">Activ</option>
                              <option value="4">Sportiv</option>
                          @elseif(Auth::user() -> lifestyle == 2)
                              <option value="2">Normal</option>
                              <option value="1">Sedentar</option>
                              <option value="3">Activ</option>
                              <option value="4">Sportiv</option>
                          @elseif(Auth::user() -> lifestyle == 3)
                              <option value="3">Activ</option>
                              <option value="1">Sedentar</option>
                              <option value="2">Normal</option>
                              <option value="4">Sportiv</option>
                          @elseif(Auth::user() -> lifestyle == 4)
                              <option value="4">Sportiv</option>
                              <option value="1">Sedentar</option>
                              <option value="2">Normal</option>
                              <option value="3">Activ</option>
                          @else
                              <option value="1">Sedentar</option>
                              <option value="2">Normal</option>
                              <option value="3">Activ</option>
                              <option value="4">Sportiv</option>
                          @endif
                      </select>

                      <label>Oras</label>
                      <input type="text" min="1" class="form-control" name="city" placeholder="Ex: Iasi" value="{{ Auth::user() -> city }}">

                      <label>Tara</label>
                      <input type="text" min="1" class="form-control" name="county" placeholder="Romania" value="{{ Auth::user() -> county }}">
                  </div>
              </div>
            </div>
            <div class="modal-footer border-top">
              {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
              <button type="submit" class="btn btn-primary w-100">Salveaza datele</button>
            </div>
          </form>
      <button class="btn-danger mt-4">
      <a class="nav-link" href="{{ route('logout') }}" style="color: white"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Deconectare
        </a class="btn btn-danger">

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </button>
    </div>
  </div>
</div>

<style media="screen">
.modal-dialog-slideout {min-height: 100%; margin: 0 0 0 auto;background: #fff;}
.modal.fade .modal-dialog.modal-dialog-slideout {-webkit-transform: translate(100%,0)scale(1);transform: translate(100%,0)scale(1);}
.modal.fade.show .modal-dialog.modal-dialog-slideout {-webkit-transform: translate(0,0);transform: translate(0,0);display: flex;align-items: stretch;-webkit-box-align: stretch;height: 100%;}
.modal.fade.show .modal-dialog.modal-dialog-slideout .modal-body{overflow-y: auto;overflow-x: hidden;}
.modal-dialog-slideout .modal-content{border: 0;}
.modal-dialog-slideout .modal-header, .modal-dialog-slideout .modal-footer {height: 69px; display: block;}
.modal-dialog-slideout .modal-header h5 {float:left;}
</style>
