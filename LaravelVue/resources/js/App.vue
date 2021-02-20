<template>



    <main>
        <Sidebar/>
        <v-content>
            <router-view></router-view>
        </v-content>
        <Foot/>
        <FlashMessage position="right bottom"></FlashMessage>
    </main>

</template>

<script>
    import BootstrapSideBar from 'b-sidebar';

    import Header from './components/Header.vue';
    import Sidebar from './components/Sidebar.vue';
    import Foot from './components/Foot.vue';
    import Navbar from './components/Navbar.vue';

    export default {
        components:{
            Header,
            Sidebar,
            Foot,
            Navbar,
            BootstrapSideBar
        },

    }
</script>
