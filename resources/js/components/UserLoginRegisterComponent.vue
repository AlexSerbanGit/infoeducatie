
<template>
  <div id="msform">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Autentificare / Inregistrare</li>
      <li>Status cont</li>
      <li>Confirmare sms</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title mt-4">Numar de telefon</h2>
      <h3 class="fs-subtitle">Numarul de telefon trebuie sa fie unul valid, pentru a activa actiunea de logare<span class="text-danger"></span> </h3>
      <input type="text" required name="phone_number" placeholder="Numarul de telefon" v-model="phoneNumber" v-on:input="validatePhoneNumber()"/>
      <h3 class="fs-subtitle text-danger">{{ errorMessage }}</h3>
      <input type="button" name="next" class="next action-button" value="Urmatorul pas"
        v-on:click="searchByPhoneNumber()"
        v-on:click.prevent="validatePhoneNumber()"
        :class="{ disabled: isDisabled }" :disabled="isDisabled()"
      />
    </fieldset>
    <fieldset v-if="validAccount == true">
      <h2 class="fs-title mt-4">Buna, Andrei Preda</h2>
      <h3 class="fs-subtitle mt-3">A fost gasit un cont asociat cu numarul de telefon <span class="text-danger">0740794880</span></h3>
      <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
      <input type="button" name="next" class="next action-button-xl" value="Trimite-mi sms"
        v-on:click="loginSendSMS()"
      />
    </fieldset>
    <fieldset v-else>
      <h2 class="fs-title mt-4">Creeaza-ti un cont</h2>
      <h3 class="fs-subtitle">Observam ca sunteti utilizator nou, va oferim oportunitatea de a va crea un cont pe platforma pentru a beneficia la maxim de beneficiile oferite!</h3>
      <input type="text" name="name" placeholder="Nume si prenume" v-model="registerName"/>
      <input type="text" name="phone_number" v-model="phoneNumber"/>
       <h3 class="fs-subtitle text-danger">{{ errorMessage }}</h3>
      <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
      <input type="button" name="next" class="next action-button-xl" value="Trimite-mi sms"
        v-on:click="registerSendSMS()"
        v-on:click.prevent="validateRegisterFields()"
        :class="{ disabled: validateRegisterFields() }" :disabled="validateRegisterFields()"
      />
    </fieldset>
    <fieldset v-if="validAccount == true">
      <h2 class="fs-title mt-4">Confirmare sms autentificare</h2>
      <h3 class="fs-subtitle">Confirma codul primit in sms</h3>
      <!-- <input type="text" placeholder="Cod de confirmare" v-model="sms"/> -->
      <div class="confirmCode col-md-12 mt-4">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[0]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[1]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[2]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[3]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[4]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[5]">
      </div>
      <h3 class="fs-subtitle text-danger">{{ errorMessage }}</h3>
      <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
      <input type="submit" name="submit" class="submit action-button" value="Salveaza"
        v-on:click="loginConfirmSMS()"
      />
    </fieldset>
    <fieldset v-else>
      <h2 class="fs-title mt-4">Confirmare sms inregistrare</h2>
      <h3 class="fs-subtitle">Confirma codul primit in sms - acesta este activ <span class="text-danger">30 de minute</span>. Contul va fi sters dupa cele 30 de minute!</h3>
      <!-- <input type="text" name="twitter" placeholder="Cod de confirmare" v-model="sms"/> -->
      <div class="confirmCode col-md-12">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[0]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[1]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[2]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[3]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[4]">
        <input type="text sms-code-item" name="sms_numbers[]" style="width: 50px;" maxlength="1" v-model="sms_numbers[5]">
      </div>
      <h3 class="fs-subtitle text-danger">{{ errorMessage }}</h3>
      <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
      <input type="submit" name="submit" class="submit action-button" value="Salveaza"
        v-on:click="loginConfirmSMS()"
      />
    </fieldset>
  </div>
</template>

<script>
  export default {
    mounted() {
      // sessionStorage.removeItem("token");
      if(sessionStorage.getItem("token") != null) {
        // window.alert('Sunteti deja logat!');
        history.go(-1);
      }
      // Get the next box
      var confirmCode = document.getElementsByClassName("confirmCode")[0];
      confirmCode.onkeyup = function(e) {
        var target = e.srcElement;
        var lenght = parseInt(target.attributes["maxlength"].value, 10);
        var idk_lenght = target.value.length;
        if (idk_lenght >= lenght) {
          var next = target;
          while (next = next.nextElementSibling) {
            if (next == null)
              break;
            if (next.tagName.toLowerCase() == "input") {
              next.focus();
              break;
            }
          }
        }
      }
    },
    data() {
      return {
        'phoneNumber': '',
        'errorMessage': '',
        'validAccount': false,
        'user': '',
        'goForLastSection': true,
        'registerName': '',
        'phoneNumber': '',
        'sms': '',
        'sms_numbers': []
      }
    },
    methods: {
      validatePhoneNumber: function() {
        // Verify if the phone number input contains just numbers
        if(this.phoneNumber.match(/^[0-9]+$/) == null) {
          this.errorMessage = 'Numarul de telefon trebuie sa contina doar numere de la 0 la 9!';
        } else {
          this.errorMessage = ''
        }
      },
      isDisabled: function() {
        if(this.phoneNumber.match(/^[0-9]+$/) == null) {
          return true;
        } else if(this.phoneNumber.lenght < 5 || this.phoneNumber.lenght > 12) {
          return true;
        } else {
          this.phoneNumber = this.phoneNumber;
          return false;
        }
      },
      searchByPhoneNumber: function() {
        axios.post('../api/find_user_by_phone_number', {
          'phone_number': this.phoneNumber
        })
        .then(response => {
          // console.log(response.data);
          this.user = response.data.user,
          this.validAccount = response.data.success
        })
      },
      loginSendSMS: function() {
          console.log('g');
          axios.post('../api/user/login/sms/send', {
            'phone_number': this.phoneNumber,
            '_token': document.querySelector('meta[name="csrf-token"]').content
          })
          .then(response => {
              console.log(response);
              this.user = response.data.user
          })
      },
      registerSendSMS: function() {
        axios.post('../api/user/account/add', {
          'name': this.registerName,
          'phone_number': this.phoneNumber,
          '_token': document.querySelector('meta[name="csrf-token"]').content
        })
        .then(response => {
            this.user = response.data.user
        })
      },
      verifyLoginResponse: function() {
        console.log('d');
      },
      validateRegisterFields: function() {
        if(this.registerName.length.toString() < 1 || this.phoneNumber.length.toString() < 1) {
          this.errorMessage = 'Toate field-urile sunt obligatorii!';
          return true;
        } else {
          return false;
        }
      },
      loginConfirmSMS: function() {
        let i;
        let codeConstruct = this.sms_numbers[0];
        for (i = 1; i < this.sms_numbers.length; i++) {
          codeConstruct = codeConstruct + this.sms_numbers[i].toString();
        }
        axios.post('../user/login', {
          'password': codeConstruct,
          'email': this.phoneNumber,
          '_token': document.querySelector('meta[name="csrf-token"]').content
        })
        .then(response => {
          if(response.data.success == false) {
            this.errorMessage = response.data.message
          } else if(response.data) {
            window.location.replace("../home")
          }
        })
        .catch(error => {
          this.errorMessage = 'A aparut o eroare!'
        });
      }
    }
  }
</script>
