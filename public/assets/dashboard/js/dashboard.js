(function($) {
  'use strict';
  $(function() {
    if ($("#performanceLine").length) { 
      const ctx = document.getElementById('performanceLine');
      var graphGradient = document.getElementById("performanceLine").getContext('2d');
      var graphGradient2 = document.getElementById("performanceLine").getContext('2d');
      var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
      saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.18)');
      saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.02)');
      var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
      saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
      saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["SUN","sun", "MON", "mon", "TUE","tue", "WED", "wed", "THU", "thu", "FRI", "fri", "SAT"],
          datasets: [{
            label: 'This week',
            data: [50, 110, 60, 290, 200, 115, 130, 170, 90, 210, 240, 280, 200],
            backgroundColor: saleGradientBg,
            borderColor: [
                '#1F3BB3',
            ],
            borderWidth: 1.5,
            fill: true, // 3: no fill
            pointBorderWidth: 1,
            pointRadius: [4, 4, 4, 4, 4,4, 4, 4, 4, 4,4, 4, 4],
            pointHoverRadius: [2, 2, 2, 2, 2,2, 2, 2, 2, 2,2, 2, 2],
            pointBackgroundColor: ['#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)'],
            pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
        },{
          label: 'Last week',
          data: [30, 150, 190, 250, 120, 150, 130, 20, 30, 15, 40, 95, 180],
          backgroundColor: saleGradientBg2,
          borderColor: [
              '#FBBE00',
          ],
          borderWidth: 1.5,
          fill: true, // 3: no fill
          pointBorderWidth: 1,
          pointRadius: [0, 0, 0, 4, 0],
          pointHoverRadius: [0, 0, 0, 2, 0],
          pointBackgroundColor: ['#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)'],
            pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
      }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            line: {
                tension: 0.4,
            }
          },
        
          scales: {
            y: {
              border: {
                display: false
              },
              grid: {
                display: true,
                color:"#F0F0F0",
                drawBorder: false,
              },
              ticks: {
                beginAtZero: false,
                autoSkip: true,
                maxTicksLimit: 4,
                color:"#6B778C",
                font: {
                  size: 10,
                }
              }
            },
            x: {
              border: {
                display: false
              },
              grid: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                beginAtZero: false,
                autoSkip: true,
                maxTicksLimit: 7,
                color:"#6B778C",
                font: {
                  size: 10,
                }
              }
            }
          },
          plugins: {
            legend: {
                display: false,
            }
          }
        },
        plugins: [{
          afterDatasetUpdate: function (chart, args, options) {
              const chartId = chart.canvas.id;
              var i;
              const legendId = `${chartId}-legend`;
              const ul = document.createElement('ul');
              for(i=0;i<chart.data.datasets.length; i++) {
                  ul.innerHTML += `
                  <li>
                    <span style="background-color: ${chart.data.datasets[i].borderColor}"></span>
                    ${chart.data.datasets[i].label}
                  </li>
                `;
              }
              return document.getElementById(legendId).appendChild(ul);
            }
        }]
      });
    }

    if ($("#status-summary").length) { 
      const statusSummaryChartCanvas = document.getElementById('status-summary');
      new Chart(statusSummaryChartCanvas, {
        type: 'line',
        data: {
          labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI"],
          datasets: [{
              label: '# of Votes',
              data: [50, 68, 70, 10, 12, 80],
              backgroundColor: "#ffcc00",
              borderColor: [
                  '#01B6A0',
              ],
              borderWidth: 2,
              fill: false, // 3: no fill
              pointBorderWidth: 0,
              pointRadius: [0, 0, 0, 0, 0, 0],
              pointHoverRadius: [0, 0, 0, 0, 0, 0],
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            line: {
                tension: 0.4,
            }
        },
          scales: {
            y: {
              border: {
                display: false
              },
              display: false,
              grid: {
                display: false,
              },
            },
            x: {
              border: {
                display: false
              },
              display: false,
              grid: {
                display: false,
              }
            }
          },
          plugins: {
            legend: {
                display: false,
            }
          }
        }
      });
    }
if (document.getElementById('marketingOverview')) {
  const ctx = document.getElementById('marketingOverview').getContext('2d');

  // ✅ Shorten long names automatically
  const shortenLabel = (label) => {
    if (label.length > 8) {
      const parts = label.split(" ");
      return parts[0] + (parts[1] ? " " + parts[1][0] + "." : "");
    }
    return label;
  };

  const labels = [
    "Nawidullah", "Khalid", "Pacha", "Yalda", 
    "Sadat", "Milad", "Waris Stanikzai", "Aziz", "Fardin Formully"
  ].map(shortenLabel);

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: "Marketing Overview",
        data: [12, 5, 8, 3, 12, 3, 2, 4, 5],
        backgroundColor: '#FBBE00',
        borderColor: '#FBBE00',
        borderWidth: 0.5,
        barPercentage: 0.4, // ✅ thinner bars
        borderRadius: 2
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: { top: 20 }
      },
      animation: {
        duration: 1000,
        easing: 'easeOutCubic'
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: { display: false },
          ticks: { display: false },
          border: { display: false }
        },
        x: {
          grid: { display: false },
          ticks: {
            color: "#6B778C",
            font: {
              size: 7,   // ✅ much smaller font
              weight: 'bold'
            },
            maxRotation: 0, // ✅ keep horizontal
            minRotation: 0
          },
          border: { display: false }
        }
      },
      plugins: {
        legend: { display: false },
        datalabels: {
          anchor: 'end',
          align: 'end',
          offset: 4,
          color: '#333',
          font: {
            weight: 'bold',
            size: 9 // ✅ smaller value labels
          },
          formatter: function(value) {
            return value;
          }
        },
        tooltip: {
          enabled: true,
          backgroundColor: "#333",
          titleColor: "#fff",
          bodyColor: "#fff",
          cornerRadius: 6
        }
      }
    },
    plugins: [ChartDataLabels]
  });
}



    if ($('#totalVisitors').length) {
      var bar = new ProgressBar.Circle(totalVisitors, {
        color: '#fff',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 15,
        trailWidth: 15, 
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: {
          color: '#52CDFF',
          width: 15
        },
        to: {
          color: '#677ae4',
          width: 15
        },
        // Set default step function for all animate calls
        step: function(state, circle) {
          circle.path.setAttribute('stroke', state.color);
          circle.path.setAttribute('stroke-width', state.width);
  
          var value = Math.round(circle.value() * 100);
          if (value === 0) {
            circle.setText('');
          } else {
            circle.setText(value);
          }
  
        }
      });
  
      bar.text.style.fontSize = '0rem';
      bar.animate(.64); // Number from 0.0 to 1.0
    }

    if ($('#visitperday').length) {
      var bar = new ProgressBar.Circle(visitperday, {
        color: '#fff',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 15,
        trailWidth: 15,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: {
          color: '#34B1AA',
          width: 15
        },
        to: {
          color: '#677ae4',
          width: 15
        },
        // Set default step function for all animate calls
        step: function(state, circle) {
          circle.path.setAttribute('stroke', state.color);
          circle.path.setAttribute('stroke-width', state.width);
  
          var value = Math.round(circle.value() * 100);
          if (value === 0) {
            circle.setText('');
          } else {
            circle.setText(value);
          }
  
        }
      });
  
      bar.text.style.fontSize = '0rem';
      bar.animate(.34); // Number from 0.0 to 1.0
    }
if ($("#doughnutChart").length) { 
  const doughnutChartCanvas = document.getElementById('doughnutChart');
  new Chart(doughnutChartCanvas, {
    type: 'doughnut',
    data: {
      labels: ['Base Salary', 'Bonus', 'Allowances', 'Deductions'],
      datasets: [{
        data: [3000, 500, 800, 300], // Example monthly breakdown
        backgroundColor: [
          "#2E7D32", // Dark Green
          "#66BB6A", // Soft Green
          "#FBC02D", // Amber Yellow
          "#FDD835"  // Light Yellow
        ],
        borderColor: [
          "#2E7D32",
          "#66BB6A",
          "#FBC02D",
          "#FDD835"
        ],
        borderWidth: 2
      }]
    },
    options: {
      cutout: 85,
      animation: {
        animateRotate: true,
        animateScale: true,
        duration: 1200,
        easing: "easeOutQuart"
      },
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              let value = context.raw;
              return `${context.label}: $${value.toLocaleString()}`;
            }
          },
          backgroundColor: "#2E7D32",
          titleColor: "#fff",
          bodyColor: "#fff",
          cornerRadius: 6
        }
      }
    },
    plugins: [{
      afterDatasetUpdate: function (chart) {
        const chartId = chart.canvas.id;
        const legendId = `${chartId}-legend`;
        const legendContainer = document.getElementById(legendId);
        legendContainer.innerHTML = "";
        const ul = document.createElement('ul');
        ul.style.listStyle = "none";
        ul.style.padding = "0";
        ul.style.display = "flex";
        ul.style.flexWrap = "wrap";
        ul.style.gap = "20px";
        
        chart.data.labels.forEach((label, i) => {
          ul.innerHTML += `
            <li style="display:flex;align-items:center;gap:8px;font-size:14px;color:#333;">
              <span style="display:inline-block;width:16px;height:16px;background-color:${chart.data.datasets[0].backgroundColor[i]};border-radius:3px;"></span>
              ${label}
            </li>
          `;
        });
        legendContainer.appendChild(ul);
      }
    }]
  });
}

    if ($("#leaveReport").length) { 
      const leaveReportCanvas = document.getElementById('leaveReport');
      new Chart(leaveReportCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan","Feb", "Mar", "Apr", "May"],
          datasets: [{
              label: 'Last week',
              data: [18, 25, 39, 11, 24],
              backgroundColor: "#FFB300",
              borderColor: [
                  '#52CDFF',
              ],
              borderWidth: 0,
              fill: true, // 3: no fill
              barPercentage: 0.5,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          elements: {
            line: {
                tension: 0.4,
            }
        },
          scales: {
            y: {
              border: {
                display: false
              },
              display: true,
              grid: {
                display: false,
                drawBorder: false,
                color:"rgba(255,255,255,.05)",
                zeroLineColor: "rgba(255,255,255,.05)",
              },
              ticks: {
                beginAtZero: true,
                autoSkip: true,
                maxTicksLimit: 5,
                fontSize: 10,
                color:"#6B778C",
                font: {
                  size: 10,
                }
              }
            },
            x: {
              border: {
                display: false
              },
              display: true,
              grid: {
                display: false,
              },
              ticks: {
                beginAtZero: false,
                autoSkip: true,
                maxTicksLimit: 7,
                fontSize: 10,
                color:"#6B778C",
                font: {
                  size: 10,
                }
              }
            }
          },
          plugins: {
            legend: {
                display: false,
            }
          }
        }
      });
    }


    if ($.cookie('staradmin2-pro-banner')!="true") {
      document.querySelector('#proBanner').classList.add('d-flex');
      document.querySelector('.navbar').classList.remove('fixed-top');
    }
    else {
      document.querySelector('#proBanner').classList.add('d-none');
      document.querySelector('.navbar').classList.add('fixed-top');
    }
    
    if ($( ".navbar" ).hasClass( "fixed-top" )) {
      document.querySelector('.page-body-wrapper').classList.remove('pt-0');
      document.querySelector('.navbar').classList.remove('pt-5');
    }
    else {
      document.querySelector('.page-body-wrapper').classList.add('pt-0');
      document.querySelector('.navbar').classList.add('pt-5');
      document.querySelector('.navbar').classList.add('mt-3');
      
    }
    document.querySelector('#bannerClose').addEventListener('click',function() {
      document.querySelector('#proBanner').classList.add('d-none');
      document.querySelector('#proBanner').classList.remove('d-flex');
      document.querySelector('.navbar').classList.remove('pt-5');
      document.querySelector('.navbar').classList.add('fixed-top');
      document.querySelector('.page-body-wrapper').classList.add('proBanner-padding-top');
      document.querySelector('.navbar').classList.remove('mt-3');
      var date = new Date();
      date.setTime(date.getTime() + 24 * 60 * 60 * 1000); 
      $.cookie('staradmin2-pro-banner', "true", { expires: date });
    });
    
  });
  // iconify.load('icons.svg').then(function() {
  //   iconify(document.querySelector('.my-cool.icon'));
  // });

  
})(jQuery);