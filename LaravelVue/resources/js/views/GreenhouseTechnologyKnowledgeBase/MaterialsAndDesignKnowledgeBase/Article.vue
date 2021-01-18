<template>
    <div >
        <br>
        <v-container >
            <v-navigation-drawer light absolute permanent stateless>
                <h3>材料與設計知識庫</h3>
                <!-- <button type="button" class="btn btn-danger" v-on:click="check">檢查</button> -->
                <v-text-field
                    label="Search"
                    v-model="Search"
                    @input="getSearchSelect"
                    >
                </v-text-field>

                <b-select v-model="SearchIndex" v-on:change="SearchSelectReslut" style="font-size: 2vmin; width:25vmin" >
                    <option v-for="(data, index) in SearchList" :value="data[0]">
                        {{data[1]}}
                    </option>
                </b-select>

                <!-- <button type="button" class="btn btn-primary" v-on:click="showNewKnowledgeModal">新 增 知 識</button> -->
                <a class="btn btn-primary" href = "/#/MaterialsAndDesignKnowledgeBase/AddArticle"><span class="fa fa-plus"></span> 新 增 知 識</a>

                <v-treeview
                    activatable
                    :items="KnowledgeTreejson"
                    item-key="id"
                    open-on-click >

                    <template slot="label" slot-scope="{ item }" >
                        <div v-on:click="getItemContent(item)">
                        <a> {{item.name}} </a>
                        </div>
                    </template>
                </v-treeview>

            </v-navigation-drawer>

            <div class="pages">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <h3>
                            {{KnowledgeContent[1]}}
                        </h3>
                    </div>
                    <div class="p-2 bd-highlight">
                        <h6>
                            編輯者：{{KnowledgeContent[2]}}
                        </h6>
                        <h6>
                            最後修改日：{{KnowledgeContent[4]}}
                        </h6>
                    </div>
                    <div class="p-2 bd-highlight">
                        <button class="btn btn-primary btn-sm" v-on:click="EditKnowledge(KnowledgeContent)"><span class="fa fa-edit"></span></button>
                        <button class="btn btn-danger btn-sm"  v-on:click="deleteKnowledge(KnowledgeContent)"><span class="fa fa-trash"></span></button>
                    </div>
                </div>
                <hr>

                <h5 v-html="KnowledgeContent[3]">
                </h5>
            </div>

        </v-container>

        <!-- 新增知識資料 -->
        <b-modal size='xl' ref="NewKnowledgeModal"  hide-footer title="新增知識資料">
            <div class="d-block ">
                <form v-on:submit.prevent="createKnowledge">
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="form-group" >
                                        <label for="parent_id" style="width: 10vmin">父項目:</label>
                                        <b-select  v-model="KnowledgeData.parent_id" label="父項目:">
                                            <option v-for="(data, index) in SelectParent" :value="data[0]">
                                                {{data[0]}} {{data[1]}}
                                            </option>
                                        </b-select>
                                        <div class="invalid-feedback" v-if="errors.parent_id">{{ errors.parent_id[0] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="Title" style="width: 30vmin">標題:</label>
                                    <input type="Title" v-model="KnowledgeData.name" class="form-control" id="Title" placeholder="請輸入標題">
                                    <div class="invalid-feedback" v-if="errors.name">{{ errors.name[0] }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="Editor" style="width: 30vmin">編輯人:</label>
                                    <input type="Editor" v-model="KnowledgeData.editor" class="form-control" id="Editor" placeholder="請輸入編輯人">
                                    <div class="invalid-feedback" v-if="errors.editor">{{ errors.editor[0] }}</div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <ckeditor v-model="KnowledgeData.content" :editorUrl="editorURL" :config="editorConfig"></ckeditor>


                    <div class="invalid-feedback" v-if="errors.content">{{ errors.content[0] }}</div>


                    <hr>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" v-on:click="hideNewKnowledgeModal">取消</button>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>創建</button>
                    </div>

                </form>
                <hr>
            </div>
        </b-modal>

        <!-- 編輯知識資料 -->
        <b-modal size='xl' ref="EditKnowledgeModal" hide-footer title="編輯知識資料">
            <div class="d-block">
                <form v-on:submit.prevent="UpdateKnowledge">
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="form-group" >
                                        <label for="parent_id" style="width: 30vmin">父項目:</label>
                                        <b-select  v-model="EditKnowledgeData.parent_id" :items="SelectParent" label="父項目:">
                                            <option v-for="(data, index) in SelectParent" :value="data[0]">
                                                {{data[0]}} {{data[1]}}
                                            </option>
                                        </b-select>
                                        <div class="invalid-feedback" v-if="errors.parent_id">{{ errors.parent_id[0] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="Title" style="width: 30vmin">標題:</label>
                                    <input type="Title" v-model="EditKnowledgeData.name" class="form-control" id="Title" placeholder="請輸入標題">
                                    <div class="invalid-feedback" v-if="errors.name">{{ errors.name[0] }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="Editor" style="width: 30vmin">編輯人:</label>
                                    <input type="Editor" v-model="EditKnowledgeData.editor" class="form-control" id="Editor" placeholder="請輸入編輯人">
                                    <div class="invalid-feedback" v-if="errors.editor">{{ errors.editor[0] }}</div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <ckeditor v-model="EditKnowledgeData.content" :editorUrl="editorURL" :config="editorConfig"></ckeditor>



                    <hr>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" v-on:click="hideEditKnowledgeModal">取消</button>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>儲存</button>
                    </div>

                </form>
                <hr>
            </div>
        </b-modal>

    </div>
</template>

<script src="/js/ckfinder/ckfinder.js"></script><!-- 處理圖片上傳 -->

<script>
import * as KnowledgeService from '../../../services/knowledge_service';

export default {
    data() {
        return {
            KnowledgeTreejson:[],   // 知識庫資料，treeview 所需的資料結構
            KnowledgeContent:[],    // 顯示 所選擇的 知識 資料
            Knowledgejson:[],   // 知識庫資料
            editorURL:'https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js',
            editorConfig: {
                // The configuration of the editor.
                height : 450,
                autoGrow_minHeight : 450,
                autoGrow_onStartup : true,
                language: 'zh',// 設定語言
                filebrowserBrowseUrl: '/js/ckfinder/ckfinder.html',
                filebrowserUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                // filebrowserBrowseUrl: '/js/ckfinder/ckfinder.html',
                // filebrowserImageBrowseUrl: '/js/ckfinder/ckfinder.html?type=Images',
                // filebrowserFlashBrowseUrl: '/js/ckfinder/ckfinder.html?type=Flash',
                // filebrowserUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                // filebrowserImageUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                // filebrowserFlashUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            },

            KnowledgeData:{
                    parent_id:0,
                    name:'',
                    editor:'',
                    content:'',

            },
            EditKnowledgeData:{

            },
            errors:{

            },

            SelectParent:[[0,'無父項目']],    // 選擇父項目

            Search:null,
            SearchIndex:0,
            SearchList:[[0,'==請輸入搜尋=='],],



        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    mounted() {
        CKEDITOR.env.isCompatible = true;
        CKEDITOR.replace('ckeditor', {
            height: 500
        });
    },
    methods: {
        async getJson(){
            // 知識庫資料 (treeview用)
            const KnowledgeTree = await fetch('/KnowledgeTreeJSON',  {
                method: 'GET',
            });
            this.KnowledgeTreejson = await KnowledgeTree.json();

            // 知識庫資料
            const Knowledge = await fetch('/KnowledgeJSON',  {
                method: 'GET',
            });
            this.Knowledgejson = await Knowledge.json();

            this.KnowledgeContent = [];
            var updateDate = this.Knowledgejson[0].created_at.split('T');   // 讓修改時間，只顯示日期
            this.KnowledgeContent.push(this.Knowledgejson[0].id,this.Knowledgejson[0].name,this.Knowledgejson[0].editor,this.Knowledgejson[0].content,updateDate[0]);

            this.SelectParent = [];
            this.SelectParent = [[0,'無父項目']];
            for(var i=0; i<this.Knowledgejson.length;i++){
                var idname = [];
                idname.push(this.Knowledgejson[i].id);
                idname.push(this.Knowledgejson[i].name);
                this.SelectParent.push(idname);
            }

        },getItemContent(item){  // 得到所點擊的項目id

            this.KnowledgeContent = [];
            var updateDate = item.created_at.split('T');    // 讓修改時間，只顯示日期
            this.KnowledgeContent.push(item.id,item.name,item.editor,item.content,updateDate[0]);

        },hideNewKnowledgeModal(){  // 隱藏 新增資料 視窗
            this.$refs.NewKnowledgeModal.hide();
        },showNewKnowledgeModal(){  // 顯示 新增資料 視窗
            this.$refs.NewKnowledgeModal.show();
        },createKnowledge: async function(){    // 新增資料 函式呼叫
            let formData = new FormData();
            formData.append('parent_id',this.KnowledgeData.parent_id);
            formData.append('name',this.KnowledgeData.name);
            formData.append('editor',this.KnowledgeData.editor);
            formData.append('content',this.KnowledgeData.content);
            try{
                const response = await KnowledgeService.createKnowledge(formData);
                this.getJson(); // 將新增的資料馬上顯示
                this.hideNewKnowledgeModal(); // 讓按下儲存時，隱藏表單
                this.flashMessage.success({
                    message: '知識 資料寫入成功!!',
                    time: 3000
                });
                this.KnowledgeData = {
                    parent_id:0,
                    name:'',
                    editor:'',
                    content:''
                };
            } catch (error){

                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    default:
                        this.flashMessage.error({
                            message: '知識 資料寫入有錯誤發生!!',
                            time: 5000
                        });
                        break;
                }
            }
        },deleteKnowledge: async function(DeleteId){    // 刪除資料 函式呼叫
            if(!window.confirm(`你確定要刪除 ${DeleteId[1]} 嗎?`)){
                return;
            }

            try {
                await KnowledgeService.deleteKnowledge(DeleteId);

                // 刪除資料後，馬上更新顯示的資料
                this.getJson(); // 將新增的資料馬上顯示

                this.flashMessage.success({
                    message: '知識 資料刪除成功!!',
                    time: 3000
                });

            } catch (error) {
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },hideEditKnowledgeModal(){ // 隱藏 編輯資料 視窗
            this.$refs.EditKnowledgeModal.hide();
        },showEditKnowledgeModal(){ // 顯示 編輯資料 視窗
            this.$refs.EditKnowledgeModal.show();
        },EditKnowledge(KnowledgeContent){  // 編輯資料 變數宣告
            var find = null;
            for(var i=0; i<this.Knowledgejson.length;i++){
                if(KnowledgeContent[0] == this.Knowledgejson[i].id){
                    find = this.Knowledgejson[i];
                    break;
                }
            }

            this.EditKnowledgeData = {...find};
            // window.location = "#/articles/edit/" + KnowledgeContent[0];
            this.showEditKnowledgeModal();

        },UpdateKnowledge:async function(){ // 編輯資料 函式呼叫


            try {
                let formData = new FormData();
                formData.append('parent_id',this.EditKnowledgeData.parent_id);
                formData.append('name',this.EditKnowledgeData.name);
                formData.append('editor',this.EditKnowledgeData.editor);
                formData.append('content',this.EditKnowledgeData.content);
                formData.append('_method','put');
                const response = await KnowledgeService.UpdateKnowledge(this.EditKnowledgeData, formData);

                this.getJson(); // 將更新的資料馬上更新

                this.hideEditKnowledgeModal(); // 讓按下儲存時，隱藏表單

                this.flashMessage.success({
                    message: '知識 資料更新成功!!',
                    time: 3000
                });

            } catch (error) {
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },getSearchSelect: function (val) { // 搜尋列一但有input，就觸發 選擇欄可選擇的內容值
            this.SearchList = [];    // 將搜尋選項列清空
            var empty = true;   // 確認是否有搜尋到相關知識，有則false，沒有則true
            if (this.Search.length == 0) {
                this.SearchList = [[0,'==請輸入搜尋=='],];
                this.SearchIndex = 0;
                empty = true;
            }else{
                this.SearchList = [[0,'==選擇搜尋結果=='],];
                this.SearchIndex = 0;
                for(var i = 0 ; i < this.Knowledgejson.length ; i++){
                    // var value = val.toLowerCase();
                    var content = this.Knowledgejson[i].content.toLowerCase();

                    if(content.includes(this.Search.toLowerCase())){
                        var test = [];
                        test.push(this.Knowledgejson[i].id);
                        test.push(this.Knowledgejson[i].name);
                        this.SearchList.push(test)
                        empty = false;
                    }
                }

                if(empty){
                    this.SearchList = [[0,'!!無相關關鍵字!!'],];
                    this.SearchIndex = 0;
                }
            }

        },SearchSelectReslut(){ // 顯示所點擊的知識內容
            this.KnowledgeContent = []; // 初始化知識內容
            for(var i=0; i<this.Knowledgejson.length;i++){
                if(this.SearchIndex == this.Knowledgejson[i].id){
                    var updateDate = this.Knowledgejson[i].created_at.split('T');   // 讓修改時間，只顯示日期
                    this.KnowledgeContent.push(this.Knowledgejson[i].id,this.Knowledgejson[i].name,this.Knowledgejson[i].editor,this.Knowledgejson[i].content,updateDate[0]);
                }
            }
        },check(){  // 檢查用
            // console.log("----KnowledgeTreejson----");
            // console.log(this.KnowledgeTreejson);
            // console.log("----Knowledgejson----");
            // console.log(this.Knowledgejson);
            // console.log("----KnowledgeData.parent_i----");
            // console.log(this.KnowledgeData.parent_id);

        }
    }
}
</script>
