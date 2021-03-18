<template>
    <div>
        <br>
        <h2>簡易型溫室</h2>
        <hr>

        <v-form v-on:submit.prevent="createCrop" v-model="valid" lazy-validation v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'">
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">溫室管材</span></p>
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1'>
                <thead align="center" class="table-active">
                    <tr>
                        <td>項目</td>
                        <td>成本性</td>
                        <td>結構風險</td>
                        <td>作業難度</td>
                    </tr>
                </thead>
                <!-- <tr v-for="(simple, index) in SimpleData" :key="index">
                    <td>{{simple[1][0].GreenhouseId}}</td>
                    <td>{{simple[1][0].WindDirection}}</td>
                </tr> -->
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">圓頂形式</span></p>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">圓拱距</span></p>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">基礎</span></p>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">跨距</span></p>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">肩高</span></p>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">長度</span></p>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">連續性</span></p>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">披覆膜</span></p>
            <hr>
            
        </v-form>

        

        
    </div>

</template>

<script>

export default {
    data() {
        return {

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        // this.$auth.user();
        // console.log(this.$auth.user()); // 可以取得使用者資料
    },
    methods: {
    },
}
</script>

