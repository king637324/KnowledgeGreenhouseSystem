import { http, httpFile } from './http_service';

// 新增簡易型溫室參數資料
export function createResult(data) {
    return httpFile().post('/GreenhouseMasterPlan/GreenhouseResult', data);
}

// 更新簡易型溫室參數資料
export function UpdateResult(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/GreenhouseResult/${id}`, data);
}

// 刪除簡易型溫室參數資料
export function deleteResult(data) {
    return http().delete(`/GreenhouseMasterPlan/GreenhouseResult/${data}`);
}