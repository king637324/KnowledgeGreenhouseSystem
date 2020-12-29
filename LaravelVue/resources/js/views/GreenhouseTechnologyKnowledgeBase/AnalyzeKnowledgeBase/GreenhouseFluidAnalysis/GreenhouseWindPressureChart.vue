<template>
    <div>
        <h3>
            各種溫室型式的各受風面之風壓比較
        </h3>

        <line-chart :data="{'2017-05-13': 2, '2017-05-14': 5}"></line-chart>
        <pie-chart :data="[['Blueberry', 44], ['Strawberry', 23]]"></pie-chart>
        <column-chart :data="[['Sun', 32], ['Mon', 46], ['Tue', 28]]"></column-chart>
        <bar-chart :data="[['X-Small', 5], ['Small', 27]]"></bar-chart>
        <area-chart :data="{'2017-01-01 00:00:00 -0800': 2, '2017-01-01 00:01:00 -0800': 5}"></area-chart>
        <scatter-chart :data="[[174.0, 80.0], [176.5, 82.3]]" xtitle="Size" ytitle="Population"></scatter-chart>
        <geo-chart :data="[['United States', 44], ['Germany', 23], ['Brazil', 22]]"></geo-chart>
        <timeline :data="[['Washington', '1789-04-29', '1797-03-03'], ['Adams', '1797-03-03', '1801-03-03']]"></timeline>

        <line-chart :data="data" />

        <line-chart data="/stocks"></line-chart>
        <line-chart id="users-chart" width="800px" height="500px"></line-chart>
        <line-chart :min="1000" :max="5000"></line-chart>
        <line-chart xmin="2018-01-01" xmax="2019-01-01"></line-chart>
        <line-chart :colors="['#b00', '#666']"></line-chart>


        <line-chart :download="true"></line-chart>
        <line-chart download="boom"></line-chart>

    </div>

</template>

<script>
export default {
    data () {
        return {
            data :[
            {name: 'Workout', data: {'2017-01-01 00:00:00 -0800': 3, '2017-01-02 00:00:00 -0800': 4}},
            {name: 'Call parents', data: {'2017-01-01 00:00:00 -0800': 5, '2017-01-02 00:00:00 -0800': 3}}
            ],
        }
    }
}

</script>
