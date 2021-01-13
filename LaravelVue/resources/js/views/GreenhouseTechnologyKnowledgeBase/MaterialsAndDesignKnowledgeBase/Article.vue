<template>
    <div >
        <v-container >

                    <v-navigation-drawer light absolute permanent stateless>
                    <h3>材料與設計知識庫</h3>
                    
         
                    <button type="button" class="btn btn-danger" v-on:click="check">檢查</button>
                    <button type="button" class="btn btn-primary" v-on:click="showNewArticleModal" >新增</button>

                        <v-treeview
                            activatable
                            :items="KnowledgeTreejson"
                            item-key="id"
                            open-on-click >

                            <template slot="label" slot-scope="{ item }" >
                                <div v-on:click="getChilds(item)">
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
                    </div>
                </div>
                <hr>

                <h5 v-html="KnowledgeContent[3]">
                </h5>
                </div>

        </v-container>
        <b-modal size='xl' ref="NewCategoryModal"  hide-footer title="新增資料">
            <div class="d-block ">
                <form v-on:submit.prevent="createCategory">
                    <table>
                        <td>
                            <tr>
                                <div style="width:200px;">
                                <div class="form-group" >
                                <label for="FatherClass">父項目:</label>
                                <v-select  v-model="categoryData.FatherClass" :items="items" label="父項目:"></v-select>
                                <div class="invalid-feedback" v-if="errors.FatherClass">{{ errors.FatherClass[0] }}</div>
                                </div>
                                </div>
                            </tr>
                        </td>
                            <td>
                            <tr>
                            <div class="form-group">
                            <label for="Title">標題:</label>
                            <input type="Title" v-model="categoryData.Title" class="form-control" id="Title" placeholder="標題">
                            <div class="invalid-feedback" v-if="errors.Title">{{ errors.Title[0] }}</div>
                        </div>
                            </tr>
                            </td>
                            <td>
                            <tr>
                        <div class="form-group">
                        <label for="Editor">編輯人:                        </label>
                        <input type="Editor" v-model="categoryData.Editor" class="form-control" id="Editor" placeholder="編輯人">
                        <div class="invalid-feedback" v-if="errors.Editor">{{ errors.Editor[0] }}</div>
                    </div>
                            </tr>
                            
                        </td>
                    </table>
                    <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>
    

                    <hr>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" v-on:click="hideNewCategoryModal">取消</button>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>創建</button>
                    </div>

                </form>
                <hr>
            </div>
        </b-modal>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items:[],
            categoryData:{
                    FatherClass:'',
                    Title:'',
                    Editor:'',

                },
            errors:{

                },
            selectionType: 'leaf',
            selection: [],
            open:null,
            children:null,
            active:null,

            KnowledgeContent:[],

            KnowledgeTreejson:[],

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
    },
    methods: {
        async getJson(){
            // 作物資訊資料表
            const KnowledgeTree = await fetch('/KnowledgeTreeJSON',  {
                method: 'GET',
            });
            this.KnowledgeTreejson = await KnowledgeTree.json();

        },itemClick(item) {
            // console.log(node.model.text + ' clicked !');
            console.log(item.children + ' clicked !');

        },check(){
            console.log("----KnowledgeTreejson----");
            console.log(this.KnowledgeTreejson);
            console.log("----data----");
            console.log(this.data);
        },getChilds(item){
            console.log("----getChilds----");
            console.log("item.id");
            console.log(item.id);
            console.log("item.name");
            console.log(item.name);
            console.log("item.editor:");
            console.log(item.editor);
            console.log("item.content:");
            console.log(item.content);

            this.KnowledgeContent = [];

            this.KnowledgeContent.push(item.id,item.name,item.editor,item.content);

        },showNewArticleModal(){
            this.$refs.NewCategoryModal.show();
        },hideNewCategoryModal(){
                this.$refs.NewCategoryModal.hide();
        },
    },
}
</script>
