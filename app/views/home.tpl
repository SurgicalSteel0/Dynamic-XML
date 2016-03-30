<!DOCTYPE html>
<html lang="en-US">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">        
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="css/global.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validator.min.js"></script>        
        <script src="js/backstretch.min.js"></script>        
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/jszip.min.js"></script>
        <script src="js/buttons.html5.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>        
        <script src="js/jasny-bootstrap.min.js"></script>
        <script src="js/global.js"></script>

        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <title>Dynamic XML :: Home</title>

        {literal}
            <script>

            </script>
        {/literal}

    </head>

    <body>

        {include file='./layout/nav.tpl'}

        <div class="container-fluid">

            <div style="margin-top: 70px" class="row">
                <div class="col-md-12">
                    {include file='./layout/alerts.tpl'}
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="glyphicons-regular glyphicons-file-import"></span> Zip Files
                            <div class="btn-group pull-right">
                                <button type="button" data-toggle="modal" data-target="#zipFilesHelpModal" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-question-sign"></span> Help
                                </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" >
                                <label>Select a zip file to upload:</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Select a zip file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="..." required>
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </form>                            
                            <table id="salesRepTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>Size</th>
                                        <th>Number of XML's</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="glyphicons-regular glyphicons-file-export"></span> CSV Files
                            <div class="btn-group pull-right">
                                <button type="button" data-toggle="modal" data-target="#csvFilesHelpModal" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-question-sign"></span> Help
                                </button>
                            </div>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </body>
</html>