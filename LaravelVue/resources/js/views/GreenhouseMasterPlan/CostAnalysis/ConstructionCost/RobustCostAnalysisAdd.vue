<template>
    <div>
        <br>
        <h2>強固型溫室</h2>
        <hr>

        <!-- <v-form v-on:submit.prevent="createRobust" v-model="valid" lazy-validation v-if="$auth.user().identity === '管理者' || $auth.user().identity === '專家'"> -->
        <v-form v-on:submit.prevent="createRobust">
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">溫室型材</span></p>
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
                <tr align="center">
                    <td>標準型材</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>高強型材</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>耐蝕型材</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>高強高耐蝕型材</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">屋頂形式</span></p>
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
                <tr align="center">
                    <td>圓頂UBP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>圓力霸UTP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>山型VBP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>山力霸VTP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>W型力霸</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>單斜SP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">上拱距</span></p>
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
                <tr align="center">
                    <td>2M</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>1.33M</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>1M</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">基礎</span></p>
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
                <tr align="center">
                    <td>獨立基礎</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>連續樑</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>快速基礎</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">跨距</span></p>
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
                <tr align="center">
                    <td>6m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>7m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>8m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>9m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>10m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">肩高</span></p>
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
                <tr align="center">
                    <td>3m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>3.5m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>4m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>4.5m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>5m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">長度</span></p>
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
                <tr align="center">
                    <td>30m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>60m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>90m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>120m</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">連續性</span></p>
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
                <tr align="center">
                    <td>獨棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>二連棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>三連棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>四連棟</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <p><span class="badge badge-pill badge-secondary" style="font-size: 1.8vmin">披覆膜</span></p>
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
                <tr align="center">
                    <td>PE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>PO</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>硬質塑材</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>ETFE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="center">
                    <td>玻璃</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <hr>

            <div class="text-right">
                <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>創建</button>
            </div>

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

