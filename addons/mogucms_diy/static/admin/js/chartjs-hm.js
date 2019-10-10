$(function () {

    var lineData = {
        labels: ["11-01", "11-02", "11-03", "11-04", "11-05", "11-06", "11-07"],
        datasets: [
            {
                label: "Example dataset",
                fillColor: "rgba(243,152,0,0)",
                strokeColor: "rgba(243,152,0,1)",
                pointColor: "rgba(243,152,0,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [0,18, 21, 21, 18, 26, 40]
            },
            {
                label: "Example dataset",
                fillColor: "rgba(35,202,137,0.2)",
                strokeColor: "rgba(35,202,137,0.7)",
                pointColor: "rgba(35,202,137,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(26,179,148,1)",
                data: [0,20, 17, 29, 25, 26, 47 ]
            }
        ]
    };
	

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: false,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 5,
        pointDotStrokeWidth: 2,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
		scaleOverride: true,
		scaleSteps: 3,
		scaleStepWidth: 20,
        responsive: true
		
		
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

    

    var doughnutData = [
        {
            value: 8000,
            color: "#0cd7a0",
            highlight: "#1ab394",
            label: "已完成"
        },
        {
            value: 30000,
            color: "#dedede",
            highlight: "#1ab394",
            label: "目标"
        }
    ];

    var doughnutOptions = {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        percentageInnerCutout: 80, // This is 0 for Pie charts
        animationSteps: 100,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true
    };


    var ctx = document.getElementById("doughnutChart").getContext("2d");
    var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);
	
	 var doughnutData2 = [
        {
            value: 8000,
            color: "#0cd7a0",
            highlight: "#1ab394",
            label: "已完成"
        },
        {
            value: 30000,
            color: "#dedede",
            highlight: "#1ab394",
            label: "目标"
        }
    ];

    var doughnutOptions2 = {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        percentageInnerCutout:80, // This is 0 for Pie charts
        animationSteps: 100,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
    };


    var ctx = document.getElementById("doughnutChart2").getContext("2d");
    var myNewChart = new Chart(ctx).Doughnut(doughnutData2, doughnutOptions2);
   

});