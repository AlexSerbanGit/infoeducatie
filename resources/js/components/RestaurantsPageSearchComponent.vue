<template>
    <div>
        <div class="row mt-3">
            <div class="col-md-2 col-sm-3 col-xs-12 col-lg-2 w-100" style="margin-top: 5px">
                <button class="btn btn-danger">Cel mai aproiat restaurant</button>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 col-lg-1" style="margin-top: 5px"></div>
            <div class="col-md-8 col-sm-12 col-xs-8 col-lg-9" style="margin-top: 5px">
                <form class="form-inline ml-2">
                    <div class="row" style="width: 100%">
                        <div class="col-sm-10">
                            <input v-model="keyword" v-on:keyup="searchRestaurants()" class="form-control mr-sm-2" type="search" placeholder="Farmacii, doctori si medicamente" aria-label="Search" style="width: 100%">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cauta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- PREZENTARE RESTAURANTE  -->
        <div class="row" style="margin-top: 18px">
            <div v-for="restaurant in filtered_restaurants" class="col-xl-3 col-lg-4 col-sm-6 col-xs-6">
                <div class="card card-stats mb-4 mb-xl-0" style="height: 100%">
                    <div class="card-body">
                        <div class="row">
                            <div class="box" style="width: 100%; height: 200px;text-align: center;  white-space: nowrap; text-align: center; margin: 1em 0;">
                                <span style="  display: inline-block; height: 100%;vertical-align: middle;"></span>
                                <img v-if="restaurant.picture" v-bind:src="'/pictures/' + restaurant.picture" alt="imagine" style="width: 100%; height:auto ;max-width: 100%; max-height: 100%; display: inline-block;vertical-align: middle;">
                                <img v-else v-bind:src="'/pictures/restaurant.jpg'" alt="imagine" style="width: 100%; height:auto ;max-width: 100%; max-height: 100%; display: inline-block;vertical-align: middle;">
                            </div>
                            <div class="col">
                                <h3 class="card-title text-uppercase mb-0">{{ restaurant.name }}</h3>
                                <h4 class="card-title"><i class="fas fa-map-marker-alt"></i> {{ restaurant.city }}</h4>
                                <button class="btn btn-danger w-100">Pagina restaurantului</button>
                                <span class="h2 font-weight-bold mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('../api/restaurants')
            .then(response => {
                this.restaurants = response.data,
                this.filtered_restaurants = this.restaurants
            })
            .catch(error => {

            });
        },
        data() {
            return {
                'restaurants': [],
                'filtered_restaurants': [],
                'keyword': '',
                'timer': ''
            }
        },
        methods: {
            searchRestaurants() {
                if (this.timer) {
                    clearTimeout(this.timer);
                    this.timer = null;
                }
                this.timer = setTimeout(() => {
                    this.filtered_restaurants = [];
                    let i;
                    for (i = 1; i < this.restaurants.length; i++) {
                        console.log(this.restaurants[i]);
                        // console.log(this.restaurants[i].name.includes(this.keyword));
                    }
                }, 1000);
            }
        }
    }
</script>

<style>
</style>
