<template>
    <div @click.prevent="showList" class="ppInfo_line" :class="{'active':open}">
        <slot name="acheader"></slot>
        <span class="arrow" :class="{'arrowActive':open}"></span>
    </div>

    <div v-show="open" class="content">
        <slot name="accontent"></slot>
    </div>
</template>

<script>
export default {
    data() {
        return {
            open:false
        }
    },

    methods:{
        showList() {
            this.open = !this.open
        }
    }

}
</script>

<style scoped>
    .arrowActive {
        transform: rotate(180deg);

    }

    .ppInfo_line {
        cursor: pointer;
    }
</style>
