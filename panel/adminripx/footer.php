<footer id="page-footer" class="opacity-0" style="opacity: 1;">
<div class="content py-20 font-size-xs clearfix">
<div class="float-right">
Created with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="#" target="_blank"> RiPx</a>
</div>
<div class="float-left">
<a class="font-w600" href="#" target="_blank">RiP-Protocol</a> © <span class="js-year-copy">2016-18</span>
</div>
</div>
</footer>
    <!-- Codebase Core JS -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="../assets/js/core/jquery.appear.min.js"></script>
        <script src="../assets/js/core/jquery.countTo.min.js"></script>
        <script src="../assets/js/core/js.cookie.min.js"></script>
        <script src="../assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
		        <script src="../assets/js/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
        <script src="../assets/js/plugins/jquery-jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <!-- Page JS Code -->
        <script src="../assets/js/pages/be_pages_dashboard.js"></script>
 <!-- Flot -->
		<script src="../assets/js/codebase.min-2.2.js"></script>
<script src="../assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="../assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.min.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="../assets/js/pages/be_comp_charts.js"></script>
<script>jQuery(function(){ Codebase.helpers('easy-pie-chart'); });</script>
   
   
        <!-- Page JS Code -->
        <script src="../assets/js/pages/be_comp_maps_vector.js"></script>
		   <link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css">
        <script src="../assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="../assets/js/plugins/sweetalert2/es6-promise.auto.min.js"></script>
        <script src="../assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
		<script src="../assets/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
		<!-- Toastr js -->
        <script src="../assets/toastr/toastr.min.js"></script>	
	<!-- Flot chart js -->
        <script src="../assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="../assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="../assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="../assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="../assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="../assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="../assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
		
		
		<script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="../assets/js/pages/be_tables_datatables.js"></script>
		<script src="../assets/plugins/switchery/switchery.min.js"></script>
		
		 <script type="text/javascript">
            $(function () {
                var i = -1;
                var toastCount = 0;
                var $toastlast;

                var getMessage = function () {
                    var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
                        'Are you the six fingered man?',
                        'Inconceivable!',
                        'I do not think that means what you think it means.',
                        'Have fun storming the castle!'
                    ];
                    i++;
                    if (i === msgs.length) {
                        i = 0;
                    }

                    return msgs[i];
                };

                var getMessageWithClearButton = function (msg) {
                    msg = msg ? msg : 'Clear itself?';
                    msg += '<br /><br /><button type="button" class="btn btn-default clear">Yes</button>';
                    return msg;
                };

                $('#showtoast').click(function () {
                    var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
                    var msg = $('#message1').val();
                    var title = $('#title').val() || '';
                    var $showDuration = $('#showDuration');
                    var $hideDuration = $('#hideDuration');
                    var $timeOut = $('#timeOut');
                    var $extendedTimeOut = $('#extendedTimeOut');
                    var $showEasing = $('#showEasing');
                    var $hideEasing = $('#hideEasing');
                    var $showMethod = $('#showMethod');
                    var $hideMethod = $('#hideMethod');
                    var toastIndex = toastCount++;
                    var addClear = $('#addClear').prop('checked');

                    toastr.options = {
                        closeButton: $('#closeButton').prop('checked'),
                        debug: $('#debugInfo').prop('checked'),
                        newestOnTop: $('#newestOnTop').prop('checked'),
                        progressBar: $('#progressBar').prop('checked'),
                        positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
                        preventDuplicates: $('#preventDuplicates').prop('checked'),
                        onclick: null
                    };

                    if ($('#addBehaviorOnToastClick').prop('checked')) {
                        toastr.options.onclick = function () {
                            alert('You can perform some custom action after a toast goes away');
                        };
                    }

                    if ($showDuration.val().length) {
                        toastr.options.showDuration = $showDuration.val();
                    }

                    if ($hideDuration.val().length) {
                        toastr.options.hideDuration = $hideDuration.val();
                    }

                    if ($timeOut.val().length) {
                        toastr.options.timeOut = addClear ? 0 : $timeOut.val();
                    }

                    if ($extendedTimeOut.val().length) {
                        toastr.options.extendedTimeOut = addClear ? 0 : $extendedTimeOut.val();
                    }

                    if ($showEasing.val().length) {
                        toastr.options.showEasing = $showEasing.val();
                    }

                    if ($hideEasing.val().length) {
                        toastr.options.hideEasing = $hideEasing.val();
                    }

                    if ($showMethod.val().length) {
                        toastr.options.showMethod = $showMethod.val();
                    }

                    if ($hideMethod.val().length) {
                        toastr.options.hideMethod = $hideMethod.val();
                    }

                    if (addClear) {
                        msg = getMessageWithClearButton(msg);
                        toastr.options.tapToDismiss = false;
                    }
                    if (!msg) {
                        msg = getMessage();
                    }

                    $('#toastrOptions').text('Command: toastr["'
                            + shortCutFunction
                            + '"]("'
                            + msg
                            + (title ? '", "' + title : '')
                            + '")\n\ntoastr.options = '
                            + JSON.stringify(toastr.options, null, 2)
                    );

                    var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                    $toastlast = $toast;

                    if (typeof $toast === 'undefined') {
                        return;
                    }

                    if ($toast.find('#okBtn').length) {
                        $toast.delegate('#okBtn', 'click', function () {
                            alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                            $toast.remove();
                        });
                    }
                    if ($toast.find('#surpriseBtn').length) {
                        $toast.delegate('#surpriseBtn', 'click', function () {
                            alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                        });
                    }
                    if ($toast.find('.clear').length) {
                        $toast.delegate('.clear', 'click', function () {
                            toastr.clear($toast, {force: true});
                        });
                    }
                });

                function getLastToast() {
                    return $toastlast;
                }

                $('#clearlasttoast').click(function () {
                    toastr.clear(getLastToast());
                });
                $('#cleartoasts').click(function () {
                    toastr.clear();
                });
            })
        </script>
		
	       <script>
            jQuery(document).ready(function() {

                //advance multiselect start
                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                                $selectableSearch = that.$selectableUl.prev(),
                                $selectionSearch = that.$selectionUl.prev(),
                                selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                                selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                                .on('keydown', function (e) {
                                    if (e.which === 40) {
                                        that.$selectableUl.focus();
                                        return false;
                                    }
                                });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                                .on('keydown', function (e) {
                                    if (e.which == 40) {
                                        that.$selectionUl.focus();
                                        return false;
                                    }
                                });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
                

            });

            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }

            $("input[name='demo1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                postfix: '%'
            });
            $("input[name='demo2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='demo3']").TouchSpin({
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });
            $("input[name='demo3_21']").TouchSpin({
                initval: 40,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });
            $("input[name='demo3_22']").TouchSpin({
                initval: 40,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });

            $("input[name='demo5']").TouchSpin({
                prefix: "pre",
                postfix: "post",
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary"
            });
            $("input[name='totalservers']").TouchSpin({
            });
			 $("input[name='money']").TouchSpin({
            });

            // Time Picker
            jQuery('#timepicker').timepicker({
                defaultTIme : false,
                icons: {
                    up: 'mdi mdi-chevron-up',
                    down: 'mdi mdi-chevron-down'
                }
            });
            jQuery('#timepicker2').timepicker({
                showMeridian : false,
                icons: {
                    up: 'mdi mdi-chevron-up',
                    down: 'mdi mdi-chevron-down'
                }
            });
            jQuery('#timepicker3').timepicker({
                minuteStep : 15,
                icons: {
                    up: 'mdi mdi-chevron-up',
                    down: 'mdi mdi-chevron-down'
                }
            });

            //colorpicker start

            $('.colorpicker-default').colorpicker({
                format: 'hex'
            });
            $('.colorpicker-rgba').colorpicker();

            // Date Picker
            jQuery('#datepicker').datepicker();
            jQuery('#datepicker-autoclose').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            jQuery('#datepicker-inline').datepicker();
            jQuery('#datepicker-multiple-date').datepicker({
                format: "mm/dd/yyyy",
                clearBtn: true,
                multidate: true,
                multidateSeparator: ","
            });
            jQuery('#date-range').datepicker({
                toggleActive: true
            });

            //Date range picker
            $('.input-daterange-datepicker').daterangepicker({
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-secondary',
                cancelClass: 'btn-primary'
            });
            $('.input-daterange-timepicker').daterangepicker({
                timePicker: true,
                format: 'MM/DD/YYYY h:mm A',
                timePickerIncrement: 30,
                timePicker12Hour: true,
                timePickerSeconds: false,
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-secondary',
                cancelClass: 'btn-primary'
            });
            $('.input-limit-datepicker').daterangepicker({
                format: 'MM/DD/YYYY',
                minDate: '06/01/2016',
                maxDate: '06/30/2016',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-secondary',
                cancelClass: 'btn-primary',
                dateLimit: {
                    days: 6
                }
            });

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2016',
                maxDate: '12/31/2016',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-secondary',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            //Bootstrap-MaxLength
            $('input#defaultconfig').maxlength({
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $('input#thresholdconfig').maxlength({
                threshold: 20,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $('input#moreoptions').maxlength({
                alwaysShow: true,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $('input#alloptions').maxlength({
                alwaysShow: true,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger",
                separator: ' out of ',
                preText: 'You typed ',
                postText: ' chars available.',
                validate: true
            });

            $('textarea#textarea').maxlength({
                alwaysShow: true,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $('input#placement').maxlength({
                alwaysShow: true,
                placement: 'top-left',
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#loginlogs').dataTable({order:[]});

                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true });
            } );
            TableManageButtons.init();  
        </script>         
        
		<?php
		$onedayago = time() - 86400;

		$twodaysago = time() - 172800;
		$twodaysago_after = $twodaysago + 86400;

		$threedaysago = time() - 259200;
		$threedaysago_after = $threedaysago + 86400 + 12000;

		$fourdaysago = time() - 345600;
		$fourdaysago_after = $fourdaysago + 86400;

		$fivedaysago = time() - 432000;
		$fivedaysago_after = $fivedaysago + 86400;

		$sixdaysago = time() - 518400;
		$sixdaysago_after = $sixdaysago + 86400;

		$sevendaysago = time() - 604800;
		$sevendaysago_after = $sevendaysago + 86400;
		
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` > :date");
		$SQL -> execute(array(":date" => $onedayago));
		$count_one = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $twodaysago, ":after" => $twodaysago_after));
		$count_two = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $threedaysago, ":after" => $threedaysago_after));
		$count_three = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $fourdaysago, ":after" => $fourdaysago_after));
		$count_four = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $fivedaysago, ":after" => $fivedaysago_after));
		$count_five = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $sixdaysago, ":after" => $sixdaysago_after));
		$count_six = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $sevendaysago, ":after" => $sevendaysago_after));
		$count_seven = $SQL->fetchColumn(0);
		
		$date_one = date('d/m/Y', $onedayago);
		$date_two = date('d/m/Y', $twodaysago);
		$date_three = date('d/m/Y', $threedaysago);
		$date_four = date('d/m/Y', $fourdaysago);
		$date_five = date('d/m/Y', $fivedaysago);
		$date_six = date('d/m/Y', $sixdaysago);
		$date_seven = date('d/m/Y', $sevendaysago);


		?>
<script>
var BePagesDashboard=function() {
    var a=function() {
        Chart.defaults.global.defaultFontColor="#555555",
        Chart.defaults.scale.gridLines.color="transparent",
        Chart.defaults.scale.gridLines.zeroLineColor="transparent",
        Chart.defaults.scale.display=!1,
        Chart.defaults.scale.ticks.beginAtZero=!0,
        Chart.defaults.global.elements.line.borderWidth=2,
        Chart.defaults.global.elements.point.radius=5,
        Chart.defaults.global.elements.point.hoverRadius=7,
        Chart.defaults.global.tooltips.cornerRadius=3,
        Chart.defaults.global.legend.display=!1;
        var a,
        e,
        r=jQuery("#graph"),
        l= {
            labels:["<?php echo $date_seven; ?>",
            "<?php echo $date_six; ?>",
            "<?php echo $date_five; ?>",
            "<?php echo $date_four; ?>",
            "<?php echo $date_three; ?>",
            "<?php echo $date_two; ?>",
            "<?php echo $date_one; ?>"],
            datasets:[ {
                label: "This Week", fill: !0, backgroundColor: "rgba(1,229,148,.25)", borderColor: "rgba(1,229,148,1)", pointBackgroundColor: "rgba(1,229,148,1)", pointBorderColor: "#fff", pointHoverBackgroundColor: "#fff", pointHoverBorderColor: "rgba(1,229,148,1)", data: [<?php echo $count_seven; ?>, <?php echo $count_six; ?>, <?php echo $count_five; ?>, <?php echo $count_four; ?>, <?php echo $count_three; ?>, <?php echo $count_two; ?>, <?php echo $count_one; ?>]
            }
            ]
        }
        ,
        t= {
            scales: {
                yAxes:[ {
                    ticks: {
                        suggestedMax: 50
                    }
                }
                ]
            }
            ,
            tooltips: {
                callbacks: {
                    label:function(a, e) {
                        return" "+a.yLabel+" Attacks"
                    }
                }
            }
        }
        ,
        n= {
            scales: {
                yAxes:[ {
                    ticks: {
                        suggestedMax: 480
                    }
                }
                ]
            }
            ,
            tooltips: {
                callbacks: {
                    label:function(a, e) {
                        return" $ "+a.yLabel
                    }
                }
            }
        }
        ;
        r.length&&(a=new Chart(r, {
            type: "line", data: l, options: t
        }
        ))
    }
    ;
    return {
        init:function() {
            a()
        }
    }
}

();
jQuery(function() {
    BePagesDashboard.init()
}

);
</script>
<script>
var BePagesDashboard=function() {
    var a=function() {
        Chart.defaults.global.defaultFontColor="#555555",
        Chart.defaults.scale.gridLines.color="transparent",
        Chart.defaults.scale.gridLines.zeroLineColor="transparent",
        Chart.defaults.scale.display=!1,
        Chart.defaults.scale.ticks.beginAtZero=!0,
        Chart.defaults.global.elements.line.borderWidth=2,
        Chart.defaults.global.elements.point.radius=5,
        Chart.defaults.global.elements.point.hoverRadius=7,
        Chart.defaults.global.tooltips.cornerRadius=3,
        Chart.defaults.global.legend.display=!1;
        var a,
        e,
        r=jQuery("#graph"),
        l= {
            labels:["<?php echo $date_seven; ?>",
            "<?php echo $date_six; ?>",
            "<?php echo $date_five; ?>",
            "<?php echo $date_four; ?>",
            "<?php echo $date_three; ?>",
            "<?php echo $date_two; ?>",
            "<?php echo $date_one; ?>"],
            datasets:[ {
                label: "This Week", fill: !0, backgroundColor: "rgba(1,229,148,.25)", borderColor: "rgba(1,229,148,1)", pointBackgroundColor: "rgba(1,229,148,1)", pointBorderColor: "#fff", pointHoverBackgroundColor: "#fff", pointHoverBorderColor: "rgba(1,229,148,1)", data: [<?php echo $count_seven; ?>, <?php echo $count_six; ?>, <?php echo $count_five; ?>, <?php echo $count_four; ?>, <?php echo $count_three; ?>, <?php echo $count_two; ?>, <?php echo $count_one; ?>]
            }
            ]
        }
        ,
        t= {
            scales: {
                yAxes:[ {
                    ticks: {
                        suggestedMax: 50
                    }
                }
                ]
            }
            ,
            tooltips: {
                callbacks: {
                    label:function(a, e) {
                        return" "+a.yLabel+" Attacks"
                    }
                }
            }
        }
        ,
        n= {
            scales: {
                yAxes:[ {
                    ticks: {
                        suggestedMax: 480
                    }
                }
                ]
            }
            ,
            tooltips: {
                callbacks: {
                    label:function(a, e) {
                        return" $ "+a.yLabel
                    }
                }
            }
        }
        s;
        r.length&&(a=new Chart(r, {
            type: "line", data: l, options: t
        }
        ))
    }
    ;
    return {
        init:function() {
            a()
        }
    }
}

();
jQuery(function() {
    BePagesDashboard.init()
}

);
</script>    
</body></html>
