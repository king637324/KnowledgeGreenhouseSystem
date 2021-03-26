import { http, httpFile } from './http_service';

export function createStrongCost(data) {
    // console.log("------createKnowledgeData-------");
    // console.log(data);

    // return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/StrongCost', data);
}

export function UpdateStrongCost(id, data) {

    console.log("-----------id-------------");
    console.log(id);
    console.log("-----------data-------------");
    console.log(data);

    // return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/StrongCost/${id}`, data);
}

export function deleteStrongCost(data) {
    // console.log("------deleteKnowledge-------");
    // console.log(data);
    // return http().delete(`/GreenhouseMasterPlan/CostAnalysis/StrongCost/${data[0]}`);
}