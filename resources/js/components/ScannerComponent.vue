<template>
    <div>
        <div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                   <div class="card">
                        <div class="card-body">
                            <div :v-bind="code">{{ code }}</div>
                            <div class="embed-responsive embed-responsive-4by3">
                                <div class="embed-responsive-item">
                                    <v-quagga :onDetected="redirectToResults" :readerSize="readerSize" :readerTypes="['ean_reader']" class="embed-responsive-item"></v-quagga>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue'
import VueQuagga from 'vue-quaggajs';
// register component 'v-quagga'
Vue.use(VueQuagga);
export default {
  name: 'VueBarcodeTest',
  data () {
    return {
      readerSize: {
        width: 640,
        height: 480
      },
      detecteds: [],
      code: ''
    }
  },
  methods: {
     redirectToResults(data) {
        // console.log(data.codeResult.code),
        // this.code = data.codeResult.code,
        window.location.href = "/results/" + data.codeResult.code;
     }
  }
}
</script>
