<div class="container">
    <div class="row">
        <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <!-- STEP ONE -->
                        <?php if ($frm=='f') {
                                require '../Controllers/functions/create_report.php';
                            } ?>
                            <br/>
                            <div class="panel panel-info">
                                <div class="panel-heading"><h2 class="panel-title">CREATE REPORT</h2></div> 
                                <div class="panel-body">
                                    <div class="alert alert-success" role="alert">
                                      <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                                         Please choose the options carefully.
                                    </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">Choose Exam</span>
                                            <select name="exam" class="form-control" aria-describedby="basic-addon1">
                                                <option value="---">---</option>
                                                <option value="1">Internal 1</option>
                                                <option value="2">Internal 2</option>
                                                <option value="3">Internal 3</option>
                                                <option value="4">Preparatory</option>
                                            </select>
                                            </div><br/>
                                            <div class="input-group">
                                                <span class="input-group-addon">Section</span>
                                                <select class="form-control" name="section" id="section">
                                                    <option value="">Select</option>
                                                    <option id="a" value="A">A</option>
                                                    <option id="b" value="B">B</option>
                                                    <option id="c" value="C">C</option>
                                                    <option id="d" value="D">D</option>
                                                    <option id="e" value="E">E</option>
                                                    <option id="f" value="F">F</option>
                                                    <option id="a2nd" value="A2">2nd shift A</option>
                                                    <option id="b2nd" value="B2">2nd shift B</option>
                                                    <option id="c2nd" value="C2">2nd shift C</option>
                                                    <option id="a1" value="A">A1</option>
                                                    <option id="a2" value="B">A2</option>
                                                    <option id="a3" value="C">A3</option>
                                                    <option id="a4" value="D">A4</option>
                                                    <option id="a5" value="E">A5</option>
                                                    <option id="a6" value="F">A6</option>
                                                    <option id="b1" value="A">B1</option>
                                                    <option id="b2" value="B">B2</option>
                                                    <option id="b3" value="C">B3</option>
                                                    <option id="b4" value="D">B4</option>
                                                    <option id="b5" value="E">B5</option>
                                                    <option id="b6" value="F">B6</option>
                                                </select>
                                                <span class="input-group-addon">Subject</span>
                                                <select name="subjectcode" class="form-control" aria-describedby="basic-addon1">
                                                    <option>--select--</option>
                                                    <?php echo list_fac_sub_select($db,$fid) ;?>
                                                </select>
                                            </div><br/>
                                </div>
                            </div>


                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
                        <p>This is step 2</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step 3</h3>
                        <p>This is step 3</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>






<script type="text/javascript">
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>