import { http, httpFile } from './http_service';

// 新增強固型溫室參數資料
export function createFilm(data) {
    return httpFile().post('/GreenhouseMasterPlan/GreenhouseCoatedFilm', data);
}
 
// 更新強固型溫室參數資料
export function UpdateFilm(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/GreenhouseCoatedFilm/${id}`, data);
}

// 刪除強固型溫室參數資料
export function deleteFilm(data) {
    return http().delete(`/GreenhouseMasterPlan/GreenhouseCoatedFilm/${data}`);
}