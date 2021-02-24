import { http, httpFile } from './http_service';

export function createCrop(data) {
    // console.log("------createCropData-------");
    // console.log(data);

    return httpFile().post('/MaterialsAndDesignCropBase/Article', data);
}

export function deleteCrop(data) {
    // console.log("------deleteCrop-------");
    // console.log(data);
    return http().delete(`/MaterialsAndDesignCropBase/Article/${data[0]}`);
}

export function UpdateCrop(EditCropData, data) {

    // console.log("-----------EditCropData-------------");
    // console.log(EditCropData);
    // console.log("-----------EditCropData.id-------------");
    // console.log(EditCropData.id);
    // console.log("-----------data-------------");
    // console.log(data);


    return httpFile().post(`/MaterialsAndDesignCropBase/Article/${EditCropData.id}`, data);
}