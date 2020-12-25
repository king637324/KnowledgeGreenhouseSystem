import { http, httpFile } from './http_service';

export function createCategory(data) {
    return httpFile().post('/categories', data);
}

export function loadCategories() {
    return http().get('/categories');
}

export function deleteCategory(test) {
    return http().delete(`categories/${test.name}`);
}

export function UpdateCategory(name, data) {
    return httpFile().post(`/categories/${name}`, data);
}