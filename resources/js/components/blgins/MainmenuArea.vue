<template>
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul  class="nav navbar-nav" style="flex-direction:unset">
                        <div v-for="cats in get_categores" :key="cats.id">
                            <router-link  v-if="cats.parent == null"   tag="li" :to="{ path: '/new_laravel/public/user/cats', id:cats.id  }" replace >
                                <a> {{cats.dep_name_en}} </a>
                            </router-link>

                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End mainmenu area -->
</template>

<script>
// import product from './product'
export default {
    name:'mainmenu',

    data() {
        return {
            get_categores:{},
            cats:[]
        }
    },
    methods: {
        gets_categores(){
            axios.post(this.$host_url+"user/category").then(respons=>{
                this.get_categores = respons.data.data
            });
        }
    },
    mounted() {
        this.gets_categores();
    },

}
</script>

<style>

</style>>
