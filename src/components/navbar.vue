<template>

    <nav class="navbar navbar-expand-md fixed-top animated  navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href='http://localhost:8080/'>
        <img src=".././assets/images/logo.png" class="logo"></a>
         <button class="navbar-toggler custom-toggler" type="button"  data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div v-if="display" class="collapse navbar-collapse"  id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>
             <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li @click="hideNav" class="nav-item"><router-link class="nav-link" to="/">Home</router-link></li>
                <li @click="hideNav" class="nav-item"><router-link class="nav-link" to="/farmProducts"> Farm Products</router-link></li>
                <li @click="hideNav" class="nav-item"><router-link class="nav-link" to="/farmers"> Farmers</router-link></li>
                <li @click="hideNav" class="nav-item"><router-link class="nav-link" to="/agroBusiness"> Experts | Agrobusiness</router-link></li>
                
                <li v-if="sessionPresent" class="removeAnimate nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hi! {{userSessionData.username.slice(0, 5) || userSessionData.username}}
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item" @click="logoutUser" style="cursor:pointer">Log out</div>
                    </div>
                </li>
                
                <li v-if="!sessionPresent" class="nav-item"><router-link class="nav-link" to="/login">Login</router-link></li>
                <li v-if="!sessionPresent" class="nav-item"><router-link class="nav-link" to="/signup">Sign Up</router-link></li> 
            </ul>
        </div>
    </div>

    </nav>



</template>

  <style scope>
            .custom-toggler.navbar-toggler { 
            border-color: #31C929; 
            /* style="border:2px solid #31C929" */
        } 
        .custom-toggler.navbar-toggler:active{
            border-color: #31C929; 
        }
        </style>
<script>
// import {bus} from '../main';

export default {
    data(){
        return{
            sessionPresent:false,
            userSessionData:[],
            display:true
        }
    },
    created() {
       this.sessionMethod();
       
    },
    updated(){
        this.display=true;
    },
    methods:{
        logoutUser() {
            this.$session.destroy()
            if (!this.$session.exists()) {
                this.sessionPresent=false;
                this.$router.push('/')
            }
        
    },
        sessionMethod(){
             if (this.$session.exists()) {
            this.sessionPresent=true;
            this.userSessionData = this.$session.get('user_id');
            // console.log()
        }
        },
        hideNav(){
            this.display=false;
        }
    }
}
</script>