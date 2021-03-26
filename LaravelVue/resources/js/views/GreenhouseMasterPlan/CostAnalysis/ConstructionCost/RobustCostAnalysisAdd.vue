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
import * as StrongCostAddService from '../../../../services/StrongCost_service';

export default {
    data() {
        return {
            StrongRules: [
                v => !!v || '必填',
            ],
            StrongData:{
                id: null,
                Expert: null,
                /******** 溫室型材  ********/
                // 標準型材
                StandardProfileCost: '',
                StandardProfileStructureRisk: '',
                StandardProfileWorkDifficulty: '',
                // 高強型材
                HighStrengthMoldMaterialCost: '',
                HighStrengthMoldMaterialStructureRisk: '',
                HighStrengthMoldMaterialWorkDifficulty: '',
                // 耐蝕型材
                CorrosionResistantMoldMaterialCost: '',
                CorrosionResistantMoldMaterialStructureRisk: '',
                CorrosionResistantMoldMaterialWorkDifficulty: '',
                // 高強高耐蝕型材
                HighStrengthHighCorrosionResistantMoldMaterialCost: '',
                HighStrengthHighCorrosionResistantMoldMaterialStructureRisk: '',
                HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty: '',

                /******** 屋頂形式  ********/
                // 圓頂UBP
                DomeUBPCost: '',
                DomeUBPStructureRisk: '',
                DomeUBPWorkDifficulty: '',
                // 圓力霸UTP
                TwistedPairUTPCost: '',
                TwistedPairUTPStructureRisk: '',
                TwistedPairUTPWorkDifficulty: '',
                // 山型VBP
                MountainTypeVBPCost: '',
                MountainTypeVBPStructureRisk: '',
                MountainTypeVBPWorkDifficulty: '',
                // 山力霸VTP
                YamarikiVTPCost: '',
                YamarikiVTPStructureRisk: '',
                YamarikiVTPWorkDifficulty: '',
                // W型力霸
                WTypeForceCost: '',
                WTypeForceStructureRisk: '',
                WTypeForceWorkDifficulty: '',
                // 單斜SP
                MonoclinicSPCost: '',
                MonoclinicSPStructureRisk: '',
                MonoclinicSPWorkDifficulty: '',

                /******** 上拱距  ********/
                // 2M
                twoMCost: '',	
                twoMStructureRisk: '',	
                twoMWorkDifficulty: '',
                // 1.33M
                oneThreeThreeMCost: '',	
                oneThreeThreeMStructureRisk: '',	
                oneThreeThreeMWorkDifficulty: '',
                // 1M
                oneMCost: '',
                oneMStructureRisk: '',
                oneMWorkDifficulty: '',

                /******** 基礎  ********/
                // 獨立基礎
                IndependenceFoundationCost: '',	
                IndependenceFoundationStructureRisk: '',
                IndependenceFoundationWorkDifficulty: '',
                // 連續樑
                ContinuousBeamCost: '',	
                ContinuousBeamStructureRisk: '',
                ContinuousBeamWorkDifficulty: '',
                // 快速基礎
                RapidBasicsCost: '',	
                RapidBasicsStructureRisk: '',
                RapidBasicsWorkDifficulty: '',

                /******** 跨距  ********/
                // 6m
                sixMCost: '',
                sixMStructureRisk: '',
                sixMWorkDifficulty: '',
                // 7m
                sevenMCost: '',
                sevenMStructureRisk: '',
                sevenMWorkDifficulty: '',
                // 8m
                eightMCost: '',
                eightMStructureRisk: '',
                eightMWorkDifficulty: '',
                // 9m
                nineMCost: '',
                nineMStructureRisk: '',
                nineMWorkDifficulty: '',
                // 10m
                tenMCost: '',
                tenMStructureRisk: '',
                tenMWorkDifficulty: '',

                /******** 肩高  ********/
                // 3m
                threeMCost: '',	
                threeMStructureRisk: '',
                threeMWorkDifficulty: '',
                // 3.5m
                threeFiveMCost: '',	
                threeFiveMStructureRisk: '',
                threeFiveMWorkDifficulty: '',
                // 4m
                fourMCost: '',	
                fourMStructureRisk: '',
                fourMWorkDifficulty: '',
                // 4.5m
                fourFiveMCost: '',	
                fourFiveMStructureRisk: '',
                fourFiveMWorkDifficulty: '',
                // 5m
                fiveMCost: '',	
                fiveMStructureRisk: '',
                fiveMWorkDifficulty: '',

                /******** 長度  ********/
                // 30m
                ThirtymCost: '',
                ThirtymStructureRisk: '',
                ThirtymWorkDifficulty: '',
                // 60m
                SixtymCost: '',
                SixtymStructureRisk: '',
                SixtymWorkDifficulty: '',
                // 90m
                NinetymCost: '',
                NinetymStructureRisk: '',
                NinetymWorkDifficulty: '',
                // 120m
                OneHundredTwentymCost: '',
                OneHundredTwentymStructureRisk: '',
                OneHundredTwentymWorkDifficulty: '',

                /******** 連續性  ********/
                // 獨棟
                DetachedHouseCost: '',
                DetachedHouseStructureRisk: '',
                DetachedHouseWorkDifficulty: '',
                // 二連棟
                TwoStoryBuildingCost: '',
                TwoStoryBuildingStructureRisk: '',
                TwoStoryBuildingWorkDifficulty: '',
                // 三連棟
                ThreeStoryCost: '',
                ThreeStoryStructureRisk: '',
                ThreeStoryWorkDifficulty: '',
                // 四連棟
                FourStoryCost: '',
                FourStoryStructureRisk: '',
                FourStoryWorkDifficulty: '',

                /******** 披覆膜  ********/
                // PE
                PECost: '',
                PEStructureRisk: '',
                PEWorkDifficulty: '',
                // PO
                POCost: '',
                POStructureRisk: '',
                POWorkDifficulty: '',
                // 硬質塑材
                RigidPlasticCost: '',
                RigidPlasticStructureRisk: '',
                RigidPlasticWorkDifficulty: '',
                // ETFE
                ETFECost: '',
                ETFEStructureRisk: '',
                ETFEWorkDifficulty: '',
                // 玻璃
                GlassCost: '',
                GlassStructureRisk: '',
                GlassWorkDifficulty: '',
                
            },
            errors:{

            },
            proportiontotoalCost: 100,
            proportiontotoalStructuralRisk: 100,
            proportiontotoalJobDifficulty: 100,
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        // this.$auth.user();
        // console.log(this.$auth.user()); // 可以取得使用者資料

        // 如果帳號有登入，才能顯示他的id帳號
        if(this.$auth.check()){
            this.StrongData.Expert = this.$auth.user().id;
        }
    },
    methods: {
        calculator(){
            // this.proportiontotoalCost = parseInt(this.StrongData.GreenhousePipeCost) + ;
            // this.proportiontotoalStructuralRisk = parseInt(this.StrongData.GreenhousePipeStructuralRisk) + ;
            // this.proportiontotoalJobDifficulty = parseInt(this.StrongData.GreenhousePipeJobDifficulty) + ;
        },
        createSimple: async function(){
            let formData = new FormData();
            formData.append('Expert',this.StrongData.Expert);

            try{
                const response = await StrongCostAddService.createStrongCost(formData);
                // 創建成功後，頁面跳轉回 文章知識頁面
                // window.location = '/#/DevelopConstructionCostAnalysisTestment';
                // 創建成功的提示視窗
                this.flashMessage.success({
                    message: '強固型溫室構造成本參數 資料寫入成功!!',
                    time: 3000
                });

            } catch (error){

                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    default:
                        this.flashMessage.error({
                            message: '強固型溫室構造成本參數 寫入有錯誤發生!!',
                            time: 5000
                        });
                        break;
                }
            }
        }
    },
}
</script>

