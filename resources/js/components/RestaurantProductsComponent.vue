<template>
    <div class="row">
        <div v-for="product in products" class="col-md-4 col-sm-6 " style="margin-bottom: 20px">
            <div class="card" style="width: 90%; margin: auto; background-color: #A1712E; color: white">
                <img class="card-img-top" v-bind:src="'../../products/' + product.image" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text font-weight-bold">{{ product.name }}</p>
                    <p class="card-text">{{ product.description }}</p>
                    <span v-if="product.type == 1" class="badge badge-pill badge-dark">Mic dejun</span>
                    <span v-if="product.type == 2" class="badge badge-pill badge-dark">Pranz</span>
                    <span v-if="product.type == 3" class="badge badge-pill badge-dark">Cina</span>
                    <span v-if="product.type == 4" class="badge badge-pill badge-dark">Gustare</span>
                    <span class="badge badge-pill badge-danger">{{ product.weight }} (g)</span>
                    <span class="badge badge-pill badge-danger">{{ product.protein }} proteine</span>
                    <span class="badge badge-pill badge-danger">{{ product.fat }} grasimi</span>
                    <span class="badge badge-pill badge-danger">{{ product.carbo }} carbo</span>
                    <span class="badge badge-pill badge-danger">{{ product.kcal }} kcal</span>
                    <span v-for="allergy in product.allergies" class="badge badge-pill badge-primary">{{ allergy.name }}</span>
                    <div class="" style="margin-top: 10px">
                        <button v-on:click="addToCart(product.id)" class="btn btn-danger w-100">
                            <i class="fas fa-cart-plus"></i> Adauga in cos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errorMessage: '',
                products: [],
                cart: []
            }
        },
        mounted() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                vars[key] = value;
            });

            axios.get('https://scanner.d-soft.ro/restaurant/' + vars.restaurant + '/products')
            .then(response => {
                // console.log(response);
                this.products = response.data.products;
            })
        },
        methods: {
            addToCart(productId) {

                // this.$emit('add-to-cart');
                //
                // this.$on('add-to-cart', () => alert('Handeled!'));

                // axios.post('/user/cart/update', {
                axios.post('https://scanner.d-soft.ro/user/cart/update', {
                  'product': productId
                })
                .then(response => {
                    // if(response.data.success == true)
                })
            }
        }
    }
</script>
