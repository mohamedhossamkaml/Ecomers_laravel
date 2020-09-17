<template>
    <div>
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li>
                                    <div v-if="!app.user">
                                        <router-link to="/ecom2/public/"><i class="fa fa-home"></i>Home</router-link>
                                    </div>
                                    <div v-else>
                                        <router-link to="/ecom2/public/user"><i class="fa fa-home"></i>Home</router-link>
                                    </div>
                                </li>
                                <li><a href=""><i class="fa fa-user"></i> My Account</a></li>
                                <li><a href=""><i class="fa fa-heart"></i> Wishlist</a></li>
                                <li><a href=""><i class="fa fa-user"></i> My Cart</a></li>
                                <li><a href=""><i class="fa fa-user"></i> Checkout</a></li>
                                <li><a href=""><i class="fa fa-user"></i> {{ app.user? app.user.name : 'Action' }} </a></li>
                                <li>
                                    <div v-if="!app.user">
                                        <router-link to="/ecom2/public/user/login"><i class="fa fa-user"></i>Login</router-link>
                                    </div>
                                    <a href="javascript:;" v-else @click="lagout" class="dropdown-item" >Logout</a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">INR</a></li>
                                        <li><a href="#">GBP</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">German</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End header area -->
    </div>
    
</template>
<script>
export default {
    name:'navbarscckgh',
    props:['app'],
    data() {
        return {
            
        }
    },
    methods: {
        lagout(){
            this.app.req.post('logout/gend').then(()=>{
                this.app.user = null;
                this.$router.push('login');
            });
        }
    },
}
</script>