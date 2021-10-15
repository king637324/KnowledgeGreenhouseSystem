<template>
  <div id="app">
    <BootstrapSideBar :sidenavConfig="sidenavConfig" :header="header" :hasNavbar="hasNavbar" :links="sidelinks" :navs="headerLinks">
      <router-view/>
    </BootstrapSideBar>
  </div>
</template>
<style>
.sidenav-custom-class{
    /* min-width:260px !important;
    max-width:260px!important; */
}

</style>

<script>
import VueRouter from 'vue-router';
import BootstrapSideBar from '../src/main';
export default{
  name: 'App',
  components:{
    BootstrapSideBar
  },
  data() {
    return{
        sidenavConfig:{
            sidenavMainColor:'bg-primary',
            sidenavBgColor:'navbar-dark',
            navbarClass:'custom-one',
            sidenavClass:'sidenav-custom-class'
        },
        header:{
            title:'test',
            href:'home'
        },
        hasNavbar:true,
        headerLinks:[
            {
                label: 'CHICAGO', href: '#',navs:[
                {label: 'About Us 1', href:"/about"},
                {label: 'About Us 2', href:"#"}
            ]},
            {label: 'CHICAGO 2', href: '#',navs:[
                {label: 'About Us 1', href:"/about"},
                {label: 'About Us 2', href:"#"}
            ]
            }
        ],
        sidelinks:[
            {label: 'About Us', href:"#",icon:'fa-bell-o',links:[
                {label: 'About Us 1', href:"/about"},
                {label: 'About Us 2', href:"#"}
            ]},
            {label: 'About', href:"#",links:[
                {label: 'About Us 1', href:"/about"},
                {label: 'About Us 2', href:"#"}
            ]}
        ],
        }
  }
}
</script>