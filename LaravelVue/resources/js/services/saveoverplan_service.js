import { http, httpFile } from './http_service';

// 新增簡易型溫室參數資料
export function createOverPlan(data) {
    window.alert('hi2')
    return httpFile().post('/GreenhouseMasterPlan/GreenhouseOverallPlan', data);
}

// 更新簡易型溫室參數資料
export function UpdateOverPlan(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/GreenhouseOverallPlan/${id}`, data);
}

// 刪除簡易型溫室參數資料
export function deleteOverPlan(data) {
    return http().delete(`/GreenhouseMasterPlan/GreenhouseOverallPlan/${data}`);
}