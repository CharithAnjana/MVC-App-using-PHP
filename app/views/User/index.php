<html>
    <head>
        <title>Select User</title>
    </head>
    <body>
        <form method="POST" action="http://localhost/mvc_app/user/index">
            <input type="text" name="name"  />
            <input type="submit" value="search" />
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    foreach($data as $mem)
                    {
                        echo "<tr>";
                        echo "<td>" . $mem['ID'] . "</td>";
                        echo "<td>" . $mem['FName'] . "</td>";
                        echo "<td>" . $mem['LName'] . "</td>";
                        echo "<td>" . $mem['Email'] . "</td>";
                        echo "</tr>";
                    }
                   
                ?>
            </tbody>
        </table>
        
        <br /><br />
        <a href="http://localhost/mvc_app/user/register">Register Users</a> |
        <a href="http://localhost/mvc_app/home/index">Home Page</a>

    </body>
</html>