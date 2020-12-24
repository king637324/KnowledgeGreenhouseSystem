<template>

    <main>
        <Header />
        <div id="layoutSidenav">
            <Sidrbar />
            <div id="layoutSidenav_content">
                <main>
                    <router-view></router-view>
                    <!-- <Welcome /> -->

                    <Foot />
                </main>
            </div>
        </div>

        <FlashMessage position="right bottom"></FlashMessage>

    </main>
</template>

<script>
    import Header from './components/Header.vue';
    import Sidrbar from './components/Sidrbar.vue';
    import Welcome from './views/Welcome.vue';
    import Foot from './components/Foot.vue';

    export default {
        components:{
            Header,
            Sidrbar,
            Welcome,
            Foot
        }
    }
</script>
