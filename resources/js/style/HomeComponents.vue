<template>
    <div>
        <navbar></navbar>
        <router-view/>
    </div>
</template>

<script>
import navbar from './NavbarComponents';
import homePage from './HomePageComponents';
import router from '../routes';
export default {
    name: 'home',
    components:{
        navbar,
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

}

</script>

<style>

</style>
