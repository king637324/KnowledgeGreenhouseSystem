import { http, httpFile } from './http_service';

// 新增簡易型溫室參數資料
export function createWidget(data) {
    return httpFile().post('/GreenhouseMasterPlan/Greenhousewidget', data);
}

// 更新簡易型溫室參數資料
export function UpdateWidget(id, data) {
    return httpFile().post(`/GreenhouseMasterPlan/Greenhousewidget/${id}`, data);
}

// 刪除簡易型溫室參數資料
export function deleteWidget(data) {
    return http().delete(`/GreenhouseMasterPlan/Greenhousewidget/${data}`);
}