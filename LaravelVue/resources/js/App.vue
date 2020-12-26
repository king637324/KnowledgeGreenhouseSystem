<template>
    <main>
        <!-- <Header /> -->
        <Navbar />
        <div id="layoutSidenav">
            <!-- <Sidrbar /> -->
            <div id="layoutSidenav_content">
                <main>
                    <router-view></router-view>
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
    import Foot from './components/Foot.vue';
    import Navbar from './components/Navbar.vue';
    import BootstrapSideBar from 'b-sidebar';

    export default {
        components:{
            Header,
            Sidrbar,
            Foot,
            Navbar,
            BootstrapSideBar
        }
    }
</script>
