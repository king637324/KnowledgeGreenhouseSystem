import { http, httpFile } from './http_service';

// 新增 知識庫知識
export function createKnowledge(data) {
    return httpFile().post('/MaterialsAndDesignKnowledgeBase/Article', data);
}

// 刪除知識庫知識
export function deleteKnowledge(data) {
    return http().delete(`/MaterialsAndDesignKnowledgeBase/Article/${data[0]}`);
}

// 更新知識庫知識
export function UpdateKnowledge(EditKnowledgeData, data) {
    return httpFile().post(`/MaterialsAndDesignKnowledgeBase/Article/${EditKnowledgeData.id}`, data);
}