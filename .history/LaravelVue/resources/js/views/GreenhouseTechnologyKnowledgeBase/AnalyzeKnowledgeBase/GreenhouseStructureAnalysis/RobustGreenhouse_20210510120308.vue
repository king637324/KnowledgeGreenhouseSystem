<template>
    <div>
        <br id="強固型溫室">
        <h2>
            強固型溫室
            <button  class="btn btn-primary" v-scroll-to="{ el: '#綜合分析' }">
                綜合分析
            </button>
            <button  class="btn btn-primary" v-scroll-to="{ el: '#結構最大應力優劣排序' }">
                結構最大應力優劣排序
            </button>
        </h2>
        <hr>
        
        <h4>強固型溫室類型示意圖</h4>
        <p> ps.可直接點擊 類型示意圖 前往應力應變分析</p>
        <table id="RobustGreenhouse_Unsorted" style="border:1px solid black;" border='1'>
            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouse1" :key="index">
                    <button  class="btn" v-scroll-to="{ el: '#StructuralRobust'+Robust.Type }">
                        <img :src ="Robust.TypeDiagram" class="table-image" style='width:30vmin'/>
                    </button>
                </td>
            </tr>
            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouse1" :key="index">
                    {{Robust.Type }}
                </td>
            </tr>

            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouse2" :key="index">
                    <button  class="btn" v-scroll-to="{ el: '#StructuralRobust'+Robust.Type }">
                        <img :src ="Robust.TypeDiagram" class="table-image" style='width:30vmin'/>
                    </button>
                </td>
            </tr>
            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouse2" :key="index">
                    {{Robust.Type }}
                </td>
            </tr>
        </table>
        <br>

        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <h4>強固型統計分析表</h4>
                <table style="border:1px solid black;" border='1'>
                    <thead class="table-active">
                        <tr align = "center">
                            <td> 類 型 </td>
                            <td> 結構最大應力(MPa) </td>
                            <td> 最大應力位置 </td>
                            <td> 結構最大變形量(mm) </td>
                            <td> 最大變形量位置 </td>
                        </tr >
                    </thead>

                    <tr align = "center" v-for="(Robust, index) in RobustGreenhouse" :key="index">
                        <td> {{Robust.Type }} </td>
                        <td> {{Robust.StructureStressMax }} </td>
                        <td> {{Robust.MaximumStressPosition }} </td>
                        <td> {{Robust.MaximumStructuralChange }} </td>
                        <td> {{Robust.MaximumChangePosition }} </td>
                    </tr >
                </table>
                <br>
            </div>
            <div class="p-2 bd-highlight"></div>
            <div class="p-2 bd-highlight">
                <div id="綜合分析"></div>
                <br>
                <h4>
                    綜合分析
                    <button  class="btn btn-primary" v-scroll-to="{ el: '#強固型溫室' }">
                        回頂部
                    </button>
                </h4>
                <p>1. <strong>A Type</strong>圓頂支撐結構應力值較大，應力主要由力霸梁支撐，</p>
                <p>2. <strong>E Type</strong>具有較低應力值，<strong>H Type</strong>圓頂桁梁之應力值較大。</p>
                <p>3. 當圓頂支撐設計能將圓頂受力傳遞至力霸梁，則由力霸梁承受主要應力，<br>反之則由圓頂鋼管承受較大應力，會導致圓頂鋼管長期處於高應力狀態，減少使用壽命。</p>
                <br><br>
            </div>
        </div>

        

        <div id="結構最大應力優劣排序"></div>
        <br>
        <h4>
            經過結構最大應力 優→劣 排序
            <button  class="btn btn-primary" v-scroll-to="{ el: '#強固型溫室' }">
                回頂部
            </button>
        </h4>
        <p> ps.可直接點擊 類型示意圖 前往應力應變分析</p>
        <table style="border:1px solid black;" border='1'>
            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouseSort1" :key="index">
                    <button  class="btn" v-scroll-to="{ el: '#StructuralRobust'+Robust.Type }">
                        <img :src ="Robust.TypeDiagram" class="table-image" style='width:30vmin'/>
                    </button>
                </td>
            </tr>
            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouseSort1" :key="index">
                    {{Robust.Type }}
                </td>
            </tr>

            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouseSort2" :key="index">
                    <button  class="btn" v-scroll-to="{ el: '#StructuralRobust'+Robust.Type }">
                        <img :src ="Robust.TypeDiagram" class="table-image" style='width:30vmin'/>
                    </button>
                </td>
            </tr>
            <tr align = "center">
                <td v-for="(Robust, index) in RobustGreenhouseSort2" :key="index">
                    {{Robust.Type }}
                </td>
            </tr>
        </table>

        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <div id="RobustGreenhouse_data" v-for="(Robust, index) in RobustGreenhouse1" :key="index">
                    <br>
                        <h3 :id="'StructuralRobust'+Robust.Type" >
                            {{Robust.Type }} Type溫室結構
                            <button  class="btn btn-primary" v-scroll-to="{ el: '#強固型溫室' }">
                                回頂部
                            </button>
                        </h3>
                    <table style="border:1px solid black;" border='1'>
                        <tr align = "center">
                            <td>
                                <img :src ="Robust.StructuralDeformationDiagram" class="table-image" style='width:30vmin'/>

                            </td>
                            <td>
                                <img :src ="Robust.StructuralStressDiagram" class="table-image" style='width:30vmin'/>
                            </td>
                        </tr>
                        <tr align = "center" >
                            <td>最大變形量: {{Robust.MaximumStructuralChange }}mm </td>
                            <td>最大應力: {{Robust.StructureStressMax }} MPa </td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div id="RobustGreenhouse_data" v-for="(Robust, index) in RobustGreenhouse2" :key="index">
                    <br>
                        <h3 :id="'StructuralRobust'+Robust.Type" >
                            {{Robust.Type }} Type溫室結構
                            <button  class="btn btn-primary" v-scroll-to="{ el: '#強固型溫室' }">
                                回頂部
                            </button>
                        </h3>
                    <table style="border:1px solid black;" border='1'>
                        <tr align = "center">
                            <td>
                                <img :src ="Robust.StructuralDeformationDiagram" class="table-image" style='width:31vmin'/>

                            </td>
                            <td>
                                <img :src ="Robust.StructuralStressDiagram" class="table-image" style='width:31vmin'/>
                            </td>
                        </tr>
                        <tr align = "center" >
                            <td>最大變形量: {{Robust.MaximumStructuralChange }}mm </td>
                            <td>最大應力: {{Robust.StructureStressMax }} MPa </td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
            <div class="p-2 bd-highlight">

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
        tabIndex: 0,
        Structurejson:[],
        RobustGreenhouse:[],
        RobustGreenhouse1:[],
        RobustGreenhouse2:[],
        RobustGreenhouseSort:[],
        RobustGreenhouseSort1:[],
        RobustGreenhouseSort2:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){    //取的資料庫資料，將資料轉成JSON
            // 材料結構分析
            const GreenhouseStructure = await fetch('/StructuralAnalysisJSON',  {
                method: 'GET',
            });
            this.Structurejson = await GreenhouseStructure.json();

            for(var i=0; i<this.Structurejson.length ; i++){
                if(this.Structurejson[i].GreenhouseType == "強固型"){
                    this.RobustGreenhouse.push(this.Structurejson[i]);
                    this.RobustGreenhouseSort.push(this.Structurejson[i]);
                }
            }

            for(var i=0; i<this.RobustGreenhouse.length ; i++){
                if(i < this.RobustGreenhouse.length/2){
                    this.RobustGreenhouse1.push(this.RobustGreenhouse[i]);
                }else{
                    this.RobustGreenhouse2.push(this.RobustGreenhouse[i]);
                }
            }

            // 排序過的
            var temp;
            for (var i = this.RobustGreenhouseSort.length-1; i > 0; i--) {
                for (var j = 0; j <= i - 1; j++) {
                    if (this.RobustGreenhouseSort[j].StructureStressMax > this.RobustGreenhouseSort[j + 1].StructureStressMax) {
                        temp = this.RobustGreenhouseSort[j];
                        this.RobustGreenhouseSort[j] = this.RobustGreenhouseSort[j + 1];
                        this.RobustGreenhouseSort[j + 1] = temp;
                    }
                }
            }

            for(var i=0; i<this.RobustGreenhouseSort.length ; i++){
                if(i < this.RobustGreenhouseSort.length/2){
                    this.RobustGreenhouseSort1.push(this.RobustGreenhouseSort[i]);
                }else{
                    this.RobustGreenhouseSort2.push(this.RobustGreenhouseSort[i]);
                }
            }

        }
    }
}
</script>
