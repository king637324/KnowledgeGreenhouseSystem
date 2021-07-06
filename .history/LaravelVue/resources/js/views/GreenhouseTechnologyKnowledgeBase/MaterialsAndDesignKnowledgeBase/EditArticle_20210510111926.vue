<template>
    <div>
        <h3>編輯知識資料</h3>
        <hr>

        <form v-on:submit.prevent="UpdateKnowledge" method="post">
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
                <button type="button" class="btn btn-secondary" v-on:click="returnArticle">取消</button>
                <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>儲存</button>
            </div>

        </form>
    </div>

</template>

<script src="/js/ckfinder/ckfinder.js"></script><!-- 處理圖片上傳 -->

<script>
import * as KnowledgeService from '../../../services/knowledge_service';

export default {
    data() {
        return {
            Knowledgejson:[],   // 知識庫資料
            editorURL:'https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js',
            editorConfig: {
                // The configuration of the editor.
                height : 450,
                autoGrow_minHeight : 450,
                autoGrow_onStartup : true,
                language: 'zh',// 設定語言

                filebrowserBrowseUrl: '/js/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '/js/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl: '/js/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
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

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    mounted() {

    },
    methods: {
        async getJson(){
            // 知識庫資料
            const Knowledge = await fetch('/KnowledgeJSON',  {
                method: 'GET',
            });
            this.Knowledgejson = await Knowledge.json();

            // 初始化 父項目下拉選單的選項
            this.SelectParent = [];
            this.SelectParent = [[0,'無父項目']];
            for(var i=0; i<this.Knowledgejson.length;i++){
                var idname = [];
                idname.push(this.Knowledgejson[i].id);
                idname.push(this.Knowledgejson[i].name);
                this.SelectParent.push(idname);
            }

            this.EditKnowledge();

        },EditKnowledge(){  // 編輯資料 變數宣告，得到要編輯的知識id
            var find = null;
            var ArticleNumber = this.$route.params.id;  // this.$route.params.id 可以得到夾帶參數的id

            // 從知識資料庫中尋找要編輯的知識id
            for(var i=0; i<this.Knowledgejson.length;i++){
                if(ArticleNumber == this.Knowledgejson[i].id){
                    find = this.Knowledgejson[i];
                    break;
                }
            }

            this.EditKnowledgeData = {...find};

        },UpdateKnowledge:async function(){ // 編輯資料 函式呼叫
            try {
                let formData = new FormData();
                formData.append('parent_id',this.EditKnowledgeData.parent_id);
                formData.append('name',this.EditKnowledgeData.name);
                formData.append('editor',this.EditKnowledgeData.editor);
                formData.append('content',this.EditKnowledgeData.content);
                formData.append('_method','put');
                const response = await KnowledgeService.UpdateKnowledge(this.EditKnowledgeData, formData);

                // 修改成功後，頁面跳轉回 文章知識頁面
                window.location = '/#/MaterialsAndDesignKnowledgeBase/Article';

                // 修改成功的提示視窗
                this.flashMessage.success({
                    message: '知識 資料更新成功!!',
                    time: 3000
                });

            } catch (error) {
                // 修改失敗的提示視窗
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },returnArticle(){
            // 返回文章知識頁面
            window.location = '/#/MaterialsAndDesignKnowledgeBase/Article';
        }
    }
}
</script>
