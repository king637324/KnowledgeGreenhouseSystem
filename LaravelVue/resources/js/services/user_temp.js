import { http, httpFile } from './http_service';

// 新增強固型溫室參數資料
export function createTemp(data) {
    return httpFile().post('/EnvironmentalControlDesign/TemperatureEnvironmentNeed', data);
}
 
// 更新強固型溫室參數資料
export function UpdateTemp(id, data) {
    return httpFile().post(`/EnvironmentalControlDesign/TemperatureEnvironmentNeed/${id}`, data);
}

// 刪除強固型溫室參數資料
export function deleteTemp(data) {
    return http().delete(`/EnvironmentalControlDesign/TemperatureEnvironmentNeed/${data}`);
}