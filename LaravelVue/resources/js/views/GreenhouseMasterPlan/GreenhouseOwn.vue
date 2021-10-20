<template>

    <div>
        <br>
        <h3 id="自載重">
            自載重
        </h3>
        <hr>
        <table style="border:1px solid black; font-size: 1.5vmin; width:50em; height:50em; margin-left:35em;" border='1'>
            <thead class="table-active">
                <tr align="center">
                    <td>型式</td>
                    <td>名稱</td>
                    <td>kg/m2</td>
                </tr>
            </thead>
            <tr align="center" v-for="(data, index) in roof_type" :key="index">
                <td>{{ roof_type[index] }}</td>
                <td>{{ roof_name[index] }}</td>
                <td>{{ roof_number[index] }}</td>
            </tr>
        </table>
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