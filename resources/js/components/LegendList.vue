<template>
    <div class="my-2 legend">
        <div v-for="legend in legends" class="legend-block">
            <div class="legend-title">{{ legend.title }}</div>
            <div v-for="item in legend.items">
                <img :src="item.icon" :alt="item.name" width="22px"/> - {{ item.name }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LegendList",
    data() {
        return {
            legends: {
                cultures: {
                    title: 'Культури',
                    items: {
                        0: {
                            name: 'Кукурудза',
                            icon: '/images/icons/cultures/CORN.png'
                        },
                        1: {
                            name: 'Соя',
                            icon: '/images/icons/cultures/SOY.png'
                        },
                        2: {
                            name: 'Ячмінь',
                            icon: '/images/icons/cultures/BARLEY.png'
                        }
                    }
                },
                places: {
                    title: 'Зберігання',
                    items: {
                        0: {
                            name: 'Елеватор',
                            icon: '/images/icons/places/ELEVATOR.png'
                        },
                        1: {
                            name: 'Комора',
                            icon: '/images/icons/places/COMORA.png'
                        },
                        2: {
                            name: 'Завод',
                            icon: '/images/icons/places/ZAVOD.png'
                        },
                    }
                },
                system: {
                    title: 'Позначки',
                    items: {
                        0: {
                            name: 'Продажа',
                            icon: '/images/icons/SELLING.png'
                        },
                        1: {
                            name: 'Покупка',
                            icon: '/images/icons/BUYING.png'
                        },
                        2: {
                            name: 'Тип зберігання',
                            icon: '/images/icons/PLACE.png'
                        }
                    }
                }
            }
        }
    }
}
</script>

<style scoped>
.legend-block {
    margin-bottom: 12px;
}
.legend-title {
    text-transform: lowercase;
    letter-spacing: 1px;
    color: grey;
}
</style>
