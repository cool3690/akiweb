<%@page import="java.io.File"%>
<%@ page import="java.util.logging.FileHandler" %>
<%@ page import=" java.util.logging.LogManager" %>
<%@ page import="java.util.logging.Logger" %>
<%@ page import="java.util.logging.Level" %>
<%@ page import="org.apache.log4j.*" %>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ include file = "db.jsp"%> 

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style>
    body{
        font-family:微軟正黑體;
    }
  
</style>

    <body>
    <font size="7"><center>登入系統</font> </br> </br> 
    
<div class="container">
       <form class="form-horizontal" action="login.jsp" method = "post">
    <div class="form-group">
      <label class="control-label col-sm-4" for="acc"><font size="4">帳號：</label>
      <div class="col-sm-4">
        <input type="account" class="form-control" id="acc"  name="acc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwd">密碼：</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="pwd"  name="pwd">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-default"  name = "login">登入</button>
      </div>
    </div>
  </form>

<%       String acc = request.getParameter("acc");
       String pwd = request.getParameter("pwd");
    PropertyConfigurator.configure("../WEB-INF/log4j.properties");
Logger log = Logger.getLogger(this.getClass().toString());
String A= "V:/Log";      //把路徑給A

File B=new File(A);          //建立實體

B.mkdir();              
 
            if(acc!=null){log.info("account="+acc+" pwd="+pwd);
            }

        String sql;
         if(request.getParameter("login") != null )
           {  sql = "select* from login where acc= '" + acc + "' and pwd=  '" + pwd + "'"; 
                ResultSet rs = stmt.executeQuery(sql); 
       while(rs.next()){ 
         response.sendRedirect("index.jsp");
           }
              out.println("帳密錯誤!!");
                 // session.setAttribute("sql", sql);    
	  } 

	%> 
        </div>
    </body>
</html>

</html>