<template>
    <div>
        <!-- <div class="input-group mb-4">
            <div class="col w-100 mt-3">
                <input  type="text" class="form-control" v-model="queryString" v-on:keyup="getResults()" placeholder="Cauta..">
            </div>
            <div class="input-group-prepend mt-3">
                <button class="btn btn-primary"><i class=""></i> Cauta </button>
            </div>
        </div> -->
        <div class="btn-group w-100">
            <!-- <div class="col w-100 mt-3"> -->
                <input class="col w-100 btn btn-secondary btn-sm dropdown-toggle w-100" type="text" v-model="queryString" v-on:keyup="getResults()" placeholder="Cauta.." data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"/>
            <!-- </div> -->
            <div class="input-group-prepend">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
            <div class="dropdown-menu w-100 mt-2">
                <ul class="list-group">
                    <button class="list-group-item" v-for="result in results" v-on:click="redirectPage(result.id )">{{ result.name }}</button>
                    <!-- <li class="list-group-item">Documents</li>
                    <li class="list-group-item">Music</li>
                    <li class="list-group-item">Videos</li> -->
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return {
                'queryString': '',
                'results': []
            }
        },
        methods: {
            getResults() {
                this.results = [];
                axios.get('/api/search', {
                    params: {
                        queryString: this.queryString
                    }
                }).then(response => {
                    response.data.forEach((name) => {
                        this.results.push(name);
                    })
                    // console.log(response.data)
                });
            },
            redirectPage(id) {
                window.location.href = "/seacrch/results/" + id;
            }
        }
    }
</script>
