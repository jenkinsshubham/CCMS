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