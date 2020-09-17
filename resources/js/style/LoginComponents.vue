<template>
    <div class="login-lt-box">
        <div class="login-lt-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-lt-logo -->
        <div class="card">
                <div class="card-body login-lt-card-body">
                <p class="login-lt-box-msg">Sign in to start your session</p>
                <form v-on:submit.prevent=" login_user" >
                    <div class="input-lt-group mb-3">
                        <input
                            id="email"
                            type="email"
                            required
                            v-model="email"
                            name="email"
                            class="form-control"
                            placeholder="Email"
                            autocomplete="email"
                            autofocus
                        />

                        <div class="input-lt-group-append">
                            <div class="input-lt-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-lt-group mb-3">
                        <input
                            id="password"
                            type="password"
                            v-model="password"
                            required
                            name="password"
                            class="form-control"
                            placeholder="Password"
                            autocomplete="password"
                            autofocus
                        />

                        <div class="input-lt-group-append">
                            <div class="input-lt-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                            <div class="icheck-primary">
                                <input
                                    type="checkbox"
                                    v-model="rememberme"
                                    name="rememberme"
                                    value="1"
                                >

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
    props:["home","navbar"],
    data() {
        return {
            email:"",
            password:"",
            rememberme:"",

            user:""
        }
    },
    methods: {
        login_user(){
            let frm_data = new FormData();
            frm_data.append('email',this.email);
            frm_data.append('password',this.password);
            frm_data.append('rememberme',this.rememberme);

            let config ={
                hender:{
                    "Content-Type": "multipart/form/data"
                }
            };

            axios.post(this.$host_url+'user/login',frm_data,config)
            .then(response=>{
                console.log(response.data);
                let token   = response.data.token.token;
                let user_id = response.data.user.id;
                let user_name = response.data.user.name ;
                localStorage.setItem("user_name", user_name);
                console.log(user_id);

                if (response.data.status == true) {
                    localStorage.setItem("token", token);
                    localStorage.setItem("user_id", user_id);

                    // this.home.user = response.data.user;
                    this.user = response.data.user
                    // this.$router.push('/new_laravel/public/user');
                    window.location.href = "http://localhost/new_laravel/public/user";
                }

            })
            .catch(response=>{

            });
        },
    },
    mounted() {
        console.log('login Component')
    },
}
</script>

<style>

</style>
