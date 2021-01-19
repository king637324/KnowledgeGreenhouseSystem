<template>
    <div>
        <br>
        <h3>各單位關係換算</h3>
        <hr>

        <div class="row">
            <!-- 鍍鋅膜厚單位換算 -->
            <div class="col-xl-3">
                <div class="card mb-2">
                    <div class="card-header">
                        <b-icon icon="bar-chart-fill"></b-icon>
                        鍍鋅膜厚單位換算
                    </div>
                    <div class="card-body">
                        <h5>鍍鋅膜厚單位換算有兩種：<br>(1)μm、(2)g/㎡</h5>
                        <h6>下表為常用鍍鋅膜厚換算表</h6>
                        <table width=150vmin style="border:1px solid black; font-size: 2vmin" border='1'>
                            <thead class="table-active">
                                <tr align="center">
                                    <td>μm</td>
                                    <td>g/㎡</td>
                                </tr>
                            </thead>
                            <tr align="center">
                                <td>18</td>
                                <td>130</td>
                            </tr>
                            <tr align="center">
                                <td>19</td>
                                <td>136</td>
                            </tr>
                            <tr align="center">
                                <td>38</td>
                                <td>271</td>
                            </tr>
                            <tr align="center">
                                <td>49</td>
                                <td>350</td>
                            </tr>
                            <tr align="center">
                                <td>66</td>
                                <td>471</td>
                            </tr>
                            <tr align="center">
                                <td>84</td>
                                <td>600</td>
                            </tr>
                        </table>

                        <br><br>
                        <h5>以下為鍍鋅膜厚換算小程式</h5>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <v-text-field
                                            label="請輸入μm值"
                                            v-model="μm_gm"
                                            height = 5vmin
                                        ></v-text-field>
                                    </td>
                                    <td>
                                        <label>μm = {{ Math.round(μm_gm * 7.1416) }} g/㎡</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <v-text-field
                                            label="請輸入gm值"
                                            v-model="gm_μm"
                                        ></v-text-field>
                                    </td>
                                    <td>
                                        <label>g/㎡ = {{ Math.round(gm_μm / 7.1416) }} μm</label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <!-- <div class="card mb-2">
                    <div class="card-header">
                        <b-icon icon="bar-chart-fill"></b-icon>
                        種植地區環境分析
                    </div>
                    <div class="card-body">

                    </div>
                </div> -->
            </div>

            <div class="col-xl-3">
                <!-- <div class="card mb-2">
                    <div class="card-header">
                        <b-icon icon="bar-chart-fill"></b-icon>
                        種植地區環境分析
                    </div>
                    <div class="card-body">

                    </div>
                </div> -->
            </div>

            <div class="col-xl-3">
                <!-- <div class="card mb-2">
                    <div class="card-header">
                        <b-icon icon="bar-chart-fill"></b-icon>
                        種植地區環境分析
                    </div>
                    <div class="card-body">

                    </div>
                </div> -->
            </div>

        </div>




    </div>

</template>

<script>
export default {
    data(){
        return{
            // 鍍鋅膜厚單位換算
            μm_gm:null,
            gm_μm:null,
        }
    },
    created:function(){  // 網頁載入時，一開始就載入

    },
    methods:{
    }
}
</script>
