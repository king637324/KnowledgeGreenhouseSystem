<template>
    <div id="bootstrap-sidebar">
        <div class="wrapper">
            <nav id="sidebar" ref="sidebar" :class="sidenavConfig.sidenavBgColor + ' ' + sidenavConfig.sidenavMainColor + ' ' + sidenavConfig.sidenavClass">
            <div class="sidebar-header border-bottom">
                <h3>
                    <router-link :to="header.href" class="w-100 sidebar-header navbar-brand">{{header.title}}</router-link>
                </h3>
            </div>

            <ul class="navbar-nav list-unstyled components">
                <li v-for="item in links" class="nav-item active">
                    <a v-if="item.links && item.links.length>0" 
                        class="nav-link dropdown-toggle collapsed" :href="'#nv'+item.label.toLowerCase().replace(' ','_')" 
                        data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                        <i v-if="item.icon" :class="'ml-1 fa ' + item.icon"></i> {{item.label}}
                        </a>
                    <!-- <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">Home</a> -->
                    <ul class="navbar-nav list-unstyled collapse" :id="'nv'+item.label.toLowerCase().replace(' ','_')">
                        <li class="nav-item" v-for="it in item.links">
                            <a class="nav-link" :href="it.href">{{it.label}}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
            <div id="content" style="width:100%"> 
                <nav v-if="hasNavbar && hasNavbar==true" :class="'shadow navbar navbar-expand-lg' + ' ' + sidenavConfig.sidenavBgColor + ' ' + sidenavConfig.sidenavMainColor + ' ' + sidenavConfig.navbarClass">
                    <button ref="sidebaricon" type="button" id="sidebarCollapse"  @click.prevent="toggleSidebar" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li v-for="item in navs" class="nav-item" :class="{'dropdown':item.navs && item.navs.length>0}">
                                <a v-if="item.navs && item.navs.length>0" class="nav-link dropdown-toggle" href="#" :id="'nv'+item.label.toLowerCase().replace(' ','_')" role="button" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{item.label}}
                                </a>
                                <div v-if="item.navs && item.navs.length>0" class="dropdown-menu" :class="{'show':selected===item.label}"
                                :ref="'nv'+item.label.toLowerCase().replace(' ','_')"
                                :aria-labelledby="'nv'+item.label.toLowerCase().replace(' ','_')">
                                        <div v-for="initem in item.navs" :is="isRoute(initem) ? 'router-link' : 'a'" :href="isRoute(initem) ? '#' : initem.href" :to="initem.href" :replace="initem.replace"
                                        :active-class="'parent-active'" :exact-active-class="'active'" class="dropdown-item">
                                        <i class="icon fa fa-fw" :class="{[initem.icon]: true}" v-if="initem.icon"></i>
                                        {{initem.label}}
                                    </div>
                                </div>
                                <a v-else class="nav-link" href="#">{{item.label}}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<style src="./sidebar.css" scoped></style>
<script>
    export default {
        data() {
            return {
            }
        },
        methods:{
            toggleSidebar() {
                this.$refs.sidebar.classList.toggle('active');
                this.$refs.sidebaricon.classList.toggle('active');
            },
            isRoute(l) {
                let resolver = this.$router.resolve(l.href);
                return resolver && resolver.route && resolver.route.matched.length>0;
            }
        },
        props:{
            sidenavConfig:{
                type:Object
            },
            links:{
                type:Array
            },
            navs:{
                type:Array
            },
            header:{
                type:Object
            },
            hasNavbar:{
                type:Boolean
            }
        }
    }
</script>
