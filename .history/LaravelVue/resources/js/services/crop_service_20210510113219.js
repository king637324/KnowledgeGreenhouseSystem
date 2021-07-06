import { http, httpFile } from './http_service';

// 新增作物資料
export function createCrop(data) {
    return httpFile().post('/GreenhouseMasterPlan/CropSelection', data);
}

// 刪除作物資料
export function deleteCrop(data) {
    return http().delete(`/GreenhouseMasterPlan/CropSelection/${data}`);
}

// 更新作物資料
export function UpdateCrop(EditCropData, data) {
    return httpFile().post(`/GreenhouseMasterPlan/CropSelection/${EditCropData.id}`, data);
}