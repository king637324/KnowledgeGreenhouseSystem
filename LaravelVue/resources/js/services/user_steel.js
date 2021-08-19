import { http, httpFile } from './http_service';

// 新增強固型溫室參數資料
export function createSteel(data) {
    return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis', data);
}

// 更新強固型溫室參數資料
export function UpdateSteel(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis/${id}`, data);
}

// 刪除強固型溫室參數資料
export function deleteSteel(data) {
    return http().delete(`/GreenhouseMasterPlan/CostAnalysis/GreenhouseMaterialCostAnalysis/${data}`);
}