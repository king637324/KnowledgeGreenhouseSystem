import { http, httpFile } from './http_service';

export function createKnowledge(data) {
    // console.log("------createKnowledgeData-------");
    // console.log(data);

    return httpFile().post('/MaterialsAndDesignKnowledgeBase/Article', data);
}

export function deleteKnowledge(data) {
    // console.log("------deleteKnowledge-------");
    // console.log(data);
    return http().delete(`/MaterialsAndDesignKnowledgeBase/Article/${data[0]}`);
}

export function UpdateKnowledge(EditKnowledgeData, data) {

    // console.log("-----------EditKnowledgeData-------------");
    // console.log(EditKnowledgeData);
    // console.log("-----------EditKnowledgeData.id-------------");
    // console.log(EditKnowledgeData.id);
    // console.log("-----------data-------------");
    // console.log(data);


    return httpFile().post(`/MaterialsAndDesignKnowledgeBase/Article/${EditKnowledgeData.id}`, data);
}