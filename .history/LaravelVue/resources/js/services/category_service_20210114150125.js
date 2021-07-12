import { http, httpFile } from './http_service';

export function createCategory(data) {
    // console.log("-----------createdata-------------");
    // console.log(data);

    return httpFile().post('/categories', data);
}

export function loadCategories() {
    return http().get('/categories');
}

export function deleteCategory(test) {
    return http().delete(`categories/${test.name}`);
}

export function UpdateCategory(test, data) {
    // console.log("-----------test-------------");
    // console.log(test);
    // console.log("-----------data-------------");
    // console.log(data);
    // console.log("-----------test.name-------------");
    // console.log(test.name);

    return httpFile().post(`/categories/${test.name}`, data);
}