            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Site Settings</div>
                <form method="post">
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                        Site Name
                        <div class="pull-right">
                            <input type="text" placeholder="Enter the site name.." class="form-control" value="<?php echo SITENAME ?>" />
                        </div>
                    </li>
                    <li class="list-group-item">
                        Short Name
                        <div class="pull-right">
                            <input type="text" placeholder="Enter the site name.." class="form-control" value="<?php echo SHORTNAME ?>" />
                        </div>
                    </li>
                    <li class="list-group-item">
                        Tagline
                        <div class="pull-right">
                            <input type="text" placeholder="Enter the site name.." class="form-control" value="<?php echo TAGLINE ?>" />
                        </div>
                    </li>
                    <li class="list-group-item">
                        Email
                        <div class="pull-right">
                            <input type="text" placeholder="Enter the site name.." class="form-control" value="<?php echo EMAIL ?>" />
                        </div>
                    </li>
                    <li class="list-group-item">
                        Basepath
                        <div class="pull-right">
                            <input type="text" placeholder="Enter the site name.." class="form-control" value="<?php echo BASEPATH ?>" />
                        </div>
                    </li>
                    <li class="list-group-item"><b> Faculty Preferences</b></li>
                        <ul class="list-group">
                        <li class="list-group-item">
                            Faculty Registration
                            <div class="material-switch pull-right">
                                <input id="facReg" checked name="facReg" type="checkbox"/>
                                <label for="facReg" class="label-info"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Faculty can add Notice?
                            <div class="material-switch pull-right">
                                <input id="facNotice" name="facNotice" checked type="checkbox"/>
                                <label for="facNotice" class="label-warning"></label>
                            </div>
                        </li>
                        </ul>
                    <li class="list-group-item"><b> Student Preferences</b></li>
                        <ul class="list-group">
                            <li class="list-group-item">
                                Student Registration
                                <div class="material-switch pull-right">
                                    <input id="StuReg" checked name="StuReg" type="checkbox"/>
                                    <label for="StuReg" class="label-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                            Student can edit Profile?
                            <div class="material-switch pull-right">
                                <input id="StuEditProfile" name="StuEditProfile" checked type="checkbox"/>
                                <label for="StuEditProfile" class="label-warning"></label>
                            </div>
                            </li>
                        </ul>
                    <li class="list-group-item">
                        Bootstrap Switch Info
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionInfo" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionInfo" class="label-info"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Bootstrap Switch Warning
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionWarning" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionWarning" class="label-warning"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Bootstrap Switch Danger
                        <div class="material-switch pull-right">
                            <input id="someSwitchOptionDanger" name="someSwitchOption001" type="checkbox"/>
                            <label for="someSwitchOptionDanger" class="label-danger"></label>
                        </div>
                    </li>
                    <br/>
                    <div class="pull-right"><input class="btn btn-primary" type="submit" name="submit" value="Save"></div>
                </ul>
                </form>
            </div>            