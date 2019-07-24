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
            <p class="text-danger">{{errorMessage}}</p>
            <input type="button" name="next" class="next action-button" value="Urmatorul pas"
                v-on:click="searchByPhoneNumber()"
                v-on:click.prevent="validatePhoneNumber()"
                :class="{ disabled: isDisabled() }" :disabled="isDisabled()"
            />
        </fieldset>
        <fieldset v-if="validAccount == true">
            <h2 class="fs-title mt-4">Buna, Andrei Preda</h2>
            <h3 class="fs-subtitle mt-3">A fost gasit un cont asociat cu numarul de telefon <span class="text-danger">0740794880</span></h3>
            <h3 class="fs-subtitle">Ultima logare a fost inregistrata pe data de <span class="text-danger">{{lastActiveStatus}}</span></h3>
            <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
            <input type="button" name="next" class="next action-button-xl" value="Trimite-mi sms de confirmare"
                v-on:click="loginSendSMS()"
            />
        </fieldset>
        <fieldset v-else>
            <h2 class="fs-title mt-4">Creeaza-ti un cont</h2>
            <h3 class="fs-subtitle">Observam ca sunteti utilizator nou, va oferim oportunitatea de a va crea un cont pe platforma pentru a beneficia la maxim de beneficiile oferite!</h3>
            <input type="text" name="name" placeholder="Nume si prenume" v-model="registerName"/>
            <input type="text" name="phone_number" v-model="registerPhoneNumber"/>
            <!-- <input type="email" name="email" placeholder="Email" v-model="registerEmail"/>
            <input type="text" name="city" placeholder="Oras" v-model="registerCity"/> -->
            <!-- <input type="text" name="tara" placeholder="Tara" v-model="registerCountry"/> -->
            <p class="text-danger">{{errorMessage}}</p>
            <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
            <input type="button" name="next" class="next action-button-xl" value="Salveaza si trimite sms"
                v-on:click="registerSendSMS()"
                v-on:click.prevent="validateRegisterFields()"
                :class="{ disabled: validateRegisterFields() }" :disabled="validateRegisterFields()"
            />
        </fieldset>
        <fieldset v-if="validAccount == true">
            <h2 class="fs-title mt-4">Confirmare sms autentificare</h2>
            <h3 class="fs-subtitle">Confirma codul primit in sms</h3>
            <input type="text" name="twitter" placeholder="Cod de confirmare" v-model="sms"/>
            <h3 class="fs-subtitle text-danger">{{ registerError }}</h3>
            <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
            <input type="submit" name="submit" class="submit action-button" value="Salveaza"
                v-on:click="loginConfirmSMS()"
            />
        </fieldset>
        <fieldset v-else>
            <h2 class="fs-title mt-4">Confirmare sms inregistrare</h2>
            <h3 class="fs-subtitle">Confirma codul primit in sms - acesta este activ <span class="text-danger">30 de minute</span>. Contul va fi sters dupa cele 30 de minute!</h3>
            <input type="text" name="twitter" placeholder="Cod de confirmare" v-model="sms"/>
            <h3 class="fs-subtitle text-danger">{{ registerError }}</h3>
            <input type="button" name="previous" class="previous action-button-previous" value="Inapoi"/>
            <input type="submit" name="submit" class="submit action-button" value="Salveaza"
                v-on:click="registerConfirmSMS()"
            />
        </fieldset>
    </div>
</template>

<script>
    export default {
        mounted() {
            sessionStorage.removeItem("token");
            if(sessionStorage.getItem("token") == null) {
                // window.alert('Sunteti deja logat!');
                history.go(-1);
            }
        },
        data() {
            return {
                'phoneNumber': '',
                'errorMessage': '',
                'validAccount': false,
                'lastActiveStatus': '',
                'user': '',
                'goForLastSection': true,
                'registerName': '',
                'registerPhoneNumber': '',
                'registerEmail': '',
                'registerCity': '',
                'sms': '',
                'registerError': ''
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
                    this.registerPhoneNumber = this.phoneNumber;
                    return false;
                }
            },
            searchByPhoneNumber: function() {
                axios.post('http://localhost:8000/api/find_user_by_phone_number', {
                    'phone_number': this.phoneNumber
                })
                .then(response => {
                    this.user = response.data.user,
                    this.validAccount = response.data.success

                    if(response.data.user.lastToken != null) {
                        this.lastActiveStatus = response.data.user.lastToken.created_at
                    }
                })
            },
            loginSendSMS: function() {
                axios.post('http://localhost:8000/api/user/' + this.user.id + '/login')
                .then(response => {
                    this.user = response.data.user
                })
            },
            registerSendSMS: function() {
                axios.post('http://localhost:8000/api/user/register', {
                    'name': this.registerName,
                    'phone_number': this.registerPhoneNumber
                })
                .then(response => {
                    this.user = response.data.user
                })
            },
            verifyLoginResponse: function() {
                console.log('d');
            },
            validateRegisterFields: function() {
                if(this.registerName.length.toString() < 1 || this.registerPhoneNumber.length.toString() < 1) {
                    // this.errorMessage = 'Toate field-urile sunt obligatorii!';
                    return true;
                } else {
                    return false;
                }
            },
            registerConfirmSMS: function() {
                axios.post('http://localhost:8000/api/user/register/sms/confirm', {
                    'sms_code': this.sms,
                    'user_id': this.user.id
                })
                .then(response => {

                    if(response.data.success == true) {

                        sessionStorage.setItem("token", response.data.user.token.token);

                        window.location.replace("http://localhost:8000/home?user_id=" + this.user.id + "&token=" + sessionStorage.getItem("token"));

                    } else {
                        this.registerError = response.data.message
                    }
                })
            },
            loginConfirmSMS: function() {

                axios.post('http://localhost:8000/api/user/login/sms/confirm', {
                    'sms_code': this.sms,
                    'user_id': this.user.id
                })
                .then(response => {

                    if(response.data.success == true) {

                        sessionStorage.setItem("token", response.data.user.token.token);

                        window.location.replace("http://localhost:8000/home?user_id=" + this.user.id + "&token=" + sessionStorage.getItem("token"));

                    } else {
                        this.registerError = response.data.message
                    }
                })
            }
        }
    }
</script>
