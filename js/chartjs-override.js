/**
 * @file Override charts libraries.
 */

(function (Drupal, once) {
  Drupal.localgov_elections_reporting = Drupal.localgov_elections_reporting || {};

  Drupal.localgov_elections_reporting.setChartColours = function (chart_data, settings) {
    let d = [];
    chart_data.data.labels.forEach((entry, i) => {
      for (const [key, value] of Object.entries(settings.localgov_elections_reporting.parties)) {
        if (entry.includes(value.full_name)) {
          d.push(value.colour);
          break;
        }
      }
      chart_data.data.datasets[0].backgroundColor = d;
    });
  };

  Drupal.behaviors.charts_override = {
    attach: function (context, settings) {
      const chartJS = once('allChartJS', '.charts-chartjs', context);
      if (chartJS) {
        chartJS.forEach(chart => {
          chart.addEventListener('drupalChartsConfigsInitialization', function (e) {
            let data = e.detail;
            const id = data.drupalChartDivId;

            Drupal.localgov_elections_reporting.setChartColours(data, settings)

            if (id === 'chart-election-results-via-parties-block-1') {
              data.options.scales.y.grid = { display: false};
              data.options.scales.y.ticks.autoSkip = false;
            }
          });
        });
      }
    }
  };
})(Drupal, once);
