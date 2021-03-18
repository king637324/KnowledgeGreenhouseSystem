import { http, httpFile } from './http_service';

export function createSimpleCost(data) {
    // console.log("------createKnowledgeData-------");
    // console.log(data);

    return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/SimpleCost', data);
}

export function deleteSimpleCost(data) {
    // console.log("------deleteKnowledge-------");
    // console.log(data);
    return http().delete(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${data[0]}`);
}

export function UpdateSimpleCost(EditKnowledgeData, data) {

    // console.log("-----------EditKnowledgeData-------------");
    // console.log(EditKnowledgeData);
    // console.log("-----------EditKnowledgeData.id-------------");
    // console.log(EditKnowledgeData.id);
    // console.log("-----------data-------------");
    // console.log(data);


    return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${EditKnowledgeData.id}`, data);
}