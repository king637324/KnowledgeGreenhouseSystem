<template>
    <div class="container-fluid">
        <h1 class="mt-4">Categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                <router-link to="/">測試</router-link>
            </li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
        <div class="row">
            <div class="col-xl-12">
                <div class="card-header d-flex">
                    <span>
                        <i class="fas fa-chart-area"></i>
                        資料管理
                    </span>
                    <button class="btn btn-primary btn-sm ml-auto" v-on:click="showNewCategoryModal"><span class="fa fa-plus"></span> Creat New</button>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>姓名</td>
                                <td>信箱</td>
                                <td>密碼</td>
                                <td>abc</td>
                                <td>圖片</td>
                                <td>動作</td>
                                <!-- <td>封鎖/解除</td>
                                <td>刪除</td> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(test, index) in categories" :key="index">
                                <td>{{test.name}}</td>
                                <td>{{test.mail}}</td>
                                <td>{{test.password}}</td>
                                <td>{{test.abc}}</td>
                                <td>
                                    <img :src ="'/image/'+test.image " :alt="test.name" class="table-image"/>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><span class="fa fa-edit"></span></button>
                                    <button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <b-modal ref="NewCategoryModal" hide-footer title="Add New Category">
            <div class="d-block">
                <form v-on:submit.prevent="createCategory">
                    <div class="form-group">
                        <label for="name">輸入姓名</label>
                        <input type="text" v-model="categoryData.name" class="form-control" id="name" placeholder="請輸入姓名">
                        <div class="invalid-feedback" v-if="errors.name">{{ errors.name[0] }}</div>
                    </div>
                    <div class="form-group">
                        <label for="mail">輸入信箱</label>
                        <input type="email" v-model="categoryData.mail" class="form-control" id="mail" placeholder="請輸入信箱">
                        <div class="invalid-feedback" v-if="errors.mail">{{ errors.mail[0] }}</div>
                    </div>
                    <div class="form-group">
                        <label for="password">輸入密碼</label>
                        <input type="password" v-model="categoryData.password" class="form-control" id="word" placeholder="請輸入密碼">
                        <div class="invalid-feedback" v-if="errors.password">{{ errors.password[0] }}</div>
                    </div>
                    <div class="form-group">
                        <label for="abc">輸入abc</label>
                        <input type="text" v-model="categoryData.abc" class="form-control" id="abc" placeholder="請輸入abc">
                        <div class="invalid-feedback" v-if="errors.abc">{{ errors.abc[0] }}</div>
                    </div>
                    <div class="form-group">
                        <label for="image">選擇圖片</label>
                        <div v-if="categoryData.image.name">
                            <img src="" ref="NewCategoryImageDisplay" class="w-150px"/>
                        </div>
                        <input type="file" v-on:change="attachImage" ref="NewCategoryImage" class="form-control" id="image" />
                        <div class="invalid-feedback" v-if="errors.image">{{ errors.image[0] }}</div>
                    </div>

                    <hr>
                    <div class="text-right">
                        <button type="button" class="btn btn-default" v-on:click="hideNewCategoryModal">取消</button>
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>儲存</button>
                    </div>

                </form>
                <hr>
            </div>
        </b-modal>

    </div>
</template>


<script>
    import * as categoryService from '../services/category_service';
    export default {
        name:'category',
        data(){
            return{
                categories:[],
                categoryData:{
                    name:'',
                    mail:'',
                    password:'',
                    abc:'',
                    image:'',
                },
                errors:{

                }
            }
        },
        mounted(){
            this.loadCategories();
        },
        methods:{
            loadCategories: async function(){
                try {
                    const response = await categoryService.loadCategories();
                    // console.log(response);
                    this.categories = response.data.data;
                    // console.log(this.categories);

                } catch (error) {
                    this.flashMessage.error({
                        message: 'LoadCategories 有錯誤發生!!',
                        time: 5000
                    });
                }
            },
            attachImage(){
                this.categoryData.image = this.$refs.NewCategoryImage.files[0];
                let reader = new FileReader();
                reader.addEventListener('load',function(){
                    this.$refs.NewCategoryImageDisplay.src = reader.result;
                }.bind(this),false);

                reader.readAsDataURL(this.categoryData.image);
            },
            hideNewCategoryModal(){
                this.$refs.NewCategoryModal.hide();
            },
            showNewCategoryModal(){
                this.$refs.NewCategoryModal.show();
            },
            createCategory: async function(){
                let formData = new FormData();
                formData.append('name',this.categoryData.name);
                formData.append('mail',this.categoryData.mail);
                formData.append('password',this.categoryData.password);
                formData.append('abc',this.categoryData.abc);
                formData.append('image',this.categoryData.image);
                try{
                    const response = await categoryService.createCategory(formData);
                    // console.log(response);
                    // console.log('成功');
                    this.categories.unshift(response.data); // 將新增的資料馬上顯示
                    this.hideNewCategoryModal(); // 讓按下儲存時，隱藏表單
                    this.flashMessage.success({
                        message: 'test 資料寫入成功!!',
                        time: 3000
                    });

                } catch (error){
                    console.log(error.response.status);

                    switch (error.response.status) {
                        case 422:
                            this.errors = error.response.data.errors;
                            break;

                        default:
                            this.flashMessage.error({
                                message: 'test 資料寫入有錯誤發生!!',
                                time: 5000
                            });
                            break;
                    }
                }
            }

        }
    }
</script>
