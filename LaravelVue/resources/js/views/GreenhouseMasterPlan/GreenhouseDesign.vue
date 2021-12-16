<template>
    <div>
        <br>
        <h3 id="溫室設計">
            溫室設計
            <!-- <button  class="btn btn-primary" v-scroll-to="{ el: '#綜合分析' }">
                綜合分析
            </button> -->
        </h3>
        <hr>


        <v-container-fluid>
            <v-row>
                <v-col md="2">
                    <div>
                        <h3>
                            <img src ="/images/GreenhouseDesigner/簡易溫室.png" class="table-image"/><br>
                            簡易溫室(UP)
                        </h3>
                        <input type="checkbox" id="UP540_185" value="UP540_185" v-model="checkedNames" v-on:change="updateChart">
                        <label>UP540_185</label>
                        <input type="checkbox" id="UP600_205" value="UP600_205" v-model="checkedNames" v-on:change="updateChart">
                        <label>UP600_205</label><br>
                        <input type="checkbox" id="UP720_180" value="UP720_180" v-model="checkedNames" v-on:change="updateChart">
                        <label>UP720_180</label>
                        <input type="checkbox" id="UP720_400" value="UP720_400" v-model="checkedNames" v-on:change="updateChart">
                        <label>UP720_400</label><br>
                        <input type="checkbox" id="UP800_400" value="UP800_400" v-model="checkedNames" v-on:change="updateChart">
                        <label>UP800_400</label>
                        <input type="checkbox" id="UP800_500" value="UP800_500" v-model="checkedNames" v-on:change="updateChart">
                        <label>UP800_500</label>    
                    </div>                    
                </v-col>
                <v-col md="1"></v-col>
                <v-col md="2">
                    <div>
                        <h3>
                            <img src ="/images/GreenhouseDesigner/圓頂溫室.png" class="table-image"/><br>
                            圓頂溫室(UBP)
                        </h3>
                        <input type="checkbox" id="UBP520_300" value="UBP520_300" v-model="checkedNames" v-on:change="updateChart">
                        <label>UBP520_300</label>
                        <input type="checkbox" id="UBP620_300" value="UBP620_300" v-model="checkedNames" v-on:change="updateChart">
                        <label>UBP620_300</label><br>
                        <input type="checkbox" id="UBP680_300" value="UBP680_300" v-model="checkedNames" v-on:change="updateChart">
                        <label>UBP680_300</label>
                        <input type="checkbox" id="UBP680_350" value="UBP680_350" v-model="checkedNames" v-on:change="updateChart">
                        <label>UBP680_350</label>
                    </div>
                </v-col>
                <v-col md="1"></v-col>
                <v-col md="2">
                    <div>
                        <h3>
                            <img src ="/images/GreenhouseDesigner/圓頂溫室.png" class="table-image"/><br>
                            圓頂力霸溫室(UTP)
                        </h3>
                        <input type="checkbox" id="UTP960_350" value="UTP960_350" v-model="checkedNames" v-on:change="updateChart">
                        <label>UTP960_350</label>
                        <input type="checkbox" id="UTP1040_350" value="UTP1040_350" v-model="checkedNames" v-on:change="updateChart">
                        <label>UTP1040_350</label><br>
                        <input type="checkbox" id="UTP1140_350" value="UTP1140_350" v-model="checkedNames" v-on:change="updateChart">
                        <label>UTP1140_350</label>
                        <input type="checkbox" id="UTP1140_400" value="UTP1140_400" v-model="checkedNames" v-on:change="updateChart">
                        <label>UTP1140_400</label>
                    </div>
                </v-col>
                <v-col md="1"></v-col>
                <v-col md="2">
                    <div>
                        <h3>
                            <img src ="/images/GreenhouseDesigner/斜頂溫室.png" class="table-image"/><br>
                            斜頂溫室(SP)
                        </h3>
                        <input type="checkbox" id="SP1100_12" value="SP1100_12" v-model="checkedNames" v-on:change="updateChart">
                        <label>SP1100_12</label>
                        <input type="checkbox" id="SP1100_20" value="SP1100_20" v-model="checkedNames" v-on:change="updateChart">
                        <label>SP1100_20</label><br>
                        <input type="checkbox" id="SP1100_23" value="SP1100_23" v-model="checkedNames" v-on:change="updateChart">
                        <label>SP1100_23</label>
                        <input type="checkbox" id="SP1100_30" value="SP1100_30" v-model="checkedNames" v-on:change="updateChart">
                        <label>SP1100_30</label>
                    </div>
                </v-col>
                <v-col md="1"><button type="button" class="btn btn-secondary" @click="selectAll">全部勾選</button></v-col>
            </v-row>
            <v-row>
                <v-col md="2">
                    <h3>
                        <img src ="/images/GreenhouseDesigner/2連棟山型溫室.png" class="table-image"/><br>
                        Velno溫室(WTG-640)
                    </h3>
                    <input type="checkbox" id="WTG640_300" value="WTG640_300" v-model="checkedNames" v-on:change="updateChart">
                    <label>WTG640_300</label>
                    <input type="checkbox" id="WTG640_350" value="WTG640_350" v-model="checkedNames" v-on:change="updateChart">
                    <label>WTG640_350</label><br>
                    <input type="checkbox" id="WTG640_400" value="WTG640_400" v-model="checkedNames" v-on:change="updateChart">
                    <label>WTG640_400</label>
                </v-col>
                <v-col md="1"></v-col>
                <v-col md="2">
                    <h3>
                        <img src ="/images/GreenhouseDesigner/3連棟山型溫室.png" class="table-image"/><br>
                        Velno溫室(WTG-960)
                    </h3>
                    <input type="checkbox" id="WTG960_300" value="WTG960_300" v-model="checkedNames" v-on:change="updateChart">
                    <label>WTG960_300</label>
                    <input type="checkbox" id="WTG960_350" value="WTG960_350" v-model="checkedNames" v-on:change="updateChart">
                    <label>WTG960_350</label><br>
                    <input type="checkbox" id="WTG960_400" value="WTG960_400" v-model="checkedNames" v-on:change="updateChart">
                    <label>WTG960_400</label>
                </v-col>
                <v-col md="1"></v-col>
                <v-col md="2">
                    <h3>
                        <img src ="/images/GreenhouseDesigner/2連棟山型溫室.png" class="table-image"/><br>
                        山型溫室(VBP)
                    </h3>
                    <input type="checkbox" id="VBP820_300" value="VBP820_300" v-model="checkedNames" v-on:change="updateChart">
                    <label>VBP820_300</label>
                    <input type="checkbox" id="VBP860_300" value="VBP860_300" v-model="checkedNames" v-on:change="updateChart">
                    <label>VBP860_300</label><br>
                    <input type="checkbox" id="VBP860_350" value="VBP860_350" v-model="checkedNames" v-on:change="updateChart">
                    <label>VBP860_350</label>
                </v-col>
                <v-col md="1"></v-col>
                <v-col md="2">
                    <h3>
                        <img src ="/images/GreenhouseDesigner/3連棟山型溫室.png" class="table-image"/><br>
                        山型力霸溫室(VTP)
                    </h3>
                    <input type="checkbox" id="VTP800_400" value="VTP800_400" v-model="checkedNames" v-on:change="updateChart">
                    <label>VTP800_400</label>
                    <input type="checkbox" id="VTP800_450" value="VTP800_450" v-model="checkedNames" v-on:change="updateChart">
                    <label>VTP800_450</label><br>
                    <input type="checkbox" id="VTP800_500" value="VTP800_500" v-model="checkedNames" v-on:change="updateChart">
                    <label>VTP800_500</label>
                </v-col>
                <v-col md="1"><button type="button" class="btn btn-danger"  @click="ChartClear">清空勾選</button></v-col>
            </v-row>
        </v-container-fluid>
        <hr>


        <div style="min-width: 135vmin; max-width: 100%; overflow-x: scroll;">
            <table class="table" align="center" style="border:1px solid #dee2e6;" border='1' >
                <thead align="center" class="table-active">
                    <tr>
                        <td>溫室代號</td>
                        <td>風向</td>
                        <td>風速(m/s)</td>
                        <td>屋斜角α</td>
                        <td>肩高h(m)</td>
                        <td>跨距w(m)</td>
                        <td>寬度w(m)</td>
                        <td>棟高h(m)</td>
                        <td>弦高s(m)</td>
                        <td>柱高t(m)</td>
                        <td>平均風壓a(Pa)</td>
                        <td>平均風壓b(Pa)</td>
                        <td>平均風壓c(Pa)</td>
                        <td>平均風壓d(Pa)</td>
                        <td>平均風壓e(Pa)</td>
                        <td>平均風壓f(Pa)</td>
                        <td>平均風壓g(Pa)</td>
                        <td>平均風壓h(Pa)</td>
                        <td>最大風速(m/s)</td>
                        <td>風壓圖1</td>
                        <td>風壓圖2</td>
                        <td>風壓圖3</td>
                        <td>風場圖</td>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr v-for="(data, index) in checkData" :key="index">
                        <td>{{data[1][0].GreenhouseId}}</td>
                        <td>{{data[1][0].WindDirection}}</td>
                        <td>{{data[1][0].WindSpeed}}</td>
                        <td> {{data[6]}} </td>
                        <td> {{data[7]}} </td>
                        <td> {{data[8]}} </td>
                        <td> {{data[2]}} </td>
                        <td> {{data[5]}} </td>
                        <td> {{data[4]}} </td>
                        <td> {{data[3]}} </td>
                        <td> {{data[1][0].AverageWindPressure_a}} </td>
                        <td> {{data[1][0].AverageWindPressure_b}} </td>
                        <td> {{data[1][0].AverageWindPressure_c}} </td>
                        <td> {{data[1][0].AverageWindPressure_d}} </td>
                        <td> {{data[1][0].AverageWindPressure_e}} </td>
                        <td> {{data[1][0].AverageWindPressure_f}} </td>
                        <td> {{data[1][0].AverageWindPressure_g}} </td>
                        <td> {{data[1][0].AverageWindPressure_h}} </td>
                        <td> {{data[1][0].MaxWindSpeed}} </td>
                        <td>
                            <img :src ="data[1][0].WindPressureChart_1 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="data[1][0].WindPressureChart_2 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="data[1][0].WindPressureChart_3 " class="table-image"/>
                        </td>
                        <td>
                            <img :src ="data[1][0].WindFieldMap " class="table-image"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            Fluidjson: [],
            checkData:[],
            checkedNames: [],
            
            /* 簡易型溫室 */
            SelectSimple:[],
            SimpleCostratiosJSON: [],               // 簡易型各建構項目比例
            SimpleCostratios: [],               // 簡易型各建構項目比例
            SimpleCircularArchDistancesJSON: [],    // 簡易型圓拱距
            SimpleCircularArchDistances: [],    // 簡易型圓拱距
            SimpleCoatingFilmsJSON: [],             // 簡易型披覆膜
            SimpleCoatingFilms: [],             // 簡易型披覆膜
            SimpleContinuitysJSON: [],              // 簡易型連續性
            SimpleContinuitys: [],              // 簡易型連續性
            SimpleDomeFormsJSON: [],                // 簡易型圓頂形式
            SimpleDomeForms: [],                // 簡易型圓頂形式
            SimpleFoundationsJSON: [],              // 簡易型基礎
            SimpleFoundations: [],              // 簡易型基礎
            SimpleGreenhousePipesJSON: [],          // 簡易型溫室管材
            SimpleGreenhousePipes: [],          // 簡易型溫室管材
            SimpleLengthsJSON: [],                  // 簡易型長度
            SimpleLengths: [],                  // 簡易型長度
            SimpleShoulderHeightsJSON: [],          // 簡易型肩高
            SimpleShoulderHeights: [],          // 簡易型肩高
            SimpleSpansJSON: [],                    // 簡易型跨距
            SimpleSpans: [],                    // 簡易型跨距
            /* 簡易型溫室 */
            SimpleGreenhouse:[],
            SimpleGreenhouseRatio:[],
            SimpleGreenhousePipe:null,  // 簡易型溫室管材
            SimpleDomeForm:null,  // 簡易型圓頂形式
            SimpleCircularArchDistance:null,  // 簡易型圓拱距
            SimpleFoundation:null,  // 簡易型基礎
            SimpleSpan:null,  // 簡易型跨距
            SimpleShoulderHeight:null,  // 簡易型肩高
            SimpleLength:null,  // 簡易型長度
            SimpleContinuity:null,  // 簡易型連續性
            SimpleCoatingFilm:null,  // 簡易型披覆膜
            SimpleHousrBasePrice:500000, // 簡易型溫室基本價格
            SimpleTotalSimpleCost:0,
            SimpleCostAdd:0,
            SimpleStructuralRiskAdd:0,
            SimpleJobDifficultyAdd:0,

            /* 強固型溫室 */
            SelectRobust:[],
            StrongCostRatiosJSON: [],               // 強固型各建構項目比例
            StrongCostRatios: [],               // 強固型各建構項目比例
            StrongCoatingFilmsJSON: [],             // 強固型披覆膜
            StrongCoatingFilms: [],             // 強固型披覆膜
            StrongContinuitysJSON: [],              // 強固型連續性
            StrongContinuitys: [],              // 強固型連續性
            StrongFoundationsJSON: [],              // 強固型基礎
            StrongFoundations: [],              // 強固型基礎
            StrongGreenhousPprofilesJSON: [],       // 強固型溫室型材
            StrongGreenhousPprofiles: [],       // 強固型溫室型材
            StrongLengthsJSON: [],                  // 強固型長度
            StrongLengths: [],                  // 強固型長度
            StrongRoofFormsJSON: [],                // 強固型屋頂形式
            StrongRoofForms: [],                // 強固型屋頂形式
            StrongShoulderHeightsJSON: [],          // 強固型肩高
            StrongShoulderHeights: [],          // 強固型肩高
            StrongSpansJSON: [],                    // 強固型跨距
            StrongSpans: [],                    // 強固型跨距
            StrongUpperArchDistancesJSON: [],       // 強固型上拱距
            StrongUpperArchDistances: [],       // 強固型上拱距
            /* 強固型溫室 */
            RobustGreenhouse:[],
            RobustGreenhouseRatio:[],
            RobustGreenhouseProfile:null,   // 溫室型材
            RobustRoofForm:null,   // 屋頂形式
            RobustUpperArch:null,   // 上拱距
            RobustFoundation:null,   // 強固型基礎
            RobustSpan:null,   // 強固型跨距
            RobustShoulderHeight:null,   // 強固型肩高
            RobustLength:null,   // 強固型長度
            RobustContinuity:null,   // 強固型連續性
            RobustCoatingFilm:null,   // 強固型披覆膜
            RuggedHousrBasePrice :1500000,  // 強固型溫室基本價格
            RobustTotalCost:0,
            RobustCostAdd:0,
            RobustStructuralRiskAdd:0,
            RobustJobDifficultyAdd:0,


        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods:{
        async getJson(){    //取的資料庫資料，將資料轉成JSON
            const res = await fetch('/FluidAnalysisJSON',  {
                method: 'GET',
            });

            this.Fluidjson = await res.json();

            // 簡易型各建構項目比例
            const SimpleCostratios = await fetch('/SimpleCostRatioJSON',  {
                method: 'GET',
            });
            this.SimpleCostratiosJSON = await SimpleCostratios.json();
            for(var i = 0 ; i < this.SimpleCostratiosJSON.length ; i++){
                if(this.SimpleCostratiosJSON[i].Expert == "System"){
                    this.SimpleCostratios.push(this.SimpleCostratiosJSON[i]);
                }
            }

            // 簡易型圓拱距
            const SimpleCircularArchDistances = await fetch('/SimpleCircularArchDistanceJSON',  {
                method: 'GET',
            });
            this.SimpleCircularArchDistancesJSON = await SimpleCircularArchDistances.json();
            for(var i = 0 ; i < this.SimpleCircularArchDistancesJSON.length ; i++){
                if(this.SimpleCircularArchDistancesJSON[i].Expert == "System"){
                    this.SimpleCircularArchDistances.push(this.SimpleCircularArchDistancesJSON[i]);
                }
            }

            // 簡易型披覆膜
            const SimpleCoatingFilms = await fetch('/SimpleCoatingFilmJSON',  {
                method: 'GET',
            });
            this.SimpleCoatingFilmsJSON = await SimpleCoatingFilms.json();
            for(var i = 0 ; i < this.SimpleCoatingFilmsJSON.length ; i++){
                if(this.SimpleCoatingFilmsJSON[i].Expert == "System"){
                    this.SimpleCoatingFilms.push(this.SimpleCoatingFilmsJSON[i]);
                }
            }

            // 簡易型連續性
            const SimpleContinuitys = await fetch('/SimpleContinuityJSON',  {
                method: 'GET',
            });
            this.SimpleContinuitysJSON = await SimpleContinuitys.json();
            for(var i = 0 ; i < this.SimpleContinuitysJSON.length ; i++){
                if(this.SimpleContinuitysJSON[i].Expert == "System"){
                    this.SimpleContinuitys.push(this.SimpleContinuitysJSON[i]);
                }
            }

            // 簡易型圓頂形式
            const SimpleDomeForms = await fetch('/SimpleDomeFormJSON',  {
                method: 'GET',
            });
            this.SimpleDomeFormsJSON = await SimpleDomeForms.json();
            for(var i = 0 ; i < this.SimpleDomeFormsJSON.length ; i++){
                if(this.SimpleDomeFormsJSON[i].Expert == "System"){
                    this.SimpleDomeForms.push(this.SimpleDomeFormsJSON[i]);
                }
            }

            // 簡易型基礎
            const SimpleFoundations = await fetch('/SimpleFoundationJSON',  {
                method: 'GET',
            });
            this.SimpleFoundationsJSON = await SimpleFoundations.json();
            for(var i = 0 ; i < this.SimpleFoundationsJSON.length ; i++){
                if(this.SimpleFoundationsJSON[i].Expert == "System"){
                    this.SimpleFoundations.push(this.SimpleFoundationsJSON[i]);
                }
            }

            // 簡易型溫室管材
            const SimpleGreenhousePipes = await fetch('/SimpleGreenhousePipeJSON',  {
                method: 'GET',
            });
            this.SimpleGreenhousePipesJSON = await SimpleGreenhousePipes.json();
            for(var i = 0 ; i < this.SimpleGreenhousePipesJSON.length ; i++){
                if(this.SimpleGreenhousePipesJSON[i].Expert == "System"){
                    this.SimpleGreenhousePipes.push(this.SimpleGreenhousePipesJSON[i]);
                }
            }

            // 簡易型長度
            const SimpleLengths = await fetch('/SimpleLengthJSON',  {
                method: 'GET',
            });
            this.SimpleLengthsJSON = await SimpleLengths.json();
            for(var i = 0 ; i < this.SimpleLengthsJSON.length ; i++){
                if(this.SimpleLengthsJSON[i].Expert == "System"){
                    this.SimpleLengths.push(this.SimpleLengthsJSON[i]);
                }
            }

            // 簡易型肩高
            const SimpleShoulderHeights = await fetch('/SimpleShoulderHeightJSON',  {
                method: 'GET',
            });
            this.SimpleShoulderHeightsJSON = await SimpleShoulderHeights.json();
            for(var i = 0 ; i < this.SimpleShoulderHeightsJSON.length ; i++){
                if(this.SimpleShoulderHeightsJSON[i].Expert == "System"){
                    this.SimpleShoulderHeights.push(this.SimpleShoulderHeightsJSON[i]);
                }
            }

            // 簡易型跨距
            const SimpleSpans = await fetch('/SimpleSpanJSON',  {
                method: 'GET',
            });
            this.SimpleSpansJSON = await SimpleSpans.json();
            for(var i = 0 ; i < this.SimpleSpansJSON.length ; i++){
                if(this.SimpleSpansJSON[i].Expert == "System"){
                    this.SimpleSpans.push(this.SimpleSpansJSON[i]);
                }
            }

            // 強固型各建構項目比例
            const StrongCostRatios = await fetch('/StrongCostRatioJSON',  {
                method: 'GET',
            });
            this.StrongCostRatiosJSON = await StrongCostRatios.json();
            for(var i = 0 ; i < this.StrongCostRatiosJSON.length ; i++){
                if(this.StrongCostRatiosJSON[i].Expert == "System"){
                    this.StrongCostRatios.push(this.StrongCostRatiosJSON[i]);
                }
            }

            // 強固型披覆膜
            const StrongCoatingFilms = await fetch('/StrongCoatingFilmJSON',  {
                method: 'GET',
            });
            this.StrongCoatingFilmsJSON = await StrongCoatingFilms.json();
            for(var i = 0 ; i < this.StrongCoatingFilmsJSON.length ; i++){
                if(this.StrongCoatingFilmsJSON[i].Expert == "System"){
                    this.StrongCoatingFilms.push(this.StrongCoatingFilmsJSON[i]);
                }
            }

            // 強固型連續性
            const StrongContinuitys = await fetch('/StrongContinuityJSON',  {
                method: 'GET',
            });
            this.StrongContinuitysJSON = await StrongContinuitys.json();
            for(var i = 0 ; i < this.StrongContinuitysJSON.length ; i++){
                if(this.StrongContinuitysJSON[i].Expert == "System"){
                    this.StrongContinuitys.push(this.StrongContinuitysJSON[i]);
                }
            }

            // 強固型基礎
            const StrongFoundations = await fetch('/StrongFoundationJSON',  {
                method: 'GET',
            });
            this.StrongFoundationsJSON = await StrongFoundations.json();
            for(var i = 0 ; i < this.StrongFoundationsJSON.length ; i++){
                if(this.StrongFoundationsJSON[i].Expert == "System"){
                    this.StrongFoundations.push(this.StrongFoundationsJSON[i]);
                }
            }

            // 強固型溫室型材
            const StrongGreenhousPprofiles = await fetch('/StrongGreenhouseProfileJSON',  {
                method: 'GET',
            });
            this.StrongGreenhousPprofilesJSON = await StrongGreenhousPprofiles.json();
            for(var i = 0 ; i < this.StrongGreenhousPprofilesJSON.length ; i++){
                if(this.StrongGreenhousPprofilesJSON[i].Expert == "System"){
                    this.StrongGreenhousPprofiles.push(this.StrongGreenhousPprofilesJSON[i]);
                }
            }

            // 強固型長度
            const StrongLengths = await fetch('/StrongLengthJSON',  {
                method: 'GET',
            });
            this.StrongLengthsJSON = await StrongLengths.json();
            for(var i = 0 ; i < this.StrongLengthsJSON.length ; i++){
                if(this.StrongLengthsJSON[i].Expert == "System"){
                    this.StrongLengths.push(this.StrongLengthsJSON[i]);
                }
            }

            // 強固型屋頂形式
            const StrongRoofForms = await fetch('/StrongRoofFormJSON',  {
                method: 'GET',
            });
            this.StrongRoofFormsJSON = await StrongRoofForms.json();
            for(var i = 0 ; i < this.StrongRoofFormsJSON.length ; i++){
                if(this.StrongRoofFormsJSON[i].Expert == "System"){
                    this.StrongRoofForms.push(this.StrongRoofFormsJSON[i]);
                }
            }

            // 強固型肩高
            const StrongShoulderHeights = await fetch('/StrongShoulderHeightJSON',  {
                method: 'GET',
            });
            this.StrongShoulderHeightsJSON = await StrongShoulderHeights.json();
            for(var i = 0 ; i < this.StrongShoulderHeightsJSON.length ; i++){
                if(this.StrongShoulderHeightsJSON[i].Expert == "System"){
                    this.StrongShoulderHeights.push(this.StrongShoulderHeightsJSON[i]);
                }
            }

            // 強固型跨距
            const StrongSpans = await fetch('/StrongSpanJSON',  {
                method: 'GET',
            });
            this.StrongSpansJSON = await StrongSpans.json();
            for(var i = 0 ; i < this.StrongSpansJSON.length ; i++){
                if(this.StrongSpansJSON[i].Expert == "System"){
                    this.StrongSpans.push(this.StrongSpansJSON[i]);
                }
            }

            // 強固型上拱距
            const StrongUpperArchDistances = await fetch('/StrongUpperArchDistanceJSON',  {
                method: 'GET',
            });
            this.StrongUpperArchDistancesJSON = await StrongUpperArchDistances.json();
            for(var i = 0 ; i < this.StrongUpperArchDistancesJSON.length ; i++){
                if(this.StrongUpperArchDistancesJSON[i].Expert == "System"){
                    this.StrongUpperArchDistances.push(this.StrongUpperArchDistancesJSON[i]);
                }
            }

        },updateChart(){    // 根據所勾選的資料，更新溫室型式的表格顯示
            var DataChart=[];
            for(var i=0; i<this.Fluidjson.length ; i++){
                for(var j=0;j<this.checkedNames.length;j++){
                    if(this.checkedNames[j]==this.Fluidjson[i][1][0].GreenhouseId){
                        DataChart.push(this.Fluidjson[i]);
                    }
                }
            }
            this.checkData = DataChart;
        },selectAll(){  // 全部勾選
            this.checkedNames = [];
            this.checkData = [];

            if(this.checkedNames.length != 30){
                this.checkedNames = [];
                for(var i=0; i<this.Fluidjson.length ; i++){
                    this.checkedNames.push(this.Fluidjson[i][1][0].GreenhouseId);
                    this.checkData.push(this.Fluidjson[i]);
                }
            }
        },ChartClear(){    // 清除勾選
            this.checkedNames = [];
            this.checkData = [];

        },updateSimpleRadio(){  // 更新簡易型溫室選擇狀況，判斷是否有選滿9項
            this.SelectSimple = [];
            var temp = [];
            if(this.SimpleGreenhousePipe){
                temp = [];
                temp.push('溫室管材');
                temp.push(this.SimpleGreenhousePipe);
                this.SelectSimple.push(temp); // 簡易型溫室管材
            }
            if(this.SimpleDomeForm){
                temp = [];
                temp.push('圓頂形式');
                temp.push(this.SimpleDomeForm);
                this.SelectSimple.push(temp);    // 簡易型圓頂形式
            }
            if(this.SimpleCircularArchDistance){
                temp = [];
                temp.push('圓拱距');
                temp.push(this.SimpleCircularArchDistance);
                this.SelectSimple.push(temp);    // 簡易型圓拱距
            }
            if(this.SimpleFoundation){
                temp = [];
                temp.push('基礎');
                temp.push(this.SimpleFoundation);
                this.SelectSimple.push(temp);    // 簡易型基礎
            }
            if(this.SimpleSpan){
                temp = [];
                temp.push('跨距');
                temp.push(this.SimpleSpan);
                this.SelectSimple.push(temp);    // 簡易型跨距
            }
            if(this.SimpleShoulderHeight){
                temp = [];
                temp.push('肩高');
                temp.push(this.SimpleShoulderHeight);
                this.SelectSimple.push(temp);    // 簡易型肩高
            }
            if(this.SimpleLength){
                temp = [];
                temp.push('長度');
                temp.push(this.SimpleLength);
                this.SelectSimple.push(temp);    // 簡易型長度
            }
            if(this.SimpleContinuity){
                temp = [];
                temp.push('連續性');
                temp.push(this.SimpleContinuity);
                this.SelectSimple.push(temp);    // 簡易型連續性
            }
            if(this.SimpleCoatingFilm){
                temp = [];
                temp.push('披覆膜');
                temp.push(this.SimpleCoatingFilm);
                this.SelectSimple.push(temp);  // 簡易型披覆膜
            }

            if(this.SelectSimple.length == 9 ){
                this.SimpleTotalSimpleCost = 0,
                this.SimpleCostAdd = 0,
                this.SimpleStructuralRiskAdd = 0,
                this.SimpleJobDifficultyAdd = 0;

                for (var i = 0; i < this.SelectSimple.length; i++) {
                    this.SimpleTotalSimpleCost += this.SimpleHousrBasePrice * this.SelectSimple[i][1].Cost * this.SimpleCostratios[i].Cost / 100;
                    this.SimpleCostAdd += this.SelectSimple[i][1].Cost * this.SimpleCostratios[i].Cost / 100;
                    this.SimpleStructuralRiskAdd += this.SelectSimple[i][1].StructuralRisk * this.SimpleCostratios[i].StructuralRisk / 100;
                    this.SimpleJobDifficultyAdd += this.SelectSimple[i][1].JobDifficulty * this.SimpleCostratios[i].JobDifficulty/ 100;
                }

                this.SimpleTotalSimpleCost =  parseInt(this.SimpleTotalSimpleCost);
                this.SimpleCostAdd =  this.SimpleCostAdd.toFixed(2);
                this.SimpleStructuralRiskAdd =  this.SimpleStructuralRiskAdd.toFixed(2);
                this.SimpleJobDifficultyAdd =  this.SimpleJobDifficultyAdd.toFixed(2);
            }

        },updateRobustRadio(){  // 更新強固型溫室選擇狀況，判斷是否有選滿9項
            this.SelectRobust = [];
            var temp = [];
            if(this.RobustGreenhouseProfile){
                temp = [];
                temp.push('溫室型材');
                temp.push(this.RobustGreenhouseProfile);
                this.SelectRobust.push(temp); // 溫室型材
            }
            if(this.RobustRoofForm){
                temp = [];
                temp.push('屋頂形式');
                temp.push(this.RobustRoofForm);
                this.SelectRobust.push(temp); // 屋頂形式
            }
            if(this.RobustUpperArch){
                temp = [];
                temp.push('上拱距');
                temp.push(this.RobustUpperArch);
                this.SelectRobust.push(temp); // 上拱距
            }
            if(this.RobustFoundation){
                temp = [];
                temp.push('基礎');
                temp.push(this.RobustFoundation);
                this.SelectRobust.push(temp); // 強固型基礎
            }
            if(this.RobustSpan){
                temp = [];
                temp.push('跨距');
                temp.push(this.RobustSpan);
                this.SelectRobust.push(temp); // 強固型跨距
            }
            if(this.RobustShoulderHeight){
                temp = [];
                temp.push('肩高');
                temp.push(this.RobustShoulderHeight);
                this.SelectRobust.push(temp); // 強固型肩高
            }
            if(this.RobustLength){
                temp = [];
                temp.push('長度');
                temp.push(this.RobustLength);
                this.SelectRobust.push(temp); // 強固型長度
            }
            if(this.RobustContinuity){
                temp = [];
                temp.push('連續性');
                temp.push(this.RobustContinuity);
                this.SelectRobust.push(temp); // 強固型連續性
            }
            if(this.RobustCoatingFilm){
                temp = [];
                temp.push('披覆膜');
                temp.push(this.RobustCoatingFilm);
                this.SelectRobust.push(temp); // 披覆膜
            }

            if(this.SelectRobust.length == 9 ){
                this.RobustTotalCost = 0,
                this.RobustCostAdd = 0,
                this.RobustStructuralRiskAdd = 0,
                this.RobustJobDifficultyAdd = 0;

                for (var i = 0; i < this.SelectRobust.length; i++) {
                    this.RobustTotalCost += this.RuggedHousrBasePrice * this.SelectRobust[i][1].Cost * this.StrongCostRatios[i].Cost / 100;
                    this.RobustCostAdd += this.SelectRobust[i][1].Cost * this.StrongCostRatios[i].Cost / 100;
                    this.RobustStructuralRiskAdd += this.SelectRobust[i][1].StructuralRisk * this.StrongCostRatios[i].StructuralRisk / 100;
                    this.RobustJobDifficultyAdd += this.SelectRobust[i][1].JobDifficulty * this.StrongCostRatios[i].JobDifficulty/ 100;
                }

                this.RobustTotalCost =  parseInt(this.RobustTotalCost);
                this.RobustCostAdd =  this.RobustCostAdd.toFixed(2);
                this.RobustStructuralRiskAdd =  this.RobustStructuralRiskAdd.toFixed(2);
                this.RobustJobDifficultyAdd =  this.RobustJobDifficultyAdd.toFixed(2);
            }

        }
    }
}

</script>