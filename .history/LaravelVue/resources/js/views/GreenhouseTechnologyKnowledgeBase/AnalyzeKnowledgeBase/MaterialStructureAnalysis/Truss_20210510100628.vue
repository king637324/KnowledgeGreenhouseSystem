<template>
    <div>
        <b-tabs v-model="tabIndex" card>
            <b-tab title="桁架介紹" :title-link-class="linkClass(0)">
                <h5>平行桁架可以較輕的結構重量取代較重的大型H beam，成為主樑結構，<br>但其因所需腹板元件較多且密集，有無輕量化且高強度的新桁架設計?</h5>
                <h5>其方法有4種：<br>(1)高度分析、(2)腹桿角度分析、(3)上下弦與腹桿尺寸變化控制、(4)屋頂桁架的優化組合設計</h5>

            </b-tab>

            <b-tab title="高度分析" :title-link-class="linkClass(1)" id="高度分析">
                <button  class="btn btn-primary" v-scroll-to="{ el: '#高度分析綜合分析' }">
                    綜合分析
                </button>
                <br><br>

                <h4> 高度分析類型樣式 </h4>
                <h6>ps. 可直接點擊 編號內容 前往該編號的桁架高度變化性能分析</h6>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 圖示 </td>
                    </tr>
                    <tr v-for="(Height, index) in TrussHeight" :key="index">
                        <td align="center">
                            <button  class="btn" v-scroll-to="{ el: '#TrussHeight'+Height.TrussType }">
                                {{Height.TrussType}}
                            </button>
                        </td>
                        <td>
                            <img :src ="Height.TrussDiagram" class="table-image" style='width:80vmin'/>
                        </td>
                    </tr>
                </table>
                <br><br>

                <h4> 桁架高度－變形分析 </h4>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 圖示 </td>
                    </tr>
                    <tr align="center" v-for="(Height, index) in TrussHeight" :key="index">
                        <td>
                            <button  class="btn" v-scroll-to="{ el: '#TrussHeight'+Height.TrussType }">
                                <img :src ="Height.Icon" style='width:10vmin'>
                            </button>
                        </td>
                        <td>
                            <img :src ="Height.DeformationAnalysisDiagram" style='width:80vmin'>
                        </td>
                    </tr>
                </table>
                <br><br>

                <h4> 桁架高度－最大應力分析 </h4>
                <p> 水平桁架高度越高，上弦結構最大應力越小 </p>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 圖示 </td>
                    </tr>
                    <tr align="center" v-for="(Height, index) in TrussHeight" :key="index">
                        <td>
                            <button  class="btn" v-scroll-to="{ el: '#TrussHeight'+Height.TrussType }">
                                <img :src ="Height.Icon" style='width:10vmin'>
                            </button>
                        </td>
                        <td>
                            <img :src ="Height.DeformationAnalysisDiagram" style='width:80vmin'>
                            </td>
                    </tr>
                </table>
                <br><br>

                <h4> 桁架高度－最大載重量分析 </h4>
                <p> 水平桁架高度越高，可承受最大載重越大 </p>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 圖示 </td>
                    </tr>
                    <tr align="center" v-for="(Height, index) in TrussHeight" :key="index">
                        <td><a class="btn" :href="'TrussHeight'+Height.TrussType">
                                <img :src ="Height.Icon" style='width:10vmin'>
                            </a>
                        </td>
                        <td><img :src ="Height.MaxLoadAnalysisDiagram" style='width:80vmin'></td>
                    </tr>
                </table>

                <br><br>
                <div id="桁架高度類型"  v-for="(Height, index) in TrussHeight" :key="index">
                    <div :id="'TrussHeight'+Height.TrussType"></div>
                    <br><br><br>
                    <h5>
                        編號 {{Height.TrussType}} 桁架高度變化性能分析
                        <button  class="btn btn-primary" v-scroll-to="{ el: '#高度分析' }">
                            回頂部
                        </button>
                    </h5>

                        <table style="border:1px solid black;" border='1'>
                            <tr align="center">
                                <td>變形量</td>
                                <td><img :src = Height.DeformationAnalysisDiagram style='width:80vmin'></td>
                            </tr>
                            <tr align="center">
                                <td>最大應力</td>
                                <td><img :src = Height.MaxStressAnalysisDiagram style='width:80vmin'></td>
                            </tr>
                            <tr align="center">
                                <td>最大載重</td>
                                <td><img :src = Height.MaxLoadAnalysisDiagram style='width:80vmin'></td>
                            </tr>
                        </table>
                    <br>
                </div>

                <br>
                <h4> 桁架高度變化綜合分析比較表 </h4>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 桁架高度 </td>
                        <td> 變形量分析(mm) </td>
                        <td> 最大應力分析(kg/cm2) </td>
                        <td> 最大載重量分析( kN) </td>
                    </tr>
                    <tr align="center" v-for="(Height, index) in TrussHeight" :key="index">
                        <td>
                            <button  class="btn" v-scroll-to="{ el: '#TrussHeight'+Height.TrussType }">
                                {{Height.TrussType}}
                            </button>
                        </td>

                        <td>{{Height.TrussHeight}}</td>
                        <td>{{Height.DeformationAnalysis}}</td>
                        <td>{{Height.MaxStressAnalysis}}</td>
                        <td>{{Height.MaxLoadAnalysis}}</td>
                    </tr>
                </table>
                <br><br>

                <div id="高度分析綜合分析"></div>
                <h4>
                    綜合分析
                    <button  class="btn btn-primary" v-scroll-to="{ el: '#高度分析' }">
                        回頂部
                    </button>
                </h4>
                <p> 1. 水平桁架高度越高，上弦結構最大應力越小 </p>
                <p> 2. 水平桁架高度越高，可承受最大載重越大 </p>
            </b-tab>

            <b-tab title="腹桿角度分析" :title-link-class="linkClass(2)" id="腹桿角度分析">
                <button  class="btn btn-primary" v-scroll-to="{ el: '#腹桿角度分析綜合分析' }">
                    綜合分析
                </button>
                <br><br>

                <h4> 桁架腹桿角度控制分析圖樣 </h4>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td style='width:10vmin'> 項目 </td>
                        <td> 材料形式 </td>
                        <td> 桁架形式 </td>
                    </tr>
                    <tr align="center" v-for="(BellyRod, index) in TrussBellyRodAngle" :key="index">
                        <td> {{BellyRod.item}} </td>
                        <td> <img :src ="BellyRod.MaterialForm" style='width:25vmin'> </td>
                        <td> <img :src ="BellyRod.TrussForm" style='width:90vmin'>  </td>
                    </tr>
                </table>
                <br><br>

                <h4> 桁架腹桿角度控制分析－應力分析 </h4>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td style='width:10vmin'> 項目 </td>
                        <td> 應力分析 </td>
                        <td> 使用支數 </td>
                        <td> 重量(kg) </td>
                        <td> 應力比 </td>
                    </tr>
                    <tr align="center" v-for="(BellyRod, index) in TrussBellyRodAngle" :key="index">
                        <td> {{BellyRod.item}} </td>
                        <td> <img :src ="BellyRod.BellyRodAngleController" style='width:90vmin'>  </td>
                        <td> {{BellyRod.count}} </td>
                        <td> {{BellyRod.Weight}} </td>
                        <td> {{BellyRod.StressRatio}} </td>
                    </tr>
                </table>
                <br><br>

                <h4> 桁架腹桿角度綜合分析比較表 </h4>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td style='width:10vmin'> 項目 </td>
                        <td> 材質 </td>
                        <td style='width:10vmin'> 使用支數 </td>
                        <td style='width:10vmin'> 重量(kg) </td>
                        <td style='width:10vmin'> 應力比 </td>
                    </tr>
                    <tr align="center" v-for="(BellyRod, index) in TrussBellyRodAngle" :key="index">
                        <td> {{BellyRod.item}} </td>
                        <td> {{BellyRod.Material}}</td>
                        <td> {{BellyRod.count}} </td>
                        <td> {{BellyRod.Weight}} </td>
                        <td> {{BellyRod.StressRatio}} </td>
                    </tr>
                </table>
                <br><br>

                <div id="腹桿角度分析綜合分析"></div>
                <h4>
                    綜合分析
                    <button  class="btn btn-primary" v-scroll-to="{ el: '#腹桿角度分析' }">
                        回頂部
                    </button>
                </h4>
                <p>● 上下弦及腹桿的組合設計對桁架負荷比較：</p>
                <p>1. 桁架的上下弦受力不同，可依受力負荷改變上下弦材質或形狀。</p>
                <p>2. 桁架的腹桿因其位置或角度不同，也會改變其負荷，可改變角度、形狀、材質因應</p>
                <p>3. 桁架對大跨距的樑有很好的貢獻，相較於H型鋼重量輕且結構穩定。<br>善用桁架的上下弦及腹桿的組合，可設計成最適當的桁架。</p>
            </b-tab>

            <b-tab title="上下弦與腹桿尺寸變化控制" :title-link-class="linkClass(3)" id="上下弦與腹桿尺寸變化控制">
                <button  class="btn btn-primary" v-scroll-to="{ el: '#上下弦與腹桿尺寸變化控制綜合分析' }">
                    綜合分析
                </button>
                <br><br>

                <h4> 桁架上下弦與腹桿尺寸變化控制 </h4>
                <h6> ps. 可直接點擊 CASE內容 前往該CASE的桁架上下弦與腹桿尺寸變化之工程分析</h6>

                <table id="桁架上下弦與腹桿尺寸變化控制" style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td  style='width:10vmin'> CASE </td>
                        <td  style='width:30vmin'> 變化 </td>
                        <td  style='width:30vmin'> 桁架形式尺寸 </td>
                        <td> 圖示 </td>
                    </tr>
                    <tr align="center">
                        <td> 0 </td>
                        <td> - </td>
                        <td> - </td>
                        <td><img src = "/images/greenhousestructure/Truss/TrussBellyRodSizeUpperLowerChords/0.png" style='width:90vmin'></td>
                    </tr>
                    <tr align="center" v-for="(UpperLower, index) in TrussBellyRodSizeUpperLower" :key="index">
                        <td>
                            <button  class="btn" v-scroll-to="{ el: '#TrussBellyRodSizeChange'+UpperLower.id }">
                                {{UpperLower.id}}
                            </button>
                        </td>
                        <td> {{UpperLower.ItemVariety}} </td>
                        <td> {{UpperLower.FormSize}} </td>
                        <td> <img :src ="UpperLower.Icon" style='width:90vmin'>  </td>
                    </tr>
                </table>
                <br><br>

                <div id="桁架上下弦類型" v-for="(UpperLower, index) in TrussBellyRodSizeUpperLower" :key="index">
                    <div :id="'TrussBellyRodSizeChange'+UpperLower.id"></div>
                    <br><br><br>
                    <h5>
                        CASE {{UpperLower.id}} 桁架上下弦與腹桿尺寸變化之工程分析
                        <button  class="btn btn-primary" v-scroll-to="{ el: '#上下弦與腹桿尺寸變化控制' }">
                            回頂部
                        </button>
                    </h5>
                    <table style="border:1px solid black;" border='1'>
                        <tr align="center">
                            <td> CASE </td>
                            <td> 變化 </td>
                            <td> 桁架形式尺寸 </td>
                            <td> 上弦最大應力(MPa) </td>
                            <td> 腹桿最大應力(MPa) </td>
                            <td> 下弦最大應力(MPa) </td>
                            <td> 材料總重(Kg) </td>
                        </tr>
                        <tr align="center">
                            <td>{{UpperLower.id}}</td>
                            <td> {{UpperLower.ItemVariety}} </td>
                            <td> {{UpperLower.FormSize}} </td>
                            <td> {{UpperLower.MaxStressUpper}} </td>
                            <td> {{UpperLower.BellyRodMaxStress}} </td>
                            <td> {{UpperLower.MaxStressLower}} </td>
                            <td> {{UpperLower.TotalMaterialWeight}} </td>
                        </tr>
                        <tr>
                            <td colspan="7"> <img :src="UpperLower.Icon" style='width:90vmin'>  </td>
                        </tr>
                        <tr align="center">
                            <td> CASE </td>
                            <td> 變化 </td>
                            <td> 桁架形式尺寸 </td>
                            <td> 上弦應力比 </td>
                            <td> 腹桿應力比 </td>
                            <td> 下弦應力比 </td>
                            <td> 重量比 </td>
                        </tr>
                        <tr align="center">
                            <td>{{UpperLower.id}}</td>
                            <td> {{UpperLower.ItemVariety}} </td>
                            <td> {{UpperLower.FormSize}} </td>
                            <td> {{UpperLower.UpperStressRatio}} </td>
                            <td> {{UpperLower.BellyRodStressRatio}} </td>
                            <td> {{UpperLower.LowerStressRatio}} </td>
                            <td> {{UpperLower.WeightRatio}} </td>
                        </tr>
                    </table>
                    <br><br>
                </div>

                <h4> 桁架上下弦與腹桿尺寸變化之工程分析 </h4>
                <table id="TrussBellyRodSizeChangeEngineeringAnalysis" style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> CASE </td>
                        <td> 變化 </td>
                        <td> 桁架形式尺寸 </td>
                        <td> 上弦最大應力(MPa) </td>
                        <td> 上弦應力比 </td>
                        <td> 腹桿最大應力(MPa) </td>
                        <td> 腹桿應力比 </td>
                        <td> 下弦最大應力(MPa) </td>
                        <td> 下弦應力比 </td>
                        <td> 材料總重(Kg) </td>
                        <td> 重量比 </td>
                    </tr>
                    <tr align="center" v-for="(UpperLower, index) in TrussBellyRodSizeUpperLower" :key="index">
                        <td>
                            <button  class="btn" v-scroll-to="{ el: '#TrussBellyRodSizeChange'+UpperLower.id }">
                                {{UpperLower.id}}
                            </button>
                        </td>
                        <td> {{UpperLower.ItemVariety}} </td>
                        <td> {{UpperLower.FormSize}} </td>
                        <td> {{UpperLower.MaxStressUpper}} </td>
                        <td> {{UpperLower.UpperStressRatio}} </td>
                        <td> {{UpperLower.BellyRodMaxStress}} </td>
                        <td> {{UpperLower.BellyRodStressRatio}} </td>
                        <td> {{UpperLower.MaxStressLower}} </td>
                        <td> {{UpperLower.LowerStressRatio}} </td>
                        <td> {{UpperLower.TotalMaterialWeight}} </td>
                        <td> {{UpperLower.WeightRatio}} </td>
                    </tr>
                </table>
                <br><br>

                <div id="上下弦與腹桿尺寸變化控制綜合分析"></div>
                <h4>
                    綜合分析
                    <button  class="btn btn-primary" v-scroll-to="{ el: '#上下弦與腹桿尺寸變化控制' }">
                        回頂部
                    </button>
                </h4>
                <p>● 適當的結構強度下，上下弦及負趕的材料設計比較：</p>
                <p>1.因為整體桁架受力最大的部分在上弦，增加腹桿角度可讓上弦受力變小，對整體可承受力量也能愈大。</p>
                <p>2.下弦的部分受力不像上弦受力那麼大，可以腦樑使用厚度較薄的C型鋼，<br>使材料發揮最大的效用。</p>
                <p>3.要改變腹桿受力大小，最直接的方法為改變腹桿頂角角度，<br>改變斷面大小也可以提高腹桿受力，但效果沒有改變角度來得顯著。</p>
                <p>4.腹桿頂角採用桁架兩側較小角度，其餘角度較大，下弦使用與上弦不同厚度的材料，<br>不僅可讓所有桿件受力大小差異變小，亦能降低材料使用成本。</p>
                <br><br>
            </b-tab>

            <b-tab title="屋頂桁架的優化組合設計" :title-link-class="linkClass(4)" id="屋頂桁架的優化組合設計">
                <button  class="btn btn-primary" v-scroll-to="{ el: '#屋頂桁架的優化組合設計綜合分析' }">
                    綜合分析
                </button>
                <br><br>

                <h4> 屋頂桁架的優化組合設計 </h4>
                <p> ps. 可直接點擊 項目內容 前往該項目的屋頂桁架的優化組合設計</p>
                <table id="RoofTrussCombinationChanges"  style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 項目 </td>
                        <td> 圖示 </td>
                    </tr>
                    <tr align="center">
                        <td> 單斜屋架的優化組合設計 </td>
                        <td> <img src = "/images/greenhousestructure/Truss/TrussRoofCombinationChanges/SingleRoofTrussOriginal.png" width="600vmin"> </td>
                    </tr>
                    <tr align="center" v-for="(RoofCombination, index) in TrussRoofCombination" :key="index">
                        <td>
                            <button  class="btn" v-scroll-to="{ el: '#TrussRoofCombinationChange'+RoofCombination.item }">
                                {{RoofCombination.item}}. {{RoofCombination.StructureForm}}
                            </button>
                        </td>
                        <td> <img :src="RoofCombination.StructureAnalysis" style='width:60vmin'>  </td>
                    </tr>
                </table>
                <br><br>


                <div id="優化組合類型" v-for="(RoofCombination, index) in TrussRoofCombination" :key="index">
                    <div v-if="RoofCombination.item === 'A'">
                        <div :id="'TrussRoofCombinationChange'+RoofCombination.item"></div>
                        <br><br><br>
                        
                        <h5>
                            項目 {{RoofCombination.item}} 屋頂桁架的優化組合設計
                            <button  class="btn btn-primary" v-scroll-to="{ el: '#屋頂桁架的優化組合設計' }">
                                回頂部
                            </button>
                        </h5>
                        <table style="border:1px solid black;" border='1'>
                            <tr align="center">
                                <td> {{RoofCombination.item}} {{RoofCombination.StructureForm}}</td>
                                <td> 重量：{{RoofCombination.StructureWeight}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ① 屋架上弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue1}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ② 桁架上弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue2}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ③ 桁架下弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue3}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ④ 腹桿 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue4}} </td>
                            </tr>
                        </table>
                        <img :src="RoofCombination.StructureAnalysisDiagram" style='width:60vmin'>
                        <br><br>
                    </div>
                    <div v-else-if="RoofCombination.item === 'B'">
                        <div :id="'TrussRoofCombinationChange'+RoofCombination.item"></div>
                        <br><br><br>
                        
                        <h5>
                            項目 {{RoofCombination.item}} 屋頂桁架的優化組合設計
                            <button  class="btn btn-primary" v-scroll-to="{ el: '#屋頂桁架的優化組合設計' }">
                                回頂部
                            </button>
                        </h5>
                        <table style="border:1px solid black;" border='1'>
                            <tr align="center">
                                <td> {{RoofCombination.item}} {{RoofCombination.StructureForm}}</td>
                                <td> 重量：{{RoofCombination.StructureWeight}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ① 斜桁架上弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue1}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ② 斜桁架下弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue2}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ③ 腹桿 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue3}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ④ 屋架下弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue4}} </td>
                            </tr>
                        </table>
                        <img :src="RoofCombination.StructureAnalysisDiagram" style='width:60vmin'>
                        <br><br>
                    </div>
                    <div v-else-if="RoofCombination.item === 'C'">
                        <div :id="'TrussRoofCombinationChange'+RoofCombination.item"></div>
                        <br><br><br>

                        <h5>
                            項目 {{RoofCombination.item}} 屋頂桁架的優化組合設計
                            <button  class="btn btn-primary" v-scroll-to="{ el: '#屋頂桁架的優化組合設計' }">
                                回頂部
                            </button>
                        </h5>
                        <table style="border:1px solid black;" border='1'>
                            <tr align="center">
                                <td> {{RoofCombination.item}} {{RoofCombination.StructureForm}}</td>
                                <td> 重量：{{RoofCombination.StructureWeight}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ① 屋架上弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue1}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ② 屋架下弦 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue2}} </td>
                            </tr>
                            <tr align="center">
                                <td align="left"> ③ 腹桿 </td>
                                <td> 最大應力：{{RoofCombination.MaxStressValue3}} </td>
                            </tr>
                        </table>
                        <img :src="RoofCombination.StructureAnalysisDiagram" style='width:60vmin'>
                        <br><br>
                    </div>
                </div>

                <h4> 桁架優化綜合分析比較表 </h4>
                <table id="桁架優化綜合分析" style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td style='width:10vmin'> 項目 </td>
                        <td> 結構形式 </td>
                        <td> 結構分析 </td>
                        <td> 最大受力位置 </td>
                        <td> 最大應力(Mpa) </td>
                        <td> 最大應力比 </td>
                        <td> 結構總重(kg) </td>
                        <td style='width:10vmin'> 重量比 </td>
                    </tr>
                    <tr align="center" v-for="(RoofCombination, index) in TrussRoofCombination" :key="index">
                        <td> {{RoofCombination.item}}</td>
                        <td> {{RoofCombination.StructureForm}}</td>
                        <td> <img :src="RoofCombination.StructureAnalysisDiagram" style='width:46vmin'>  </td>
                        <td> {{RoofCombination.MaxForcePosition}}</td>
                        <td> {{RoofCombination.MaxStress}}</td>
                        <td> {{RoofCombination.MaxStressRatio}}</td>
                        <td> {{RoofCombination.StructureWeight}}</td>
                        <td> {{RoofCombination.WeightRatio}}</td>
                    </tr>
                </table>
                <br><br>

                <div id="屋頂桁架的優化組合設計綜合分析"></div>
                <h4>
                    綜合分析
                    <button  class="btn btn-primary" v-scroll-to="{ el: '#屋頂桁架的優化組合設計' }">
                        回頂部
                    </button>
                </h4>
                <p>● 單斜屋架與桁架優化組合分析比較：</p>
                <p>1. 屋頂桁架分為A. 單斜屋架下方加桁架、B. 單斜屋架上方加桁架、C. 單斜屋架內化為桁架，3類。</p>
                <p>2. 以影響線分析，A.單斜屋架下方加桁架離作用力線最近，有較佳的負荷抵抗能力，C.單斜屋架內化為桁架次之。</p>
                <p>3. 以結構分析可知 C.單斜屋架內化為桁架 之最大應力與結構總重值最小。</p>
                <br><br>
            </b-tab>

        </b-tabs>
    </div>
</template>

<script>
export default {
    data() {
        return {
        tabIndex: 0,
        Materialjson:[],
        TrussHeight:[],
        TrussBellyRodAnglean:[],
        TrussBellyRodSizeUpperLower:[],
        TrussRoofCombination:[],
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
            // 材料結構分析
            const MaterialAnalysis = await fetch('/MaterialAnalysisJSON',  {
                method: 'GET',
            });
            this.Materialjson = await MaterialAnalysis.json();

            // 高度分析
            const TrussHeightAnalysis = await fetch('/TrussHeightAnalysisJSON',  {
                method: 'GET',
            });
            this.TrussHeight = await TrussHeightAnalysis.json();

            // 腹桿角度分析
            const TrussBellyRodAngleAnalysis = await fetch('/TrussBellyRodAngleanAlysisJSON',  {
                method: 'GET',
            });
            this.TrussBellyRodAngle = await TrussBellyRodAngleAnalysis.json();

            // 上下弦與腹桿尺寸變化控制
            const TrussBellyRodSizeUpperLowerChord = await fetch('/TrussBellyRodSizeUpperLowerChordsJSON',  {
                method: 'GET',
            });
            this.TrussBellyRodSizeUpperLower = await TrussBellyRodSizeUpperLowerChord.json();

            // 屋頂桁架的優化組合設計
            const TrussRoofCombinationChange = await fetch('/TrussRoofCombinationChangesJSON',  {
                method: 'GET',
            });
            this.TrussRoofCombination = await TrussRoofCombinationChange.json();
        },linkClass(idx) {   // 處理分頁的顯示
            if (this.tabIndex === idx) {
                return ['bg-info', 'text-light']
            } else {
                return ['bg-light', 'text-dark']
            }
        }
    }
}
</script>
