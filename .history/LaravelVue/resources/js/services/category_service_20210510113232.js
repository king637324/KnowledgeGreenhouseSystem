import { http, httpFile } from './http_service';

// 新增資料
export function createCategory(data) {
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
    return httpFile().post(`/categories/${test.name}`, data);
}