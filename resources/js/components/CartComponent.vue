<template>
    <div>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <span class="fa-stack has-badge" data-count="4"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" style="margin-top: 10px">
                    <div class=" dropdown-header noti-title">
                        <h6 v-if="cart.length" class="text-overflow m-0">Produsele tale</h6>
                        <h6 v-else class="text-overflow m-0">Nu ati adaudgat produse</h6>
                    </div>
                    <a v-for="item in cart" href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ item }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cart: []
            }
        },
        mounted() {
            // localStorage.cart = this.cart;
            if(localStorage.cart) {
                this.cart = localStorage.cart;
            }
        }
        // watch: {
        //     cart(newCart) {
        //         localStorage.cart = newCart;
        //     }
        // }
    }
</script>
