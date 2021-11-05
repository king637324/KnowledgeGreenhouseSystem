<template>

    <div>
        <br>
        <h3 id="自載重">
            自載重
        </h3>
        <hr>
        <center><img src="/image/widget.jpeg" width="100%"></center>
    </div>
</template>

<script>

  export default {
    data: () => ({
        roof_type:['WTG','SP','VTP','UTP','VBP','UBP','UP'],
        roof_name:['玻璃溫室','斜頂溫室','山型力霸','圓形力霸','山型塑膠膜','圓形塑膠膜','簡易溫室'],
        roof_number:[16,16,15,14,13,12,6],
    }),

    created:function(){  // 網頁載入時，一開始就載入
    },
}
</script>