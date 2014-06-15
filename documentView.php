<html>
<head>
<title>User Create New Document page</title>
<LINK href="document.css" rel="stylesheet" type="text/css">
</head>
<body>
    <table>
        <tr>
            <td><?php include "leftMenu.php";?></td>
            <td>
                <h1>View Document</h1>
                <form>
                <p><?php echo $dObj->documentTitle;?></p>
                <p><?php echo $dObj->documentText;?></p>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
