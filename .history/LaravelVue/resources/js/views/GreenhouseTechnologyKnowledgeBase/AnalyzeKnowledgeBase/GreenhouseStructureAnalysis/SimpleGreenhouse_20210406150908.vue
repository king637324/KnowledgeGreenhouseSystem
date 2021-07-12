<template>
    <div>
        <br id="簡易型溫室">
        <h2>
            簡易型溫室
            <button  class="btn btn-primary" v-scroll-to="{ el: '#綜合分析' }">
                綜合分析
            </button>
        </h2>
        <hr>

        <img src = "/images/greenhousestructure/SimpleGreenhouse/SimpleGreenhouseIntroduction.png" style='width:100vmin'>
        <br><br>

        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <h4 id="統計分析">簡易型統計分析表</h4>
                <p> ps. 可直接點擊 類型 前往類型的應力應變分析</p>

                <table style="border:1px solid black;" border='1'>
                    <thead class="table-active">
                        <tr align="center">
                            <td> 類 型 </td>
                            <td> 桁架間距<br>(m)</td>
                            <td> 錏管規格 </td>
                            <td> 尺寸<br>(mm) </td>
                            <td> 圓管厚度<br>(mm) </td>
                            <td> 連接管厚度<br>(mm) </td>
                            <td> 重量<br>(kg/m)</td>
                            <td> 結構最大應力<br>(MPa)</td>
                            <td> 結構最大變形量<br>(mm) </td>
                        </tr>
                    </thead>

                    <tr align="center" v-for="(Simple, index) in SimpleGreenhouse" :key="index">
                        <td>
                            <button  class="btn" v-scroll-to="{ el: '#StructuralSimple'+Simple.Type }">
                                {{Simple.Type}}
                            </button>
                        </td>
                        <td> {{Simple.TrussSpacing}}</td>
                        <td> {{Simple.TubeSpecifications}}</td>
                        <td> {{Simple.Size}}</td>
                        <td> {{Simple.TubeThickness}} </td>
                        <td> {{Simple.ConnectingThickness}} </td>
                        <td> {{Simple.Weight}} </td>
                        <td> {{Simple.StructureStressMax}} </td>
                        <td> {{Simple.MaximumStructuralChange}} </td>
                    </tr>
                </table>
                <br>
            </div>
            <div class="p-2 bd-highlight"></div>
            <div class="p-2 bd-highlight">
                <div id="綜合分析"></div>
                <br>
                <h4>
                    &nbsp;&nbsp;綜合分析
                    <button  class="btn btn-primary" v-scroll-to="{ el: '#簡易型溫室' }">
                        回頂部
                    </button>
                </h4>
                <p>1. 目前簡易型溫室之桁架間距以1m為主，設計分析桁架間距之影響，將桁架間距減為0.5m，<br>可增加溫室結構強度，使溫室結構性能提升。</p>
                <p>2. 簡易型溫室之桁架間距1m，錏管外徑1&rdquo;(34mm)，厚度1.5mm時，最大應力值為 352MPa，接近鍍鋅鋼管降伏強度。</p>
                <p>3. 簡易型溫室之桁架間距0.5m，錏管外徑1/2&rdquo;(22mm)，厚度1.5mm時， 最大應力值為 186MPa，鍍鋅鋼管承受應力值較低。</p>
                <p>4. 簡易型溫室修改屋頂連接管厚度為2mm，桁架間距0.5m，錏管外徑3/4&rdquo;(27mm)，厚度1.5mm時，最大應力值為 165MPa。</p>
                <p>5. 簡易型溫室修改屋頂連接管厚度為2mm，桁架間距0.5m，錏管外徑1/2&rdquo;(22mm)，厚度1.5mm時，最大應力值為 227MPa。</p>
            </div>
        </div>

        

        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <div id="SimpleGreenhouse_data" v-for="(Simple, index) in SimpleGreenhouse1" :key="index">
                    <div :id="'StructuralSimple'+Simple.Type"></div>
                    <br><br><br>
                    <h3>
                        {{Simple.Type}} Type溫室結構
                        <button  class="btn btn-primary" v-scroll-to="{ el: '#統計分析' }">
                            回統計分析
                        </button>
                    </h3>
                    <table style="border:1px solid black;" border='1'>
                        <tr align="center">
                            <td>
                                <img :src ="Simple.StructuralDeformationDiagram" class="table-image" style='width:30vmin'/>
                            </td>
                            <td>
                                <img :src ="Simple.StructuralStressDiagram" class="table-image" style='width:30vmin'/>
                            </td>
                        </tr>
                        <tr align="center">
                            <td> 最大變形量 : {{Simple.MaximumStructuralChange}} mm</td>
                            <td> 最大應力 : {{Simple.StructureStressMax }} MPa</td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div id="SimpleGreenhouse_data" v-for="(Simple, index) in SimpleGreenhouse2" :key="index">
                    <div :id="'StructuralSimple'+Simple.Type"></div>
                    <br><br><br>
                    <h3>
                        {{Simple.Type}} Type溫室結構
                        <button  class="btn btn-primary" v-scroll-to="{ el: '#統計分析' }">
                            回統計分析
                        </button>
                    </h3>
                    <table style="border:1px solid black;" border='1'>
                        <tr align="center">
                            <td>
                                <img :src ="Simple.StructuralDeformationDiagram" class="table-image" style='width:30vmin'/>
                            </td>
                            <td>
                                <img :src ="Simple.StructuralStressDiagram" class="table-image" style='width:30vmin'/>
                            </td>
                        </tr>
                        <tr align="center">
                            <td> 最大變形量 : {{Simple.MaximumStructuralChange}} mm</td>
                            <td> 最大應力 : {{Simple.StructureStressMax }} MPa</td>
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
        SimpleGreenhouse:[],
        SimpleGreenhouse1:[],
        SimpleGreenhouse2:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
            // 材料結構分析
            const GreenhouseStructure = await fetch('/StructuralAnalysisJSON',  {
                method: 'GET',
            });
            this.Structurejson = await GreenhouseStructure.json();

            for(var i=0; i<this.Structurejson.length ; i++){
                if(this.Structurejson[i].GreenhouseType == "簡易型"){
                    this.SimpleGreenhouse.push(this.Structurejson[i]);

                }
            }

            for(var i=0; i<this.SimpleGreenhouse.length ; i++){
                if(i < this.SimpleGreenhouse.length/2){
                    this.SimpleGreenhouse1.push(this.SimpleGreenhouse[i]);
                }else{
                    this.SimpleGreenhouse2.push(this.SimpleGreenhouse[i]);
                }
            }

        }
    }
}
</script>
