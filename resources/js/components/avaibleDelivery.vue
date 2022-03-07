<template>
    <div class="delivery-blocks">
        <div v-for="type in types" class="delivery-type">
            {{ type.name }}:
            <ul>
                <li v-for="producer in type.producers"> - {{ producer.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "avaibleDelivery",
    props: ['types']
}
</script>

<style scoped>

.delivery-blocks {
    display: flex;
    gap: 4px;
}

.delivery-type {
    background: #ddd;

    padding: 4px;
    border-radius: 8px;

    text-transform: lowercase;
    font-size: 9px;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
</style>
