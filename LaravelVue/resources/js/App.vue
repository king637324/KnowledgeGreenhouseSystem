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

    import Sidebar from './components/Sidebar.vue';
    import Foot from './components/Foot.vue';

    export default {
        components:{
            Sidebar,
            Foot,
            BootstrapSideBar
        },

    }
</script>
