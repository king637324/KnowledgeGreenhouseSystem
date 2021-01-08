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
                            <input type="text" value="" v-model="μm_gm" placeholder="請輸入值" style="width:13vmin">
                            <label>μm = {{ Math.round(μm_gm * 7.1416) }} g/㎡</label>
                            <br>
                            <input type="text" value="" v-model="gm_μm" placeholder="請輸入值"  style="width:13vmin">
                            <label>g/㎡ = {{ Math.round(gm_μm / 7.1416) }} μm</label>
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
