<template>
    <div>
        <br>
        <h2>國際鋼材</h2>
        <!-- <button type="button" class="btn btn-danger" v-on:click="check">檢查</button> -->
        <hr>

        <v-container-fluid>
            <div class="justify-content-around">
                <v-row>
                    <v-col md="1"></v-col>
                    <v-col md="2">
                        <!-- LME倫敦金屬價格 -->
                        <div>
                            <!-- <h4 align="center">金屬價格</h4> -->
                            <br>
                            <table align="center" style="border:1px solid black;" border='1' >
                                <thead>
                                    <tr>
                                        <td colspan="2" class="table-dark"> {{MetalDate}} </td>
                                    </tr>
                                </thead>
                                <tbody v-for="(metal, index) in MetalPrice" :key="index">
                                    <tr>
                                        <td align="center">
                                            <a :href="metal[3]" target="_blank" style="color:gray;"> {{metal[0]}} </a>
                                        </td>
                                        <td align="right">
                                            {{metal[1]}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style = "font-size: 1.5vmin;">
                                資料來源：
                                <a href="https://www.lme.com/" target="_blank" style="color:gray;">倫敦金屬交易所</a>
                            </p>
                        </div>
                    </v-col>
                    <v-col md="1"></v-col>
                    <v-col md="7">
                        <!-- LME倫敦金屬價格 -->
                        <div>
                            <img src="/image/steel.png" width="800px">
                            <img src="/image/country_steel.jpeg" width="800px">
                        </div>
                    </v-col>
                    <v-col md="1"></v-col>
                </v-row>
            </div>
        </v-container-fluid>



    </div>
</template>

<script>
export default {
    data(){
        return{
            MaterialCostjson: [],
            LMEjson:[],
            USDjson:[],
            PipeData:[],
            ProfileData:[],

            USD:null,   // 美津
            SteelPrice:null, //鋼料價格

            /* LME 倫敦金屬價格 */
            MetalList:["鋁", "銅", "鋅", "鎳", "鉛", "錫", "鋁合金", "特種鋁合金", "鈷", "金", "銀", "廢鋼", "鋼筋"], // LME金屬排序
            MetalDate:null,
            MetalPrice:[],

            // 管材
            checkedPipe:[],
            selectPipe:[],
            selectPipeRank:[],
            selectPipeRankValue:[],
            PipeSpeed:null,
            PipeStructuralRisk:null,
            PipeCorrosive:null,
            PipeWeightiness:null,
            PipeCost:null,
            PipeTotal:null,

            // 型材
            checkedProfile:[],
            selectProfile:[],
            selectProfileRank:[],
            selectProfileRankValue:[],
            ProfileSpeed:null,
            ProfileStructuralRisk:null,
            ProfileCorrosive:null,
            ProfileWeightiness:null,
            ProfileCost:null,
            ProfileTotal:null,

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){    //取的資料庫資料，將資料轉成JSON
            // LME 倫敦金屬交易所
            const LMEMetalPrice = await fetch('/LMEMetalPriceJSON',  {
                method: 'GET',
            });
            this.LMEjson = await LMEMetalPrice.json();

            this.MetalDate = this.LMEjson[0][2];

            // 將LME倫敦金屬價格，照MetalList的順序排列
            for (var i = 0; i < this.MetalList.length; i++) {
                for (var j = 0; j < this.LMEjson.length; j++) {
                    if (this.MetalList[i] == this.LMEjson[j][0]) {
                        this.MetalPrice.push(this.LMEjson[j]);
                    }
                }
            }

            // 溫室構造成本
            const MaterialCostJSON = await fetch('/MaterialCostJSON',  {
                method: 'GET',
            });
            this.MaterialCostjson = await MaterialCostJSON.json();

            // 美金價格
            const USDJSON = await fetch('/USDPriceJSON',  {
                method: 'GET',
            });
            this.USDjson = await USDJSON.json();
            this.USD = this.USDjson[0].USD; // 抓取美金價格

            this.SteelPrice = Math.round(this.LMEjson[0][1]/this.USD)+1; //計算鋼料價格

            for (var i = 0; i < this.MaterialCostjson.length; i++) {
                var data=[];
                var dataCalculator=[];
                var Cost = this.SteelPrice;

                // dataCalculator 做 成本的計算
                dataCalculator.push(this.MaterialCostjson[i].HighStrengthMaterial);
                dataCalculator.push(this.MaterialCostjson[i].SteelBillet);
                dataCalculator.push(this.MaterialCostjson[i].HotRolledSteelSheet);
                dataCalculator.push(this.MaterialCostjson[i].ColdRolledSteelSheet);
                dataCalculator.push(this.MaterialCostjson[i].ContinuousHotDipGalvanizing);
                dataCalculator.push(this.MaterialCostjson[i].ContinuousPaint);
                dataCalculator.push(this.MaterialCostjson[i].ColdForming);
                dataCalculator.push(this.MaterialCostjson[i].Welding);
                dataCalculator.push(this.MaterialCostjson[i].Processing);
                dataCalculator.push(this.MaterialCostjson[i].AfterHotDipGalvanizing);
                dataCalculator.push(this.MaterialCostjson[i].Galvalume);
                dataCalculator.push(this.MaterialCostjson[i].MagnesiumAluminumZincPlating);
                dataCalculator.push(this.MaterialCostjson[i].AfterBaking);

                for(var j = 0; j < dataCalculator.length; j++) {
                    // 確認是否有經過那道製程，有那道製程才能加入成本的計算
                    if(dataCalculator[j] != " " && dataCalculator[j] !=""){
                        Cost = Cost + parseFloat(dataCalculator[j]);
                    }
                }

                if(this.MaterialCostjson[i].Type == "管材"){
                    data.push(this.MaterialCostjson[i]);
                    data.push(Cost);
                    this.PipeData.push(data);
                }else if(this.MaterialCostjson[i].Type == "型材"){
                    data.push(this.MaterialCostjson[i]);
                    data.push(Cost);
                    this.ProfileData.push(data);
                }
            }

        },updateSelectPipe(){   // 更新所選擇的管材

            this.selectPipe = [];

            for (var i = 0; i < this.PipeData.length; i++) {
                for (var j = 0; j < this.checkedPipe.length; j++) {
                    if(this.checkedPipe[j] == this.PipeData[i][0].id)  this.selectPipe.push(this.PipeData[i]);
                }
            }

        },updatePipeCompare(){  // 更新所選管材的參數比較
            this.PipeTotal = parseFloat(this.PipeSpeed) + parseFloat(this.PipeStructuralRisk) + parseFloat(this.PipeCorrosive) + parseFloat(this.PipeWeightiness) + parseFloat(this.PipeCost);

            var Compare = 0,selectComparelist = [],rank = [];
            // 計算 比較值
            for (var i = 0; i < this.selectPipe.length; i++) {
                Compare = (this.selectPipe[i][0].Speed * Math.floor(parseFloat(this.PipeSpeed) / this.PipeTotal * 100) / 100) + (this.selectPipe[i][0].StructuralRisk * Math.floor(parseFloat(this.PipeStructuralRisk) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i][0].Corrosive * Math.floor(parseFloat(this.PipeCorrosive) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i][0].Weight * Math.floor(parseFloat(this.PipeWeightiness) / this.PipeTotal * 100) / 100) + ( this.selectPipe[i][1] * Math.floor(parseFloat(this.PipeCost) / this.PipeTotal * 100) / 100);
                Compare = Compare.toFixed(2);

                rank = [];
                rank.push(this.selectPipe[i][0].id);
                rank.push(Compare);
                rank.push(0);
                selectComparelist.push(rank);

            }

            /* 將所勾選的 管材進行氣泡排序 */
            var temp;
            for (var i = selectComparelist.length - 1; i > 0; i--) {
                for (var j = 0; j <= i - 1; j++) {
                    if (selectComparelist[j][1] > selectComparelist[j + 1][1]) {
                        temp = selectComparelist[j];
                        selectComparelist[j] = selectComparelist[j + 1];
                        selectComparelist[j + 1] = temp;
                    }
                }
            }

            /* 將所勾選的 管材進行排名 */
            for (var i = 0; i < selectComparelist.length; i++) {
                var a=i;
                selectComparelist[i][2] = ++a;
            }

            /* 將所勾選的 管材進行id序號的氣泡排序，才能使顯示是照順序的 */
            for (var i = selectComparelist.length - 1; i > 0; i--) {
                for (var j = 0; j <= i - 1; j++) {
                    if (selectComparelist[j][0] > selectComparelist[j + 1][0]) {
                        temp = selectComparelist[j];
                        selectComparelist[j] = selectComparelist[j + 1];
                        selectComparelist[j + 1] = temp;
                    }
                }
            }

            this.selectPipeRank = [],  // 排名
            this.selectPipeRankValue = []; // 排名值

            /* 將所勾選的 管材 比較值與排名 顯示 */
            for (var i = 0; i < selectComparelist.length; i++) {
                this.selectPipeRankValue.push(selectComparelist[i][2]);
                this.selectPipeRank.push(selectComparelist[i][1]);
            }

        },updateSelectProfile(){    // 更新所選擇的型材
            this.selectProfile = [];

            for (var i = 0; i < this.ProfileData.length; i++) {
                for (var j = 0; j < this.checkedProfile.length; j++) {
                    if(this.checkedProfile[j] == this.ProfileData[i][0].id)  this.selectProfile.push(this.ProfileData[i]);
                }

            }

        },updateProfileCompare(){   // 更新所選型材的參數比較
            this.ProfileTotal = parseFloat(this.ProfileSpeed) + parseFloat(this.ProfileStructuralRisk) + parseFloat(this.ProfileCorrosive) + parseFloat(this.ProfileWeightiness) + parseFloat(this.ProfileCost);

            var Compare = 0,selectComparelist = [],rank = [];
            // 計算 比較值
            for (var i = 0; i < this.selectProfile.length; i++) {
                Compare = (this.selectProfile[i][0].Speed * Math.floor(parseFloat(this.ProfileSpeed) / this.ProfileTotal * 100) / 100) + (this.selectProfile[i][0].StructuralRisk * Math.floor(parseFloat(this.ProfileStructuralRisk) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i][0].Corrosive * Math.floor(parseFloat(this.ProfileCorrosive) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i][0].Weight * Math.floor(parseFloat(this.ProfileWeightiness) / this.ProfileTotal * 100) / 100) + ( this.selectProfile[i][1] * Math.floor(parseFloat(this.ProfileCost) / this.ProfileTotal * 100) / 100);
                Compare = Compare.toFixed(2);

                rank = [];
                rank.push(this.selectProfile[i][0].id);
                rank.push(Compare);
                rank.push(0);
                selectComparelist.push(rank);

            }

            /* 將所勾選的 型材進行氣泡排序 */
            var temp;
            for (var i = selectComparelist.length - 1; i > 0; i--) {
                for (var j = 0; j <= i - 1; j++) {
                    if (selectComparelist[j][1] > selectComparelist[j + 1][1]) {
                        temp = selectComparelist[j];
                        selectComparelist[j] = selectComparelist[j + 1];
                        selectComparelist[j + 1] = temp;
                    }
                }
            }

            /* 將所勾選的 型材進行排名 */
            for (var i = 0; i < selectComparelist.length; i++) {
                var a=i;
                selectComparelist[i][2] = ++a;
            }

            /* 將所勾選的 型材進行id序號的氣泡排序，才能使顯示是照順序的 */
            for (var i = selectComparelist.length - 1; i > 0; i--) {
                for (var j = 0; j <= i - 1; j++) {
                    if (selectComparelist[j][0] > selectComparelist[j + 1][0]) {
                        temp = selectComparelist[j];
                        selectComparelist[j] = selectComparelist[j + 1];
                        selectComparelist[j + 1] = temp;
                    }
                }
            }

            this.selectProfileRank = [],  // 排名
            this.selectProfileRankValue = []; // 排名值

            /* 將所勾選的 型材 比較值與排名 顯示 */
            for (var i = 0; i < selectComparelist.length; i++) {
                this.selectProfileRankValue.push(selectComparelist[i][2]);
                this.selectProfileRank.push(selectComparelist[i][1]);
            }

        }
    }
}
</script>

