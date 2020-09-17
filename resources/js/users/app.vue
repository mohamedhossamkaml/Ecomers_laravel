<template>
    <div>
        <navbar :app="this" ></navbar>
        <spinner v-if="loading"  class="text-center center"></spinner>
        <div  v-else-if="initiated"> 
            <router-view :app="this"/>
        </div>
    
    </div>
</template>
<script>

import navbar from './userHader'

export default {
    name: 'app',
    components:{
        navbar
    },
    data() {
        return {
            user:null,
            loading:false,
            initiated: false,
            req: axios.create({
                baseUrl: BASE_URL
            }) 
        }
    },
    mounted() {
        this.init();
    },
    methods: {
        init(){
            this.loading = true;

            this.req.get('user/init/user').then(response=>{
                this.user = response.data.user,
                this.loading = false ,
                this.initiated = true
            })
        }
    },
}
</script>