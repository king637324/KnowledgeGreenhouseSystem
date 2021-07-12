<template>
    <div>
        <br>
        <h3>常見Q&A</h3>
        <hr>

        <b-tabs v-model="tabIndex" card>
            <b-tab title="防蝕處理" :title-link-class="linkClass(0)">
                <!-- 1. 腐蝕等級分為哪些? -->
                <div class="card">
                    <div class="card-header" id="Antiquestion1">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#AntiAns1" aria-expanded="true" aria-controls="Antiquestion1" style="text-decoration:none; color:black; text-align:left;">
                                1. 腐蝕等級分為哪些?
                            </button>
                        </p>
                    </div>

                    <div id="AntiAns1" class="collapse" aria-labelledby="Antiquestion1">
                        <div class="card-body">
                            <p>ISO依據大氣腐蝕現象將腐蝕環境分類為C1、C2、C3、C4與C5-I及 C5-M。</p>
                            <p>詳細請參考以下解答處 → (1)腐蝕環境分類</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/81" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 2. 腐蝕因子有哪些? -->
                <div class="card">
                    <div class="card-header" id="Antiquestion2">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#AntiAns2" aria-expanded="true" aria-controls="Antiquestion2" style="text-decoration:none; color:black; text-align:left;">
                                2. 腐蝕因子有哪些?
                            </button>
                        </p>
                    </div>

                    <div id="AntiAns2" class="collapse" aria-labelledby="Antiquestion2">
                        <div class="card-body">
                            <p>主要的腐蝕因子分類有4類：<br>(1)物理性腐蝕、(2)化學性腐蝕、(3)電化學腐蝕、(4)微生物腐蝕</p>
                            <p>詳細請參考以下解答處 → 2.腐蝕分析</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/69" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 3. 腐蝕防治方法為何? -->
                <div class="card">
                    <div class="card-header" id="Antiquestion3">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#AntiAns3" aria-expanded="true" aria-controls="Antiquestion3" style="text-decoration:none; color:black; text-align:left;">
                                3. 腐蝕防治方法為何?
                            </button>
                        </p>
                    </div>

                    <div id="AntiAns3" class="collapse" aria-labelledby="Antiquestion3">
                        <div class="card-body">
                            <p>腐蝕防治以表面處理加工，其程序實施順序如下:<br>(1)基材處理、(2)鍍層處理、(3)塗層處理、(4)覆層處理</p>
                            <p>詳細請參考以下解答處 → 4.表面處理</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/69" target="_blank" tyle="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 4. 防蝕能力比較? -->
                <div class="card">
                    <div class="card-header" id="Antiquestion4">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#AntiAns4" aria-expanded="true" aria-controls="Antiquestion4" style="text-decoration:none; color:black; text-align:left;">
                                4. 防蝕能力比較?
                            </button>
                        </p>
                    </div>

                    <div id="AntiAns4" class="collapse" aria-labelledby="Antiquestion4">
                        <div class="card-body">
                            <p>依金屬的氧化還原電位，鎂 > 鋁 > 鋅 > 鐵 > 錫 > 銅<br>所以鍍層處理的防蝕能力為以下：<br>鍍鎂鋁鋅 > 鍍鋁鋅 > 鍍鋅 > 冷鍍鋅</p>
                        </div>
                    </div>
                </div>
            </b-tab>

            <b-tab title="鍍鋅" :title-link-class="linkClass(1)">
                <!-- 1. 鍍鋅的種類有哪些? -->
                <div class="card">
                    <div class="card-header" id="Galvanizedquestion1">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#GalvanizedAns1" aria-expanded="true" aria-controls="Galvanizedquestion1" style="text-decoration:none; color:black; text-align:left;">
                                1. 鍍鋅的種類有哪些?
                            </button>
                        </p>
                    </div>

                    <div id="GalvanizedAns1" class="collapse" aria-labelledby="Galvanizedquestion1">
                        <div class="card-body">
                            <p>以金屬鍍層，如鍍鋅、鍍鋁鋅、鍍鎂鋁鋅或金屬粉末堆積(富鋅底漆冷鍍鋅)，<br>進行陽極犧牲或陰極防蝕的電化學的防蝕方法。</p>
                            <p>詳細請參考以下解答處 → 4.表面處理 中的 (2)鍍層處理</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/69" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 2. 材料鍍鋅的模厚如何表示? -->
                <div class="card">
                    <div class="card-header" id="Galvanizedquestion2">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#GalvanizedAns2" aria-expanded="true" aria-controls="Galvanizedquestion2" style="text-decoration:none; color:black; text-align:left;">
                                2. 材料鍍鋅的模厚如何表示?
                            </button>
                        </p>
                    </div>

                    <div id="GalvanizedAns2" class="collapse" aria-labelledby="Galvanizedquestion2">
                        <div class="card-body">
                            <p>詳細請參考以下解答處</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/#/UnitConversion" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
            </b-tab>

            <b-tab title="圓頂桁架" :title-link-class="linkClass(2)">
                <!-- 1. 強固型溫室之圓頂桁架結構，有多種形式設計，如三支集中結構、三支垂直結構、一支平行橫桿結構等, 何者較佳? -->
                <div class="card">
                    <div class="card-header" id="DomeTrussquestion1">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#DomeTrussAns1" aria-expanded="true" aria-controls="DomeTrussquestion1" style="text-decoration:none; color:black; text-align:left;">
                                1. 強固型溫室之圓頂桁架結構，有多種形式設計，如三支集中結構、三支垂直結構、一支平行橫桿結構等，何者較佳?
                            </button>
                        </p>
                    </div>

                    <div id="DomeTrussAns1" class="collapse" aria-labelledby="DomeTrussquestion1">
                        <div class="card-body">
                            <img src = "/images/Q&A/圓頂桁架/強固型溫室.jpg" width="900vmin">
                            <p>以上為常見的溫室圓頂結構，其比較分析</p>
                            <p>詳細請參考以下解答處</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/#/GreenhouseStructureAnalysis/RobustGreenhouse" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 2. 簡易型溫室之圓頂彎管直接承載上部負荷，選擇較大尺寸管徑、較厚管壁、較近桁距等方式，何者較佳? -->
                <div class="card">
                    <div class="card-header" id="DomeTrussquestion2">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#DomeTrussAns2" aria-expanded="true" aria-controls="DomeTrussquestion2" style="text-decoration:none; color:black; text-align:left;">
                                2. 簡易型溫室之圓頂彎管直接承載上部負荷，選擇較大尺寸管徑、較厚管壁、較近桁距等方式，何者較佳?
                            </button>
                        </p>
                    </div>

                    <div id="DomeTrussAns2" class="collapse" aria-labelledby="DomeTrussquestion2">
                        <div class="card-body">
                            <img src = "/images/greenhousestructure/SimpleGreenhouse/SimpleGreenhouseIntroduction.png" width="700vmin">
                            <p>改變管徑尺寸、管壁厚度、桁距、連接管厚度，均可改變其結構</p>
                            <p>詳細請參考以下解答處 → 請點選簡易型溫室 → 簡易型統計分析"</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/#/GreenhouseStructureAnalysis/SimpleGreenhouse" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 3.溫室的圓拱結構是選擇 2"的管徑、2m的桁距 或 1"的管徑、1m的桁距，何者較佳?  -->
                <div class="card">
                    <div class="card-header" id="DomeTrussquestion3">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#DomeTrussAns3" aria-expanded="true" aria-controls="DomeTrussquestion3" style="text-decoration:none; color:black; text-align:left;">
                                3. 溫室的圓拱結構是選擇 2"的管徑、2m的桁距 或 1"的管徑、1m的桁距，何者較佳?
                            </button>
                        </p>
                    </div>

                    <div id="DomeTrussAns3" class="collapse" aria-labelledby="DomeTrussquestion3">
                        <div class="card-body">
                            <p>(1) 一般溫室為可撓性軟性農膜，受風時，會如風帆般吸收風力而變形，<br>桁距越大，則變形越大，承受的風力也隨之加大，故1m的桁距受風力 < 2m的桁距受風力</p>
                            <p>(2) 單支圓拱結構2"的管結構強度 > 1"的結構強度，桁距較大的2"管及桁距較小的1"管之組合結構強度相近，<br>但2"的管 如需加工彎曲成圓拱，須於專業工廠彎曲加工，且不利於運輸，相對成本較高</p>
                            <p>詳細請參考以下解答處</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/#/GreenhouseStructureAnalysis/SimpleGreenhouse" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 4.溫室的圓拱結構是選擇 1/2"的管徑、1/2m的桁距 或 1"的管徑、1m的桁距，何者較佳?  -->
                <div class="card">
                    <div class="card-header" id="DomeTrussquestion3">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#DomeTrussAns4" aria-expanded="true" aria-controls="DomeTrussquestion4" style="text-decoration:none; color:black; text-align:left;">
                                4. 溫室的圓拱結構是選擇 1/2"的管徑、1/2m的桁距 或 1"的管徑、1m的桁距，何者較佳?
                            </button>
                        </p>
                    </div>

                    <div id="DomeTrussAns4" class="collapse" aria-labelledby="DomeTrussquestion4">
                        <div class="card-body">
                            <p>(1) 一般溫室為可撓性軟性農膜，受風時，會如風帆般吸收風力而變形，<br>桁距越大，則變形越大，承受的風力也隨之加大，故1/2m的桁距受風力 < 1m的桁距受風力</p>
                            <p>(2) 單支圓拱結構1"的管結構強度 > 1/2"的結構強度，桁距較大的1"管及桁距較小的1/2"管之組合結構強度相近，<br>但1/2"的管於專業製管廠製造的相對速度較慢，成本較高，於後續的鍍鋅場作業，相對速度較慢，成本亦較高</p>
                            <p>詳細請參考以下解答處</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/#/GreenhouseStructureAnalysis/SimpleGreenhouse" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
            </b-tab>

            <b-tab title="平行桁架" :title-link-class="linkClass(3)">
                <!-- 1. 平行桁架可以較輕的結構重量取代較重的大型H beam，成為主樑結構，但其因所需腹板元件較多且密集，有無輕量化且高強度的新桁架設計? -->
                <div class="card">
                    <div class="card-header" id="ParallelTrussquestion1">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#ParallelTrussAns1" aria-expanded="true" aria-controls="ParallelTrussquestion1" style="text-decoration:none; color:black; text-align:left;">
                                1. 平行桁架可以較輕的結構重量取代較重的大型H beam，成為主樑結構，<br>但其因所需腹板元件較多且密集，有無輕量化且高強度的新桁架設計?
                            </button>
                        </p>
                    </div>

                    <div id="ParallelTrussAns1" class="collapse" aria-labelledby="ParallelTrussquestion1">
                        <div class="card-body">
                            <p>其方法有4種：<br>(1)高度分析、(2)腹桿角度分析、(3)上下弦與腹桿尺寸變化控制、(4)屋頂桁架的優化組合設計</p>
                            <p>詳細請參考以下解答處</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/#/MaterialStructureAnalysis/Truss" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
            </b-tab>

            <b-tab title="單斜屋架" :title-link-class="linkClass(4)">
                <!-- 1. 單斜溫室斜邊跨距長，如何導入桁架設計，應用底部平行桁架、頂部平行桁架、單斜屋架等，何者較佳? -->
                <div class="card">
                    <div class="card-header" id="SingleInclinedRoofTrussquestion1">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#SingleInclinedRoofTrussAns1" aria-expanded="true" aria-controls="SingleInclinedRoofTrussquestion1" style="text-decoration:none; color:black; text-align:left;">
                                1. 單斜溫室斜邊跨距長，如何導入桁架設計，應用底部平行桁架、頂部平行桁架、單斜屋架等，何者較佳?
                            </button>
                        </p>
                    </div>

                    <div id="SingleInclinedRoofTrussAns1" class="collapse" aria-labelledby="SingleInclinedRoofTrussquestion1">
                        <div class="card-body">
                        <p>常見的溫室屋頂桁架組合有3種：<br>A.單斜屋架下方加桁架、B. 單斜屋架上方加桁架、C. 單斜屋架內化為桁架</p>
                        <p>其相關技術分析如下</p>
                        <img src = "/images/Q&A/單斜屋架/屋頂桁架的優化組合.jpg" width="900vmin">
                        <p>詳細請參考以下解答處 → 請點選"材料結構分析" 中的 "桁架 → 屋頂桁架的優化組合設計"</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/#/MaterialStructureAnalysis/Truss" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
            </b-tab>

            <b-tab title="結構強化" :title-link-class="linkClass(5)">
                <!-- 1. 已建置之溫室，如何強化結構? -->
                <div class="card">
                    <div class="card-header" id="StructuralStrengthenquestion1">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#StructuralStrengthenAns1" aria-expanded="true" aria-controls="StructuralStrengthenquestion1" style="text-decoration:none; color:black; text-align:left;">
                                1. 已建置之溫室，如何強化結構?
                            </button>
                        </p>
                    </div>

                    <div id="StructuralStrengthenAns1" class="collapse" aria-labelledby="StructuralStrengthenquestion1">
                        <div class="card-body">
                            <p>溫室材料結構優化 將以質(材質)、形(形狀)、貌(形貌)、能(機能)等四項技術提升</p>
                            <p>包含：(1)材料材質優化設計、(2)材料高剖面係數之優化設計、(3)材料表面處理與高耐蝕性設計、(4)材料機能優化設計</p>
                            <p>詳細請參考以下解答處</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/158" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答</a>
                        </div>
                    </div>
                </div>
                <!-- 2. 溫室防颱等級如何提升? -->
                <div class="card">
                    <div class="card-header" id="StructuralStrengthenquestion2">
                        <p class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#StructuralStrengthenAns2" aria-expanded="true" aria-controls="StructuralStrengthenquestion2" style="text-decoration:none; color:black; text-align:left;">
                                2. 溫室防颱等級如何提升?
                            </button>
                        </p>
                    </div>

                    <div id="StructuralStrengthenAns2" class="collapse" aria-labelledby="StructuralStrengthenquestion2">
                        <div class="card-body">
                            <p>在溫室防颱工程設計中，可以分為3個：<br>(1)溫室材料結構優化技術、(2)溫室組合抗颱強化設計、(3)溫室防颱優化設計流程</p>
                            <p>詳細請參考以下解答處</p>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/158" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答(溫室材料結構優化技術)</a>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/159" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答(溫室組合抗颱強化設計)</a>
                            <a class="btn btn-primary mr-auto p-2 bd-highlight" href = "/MaterialsAndDesignKnowledgeBase/Article/show/160" target="_blank" style="font-family:Microsoft JhengHei;">前 往 問 題 解 答(溫室防颱優化設計流程)</a>
                        </div>
                    </div>
                </div>
            </b-tab>

        </b-tabs>

    </div>

</template>

<script>
export default {
    data(){
        return{
            tabIndex: 0, // 處理分頁的顯示

        }
    },
    created:function(){  // 網頁載入時，一開始就載入

    },
    methods:{
        linkClass(idx) { // 處理分頁的顯示
            if (this.tabIndex === idx) {
                return ['bg-info', 'text-light']
            } else {
                return ['bg-light', 'text-dark']
            }
        }
    }
}
</script>
