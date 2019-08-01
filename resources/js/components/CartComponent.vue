<template>
    <div>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <span v-on:click="updateCart()" class="fa-stack has-badge mr-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" style="margin-top: 10px">
                    <div class="dropdown-header noti-title hover-title border-bottom">
                        <h4 v-if="hasTitle == true" v-on:click="redirectToCheckout()" class="text-overflow m-0"> Plateste acum! <i class="fas fa-chevron-circle-right"></i></h4>
                        <h4 v-else class="text-overflow m-0">Nu ati adaudgat mancaruri!</h4>
                    </div>
                    <a v-for="item in cart" class="dropdown-item">
                        <span>{{ item.product.name + ' x ' + item.quantity}}</span>
                        <div class="float-right">
                            <!-- <i v-on:click="deleteCartItem(item.id)" class="ni ni-fat-delete text-danger" style="font-size: 20px; mrgin-right: 0px;"></i> -->
                            <!-- <i class="ni font-weight-bold" style="font-size: 20px;">5</i> -->
                            <!-- <i v-on:click="deleteCartItem(item.id)" class="ni ni-fat-add" style="font-size: 20px; mrgin-right: 0px;"></i> -->
                            <i v-on:click="deleteCartItem(item.id)" class="ni ni-fat-remove text-danger" style="font-size: 25px; mrgin-right: 0px;"></i>
                        </div>
                    </a>
                    <div class="dropdown-header noti-title hover-title border-top">
                        <h4 class="text-overflow m-0">Total: {{ price }} lei</h4>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                cart: [],
                hasTitle: '',
                price: 0
            }
        },
        mounted() {
            axios.get(document.head.querySelector('meta[name="api-base-url"]').content+'/user/cart', {
            })
            .then(response => {
                this.cart = response.data.cart;
                let i;
                this.price = 0;
                for(i = 0; i < response.data.cart.length; i ++) {
                    this.price += (response.data.cart[i].product.price)*response.data.cart[i].quantity;
                }
                if(this.cart.length == 0) {
                    this.hasTitle = false
                } else {
                    this.hasTitle = true;
                }
            })
        },
        methods: {
            updateCart() {
                axios.get('/user/cart')
                .then(response => {
                    this.cart = response.data.cart;
                    let i;
                    this.price = 0;
                    for(i = 0; i < response.data.cart.length; i ++) {
                        this.price += (response.data.cart[i].product.price)*response.data.cart[i].quantity;
                    }
                    if(this.cart.length == 0) {
                        this.hasTitle = false
                    } else {
                        this.hasTitle = true;
                    }
                })
            },
            deleteCartItem(item) {
                axios.post(document.head.querySelector('meta[name="api-base-url"]').content+'/user/cart/item/delete', {
                    'item_id': item
                })
                .then(response => {
                    // console.log(this.cart);
                })
            },
            redirectToCheckout() {
                return window.location.replace(document.head.querySelector('meta[name="api-base-url"]').content+'/checkout')
            }
        }
    }
</script>

<style media="screen">
    .hover-title:hover {
        background-color: #c4c9ce;
    }
    .fa-inverse {
        margin-top: -5px;
        font-size: 21px;
    }
</style>
