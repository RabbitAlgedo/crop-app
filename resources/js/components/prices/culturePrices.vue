<script>
import { Line } from 'vue-chartjs'

export default {
    name: "culturePrices",
    extends: Line,
    data () {
        return {
            chartData: {
                labels: ['Січень', 'Лютий', 'Березень', 'Квітень'],
                datasets: [
                    {
                        label: 'Продаж',
                        borderColor: '#FC2525',
                        pointBackgroundColor: 'red',
                        borderWidth: 1,
                        pointBorderColor: 'red',
                        backgroundColor: 'transparent',
                        data: [1140, 1539, 1310, 1440]
                    }, {
                        label: 'Покупка',
                        borderColor: '#55ad45',
                        pointBackgroundColor: 'green',
                        pointBorderColor: 'green',
                        borderWidth: 1,
                        backgroundColor: 'transparent',
                        data: [1090, 1255, 1232, 1310]
                    }
                ]
            }
        }
    },
    mounted () {
        this.renderChart(this.chartData, this.options)
    }
}
</script>

<style scoped>

</style>
