<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <style>
        .loading-image {
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 10;
        }

        .loader {
            display: none;
            width: 200px;
            height: 200px;
            position: fixed;
            top: 50%;
            left: 50%;
            text-align: center;
            margin-left: -50px;
            margin-top: -100px;
            z-index: 2;
            overflow: auto;
        }

        #loading {
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            position: fixed;

            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
            text-align: center;
        }

        #loading-content {
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            z-index: 100;
        }

        .hide {
            display: none;
        }

        .show {
            display: block;
        }


        #profileImage {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #512DA8;
            font-size: 20px;
            color: #fff;
            text-align: center;
            line-height: 41px;
        }


        .md-form.mt-0 {
            display: inline-flex;
            width: 200;
            border-color: #512DA8
        }

        .md-form.mt-0 input {
            padding-left: 25px;
        }

        .material-icons.mdc-button__icon {
            top: 7px;
            color: #fff2f2;
            left: 13%;
            position: relative;

        }

        .h5 {
            font-weight: bold;
        }

        .card-subtitle {
            font-size: 19px;
        }


        ::-webkit-input-placeholder {
            /* WebKit, Blink, Edge */
            color: white;
        }

        :-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            color: white;
            opacity: 1;
        }

        ::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            color: white;
            opacity: 1;
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: white;
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: white;
        }

        ::placeholder {
            /* Most modern browsers support this now. */
            color: white;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
</head>

<body>
    <div id="loading" class="hide">
        <div id="loading-content">
            <img src="{{ asset('assets/loader.gif') }}" alt="loading..">
        </div>
    </div>

    <div id="app">
        <main class="py-4 bg-white" style="font-family: system-ui;">
            @yield('content')
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            handleClick();
        });;


        $('input.example').on('change', function() {
            $('input.example').not(this).prop('checked', false);
        });
        /**
         * Function to Get Formated Date Consist of months and days only
         *
         */
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1);
            day = '' + d.getDate();
            return ([month, day].join('/'));
        }
        /**
         * Function to handle Datarendering Event
         *Like For Check box as well
         */
        function handleClick(cb = null) {
            $("#loading").removeClass('hide');
            $("#loading").addClass('show');


            sortBy = cb != null ? cb.name : 'revenue_sum';
            order = 'asc';
            search = null;
            if (cb !== null) {
                search = cb.name == 'search' ? cb.value : null
                order = cb.checked ? 'desc' : 'asc';
            }
            var your_html;
            getUserData(sortBy, order, your_html, search);


        }
        /**Function To Get Dash Board Data
         *Like For Check box as well
         */
        function getUserData(sortBy, order, your_html, search) {
            $url = search != null ? "/getUserData?search=" + search : "/getUserData?sortBy=" + sortBy + "&order=" + order;
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: $url,
                complete: function() {
                    setTimeout(() => {
                        $("#loading").addClass('hide');
                        $("#loading").removeClass('show');
                    }, 5000);

                },
                success: function(data) {
                    var obj = JSON.parse(data.data);
                    var html = '';
                    $.each(obj, function(key, value) {
                        var htmltag = `<div class="col-sm-12 col-md-8 col-lg-4">
                            <div class="card shadow rounded" style="margin: 20px 0px;">
                            <div class="card-body">
                            <div class="row">
                            <div class="d-flex justify-content-between">
                                <div class="col-1 col-lg-2" style="margin-top: 1px;">`;
                        if (value.avatar) {
                            htmltag += `<img src="https://picsum.photos/200/300" class="card-img-top" alt="..."
                                        style="height: 40px;width: 40px;border-radius: 50%">`;
                        } else {
                            htmltag += `<div id="profileImage">${value.name.charAt(0)}</div>`;
                        }

                        htmltag += `</div>
                                <div class="col-11 col-lg-10 mx-auto" style="margin-top: 1px;">
                                    <h5 class="card-title" styel="font-size: 1.6rem;">${value.name}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">${value.occupation}</h6>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="col-xl-8 col-lg-12 mx-auto">
                                    <div id="ABC-${value.id}">
                                        <canvas ></canvas>
                                    </div>
                                    <h5 class="h5 mt-3"> Conversions  ${formatDate(value.conversion_min_date)} - ${formatDate(value.conversion_max_date)} </h5>

                                </div>
                                <div class="col-xl-4 col-lg-12  text-xl-right text-lg-center mt-lg-3 pr-0">
                                    <h5 class="h5"> ${value.impression_count}

                            </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">impressions</h6>
                                    <h5 class="h5">${value.conversion_count}  </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">conversions</h6>
                                    <h5 class="h5">$${(value.revenue_sum).toFixed(2)}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">revenue</h6>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>`;


                        html += htmltag;

                    });
                    var element = document.getElementById("cards-rows");

                    element.innerHTML = html;

                    getChartsData();
                },
                error: function() {
                    console.log(data);
                }
            });
        }


        /**
         * Function to get the charts data For Chart Js Library
         *
         */
        function getChartsData() {
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "/getChartData",

                success: function(data) {

                    var obj = JSON.parse(data.data);
                    // var your_html = "";

                    $.each(obj, function(key, value) {

                        const labels = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                        ];
                        graphData = [];
                        $.each(value, function(key, value) {
                            graphData.push(parseInt(value.revenue));
                        });
                        const data = {
                            labels: graphData,
                            datasets: [{
                                label: 'Revenue',

                                backgroundColor: [
                                    'rgb(219, 217, 242)',
                                ],
                                borderColor: [
                                    'rgb(219, 217, 242)',
                                ],
                                borderWidth: 1,
                                data: graphData,
                            }]
                        };

                        const config = {
                            type: 'line',
                            data: data,
                            options: {
                                scales: {
                                    x: {
                                        display: false
                                    },
                                    y: {
                                        display: false
                                    }
                                },
                                elements: {
                                    line: {
                                        tension: 0 // disables bezier curves
                                    }
                                },
                                tooltips: {
                                    callbacks: {
                                        label: (tooltipItem, chart) =>
                                            dataSets
                                            .datasets
                                            .map(ds => ds.label + ': ' + ds
                                                .data[tooltipItem
                                                    .index])
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        callbacks: {
                                            title: (tooltipItem, chart) =>
                                                data
                                                .datasets
                                                .map(ds => 'Revenue'),
                                            label: function(context) {
                                                let label = context
                                                    .dataset
                                                    .label || '';
                                                if (context.parsed.y !==
                                                    null) {
                                                    label = new Intl
                                                        .NumberFormat(
                                                            'en-US', {
                                                                style: 'currency',
                                                                currency: 'USD'
                                                            }).format(
                                                            context
                                                            .parsed.y
                                                        );
                                                }
                                                return label;
                                            }
                                        },
                                        backgroundColor: 'rgb(219, 217, 242)'
                                    }
                                }
                            }
                        };
                        if (document.getElementById('ABC-' + key) != null) {
                            new Chart(
                                document.getElementById('ABC-' + key)
                                .childNodes[1],
                                config
                            );
                        }

                    });

                },
                error: function() {
                    console.log(data);
                }
            });
        }
    </script>
</body>

</html>
