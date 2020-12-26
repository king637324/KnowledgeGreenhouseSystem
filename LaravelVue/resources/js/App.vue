<template>
    <!-- <main>
        <Header />
        <div id="layoutSidenav">
            <Sidrbar />
            <Navbar />
            <div id="layoutSidenav_content">
                <main>
                    <router-view></router-view>
                    <Foot />
                </main>
            </div>
        </div>

        <FlashMessage position="right bottom"></FlashMessage>

    </main> -->

    <v-app class="grey lighten-4">
        <Navbar />
        <v-content>
            <router-view></router-view>
        </v-content>



    </v-app>

</template>

<script>
    import Header from './components/Header.vue';
    import Sidrbar from './components/Sidrbar.vue';
    import Foot from './components/Foot.vue';
    import Navbar from './components/Navbar.vue';

    export default {
        components:{
            Header,
            Sidrbar,
            Foot,
            Navbar
        }
    }
</script>
