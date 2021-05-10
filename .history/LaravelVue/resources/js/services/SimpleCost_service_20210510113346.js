import { http, httpFile } from './http_service';

// 新增簡易型溫室參數資料
export function createSimpleCost(data) {
    return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/SimpleCost', data);
}

// 更新簡易型溫室參數資料
export function UpdateSimpleCost(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${id}`, data);
}

// 刪除簡易型溫室參數資料
export function deleteSimpleCost(data) {
    return http().delete(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${data}`);
}