<template>
    <div >
        <v-container >
            <v-container>
                    <h1>文章</h1>
                    <button type="button" class="btn btn-danger" v-on:click="check">檢查</button>

                    <!-- <v-jstree :data="KnowledgeTreejson" @item-click="itemClick"></v-jstree>
                    <v-jstree :data="data" @item-click="itemClick"></v-jstree>
                    <vue-tree-navigation :items="items"/> -->
                    <!-- <v-treeview :items="KnowledgeTreejson" open-on-click :open.sync="open" :active="children">

                    </v-treeview> -->

                    <!-- <v-treeview
                        v-model="seleselectioncted"
                        :active.sync="active"
                        :open.sync="open"
                        :items="KnowledgeTreejson"
                        :load-children="getChilds"
                        open-on-click>

                    </v-treeview> -->

                    <v-treeview
                        activatable
                        :items="KnowledgeTreejson"
                        item-key="id"
                        open-on-click>

                        <template slot="label" slot-scope="{ item }">
                            <a @click="getChilds(item)">{{item.name}}</a>
                        </template>

                    </v-treeview>

            </v-container>

            <div class="pages">

                <h6>
                    open<br>{{open}}
                </h6>
                <br>
                <br>

                <h6>
                    test<br>{{test}}
                </h6>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>

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

            test:[],

            KnowledgeTreejson:[],
            data: [{
                "id": 1,
                "text": "Text 1",
                "children": [
                    {
                        "id": 2,
                        "text": "Text 1.1",
                        "children": []
                    },
                    {
                        "id": 3,
                        "text": "Text 1.2",
                        "children": []
                    }
                ]
            }],

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
            // console.log("item.content:");
            // console.log(item.content);

            this.test.push(item.id,item.name,item.editor,item.content);

        }
    },
}
</script>
