import { http, httpFile } from './http_service';

// 新增強固型溫室參數資料
export function createLight(data) {
    return httpFile().post('/EnvironmentalControlDesign/LightEnvironmentNeed', data);
}
 
// 更新強固型溫室參數資料
export function UpdateLight(id, data) {
    return httpFile().post(`/EnvironmentalControlDesign/LightEnvironmentNeed/${id}`, data);
}

// 刪除強固型溫室參數資料
export function deleteLight(data) {
    return http().delete(`/EnvironmentalControlDesign/LightEnvironmentNeed/${data}`);
}