const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));

// Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

// Create the chart
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: '<a target="_blank" href="https://mapaosc.ipea.gov.br/mapa">OSCS por região, 2020</a>'
  },
  subtitle: {
    align: 'left',
    text: 'Clique nas colunas para visualizar as informações por Estados'
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total de OSCS no Brasil'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.3f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.3f}</b> OSCS'
  },

  series: [
    {
      name: "Regiões",
      colorByPoint: true,
      data: [
        {
          name: "Norte",
          y: 55.871,
          drilldown: "Norte"
        },
        {
          name: "Nordeste",
          y: 194.033,
          drilldown: "Nordeste"
        },
        {
          name: "Centro-Oeste",
          y: 63.154,
          drilldown: "Centro-Oeste"
        },
        {
          name: "Sul",
          y: 145.315,
          drilldown: "Sul"
        },
        {
          name: "Sudeste",
          y: 323.522,
          drilldown: "Sudeste"
        }
      ]
    }
  ],
  drilldown: {
    breadcrumbs: {
      position: {
        align: 'right'
      }
    },
    series: [
      {
        name: "Sudeste",
        id: "Sudeste",
        data: [
          [
            "São Paulo",
            156.001
          ],
          [
            "Rio de Janeiro",
            64.445
          ],
          [
            "Minas Gerais",
            85.802
          ],  
          [
            "Espírito Santo",
            17.274
          ]
        ]
      },
      {
        name: "Sul",
        id: "Sul",
        data: [
          [
            "Rio Grande do Sul",
            55.042
          ],
          [
            "Santa Catarina",
            41.380
          ],
          [
            "Paraná",
            48.893
          ]
        ]
      },
      {
        name: "Centro-Oeste",
        id: "Centro-Oeste",
        data: [
          [
            "Goiás",
            23.784
          ],
          [
            "Mato Grosso",
            13.305
          ],
          [
            "Mato Grosso do Sul",
            11.383
          ]
        ]
      },
      {
        name: "Norte",
        id: "Norte",
        data: [
          [
            "Acre",
            3.196
          ],
          [
            "Amapá",
            2.949
          ],
          [
            "Amazonas",
            10.326
          ],
          [
            "Pará",
            21.985
          ],
          [
            "Rondônia",
            7.895
          ],
          [
            "Roraima",
            1.908
          ],
          [
            "Tocantins",
            7.612
          ]
        ]
      },
      {
        name: "Nordeste",
        id: "Nordeste",
        data: [
          [
            "Maranhão",
            24.309
          ],
          [
            "Piauí",
            13.334
          ],
          [
            "Ceará",
            32.469
          ],
          [
            "Rio Grande do Norte",
            11.033
          ],
          [
            "Paraíba",
            14.831
          ],
          [
            "Pernambuco",
            26.844
          ],
          [
            "Alagoas",
            8.152
          ],
          [
            "Sergipe",
            7.866
          ],
          [
            "Bahia",
            55.195
          ]
        ]
      }
    ]
  }
});