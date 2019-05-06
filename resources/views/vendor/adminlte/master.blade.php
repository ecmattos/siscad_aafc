<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
    @yield('title', config('adminlte.title', 'AdminLTE 2'))
    @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('assets/Bootstrap-3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Bootstrap-DatePicker/css/bootstrap-datepicker3.standalone.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/InputMask/css/inputmask.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/Bootstrap-Dialog/css/bootstrap-dialog.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        <link href="{{ asset('assets/DataTables-1.10.16/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/DataTables-1.10.16/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/DataTables-1.10.16/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/Buttons-1.4.2/css/buttons.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/Responsive-2.2.0/css/responsive.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/Select-1.2.3/css/select.dataTables.min.css') }}" rel="stylesheet">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('assets/jQuery-3.2.1/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('assets/Bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/ChartJS-1.0.2/js/Chart.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="{{ asset('assets/DataTables-1.10.16/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables-1.10.16/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/Responsive-2.2.0/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/Select-1.2.3/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('assets/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/Buttons-1.4.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/JSZip-2.5.0/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/pdfmake-0.1.32/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/pdfmake-0.1.32/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/Moment/js/moment.js') }}"></script>
    <script src="{{ asset('assets/Moment/js/datetime-moment.js') }}"></script>
    <script src="{{ asset('assets/Bootstrap-DatePicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/Bootstrap-DatePicker/locales/bootstrap-datepicker.pt-BR.min.js') }}" charset="UTF-8"></script>

    <script src="{{ asset('assets/InputMask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/InputMask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('assets/InputMask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('assets/InputMask/jquery.inputmask.numeric.extensions.js') }}"></script>

    <script src="{{ asset('assets/Bootstrap-Dialog/js/bootstrap-dialog.min.js') }}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            $('.select2_multiple').select2({
                multiple: true,
                tags: true,
                tokenSeparators: [',', ' ']
            })

            //Datemask dd/mm/yyyy
            $('.date_mask').inputmask('dd/mm/yyyy')

            $('.phone_mask').inputmask('(99)9999-9999')

            $(".datepicker").datepicker({
                language: 'pt-BR',
                todayHighlight: true,
                weekStart: 1,
                format: 'dd/mm/yyyy',
                startDate: '-90Y',
                endDate: '0d',
                todayBtn: true,
                autoclose: true
            })

            $(".datepicker_no_restrict").datepicker({
                language: 'pt-BR',
                todayHighlight: true,
                weekStart: 1,
                format: 'dd/mm/yyyy',
                startDate: '-90Y',
                endDate: '+90Y',
                todayBtn: true,
                autoclose: true
            })
        })
    </script>

    <script>
        $(document).ready(function(){
            $('.numeric_0_mask').inputmask('999.999.999', 
            { 
                rightAlignNumerics: false,
                numericInput: true, 
                radixPoint: ",",
                clearMaskOnLostFocus: true 
            });

            $('.numeric_2_mask').inputmask('999.999.999,99', 
            { 
                rightAlignNumerics: false,
                numericInput: true, 
                radixPoint: ",",
                clearMaskOnLostFocus: true 
            });
        });
    </script>     

    <script>
        function onDestroy(url)
            {
                BootstrapDialog.confirm(
                    {
                        title: 'CONFIRMAR EXCLUSÂO',
                        message: 'Deseja realmente EXCLUIR este registro ?\n\n\n\nNão se preocupe pois caso existam restrições, esta operação será cancelada informando os motivos.',
                        type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                        closable: false, // <-- Default value is false
                        draggable: true, // <-- Default value is false
                        btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
                        btnOKLabel: 'SIM, quero EXCLUIR !', // <-- Default value is 'OK',
                        btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
                        callback: function(result) 
                        {
                            // result will be true if button was click, while it will be false if users close the dialog directly.
                            if(result) 
                            {
                                $(location).attr('href',url);
                            }
                        }
                    });
            }
    </script>

    <script type="text/javascript">
        $(document).ready(function() 
        {
            $.fn.dataTable.moment( 'DD/MM/YYYY' );

            $('.dataTable').DataTable( 
            {
                bStateSave: true,
                responsive: true,
                //deferRender: true,
                dom: 'Bfrtip',
                //processing: true,
                //language: {
                //    'loadingRecords': '&nbsp;',
                //    'processing': 'Carregando ...'
                //},           
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                    //{
                        //text: 'Reload table',
                        //action: function () {
                        //    table.ajax.reload();
                        //}
                    //}
                ],
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        }); 
    </script>

    <script>
  $(function () {
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
  })
</script>



@endif

@yield('adminlte_js')

</body>
</html>
