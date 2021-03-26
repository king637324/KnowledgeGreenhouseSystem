import { http, httpFile } from './http_service';

export function createSimpleCost(data) {
    // console.log("------createSimpleCost的service裡-------");
    // console.log(data);

    return httpFile().post('/GreenhouseMasterPlan/CostAnalysis/SimpleCost', data);
}

export function deleteSimpleCost(data) {
    // console.log("------deleteKnowledge-------");
    // console.log(data);
    return http().delete(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${data[0]}`);
}

export function UpdateSimpleCost(SimpleCostData, data) {

    console.log("-----------SimpleCostData-------------");
    console.log(SimpleCostData);
    console.log("-----------SimpleCostData.id-------------");
    console.log(SimpleCostData.id);
    console.log("-----------data-------------");
    console.log(data);


    // return httpFile().post(`/GreenhouseMasterPlan/CostAnalysis/SimpleCost/${SimpleCostData.id}`, data);
}