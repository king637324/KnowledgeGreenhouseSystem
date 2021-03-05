import { http, httpFile } from './http_service';

export function createCrop(data) {
    console.log("------createCropData-------");
    console.log(data);
    console.log("返回前端");

    return httpFile().post('/GreenhouseMasterPlan/CropSelection', data);
}

export function deleteCrop(data) {
    console.log("------deleteCrop-------");
    console.log(data);
    return http().delete(`/GreenhouseMasterPlan/CropSelection/${data}`);
}

export function UpdateCrop(EditCropData, data) {

    // console.log("-----------EditCropData-------------");
    // console.log(EditCropData);
    // console.log("-----------EditCropData.id-------------");
    // console.log(EditCropData.id);
    // console.log("-----------data-------------");
    // console.log(data);


    return httpFile().post(`/GreenhouseMasterPlan/CropSelection/${EditCropData.id}`, data);
}