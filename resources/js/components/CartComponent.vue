<template>
    <div>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <span v-on:click="updateCart()" class="fa-stack has-badge" data-count="4"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" style="margin-top: 10px">
                    <div class=" dropdown-header noti-title">
                        <h6 v-if="cart.length" class="text-overflow m-0">Produsele tale</h6>
                        <h6 v-else class="text-overflow m-0">Nu ati adaudgat produse</h6>
                    </div>
                    <a v-for="item in cart" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ item.product.name }}</span>
                        <i class="ni ni-support-16"></i>
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
            axios.get(document.head.querySelector('meta[name="api-base-url"]').content+'/api/user/cart', {
                // '_token': document.querySelector('meta[name="csrf-token"]').content
            })
            .then(response => {
                this.cart = response.data.cart
                // console.log(this.cart);
            })
        },
        methods: {
            updateCart() {
                axios.get('/api/user/cart', {
                    // '_token': document.querySelector('meta[name="csrf-token"]').content
                })
                .then(response => {
                    this.cart = response.data.cart
                    // console.log(this.cart);
                })
            }
        },
        created() {
            // this.$on('add-to-cart', () => alert('Handeled!'));
        }
    }
</script>
