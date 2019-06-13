<template>
    <div class="">
        <div class="input-group mb-4">
            <div class="col w-100 mt-3">
                <input  type="text" class="form-control" v-model="queryString" v-on:keyup="getResults()" placeholder="Cauta..">
            </div>
            <div class="input-group-prepend mt-3">
                <button class="btn btn-primary"><i class=""></i> Cauta </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('ww')
        },
        data() {
            return {
                'queryString': ''
            }
        },
        methods: {
            getResults() {
                axios.get('/api/search', {
                    params: {
                        queryString: this.queryString
                    }
                }).then(response => {
                    console.log(response.data)
                });
            }
        }
    }
</script>
