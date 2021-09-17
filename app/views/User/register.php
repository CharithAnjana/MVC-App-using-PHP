<html>
    <head>
        <title>Register User</title>
    </head>
    <body>
        <h2>Register Form</h2><br /> 
        <form method="POST" action="http://localhost/mvc_app/user/register">                  

            <lable>First Name : </lable>
            <input type="text" name="fname" placeholder="Enter First Name" required />
            <br /> <br /> 

            <lable>Last Name : </lable>
            <input type="text" name="lname" placeholder="Enter Last Name" required />
            <br /> <br /> 

            <lable>Email : </lable>
            <input type="email" name="email" placeholder="Enter Email" required />
            <br /> <br /> 

            <lable>Password : </lable>
            <input type="password" name="pass" placeholder="Enter password" required />
            <br /> <br /> <br /> 

            <input type="submit" value="Create" />
        </form> 
        
        <br /><br />
        <a href="http://localhost/mvc_app/user/index">Search Users</a>  |
        <a href="http://localhost/mvc_app/home/index">Home Page</a>
        
    </body>
</html>