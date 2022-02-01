<template>
    <div class="filters my-2">
        <div class="">
            <div class="form-check">
                <input class="form-check-input" v-model="filters.status" type="checkbox" value="SELLING" id="SELLCheckBox">
                <label class="form-check-label" for="SELLCheckBox">
                    Продаж
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" v-model="filters.status" type="checkbox" value="BUYING" id="BUYCheckBox">
                <label class="form-check-label" for="BUYCheckBox">
                    Покупка
                </label>
            </div>
        </div>

        <div class="m-1 my-2">
            <select class="form-select select-filter"
                    v-model="filters.region"
                    @change="changeZoom($event)">
                <option value="center" disabled hidden>Область</option>
                <option value="ternopil">Тернопіль</option>
                <option value="lviv">Львів</option>
                <option value="3">Луцьк</option>
                <option value="4">Івано-Франківськ</option>
                <option value="5">Хмельницький</option>
                <option value="6">Рівне</option>
                <option value="7">Ужгород</option>
                <option value="8">Житомир</option>
            </select>
        </div>
        <div class="accordion m-1 my-2">
            <div class="accordion-item accordion-filter-item">
                <h2 class="accordion-header" id="filter-item-header-cultures">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter-cultures" aria-expanded="true" aria-controls="filter-cultures">
                        Зерно
                    </button>
                </h2>
                <div id="filter-cultures" class="accordion-collapse collapse" aria-labelledby="filter-item-header-cultures">
                    <div class="accordion-body">
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.culture" type="checkbox" value="SOY" id="SOYCheckBox">
                            <label class="form-check-label" for="SOYCheckBox">
                                Соя
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.culture" type="checkbox" value="CORN" id="CORNCheckBox">
                            <label class="form-check-label" for="CORNCheckBox">
                                Кукурудза
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.culture" type="checkbox" value="BARLEY" id="BARLEYCheckBox">
                            <label class="form-check-label" for="BARLEYCheckBox">
                                Ячмінь
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion m-1 my-2">
            <div class="accordion-item accordion-filter-item">
                <h2 class="accordion-header" id="filter-item-header-place">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter-places" aria-expanded="true" aria-controls="filter-places">
                        Тип сховища
                    </button>
                </h2>
                <div id="filter-places" class="accordion-collapse collapse" aria-labelledby="filter-item-header-places">
                    <div class="accordion-body">
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.type" type="checkbox" value="ZAVOD" id="ZAVODCheckBox">
                            <label class="form-check-label" for="ZAVODCheckBox">
                                Завод
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.type" type="checkbox" value="COMORA" id="COMORACheckBox">
                            <label class="form-check-label" for="COMORACheckBox">
                                Комора
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.type" type="checkbox" value="ELEVATOR" id="ELEVATORCheckBox">
                            <label class="form-check-label" for="ELEVATORCheckBox">
                                Елеватор
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion m-1 my-2">
            <div class="accordion-item accordion-filter-item">
                <h2 class="accordion-header" id="filter-item-header-delivery">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filter-deliveries" aria-expanded="true" aria-controls="filter-deliveries">
                        Тип доставки
                    </button>
                </h2>
                <div id="filter-deliveries" class="accordion-collapse collapse" aria-labelledby="filter-item-header-delivery">
                    <div class="accordion-body">
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.delivery" type="checkbox" value="FCA" id="FCACheckBox">
                            <label class="form-check-label" for="FCACheckBox">
                                FCA
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.delivery" type="checkbox" value="CPT" id="CPTCheckBox">
                            <label class="form-check-label" for="CPTCheckBox">
                                CPT
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="filters.delivery" type="checkbox" value="EXW" id="EXWCheckBox">
                            <label class="form-check-label" for="EXWCheckBox">
                                EXW
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Filters",
    props: ['filters'],
    mounted() {
        this.setFilters()
    },
    methods: {
        setFilters: function () {
            this.$emit('updateFilter', this.filters)
        },
        changeZoom: function () {
            this.$emit('changeZoom', 10)
        }
    }
}
</script>

<style scoped>
.select-filter {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}
.form-select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    background-repeat: no-repeat !important;
    background-size: 1.25rem !important;
    background-position-x: calc(100% - 15px);
}
</style>
