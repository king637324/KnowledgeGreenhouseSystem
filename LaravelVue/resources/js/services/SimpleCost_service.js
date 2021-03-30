import { http, httpFile } from './http_service';

export function createSimpleCost(data) {
    // console.log("------createSimpleCost的service裡-------");
    // console.log(data);

    return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/SimpleCost', data);
}

export function UpdateSimpleCost(id, data) {

    // console.log("-----------id-------------");
    // console.log(id);
    // console.log("-----------data-------------");
    // console.log(data);


    return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${id}`, data);
}

export function deleteSimpleCost(data) {
    // console.log("------deleteKnowledge-------");
    // console.log(data);
    // return http().delete(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${data[0]}`);
}