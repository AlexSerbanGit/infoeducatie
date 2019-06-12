<template>
    <div>
        <input  type="text" class="form-control" v-model="queryString" v-on:keyup="getResults()">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'queryString': ''
            }
        },
        methods: {
            getResults() {
                console.log('ww')
                // axios.get('/api/search', {
                //     params: {
                //         queryString: this.queryString
                //     }
                // }).then(response => {
                //     console.log(response.data)
                // });
            }
        }
    }
</script>
