<template>
    <div v-if="$auth.check()">
        <div class="row" v-if="$auth.user().identity === '管理者'">
            <div class="col-xl-12">
                <div class="card-header d-flex">
                    <h4>
                        會員管理
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table" align="center">
                        <thead>
                            <tr>
                                <td>姓名</td>
                                <td>電話號碼</td>
                                <td>信箱</td>
                                <td>身分別</td>
                                <td>公司</td>
                                <td>狀態</td>
                                <td>封鎖/解除</td>
                                <td>刪除</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in UserDatajson" :key="index" v-if="user.identity != '管理者'">
                                <td>{{user.name}}</td>
                                <td>{{user.phoneNumber}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.identity}}</td>
                                <td>{{user.companyname}}</td>
                                <td>{{user.status}}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"  v-on:click="deleteCategory(user)">封鎖/解除封鎖</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm"  v-on:click="deleteCategory(user)"><span class="fa fa-trash"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            UserDatajson:[],   // 知識庫資料，treeview 所需的資料結構
        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        // console.log(this.$auth.user()); // 可以取得使用者資料
        this.getJson();
    },
    methods: {
        async getJson(){
            // 知識庫資料 (treeview用)
            const UserData = await fetch('/UserJSON',  {
                method: 'GET',
            });
            this.UserDatajson = await UserData.json();

            console.log(this.UserDatajson);
        }
    },
}
</script>

