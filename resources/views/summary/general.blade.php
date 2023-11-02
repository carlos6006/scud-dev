<div>
    <canvas id="myChart"></canvas>
  </div>


  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
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
  </script>

<div class="card card-success">
    <div class="card-header">
    <h3 class="card-title">Bar Chart</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" class="chartjs-render-monitor" width="764" height="250"></canvas>
    </div>
    </div>

    </div>



<div class="tab-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark mt-4">Security Summary</h3>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="semana-tab" data-toggle="tab" href="#semana" role="tab" aria-controls="semana" aria-selected="true">
                    <i class="fas fa-calendar-week mr-1"></i> Semana
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mes-tab" data-toggle="tab" href="#mes" role="tab" aria-controls="mes" aria-selected="false">
                    <i class="fas fa-calendar-alt mr-1"></i> Mes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="anio-tab" data-toggle="tab" href="#anio" role="tab" aria-controls="anio" aria-selected="false">
                    <i class="fas fa-calendar mr-1"></i> Año
                </a>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="semana" role="tabpanel" aria-labelledby="semana-tab">

            <div class="row p-0 mb-5 px-9">
                <div class="col">
                    <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                        <!-- Agregar la clase "text-green" al ícono para cambiar su color a verde -->
                        <i class="fas fa-car fa-4x text-green"></i>

                        <!-- Agregar la clase "text-green" al texto para cambiar su color a verde -->
                        <span class="fs-4 fw-semibold text-success text-green d-block">Viajes realizados</span>

                        <h2 class="mb-0 text-bold">80</h2>

                    </div>
                </div>

                <div class="col">
                    <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                        <!-- Agregar la clase "text-green" al ícono para cambiar su color a verde -->
                        <i class="fas fa-car fa-4x text-green"></i>

                        <!-- Agregar la clase "text-green" al texto para cambiar su color a verde -->
                        <span class="fs-4 fw-semibold text-success text-green d-block">Horas de conducción</span>

                        <span class="fs-2hx fw-bold text-gray-900 counted" data-kt-countup="true" data-kt-countup-value="36899" data-kt-initialized="1">36,899</span>
                    </div>
                </div>

            <div class="col">
                <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                    <span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
                    <span class="fs-2hx fw-bold text-gray-900 counted" data-kt-countup="true" data-kt-countup-value="36899" data-kt-initialized="1">36,899</span>
                </div>
            </div>

            <div class="col">
                <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                    <span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
                    <span class="fs-2hx fw-bold text-gray-900 counted" data-kt-countup="true" data-kt-countup-value="36899" data-kt-initialized="1">36,899</span>
                </div>
            </div>


        </div>

        </div>
        <div class="tab-pane fade" id="mes" role="tabpanel" aria-labelledby="mes-tab">Contenido de la pestaña de Mes</div>
        <div class="tab-pane fade" id="anio" role="tabpanel" aria-labelledby="anio-tab">Contenido de la pestaña de Año</div>
    </div>
</div>


<div class="card card-xxl-stretch mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header card-header-stretch">
        <!--begin::Title-->
        <div class="card-title">
            <h3 class="m-0 text-dark">Security Summary</h3>
        </div>
        <!--end::Title-->

        <!--begin::Toolbar-->

        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-line-tabs nav-stretch border-transparent fs-5 fw-bold ml-auto" id="kt_security_summary_tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-kt-countup-tabs="true" data-toggle="tab" href="#kt_security_summary_tab_pane_hours" data-kt-initialized="1" aria-selected="true" role="tab">12 Hours</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-kt-countup-tabs="true" data-toggle="tab" id="kt_security_summary_tab_day" href="#kt_security_summary_tab_pane_day" data-kt-initialized="1" aria-selected="false" role="tab" tabindex="-1">Day</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-kt-countup-tabs="true" data-toggle="tab" id="kt_security_summary_tab_week" href="#kt_security_summary_tab_pane_week" data-kt-initialized="1" aria-selected="false" tabindex="-1" role="tab">Week</a>
                </li>
            </ul>
        </div>

    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-7 pb-0 px-0">
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab panel-->
            <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours" role="tabpanel">
                <!--begin::Row-->
                <div class="row p-0 mb-5 px-9">
                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
                            <span class="fs-2hx fw-bold text-dark counted" data-kt-countup="true" data-kt-countup-value="36899" data-kt-initialized="1">36,899</span>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-primary d-block">Admin Sign-in</span>
                            <span class="fs-2hx fw-bold text-dark counted" data-kt-countup="true" data-kt-countup-value="72" data-kt-initialized="1">72</span>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>
                            <span class="fs-2hx fw-bold text-dark counted" data-kt-countup="true" data-kt-countup-value="291" data-kt-initialized="1">291</span>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Container-->
                <div class="pt-2">
                    <!--begin::Tabs-->
                    <div class="d-flex align-items-center pb-6 px-9">
                        <!--begin::Title-->
                        <h3 class="m-0 text-dark flex-grow-1">
                            Activity Chart
                        </h3>
                        <!--end::Title-->

                        <!--begin::Nav pills-->
                        <ul class="nav nav-pills nav-line-pills border rounded p-1" role="tablist">
                            <li class="nav-item me-2" role="presentation">
                                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_hours_agents" href="#kt_security_summary_tab_pane_hours_agents" aria-selected="true" role="tab">
                                    Agents
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_hours_clients" href="#kt_security_summary_tab_pane_hours_clients" aria-selected="false" tabindex="-1" role="tab">
                                    Clients
                                </a>
                            </li>
                        </ul>
                        <!--end::Nav pills-->
                    </div>
                    <!--end::Tabs-->

                    <!--begin::Tab content-->
                    <div class="tab-content px-3">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours_agents" role="tabpanel" aria-labelledby="kt_security_summary_tab_hours_agents">

                        </div>
                        <!--end::Tab pane-->

                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_security_summary_tab_pane_hours_clients" role="tabpanel" aria-labelledby="kt_security_summary_tab_hours_clients">
                            <!--begin::Chart-->
                            <div id="kt_security_summary_chart_hours_clients" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Tab panel-->

            <!--begin::Tab panel-->
            <div class="tab-pane fade" id="kt_security_summary_tab_pane_day" role="tabpanel" aria-labelledby="kt_security_summary_tab_day">
                <!--begin::Row-->
                <div class="row p-0 mb-5 px-9">
                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
                            <span class="fs-2hx fw-bold text-dark" data-kt-countup="true" data-kt-countup-value="30467" data-kt-initialized="1">30,467</span>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-primary d-block">Admin Sign-in</span>
                            <span class="fs-2hx fw-bold text-dark" data-kt-countup="true" data-kt-countup-value="120" data-kt-initialized="1">120</span>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>
                            <span class="fs-2hx fw-bold text-dark" data-kt-countup="true" data-kt-countup-value="23" data-kt-initialized="1">23</span>
                        </div>
                    </div>
                </div>
                <!--end::Row-->

                <!--begin::Container-->
                <div class="pt-2">
                    <!--begin::Tabs-->
                    <div class="d-flex align-items-center pb-9 px-9">
                        <h3 class="m-0 text-dark flex-grow-1">Activity Chart</h3>

                        <!--begin::Nav pills-->
                        <ul class="nav nav-pills nav-line-pills border rounded p-1" role="tablist">
                            <li class="nav-item me-2" role="presentation">
                                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_day_agents" href="#kt_security_summary_tab_pane_day_agents" aria-selected="true" role="tab">
                                    Agents
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_day_clients" href="#kt_security_summary_tab_pane_day_clients" aria-selected="false" tabindex="-1" role="tab">
                                    Clients
                                </a>
                            </li>
                        </ul>
                        <!--end::Nav pills-->
                    </div>
                    <!--end::Tabs-->

                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_day_agents" role="tabpanel" aria-labelledby="kt_security_summary_tab_day_agents">
                            <!--begin::Chart-->
                            <div id="kt_security_summary_chart_day_agents" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <div class="tab-pane fade" id="kt_security_summary_tab_pane_day_clients" role="tabpanel" aria-labelledby="kt_security_summary_tab_day_clients">
                            <!--begin::Chart-->
                            <div id="kt_security_summary_chart_day_clients" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Tab panel-->

            <!--begin::Tab panel-->
            <div class="tab-pane fade" id="kt_security_summary_tab_pane_week" role="tabpanel" aria-labelledby="kt_security_summary_tab_week">
                <!--begin::Row-->
                <div class="row p-0 mb-5 px-9">
                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-5 fw-semibold text-success d-block">
                                <i class="fas fa-user" style="font-size: 3rem;"></i> User Sign-in
                            </span>
                            <span class="fs-2hx fs-4 fw-bold text-dark" data-kt-countup="true" data-kt-countup-value="340">0</span>
                        </div>
                    </div>





                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-primary d-block">Admin Sign-in</span>

                            <span class="fs-2hx fs-2 fw-bold text-dark" data-kt-countup="true" data-kt-countup-value="90">0</span>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>

                            <span class="fs-2hx fs-2 fw-bold text-dark" data-kt-countup="true" data-kt-countup-value="230">0</span>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Container-->
                <div class="pt-2">
                    <!--begin::Tabs-->
                    <div class="d-flex align-items-center pb-9 px-9">
                        <h3 class="m-0 text-dark flex-grow-1">Activity Chart</h3>

                        <!--begin::Nav pills-->
                        <ul class="nav nav-pills nav-line-pills border rounded p-1" role="tablist">
                            <li class="nav-item me-2" role="presentation">
                                <a class="nav-link btn btn-active-light py-2 px-5 fs-6 btn-active-color-gray-700 btn-color-gray-400 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_week_agents" href="#kt_security_summary_tab_pane_week_agents" aria-selected="true" role="tab">
                                    Agents
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-active-light py-2 px-5 btn-active-color-gray-700 btn-color-gray-400 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_week_clients" href="#kt_security_summary_tab_pane_week_clients" aria-selected="false" tabindex="-1" role="tab">
                                    Clients
                                </a>
                            </li>
                        </ul>
                        <!--end::Nav pills-->
                    </div>
                    <!--end::Tabs-->

                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_week_agents" role="tabpanel" aria-labelledby="kt_security_summary_tab_week_agents">
                            <!--begin::Chart-->
                            <div id="kt_security_summary_chart_week_agents" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <div class="tab-pane fade" id="kt_security_summary_tab_pane_week_clients" role="tabpanel" aria-labelledby="kt_security_summary_tab_week_clients">
                            <!--begin::Chart-->
                            <div id="kt_security_summary_chart_week_clients" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Tab panel-->
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Body-->
</div>
