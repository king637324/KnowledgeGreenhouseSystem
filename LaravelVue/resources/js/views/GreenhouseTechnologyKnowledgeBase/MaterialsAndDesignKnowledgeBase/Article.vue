<template>
    <div >
        <v-container >
            <v-container>
        <v-navigation-drawer light absolute  >
        <h1>文章</h1>
        <button type="button" class="btn btn-danger" v-on:click="check">檢查</button>
        
        <v-jstree :data="KnowledgeTreejson" @item-click="itemClick"></v-jstree>
        <v-jstree :data="data" @item-click="itemClick"></v-jstree>
        <vue-tree-navigation :items="items"/>
        </v-navigation-drawer>
            </v-container>

                 <div class="pages">
                     <h1>
                         123
                     </h1>
                     <br>
                     <br>
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

            items: [
                { name: 'First category', children: [
                    { name: 'Category item', href: '#take-me-somewhere' },
                    { name: 'Category item', href: '#take-me-somewhere' }
                ]},
                { name: 'Second category', href: '#take-me-somewhere' },
            ],

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

        },itemClick (node) {
            console.log(node.model.text + ' clicked !');
        },check(){
            console.log("----KnowledgeTreejson----");
            console.log(this.KnowledgeTreejson);
            console.log("----data----");
            console.log(this.data);
        }
    },
}
</script>
