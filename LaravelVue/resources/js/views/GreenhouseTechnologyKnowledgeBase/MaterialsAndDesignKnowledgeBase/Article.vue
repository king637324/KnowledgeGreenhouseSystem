<template>
    <div >
        <br>
        <v-container >
            <v-navigation-drawer light absolute permanent stateless>
                <h3>材料與設計知識庫</h3>

                <button type="button" class="btn btn-danger" v-on:click="check">檢查</button>
                <button type="button" class="btn btn-primary" v-on:click="showNewKnowledgeModal" >新 增 知 識</button>

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
                <div class="p-2 w-100 bd-highlight">
                    <h3>
                        {{KnowledgeContent[1]}}
                    </h3>
                </div>
                <div class="p-2 flex-shrink-1 bd-highlight">
                    <h6>
                        {{KnowledgeContent[2]}}
                    </h6>
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
                                        <b-select  v-model="KnowledgeData.parent_id" label="父項目:" v-on:change="check">
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

                    <ckeditor v-model="KnowledgeData.content" editorUrl="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></ckeditor>
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

        <b-modal size='xl' ref="EditKnowledgeModal" hide-footer title="編輯知識資料">
            <div class="d-block">
                <form v-on:submit.prevent="UpdateKnowledge">
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="form-group" >
                                        <label for="parent_id" style="width: 30vmin">父項目:</label>
                                        <b-select  v-model="EditKnowledgeData.parent_id" :items="SelectParent" label="父項目:" v-on:change="check">
                                            <option v-for="(data, index) in SelectParent" :value="index">
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

                    <ckeditor v-model="EditKnowledgeData.content" editorUrl="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></ckeditor>

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

<script>
import * as KnowledgeService from '../../../services/knowledge_service';

export default {
    data() {
        return {
            KnowledgeTreejson:[],   // 知識庫資料，treeview 所需的資料結構
            KnowledgeContent:[],    // 顯示 所選擇的 知識 資料
            Knowledgejson:[],   // 知識庫資料

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


        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
            // 知識庫資料 (treeview用)
            const KnowledgeTree = await fetch('/KnowledgeTreeJSON',  {
                method: 'GET',
            });
            this.KnowledgeTreejson = await KnowledgeTree.json();
            this.KnowledgeContent = [];

            this.KnowledgeContent.push(this.KnowledgeTreejson[0].id,this.KnowledgeTreejson[0].name,this.KnowledgeTreejson[0].editor,this.KnowledgeTreejson[0].content);


            // 知識庫資料
            const Knowledge = await fetch('/KnowledgeJSON',  {
                method: 'GET',
            });
            this.Knowledgejson = await Knowledge.json();

            this.SelectParent = [];
            this.SelectParent = [[0,'無父項目']];
            for(var i=0; i<this.Knowledgejson.length;i++){
                var idname = [];
                idname.push(this.Knowledgejson[i].id);
                idname.push(this.Knowledgejson[i].name);
                this.SelectParent.push(idname);
            }

        },check(){
            // console.log("----KnowledgeTreejson----");
            // console.log(this.KnowledgeTreejson);
            // console.log("----Knowledgejson----");
            // console.log(this.Knowledgejson);

            console.log("----KnowledgeData.parent_i----");
            console.log(this.KnowledgeData.parent_id);

        },getItemContent(item){  // 得到所點擊的項目id

            this.KnowledgeContent = [];
            this.KnowledgeContent.push(item.id,item.name,item.editor,item.content);
            console.log("-----item.id-----");
            console.log(item.id);
            console.log("-----this.KnowledgeContent-----");
            console.log(this.KnowledgeContent[0]);

        },hideNewKnowledgeModal(){
            this.$refs.NewKnowledgeModal.hide();
        },showNewKnowledgeModal(){
            this.$refs.NewKnowledgeModal.show();
        },createKnowledge: async function(){
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
        },deleteKnowledge: async function(DeleteId){
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
        },hideEditKnowledgeModal(){
            this.$refs.EditKnowledgeModal.hide();
        },showEditKnowledgeModal(){
            this.$refs.EditKnowledgeModal.show();
        },
        EditKnowledge(KnowledgeContent){
            console.log("有進EditKnowledge");

            var find = null;
            for(var i=0; i<this.Knowledgejson.length;i++){
                if(KnowledgeContent[0] == this.Knowledgejson[i].id){
                    find = this.Knowledgejson[i];
                    break;
                }
            }

            this.EditKnowledgeData = {...find};
            this.showEditKnowledgeModal();

        },UpdateKnowledge:async function(){


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
        }
    },
}
</script>
