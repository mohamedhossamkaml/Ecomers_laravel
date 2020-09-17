<template>
    <div class="headers">
        <nav class="navbar navbar-dark bg-dark">
            <div class="nav_aray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <NavRouts/>
                        </div>
                        <div class="col-md-3">
                            <div class="header-right">
                            <div class="">
                                <div class="collapse" id="navbarToggleExternalContent">
                                    <div class="bg-dark p-4">
                                    <h5 class="text-white h4">Collapsed content</h5>
                                    <span class="text-muted">Toggleable via the navbar brand.</span>
                                    </div>
                                </div>
                                <nav class="navbar-dark float-right bg-dark">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    </button>
                                </nav>
                                </div>
                                <!-- <ul class="list-unstyled list-inline">
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
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End header area -->

        </nav> <!-- Navbar content -->
    </div>
</template>

<script>
import user from "./LoginComponents"
import NavRouts from "../components/blgins/NavbarRoutes"
export default {
    name:'navbar',
    props:['home','login'],
    components:{
        user,
        NavRouts
    },
    data() {
        return {

        }
    },
    methods: {
    //     user_list(){
    //         axios.get(this.$host_url+"user/list" + localStorage.getItem("user_id"),
    //         {
    //             heanders:{
    //                 Authorization:"Bearer " + localStorage.getItem("token")
    //             }
    //         })
    //         .then(res =>{
    //             this.users = res.data;
    //         });
    //     } 
    },
    mounted() {

    },

}
</script>



