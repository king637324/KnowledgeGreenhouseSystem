import { http, httpFile } from './http_service';

export function createStrongCost(data) {
    // console.log("------createKnowledgeData-------");
    // console.log(data);

    return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/StrongCost', data);
}

export function deleteStrongCost(data) {
    // console.log("------deleteKnowledge-------");
    // console.log(data);
    return http().delete(`/GreenhouseMasterPlan/CostAnalysis/StrongCost/${data[0]}`);
}

export function UpdateStrongCost(EditKnowledgeData, data) {

    // console.log("-----------EditKnowledgeData-------------");
    // console.log(EditKnowledgeData);
    // console.log("-----------EditKnowledgeData.id-------------");
    // console.log(EditKnowledgeData.id);
    // console.log("-----------data-------------");
    // console.log(data);


    return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/StrongCost/${EditKnowledgeData.id}`, data);
}