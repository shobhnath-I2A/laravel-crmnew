// year

am4core.ready(function () {
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart3D);
    // Add data
    chart.data = [{
        "country": "Jan",
        "visits": 0
    },
    {
        "country": "Feb",
        "visits": 2
    },
    {
        "country": "Mar",
        "visits": 1
    },
    {
        "country": "Apr",
        "visits": 0
    },
    {
        "country": "May",
        "visits": 0
    },
    {
        "country": "Jun",
        "visits": 0
    },
    {
        "country": "Jul",
        "visits": 0
    },
    {
        "country": "Aug",
        "visits": 0
    },
    {
        "country": "Sep",
        "visits": 0
    },
    {
        "country": "Oct",
        "visits": 0
    },
    {
        "country": "Nov",
        "visits": 0
    },
    {
        "country": "Dec",
        "visits": 0
    },


    ];

    // Create axes
    let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "country";
    categoryAxis.renderer.labels.template.rotation = 270;
    categoryAxis.renderer.labels.template.hideOversized = false;
    categoryAxis.renderer.minGridDistance = 20;
    categoryAxis.renderer.labels.template.horizontalCenter = "right";
    categoryAxis.renderer.labels.template.verticalCenter = "middle";
    categoryAxis.tooltip.label.rotation = 270;
    categoryAxis.tooltip.label.horizontalCenter = "right";
    categoryAxis.tooltip.label.verticalCenter = "middle";

    let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries3D());
    series.dataFields.valueY = "visits";
    series.dataFields.categoryX = "country";
    series.name = "Visits";
    series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
    series.columns.template.fillOpacity = .8;

    var columnTemplate = series.columns.template;
    columnTemplate.strokeWidth = 2;
    columnTemplate.strokeOpacity = 1;
    columnTemplate.stroke = am4core.color("#FFFFFF");

    columnTemplate.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
    })

    columnTemplate.adapter.add("stroke", function (stroke, target) {
        return chart.colors.getIndex(target.dataItem.index);
    })

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.lineX.strokeOpacity = 0;
    chart.cursor.lineY.strokeOpacity = 0;

}); // end am4core.ready()
function closepayementbox() {
    /*$('#blackdiv').hide();
    $('#closepayment').hide();
    $('#showtodayspayment').removeClass('todayspayment');*/
}

function openpayementbox() {
    /*
            $('#blackdiv').show();
            $('#closepayment').show();
            $('#showtodayspayment').addClass('todayspayment');
        */
}
openpayementbox();


if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $('.container-fluid').removeAttr('style');
}

document.getElementById('reportType').addEventListener('change', function () {
    const type = this.value;
    document.getElementById('dayReport').style.display = (type === 'day') ? 'block' : 'none';
    document.getElementById('monthReport').style.display = (type === 'month') ? 'block' : 'none';
});

var intervalId = window.setInterval(function () {
    showcurrentworkinghours();

}, 60000);
showcurrentworkinghours();

$('canvas').fadeIn();
$('#congratutext').fadeIn();
setTimeout(function () {
    $('canvas').fadeOut();
    $('#congratutext').fadeOut();
}, 2000);

function redirectpage(pages) {
    window.location.href = pages;
}

function loadpop(pagetitle, obj, width) {
    $('#popcontent').html(
        '<div style="padding:10px; text-align:center;"><img src="http://localhost:8081/crmreview/images/loading.gif" width="32" ></div>'
    );
    var popaction = encodeURI($(obj).attr('popaction'));
    $('#poptitle').html(pagetitle);
    $('.modal-dialog').css('max-width', width);
    $('.modal-dialog').css('width', width);
    $('#popcontent').load('http://localhost:8081/crmreview/loadpopup.php?' + popaction);
}

function loadpop2(pagetitle, obj, width) {
    $('#popcontent2').html(
        '<div style="padding:10px; text-align:center;"><img src="http://localhost:8081/crmreview/images/loading.gif" width="32" ></div>'
    );
    var popaction = encodeURI($(obj).attr('popaction'));
    $('#poptitle2').html(pagetitle);
    $('.modal-dialog').css('width', width);
    $('.modal-dialog').css('max-width', width);
    $('#popcontent2').load('http://localhost:8081/crmreview/loadpopup.php?' + popaction);
}

function hideModal() {
    $("#myModal").removeClass("in");
    $(".modal-backdrop").remove();
    $('body').removeClass('modal-open');
    $('body').css('padding-right', '');
    $(".modal").hide();
}
setTimeout(function () {
    $('.headersavealert').slideUp();
}, 3000);
$('#loadnotificationscreate').load('loadnotificationscreate.php');

function createqueryfromclient(id) {
    $('#loadqueryadd').html('Loading...');
    $('.rnblkquery').show();
    $('body').css('overflow', 'hidden');
    $('html').css('overflow', 'hidden');
    $('#loadqueryadd').load('add_query.php?cid=' + id);
    if (id == '') {
        $('.rnblkquery .card-title').html('Create Query');
    } else {
        $('.rnblkquery .card-title').html('Edit Query');
    }
}

function createquery(id) {
    $('#loadqueryadd').html('Loading...');
    $('.rnblkquery').show();
    $('body').css('overflow', 'hidden');
    $('html').css('overflow', 'hidden');
    $('#loadqueryadd').load('/add-query/' + id);
    if (id == '') {
        $('.rnblkquery .card-title').html('Create Query');
    } else {
        $('.rnblkquery .card-title').html('Edit Query');
    }
}

function createqueryclose() {
    $('.rnblkquery').hide();
    $('body').css('overflow', 'visible');
    $('html').css('overflow', 'visible');
    $('#loadqueryadd').html('Loading...');
}

function openfooterpop(id, name, obj, openfile, width, height, right, bodybox) {
    $('.footerstripboxouter a').removeClass('activefootertab');
    $('#' + id).show();
    $('#' + id).css('width', width);
    $('#' + id).css('min-height', height);
    $('.popcontentbodybox').css('height', bodybox);
    $('#' + id).css('right', right);
    $(obj).addClass('activefootertab');
    $('#' + id + ' .footerpopboxsheader span').html(name);
    $('.popcontentbodybox').html('<div class="loadingboxin">Wait Please...</div>');
    $('.popcontentbodybox').load(openfile + '.php');
}

function clasefooterpop() {
    $('.footerpopboxs').hide();
    $('.footerstripboxouter a').removeClass('activefootertab');
}

function openfooterpop2(id, name, obj, openfile, width, height, right, bodybox) {
    $('.footerstripboxouter a').removeClass('activefootertab');
    $('#footernotebook').hide();
    $('#' + id).show();
    $('#' + id).css('width', width);
    $('#' + id).css('min-height', height);
    $('.popcontentbodybox').css('height', bodybox);
    $('#' + id).css('left', right);

    $(obj).addClass('activefootertab');
    $('#' + id + ' .footerpopboxsheader span').html(name);
    $('.popcontentbodybox2').html('<div class="loadingboxin">Wait Please...</div>');
    $('.popcontentbodybox2').load(openfile + '.php');
}



// form validation

$(document).ready(function() {
    $('.custom-validation').validate({
        submitHandler: function(form) {
            $('#savingbutton')
                .prop('disabled', true)
                .val('Saving...');
            form.submit();
        }
    });
});
// TinyMCE Global Init
function initEditors() {

    if (typeof tinymce !== "undefined") {

        tinymce.remove('.editorclass');

        tinymce.init({
            selector: ".editorclass",
            plugins: "advlist autolink lists link image charmap preview anchor searchreplace code fullscreen",
            toolbar: "undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image"
        });

    }

}


// Datepicker Init
function initDatepickers() {

    if ($("#dob").length) {

        $("#dob").datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            yearRange: "-90:+0"
        });

    }

    if ($("#marriageAnniversary").length) {

        $("#marriageAnniversary").datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            yearRange: "-90:+0"
        });

    }

}


// Form Validation Init
function initValidation() {

    $('.custom-validation').each(function () {

        $(this).validate({

            submitHandler: function (form) {

                $('#savingbutton')
                    .prop('disabled', true)
                    .text('Saving...');

                form.submit();

            }

        });

    });

}


// Run All UI Init
function initCRMUI() {

    initEditors();
    initDatepickers();
    initValidation();

}


// Run on Page Load
$(document).ready(function () {

    initCRMUI();

});
