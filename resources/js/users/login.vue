<template>

<div class="login-lt-box">
    <div class="login-lt-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-lt-logo -->
    <div class="card">
        <div class="card-body login-lt-card-body">
        <p class="login-lt-box-msg">Sign in to start your session</p>
        <form v-on:submit.prevent="onSupmit" >    
            <div class="input-lt-group mb-3">
            <input type="email" v-model="email" name="email" class="form-control" placeholder="Email">
            <div class="input-lt-group-append">
                <div class="input-lt-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-lt-group mb-3">
            <input type="password" v-model="password" name="password" class="form-control" placeholder="Password">
            
            <div class="input-lt-group-append">
                <div class="input-lt-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" v-model="rememberme" name="rememberme" value="1" >
                <label for="remember">
                    Remember Me
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button  class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p>
        </div>
        <!-- /.login-lt-card-body -->
    </div>
</div>
</template>
<script>
export default {
    name:"login",
    props:["app"],
    data() {
        return {
            
            email:'',
            password:'',
            rememberme:'',
            
            errors:[],
        }
    },
    methods: {
        onSupmit(){

            this.errors =[];

            if (!this.email) {
                this.errors.push('name is requerd');
            };

            if (!this.password) {
                this.errors.push('name is requerd');
            };

            if (!this.errors.length) {
                
                const data ={ 
                    email : this.email,
                    password: this.password
                }
                
                this.app.req
                .post('login/gaerd' , data)
                .then(response =>{
                    this.app.user = response.data.user
                    this.$router.puch("/ecom2/public/user")
                })
                .catch(error => {
                    this.errors.push(error.response.data.error);
                });
            };

        },
    },
    
}
</script>