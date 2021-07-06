import { http, httpFile } from './http_service';

// 新增強固型溫室參數資料
export function createStrongCost(data) {
    return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/StrongCost', data);
}

// 更新強固型溫室參數資料
export function UpdateStrongCost(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/StrongCost/${id}`, data);
}

// 刪除強固型溫室參數資料
export function deleteStrongCost(data) {
    return http().delete(`/GreenhouseMasterPlan/CostAnalysis/StrongCost/${data}`);
}