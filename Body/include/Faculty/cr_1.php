<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
     Please choose the options carefully.
</div>
    <div class="input-group">
        <span class="input-group-addon">Choose Exam</span>
        <select name="exam" class="form-control exam" aria-describedby="basic-addon1">
            <option value="">---</option>
            <option value="1">Internal 1</option>
            <option value="2">Internal 2</option>
            <option value="3">Internal 3</option>
            <option value="4">Preparatory</option>
        </select>
        </div><br/>
        <div class="input-group">
            <span class="input-group-addon">Branch</span>
            <select class="form-control br" required="required">
                <option <?= $br == '' ? ' selected="selected"' : '';?> value="">Select Branch</option>         
                <option <?= $br == 'P' ? ' selected="selected"' : '';?> value="P">Physics Cycle</option>         
                <option <?= $br == 'C' ? ' selected="selected"' : '';?> value="C">Chemistry Cycle</option>
                <?php  for ($i=1; $i <= fetch_branches('count',$db,$i) ; $i++) { ?>
                <option <?= $br == fetch_branches('code',$db,$i) ? ' selected="selected"' : '';?> value="<?php echo fetch_branches('code',$db,$i)?>">    <?php echo fetch_branches('name',$db,$i)?>
                </option>
                 <?php } ?>   
            </select>
            </div><br/>
            <div class="input-group">
            <span class="input-group-addon">Section</span>
            <select class="form-control sec" required="required">
                <option value="">Select</option>
                <option id="A" value="A">A</option>
                <option id="B" value="B">B</option>
                <option id="c" value="C">C</option>
                <option id="d" value="D">D</option>
                <option id="e" value="E">E</option>
                <option id="f" value="F">F</option>
                <option id="A2nd" value="A2">2nd shift A</option>
                <option id="b2nd" value="B2">2nd shift B</option>
                <option id="c2nd" value="C2">2nd shift C</option>
                <option id="A1" value="A1">A1</option>
                <option id="A2" value="A2">A2</option>
                <option id="A3" value="A3">A3</option>
                <option id="A4" value="A4">A4</option>
                <option id="A5" value="A5">A5</option>
                <option id="A6" value="A6">A6</option>
                <option id="B1" value="B1">B1</option>
                <option id="B2" value="B2">B2</option>
                <option id="B3" value="B2">B3</option>
                <option id="B4" value="B5">B4</option>
                <option id="B5" value="B5">B5</option>
                <option id="B6" value="B6">B6</option>
            </select>
            <span class="input-group-addon">Subject</span>
            <select required class="form-control sub" aria-describedby="basic-addon1">
                <option>--select--</option>
                <?php echo list_fac_sub_select($db,$fid) ;?>
            </select>
        </div><br/>