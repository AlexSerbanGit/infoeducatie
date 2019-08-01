<template>
    <div class="container">
        <div class="fixed-bottom">
            <div class="float-right mr-3 mb-3">
                <div v-on:click="show()">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow float-right">
                        <i class="fas fa-search"></i>
                    </div>
                    <!-- <h3 class="card-title text-center text-uppercase text-dark">Cautare</h3> -->
                </div>
            </div>
        </div>

        <modal name="search" height="55%" :scrollable="false" :adaptive="true">
            <div v-on:click="hide()">
                <i  class="far fa-times-circle text-danger float-right mt-3 mr-3"></i>
            </div>
            <div class="col mt-3 mb-3">
                <h3 class="card-title text-center text-uppercase text-muted">Cauta produse si alergii dupa nume sau cod de bare!</h3>
            </div>
            <div class="container mt-2">
                <div class="header-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text brown-text"><i class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                    <input v-model="queryString" v-on:keyup="search()" class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-group ml-3 mr-3">
                <li v-for="result in results" v-on:click="goToPage(result)" class="list-group-item">
                    <!-- <i class="fas fa-male text-info mx-2"></i> -->
                    <div class="row w-100">
                        <img v-if="result.restaurant_id" v-bind:src="'/products/' + result.image" class="search-image ml-2">
                        <img v-else v-bind:src="'/pictures/' + result.image" class="search-image ml-2">
                        <span class="brown-text">{{ result.name }}</span>
                    </div>
                </li>
            </ul>
        </modal>
    </div>
    <!--  -->
</template>

<script>
    export default {
        data() {
            return {
                queryString: '',
                results: [],
                // delay: new Date().getSeconds()
            }
        },
        mounted() {

        },
        methods: {
            show () {
                this.$modal.show('search');
            },
            hide () {
                this.$modal.hide('search');
            },
            search() {
                setTimeout(() => {
                    this.results = [];
                    axios.get(document.head.querySelector('meta[name="api-base-url"]').content+'/search', {
                        params: {
                            queryString: this.queryString
                        }
                    }).then(response => {
                        response.data.forEach((obj) => {
                            this.results.push(obj);
                        })
                    });
                    // if(this.delay + 5 < new Date().getSeconds()) {}
                    this.delay = new Date().getSeconds();
                }, 1000);
            },
            goToPage(item) {
                if(item.barcode) {
                    window.location.href = "/results/" + item.barcode;
                } else {
                    window.location.href = "/all_allergies";
                }
            }
         }
    }
</script>

<style media="screen">
    .v--modal-overlay[data-modal="search"] {
      background: rgba(0, 0, 0, 0.6);
    }
    .list-group{
        height: 100%;
        /* margin-bottom: 10px; */
        overflow: scroll;
        -webkit-overflow-scrolling: touch;
    }
    .brown-text {
        color: #D9993F;
    }
    .search-image {
        width: 50px;
        height: auto;
    }
</style>
