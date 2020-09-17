<template>
    <div class="user-menu">
        <ul>
            <router-link v-if="this.users == 'null'" to="/new_laravel/public/" exact tag="li" replace >
                <a class="btn btn-info"><i class="fa fa-home"></i> Home</a>
            </router-link>
            <router-link v-else  to="/new_laravel/public/user" exact tag="li" >
                <a  class="btn btn-info"> <i class="fa fa-home"></i> Home </a>
            </router-link>
            <router-link v-if="this.users == 'null'"  tag="li" to="/new_laravel/public/user/signin" replace>
                <a class="btn btn-info"> <i class="fa fa-user"></i> sign in </a>
            </router-link>
            <router-link v-else  tag="li"  to="/new_laravel/public/user/profile">
                <a class="btn btn-info"><i class="fa fa-user"></i> {{ users }} </a>
            </router-link>
            <li v-if="this.users != 'null'" >
                <a href="" class="btn btn-info"><i class="fa fa-heart"></i>  Wishlist</a>
            </li>
            <li v-if="this.users != 'null'"  >
                <a href="" class="btn btn-info"><i class="fa fa-user"></i> My Cart</a>
            </li>
            <li v-if="this.users != 'null'"  >
                <a href="" class="btn btn-info"><i class="fa fa-user"></i> Checkout</a>
            </li>
            <!-- <li><a href="" class="btn btn-info"><i class="fa fa-user"></i> </a></li> -->
            <router-link v-if="this.users == 'null'" tag="li"  to="/new_laravel/public/user/login" replace >
                <a class="btn btn-info" > <i class="fa fa-user"></i>Login </a>
            </router-link>
            <li  v-else >
                <a href="javascript:;"   @click="lagout" class="btn btn-info dropdown-item" > Logout</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name:"navbarRoutes",
    data() {
        return {
            users: localStorage.getItem("user_name")
        }
    },
    methods: {
        lagout(){
            axios.post(this.$host_url+'user/logout/gend')
            .then(()=>{
                let user_name = null ;
                localStorage.setItem("user_name", user_name);
                // this.$router.push('/new_laravel/public/');
                window.location.href = "http://localhost/new_laravel/public/";
            });
        },
    },

}
</script>

<style lang="scss" scoped >
.headers .nav_aray a{
    color: beige;
}
</style>
