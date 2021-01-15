<template>



    <main>
        <Sidrbar/>
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
    import Sidrbar from './components/Sidrbar.vue';
    import Foot from './components/Foot.vue';
    import Navbar from './components/Navbar.vue';

    export default {
        components:{
            Header,
            Sidrbar,
            Foot,
            Navbar,
            BootstrapSideBar
        },

    }
</script>
