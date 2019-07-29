<template>
    <div>
        <div class="row mt-3">
            <div class="col-md-2 col-sm-3 col-xs-12 col-lg-2" style="margin-top: 5px">
                <button v-on:click="restaurantsFilter()" class="btn" v-bind:class="filterClass">{{ filterName }} <i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 col-lg-1" style="margin-top: 5px"></div>
            <div class="col-md-12 col-sm-12 col-xs-8 col-lg-9" style="margin-top: 5px">
                <form class="form-inline">
                    <div class="row" style="width: 100%">
                        <div class="col-md-11">
                            <input v-model="keyword" v-on:keyup="searchRestaurants()" class="form-control mr-sm-2" type="search" placeholder="Restaurante" aria-label="Search" style="width: 100%">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- PREZENTARE RESTAURANTE  -->
        <div class="mt-3">
            {{ errorMessage }}
        </div>
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
                                <h4 v-if="restaurant.city" class="card-title"><i class="fas fa-map-marker-alt"></i> {{ restaurant.city.name }}</h4>
                                <button v-on:click="restaurantUrl(restaurant.id)" class="btn btn-danger w-100">Pagina restaurantului</button>
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
            axios.get('./api/restaurants')
                .then(response => {
                    this.restaurants = response.data
                })
            axios.get('./api/city/' + document.querySelector('meta[name="city_id"]').content + '/restaurants')
                .then(response => {
                    this.near_restaurants = response.data,
                    this.filtered_restaurants = response.data
                })
        },
        data() {
            return {
                'restaurants': [],
                'cityId': document.querySelector('meta[name="city_id"]').content,
                'filterName': 'Restaurante din alte orase',
                'filterClass': 'btn btn-danger',
                'filtered_restaurants': [],
                'near_restaurants': [],
                'errorMessage': '',
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
                    this.errorMessage = '';
                    this.filtered_restaurants = [];
                    let i;
                    for (i = 0; i < this.restaurants.length; i++) {
                        if(this.restaurants[i].name.toLowerCase().search(this.keyword) > -1) {
                            if(this.filterClass == 'btn btn-danger') {
                                // console.log(this.restaurants[i].city_id == this.cityId);
                                if(this.restaurants[i].city_id == this.cityId) {
                                    this.filtered_restaurants.push(this.restaurants[i]);
                                }
                            } else if(this.filterClass == 'btn btn-success') {
                                this.filtered_restaurants.push(this.restaurants[i]);
                            }
                        }
                    }
                    if(this.filtered_restaurants.length == 0) {
                        this.errorMessage = 'Nu au fost gasite rezultate conform cautarii!'
                    }
                    this.keyword = [];
                }, 1300);
            },
            restaurantsFilter() {
                if(this.filterClass == 'btn btn-danger') {
                    this.filterClass = 'btn btn-success';
                    this.filterName = 'Restaurante din orasul tau';
                    this.filtered_restaurants = this.restaurants;
                } else {
                    this.filterClass = 'btn btn-danger';
                    this.filterName = 'Restaurante din alte orase';
                    this.filtered_restaurants = this.near_restaurants;
                }
            },
            restaurantUrl(currentRestaurantID) {
                window.location.replace("../restaurant/" + currentRestaurantID + '/read');
                this.currentRestaurantID = '';
            }
        }
    }
</script>

<style>
</style>
