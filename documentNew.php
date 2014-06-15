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
                <h1>New Document</h1>
                <form>
                <p>Title: <input type="text" name="title"></p>
                <p><textarea name="text" rows="10" cols="50"></textarea></p>
                <input type="hidden" name="action" value="save"/>
                <input type="submit"></input>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
