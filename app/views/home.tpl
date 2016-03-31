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

                $(document).ready(function() {

                    $("#zipFilesTable").dataTable({
                        "pagingType": "simple",
                        "language": {
                            "lengthMenu": "Display _MENU_ zip files per page",
                            "zeroRecords": "There are no zip files.",
                            "info": "Showing page _PAGE_ of _PAGES_",
                            "infoFiltered": "(filtered from _MAX_ total records)",
                            "searchPlaceholder": "Search for anything"
                        }
                    });

                    $("#csvFilesTable").dataTable({
                        "pagingType": "simple",
                        "language": {
                            "lengthMenu": "Display _MENU_ csv files per page",
                            "zeroRecords": "There are no csv files.",
                            "info": "Showing page _PAGE_ of _PAGES_",
                            "infoFiltered": "(filtered from _MAX_ total records)",
                            "searchPlaceholder": "Search for anything"
                        }
                    });

                });

                function removeCSV(csvFile) {
                    $("#removeCSVInput").val(csvFile);
                    $("#removeCSVForm").submit();
                }

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

                            <form id="uploadZipForm" role="form" action="../app/forms/upload-zip-file.php" method="post" enctype="multipart/form-data">

                                <label>Select a zip file to upload:</label>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Select a zip file</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="zip-file" required>
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        <button type="submit" class="btn btn-primary btn-block" id="uploadZipBtn">
                                            <span class="glyphicon glyphicon-cloud-upload"></span> Upload
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <div class="well">
                                <table id="zipFilesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>Size</th>
                                            <th>Number of XML's</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach from=$zipFiles item=zipFile}
                                            <tr>
                                                <td>{$zipFile}</td>
                                                <td>{$zipFile->size}</td>
                                                <td>{$zipFile->numberOfXMLs}</td>
                                                <td class="text-center" style="vertical-align: middle;">
                                                    <form class="remove-zip-form" role="form" action="../app/forms/remove-zip-file.php" method="post">
                                                        <input type="hidden" name="zipFile" value="{$zipFile}" />
                                                        <button type="submit" class="btn btn-danger btn-xs remove-zip-btn">
                                                            <span class="glyphicon glyphicon-trash"></span> Remove
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>

                            <form class="pull-left" id="processXMLFilesForm" role="form" action="../app/forms/process-xml-files.php" method="post">
                                <button id="processXMLFilesBtn" type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-refresh"></span> Process ZIP Files
                                </button>
                            </form>

                            <form class="pull-right" id="removeXMLFilesForm" role="form" action="../app/forms/remove-xml-files.php" method="post">
                                <button id="removeXMLFilesBtn" type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Remove ZIP Files
                                </button>
                            </form>

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
                            <div class="well">
                                <table id="csvFilesTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>Size</th>
                                            <th>Order Number</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach from=$csvFiles item=csvFile}
                                            <tr>
                                                <td>{$csvFile}</td>
                                                <td>{$csvFile->size}</td>
                                                <td>{$csvFile->orderNumber}</td>
                                                <td class="text-center" style="vertical-align: middle;">
                                                    <div class="btn-group">
                                                        <button onclick="removeCSV('{$csvFile}')" type="button" class="btn btn-danger btn-xs remove-csv-btn">
                                                            <span class="glyphicon glyphicon-trash"></span> Remove
                                                        </button>
                                                        <a href="../app/processed/{$csvFile}" class="btn btn-success btn-xs download-csv-btn" download>
                                                            <span class="glyphicon glyphicon-cloud-download"></span> Download
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>

                            <form class="pull-left" id="downloadAllCSVsForm" role="form" action="../app/forms/download-all-csvs.php" method="post">
                                <button id="downloadAllCSVsBtn" type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-cloud-download"></span> Download CSV Files
                                </button>
                            </form>

                            <form class="pull-right" id="removeAllCSVsForm" role="form" action="../app/forms/remove-all-csvs.php" method="post">
                                <button id="removeAllCSVsBtn" type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Remove CSV Files
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <form id="removeCSVForm" role="form" action="../app/forms/remove-csv-file.php" method="post">
            <input id="removeCSVInput" type="hidden" name="csvFile" value="" />
        </form>

        <form id="downloadCSVForm" role="form" action="../app/forms/download-csv-file.php" method="post">
            <input id="downloadCSVInput" type="hidden" name="csvFile" value="" />
        </form>

    </body>
</html>