<template>
    <div>
        <li class="nav-item" v-if="button == true">
            <a class="nav-link" v-on:click="logout()">{{ 'Delogare' }}</a>
        </li>
        <li class="nav-item" v-else>
            <a class="nav-link" v-bind:href="url">{{ 'Autentificare / Creare cont' }}</a>
        </li>
    </div>
</template>

<script>
    export default {
        mounted() {

            // Verify if the user is logged in
            if(sessionStorage.getItem("token") != null && sessionStorage.getItem("user_id") != null) {
                this.url = "./api/user/logout" + "?user_id=" + sessionStorage.getItem("user_id") + "&user_agent=" + navigator.userAgent + "&token=" + sessionStorage.getItem("token");
                this.button = true;
            } else {
                sessionStorage.removeItem("user_id");
                sessionStorage.removeItem("token");
                this.url = "./user/login_register";
                this.button = false
            }
        },
        data() {
            return {
                'button': '',
                'url': '',
                'user': ''
            }
        },
        methods: {
            logout() {
                axios.get("./api/user/logout" + "?user_id=" + sessionStorage.getItem("user_id") + "&user_agent=" + navigator.userAgent + "&token=" + sessionStorage.getItem("token"))
                    .then(response => {
                        sessionStorage.removeItem("user_id");
                        sessionStorage.removeItem("token");
                        window.location.replace("?success=" + response.data.success);
                    })
            }
        }
    }
</script>
