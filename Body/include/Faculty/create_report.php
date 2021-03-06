
<br/>
<div class="panel panel-info">
<div class="panel-heading"><h2 class="panel-title">CREATE REPORT</h2></div> 
<div class="panel-body">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Step 2</p>
            </div>
        </div>
    </div>
    <form role="form" method="post" id="myForm" action="../Controllers/functions/create_report.php">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <!-- STEP ONE -->
                            <?php include 'include/Faculty/cr_1.php'; ?>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" name="s1" onclick="load_cr2()" >Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <!-- STEP TWO -->
                            <?php include 'include/Faculty/cr_2.php'; ?>
                    <button class="btn btn-success btn-lg pull-right" name="submit" type="submit">Finish!</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

<script type="text/javascript">
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});


$(document).ready(function(){
    $(".nextBtn").click(function(){
        var exam = $(".exam").val();
        var sec = $(".sec").val();
        var sub = $(".sub").val();
        var br = $(".br").val();
        $.post("../Controllers/functions/create_report.php", {exam: exam,sec: sec, sub: sub,br:br,step2:1},function(data){
                    $('#tbody').html( data );
                });
    });
});

</script>