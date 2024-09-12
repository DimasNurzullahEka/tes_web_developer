
    <!-- base:js -->
    <script src="{{ asset('Template/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('Template/js/off-canvas.js') }}"></script>
    <script src="{{ asset('Template/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('Template/js/template.js') }}"></script>
    <script src="{{ asset('Template/js/settings.js') }}"></script>
    <script src="{{ asset('Template/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('Template/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page-->
    <script src="{{ asset('Template/js/chart.js') }}"></script>
    <!-- End custom js for this page-->
    <script>
        // Example Chart.js code

        // Line Chart
        var ctxLine = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgba(75,192,192,0.4)',
                    borderColor: 'rgba(75,192,192,1)',
                    borderWidth: 1,
                    data: [65, 59, 80, 81, 56, 55, 40]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Bar Chart
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: [12, 19, 3, 5, 2, 3, 7]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Additional chart initialization for Area Chart, Doughnut Chart, Pie Chart, Scatter Chart
    </script>
<script>
    // JavaScript untuk menampilkan tanggal saat ini
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var options = { month: 'short', day: 'numeric' };
        var dateString = today.toLocaleDateString('en-US', options);

        document.getElementById('current-date').textContent = 'Today : ' + dateString;
    });
</script>
