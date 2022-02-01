<template>
    <div>
        <div class="culture-item my-2" @mouseleave="show = false" @mouseover="show = true">
            <div class="d-flex justify-content-between">
                <span>{{ culture[0].name }}</span>
                <span style="color: green">&#8593;</span>
            </div>
        </div>
        <div v-show="show" class="hover-chart shadow">
            <culture-prices />
        </div>
    </div>
</template>

<script>
import CulturePrices from "./culturePrices";
export default {
    name: "cultureList",
    components: {CulturePrices},
    props: ['culture'],
    data() {
        return {
            show: false
        }
    }
}
</script>

<style scoped>

</style>
