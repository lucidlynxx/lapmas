// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

let P = document.getElementById("pengaduan").getAttribute("value");
let A = document.getElementById("aspirasi").getAttribute("value");
let PI = document.getElementById("permintaanInformasi").getAttribute("value");

// Pie Chart Example
let ctx = document.getElementById("myPieChart");
let myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Pengaduan", "Aspirasi", "Permintaan Informasi"],
    datasets: [{
      data: [P, A, PI],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
