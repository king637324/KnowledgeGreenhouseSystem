<template>
    <div class = 'container-fluid' id = 'Home'>   <!-- container 會預設的寬跟高 -->
        <div class="row">
            <div class = "col-md-12">

            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {

        }
    },
    created:function(){  // 網頁載入時，一開始就載入
        if (this.$auth.check() === false) {
            this.$router.push({ name: '使用者登入' })
        }
    },
    methods: {
    },
}
</script>

