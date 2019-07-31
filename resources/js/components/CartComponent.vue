<template>
    <div>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <span v-on:click="updateCart()" class="fa-stack has-badge" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" style="margin-top: 10px">
                    <div class=" dropdown-header noti-title">
                        <h6 v-if="cart.length" class="text-overflow m-0">Produsele tale</h6>
                        <h6 v-else class="text-overflow m-0">Nu ati adaudgat produse</h6>
                    </div>
                    <a v-for="item in cart" class="dropdown-item">
                        <span>{{ item.product.name }}</span>
                        <div class="float-right">
                            <!-- <i v-on:click="deleteCartItem(item.id)" class="ni ni-fat-delete text-danger" style="font-size: 20px; mrgin-right: 0px;"></i> -->
                            <!-- <i class="ni font-weight-bold" style="font-size: 20px;">5</i> -->
                            <!-- <i v-on:click="deleteCartItem(item.id)" class="ni ni-fat-add" style="font-size: 20px; mrgin-right: 0px;"></i> -->
                            <i v-on:click="deleteCartItem(item.id)" class="ni ni-fat-remove text-danger" style="font-size: 25px; mrgin-right: 0px;"></i>
                        </div>
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
            })
            .then(response => {
                this.cart = response.data.cart
            })
        },
        methods: {
            updateCart() {
                axios.get('/api/user/cart')
                .then(response => {
                    this.cart = response.data.cart
                    // console.log(this.cart);
                })
            },
            deleteCartItem(item) {
                axios.post('/api/user/cart/item/delete', {
                    'item_id': item
                })
                .then(response => {
                    console.log(this.cart);
                })
            }
        },
        created() {
            // this.$on('add-to-cart', () => alert('Handeled!'));
        }
    }
</script>
