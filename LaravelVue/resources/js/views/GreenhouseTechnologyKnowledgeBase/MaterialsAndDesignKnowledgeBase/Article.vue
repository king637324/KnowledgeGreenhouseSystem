<template>
    <div >
        <v-container >
            <v-container>
                    <v-navigation-drawer light absolute  permanent >
                    <h1>文章</h1>
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

                <h6>
                    test.content<br>{{test[3]}}
                </h6>
                <br>
                <br>
                <br>


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
            console.log("item.content:");
            console.log(item.content);

            this.test = [];

            this.test.push(item.id,item.name,item.editor,item.content);

        }
    },
}
</script>
