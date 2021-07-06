<template>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">col-sm-8</div>
            <div class="col-sm-8">col-sm-4</div>
        </div>
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

            Search:null,    // 搜尋的內容
            SearchIndex:0,  // 搜尋下拉選單所選的選項
            SearchList:[[0,'===請搜尋==='],],   // 透過搜尋的內容所建造出的下拉選單選項
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        this.getJson();
        // console.log(this.$auth.user());
    },
    methods: {
        async getJson(){    //取的資料庫資料，將資料轉成JSON
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

            // 初始化一開始載入的知識頁面
            this.KnowledgeContent = [];
            var updateDate = this.Knowledgejson[0].created_at.split('T');   // 讓修改時間，只顯示日期
            this.KnowledgeContent.push(this.Knowledgejson[0].id,this.Knowledgejson[0].name,this.Knowledgejson[0].editor,this.Knowledgejson[0].content,updateDate[0]);

        },getItemContent(item){  // 得到所點擊的treeview標題項目id
            // 初始化要顯示的內容
            this.KnowledgeContent = [];
            var updateDate = item.created_at.split('T');    // 讓修改時間，只顯示日期
            this.KnowledgeContent.push(item.id,item.name,item.editor,item.content,updateDate[0]);

        },getSearchSelect: function (val) { // 搜尋欄列一但有input，就觸發，創建下拉選單可選擇的選單選項
            this.SearchList = [];    // 將搜尋選項列清空
            var empty = true;   // 確認是否有搜尋到相關知識，有則false，沒有則true

            // 如果搜尋欄列 長度為零，則初始化下拉選單選項
            if (this.Search.length == 0) {
                this.SearchList = [[0,'===請搜尋==='],];
                this.SearchIndex = 0;
                empty = true;
            }else{
                // 初始化下拉選單的選項清單和選項index
                this.SearchList = [[0,'==選擇搜尋結果=='],];
                this.SearchIndex = 0;
                // 從知識資料庫中過濾所有知識
                for(var i = 0 ; i < this.Knowledgejson.length ; i++){
                    var content = this.Knowledgejson[i].content.toLowerCase();

                    // 如果知識的文章裡面 有包含 欲搜尋欄列中的文字，則顯示相關知識文章的選項
                    if(content.includes(this.Search.toLowerCase())){
                        var test = [];
                        test.push(this.Knowledgejson[i].id);
                        test.push(this.Knowledgejson[i].name);
                        this.SearchList.push(test)
                        empty = false;
                    }
                }

                // 如果沒有找到相關知識文章的選項，則 下拉選單沒有選項可選擇
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
                    break;
                }
            }
        },deleteKnowledge: async function(DeleteId){    // 刪除知識資料 函式呼叫
            if(!window.confirm(`你確定要刪除 ${DeleteId[1]} 嗎?`)){
                return;
            }

            try {
                // 呼叫 knowledge_service.js 的 deleteKnowledge
                await KnowledgeService.deleteKnowledge(DeleteId);
                this.getJson(); // 刪除資料後，馬上更新顯示的資料

                // 刪除成功的提示視窗
                this.flashMessage.success({
                    message: '知識 資料刪除成功!!',
                    time: 3000
                });

            } catch (error) {
                // 刪除失敗的提示視窗
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        }
    }
}
</script>
