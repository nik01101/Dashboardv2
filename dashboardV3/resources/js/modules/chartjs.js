// Usage: https://www.chartjs.org/
import { Chart } from 'chart.js';
import ChartDataLabels from 'chartjs-plugin-datalabels';
Chart.register(ChartDataLabels);

window.Chart = Chart;
