<template>
    <div >
        <v-container >
            <v-container>
                    <v-navigation-drawer light absolute  >
                    <h3>材料與設計知識庫</h3>
                    <button type="button" class="btn btn-danger" v-on:click="check">檢查</button>
                        <v-treeview
                            activatable
                            :items="KnowledgeTreejson"
                            item-key="id"
                            open-on-click>

                            <template slot="label" slot-scope="{ item }">
                                <a v-on:click="getChilds(item)"> {{item.name}} </a>
                            </template>
                        </v-treeview>

                    </v-navigation-drawer>


            </v-container>


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


        </v-container>
    </div>
</template>

<script>
export default {
    data() {
        return {
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

        }
    },
}
</script>
