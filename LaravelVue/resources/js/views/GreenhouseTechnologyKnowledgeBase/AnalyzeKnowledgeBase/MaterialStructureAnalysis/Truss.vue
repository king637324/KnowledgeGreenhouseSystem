<template>
    <div>
        <b-tabs v-model="tabIndex" card>
            <b-tab title="桁架介紹" :title-link-class="linkClass(0)">
                <h5>平行桁架可以較輕的結構重量取代較重的大型H beam，成為主樑結構，<br>但其因所需腹板元件較多且密集，有無輕量化且高強度的新桁架設計?</h5>
                <h5>其方法有4種：<br>(1)高度分析、(2)腹桿角度分析、(3)上下弦與腹桿尺寸變化控制、(4)屋頂桁架的優化組合設計</h5>

            </b-tab>
            <b-tab title="高度分析" :title-link-class="linkClass(1)">
                <h5> 可直接點擊 編號內容 前往該編號的桁架高度變化性能分析</h5>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 圖示 </td>
                    </tr>
                    <tr v-for="(Height, index) in TrussHeight" :key="index">
                        <td align="center">
                            <a class="btn" :href="'#'+Height.TrussType">
                                {{Height.TrussType}}
                            </a>
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
                </table>
                <br><br>

                <h4> 桁架高度－最大應力分析 </h4>
                <p> 水平桁架高度越高上弦結構最大應力越小 </p>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 圖示 </td>
                    </tr>
                </table>
                <br><br>

                <h4> 桁架高度－最大載重量分析 </h4>
                <p> 水平桁架高度越高可承受最大載重越大 </p>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 圖示 </td>
                    </tr>
                </table>
                <br><br>

                <div id="桁架高度類型">
                </div>

                <h4> 桁架高度變化綜合分析 </h4>
                <table style="border:1px solid black;" border='1'>
                    <tr align="center">
                        <td> 編號 </td>
                        <td> 桁架高度 </td>
                        <td> 變形量分析(mm) </td>
                        <td> 最大應力分析(kg/cm2) </td>
                        <td> 最大載重量分析( kN) </td>
                    </tr>
                </table>
                <br><br>
            </b-tab>

            <b-tab title="腹桿角度分析" :title-link-class="linkClass(2)">

            </b-tab>

            <b-tab title="上下弦與腹桿尺寸變化控制" :title-link-class="linkClass(3)">

            </b-tab>

            <b-tab title="屋頂桁架的優化組合設計" :title-link-class="linkClass(4)">

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
            const TrussBellyRodAngleanAlysis = await fetch('/TrussBellyRodAngleanAlysisJSON',  {
                method: 'GET',
            });
            this.TrussBellyRodAnglean = await TrussBellyRodAngleanAlysis.json();

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

            console.log("------this.Materialjson------");
            console.log(this.Materialjson);
            console.log("------高度分析------");
            console.log(this.TrussHeight);
            console.log("------腹桿角度分析------");
            console.log(this.TrussBellyRodAnglean);
            console.log("------上下弦與腹桿尺寸變化控制------");
            console.log(this.TrussBellyRodSizeUpperLower);
            console.log("------屋頂桁架的優化組合設計------");
            console.log(this.TrussRoofCombination);



        },linkClass(idx) {
        if (this.tabIndex === idx) {
            return ['bg-info', 'text-light']
        } else {
            return ['bg-light', 'text-dark']
        }
        }
    }
}
</script>
