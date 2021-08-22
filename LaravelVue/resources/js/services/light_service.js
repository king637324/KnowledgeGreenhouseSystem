import { http, httpFile } from './http_service';

// 新增簡易型溫室參數資料
export function createLight(data) {
    return httpFile().post('/GreenhouseMasterPlan/GreenhouseOverallPlan', data);
}

// 更新簡易型溫室參數資料
export function UpdateLight(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/GreenhouseOverallPlan/${id}`, data);
}

// 刪除簡易型溫室參數資料
export function deleteLight(data) {
    return http().delete(`/GreenhouseMasterPlan/GreenhouseOverallPlan/${data}`);
}