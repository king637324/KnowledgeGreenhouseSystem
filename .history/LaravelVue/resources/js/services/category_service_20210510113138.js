import { http, httpFile } from './http_service';

// 新增資料
export function createCategory(data) {
    // console.log("-----------createdata-------------");
    // console.log(data);

    return httpFile().post('/categories', data);
}

// 載入資料
export function loadCategories() {
    return http().get('/categories');
}

// 刪除資料
export function deleteCategory(test) {
    return http().delete(`categories/${test.name}`);
}

// 更新資料
export function UpdateCategory(test, data) {
    // console.log("-----------test-------------");
    // console.log(test);
    // console.log("-----------data-------------");
    // console.log(data);
    // console.log("-----------test.name-------------");
    // console.log(test.name);

    return httpFile().post(`/categories/${test.name}`, data);
}